<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Manipulation of Staffs
 *
 * @author OU Sophea <ousophea@gmail.com>
 */
class Visitor extends CI_Controller {

    /**
     * @var array
     */
    var $data = array('title' => null, 'content' => 'missing_view');

    /**
     * Constuctor
     */
    function __construct() {
        parent::__construct();
        $this->load->model(array('visitor/m_visitor'));
    }

    /**
     * Retrive visitor
     *
     * @author Ou Sophea<ousophea@gmail.com>
     * @access public
     * @return void
     */
    function index() {
        $this->data['title'] = 'Manage Visitor';
        $this->data['content'] = 'visitor/visitor/index';

        $this->form_validation->set_rules('vis_sex', '', 'trim');
        $this->form_validation->set_rules('vis_edate', '', 'trim');
        $this->form_validation->set_rules('vis_sdate', '', 'trim');
        $this->form_validation->set_rules('vis_tvis_id', '', 'trim');
        $this->form_validation->set_rules('vis_pvis_id', '', 'trim');
        $this->form_validation->run();
        $this->data['alltvisitor'] = $this->m_global->getDataArray(TABLE_PREFIX . 'type_visitor', 'tvis_id', 'tvis_title', 'tvis_status');
        $this->data['pvisitor'] = $this->m_global->getDataArray(TABLE_PREFIX . 'visit_purpose', 'pvis_id', 'pvis_name', 'pvis_status');
         $this->data['data'] = $this->m_visitor->findAllVisitor(PAGINGATION_PERPAGE, $this->uri->segment(4));
        $this->data['visitorNumber'] = $countVisitor = $this->m_visitor->countAllVisitor();
        pagination_config(base_url() . 'visitor/visitor/index', $countVisitor, PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Create visitor
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @access public
     * @return void
     */
    function add() {
        $this->data['title'] = 'Add Visitor';
        $this->data['content'] = 'visitor/visitor/add';

        $config = array(
            array(
                'field' => 'vis_name',
                'label' => 'visitor name',
                'rules' => 'required'
            ),
            array(
                'field' => 'vis_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
        $this->form_validation->set_select('vis_sex');
        $this->form_validation->set_select('vis_tvis_id');
        $this->form_validation->set_select('vis_pvis_id');
        if ($this->form_validation->run() == FALSE) {
            $this->data['alltvisitor'] = $this->m_global->getDataArray(TABLE_PREFIX . 'type_visitor', 'tvis_id', 'tvis_title', 'tvis_status');
            $this->data['pvisitor'] = $this->m_global->getDataArray(TABLE_PREFIX . 'visit_purpose', 'pvis_id', 'pvis_name', 'pvis_status');
            $this->load->view(LAYOUT, $this->data);
        } else {
            if ($this->m_visitor->add()) {
                $this->session->set_flashdata('message', alert("Visitor has been saved!", 'success'));
                redirect('visitor/visitor');
            } else {
                $this->session->set_flashdata('message', alert("Visitor cannot be added, please try again", 'danger'));
                redirect('visitor/visitor/add');
            }
        }
    }

    /**
     * Update visitor
     *
     * @author OU Sophea <ousphea@gmail.com>
     * @param integer $id visitor id <segment(4)>
     * @access public
     * @return void
     */
    function edit($id = 0) {
        $this->data['title'] = 'Edit visitor Information';
        $this->data['content'] = 'visitor/visitor/edit';
        $this->data['data'] = $this->m_visitor->getVisitorById($id);
 
        $config = array(
            array(
                'field' => 'vis_name',
                'label' => 'visitor name',
                'rules' => 'required'
            ),
            array(
                'field' => 'vis_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
        $this->form_validation->set_select('vis_sex');
        $this->form_validation->set_select('vis_tvis_id');
        $this->form_validation->set_select('vis_pvis_id');
        if ($this->form_validation->run() == FALSE) {
            $this->data['alltvisitor'] = $this->m_global->getDataArray(TABLE_PREFIX . 'type_visitor', 'tvis_id', 'tvis_title', 'tvis_status');
            $this->data['pvisitor'] = $this->m_global->getDataArray(TABLE_PREFIX . 'visit_purpose', 'pvis_id', 'pvis_name', 'pvis_status');
            $this->load->view(LAYOUT, $this->data);
        } else {
            if ($this->m_visitor->update()) {
                $this->session->set_flashdata('message', alert("Visitor has been updated!", 'success'));
                redirect('visitor/visitor/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Visitor cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('visitor/visitor/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    /**
     * Discard visitor
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @param integer $id visitor id <segment(4)>
     * @access public
     * @return void
     */
    function delete($id) {
        if ($this->m_visitor->deleteVisitorById($id)) {
            $this->session->set_flashdata('message', alert("Visitor has been deleted!", 'success'));
            redirect('visitor/visitor/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Visitor cannot be deleted, please try again!", 'danger'));
            redirect('visitor/visitor/index/' . $this->uri->segment(5));
        }
    }

   
    function uniqueExcept($str, $table_field) {
        // $f1[0] : table name
        // $f1[1] : field to insert
        // $tf[1] : field id
        $tf = explode(',', $table_field);
        $f1 = explode('.', $tf[0]);
        $this->db->where($f1[1], $str);
        $this->db->where($tf[1] . " !=", $this->uri->segment(4));
        $data = $this->db->get($f1[0]);
        if ($data->num_rows() > 0) {
            $this->form_validation->set_message('uniqueExcept', '%s already exist, please enter another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Export visitor to csv file
     */
    public function exportcsv() {
        $result = $this->m_visitor->exportcsv();
        if (query_to_csv($result, TRUE, 'Book-' . date('Y-m-d', time()) . '.csv')) {
            redirect('visitor/visitor/index/');
        }
    }

}

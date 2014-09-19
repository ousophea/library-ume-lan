<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Manipulation of Staffs
 *
 * @author OU Sophea <ousophea@gmail.com>
 */
class Report extends CI_Controller {

    /**
     * @var array
     */
    var $data = array('title' => null, 'content' => 'missing_view');

    /**
     * Constuctor
     */
    function __construct() {
        parent::__construct();
        $this->load->model(array('report/m_report'));
    }

    /**
     * Retrive report
     *
     * @author Ou Sophea<ousophea@gmail.com>
     * @access public
     * @return void
     */
    function index() {
        $this->data['title'] = 'Manage report';
        $this->data['content'] = 'report/report/index';

        $this->form_validation->set_rules('rep_edate', '', 'trim');
        $this->form_validation->set_rules('rep_sdate', '', 'trim');
//        $this->form_validation->set_rules('rep_trep_id', '', 'trim');
//        $this->form_validation->set_rules('rep_prep_id', '', 'trim');
        $this->form_validation->run();
//        $this->data['alltreport'] = $this->m_global->getDataArray(TABLE_PREFIX . 'type_report', 'trep_id', 'trep_title', 'trep_status');
//        $this->data['preport'] = $this->m_global->getDataArray(TABLE_PREFIX . 'visit_purpose', 'prep_id', 'prep_name', 'prep_status');
        $this->data['data'] = $this->m_report->findAllreport(PAGINGATION_PERPAGE, $this->uri->segment(4));
        pagination_config(base_url() . 'report/report/index', $this->m_report->countAllreport(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Create report
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @access public
     * @return void
     */
    function add() {
        $this->data['title'] = 'Add report';
        $this->data['content'] = 'report/report/add';
        $this->form_validation->set_rules('rep_edate', '', 'trim');
        $this->form_validation->set_rules('rep_sdate', '', 'trim');
        $this->form_validation->run();
        if ($this->form_validation->run() == FALSE) {
            $this->data['visitorNumber'] = $this->data['internetUse'] = $this->data['bookUse'] = $this->data['returnNumber'] = $this->data['borrowNumber'] = $this->data['setStart'] = $this->data['setEnd'] = "";
            $this->load->view(LAYOUT, $this->data);
        } else {
            if ($this->input->post('rep_programs') != "" && $this->input->post('rep_visitor_count') != "") {
                if ($this->m_report->add()) {
                    $this->session->set_flashdata('message', alert("report has been saved!", 'success'));
                    redirect('report/report/index');
                } else {
                    $this->session->set_flashdata('message', alert("report cannot be added, please try again", 'danger'));
                    redirect('report/report/add');
                }
            } else {
                $this->data['setStart'] = $this->input->post('rep_sdate');
                $this->data['setEnd'] = $this->input->post('rep_edate');
                $this->data['visitorNumber'] = $this->m_report->countAllVisitor();
                $this->data['internetUse'] = $this->m_report->countAllInternetUse();
                $this->data['bookUse'] = $this->m_report->countBookuse();
                $this->data['returnNumber'] = $this->m_report->countAllReturn();
                $this->data['borrowNumber'] = $this->m_report->countAllBorrow();
                $this->load->view(LAYOUT, $this->data);
            }
        }
    }

    /**
     * Update report
     *
     * @author OU Sophea <ousphea@gmail.com>
     * @param integer $id report id <segment(4)>
     * @access public
     * @return void
     */
    function edit($id = 0) {
        $this->data['title'] = 'Edit report Information';
        $this->data['content'] = 'report/report/edit';
        $rep_data = $this->data['data'] = $this->m_report->getreportById($id);

        $this->form_validation->set_rules('rep_edate', '', 'trim');
        $this->form_validation->set_rules('rep_sdate', '', 'trim');
          $this->form_validation->run();
        if ($this->input->post('getStatistics')) {
            $this->data['setStart'] = $this->input->post('rep_sdate');
            $this->data['setEnd'] = $this->input->post('rep_edate');
            $this->data['visitorNumber'] = $this->m_report->countAllVisitor();
            $this->data['internetUse'] = $this->m_report->countAllInternetUse();
            $this->data['bookUse'] = $this->m_report->countBookuse();
            $this->data['returnNumber'] = $this->m_report->countAllReturn();
            $this->data['borrowNumber'] = $this->m_report->countAllBorrow();
            $this->load->view(LAYOUT, $this->data);
        } else if ($this->input->post('submit')) {
            if ($this->m_report->update()) {
                $this->session->set_flashdata('message', alert("report has been updated!", 'success'));
                redirect('report/report/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("report cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('report/report/edit/' . $this->uri->segment(4) . $s5);
            }
        } else {
            $rep_data->result_array();
            $rep_data = $rep_data->result_array[0];
            $this->data['setStart'] = $rep_data['rep_sdate'];
            $this->data['setEnd'] = $rep_data['rep_edate'];
            $this->data['visitorNumber'] = $this->m_report->countAllVisitor();
            $this->data['internetUse'] = $this->m_report->countAllInternetUse();
            $this->data['bookUse'] = $this->m_report->countBookuse();
            $this->data['returnNumber'] = $this->m_report->countAllReturn();
            $this->data['borrowNumber'] = $this->m_report->countAllBorrow();
            $this->load->view(LAYOUT, $this->data);
        }
    }

    /**
     * Discard report
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @param integer $id report id <segment(4)>
     * @access public
     * @return void
     */
    function delete($id) {
        if ($this->m_report->deletereportById($id)) {
            $this->session->set_flashdata('message', alert("Report has been deleted!", 'success'));
            redirect('report/report/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Report cannot be deleted, please try again!", 'danger'));
            redirect('report/report/index/' . $this->uri->segment(5));
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
     * Export report to csv file
     */
    public function exportcsv() {
        $result = $this->m_report->exportcsv();
        if (query_to_csv($result, TRUE, 'Book-' . date('Y-m-d', time()) . '.csv')) {
            redirect('report/report/index/');
        }
    }

}

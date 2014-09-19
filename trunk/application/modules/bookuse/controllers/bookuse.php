<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Manipulation of Staffs
 *
 * @author Man Math <ousophea@gmail.com>
 */
class Bookuse extends CI_Controller {

    /**
     * @var array
     */
    var $data = array('title' => null, 'content' => 'missing_view');

    /**
     * Constuctor
     */
    function __construct() {
        parent::__construct();
        $this->load->model(array('bookuse/m_bookuse'));
    }

    /**
     * Retrive book
     *
     * @author Man Math <ousophea@gmail.com>
     * @access public
     * @return void
     */
    function index() {
        $this->data['title'] = 'Manage Book Usage';
        $this->data['content'] = 'bookuse/bookuse/index';

        $this->form_validation->set_rules('uboo_tboo_id', '', 'trim');
        $this->form_validation->set_rules('uboo_edate', '', 'trim');
        $this->form_validation->set_rules('uboo_sdate', '', 'trim');
        $this->form_validation->run();
        $this->data['tbookuse'] = $this->m_global->getDataArray(TABLE_PREFIX . 'type_of_book', 'tboo_id', 'tboo_title', 'tboo_status');
        $this->data['data'] = $this->m_bookuse->findAllBookuse(PAGINGATION_PERPAGE, $this->uri->segment(4));
        $this->data['ubookNumber'] = $this->m_bookuse->countBookuse();
        pagination_config(base_url() . 'bookuse/bookuse/index', $this->m_bookuse->countAllBookuse(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Create book
     *
     * @author Man Math <manmath4@gmail.com>
     * @access public
     * @return void
     */
    function add() {
        $this->data['title'] = 'Add Book Counting';
        $this->data['content'] = 'bookuse/bookuse/add';

        $config = array(
            array(
                'field' => 'uboo_number',
                'label' => 'Number of book',
                'rules' => 'required|numeric|greater_than[0.99]'
            ),
            array(
                'field' => 'boo_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
//        $this->form_validation->set_select('boo_author');
//        $this->form_validation->set_select('boo_maj_id');
//        $this->form_validation->set_select('boo_pub_id');
        $this->form_validation->set_checkbox('uboo_status');
        if ($this->form_validation->run() == FALSE) {
            $this->data['tbookuse'] = $this->m_global->getDataArray(TABLE_PREFIX . 'type_of_book', 'tboo_id', 'tboo_title', 'tboo_status');
//            $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'major', 'maj_id', 'maj_title', 'maj_status');
            $this->load->view(LAYOUT, $this->data);
//            echo "eerr";
        } else {
            if ($this->m_bookuse->add()) {
                $this->session->set_flashdata('message', alert("Book counting has been saved!", 'success'));
                redirect('bookuse/bookuse');
            } else {
                $this->session->set_flashdata('message', alert("Book counting cannot be added, please try again", 'danger'));
                redirect('bookuse/bookuse/add');
            }
        }
    }

    /**
     * Update book
     *
     * @author OU Sophea <ousphea@gmail.com>
     * @param integer $id book id <segment(4)>
     * @access public
     * @return void
     */
    function edit($id = 0) {
        $this->data['title'] = 'Edit book used Information';
        $this->data['content'] = 'bookuse/bookuse/edit';
        $this->data['data'] = $this->m_bookuse->getBookuseById($id);
        $config = array(
            array(
                'field' => 'uboo_number',
                'label' => 'Number of book',
                'rules' => 'required|numeric|greater_than[0.99]'
            ),
            array(
                'field' => 'uboo_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
//        $this->form_validation->set_select('sta_position');
//        $this->form_validation->set_select('sta_job_type');
//        $this->form_validation->set_select('sta_sex');
        $this->form_validation->set_checkbox('uboo_status');
        if ($this->form_validation->run() == FALSE) {
            $this->data['tbookuse'] = $this->m_global->getDataArray(TABLE_PREFIX . 'type_of_book', 'tboo_id', 'tboo_title', 'tboo_status');
            $this->load->view(LAYOUT, $this->data);
        } else {
            if ($this->m_bookuse->update()) {
                $this->session->set_flashdata('message', alert("Book used has been updated!", 'success'));
                redirect('bookuse/bookuse/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Book used cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('bookuse/bookuse/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    /**
     * Discard book
     *
     * @author Man Math <manmath4@gmail.com>
     * @param integer $id book id <segment(4)>
     * @access public
     * @return void
     */
    function delete($id) {
        if ($this->m_bookuse->deleteBookById($id)) {
            $this->session->set_flashdata('message', alert("Book has been deleted!", 'success'));
            redirect('bookuse/bookuse/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Staff account cannot be deleted, please try again!", 'danger'));
            redirect('bookuse/bookuse/index/' . $this->uri->segment(5));
        }
    }

    /**
     * View book profile
     *
     * @author Man Math <manmath4@gmail.com>
     * @param integer $id book id <segment(4)>
     * @access public
     * @return void
     */
    function view($id = null) {
        $this->data['title'] = 'View Book information';
        $this->data['content'] = 'bookuse/bookuse/view';

        $this->data['data'] = $this->m_bookuse->getBookById($id);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Validation unique field
     *
     * @author Man Math <manmath4@gmail.com>
     * @param string $str field to validate
     * @access public
     * @return boolean
     */
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
     * Export bookuse to csv file
     */
    public function exportcsv() {
        $result = $this->m_bookuse->exportcsv();
        if (query_to_csv($result, TRUE, 'Book-' . date('Y-m-d', time()) . '.csv')) {
            redirect('bookuse/bookuse/index/');
        }
    }

}

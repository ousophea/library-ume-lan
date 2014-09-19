<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Manipulation of Staffs
 *
 * @author Man Math <manmath4@gmail.com>
 */
class Books extends CI_Controller {

    /**
     * @var array
     */
    var $data = array('title' => null, 'content' => 'missing_view');

    /**
     * Constuctor
     */
    function __construct() {
        parent::__construct();
        $this->load->model(array('books/m_books'));
    }

    /**
     * Retrive book
     *
     * @author Man Math <ousophea@gmail.com>
     * @access public
     * @return void
     */
    function index() {
        $this->data['title'] = 'Manage Book';
        $this->data['content'] = 'books/books/index';

        $this->form_validation->set_rules('boo_major', '', 'trim');
        $this->form_validation->set_rules('boo_title', '', 'trim');
        $this->form_validation->set_rules('boo_isbn', '', 'trim');
        $this->form_validation->set_rules('boo_author', '', 'trim');
        $this->form_validation->set_rules('boo_status', '', 'trim');
        $this->form_validation->set_rules('boo_remark', '', 'trim');
        $this->form_validation->run();
//        $this->data['auther'] = $this->m_global->getDataArray(TABLE_PREFIX . 'auther', 'aut_id', 'aut_name', 'aut_status');
        $this->data['data'] = $this->m_books->findAllBooks(PAGINGATION_PERPAGE, $this->uri->segment(4));
        pagination_config(base_url() . 'books/books/index', $this->m_books->countAllBooks(), PAGINGATION_PERPAGE);
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
        $this->data['title'] = 'Add New Book';
        $this->data['content'] = 'books/books/add';

        $config = array(
            array(
                'field' => 'boo_isbn',
                'label' => 'Book ISBN',
                'rules' => 'required|numeric|greater_than[0.99]'
            ),
//            array(
//                'field' => 'boo_title',
//                'label' => 'Book title',
//                'rules' => 'trim|required|max_length[50]|min_length[3]'
//            ),
//            array(
//                'field' => 'boo_classification',
//                'label' => 'Classification',
//                'rules' => 'trim|max_length[50]|min_length[3]'
//            ),
//            array(
//                'field' => 'boo_amount',
//                'label' => 'Amount',
//                'rules' => 'trim|min_length[1]|max_length[30]'
//            ),
//            array(
//                'field' => 'boo_num_of_bookcase',
//                'label' => 'Book Case',
//                'rules' => 'trim|min_length[1]|max_length[30]'
//            ),
//            array(
//                'field' => 'boo_comment',
//                'label' => 'Comment',
//                'rules' => 'trim'
//            ),
//            array(
//                'field' => 'boo_remark',
//                'label' => 'Remark',
//                'rules' => 'trim'
//            ),
            array(
                'field' => 'boo_major',
                'label' => 'Major',
                'rules' => 'trim'
            ),
//            array(
//                'field' => 'boo_author',
//                'label' => 'Author',
//                'rules' => 'trim'
//            ),
//            array(
//                'field' => 'boo_publisher',
//                'label' => 'Publisher',
//                'rules' => 'trim'
//            ),
//            array(
//                'field' => 'boo_reg_date',
//                'label' => 'Create Date',
//                'rules' => 'trim|required'
//            ),
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
        $this->form_validation->set_checkbox('sta_status');
        if ($this->form_validation->run() == FALSE) {
//            $this->data['author'] = $this->m_global->getDataArray(TABLE_PREFIX . 'author', 'aut_id', 'aut_name', 'aut_status');
//            $this->data['major'] = $this->m_global->getDataArray(TABLE_PREFIX . 'major', 'maj_id', 'maj_title', 'maj_status');
            $this->load->view(LAYOUT, $this->data);
//            echo "eerr";
        } else {
            if ($this->m_books->add()) {
                $this->session->set_flashdata('message', alert("Book has been saved!", 'success'));
                redirect('books/books');
            } else {
                $this->session->set_flashdata('message', alert("Book cannot be added, please try again", 'danger'));
                redirect('books/books/add');
            }
        }
    }

    /**
     * Update book
     *
     * @author Man Math <manmath4@gmail.com>
     * @param integer $id book id <segment(4)>
     * @access public
     * @return void
     */
    function edit($id = 0) {
        $this->data['title'] = 'Edit Book Information';
        $this->data['content'] = 'books/books/edit';
        $this->data['data'] = $this->m_books->getBookById($id);
        $config = array(
            array(
                'field' => 'boo_isbn',
                'label' => 'Book ISBN',
                'rules' => 'required|numeric|greater_than[0.99]'
            ),
            array(
                'field' => 'boo_major',
                'label' => 'Major',
                'rules' => 'trim'
            ),
            array(
                'field' => 'boo_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
//        $this->form_validation->set_select('sta_position');
//        $this->form_validation->set_select('sta_job_type');
//        $this->form_validation->set_select('sta_sex');
        $this->form_validation->set_checkbox('sta_status');
        if ($this->form_validation->run() == FALSE) {
//            $this->data['positions'] = $this->m_global->getDataArray(TABLE_PREFIX . 'book_position', 'sta_pos_id', 'sta_pos_title', 'sta_pos_status');
//            $this->data['jobtypes'] = $this->m_global->getDataArray(TABLE_PREFIX . 'book_job_type', 'sta_job_id', 'sta_job_title', 'sta_job_status');
            $this->load->view(LAYOUT, $this->data);
        } else {
            if ($this->m_books->update()) {
                $this->session->set_flashdata('message', alert("Book has been updated!", 'success'));
                redirect('books/books/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Book cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('books/books/edit/' . $this->uri->segment(4) . $s5);
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
        if ($this->m_books->deleteBookById($id)) {
            $this->session->set_flashdata('message', alert("Book has been deleted!", 'success'));
            redirect('books/books/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Staff account cannot be deleted, please try again!", 'danger'));
            redirect('books/books/index/' . $this->uri->segment(5));
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
        $this->data['content'] = 'books/books/view';

        $this->data['data'] = $this->m_books->getBookById($id);
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
     * Export books to csv file
     */
    public function exportcsv() {
        $result = $this->m_books->exportcsv();
        if (query_to_csv($result, TRUE, 'Book-' . date('Y-m-d', time()) . '.csv')) {
            redirect('books/books/index/');
        }
    }

}

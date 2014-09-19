<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of borrows
 *
 * @author sochy.choeun
 */
class Borrows extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('borrows/m_borrows'));
    }

    /**
     * List borrow borrow
     */
    function index() {
        $this->data['title'] = 'Manage User Account';
        $this->data['content'] = 'borrows/borrows/index';

//        $this->form_validation->set_rules('use_name', '', 'trim');
//        $this->form_validation->set_rules('use_status', '', 'trim');
//        $this->form_validation->set_rules('use_email', '', 'trim|valid_email');
//
//        $this->form_validation->run();
        $this->data['data'] = $this->m_borrows->findAllBorrows(PAGINGATION_PERPAGE, $this->uri->segment(4));
//        $this->data['groups'] = $this->m_global->getDataArray(TABLE_PREFIX . 'groups', 'gro_id', 'gro_name', 'gro_status');
        pagination_config(base_url() . 'borrows/borrows/index', $this->m_borrows->countAllBorrows(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new borrow borrow
     */
    function add() {
        $this->data['title'] = 'Add new borrowing';
        $this->data['content'] = 'borrows/borrows/add';
        $config = array(
            array(
                'field' => 'bor_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);

//        $this->form_validation->set_rules('use_name', 'Username', 'required|max_length[50]|min_length[3]|is_unique[tbl_users.use_name]');
//        $this->form_validation->set_rules('use_email', 'Email', 'required|is_unique[tbl_users.use_email]');
//        $this->form_validation->set_rules('use_pass', 'Password', 'required|max_length[50]|min_length[6]');
//        $this->form_validation->set_rules('use_passc', 'Confirm Password', 'matches[use_pass]');
//        $this->form_validation->set_rules('use_email', 'Email', 'required|valid_email|is_unique[tbl_users.use_name]');
//        $this->form_validation->set_rules('groups[]', 'Group', 'trim');
        if ($this->form_validation->run() == FALSE) {
//            $this->data['books'] = $this->m_global->getDataArray(TABLE_PREFIX . 'books', 'boo_id', 'boo_title', array('boo_status'=>1));
            $this->data['books'] = $this->m_borrows->getDataArrayBook();
            $this->data['borrowers'] = $this->m_borrows->getDataArrayBorrower();
//            $this->data['borrowers'] = $this->m_global->getDataArray(TABLE_PREFIX . 'users', 'use_id', 'use_name', array('use_gro_id' => 4)); // member of library
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_borrows->add()) {
                $this->session->set_flashdata('message', alert("User borrow has been saved!", 'success'));
                redirect('borrows/borrows');
            } else {
                $this->session->set_flashdata('message', alert("User borrow cannot be added, please try again", 'danger'));
                redirect('borrows/borrows/add');
            }
        }
    }

    // $id = segment(4)
    function edit($id = 0) {

        $this->data['title'] = 'Edit Borrowing';
        $this->data['content'] = 'borrows/borrows/edit';
        $this->data['data'] = $this->m_borrows->getBorrowById($id);
        $config = array(
//            array(
//                'field' => 'use_name',
//                'label' => 'User Name',
//                'rules' => 'trim|is_unique[tbl_borrows.use_name]'
//            ),
//            array(
//                'field' => 'use_tel',
//                'label' => 'Mobile Phone',
//                'rules' => 'trim|min_length[9]|max_length[30]|is_unique[tbl_borrows.use_tel]'
//            ),
//            array(
//                'field' => 'use_email',
//                'label' => 'Email',
//                'rules' => 'trim|valid_email|is_unique[tbl_borrows.use_email]'
//            ),
            array(
                'field' => 'bor_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
//        $this->form_validation->set_checkbox('sta_status');
        if ($this->form_validation->run() == FALSE) {
//            $this->data['books'] = $this->m_global->getDataArray(TABLE_PREFIX . 'books', 'boo_id', 'boo_title', 'boo_status');
            $this->data['books'] = $this->m_borrows->getDataArrayBook();
            $this->data['borrowers'] = $this->m_borrows->getDataArrayBorrower();
//            $this->data['borrowers'] = $this->m_global->getDataArray(TABLE_PREFIX . 'users', 'use_id', 'use_name', array('use_gro_id' => 4)); // member of library
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_borrows->update()) {
                $this->session->set_flashdata('message', alert("User borrow has been updated!", 'success'));
                redirect('borrows/borrows/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("User borrow cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('borrows/borrows/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    // $id = segment(4)
    function delete($id) {
        if ($this->m_borrows->deleteBorrowById($id)) {
            $this->session->set_flashdata('message', alert("User borrow has been deleted!", 'success'));
            redirect('borrows/borrows/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("User borrow cannot be deleted, please try again!", 'danger'));
            redirect('borrows/borrows/index/' . $this->uri->segment(5));
        }
    }

    // $id = segment(4)
    function checkin($id) {
        if ($this->m_borrows->checkIn($id)) {
            $this->session->set_flashdata('message', alert("Book borrow has been return password!", 'success'));
            redirect('borrows/borrows/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Book borrow cannot be return, please try again!", 'danger'));
            redirect('borrows/borrows/index/' . $this->uri->segment(5));
        }
    }

    function extend($id) {
        if ($this->m_borrows->extendBorrow($id)) {
            $this->session->set_flashdata('message', alert("Book borrow has been extend!", 'success'));
            redirect('borrows/borrows/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Book borrow cannot be extend, please try again!", 'danger'));
            redirect('borrows/borrows/index/' . $this->uri->segment(5));
        }
    }

    function view($id = null) {

        $this->data['title'] = 'View User Group';
        $this->data['content'] = 'borrows/borrows/view';

        $this->data['data'] = $this->m_borrows->getGroupById($id);
        $this->load->view(LAYOUT, $this->data);
    }

    //====================== validation
    /**
     * 
     * @param type $str
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
            $this->form_validation->set_message('uniqueExcept', '%s already exist, please another one');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

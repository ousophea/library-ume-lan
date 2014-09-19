<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of members
 *
 * @author sochy.choeun
 */
class Members extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('members/m_members'));
    }

    /**
     * List member member
     */
    function index() {
        $this->data['title'] = 'Manage Member Of Library';
        $this->data['content'] = 'members/members/index';

        $this->form_validation->set_rules('use_name', '', 'trim');
        $this->form_validation->set_rules('use_status', '', 'trim');
        $this->form_validation->set_rules('use_email', '', 'trim|valid_email');

        $this->form_validation->run();
        $this->data['data'] = $this->m_members->findAllAccounts(PAGINGATION_PERPAGE, $this->uri->segment(4));
        $this->data['groups'] = $this->m_global->getDataArray(TABLE_PREFIX . 'groups', 'gro_id', 'gro_name', 'gro_status');
        pagination_config(base_url() . 'members/members/index', $this->m_members->countAllAccounts(), PAGINGATION_PERPAGE);
        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new member member
     */
    function add() {
        $this->data['title'] = 'Add new member';
        $this->data['content'] = 'members/members/add';
  $config = array(
            array(
                'field' => 'use_name',
                'label' => 'User Name',
                'rules' => 'trim|is_unique[tbl_users.use_name]'
            ),
            array(
                'field' => 'use_tel',
                'label' => 'Mobile Phone',
                'rules' => 'trim|min_length[9]|max_length[30]|is_unique[tbl_users.use_tel]'
            ),
            array(
                'field' => 'use_email',
                'label' => 'Email',
                'rules' => 'trim|valid_email|is_unique[tbl_users.use_email]'
            ),
            array(
                'field' => 'use_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_members->add()) {
                $this->session->set_flashdata('message', alert("Member has been saved!", 'success'));
                redirect('members/members');
            } else {
                $this->session->set_flashdata('message', alert("Member cannot be added, please try again", 'danger'));
                redirect('members/members/add');
            }
        }
    }

    // $id = segment(4)
    function edit($id = 0) {

        $this->data['title'] = 'Edit User';
        $this->data['content'] = 'members/members/edit';
        $this->data['data'] = $this->m_members->getUserById($id);
        $config = array(
            array(
                'field' => 'use_name',
                'label' => 'User Name',
                'rules' => 'trim'
            ),
            array(
                'field' => 'use_tel',
                'label' => 'Mobile Phone',
                'rules' => 'trim|min_length[9]|max_length[30]'
            ),
            array(
                'field' => 'use_email',
                'label' => 'Email',
                'rules' => 'trim|valid_email'
            ),
            array(
                'field' => 'use_status',
                'label' => '',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
        $this->form_validation->set_checkbox('sta_status');
        if ($this->form_validation->run() == FALSE) {
            $this->data['groups'] = $this->m_global->getDataArray(TABLE_PREFIX . 'groups', 'gro_id', 'gro_name', 'gro_status');
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_members->update()) {
                $this->session->set_flashdata('message', alert("Member has been updated!", 'success'));
                redirect('members/members/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("Member cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('members/members/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    // $id = segment(4)
    function delete($id) {
        if ($this->m_members->deleteUserById($id)) {
            $this->session->set_flashdata('message', alert("Member has been deleted!", 'success'));
            redirect('members/members/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Member cannot be deleted, please try again!", 'danger'));
            redirect('members/members/index/' . $this->uri->segment(5));
        }
    }
 // $id = segment(4)
    function resetPass($id) {
        if ($this->m_members->resetPassById($id)) {
            $this->session->set_flashdata('message', alert("Member has been reset password!", 'success'));
            redirect('members/members/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("Member cannot be reset, please try again!", 'danger'));
            redirect('members/members/index/' . $this->uri->segment(5));
        }
    }
    function view($id = null) {

        $this->data['title'] = 'View User Group';
        $this->data['content'] = 'members/members/view';

        $this->data['data'] = $this->m_members->getGroupById($id);
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

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of groups
 *
 * @author sochy.choeun
 */
class Groups extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('users/m_groups'));
    }

    /**
     * List user group
     */
    function index() {
        $this->data['title'] = 'Manage Groups';
        $this->data['content'] = 'users/groups/index';

        $this->form_validation->set_rules('gro_name','','trim');
        $this->form_validation->set_rules('gro_status','','trim');
        $this->form_validation->run();
        $this->data['data'] = $this->m_groups->findAllGroups(PAGINGATION_PERPAGE, $this->uri->segment(4));
        pagination_config(base_url() . 'users/groups/index', $this->m_groups->countAllGroups(), PAGINGATION_PERPAGE);
        

        $this->load->view(LAYOUT, $this->data);
    }

    /**
     * Add new user group
     */
    function add() {
        $this->data['title'] = 'Add new user group';
        $this->data['content'] = 'users/groups/add';

//        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $this->form_validation->set_rules('gro_name', 'Group Name', 'required|max_length[50]|min_length[2]|is_unique[tbl_groups.gro_name]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_groups->add()) {
                $this->session->set_flashdata('message', alert("User group has been saved!", 'success'));
                redirect('users/groups');
            } else {
                $this->session->set_flashdata('message', alert("User group cannot be added, please try again", 'danger'));
                redirect('users/groups/add');
            }
        }
    }

    function edit() {

        $this->data['title'] = 'Edit Group';
        $this->data['content'] = 'users/groups/edit';
        $this->data['data'] = $this->m_groups->getGroupById($this->uri->segment(4));

//        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $this->form_validation->set_rules('gro_name', 'Group Name', 'required|max_length[50]|min_length[2]|callback_uniqueExcept[' . TABLE_PREFIX . 'groups.gro_name,gro_id]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view(LAYOUT, $this->data);
        } else {

            if ($this->m_groups->update()) {
                $this->session->set_flashdata('message', alert("User group has been updated!", 'success'));
                redirect('users/groups/index/' . $this->uri->segment(5));
            } else {
                $this->session->set_flashdata('message', alert("User group cannot be updated, please try again", 'danger'));
                $s5($this->uri->segment(5)) ? '/' . $this->uri->segment(5) : ''; // for pagination
                redirect('users/groups/edit/' . $this->uri->segment(4) . $s5);
            }
        }
    }

    // $id = segment(4)
    function delete($id) {
        if ($this->m_groups->deleteGroupById($id)) {
            $this->session->set_flashdata('message', alert("User group has been deleted!", 'success'));
            redirect('users/groups/index/' . $this->uri->segment(5));
        } else {
            $this->session->set_flashdata('message', alert("User group cannot be deleted, please try again!", 'danger'));
            redirect('users/groups/index/' . $this->uri->segment(5));
        }
    }
    
    
    function view($id=null){
        
        $this->data['title'] = 'View User Group';
        $this->data['content'] = 'users/groups/view';
        
        $this->data['data'] = $this->m_groups->getGroupById($id);
        $this->load->view(LAYOUT,  $this->data);
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

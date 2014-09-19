<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_groups extends CI_Model {

    function findAllGroups($num_row, $from_row) {
        $this->db->order_by('gro_id', 'desc');

        if ($this->input->post('gro_name') != '') {
            $this->db->like('gro_name', $this->input->post('gro_name'));
        }
        
        if($this->input->post('gro_status')!=''){
            $this->session->set_userdata('gro_status', $this->input->post('gro_status'));
        }
        
        // if All status
        if($this->input->post('submit') && $this->input->post('gro_status')==''){
            $this->session->set_userdata('gro_status', '');
        }
        
        
        // Keep pagination for filter
        if ($this->session->userdata('gro_status') != '') {
            $this->db->where('gro_status', $this->session->userdata('gro_status'));
        }

        $this->db->limit($num_row, $from_row);
        return $this->db->get(TABLE_PREFIX . 'groups');
    }

    function countAllGroups() {

        if ($this->input->post('gro_name') != '') {
            $this->db->like('gro_name', $this->input->post('gro_name'));
        }
        // Keep pagination for filter
        if ($this->session->userdata('gro_status') != '') {
            $this->db->where('gro_status', $this->session->userdata('gro_status'));
        }
 
        $data = $this->db->get(TABLE_PREFIX . 'groups');
        return $data->num_rows();
    }

    /**
     * Add new group
     * @return true/false
     */
    function add() {
        $data = $this->input->post();
        $this->db->set('gro_created', 'NOW()', false);
        return $this->db->insert(TABLE_PREFIX . 'groups', $data);
    }

    /**
     * Edit a group
     * @return true/false
     */
    function update() {
        $data = $this->input->post();
        $this->db->where('gro_id', $this->uri->segment(4));
        $this->db->set('gro_modified', 'NOW()', false);
        // if checkbox is not checked
        if (empty($data['gro_status'])) {
            $this->db->set('gro_status', 0);
        }
        return $this->db->update(TABLE_PREFIX . 'groups', $data);
    }

    function getGroupById($id) {
        $this->db->where('gro_id', $id);
        return $this->db->get(TABLE_PREFIX . 'groups');
    }

    function deleteGroupById($id = null) {
        $this->db->where('gro_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'groups');
    }

}

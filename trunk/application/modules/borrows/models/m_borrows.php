<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Borrows extends CI_Model {

    function findAllBorrows($num_row, $from_row) {
        $this->db->order_by('bor_id', 'desc');

        if ($this->input->post('use_name') != '') {
            $this->db->like('use_name', $this->input->post('use_name'));
        }
        if ($this->input->post('boo_title') != '') {
            $this->db->like('boo_title', $this->input->post('boo_title'));
        }
        if ($this->input->post('bor_date') != '') {
            $this->db->like('bor_date', $this->input->post('bor_date'));
        }
        if ($this->input->post('bor_status') != '') {
            $this->session->set_userdata('bor_status', $this->input->post('bor_status'));
        }
        if ($this->input->post('submit') && $this->input->post('bor_status') == '') {
            $this->session->set_userdata('bor_status', '');
        }
        if ($this->session->userdata('bor_status') != '') {
            if ($this->session->userdata('bor_status') == 2) { // Late  return
                $this->db->where('bor_return_date <', date('Y-m-d'));
                $this->db->where('bor_status', 1);
            } elseif ($this->session->userdata('bor_status') == 3) { // Late  return
                $this->db->where('bor_return_date', date('Y-m-d'));
                $this->db->where('bor_status', 1);
            } else {
                $this->db->where('bor_status', $this->session->userdata('bor_status'));
            }
        }
//        ==============For link from dashboard ===================
        if ($this->uri->segment(4) == "late") {
            $this->db->where('bor_return_date <', date('Y-m-d'));
            $this->db->where('bor_status', 1);
        }

        if ($this->uri->segment(4) == "dateline") {
            $this->db->where('bor_return_date =', date('Y-m-d'));
            $this->db->where('bor_status', 1);
        }


//        // Keep pagination for filter group
//        if ($this->input->post('use_gro_id') && $this->input->post('use_gro_id') != '') {
//            $this->session->set_userdata('use_gro_id', $this->input->post('use_gro_id'));
//        }
//        if ($this->input->post('submit') && $this->input->post('use_gro_id') == '') {
//            $this->session->set_userdata('use_gro_id', '');
//        }
//        if ($this->session->userdata('use_gro_id') && $this->session->userdata('use_gro_id') != '') {
//            $this->db->where('use_gro_id', $this->session->userdata('use_gro_id'));
//        }
        //-----------------------

        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'borrowing');
        $this->db->join(TABLE_PREFIX . 'users', 'bor_bor_id=use_id');
        $this->db->join(TABLE_PREFIX . 'books', 'bor_boo_id=boo_id');
//        $this->db->group_by('use_id');
        return $this->db->get();
    }

    function getDataArrayBook() {
        $this->db->select('boo_id,boo_title from tbl_books book 
where book.boo_id not in 
(select boo.boo_id from tbl_books boo
	left join (SELECT bor_boo_id,count(bor.bor_boo_id) as number 
	FROM tbl_borrowing bor where bor.bor_status = 1 
	group by bor_boo_id) as borrow on boo.boo_id = borrow.bor_boo_id 
	where borrow.number >= boo.boo_amount) and `book`.`boo_status` = 1');
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result[$row['boo_id']] = $row['boo_title'];
            }
        }
        return $result;
    }

    function getDataArrayBorrower() {
        $this->db->select('use_id,use_name from tbl_users
where use_id not in(
	select bor_bor_id from 
		(select bor.bor_bor_id, count(bor.bor_bor_id) as borrow 
		from tbl_borrowing bor
		where bor.bor_status = 1
		group by bor.bor_bor_id) as countUser where borrow >= 2)
and use_gro_id =4 and use_status =1');
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result[$row['use_id']] = $row['use_name'];
            }
        }
        return $result;
    }

    function countAllBorrows() {
        if ($this->input->post('use_name') != '') {
            $this->db->like('use_name', $this->input->post('use_name'));
        }
        if ($this->input->post('boo_title') != '') {
            $this->db->like('boo_title', $this->input->post('boo_title'));
        }
        if ($this->input->post('bor_date') != '') {
            $this->db->like('bor_date', $this->input->post('bor_date'));
        }
        if ($this->session->userdata('bor_status') != '') {
            if ($this->session->userdata('bor_status') == 2) { // Late  return
                $this->db->where('bor_return_date <', date('Y-m-d'));
            } else {
                $this->db->where('bor_status', $this->session->userdata('bor_status'));
            }
        }
        // Keep pagination for filter status
//        if ($this->input->post('bor_status') != '') {
//            $this->session->set_borrdata('bor_status', $this->input->post('bor_status'));
//        }
//        if ($this->input->post('submit') && $this->input->post('bor_status') == '') {
//            $this->session->set_borrdata('bor_status', '');
//        }
//        if ($this->session->borrdata('bor_status') != '') {
//            $this->db->where('bor_status', $this->session->userdata('use_status'));
//        }
//        // Keep pagination for filter group
//        if ($this->input->post('tbl_groups_gro_id') && $this->input->post('tbl_groups_gro_id') != '') {
//            $this->session->set_userdata('tbl_groups_gro_id', $this->input->post('tbl_groups_gro_id'));
//        }
//        if ($this->input->post('submit') && $this->input->post('tbl_groups_gro_id') == '') {
//            $this->session->set_userdata('tbl_groups_gro_id', '');
//        }
//        if ($this->session->userdata('tbl_groups_gro_id') && $this->session->userdata('tbl_groups_gro_id') != '') {
//            $this->db->where('tbl_groups_gro_id', $this->session->userdata('tbl_groups_gro_id'));
//        }
        //-----------------------

        $this->db->from(TABLE_PREFIX . 'borrowing');
        $this->db->join(TABLE_PREFIX . 'users', 'bor_use_id=use_id');
        $this->db->join(TABLE_PREFIX . 'books', 'bor_boo_id=boo_id');
//        $this->db->group_by('use_id');
        $data = $this->db->get();
        return $data->num_rows();
    }

    /**
     * Add new group
     * @return true/false
     */
    function add() {
        $data = $this->input->post();
//        $groups = $data['groups'];
//        unset($data['use_passc']);
//        unset($data['group']);
//        $data['use_pass'] = "1234567";
        $getuser = $this->session->userdata('user');
        $this->db->set('bor_date', 'NOW()', false);
//        $this->db->set('bor_use_id', 1, false); // user to be change
        $this->db->set('bor_use_id', $getuser['use_id'], false);
//        $result = $this->db->insert(TABLE_PREFIX . 'borrowing', $data);
        if (empty($data['bor_status'])) {
            $this->db->set('bor_status', 1);
        }
        $result = $this->db->insert(TABLE_PREFIX . 'borrowing', $data);
//        //==========update book avaible ==========
//        $this->db->where('boo_id', $this->input->post('bor_boo_id'));
//        $this->db->set('boo_avaible_amount', 'boo_avaible_amount - 1', false);
//        $this->db->update(TABLE_PREFIX . 'books');

        return $result;
    }

    /**
     * Edit a group
     * @return true/false
     */
    function update() {
        $getuser = $this->session->userdata('user');
        $data = $this->input->post();
        $this->db->where('bor_id', $this->uri->segment(4));
        $this->db->set('bor_modified', 'NOW()', false);
        $this->db->set('bor_use_id', $getuser['use_id'], false);
        // if checkbox is not checked
        if (empty($data['bor_status'])) {
            $this->db->set('bor_status', 1);
        }

        $result = $this->db->update(TABLE_PREFIX . 'borrowing', $data);

        return $result;
    }

    function getBorrowById($id) {
        $this->db->where('bor_id', $id);
        $this->db->join(TABLE_PREFIX . 'books', 'bor_boo_id=boo_id');
        $this->db->join(TABLE_PREFIX . 'users', 'bor_bor_id=use_id');
        return $this->db->get(TABLE_PREFIX . 'borrowing');
    }

    function deleteBorrowById($id = null) {
        $this->db->where('bor_id', $id);
        $this->db->set('bor_status', '2', false); // blog fro user view
        return $this->db->update(TABLE_PREFIX . 'borrowing');
    }

    function checkIn($id = null) {
        $this->db->where('bor_id', $id);
        $this->db->set('bor_modified', 'NOW()', false);
        $this->db->set('bor_return_date', 'NOW()', false);
        $this->db->set('bor_status', '0', false);
        return $this->db->update(TABLE_PREFIX . 'borrowing');
    }

    function extendBorrow($id = null) {
        $ret_date = date('Y-m-d', strtotime("+ 15 days"));
        $this->db->where('bor_id', $id);
        $this->db->set('bor_modified', 'NOW()', false);
        $this->db->set('bor_extend_date ', "'$ret_date'", false);
//        $this->db->set('bor_status', '0', false);
        return $this->db->update(TABLE_PREFIX . 'borrowing');
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Books extends CI_Model {

    /**
     * Filter staff
     *
     * @param integer $num_row
     * @param integer $from_row
     * @return array
     */
    function findAllBooks($num_row, $from_row) {
//		$this->db->select(array('b.*', 'a.aut_name'));
        $this->db->order_by('b.boo_id', 'desc');

        if ($this->input->post('boo_title') != '') {
            $this->db->like('b.boo_title', $this->input->post('boo_title'));
        }
        if ($this->input->post('boo_isbn') != '') {
            $this->db->like('boo_isbn', $this->input->post('boo_isbn'));
        }
        if ($this->input->post('boo_major') != '') {
            $this->db->like('boo_major', $this->input->post('boo_major'));
        }
          if ($this->input->post('boo_author') != '') {
            $this->db->like('boo_author', $this->input->post('boo_author'));
        }
                  if ($this->input->post('boo_remark') != '') {
            $this->db->like('boo_remark', $this->input->post('boo_remark'));
        }
        // Keep pagination for filter status
		// Keep pagination for filter status
		if ($this->input->post('boo_status') != '') {
			$this->session->set_userdata('boo_status', $this->input->post('boo_status'));
		}
		if ($this->input->post('submit') && $this->input->post('boo_status') == '') {
			$this->session->set_userdata('boo_status', '');
		}
		if ($this->session->userdata('boo_status') != '') {
			$this->db->where('boo_status', $this->session->userdata('boo_status'));
		}

//		$this->db->where('b.boo_status ==1');
        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'books b');
//		$this->db->join(TABLE_PREFIX . 'auther a', 'a.aut_id = b.boo_aut_id');
//		$this->db->join(TABLE_PREFIX . 'major m', 'm.maj_id = b.boo_maj_id');
//		$this->db->group_by('boo_major');
        return $this->db->get();
    }

    /**
     * Count all books record
     *
     * @author Man Math <manmath4@gmail.com>
     * @access public
     * @return integer
     */
    function countAllBooks() {

        // Keep pagination for filter status
        if ($this->input->post('boo_status') != '') {
            $this->session->set_userdata('boo_status', $this->input->post('boo_tatus'));
        }
        if ($this->input->post('submit') && $this->input->post('boo_status') == '') {
            $this->session->set_userdata('boo_status', '');
        }
        if ($this->session->userdata('boo_status') != '') {
            $this->db->where('boo_status', $this->session->userdata('boo_status'));
        }

//		$this->db->where('sta_position !=', 'Teacher');
        $this->db->from(TABLE_PREFIX . 'books');
        $this->db->group_by('boo_id');
        $data = $this->db->get();
        $totalBook = $data->num_rows();
//        echo $resalt;
        $this->session->userdata('totalBook', $totalBook);
        return $totalBook;
    }

    /**
     * Create staff
     *
     * @author Man Math <manmath4@gmail.com>
     * @access public
     * @return boolean
     */
    function add() {
        $data = $this->input->post();
        $this->db->set('boo_reg_date', 'NOW()', false);
//		$this->db->set('tbl_users_use_id', 1); // TODO: need to be changed
           if (empty($data['boo_status'])) {
            $this->db->set('boo_status', 0);
        }
        $result = $this->db->insert(TABLE_PREFIX . 'books', $data);
        return $result;
    }

    /**
     * Update staff
     *
     * @author Man Math <manmath4@gmail.com>
     * @access public
     * @return boolean
     */
    function update() {
        $data = $this->input->post();
        $this->db->where('boo_id', $this->uri->segment(4));
        $this->db->set('boo_mod_date', 'NOW()', false);
        // if checkbox is not checked
        if (empty($data['boo_status'])) {
            $this->db->set('boo_status', 0);
        }
        return $this->db->update(TABLE_PREFIX . 'books', $data);
    }

    /**
     * Retrive books by id
     *
     * @author Man Math <manmath4@gmail.com>
     * @param integer $id books id
     * @access public
     * @return array
     */
    function getBookById($id) {
//        $this->db->select(array('s.*', 'p.sta_pos_title', 'j.sta_job_title'));
        $this->db->from(TABLE_PREFIX . 'books b');
//        $this->db->join(TABLE_PREFIX . 'staff_position p', 'p.sta_pos_id = s.sta_position');
//        $this->db->join(TABLE_PREFIX . 'staff_job_type j', 'j.sta_job_id = s.sta_job_type');
        $this->db->where('b.boo_id', $id);
        return $this->db->get();
    }

    /**
     * Discard staff
     *
     * @author Man Math <manmath4@gmail.com>
     * @param integer $id staff id
     * @access public
     * @return boolean
     */
    function deleteBookById($id = null) {
        $this->db->where('boo_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'books');
    }

    /**
     * Select books record to be render to csv
     *
     * @return array/mixed
     */
    public function exportcsv() {
        $fields = array(
            'b.boo_title AS `Title`',
            'b.boo_major AS `Major`',
            'b.boo_classification AS Classification',
             'b.boo_isbn AS `Book ISBN`',
            'boo_amount AS `Number of Book`',
            'b.boo_publisher AS Publisher',
            'boo_author AS `Job Author`',
            'boo_num_of_bookcase AS `# Of Bookcase`',
            'boo_remark AS `Remark`',
            'boo_reg_date AS `Create Date`',
             'boo_comment AS `Comment`'
        );
        $this->db->select($fields)
                ->from(TABLE_PREFIX . 'books b');
//                ->join(TABLE_PREFIX . 'staff_position p', 'p.sta_pos_id = s.sta_position')
//                ->join(TABLE_PREFIX . 'staff_job_type j', 'j.sta_job_id = s.sta_job_type')
//                ->where('b.boo_id', 1);
        return $this->db->get();
    }

}

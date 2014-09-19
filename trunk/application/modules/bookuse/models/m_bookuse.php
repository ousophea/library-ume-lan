<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Bookuse extends CI_Model {

    /**
     * Filter staff
     *
     * @param integer $num_row
     * @param integer $from_row
     * @return array
     */
    function findAllBookuse($num_row, $from_row) {
//		$this->db->select(array('b.*', 'a.aut_name'));
        $this->db->order_by('uboo_cdate', 'desc');

//        if ($this->input->post('boo_title') != '') {
//            $this->db->like('b.boo_title', $this->input->post('boo_title'));
//        }
//        if ($this->input->post('boo_isbn') != '') {
//            $this->db->like('boo_isbn', $this->input->post('boo_isbn'));
//        }
//        if ($this->input->post('boo_major') != '') {
//            $this->db->like('boo_major', $this->input->post('boo_major'));
//        }
//          if ($this->input->post('boo_author') != '') {
//            $this->db->like('boo_author', $this->input->post('boo_author'));
//        }
//                  if ($this->input->post('boo_remark') != '') {
//            $this->db->like('boo_remark', $this->input->post('boo_remark'));
//        }
//        // Keep pagination for filter book type
        // Keep pagination for filter status
//		if ($this->input->post('uboo_tboo_id') != '') {
//			$this->session->set_userdata('uboo_tboo_id', $this->input->post('uboo_tboo_id'));
//		}
//		if ($this->input->post('submit') && $this->input->post('uboo_tboo_id') == '') {
//			$this->session->set_userdata('uboo_tboo_id', '');
//		}
//		if ($this->session->userdata('uboo_tboo_id') != '') {
//			$this->db->where('uboo_tboo_id', $this->session->userdata('uboo_tboo_id'));
//		}
        if ($this->input->post('uboo_tboo_id') != '') {
            $this->db->like('uboo_tboo_id', $this->input->post('uboo_tboo_id'));
        }
        if ($this->input->post('uboo_sdate') != '') {
            $this->db->where('uboo_cdate >=', $this->input->post('uboo_sdate'));
        }
        if ($this->input->post('uboo_edate') != '') {
            $this->db->where('uboo_cdate <=', $this->input->post('uboo_edate'));
        }
        $this->db->where('uboo_status =1');
        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'bookuse b');
        $this->db->join(TABLE_PREFIX . 'type_of_book tb', 'b.uboo_tboo_id = tb.tboo_id');
        $this->db->join(TABLE_PREFIX . 'users u', 'b.uboo_cuse_id = u.use_id');
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
    function countAllBookuse() {

        // Keep pagination for filter book type
        if ($this->input->post('uboo_tboo_id') != '') {
            $this->db->like('uboo_tboo_id', $this->input->post('uboo_tboo_id'));
        }
        if ($this->input->post('uboo_sdate') != '') {
            $this->db->where('uboo_cdate >=', $this->input->post('uboo_sdate'));
        }
        if ($this->input->post('uboo_edate') != '') {
            $this->db->where('uboo_cdate <=', $this->input->post('uboo_edate'));
        }

        $this->db->from(TABLE_PREFIX . 'bookuse');
        $this->db->group_by('uboo_id');
        $data = $this->db->get();
        $totalBookuse = $data->num_rows();
//        echo $resalt;
        $this->session->userdata('totalBookuse', $totalBookuse);
        return $totalBookuse;
    }

    function countBookuse() {
        // Keep pagination for filter book type
        if ($this->input->post('uboo_tboo_id') != '') {
            $this->db->like('uboo_tboo_id', $this->input->post('uboo_tboo_id'));
        }
        if ($this->input->post('uboo_sdate') != '') {
            $this->db->where('uboo_cdate >=', $this->input->post('uboo_sdate'));
        }
        if ($this->input->post('uboo_edate') != '') {
            $this->db->where('uboo_cdate <=', $this->input->post('uboo_edate'));
        }
        $this->db->select("sum(ub.uboo_number) as number,tb.tboo_title");
        $this->db->from(TABLE_PREFIX . 'bookuse ub');
        $this->db->join(TABLE_PREFIX . 'type_of_book tb', 'ub.uboo_tboo_id = tb.tboo_id');
        $this->db->group_by('ub.uboo_tboo_id');
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result[$row['tboo_title']] = $row['number'];
            }
        }
        return $result;
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
        $this->db->set('uboo_cdate', 'NOW()', false);
        $this->db->set('uboo_cuse_id', 1); // TODO: need to be changed
        if (empty($data['uboo_status'])) {
            $this->db->set('uboo_status', 0);
        }
        $result = $this->db->insert(TABLE_PREFIX . 'bookuse', $data);
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
        $this->db->where('uboo_id', $this->uri->segment(4));
        $this->db->set('uboo_mdate', 'NOW()', false);
        // if checkbox is not checked
        if (empty($data['uboo_status'])) {
            $this->db->set('uboo_status', 0);
        }
         $this->db->set('uboo_cuse_id', 1); // TODO: need to be changed
        return $this->db->update(TABLE_PREFIX . 'bookuse', $data);
    }

    /**
     * Retrive books by id
     *
     * @author Man Math <manmath4@gmail.com>
     * @param integer $id books id
     * @access public
     * @return array
     */
    function getBookuseById($id) {
//        $this->db->select(array('s.*', 'p.sta_pos_title', 'j.sta_job_title'));
        $this->db->from(TABLE_PREFIX . 'bookuse ub');
        $this->db->join(TABLE_PREFIX . 'type_of_book tb', 'ub.uboo_tboo_id = tb.tboo_id');
        $this->db->where('ub.uboo_id', $id);
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

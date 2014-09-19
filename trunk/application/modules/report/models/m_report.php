<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Report extends CI_Model {

    /**
     * Filter report
     *
     * @param integer $num_row
     * @param integer $from_row
     * @return array
     */
    function findAllreport($num_row, $from_row) {

        $this->db->order_by('rep_cdate', 'desc');


        if ($this->input->post('rep_sdate') != '') {
            $this->db->where('rep_sdate >=', $this->input->post('rep_sdate'));
        }
        if ($this->input->post('rep_edate') != '') {
            $this->db->where('rep_edate <=', $this->input->post('rep_edate'));
        }
        $this->db->where('rep_status =1');
        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'report');
        return $this->db->get();
    }

    /**
     * Count all books record
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @access public
     * @return integer
     */
    function countAllreport() {

        // Keep pagination for filter report

        if ($this->input->post('rep_sdate') != '') {
            $this->db->where('rep_sdate >=', $this->input->post('rep_sdate'));
        }
        if ($this->input->post('rep_edate') != '') {
            $this->db->where('rep_edate <=', $this->input->post('rep_edate'));
        }

        $this->db->from(TABLE_PREFIX . 'report');
        $data = $this->db->get();
        return $data->num_rows();
    }

    function countAllVisitor() { //////// Count all visitor both UME student of Public
        // Keep pageinformation about Visitor
        if ($this->input->post('rep_sdate') != '') {
            $this->db->where('vis_cdate >=', $this->input->post('rep_sdate'));
        }
        if ($this->input->post('rep_edate') != '') {
            $this->db->where('vis_cdate <=', $this->input->post('rep_edate'));
        }

        $this->db->select("count(vis.vis_id) as number,tv.tvis_title");
        $this->db->from(TABLE_PREFIX . 'visitor vis');
        $this->db->join(TABLE_PREFIX . 'type_visitor tv', 'vis.vis_tvis_id = tv.tvis_id');
        $this->db->group_by('vis.vis_tvis_id');
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result[$row['tvis_title']] = $row['number'];
            }
        }
        return $result;
    }

    function countAllInternetUse() { ///// Check for use fo internet visitor
        // Keep pageinformation about user using of internet
        if ($this->input->post('rep_sdate') != '') {
            $this->db->where('vis_cdate >=', $this->input->post('rep_sdate'));
        }
        if ($this->input->post('rep_edate') != '') {
            $this->db->where('vis_cdate <=', $this->input->post('rep_edate'));
        }
        $this->db->select("count(vis.vis_pvis_id) as number");
        $this->db->from(TABLE_PREFIX . 'visitor vis');
        $this->db->join(TABLE_PREFIX . 'visit_purpose pv', 'vis.vis_pvis_id = pv.pvis_id');
        $this->db->where('vis.vis_pvis_id =', 3); //======Internet==========
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result = $row['number'];
            }
        }
        return $result;
    }

    function countBookuse() { //////// Count using of book in library
        // Keep pagination for filter book type
        // Keep pageinformation about Visitor
        if ($this->input->post('rep_sdate') != '') {
            $this->db->where('uboo_cdate >=', $this->input->post('rep_sdate'));
        }
        if ($this->input->post('rep_edate') != '') {
            $this->db->where('uboo_cdate <=', $this->input->post('rep_edate'));
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

    function countAllBorrow() { ///// count borrowing book
        // Keep page information about Borrowing of book
        if ($this->input->post('rep_sdate') != '') {
            $this->db->where('bor_date >=', $this->input->post('rep_sdate'));
        }
        if ($this->input->post('rep_edate') != '') {
            $this->db->where('bor_date <=', $this->input->post('rep_edate'));
        }
        $this->db->select("count(bor_id) as number");
        $this->db->from(TABLE_PREFIX . 'borrowing ');
        $this->db->where('bor_status', 1); //======Internet==========
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result = $row['number'];
            }
        }
        return $result;
    }

    function countAllReturn() { ///// count return book
        // Keep page information about return of book
        if ($this->input->post('rep_sdate') != '') {
            $this->db->where('bor_return_date >=', $this->input->post('rep_sdate'));
        }
        if ($this->input->post('rep_edate') != '') {
            $this->db->where('bor_return_date <=', $this->input->post('rep_edate'));
        }
        $this->db->select("count(bor_id) as number");
        $this->db->from(TABLE_PREFIX . 'borrowing ');
        $this->db->where('bor_status', 0); //======Internet==========
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result = $row['number'];
            }
        }
        return $result;
    }

    /**
     * Create staff
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @access public
     * @return boolean
     */
    function add() {
        if ($_POST) {
            $data = $this->input->post();
            unset($data['rep_visitor_count']);
            $this->db->set('rep_cdate', 'NOW()', false);
            $result = $this->db->insert(TABLE_PREFIX . 'report', $data);
            return $result;
        }
    }

    /**
     * Update staff
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @access public
     * @return boolean
     */
    function update() {
        $data = $this->input->post();
        unset($data['rep_visitor_count']);
        unset($data['submit']);
        $this->db->where('rep_id', $this->uri->segment(4));
        return $this->db->update(TABLE_PREFIX . 'report', $data);
    }

    /**
     * Retrive books by id
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @param integer $id books id
     * @access public
     * @return array
     */
    function getReportById($id) {
//        $this->db->select(array('s.*', 'p.sta_pos_title', 'j.sta_job_title'));
        $this->db->from(TABLE_PREFIX . 'report');
        $this->db->where('rep_id', $id);
        return $this->db->get();
    }

    /**
     * Discard staff
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @param integer $id staff id
     * @access public
     * @return boolean
     */
    function deletereportById($id = null) {
        $this->db->where('rep_id', $id);
        $this->db->set('rep_status', '0', false);
        return $this->db->update(TABLE_PREFIX . 'report', $data);
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

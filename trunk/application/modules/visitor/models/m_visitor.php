<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Visitor extends CI_Model {

    /**
     * Filter visitor
     *
     * @param integer $num_row
     * @param integer $from_row
     * @return array
     */
    function findAllVisitor($num_row, $from_row) {

        $this->db->order_by('vis_cdate', 'desc');

        if ($this->input->post('vis_tvis_id') != '') {
            $this->db->like('vis_tvis_id', $this->input->post('vis_tvis_id'));
        }
        if ($this->input->post('vis_pvis_id') != '') {
            $this->db->like('vis_pvis_id', $this->input->post('vis_pvis_id'));
        }
        if ($this->input->post('vis_sex') != '') {
            $this->db->like('vis_sex', $this->input->post('vis_sex'));
        }
        if ($this->input->post('vis_sdate') != '') {
            $this->db->where('vis_cdate >=', $this->input->post('vis_sdate'));
        }
        if ($this->input->post('vis_edate') != '') {
            $this->db->where('vis_cdate <=', $this->input->post('vis_edate'));
        }
        $this->db->where('vis_status =1');
        $this->db->limit($num_row, $from_row);
        $this->db->from(TABLE_PREFIX . 'visitor vi');
        $this->db->join(TABLE_PREFIX . 'type_visitor tv', 'vi.vis_tvis_id = tv.tvis_id');
        $this->db->join(TABLE_PREFIX . 'visit_purpose pv', 'vi.vis_pvis_id = pv.pvis_id');
        $this->db->join(TABLE_PREFIX . 'users u', 'vi.vis_use_id = u.use_id');
        return $this->db->get();
    }

    /**
     * Count all books record
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @access public
     * @return integer
     */
    function countAllVisitor() {

        // Keep pagination for filter visitor
        if ($this->input->post('vis_tvis_id') != '') {
            $this->db->like('vis_tvis_id', $this->input->post('vis_tvis_id'));
        }
        if ($this->input->post('vis_pvis_id') != '') {
            $this->db->like('vis_pvis_id', $this->input->post('vis_pvis_id'));
        }
        if ($this->input->post('vis_sex') != '') {
            $this->db->like('vis_sex', $this->input->post('vis_sex'));
        }
        if ($this->input->post('vis_sdate') != '') {
            $this->db->where('vis_cdate >=', $this->input->post('vis_sdate'));
        }
        if ($this->input->post('vis_edate') != '') {
            $this->db->where('vis_cdate <=', $this->input->post('vis_edate'));
        }

        $this->db->from(TABLE_PREFIX . 'visitor vi');
        $this->db->join(TABLE_PREFIX . 'type_visitor tv', 'vi.vis_tvis_id = tv.tvis_id');
        $this->db->join(TABLE_PREFIX . 'visit_purpose pv', 'vi.vis_pvis_id = pv.pvis_id');
        $this->db->join(TABLE_PREFIX . 'users u', 'vi.vis_use_id = u.use_id');
        $this->db->group_by('vis_id');
        $data = $this->db->get();
        return $data->num_rows();
    }

    function countVisitor() {
        // Keep pagination for filter book type
//        if ($this->input->post('uboo_tboo_id') != '') {
//            $this->db->like('uboo_tboo_id', $this->input->post('uboo_tboo_id'));
//        }
//        if ($this->input->post('uboo_sdate') != '') {
//            $this->db->where('uboo_cdate >=', $this->input->post('uboo_sdate'));
//        }
//        if ($this->input->post('uboo_edate') != '') {
//            $this->db->where('uboo_cdate <=', $this->input->post('uboo_edate'));
//        }
        $this->db->select("sum(ub.uboo_number) as number,tb.tboo_title");
        $this->db->from(TABLE_PREFIX . 'visitor ub');
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
     * @author OU Sophea <ousophea@gmail.com>
     * @access public
     * @return boolean
     */
    function add() {
        if ($_POST) {
            $data = $this->input->post(); //        $this->db->set('vis_cdate', 'NOW()', false);
            $arraydata = array();
            for ($i = 0; $i < count($data['vis_name']); $i++) {
                $arraydata[$i] = array(
                    'vis_name' => $data['vis_name'][$i],
                    'vis_sex' => $data['vis_sex'][$i],
                    'vis_tvis_id' => $data['vis_tvis_id'][$i],
                    'vis_pvis_id' => $data['vis_pvis_id'][$i],
                    'vis_from' => $data['vis_from'][$i],
                    'vis_position' => $data['vis_position'][$i],
                    'vis_year_of_study' => $data['vis_year_of_study'][$i],
                     'vis_tel' => $data['vis_tel'][$i],
                     'vis_email' => $data['vis_email'][$i],
                     'vis_comment' => $data['vis_comment'][$i],
//                     'vis_cdate' => 'NOW()',
                    'vis_use_id' => 1, // TODO: need to be changed
                    'vis_status' => 1
                );
            }
            $result = $this->db->insert_batch(TABLE_PREFIX . 'visitor', $arraydata);
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
        $this->db->where('vis_id', $this->uri->segment(4));
        $this->db->set('vis_mdate', 'NOW()', false);
        // if checkbox is not checked
//        if (empty($data['uboo_status'])) {
//            $this->db->set('uboo_status', 0);
//        }
        $this->db->set('vis_use_id', 1); // TODO: need to be changed
        return $this->db->update(TABLE_PREFIX . 'visitor', $data);
    }

    /**
     * Retrive books by id
     *
     * @author OU Sophea <ousophea@gmail.com>
     * @param integer $id books id
     * @access public
     * @return array
     */
    function getVisitorById($id) {
//        $this->db->select(array('s.*', 'p.sta_pos_title', 'j.sta_job_title'));
        $this->db->from(TABLE_PREFIX . 'visitor vi');
                $this->db->join(TABLE_PREFIX . 'type_visitor tv', 'vi.vis_tvis_id = tv.tvis_id');
        $this->db->join(TABLE_PREFIX . 'visit_purpose pv', 'vi.vis_pvis_id = pv.pvis_id');
        $this->db->join(TABLE_PREFIX . 'users u', 'vi.vis_use_id = u.use_id');
        $this->db->where('vi.vis_id', $id);
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
    function deleteVisitorById($id = null) {
        $this->db->where('vis_id', $id);
        return $this->db->delete(TABLE_PREFIX . 'visitor');
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

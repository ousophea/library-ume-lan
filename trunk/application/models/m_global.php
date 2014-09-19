<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_global extends CI_Model {
    
    /**
     * 
     * @param string $table_name
     * @param string $field_key
     * @param string $field_value
     * @param string $field_status
     * @param int $status_value 1 or 0
     * @return array
     */
    function getDataArray($table_name, $field_key,$field_value, $field_status, $status_value=1){
        $this->db->select($field_key.','.$field_value);
        $this->db->where($field_status, $status_value);
        $this->db->from($table_name);
        $data = $this->db->get();
        $result = array();
        if($data->num_rows() > 0){
            foreach ($data->result_array() as $row) {
                $result[$row[$field_key]] = $row[$field_value];
            }
        }
        return $result;
    }
    

}

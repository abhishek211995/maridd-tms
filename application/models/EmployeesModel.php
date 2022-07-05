<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesModel extends CI_Model {
    public function get_all_employees(){
        $this->db->select('*');
        $this->db->from('tms_users');
        $this->db->where('user_role', 'employee');

        return $this->db->get()->result();
    }
}
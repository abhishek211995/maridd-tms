<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model {
    public function get_all_customers(){
        $this->db->select('*');
        $this->db->from('tms_users');
        $this->db->where('user_role', 'customer');

        return $this->db->get()->result();
    }
}
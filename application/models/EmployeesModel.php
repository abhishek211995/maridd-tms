<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesModel extends CI_Model {
    public function get_all_employees(){
        $this->db->select('*');
        $this->db->from('tms_users');
        $this->db->where('user_role', 'technician');

        return $this->db->get()->result();
    }

    public function register_technician($data){
        $this->db->insert('tms_users', $data);
        if($this->db->affected_rows() != 1){
            return array('status' => 0,'msg' => 'Something went wrong with the query. Please refresh the page and try again');
        } else {
            return array('status' => 1,'msg' => 'Technician Registered Successfully. Redirecting Please wait...');
        }
    }

    public function update_technician($data, $user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('tms_users', $data);
        return array('status' => 1,'msg' => 'Profile has been updated successfully....');
    }
}
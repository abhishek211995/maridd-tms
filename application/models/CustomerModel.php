<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model {
    public function get_all_customers(){
        $this->db->select('*');
        $this->db->from('tms_users');
        $this->db->where('user_role', 'user');

        return $this->db->get()->result();
    }

    public function register_customer($data){
        $this->db->insert('tms_users', $data);
        if($this->db->affected_rows() != 1){
            return array('status' => 0,'msg' => 'Something went wrong with the query. Please refresh the page and try again');
        } else {
            return array('status' => 1,'msg' => 'User Registered Successfully. Redirecting Please wait...');
        }
    }

    public function update_customer($data, $user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('tms_users', $data);
        return array('status' => 1,'msg' => 'Profile has been updated successfully....');
    }
}
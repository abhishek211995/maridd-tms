<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesModel extends CI_Model 
{
    public function get_all_employees()
    {
        $user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');
        $user_company = $this->session->userdata('user_company');
        $this->db->select('*');
        $this->db->from('tms_users');
        $this->db->where('user_role', 'Technician');
        if($user_role == 'Admin' && intval($user_company) > 0)
        {
            $this->db->where('company_id', $user_company);
        }
        else if($user_role == 'Superadmin')
        {
            $this->db->where('company_id', 0);
        }
        else
        {
            $this->db->where('1 !=', 1);
        }
        return $this->db->get()->result();
    }

    public function register_technician($data)
    {
        $this->db->insert('tms_users', $data);
        if($this->db->affected_rows() != 1)
        {
            return array('status' => 0,'msg' => 'Something went wrong with the query. Please refresh the page and try again');
        } 
        else 
        {
            return array('status' => 1,'msg' => 'Technician Registered Successfully. Redirecting Please wait...');
        }
    }

    public function update_technician($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tms_users', $data);
        return array('status' => 1,'msg' => 'Profile has been updated successfully....');
    }
}
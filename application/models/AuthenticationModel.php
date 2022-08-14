<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthenticationModel extends CI_Model {

    public function register_user($data)
    {
        $this->db->insert('tms_users', $data);
        return array('status' => 1,'msg' => 'Registration Successfull. Redirecting. Please Wait...');
    }

    public function login_user($data)
    {
        $query = $this->db->get_where('tms_users', array('user_email' => $data['user_email']), 1, 0)->row();

        if(password_verify($data['user_password'], $query->user_password)) {
            $this->session->set_userdata(array(
                'user_id'=> $query->user_id,
                'user_email'=> $query->user_email,
                'user_role' => $query->user_role,
                'user_company' => $query->company_id,
            ));  
            return array('status' => 1,'msg' => 'Login Successfull. Redirecting. Please Wait...');
        } else {
            return array('status' => 0,'msg' => 'Password doesnt match');
        }   
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfileModel extends CI_Model {

    public function update_profile($data)
    {
        $user_id = get_current_user_id();
        $this->db->where('user_id', $user_id);
        $this->db->update('tms_users', $data);
        return array('status' => 1,'msg' => 'Your Profile has been updated successfully....');
    }

    public function change_password($data){
        $user_id = get_current_user_id();
        $this->db->where('user_id', $user_id);
        $this->db->update('tms_users', $data);
        return array('status' => 1,'msg' => 'Your Password has been updated successfully....');
    }
}
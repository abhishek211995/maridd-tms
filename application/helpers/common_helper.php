<?php
/*
 * Please write down all the Helper Functions here
*/



/*=========================================================
FUNCTION TO LOAD EXTRA JS VARIABLED
=========================================================*/

function localize_script_variables(){
    $ci =& get_instance();
    $args_array = array(
        'ajax_url' => base_url(),
        $ci->security->get_csrf_token_name() => $ci->security->get_csrf_hash(),
    );

    echo '<script id="localizeScriptData">var localized_data = '.json_encode($args_array).'</script>';
}

/*==========================================================
FUNCTION TO RETURN TIMESTAMP IN SPECIFIED FORMAT
===========================================================*/

function get_time_stamp($type = null){
    switch ($type) {
        case 'date':
            return date('d-m-Y H:i:s');
            break;
        case 'date_with_time':
            return time();
        default:
            return strtotime(date('d-m-Y'));
    }
}

/*==========================================================
FUNCTION TO RETURN TABLE NAME WITH PREFIX
===========================================================*/

function get_database_table_name($name){
    return 'tms_'.$name;
}

/*==========================================================
FUNCTION TO RETURN RESPONSE FOR ALL AJAX REQUESTS
===========================================================*/

function return_response($data){
    $ci =& get_instance();
    $res = array('hash' => $ci->security->get_csrf_hash(), 'status' => $data['status'], 'msg' => $data['msg']);
    return json_encode($res);
}

/*=========================================================
CHECK IF EMAIL ALREADY EXISTS WHILE REGISTERING
==========================================================*/

function check_if_email_exists($email){
    $ci =& get_instance();
    $query = $ci->db->get_where('tms_users', array('user_email' => $email), 1, 0);

    if(empty($query->result())){
        return true;
    }
}

/*========================================================
VALIDATE LOGIN PASSWORD
=========================================================*/

function validate_login_password($email, $password){
    $ci =& get_instance();
    $query = $ci->db->get_where('tms_users', array('user_email' => $email), 1, 0)->result();

    if(password_verify($password, $query->user_password)) {
        return true;
    }

}

/*======================================================
GET CURRENT LOGGED IN USER ID
=======================================================*/

function get_current_user_id(){
    $ci =& get_instance();
    $user_id = $ci->session->userdata('user_id');
    return $user_id;
}

/*===============================================================
GET CURRENT USER ARRAY ( RETURNS ALL DATA IN THE USER TABLE )
================================================================*/

function tm_get_current_user($id = ''){
    $ci =& get_instance();
    if(empty($id)){
        $user_id = $ci->session->userdata('user_id');
    } else {
        $user_id = $id;
    }

    $ci->db->select('*');
    $ci->db->from('tms_users');
    $ci->db->where('user_id', $user_id);
    $query = $ci->db->get()->row();
    return $query;
}

/*===============================================================
GET CURRENT USER ROLE
================================================================*/

function get_current_user_role(){
    $ci =& get_instance();
    $user_role = $ci->session->userdata('user_role');
    return $user_role;
}

/*============================================================
GET_USERLOGGED IN INITIALS
===========================================================*/

function get_user_initials(){
    $ci =& get_instance();
    $user_id = $ci->session->userdata('user_id');

    $ci->db->select('*');
    $ci->db->from('tms_users');
    $ci->db->where('user_id', $user_id);
    $query = $ci->db->get()->row();
    $first_ini = substr($query->user_first_name, 0, 1);
    $last_ini = substr($query->user_last_name, 0, 1);

    $initials = $first_ini.$last_ini;

    return $initials;
}

/*=====================================================================
FUNCTION TO UPLOAD FILES TO SERVER
=====================================================================*/

function tms_upload_files($path = '', $allowed_files = '', $max_size = '', $file = '', $file_name){

    $ci =& get_instance();

    $upload_path = empty($path) ? 'uploads' : $path;
    $allowed_files = empty($allowed_files) ? 'jpg|png' : $allowed_files;
    $max_size = empty($max_size) ? 2000 : $max_size;

    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = $max_size;
    $config['max_width'] = 2000;
    $config['max_height'] = 5000;
    $config['file_name'] = $file_name;

    $ci->load->library('upload', $config);

    if (!$ci->upload->do_upload($file)){
        $error = array('status' => 0, 'msg' => strip_tags($ci->upload->display_errors()));
        return $error;
    }
    else{
        $upload_data = $ci->upload->data();
        $server_path = $_SERVER['DOCUMENT_ROOT'].'/ticket-management-system/';
        $url_path = str_replace($server_path, '', $upload_data['full_path']);

        resizeImage($upload_data['file_name'], $upload_data['file_path'], $upload_data['full_path']);
        
        $data = array('status' => 1,'msg' => 'File Uploaded Successfully', 'upload_data' => $upload_data, 'file_path' => $url_path);
        return $data;
    }
}

function resizeImage($filename, $source_path, $target_path)
   {
       $ci = & get_instance();

      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'width' => 500,
      );

      $ci->load->library('image_lib', $config_manip);
      if (!$ci->image_lib->resize()) {
          echo $ci->image_lib->display_errors();
      }

      $ci->image_lib->clear();
   }

/*=====================================================================
FUNCTION TO CHECK IF CURRENT PASSWORD IS CORRECT
=====================================================================*/

function check_current_password($password){
    $ci =& get_instance();

    $user_id = get_current_user_id();

    $query = $ci->db->get_where('tms_users', array('user_id' => $user_id), 1, 0)->row();

    if(password_verify($password, $query->user_password)) {  
        return true;
    }
}

/*=====================================================================
FUNCTION TO GENERATE TICKET ID
=====================================================================*/

function get_ticket_id($id){
    $prefix = 'MTN'.date('Ymd').'_';  
    return $prefix.$id;
}


/*===================================================================
FUNCTION TO GET CUSTOMER LIST
====================================================================*/

function get_customer_list(){
    $ci = & get_instance();
    $query = $ci->db->get_where('tms_users', array('user_role' => 'customer'));
    return $query->result();
}

function get_employee_list(){
    $ci = & get_instance();
    $query = $ci->db->get_where('tms_users', array('user_role' => 'employee'));
    return $query->result();
}

function get_ticket_priority($priority){
    
    $ticket_priority = $priority;

    switch ($ticket_priority) {
        case 'Critical':
            $priority_html = '<span class="badge badge-danger">'.$ticket_priority.'</span>';
            break;
        case 'High':
            $priority_html = '<span class="badge badge-danger-light">'.$ticket_priority.'</span>';
            break;
        case 'Medium':
            $priority_html = '<span class="badge badge-warning-light">'.$ticket_priority.'</span>';
            break;
        case 'Low':
            $priority_html = '<span class="badge badge-success-light">'.$ticket_priority.'</span>';
            break;
        
        default:
            $priority_html = '<span class="badge badge-success-light">'.$ticket_priority.'</span>';
            break;
    }

    return $priority_html;

}

function get_ticket_status($status){
    
    $ticket_status = $status;

    switch ($ticket_status) {
        case 'In-Progress':
            $status_html = '<span class="badge badge-danger">'.$ticket_status.'</span>';
            break;
        case 'On-hold':
            $status_html = '<span class="badge badge-danger">'.$ticket_status.'</span>';
            break;
        case 'New':
            $status_html = '<span class="badge badge-warning">'.$ticket_status.'</span>';
            break;
        case 'Closed':
            $status_html = '<span class="badge badge-success">'.$ticket_status.'</span>';
            break;
        case 'active':
            $status_html = '<span class="badge badge-primary">'.$ticket_status.'</span>';
            break;
        
        default:
            $status_html = '<span class="badge badge-success">'.$ticket_status.'</span>';
            break;
    }

    return $status_html;

}
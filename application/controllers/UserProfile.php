<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $u_id = $this->session->userdata('user_id');

        if(empty($u_id)){
            redirect('/authentication', 'refresh');
        }

        $this->load->model('UserProfileModel');
    }
	
	public function index()
	{
        $u_id = $this->session->userdata('user_id');

        if(!empty($u_id)){
            redirect('/user/dashboard', 'refresh');
        }
	}

    public function profile()
    {
        
        $data = array('data' => array('page_title' => 'Profile'));
		$this->load->view('profile/profile', $data);
    }

    public function update_profile(){
        //print_r($_POST);
        //print_r($_FILES);

        $first_name = $this->input->post('firstname');
        $last_name = $this->input->post('lastname');
        $user_email = $this->input->post('user_email');
        $user_gender = $this->input->post('user_gender');
        $user_phone = $this->input->post('user_phone');
        $user_languages = $this->input->post('user_languages');
        $user_address = $this->input->post('user_address');

        if(empty($first_name)){
            $data = array('status' => 0, 'msg' => 'Please enter your First name');
            echo return_response($data);
            die();
        }
        if(empty($last_name)){
            $data = array('status' => 0, 'msg' => 'Please enter your Last name');
            echo return_response($data);
            die();
        }
        if(empty($user_email)){
            $data = array('status' => 0, 'msg' => 'Please enter your Email ID');
            echo return_response($data);
            die();
        }
        /*if(empty($user_gender)){
            $data = array('status' => 0, 'msg' => 'Please select your Gender');
            echo return_response($data);
            die();
        }*/
        if(empty($user_phone)){
            $data = array('status' => 0, 'msg' => 'Please enter your Phone Number');
            echo return_response($data);
            die();
        }
        /*if(empty($user_languages)){
            $data = array('status' => 0, 'msg' => 'Please enter your Languages in comma seperated format');
            echo return_response($data);
            die();
        }*/
        if(empty($user_address)){
            $data = array('status' => 0, 'msg' => 'Please enter your address');
            echo return_response($data);
            die();
        }

        $file_path = '';

        if(!empty($_FILES['user_profile_image']['name'])){

            $file_name = 'user_profile_image';
            $upload = tms_upload_files($path = '', $allowed_files = '', $max_size = '', $file_name, $file_name);

            //print_r($upload);
            //exit;

            if($upload['status'] == 0)
            {
                $data = array('status' => 0, 'msg' => $upload['msg']);
                echo return_response($data);
                die();
            }

            $file_path = $upload['file_path'];
        }

        $data = array(
            'user_first_name' => $first_name,
            'user_last_name' => $last_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone,
            'user_address' => $user_address,
            'user_language' => $user_languages,
            'user_gender' => $user_gender,
            'updated_date' => get_time_stamp('date_with_time'),
        );

        if(!empty($file_path)){
            $data['user_image'] = $file_path; 
        }

        $result = $this->UserProfileModel->update_profile($data);
        
        echo return_response($result);
        die();
    }

    public function update_password(){
        $current_password = $this->input->post('current_password');
        $password = $this->input->post('new_password');
        $confirm_password = $this->input->post('password_confirmation');

        if(empty($current_password)){
            $data = array('status' => 0, 'msg' => 'Please enter your Current Password');
            echo return_response($data);
            die();
        }
        if(empty($password)){
            $data = array('status' => 0, 'msg' => 'Please enter your Password');
            echo return_response($data);
            die();
        }
        if(empty($confirm_password)){
            $data = array('status' => 0, 'msg' => 'Please enter your Password');
            echo return_response($data);
            die();
        }
        if(!check_current_password($current_password)){
            $data = array('status' => 0, 'msg' => 'Your current password is wrong. Please check your current password');
            echo return_response($data);
            die();
        }
        if($confirm_password !== $password){
            $data = array('status' => 0, 'msg' => 'Your password & confirm password does not match');
            echo return_response($data);
            die();
        }

        $data = array(
            'user_password' => password_hash($password, PASSWORD_DEFAULT),
        );

        $result = $this->UserProfileModel->change_password($data);

        echo return_response($result);

    }
}

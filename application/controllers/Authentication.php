<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('AuthenticationModel');
    }
	
	public function index()
	{
        /*$u_id = $this->session->userdata('user_id');

        if(!empty($u_id)){
            redirect('/user/dashboard', 'refresh');
        }*/

        $data = array('data' => array('page_title' => 'Login'));
		//$this->load->view('auth/login', $data);
        $this->load->view('auth/login',$data);
	}

    public function processlogin(){
        $user_email = $this->input->post('user_email');
        $user_password = $this->input->post('user_password');

        if(empty($user_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Email');
            echo return_response($data);
            die();
        }

        if(check_if_email_exists($user_email)){
            $data = array('status' => 0, 'msg' => 'This email does not exists. Please register for an account');
            echo return_response($data);
            die();
        }

        if(empty($user_password)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Password');
            echo return_response($data);
            die();
        }

        $data = array(
            'user_email' => $user_email,
            'user_password' => $user_password,
        );

        $result = $this->AuthenticationModel->login_user($data);

        echo return_response($result);
        die();
    }

    public function register()
	{
        $data = array('data' => array('page_title' => 'Register'));
		$this->load->view('auth/register', $data);
	}

    public function forgot_password()
	{
        $data = array('data' => array('page_title' => 'Forgot Password'));
		$this->load->view('auth/forgotpassword', $data);
	}

    public function process_user_registration(){
        //print_r($_POST);
        
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $user_email = $this->input->post('user_email');
        $user_password = $this->input->post('user_password');

        $user_role = $this->input->post('user_role');
        $user_company = $this->input->post('company_id');

        $added_date = get_time_stamp();
        $username = strtolower($first_name.$last_name);

        if(empty($first_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your First Name');
            echo return_response($data);
            die();
        }
        if(empty($last_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Last Name');
            echo return_response($data);
            die();
        }
        if(empty($user_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Email');
            echo return_response($data);
            die();
        }

        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $data = array('status' => 0, 'msg' => 'Please Enter a Valid Email ID. For Ex: demo@domain.com');
            echo return_response($data);
            die();
        }

        if(!check_if_email_exists($user_email)){
            $data = array('status' => 0, 'msg' => 'This email already exists. Please try loggin in');
            echo return_response($data);
            die();
        }

        if(empty($user_password)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Password');
            echo return_response($data);
            die();
        }

        $data = array(
            'username' => $username,
            'user_first_name' => $first_name,
            'user_last_name' => $last_name,
            'user_email' => $user_email,
            'user_password' => password_hash($user_password, PASSWORD_DEFAULT),
            'is_verified' => 0,
            'user_status' => 1,
            'user_role' => $user_role,
            'company_id' => $user_company,
            'added_date' => $added_date
        );

        $result = $this->AuthenticationModel->register_user($data);

        echo return_response($result);

        if($result['status'] == 1){
            send_email($to = 'abhirpotdar@gmail.com', $from = '', $subject = '', $body = '');
        }

        die();
    }

    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_role');

        redirect('/authentication', 'refresh');
    }
}

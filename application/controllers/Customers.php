<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('CustomerModel');

        $user_role = get_current_user_role();

        if(($user_role !== 'Superadmin' || $user_role == 'admin') && $user_role != 'Admin'){
            die('You dont have permission to view this page. Please login using Admin details ');
        }
    }

    public function index()
    {
        $customer_data = $this->CustomerModel->get_all_customers();
        $data = array('data' => array('page_title' => 'Customers', 'customer_data' => $customer_data));
        
        $this->load->view('customers/all-customers', $data);
    }

    public function create_customers()
    {
        $data = array('data' => array('page_title' => 'Add User'));
        
        $this->load->view('customers/add-customer', $data);
    }

    public function process_create_customer()
    {
        $user_first_name = $this->input->post('user_first_name');
        $user_last_name = $this->input->post('user_last_name');
        $user_email = $this->input->post('user_email');
        $user_phone_number = $this->input->post('user_phone_number');
        $user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');
        $user_company = $this->session->userdata('user_company');
        if($user_role == 'Admin')
        {
            $user_company = $user_company;
        }else{
            $user_company = $this->input->post('user_company');
        }
        $user_password = $this->input->post('user_password');
        $added_date = get_time_stamp();

        if(empty($user_first_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter First Name');
            echo return_response($data);
            die();
        }
        if(empty($user_last_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Last Name');
            echo return_response($data);
            die();
        }
        if(empty($user_phone_number)){
            $data = array('status' => 0, 'msg' => 'Please Enter Phone Number');
            echo return_response($data);
            die();
        }
        if(empty($user_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Email');
            echo return_response($data);
            die();
        }

        if($user_role != 'Admin')
        {
            if($user_company == '')
            {
                $data = array('status' => 0, 'msg' => 'Please Select a Company');
                echo return_response($data);
                die();
            }    
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
            'username' => $user_email,
            'user_first_name' => $user_first_name,
            'user_last_name' => $user_last_name,
            'user_email' => $user_email,
            'user_password' => password_hash($user_password, PASSWORD_DEFAULT),
            'user_phone' => $user_phone_number,
            'company_id' => $user_company,
            'is_verified' => 0,
            'user_status' => 1,
            'user_role' => 'User',
            'added_date' => $added_date
        );
        $result = $this->CustomerModel->register_customer($data);

        echo return_response($result);
        die();
    }

    public function edit_customer($id = ''){

        $customer_details = get_customer_details($id);
        $data = array('data' => array('page_title' => 'Edit User', 'customer_details' => $customer_details));
        
        $this->load->view('customers/edit-customer', $data);
        
    }

    public function process_edit_customer()
    {        
        $user_first_name = $this->input->post('user_first_name');
        $user_last_name = $this->input->post('user_last_name');
        $user_email = $this->input->post('user_email');
        $user_phone_number = $this->input->post('user_phone_number');
        $user_company = $this->session->userdata('user_company');
        $login_user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');

        if($user_role == 'Admin')
        {
            $user_company = $user_company
            ;
        }else{
            $user_company = $this->input->post('user_company');
        }

        $user_password = $this->input->post('user_password');

        $user_id = $this->input->post('user_id');

        $updated_date = get_time_stamp();

        if(empty($user_first_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter First Name');
            echo return_response($data);
            die();
        }
        if(empty($user_last_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Last Name');
            echo return_response($data);
            die();
        }
        if(empty($user_phone_number)){
            $data = array('status' => 0, 'msg' => 'Please Enter Phone Number');
            echo return_response($data);
            die();
        }
        if(empty($user_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Email');
            echo return_response($data);
            die();
        }

        if($user_role != 'Admin')
        {
            if($user_company == '')
            {
                $data = array('status' => 0, 'msg' => 'Please Select a Company');
                echo return_response($data);
                die();
            }    
        }      

        /*if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
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
        }*/

        $data = array(
            'username' => $user_email,
            'user_first_name' => $user_first_name,
            'user_last_name' => $user_last_name,
            'user_email' => $user_email,
            //'user_password' => password_hash($user_password, PASSWORD_DEFAULT),
            'user_phone' => $user_phone_number,
            'company_id' => $user_company,
            'updated_date' => $updated_date
        );
        $result = $this->CustomerModel->update_customer($data, $user_id);

        echo return_response($result);
        die();
    }

    public function delete_customer(){
        
    }
}
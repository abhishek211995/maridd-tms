<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('EmployeesModel');

        $user_role = get_current_user_role();

        if(($user_role !== 'Superadmin' || $user_role == 'admin') && $user_role != 'Admin'){
            die('You dont have permission to view this page. Please login using Admin details ');
        }
    }

    public function index()
    {   
        $customer_data = $this->EmployeesModel->get_all_employees();
        $data = array('data' => array('page_title' => 'Technicians', 'customer_data' => $customer_data));
        
        $this->load->view('employees/all-employees', $data);
    }

    public function create_employee()
    {
        $data = array('data' => array('page_title' => 'Add Technicians'));
        
        $this->load->view('employees/add-employee', $data);
    }

    public function process_create_employee()
    {
        $technician_first_name = $this->input->post('technician_first_name');
        $technician_last_name = $this->input->post('technician_last_name');
        $technician_email = $this->input->post('technician_email');
        $technician_phone_number = $this->input->post('technician_phone_number');
        $user_company = $this->session->userdata('user_company');
        $user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');
        if($user_role == 'Admin')
        {
            $technician_company = $user_company;
        }else{
            $technician_company = $this->input->post('technician_company');
        }

        $user_password = $this->input->post('user_password');
        $added_date = get_time_stamp();

        if(empty($technician_first_name))
        {
            $data = array('status' => 0, 'msg' => 'Please Enter First Name');
            echo return_response($data);
            die();
        }
        if(empty($technician_last_name))
        {
            $data = array('status' => 0, 'msg' => 'Please Enter Last Name');
            echo return_response($data);
            die();
        }
        if(empty($technician_phone_number))
        {
            $data = array('status' => 0, 'msg' => 'Please Enter Phone Number');
            echo return_response($data);
            die();
        }
        if(empty($technician_email))
        {
            $data = array('status' => 0, 'msg' => 'Please Enter Your Email');
            echo return_response($data);
            die();
        }
        if($user_role != 'Admin')
        {
            if($technician_company == '')
            {
                $data = array('status' => 0, 'msg' => 'Please Select a Company');
                echo return_response($data);
                die();
            }
        }        
        if (!filter_var($technician_email, FILTER_VALIDATE_EMAIL)) 
        {
            $data = array('status' => 0, 'msg' => 'Please Enter a Valid Email ID. For Ex: demo@domain.com');
            echo return_response($data);
            die();
        }
        if(!check_if_email_exists($technician_email))
        {
            $data = array('status' => 0, 'msg' => 'This email already exists. Please try loggin in');
            echo return_response($data);
            die();
        }
        if(empty($user_password))
        {
            $data = array('status' => 0, 'msg' => 'Please Enter Your Password');
            echo return_response($data);
            die();
        }

        $data = array(
            'username' => $technician_email,
            'user_first_name' => $technician_first_name,
            'user_last_name' => $technician_last_name,
            'user_email' => $technician_email,
            'user_password' => password_hash($user_password, PASSWORD_DEFAULT),
            'user_phone' => $technician_phone_number,
            'company_id' => $technician_company,
            'is_verified' => 0,
            'user_status' => 1,
            'user_role' => 'Technician',
            'added_date' => $added_date
        );

        $result = $this->EmployeesModel->register_technician($data);

        echo return_response($result);
        die();
    }

    public function edit_employee($id = '')
    {
        $employee_details = get_employee_details($id);

        $data = array('data' => array('page_title' => 'Edit Technicians', 'emp_details' => $employee_details));
        
        $this->load->view('employees/edit-employee', $data);
    }

    public function process_edit_employee()
    {
        $technician_first_name = $this->input->post('technician_first_name');
        $technician_last_name = $this->input->post('technician_last_name');
        $technician_email = $this->input->post('technician_email');
        $technician_phone_number = $this->input->post('technician_phone_number');
        $user_company = $this->session->userdata('user_company');
        $login_user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');
        if($user_role == 'Admin')
        {
            $technician_company = $user_company;
        }else{
            $technician_company = $this->input->post('technician_company');
        }

        $user_password = $this->input->post('user_password');

        $user_id = $this->input->post('user_id');

        $added_date = get_time_stamp();

        if(empty($technician_first_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter First Name');
            echo return_response($data);
            die();
        }
        if(empty($technician_last_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Last Name');
            echo return_response($data);
            die();
        }
        if(empty($technician_phone_number)){
            $data = array('status' => 0, 'msg' => 'Please Enter Phone Number');
            echo return_response($data);
            die();
        }
        if(empty($technician_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Your Email');
            echo return_response($data);
            die();
        }

        if($user_role != 'Admin')
        {
            if($technician_company == '')
            {
                $data = array('status' => 0, 'msg' => 'Please Select a Company');
                echo return_response($data);
                die();
            }
        }        

        /*if (!filter_var($technician_email, FILTER_VALIDATE_EMAIL)) {
            $data = array('status' => 0, 'msg' => 'Please Enter a Valid Email ID. For Ex: demo@domain.com');
            echo return_response($data);
            die();
        }

        if(!check_if_email_exists($technician_email)){
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
            'username' => $technician_email,
            'user_first_name' => $technician_first_name,
            'user_last_name' => $technician_last_name,
            'user_email' => $technician_email,
            'user_password' => password_hash($user_password, PASSWORD_DEFAULT),
            'user_phone' => $technician_phone_number,
            'company_id' => $technician_company,
            'updated_date' => $added_date
        );

        $result = $this->EmployeesModel->update_technician($data, $user_id);

        echo return_response($result);
        die();
    }

    public function delete_employee(){
        
    }
}
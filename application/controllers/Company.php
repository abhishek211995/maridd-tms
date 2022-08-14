<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('CompanyModel');

        $user_role = get_current_user_role();
        
        if($user_role !== 'Superadmin' && $user_role !== 'Admin'){
            die('You dont have permission to view this page. Please login using Admin details ');
        }
    }

    public function index()
    {
        $company_data = $this->CompanyModel->get_all_companies();
        $data = array('data' => array('page_title' => 'Company', 'company_data' => $company_data));
        $this->load->view('company/all-companies', $data);
    }

    public function create_company()
    {
        $data = array('data' => array('page_title' => 'Add Company'));
        
        $this->load->view('company/add-company', $data);
    }

    public function process_add_company()
    {
    	$company_name = $this->input->post('company_name');
        $company_email = $this->input->post('company_email');
        $company_phone_number = $this->input->post('company_phone_number');
        $company_address_name = $this->input->post('company_address_name');
        $company_status = $this->input->post('company_status');

        $created_date = date('Y-m-d H:i:s');

        if(empty($company_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Name');
            echo return_response($data);
            die();
        }

        if(empty($company_phone_number)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Phone Number');
            echo return_response($data);
            die();
        }
        if(empty($company_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Email');
            echo return_response($data);
            die();
        }
        if(empty($company_address_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Address');
            echo return_response($data);
            die();
        }
        if(empty($company_status)){
            $data = array('status' => 0, 'msg' => 'Please Select Company Status');
            echo return_response($data);
            die();
        }


        $data = array(
            'company_name' => $company_name,
            'company_mobile' => $company_phone_number,
            'company_email' => $company_email,
            'company_address' => $company_address_name,
            'status' => $company_status,
            'added_date' => $created_date
        );
        
        $result = $this->CompanyModel->add_company($data);

        echo return_response($result);
        die();
    }

    public function edit_company($id = '')
    {

        $company_details = get_company_details($id);
        $data = array('data' => array('page_title' => 'Edit Company', 'company_details' => $company_details));
        
        $this->load->view('company/edit-company', $data);
        
    }
    public function process_edit_company($id = '')
    {
        $company_name = $this->input->post('company_name');
        $company_email = $this->input->post('company_email');
        $company_phone_number = $this->input->post('company_phone_number');
        $company_address_name = $this->input->post('company_address_name');
        $company_status = $this->input->post('company_status');
        $company_id = $this->input->post('company_id');
        $created_date = date('Y-m-d H:i:s');

        if(empty($company_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Name');
            echo return_response($data);
            die();
        }

        if(empty($company_phone_number)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Phone Number');
            echo return_response($data);
            die();
        }
        if(empty($company_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Email');
            echo return_response($data);
            die();
        }
        if(empty($company_address_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Address');
            echo return_response($data);
            die();
        }
        if(empty($company_status)){
            $data = array('status' => 0, 'msg' => 'Please Select Company Status');
            echo return_response($data);
            die();
        }


        $data = array(
            'company_name' => $company_name,
            'company_mobile' => $company_phone_number,
            'company_email' => $company_email,
            'company_address' => $company_address_name,
            'status' => $company_status,
            'updated_date' => $created_date,
        );
        
        $result = $this->CompanyModel->edit_company($data,$company_id);

        echo return_response($result);
        die();
    }
    
    public function process_add_company_profile()
    {
        $company_name = $this->input->post('company_name');
        $company_email = $this->input->post('company_email');
        $company_phone_number = $this->input->post('company_phone_number');
        $company_address_name = $this->input->post('company_address_name');
        $company_status = $this->input->post('company_status');
        $user_role = $this->input->post('user_role');

        $created_date = date('Y-m-d H:i:s');

        if(empty($company_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Name');
            echo return_response($data);
            die();
        }

        if(empty($company_phone_number)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Phone Number');
            echo return_response($data);
            die();
        }
        if(empty($company_email)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Email');
            echo return_response($data);
            die();
        }
        if(empty($company_address_name)){
            $data = array('status' => 0, 'msg' => 'Please Enter Company Address');
            echo return_response($data);
            die();
        }
        if(empty($company_status)){
            $data = array('status' => 0, 'msg' => 'Please Select Company Status');
            echo return_response($data);
            die();
        }


        $data = array(
            'company_name' => $company_name,
            'company_mobile' => $company_phone_number,
            'company_email' => $company_email,
            'company_address' => $company_address_name,
            'status' => $company_status,
            'added_date' => $created_date
        );

        $result = $this->CompanyModel->add_company_v1($data,$user_role);

        echo return_response($result);
        die();
    }

    public function view_company($id = NULL, $company_id = NULL)
    {
        $view_company_data = $this->CompanyModel->view_company($id);
        $data = array('data' => array('page_title' => 'Company ID : '.$company_id, 'ticket_data' => $view_company_data, 'ticket_id' => $id));

        $this->load->view('company/view-company', $data);
    }
}
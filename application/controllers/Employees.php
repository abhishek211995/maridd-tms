<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('EmployeesModel');
    }

    public function index(){
        $customer_data = $this->EmployeesModel->get_all_employees();
        $data = array('data' => array('page_title' => 'Technicians', 'customer_data' => $customer_data));
        
        $this->load->view('employees/all-employees', $data);
    }

    public function create_employee(){
        $data = array('data' => array('page_title' => 'Add Technicians', 'customer_data' => $customer_data));
        
        $this->load->view('employees/add-employee', $data);
    }

    public function edit_employee(){

    }

    public function delete_employee(){
        
    }
}
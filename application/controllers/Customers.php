<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('CustomersModel');
    }

    public function index(){
        $customer_data = $this->CustomersModel->get_all_customers();
        $data = array('data' => array('page_title' => 'Customers', 'customer_data' => $customer_data));
        
        $this->load->view('customers/all-customers');
    }

    public function create_customers(){
        
    }

    public function edit_customer(){

    }

    public function delete_customer(){
        
    }
}
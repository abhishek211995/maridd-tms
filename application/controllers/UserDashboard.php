<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserDashboardModel');

        $u_id = $this->session->userdata('user_id');

        if(empty($u_id)){
            redirect('/authentication', 'refresh');
        }
    }
	
	public function index()
	{
        $data = array('data' => array('page_title' => 'Dashboard'));
		$this->load->view('userdashboard/dashboard', $data);
	}
}

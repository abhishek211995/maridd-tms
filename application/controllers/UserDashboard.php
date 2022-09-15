<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserDashboardModel');
        $this->load->model('TicketsModel');
        $this->load->model('CompanyModel');
        $this->load->model('CustomerModel');
        $this->load->model('EmployeesModel');

        $u_id = $this->session->userdata('user_id');

        if(empty($u_id)){
            redirect('/authentication', 'refresh');
        }
    }
	
	public function index()
	{
        $user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');
        $active_ticket_data = $this->get_tickets_with_status('active');
        $closed_ticket_data = $this->get_tickets_with_status('Solved');
        $assigned_ticket_data = $this->get_tickets_with_status('assigned');
        $onhold_ticket_data = $this->get_tickets_with_status('ohhold');

        $all_tickets = $this->all_tickets();
        $all_companies = $this->all_companies();
        $all_companies_count = $this->CompanyModel->get_all_companies();
        $all_user_count = $this->CustomerModel->get_all_customers();
        $all_technician_count = $this->EmployeesModel->get_all_employees();

        $all_ticket_count = $this->TicketsModel->get_all_tickets($user_id,$user_role,$limit='');
        $all_ticket_counts = $all_ticket_count->result();

        $all_active_count = $this->TicketsModel->get_tickets('active');

        $data = array(
            'data' => 
                array(
                    'page_title'            => 'Dashboard',
                    'all_tickets'           => $all_tickets,
                    'active_tickets'        => $active_ticket_data,
                    'solved_tickets'        => $closed_ticket_data,
                    'assigned_tickets'      => $assigned_ticket_data,
                    'onhold_tickets'        => $onhold_ticket_data,
                    'all_companies'         => $all_companies,
                    'all_companies_count'   => $all_companies_count,
                    'all_user_count'        => $all_user_count,
                    'all_technician_count'  => $all_technician_count,
                    'all_ticket_count'      => $all_ticket_counts,
                    'all_active_count'      => $all_active_count
                )
            );
		$this->load->view('userdashboard/dashboard', $data);
	}

    public function get_tickets_with_status($status)
    {
        $ticket_data = $this->TicketsModel->get_tickets($status);
        return $ticket_data;
    }

    public function all_tickets()
    {
        $user_details = tm_get_current_user();
        $user_id = $user_details->user_id;
        $user_role = $user_details->user_role;
        $limit = 5;
        $result = $this->TicketsModel->get_all_tickets($user_id, $user_role,$limit);
        return $result->result();
    }

    public function all_companies()
    {
        $limit = 5;
        $result = $this->CompanyModel->get_all_companies($limit);
        return $result;
    }
}
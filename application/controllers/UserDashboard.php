<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserDashboardModel');
        $this->load->model('TicketsModel');

        $u_id = $this->session->userdata('user_id');

        if(empty($u_id)){
            redirect('/authentication', 'refresh');
        }
    }
	
	public function index()
	{

        $active_ticket_data = $this->get_tickets_with_status('active');
        $closed_ticket_data = $this->get_tickets_with_status('Solved');
        $assigned_ticket_data = $this->get_tickets_with_status('assigned');
        $onhold_ticket_data = $this->get_tickets_with_status('ohhold');

        $all_tickets = $this->all_tickets();

        $data = array('data' => array('page_title' => 'Dashboard', 'all_tickets' => $all_tickets, 'active_tickets' => $active_ticket_data, 'solved_tickets' => $closed_ticket_data, 'assigned_tickets' => $assigned_ticket_data, 'onhold_tickets' => $onhold_ticket_data));
		$this->load->view('userdashboard/dashboard', $data);
	}

    public function get_tickets_with_status($status){
        $ticket_data = $this->TicketsModel->get_tickets($status);
        return $ticket_data;
    }

    public function all_tickets(){
        $user_details = tm_get_current_user();
        $user_id = $user_details->user_id;
        $user_role = $user_details->user_role;

        $result = $this->TicketsModel->get_all_tickets($user_id, $user_role);

        return $result->result();
    }

    public function get_assigned_tickets(){
        
    }
    

}

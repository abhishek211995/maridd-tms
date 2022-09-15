<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $u_id = $this->session->userdata('user_id');

        if(empty($u_id)){
            redirect('/authentication', 'refresh');
        }

        $this->load->model('TicketsModel');
    }
	
	public function index()
    {
        $u_id = $this->session->userdata('user_id');

        if(!empty($u_id)){
            redirect('/user/dashboard', 'refresh');
        }
	}

    public function create_tickets()
    {
        $data = array('data' => array('page_title' => 'Create Ticket'));
        $this->load->view('tickets/create-ticket', $data);
    }

    public function process_create_ticket()
    {

        $ticket_title = $this->input->post('subject');
        $ticket_user = $this->input->post('ticket_user');
        $ticket_category = $this->input->post('ticket_category');
        $ticket_description = $this->input->post('ticket_description');

        if(empty($ticket_title)){
            $data = array('status' => 0, 'msg' => 'Please Enter Ticket Subject');
            echo return_response($data);
            die();
        }
        if(empty($ticket_user)){
            $data = array('status' => 0, 'msg' => 'Please Enter Ticket Email');
            echo return_response($data);
            die();
        }
        if(empty($ticket_category)){
            $data = array('status' => 0, 'msg' => 'Please Select a Ticket Category');
            echo return_response($data);
            die();
        }
        if(empty($ticket_description)){
            $data = array('status' => 0, 'msg' => 'Please Enter a description of your issue. Without this we wont be able to process your request');
            echo return_response($data);
            die();
        }

        $file_name = (!empty($_FILES['ticket_image']['name'])) ? 'ticket_image' : '';

        $created_by = get_current_user_id();
        $status = 'new';

        $data = array(
            'ticket_title' => $ticket_title,
            'ticket_description' => $ticket_description,
            'user' => $ticket_user,
            'ticket_category' => $ticket_category,
            'created_by' => $created_by,
            'status' => $status,
            'file' => $file_name,
            'added_date' => get_time_stamp('date_with_time')
        );

        $result = $this->TicketsModel->create_ticket($data);
        echo return_response($result);
    }

    public function view_ticket($id = NULL, $ticket_id = NULL)
    {
        //echo $id;
        $view_ticket_data = $this->TicketsModel->view_ticket($id);
        $data = array('data' => array('page_title' => 'Ticket ID : '.$ticket_id, 'ticket_data' => $view_ticket_data, 'ticket_id' => $id));

        $this->load->view('tickets/view-ticket', $data);
    }

    public function process_ticket_chat()
    {
        
        $ticket_id = $this->input->post('ticket_id');
        $ticket_data = $this->TicketsModel->view_ticket($ticket_id);

        
        if($ticket_data->status !== 'Solved')
        {
            $ticket_chat = $this->input->post('ticket_chat');
        }

        $ticket_status = $this->input->post('ticket_status');

        $file_name = (!empty($_FILES['ticket_attachment']['name'])) ? 'ticket_attachment' : '';

        if($ticket_data->status !== 'Solved')
        {
            if(empty($ticket_chat)){
                $data = array('status' => 0, 'msg' => 'Please Enter your reply');
                echo return_response($data);
                die();
            }
        }
        if(empty($ticket_status))
        {
            $data = array('status' => 0, 'msg' => 'Please select a ticket status');
            echo return_response($data);
            die();
        }

        $data = array();

        $data = array(
            'ticket_status' => $ticket_status,
            'current_ticket_status' => $ticket_data->status,
            'ticket_id' => $ticket_id,
            'updated_date' => time(),
            'file' => $file_name,
            'user_id' => get_current_user_id(),
        );

        if($ticket_data->status !== 'Solved')
        {
            $data['ticket_chat'] = $ticket_chat;
        }

        /*print_r($data);
        exit;*/

        $result = $this->TicketsModel->process_user_chat($data);
        echo return_response($result);
        die();

    }

    public function set_ticket_category()
    {
        $ticket_id = $this->input->post('ticket_id');
        $category = $this->input->post('category');

        if(empty($ticket_id)){
            $data = array('status' => 0, 'msg' => 'Something went wrong. Please try later');
            echo return_response($data);
            die();
        }
        if(empty($category)){
            $data = array('status' => 0, 'msg' => 'Please select a category');
            echo return_response($data);
            die();
        }

        $data = array(
            'ticket_id' => $ticket_id,
            'category' => $category
        );

        $result = $this->TicketsModel->process_ticket_category($data);
        echo return_response($result);
        die();
    }

    public function set_ticket_priority()
    {
        $ticket_id = $this->input->post('ticket_id');
        $priority = $this->input->post('priority');

        if(empty($ticket_id)){
            $data = array('status' => 0, 'msg' => 'Something went wrong. Please try later');
            echo return_response($data);
            die();
        }

        if(empty($priority)){
            $data = array('status' => 0, 'msg' => 'Please select a priority');
            echo return_response($data);
            die();
        }
        $data = array(
            'ticket_id' => $ticket_id,
            'priority' => $priority
        );

        $result = $this->TicketsModel->process_set_ticket_priority($data);
        echo return_response($result);
        die();
    }

    public function assign_ticket_to_emp(){
        $ticket_id = $this->input->post('ticket_id');
        $emp_id = $this->input->post('emp_id');

        if(empty($ticket_id)){
            $data = array('status' => 0, 'msg' => 'Something went wrong. Please try later');
            echo return_response($data);
            die();
        }

        if(empty($emp_id)){
            $data = array('status' => 0, 'msg' => 'Please select an employee to assign');
            echo return_response($data);
            die();
        }
        $data = array(
            'ticket_id' => $ticket_id,
            'emp_id' => $emp_id
        );

        $result = $this->TicketsModel->process_assign_ticket_to_emp($data);
        echo return_response($result);
        die();
    }

    public function add_ticket_notes(){
        $ticket_note = $this->input->post('ticket_note');
        $ticket_id = $this->input->post('ticket_id');
        $user_id = $this->input->post('user_id');
    }

    public function get_tickets_with_status($status){
        $ticket_data = $this->TicketsModel->get_tickets($status);
        return $ticket_data;
    }

    /*public function my_tickets(){
        $this->get_tickets_with_status('')
        $this->load->view();
    }*/

    public function all_tickets()
    {
        $user_details = tm_get_current_user();
        $user_id = $user_details->user_id;
        $user_role = $user_details->user_role;

        $result = $this->TicketsModel->get_all_tickets($user_id, $user_role,'');

        $data = array('data' => array('page_title' => 'All Tickets', 'ticket_data' => $result->result()));

        $this->load->view('tickets/all-tickets', $data);
    }

    public function active_tickets()
    {
        $active_ticket_data = $this->get_tickets_with_status('new');
        $data = array('data' => array('page_title' => 'Active Tickets', 'ticket_data' => $active_ticket_data));
        $this->load->view('tickets/active-tickets', $data);
    }

    public function closed_tickets()
    {
        $closed_ticket_data = $this->get_tickets_with_status('Solved');
        $data = array('data' => array('page_title' => 'Closed Tickets', 'ticket_data' => $closed_ticket_data));
        $this->load->view('tickets/closed-tickets', $data);
    }

    public function assigned_tickets(){
        $assigned_ticket_data = $this->get_tickets_with_status('assigned');
        $data = array('data' => array('page_title' => 'Assigned Tickets', 'ticket_data' => $assigned_ticket_data));
        $this->load->view('tickets/assigned-tickets', $data);
    }

    public function onhold_tickets(){
        $onhold_ticket_data = $this->get_tickets_with_status('On-Hold');
        $data = array('data' => array('page_title' => 'On-Hold Tickets', 'ticket_data' => $onhold_ticket_data));
        $this->load->view('tickets/onhold-tickets', $data);
    }

    /*public function overdue_tickets(){
        $active_ticket_data = $this->get_tickets_with_status('active')
        $this->load->view('overdue-tickets', $active_ticket_data);
    }*/
}

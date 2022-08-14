<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketsModel extends CI_Model 
{
    public function create_ticket($data)
    {
        $ticket_data = array(
            'ticket_title' => $data['ticket_title'],
            'ticket_category' => $data['ticket_category'],
            'company_id' => $this->session->userdata('user_company'),
            'user' => $data['user'],
            'status' => $data['status'],
            'created_by' => $data['created_by'],
            'added_date' => $data['added_date'],
        );

        $this->db->trans_start();
        
        $this->db->insert('tms_tickets', $ticket_data);
        $ticket_id = $this->db->insert_id();

        $ticket_id_alias = get_ticket_id($ticket_id );

        $this->db->where('id', $ticket_id);
        $this->db->update('tms_tickets', array('ticket_id' => $ticket_id_alias));

        $file = $data['file'];
        $file_path = '';

        if(!empty($_FILES['ticket_image']['name'])){
            $file_id = $file;
            $file_name = 'ticket_'.$ticket_id.'_'.time();
            $path = 'uploads/tickets-attachments/';
            $upload = tms_upload_files($path, $allowed_files = 5000, $max_size = 2000, $file = $file_id, $file_name);
            if($upload['status'] == 0){
                $data = array('status' => 0, 'msg' => $upload['msg']);
                echo return_response($data);
                die();
            }

            $file_path = $upload['file_path'];
        }

        $ticket_chat = array(
            'ticket_chats' => array(
                array(
                    'description' => $data['ticket_description'],
                    'user_id' => get_current_user_id(),
                    'added_date' => time(),
                    'ticket_attachment' => $file_path
                )
            ),
            'last_updated' => time()
        );

        $ticket_meta_data = array(
            'c_ticket_id' => $ticket_id,
            'ticket_chat' => json_encode($ticket_chat),
            'ticket_attachment' => $file_path,
            'added_date' => time(),
        );

        $this->db->insert('tms_ticket_chat', $ticket_meta_data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
			return array('status' => 0, 'msg' => 'Something went wrong');
        } else {
            $this->db->trans_commit();
            return array('status' => 1, 'msg' => 'You ticket is created successfully. Ticket ID is #'.$ticket_id_alias);
        }
    }

    public function get_all_tickets($user_id, $user_role)
    {
        $user_company = $this->session->userdata('user_company');

        $this->db->select('*');
        $this->db->from('tms_tickets');
        
        if($user_role == 'User'){
            $this->db->where('user', get_current_user_id());
        }
        else if($user_role == 'Technician')
        {
            $this->db->where('assigned_employee', get_current_user_id());
        }
        else if($user_role == 'Admin' && intval($user_company) > 0)
        {
            $this->db->where('company_id', $user_company);
        }
        else if($user_role == 'Superadmin')
        {
            $this->db->where(array('company_id' => 0));
        }
        else
        {
            $this->db->where('1 !=', 1);
        }

        

        $this->db->order_by('added_date', 'DESC');
        $result = $this->db->get();
        // print_r($user_role);
        // print_r($this->db->last_query());die;
        return $result;
    }

    public function view_ticket($id){
        $this->db->select('*');
        $this->db->from('tms_tickets');
        $this->db->join('tms_ticket_chat', 'tms_tickets.id = tms_ticket_chat.c_ticket_id');
        $this->db->where('tms_tickets.id', $id);
        $ticket_data = $this->db->get()->row();

        return $ticket_data;
    }

    public function process_user_chat($data){

        $ticket_id = $data['ticket_id'];

        $this->db->select('ticket_chat');
        $this->db->from('tms_ticket_chat');
        $this->db->where('c_ticket_id', $ticket_id);

        $result = $this->db->get();
        $ticket_chat_data = $result->row();

        if($data['current_ticket_status'] !== 'Solved'){
            $chat_array = json_decode($ticket_chat_data->ticket_chat);

            //print_r($chat_array);
            $ticket_chat_arr = $chat_array->ticket_chats;

            $file = $data['file'];
            $file_path = '';

            if(!empty($_FILES['ticket_attachment']['name'])){
                $file_id = $file;
                $file_name = 'ticket_'.$ticket_id.'_'.time();
                $path = 'uploads/tickets-attachments/';
                $upload = tms_upload_files($path, $allowed_files = 5000, $max_size = 8000, $file = $file_id, $file_name);
                if($upload['status'] == 0){
                    $data = array('status' => 0, 'msg' => $upload['msg']);
                    echo return_response($data);
                    die();
                }

                $file_path = $upload['file_path'];
            }
            
            $chat_data = array(
                'user_id' => $data['user_id'],
                'added_date' => $data['updated_date'],
                'description' => $data['ticket_chat'],
                'ticket_attachment' => $file_path
            );

            array_push($ticket_chat_arr, $chat_data);

            /*print_r($ticket_chat_arr);
            echo json_encode($ticket_chat_arr);
            die();*/

            $chat_data_final_arr = array(
                'last_updated' => time(),
                'ticket_chats' => $ticket_chat_arr
            );

            $chat_data_final_arr_encoded = json_encode($chat_data_final_arr);

            $updated_data = array(
                'ticket_chat' => $chat_data_final_arr_encoded
            );

            
            $this->db->set($updated_data);
            $this->db->where('c_ticket_id', $ticket_id);
            $this->db->update('tms_ticket_chat');
        }

        $this->db->where('id', $ticket_id);
        $this->db->update('tms_tickets', array('status' => $data['ticket_status']));

        return array('status' => 1, 'msg' => 'Ticket Chat Updated.');
    }


    public function process_ticket_category($data){
        $ticket_id = $data['ticket_id'];
        $category = $data['category'];
        $this->db->where('id', $ticket_id);
        $this->db->update('tms_tickets', array('ticket_category' => $category));

        return array('status' => 1, 'msg' => 'Ticket Category Updated Successfully');
    }

    public function process_assign_ticket_to_emp($data){
        $ticket_id = $data['ticket_id'];
        $emp_id = $data['emp_id'];

        $this->db->where('id', $ticket_id);
        $this->db->update('tms_tickets', array('assigned_employee' => $emp_id));

        return array('status' => 1, 'msg' => 'Employee Assigned to ticket Successfully');
    }

    public function process_set_ticket_priority($data){
        $ticket_id = $data['ticket_id'];
        $priority = $data['priority'];
        
        $this->db->where('id', $ticket_id);
        $this->db->update('tms_tickets', array('ticket_priority' => $priority));

        return array('status' => 1, 'msg' => 'Ticket Priority Updated Successfully');

    }


    public function get_tickets($status)
    {
        $user_role = $this->session->userdata('user_role');
        $user_company = $this->session->userdata('user_company');

        $this->db->select('*');
        $this->db->from('tms_tickets');

        if($user_role !== 'Superadmin' && $user_role !== 'Technician' && $user_role !== 'Admin')
        {
            $this->db->where(array('user' => get_current_user_id(), 'status' => $status));
        }
        else if($user_role == 'Technician')
        {
            $this->db->where(array('assigned_employee' => get_current_user_id(), 'status' => $status));
        }
        else if($user_role == 'Superadmin')
        {
            $this->db->where(array('status' => $status,'company_id' => 0));
        }
        else if($user_role == 'Admin' && intval($user_company) > 0)
        {
            $this->db->where(array('status' => $status,'company_id' => $user_company));
        }
        else
        {
            $this->db->where('1 !=', 1);
        }

        $this->db->order_by('added_date', 'DESC');
        $result = $this->db->get()->result();
        
        return $result;
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyModel extends CI_Model {

    public function get_all_companies($limit = '')
    {
        $this->db->select('*');
        $this->db->from('tms_company');
        if(!empty($limit))
        {
            $this->db->limit(5);
        }
        return $this->db->get()->result();
    }
    
    public function add_company($data)
    {
        $this->db->insert('tms_company', $data);
        $company_id = $this->db->insert_id();

        $company_id_alias = get_company_id($company_id);

        $this->db->where('company_id', $company_id);
        $this->db->update('tms_company', array('company_unique_id' => $company_id_alias));
        
        if($this->db->affected_rows() != 1)
        {
            return array('status' => 0,'msg' => 'Something went wrong with the query. Please refresh the page and try again');
        }
        else 
        {
            return array('status' => 1,'msg' => 'Company Registered Successfully. Redirecting Please wait...');
        }
    }
    public function add_company_v1($data,$user_role)
    {
        $this->db->insert('tms_company', $data);
        $company_id = $this->db->insert_id();
        $this->session->set_userdata('user_company',$company_id);

        $company_id_alias1 = get_company_id($company_id);

        if(!empty($user_role))
        {
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update('tms_users', array('company_id' => $company_id));
        }
        $this->db->where('company_id', $company_id);
        $this->db->update('tms_company', array('company_unique_id' => $company_id_alias1));
        
        if($this->db->affected_rows() != 1)
        {
            return array('status' => 0,'msg' => 'Something went wrong with the query. Please refresh the page and try again');
        }
        else 
        {
            return array('status' => 1,'msg' => 'Company Registered Successfully.');
        }
    }

    public function edit_company($data, $company_id)
    {
        $this->db->where('company_id', $company_id);
        $this->db->update('tms_company', $data);
        return array('status' => 1,'msg' => 'Company has been updated successfully....');
    }
    
    public function view_company($id){
        $this->db->select('*');
        $this->db->from('tms_company');
        $this->db->where('company_id', $id);
        $company_data = $this->db->get()->row();

        return $company_data;
    }
}
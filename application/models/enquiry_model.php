<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enquiry_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_enquiry() {
        $query = $this->db->get('enquiry');
        return $query->result();
    }

    function list_enquiry_pages($num, $offset) {

        $this->db->select('*');        
        $this->db->from('enquiry');       
        $this->db->limit($num, $offset);
        $this->db->order_by('enquiry.enquiry_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function list_gm_enquiry_pages($num, $offset) {

        $this->db->select('*');        
        $this->db->from('gm_enquiry');       
        $this->db->limit($num, $offset);
        $this->db->order_by('gm_enquiry.enquiry_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_enquiry($enquiry_id) {
        $this->db->select('enquiry.*,users.*');
        $this->db->from('enquiry');
        $this->db->join('users', 'users.enquiry_id=enquiry.enquiry_id');
        $this->db->where('enquiry.enquiry_id', $enquiry_id);
        $query = $this->db->get();
        return $query->first_row();
    }

    function add_enquiry() {

        $datas = array('name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'message' => $this->input->post('message'),
            'country' => $this->input->post('country'),
            'hotel_master_id' => $this->input->post('hotel_name')
            );
        $this->db->insert('enquiry', $datas);
    }
    function add_gm_enquiry() {

        $datas = array(
            'message' => $this->input->post('message'),
            'hotel_master_id' => $this->input->post('hotel_name')
            );
        $this->db->insert('gm_enquiry', $datas);
    }

    function edit_enquiry($enquiry_id) {

        $datas = array('name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'message' => $this->input->post('message'));
        $this->db->where(array('enquiry_id' => $enquiry_id));
        $this->db->update('enquiry', $datas);
    }

    function delete_enquiry($enquiry_id) {

        $this->db->where('enquiry_id', $enquiry_id)->delete('enquiry');
    }
    
    function delete_gm_enquiry($enquiry_id) {

        $this->db->where('enquiry_id', $enquiry_id)->delete('gm_enquiry');
    }

}

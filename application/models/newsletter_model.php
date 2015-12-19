<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsletter_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_newsletter() {
        $query = $this->db->get('newsletter');
        return $query->result();
    }

    function list_newsletter_pages($num, $offset) {

        $this->db->select('*');        
        $this->db->from('newsletter');       
        $this->db->limit($num, $offset);
        $this->db->order_by('newsletter.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
//    function list_gm_newsletter_pages($num, $offset) {
//
//        $this->db->select('*');        
//        $this->db->from('gm_newsletter');       
//        $this->db->limit($num, $offset);
//        $this->db->order_by('gm_newsletter.newsletter_id', 'desc');
//        $query = $this->db->get();
//        return $query->result();
//    }
//
//    function get_newsletter($newsletter_id) {
//        $this->db->select('newsletter.*,users.*');
//        $this->db->from('newsletter');
//        $this->db->join('users', 'users.newsletter_id=newsletter.newsletter_id');
//        $this->db->where('newsletter.newsletter_id', $newsletter_id);
//        $query = $this->db->get();
//        return $query->first_row();
//    }

    function add_newsletter() {

        $datas = array(
            'email' => $this->input->post('newsletter_email')
            );
        $this->db->insert('newsletter', $datas);
    }
//    function add_gm_newsletter() {
//
//        $datas = array(
//            'message' => $this->input->post('message'),
//            'hotel_master_id' => $this->input->post('hotel_name')
//            );
//        $this->db->insert('gm_newsletter', $datas);
//    }
//
//    function edit_newsletter($newsletter_id) {
//
//        $datas = array('name' => $this->input->post('name'),
//            'email' => $this->input->post('email'),
//            'phone' => $this->input->post('phone'),
//            'message' => $this->input->post('message'));
//        $this->db->where(array('newsletter_id' => $newsletter_id));
//        $this->db->update('newsletter', $datas);
//    }

    function delete($id) {

        $this->db->where('id', $id)->delete('newsletter');
    }
    
//    function delete_gm_newsletter($newsletter_id) {
//
//        $this->db->where('newsletter_id', $newsletter_id)->delete('gm_newsletter');
//    }

}

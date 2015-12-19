<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_testimonial() {
        $query = $this->db->get('testimonial');
        return $query->result();
    }

    function list_hotel_testimonial($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get('testimonial');
        return $query->result();
    }

    function delete_testimonial($testimonial_id) {
        $this->db->where('testimonial_id', $testimonial_id)->delete('testimonial');
    }
    
    function add_testimonial($image_name,$order){
        $data = array(
            'testimonial_title' => $this->input->post('testimonial_name'),
            'testimonial_place' => $this->input->post('testimonial_place'),
            'testimonial_content' => $this->input->post('testimonial_content'),
            'testimonial_image' => $image_name,
            'testimonial_order' => $order
        );
        $this->db->insert('testimonial',$data);
    }
    
    function count_rows(){
        $result = $this->db->get('testimonial');
        return $result->num_rows();
    }
    
    function get_testimonial($testimonial_id){
        $this->db->where('testimonial_id',$testimonial_id);
        $query = $this->db->get('testimonial');
        return $query->first_row();
    }
    
    function edit_testimonial($testimonial_id, $image_name,$data){
        $this->db->where('testimonial_id',$testimonial_id);
        $this->db->update('testimonial',$data);
    }
    
    function list_gallery($testimonial_id,$limit,$start){
        $this->db->where('testimonial_id',$testimonial_id);
        $this->db->limit($limit,$start);
        $query = $this->db->get('gallery');
        return $query->result();
    }
    function count_row($testimonial){
        $this->db->where('testimonial_id',$testimonial);
        $result = $this->db->get('gallery');
        return $result->num_rows();
    }
    
    function add_gallery($image_name, $link, $total){
       $data = array(
            'gallery_name' => $this->input->post('gallery_name'),
            'gallery_image' => $image_name,
            'gallery_order' => $total,
            'testimonial_id' =>$this->input->post('testimonial_id'),
           'hotel_master_id' => $link
        );
        $this->db->insert('gallery',$data); 
    }
    
    function get_gallery($gallery_id){
        $this->db->where('gallery_id',$gallery_id);
        $query = $this->db->get('gallery');
        return $query->first_row();
    }
    
    function edit_gallery($gallery_id, $image_name,$data){
        $this->db->where('gallery_id',$gallery_id);
        $this->db->update('gallery',$data);
    }
    
    function delete_gallery($gallery_id){
       $this->db->where('gallery_id', $gallery_id)->delete('gallery'); 
    }
}

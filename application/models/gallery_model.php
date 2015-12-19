<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_album() {
        $query = $this->db->get('album');
        return $query->result();
    }
    
    function get_hotel_album($hotel){
        $this->db->where('hotel_master_id',$hotel);
        $query = $this->db->get('album');
        return $query->result();
    }
    
    function list_album_gallery($album){
        $this->db->where('album_id',$album);
        $this->db->order_by('gallery_order');
        $query = $this->db->get('gallery');
        return $query->result();
    }

    function list_hotel_album($condition = array(),$limit,$start) {
        $this->db->where($condition);
        $this->db->limit($limit,$start);
        $query = $this->db->get('album');
        return $query->result();
    }

    function delete_album($album_id) {
        $this->db->where('album_id', $album_id)->delete('album');
    }
    
    function add_album($image_name,$id,$order){
        $data = array(
            'album_title' => $this->input->post('album_name'),
            'album_image' => $image_name,
            'album_display_order' => $order,
            'hotel_master_id' =>$id
        );
        $this->db->insert('album',$data);
    }
    
    function count_rows($hotel){
        $this->db->where('hotel_master_id',$hotel);
        $result = $this->db->get('album');
        return $result->num_rows();
    }
    
    function get_album($album_id){
        $this->db->where('album_id',$album_id);
        $query = $this->db->get('album');
        return $query->first_row();
    }
    
    function edit_album($album_id, $image_name,$data){
        $this->db->where('album_id',$album_id);
        $this->db->update('album',$data);
    }
    
    function list_gallery($album_id,$limit,$start){
        $this->db->where('album_id',$album_id);
        $this->db->limit($limit,$start);
        $query = $this->db->get('gallery');
        return $query->result();
    }
    function count_row($album){
        $this->db->where('album_id',$album);
        $result = $this->db->get('gallery');
        return $result->num_rows();
    }
    
    function add_gallery($image_name, $link, $total){
       $data = array(
            'gallery_name' => $this->input->post('gallery_name'),
            'gallery_image' => $image_name,
            'gallery_order' => $total,
            'album_id' =>$this->input->post('album_id'),
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

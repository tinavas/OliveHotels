<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_news() {
        $query = $this->db->get('news');
        return $query->result();
    }

    function list_hotel_news($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get('news');
        return $query->result();
    }
    
    function list_offers($limit,$start,$condition) {
        $this->db->limit($limit,$start);
        $this->db->where($condition);
        $query = $this->db->get('news');
        return $query->result();
    }
    
    function delete_news($news_id) {
        $this->db->where('news_id', $news_id)->delete('news');
    }
    
    function add_news($image_name,$order){
        $data = array(
            'news_title' => $this->input->post('news_name'),
            'news_content' => $this->input->post('news_content'),
            'category' => $this->input->post('category_name'),
            'news_image' => $image_name,
            'news_order' => $order,
            'date_added' =>date('Y-m-d')
        );
        $this->db->insert('news',$data);
    }
    
    function count_rows(){
        $result = $this->db->get('news');
        return $result->num_rows();
    }
    
    function get_news($news_id){
        $this->db->where('news_id',$news_id);
        $query = $this->db->get('news');
        return $query->first_row();
    }
    
    function edit_news($news_id, $image_name,$data){
        $this->db->where('news_id',$news_id);
        $this->db->update('news',$data);
    }
    
    function list_gallery($news_id,$limit,$start){
        $this->db->where('news_id',$news_id);
        $this->db->limit($limit,$start);
        $query = $this->db->get('gallery');
        return $query->result();
    }
    function count_row($news){
        $this->db->where('news_id',$news);
        $result = $this->db->get('gallery');
        return $result->num_rows();
    }
    
    function add_gallery($image_name, $link, $total){
       $data = array(
            'gallery_name' => $this->input->post('gallery_name'),
            'gallery_image' => $image_name,
            'gallery_order' => $total,
            'news_id' =>$this->input->post('news_id'),
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

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web extends CI_Controller {

    function index() { 
        $this->load->model(array('hotel_master_model'));
        $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
        $this->load->view('web/index',$data);  
    }
    
    function about(){
        $this->load->view('web/group');  
    }
    
    // function offers(){
    //     $this->load->helper('text');
    //     $this->load->model(array('news_model'));
    //     $data['news'] = $this->news_model->list_hotel_news(100,0);
    //     $this->load->view('web/new-offers',$data); 
    // }
    function offers(){
        $this->load->helper('text');
        $this->load->model(array('news_model'));
        $offer_condition = array('category'=> 2);
        $data['offers'] = $this->news_model->list_offers(100,0,$offer_condition);
        $news_condition = array('category'=> 1);
        $data['news'] = $this->news_model->list_offers(100,0,$news_condition);
        $this->load->view('web/new-offers',$data);  
    }

    function details($id){
        $this->db->where('news_id',$id);
        $result = $this->db->get('news')->first_row();
        $data['news'] = $result;
        $this->load->view('web/news-detail',$data);
    }

}

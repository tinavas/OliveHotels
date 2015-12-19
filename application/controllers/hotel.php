<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hotel extends CI_Controller {

    function olive_eva() {
        $this->load->model(array('gallery_model', 'hotel_master_model'));
        $data['gallery'] = $this->gallery_model->get_hotel_album(1);
        $this->load->view('web/olive-eva',$data);
    }
    
    function olive_downtown(){
        $this->load->model(array('gallery_model', 'hotel_master_model'));
        $data['gallery'] = $this->gallery_model->get_hotel_album(2);
        $this->load->view('web/olive-down-town',$data);
    }

}

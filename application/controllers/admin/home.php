<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('hotel_master_model'));
    }
    public function index() {
        
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {  
            $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
            $this->load->view('admin/home',$data);
        }
    }

}

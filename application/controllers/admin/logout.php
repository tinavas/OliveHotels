<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $logout = $this->ion_auth->logout();

        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('admin/login', 'refresh');
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();        
    }

    public function index() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {               
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('admin/home', 'refresh');
            } else {               
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admin/login', 'refresh'); 
            }
        } else {          
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );   

            $this->load->view('admin/login', $this->data);
        }
    }

}

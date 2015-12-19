<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class career extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('career_model', 'obj_career', TRUE);
        $this->load->model('career_sub_model', 'obj_career_sub', TRUE);
        $this->load->model(array('room_master_model', 'hotel_master_model'));
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        }
    }

    function index($row = 0) {

        $this->session->unset_userdata('career_id');
        $condition = array();
        $limit = '20';
        $config['base_url'] = base_url() . 'admin/career/index/';
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
        $config['uri_segment'] = 4;
        $total = $this->obj_career->countrows();
        $config['total_rows'] = $total;
        $data['total_rows'] = $total;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['career'] = $this->obj_career->get_all_entries($row, $limit, $condition, 'career_display_order', 'asc');
        $data['row'] = $row;


        $this->load->view('admin/career/career_list',$data);
    }

    function add($data = array()) {
       

        $this->form_validation->set_rules('career_title', 'Title', 'trim|required|xss_clean');
         $this->form_validation->set_rules('career_no', 'Number', 'trim|xss_clean');
        
        $this->form_validation->set_rules('career_location', 'Location', 'trim|xss_clean');
        $this->form_validation->set_rules('career_education', 'Education', 'trim|xss_clean');
        $this->form_validation->set_rules('career_experience', 'Experience', 'trim|xss_clean');
        
                $this->form_validation->set_rules('career_salary', 'Salary', 'trim|xss_clean');
        $this->form_validation->set_rules('career_candidature', 'Candidature', 'trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/career/add_career', $data);
        } else {


            $error = '';

            $total = $this->obj_career->countrows();
            $total++;

            $datas = array(
                'career_title' => $this->input->post('career_title'),              
                'career_no' => $this->input->post('career_no'),
                'career_location' => $this->input->post('career_location'),
                'career_education' => $this->input->post('career_education'),                 
                'career_experience' => $this->input->post('career_experience'),   
                'career_salary' => $this->input->post('career_salary'),
                'career_candidature' => $this->input->post('career_candidature'),
                'career_display_order' => $total
            );
            
            if ($error) {
                $data['error'] = $error;


                $this->load->view('admin/career/add_career', $data);
            } else {
                $this->obj_career->add($datas);
                redirect('admin/career/index');
            }
        }
    }

    function edit($id, $row = 0) {

         $this->form_validation->set_rules('career_title', 'Title', 'trim|required|xss_clean');
         $this->form_validation->set_rules('career_no', 'Number', 'trim|xss_clean');
        
        $this->form_validation->set_rules('career_location', 'Location', 'trim|xss_clean');
        $this->form_validation->set_rules('career_education', 'Education', 'trim|xss_clean');
        $this->form_validation->set_rules('career_experience', 'Experience', 'trim|xss_clean');
        
                $this->form_validation->set_rules('career_salary', 'Salary', 'trim|xss_clean');
        $this->form_validation->set_rules('career_candidature', 'Candidature', 'trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {


            $condition = array('career_id' => $id);
            $data['career'] = $this->obj_career->get_all($condition);
            $data["row"] = $row;
            $data["career_id"] = $id;



            $this->load->view('admin/career/edit_career',$data);
        } else {

            //image start

            $error = '';


            $this->session->set_userdata('msg', 'Sucessfully updated');


             $datas = array(
                'career_title' => $this->input->post('career_title'),              
                'career_no' => $this->input->post('career_no'),
                'career_location' => $this->input->post('career_location'),
                'career_education' => $this->input->post('career_education'),                 
                'career_experience' => $this->input->post('career_experience'),   
                'career_salary' => $this->input->post('career_salary'),
                'career_candidature' => $this->input->post('career_candidature')               
            );
            

            $condition = array('career_id' => $id);
            $this->obj_career->edit($condition, $datas);

            $this->session->set_userdata(array('career_status' => 'Update successfully'));

            $condition = array('career_id' => $id);
            $data['career'] = $this->obj_career->get_all($condition);
            $data["career_id"] = $id;
            $data["row"] = $row;

             redirect('admin/career/edit/' . $id);
           // $this->load->view('admin/career/edit_career');
        }
    }

    function delete($id, $row) {


        // Delete Product image
        $condition = array('career_id' => $id);



        $this->obj_career->delete($condition);
        redirect('admin/career/index/' . $row);
    }

    function update_order() {


        $career_id = $this->input->post('career_id');
        $career_order = $this->input->post('career_order');
        $condition = array('career_id' => $career_id);
        $data_array = array('career_display_order' => $career_order);
        $this->obj_career->edit($condition, $data_array);
    }

    public function crop($id, $row = 0) {


        $condition = array('career_id' => $id);
        $data['career'] = $this->obj_career->get_all($condition);
        $data["row"] = $row;


        $this->load->view('admin/career/crop', $data);
    }

    public function save() {
        $this->load->library('image_lib');

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/career/main/' . $this->input->post('image_name');
        $config['new_image'] = 'uploads/career/thumb/' . $this->input->post('image_name');
        $config['maintain_ratio'] = FALSE;
        $config['x_axis'] = $this->input->post('x');
        $config['y_axis'] = $this->input->post('y');
        $config['width'] = $this->input->post('w');
        $config['height'] = $this->input->post('h');
        //	$config['dynamic_output'] = TRUE;
        $this->image_lib->initialize($config);
        if ($this->image_lib->crop()) {
            $config2['image_library'] = 'gd2';
            $config2['source_image'] = 'uploads/career/thumb/' . $this->input->post('image_name');
            $config2['new_image'] = 'uploads/career/thumb/' . $this->input->post('image_name');
            $config2['maintain_ratio'] = FALSE;
            $config2['width'] = 350;
            $config2['height'] = 315;
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
        }
        redirect('admin/career', 'refresh');
    }

}

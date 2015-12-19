<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonial extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('testimonial_model', 'hotel_master_model'));
    }

    public function index() {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');
            $this->load->helper("url");
            $config['base_url'] = base_url() . 'admin/testimonial/index/';
            $config['total_rows'] = $this->db->count_all_results('testimonial');
            $config['per_page'] = 1;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data["links"] = $this->pagination->create_links();
            $data['testimonials'] = $this->testimonial_model->list_hotel_testimonial($config["per_page"], $page);

            $this->load->view('admin/testimonial/testimonial_list', $data);
        }
    }

    public function add_testimonial() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');
            $this->load->helper('form');

            $this->form_validation->set_rules('testimonial_name', 'Name', 'required');
            $this->form_validation->set_rules('testimonial_place', 'Palce', '');
            $this->form_validation->set_rules('testimonial_content', 'Content', '');
            if ($this->form_validation->run() == FALSE) {
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                $this->load->view('admin/testimonial/add_testimonial', $data);
            } else {

                $image_name = "";

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/testimonial/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {
                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/testimonial/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {
                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/testimonial/main/' . $image_name;
                            $config2['new_image'] = 'uploads/testimonial/thumb/' . $image_name;
                            $config2['maintain_ratio'] = FALSE;
                            $config2['width'] = 262;
                            $config2['height'] = 277;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    } else {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('admin/testimonial/add_testimonial');
                    }
                }

                $total = $this->testimonial_model->count_rows();
                $total++;
                $this->testimonial_model->add_testimonial($image_name, $total);


                $this->session->set_flashdata('message', 'Sucessfully Added...');

                redirect('admin/testimonial/index');
            }
        }
    }

    function edit_testimonial($testimonial_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('testimonial_name', 'Name', 'required');
            $this->form_validation->set_rules('testimonial_place', 'Palce', '');
            $this->form_validation->set_rules('testimonial_content', 'Content', '');

            if ($this->form_validation->run() == FALSE) {
//                //
                $data['testimonial'] = $this->testimonial_model->get_testimonial($testimonial_id);
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                $this->load->view('admin/testimonial/edit_testimonial', $data);
            } else {

                $image_name = $this->input->post('old_image');

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/testimonial/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {

                        @unlink('uploads/testimonial/main/' . $image_name);
                        @unlink('uploads/testimonial/thumb/' . $image_name);

                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/testimonial/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {

                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/testimonial/main/' . $image_name;
                            $config2['new_image'] = 'uploads/testimonial/thumb/' . $image_name;
                            $config2['maintain_ratio'] = FALSE;
                            $config2['width'] = 262;
                            $config2['height'] = 277;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    }
                }

                $data = array(
                    'testimonial_title' => $this->input->post('testimonial_name'),
                    'testimonial_place' => $this->input->post('testimonial_place'),
                    'testimonial_content' => $this->input->post('testimonial_content'),
                    'testimonial_image' => $image_name
                );
//                print_r($data);exit(0);
                $this->testimonial_model->edit_testimonial($testimonial_id, $image_name, $data);
                $this->session->set_flashdata('message', 'Sucessfully Updated...');

                redirect('admin/testimonial/edit_testimonial/' . $testimonial_id);
            }
        }
    }

    function delete_testimonial($testimonial_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $testimonial = $this->testimonial_model->get_testimonial($testimonial_id);

            @unlink('uploads/testimonial/main/' . $testimonial->testimonial_image);
            @unlink('uploads/testimonial/thumb/' . $testimonial->testimonial_image);

            $this->testimonial_model->delete_testimonial($testimonial_id);

            $this->session->set_flashdata('message', 'Sucessfully deleted...');

            redirect('admin/testimonial/index/');
        }
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('news_model', 'hotel_master_model'));
    }

    public function index() {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');
            $this->load->helper("url");
            $config['base_url'] = base_url() . 'admin/news/index/';
            $config['total_rows'] = $this->db->count_all_results('news');
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data["links"] = $this->pagination->create_links();
            $data['newss'] = $this->news_model->list_hotel_news($config["per_page"], $page);

            $this->load->view('admin/news/news_list', $data);
        }
    }
    public function save() {
        $this->load->library('image_lib');

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/news/main/' . $this->input->post('image_name');
        $config['new_image'] = 'uploads/news/thumb/' . $this->input->post('image_name');
        $config['maintain_ratio'] = FALSE;
        $config['x_axis'] = $this->input->post('x');
        $config['y_axis'] = $this->input->post('y');
        $config['width'] = $this->input->post('w');
        $config['height'] = $this->input->post('h');
        //	$config['dynamic_output'] = TRUE;
        $this->image_lib->initialize($config);
        if ($this->image_lib->crop()) {
            $config2['image_library'] = 'gd2';
            $config2['source_image'] = 'uploads/news/thumb/' . $this->input->post('image_name');
            $config2['new_image'] = 'uploads/news/thumb/' . $this->input->post('image_name');
            $config2['maintain_ratio'] = TRUE;
            $config2['width'] = 270;
            $config2['height'] = 270;

            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
        }
        redirect('admin/news', 'refresh');
    }
    public function crop($id) {
        $data['news'] = $this->news_model->get_news($id);
        $this->load->view('admin/news/crop', $data);
    }
    public function add_news() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');
            $this->load->helper('form');

            $this->form_validation->set_rules('news_name', 'Name', 'required');
            $this->form_validation->set_rules('day_name', 'Day Name', '');
            $this->form_validation->set_rules('news_content', 'Content', '');
            if ($this->form_validation->run() == FALSE) {
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                $this->load->view('admin/news/add_news', $data);
            } else {

                $image_name = "";

                if ($_FILES['fileImage']['name'] != '') {
                    $this->load->library('image_lib');
                    $config['upload_path'] = 'uploads/news/main/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('fileImage')) {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('admin/news/add_news');
                    } else {

                        $data = array('upload_data' => $this->upload->data());

                        $image_name = $data['upload_data']['file_name'];

                        $config['source_image'] = 'uploads/news/main/' . $image_name;
                        $config['new_image'] = 'uploads/news/thumb/' . $image_name;
                        $config['width'] = 270;
                        $config['height'] = 270;
                        $config['maintain_ratio'] = FALSE;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                }

                $total = $this->news_model->count_rows();
                $total++;
                $this->news_model->add_news($image_name, $total);


                $this->session->set_flashdata('message', 'Sucessfully Added...');

                redirect('admin/news/index');
            }
        }
    }

    function edit_news($news_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('news_name', 'Name', 'required');
            $this->form_validation->set_rules('news_content', 'Content', '');

            if ($this->form_validation->run() == FALSE) {
//                //
                $data['news'] = $this->news_model->get_news($news_id);
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                $this->load->view('admin/news/edit_news', $data);
            } else {

                $image_name = $this->input->post('old_image');

                if ($_FILES['fileImage']['name'] != '') {
                    $config['upload_path'] = 'uploads/news/main/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('fileImage')) {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('admin/news/edit_news/' . $news_id);
                    } else {
                        @unlink('uploads/news/main/' . $image_name);
                        @unlink('uploads/news/thumb/' . $image_name);
                        $data = array('upload_data' => $this->upload->data());

                        $image_name = $data['upload_data']['file_name'];

                        $config['source_image'] = 'uploads/news/main/' . $image_name;
                        $config['new_image'] = 'uploads/news/thumb/' . $image_name;
                        $config['width'] = 270;
                        $config['height'] = 270;
                        $config['maintain_ratio'] = FALSE;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();

                    }
                }
                

                $data = array(
                    'news_title' => $this->input->post('news_name'),
                    'news_content' => $this->input->post('news_content'),
                    'category' => $this->input->post('category_name'),
                    'day_name' => $this->input->post('day_name'), 
                    'news_image' => $image_name
                );
//                print_r($data);exit(0);
                $this->news_model->edit_news($news_id, $image_name, $data);
                $this->session->set_flashdata('message', 'Sucessfully Updated...');

                redirect('admin/news/edit_news/' . $news_id);
            }
        }
    }

    function delete_news($news_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $news = $this->news_model->get_news($news_id);

            @unlink('uploads/news/main/' . $news->news_image);
            @unlink('uploads/news/thumb/' . $news->news_image);

            $this->news_model->delete_news($news_id);

            $this->session->set_flashdata('message', 'Sucessfully deleted...');

            redirect('admin/news/index/');
        }
    }

}

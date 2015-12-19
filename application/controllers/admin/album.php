<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Album extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('gallery_model', 'hotel_master_model'));
    }

    public function index($hotel_master_id) {
        $condition = array('hotel_master_id' => $hotel_master_id);
        $this->session->set_userdata('hotel_id', $hotel_master_id);
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');
            $this->load->helper("url");
            $config['base_url'] = base_url() . 'admin/album/index/' . $hotel_master_id . '/';
            $config['total_rows'] = $this->db->count_all_results('album');
            $config['per_page'] = 50;
            $config['uri_segment'] = 5;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $data["links"] = $this->pagination->create_links();
            $data['albums'] = $this->gallery_model->list_hotel_album($condition, $config["per_page"], $page);
            $data['hotel_id'] = $hotel_master_id;
//            //

            $this->load->view('admin/album/album_list', $data);
        }
    }

    public function add_album($id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');
            $this->load->helper('form');

            $this->form_validation->set_rules('album_name', 'Album Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['id'] = $id;
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
//                //
                $this->load->view('admin/album/add_album', $data);
            } else {

                $image_name = "";

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/album/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {
                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/album/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {
                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/album/main/' . $image_name;
                            $config2['new_image'] = 'uploads/album/thumb/' . $image_name;
                            $config2['maintain_ratio'] = FALSE;
                            $config2['width'] = 262;
                            $config2['height'] = 277;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    } else {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('admin/album/add_album/' . $id);
                    }
                }

                $link = $this->input->post('hotel_master');
                $total = $this->gallery_model->count_rows($link);
                $total++;
                $this->gallery_model->add_album($image_name, $link, $total);


                $this->session->set_flashdata('message', 'Sucessfully Added...');

                redirect('admin/album/index/' . $link);
            }
        }
    }

    function edit_album($album_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('album_name', 'Album Name', 'required');

            if ($this->form_validation->run() == FALSE) {
//                //
                $data['album'] = $this->gallery_model->get_album($album_id);
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                $this->load->view('admin/album/edit_album', $data);
            } else {

                $image_name = $this->input->post('old_image');

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/album/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {

                        @unlink('uploads/album/main/' . $image_name);
                        @unlink('uploads/album/thumb/' . $image_name);

                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/album/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {

                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/album/main/' . $image_name;
                            $config2['new_image'] = 'uploads/album/thumb/' . $image_name;
                            $config2['maintain_ratio'] = FALSE;
                            $config2['width'] = 262;
                            $config2['height'] = 277;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    }
                }

                $data = array(
                    'album_title' => $this->input->post('album_name'),
                    'album_image' => $image_name,
                    'hotel_master_id' => $this->input->post('hotel_master')
                );
//                print_r($data);exit(0);
                $this->gallery_model->edit_album($album_id, $image_name, $data);
                $this->session->set_flashdata('message', 'Sucessfully Updated...');

                redirect('admin/album/edit_album/' . $album_id);
            }
        }
    }

    function delete_album($album_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $album = $this->gallery_model->get_album($album_id);

            @unlink('uploads/album/main/' . $album->album_image);
            @unlink('uploads/album/thumb/' . $album->album_image);

            $result = $this->db->where('album_id', $album_id)->get('gallery')->result();
//            print_r($result);exit(0);
            foreach ($result as $availabe) {
                @unlink('uploads/gallery/main/' . $availabe->gallery_image);
                @unlink('uploads/gallery/thumb/' . $availabe->gallery_image);
                $this->gallery_model->delete_gallery($availabe->gallery_id);
            }
            $this->gallery_model->delete_album($album_id);

            $this->session->set_flashdata('message', 'Sucessfully deleted...');

            redirect('admin/album/index/' . $this->session->userdata('hotel_id'));
        }
    }

    function gallery($album_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');
            $this->session->set_userdata('album', $album_id);
            $config['base_url'] = base_url() . 'admin/album/gallery/' . $album_id;

            $this->db->where('album_id', $album_id);
            $config['total_rows'] = $this->db->get('gallery')->num_rows();
            $config['per_page'] = 10;
            $config['uri_segment'] = 5;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);

            $data['album_id'] = $album_id;
//            //
            $data['gallery'] = $this->gallery_model->list_gallery($album_id, $config['per_page'], $this->uri->segment(5));
//            print_r($data['gallery']);exit(0);
            $this->load->view('admin/gallery/gallery_list', $data);
        }
    }

    function add_gallery($album_id) {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');
            $this->load->helper('form');

            $this->form_validation->set_rules('gallery_name', 'Gallery Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['album'] = $album_id;
                $this->load->view('admin/gallery/add_gallery', $data);
            } else {

                $image_name = "";

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/gallery/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {
                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/gallery/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {
                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/gallery/main/' . $image_name;
                            $config2['new_image'] = 'uploads/gallery/thumb/' . $image_name;
                            $config2['maintain_ratio'] = FALSE;
                            $config2['width'] = 262;
                            $config2['height'] = 277;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    } else {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('admin/album/add_gallery/' . $id);
                    }
                }

                $link = $this->session->userdata('hotel_id');
                $total = $this->gallery_model->count_row($album_id);
                $total++;

                $this->gallery_model->add_gallery($image_name, $link, $total);


                $this->session->set_flashdata('message', 'Sucessfully Added...');

                redirect('admin/album/add_gallery/' . $album_id);
            }
        }
    }

    function edit_gallery($gallery_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('gallery_name', 'Gallery Name', 'required');

            if ($this->form_validation->run() == FALSE) {
//                //
                $data['gallery'] = $this->gallery_model->get_gallery($gallery_id);
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                $this->load->view('admin/gallery/edit_gallery', $data);
            } else {

                $image_name = $this->input->post('old_image');

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/gallery/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {

                        @unlink('uploads/gallery/main/' . $image_name);
                        @unlink('uploads/gallery/thumb/' . $image_name);

                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/gallery/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {

                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/gallery/main/' . $image_name;
                            $config2['new_image'] = 'uploads/gallery/thumb/' . $image_name;
                            $config2['maintain_ratio'] = FALSE;
                            $config2['width'] = 262;
                            $config2['height'] = 277;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    }
                }

                $data = array(
                    'gallery_name' => $this->input->post('gallery_name'),
                    'gallery_image' => $image_name
                );
//                print_r($data);exit(0);
                $this->gallery_model->edit_gallery($gallery_id, $image_name, $data);
                $this->session->set_flashdata('message', 'Sucessfully Updated...');

                redirect('admin/album/edit_gallery/' . $gallery_id);
            }
        }
    }

    function delete_gallery($gallery_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $result = $this->gallery_model->get_gallery($gallery_id);
            @unlink('uploads/gallery/main/' . $result->gallery_image);
            @unlink('uploads/gallery/thumb/' . $result->gallery_image);
            $this->gallery_model->delete_gallery($gallery_id);

            $this->session->set_flashdata('message', 'Sucessfully deleted...');

            redirect('admin/album/gallery/' . $this->session->userdata('album'));
        }
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room_master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('room_master_model','hotel_master_model'));
    }

    public function index($hotel_master_id) {
        $condition = array('hotel_master_id'=>$hotel_master_id);
        $this->session->set_userdata('hotel_id',$hotel_master_id);
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'admin/room_master/index';
            $config['total_rows'] = $this->db->count_all_results('room_master');
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);
            $data['room_masters'] = $this->room_master_model->list_hotel_rooms($condition);
            $data['hotel_id'] = $hotel_master_id;
//            //

            $this->load->view('admin/room_master_list', $data);
        }
    }

    public function add_room_master($id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');
            $this->load->helper('form');

            $this->form_validation->set_rules('room_type', 'Room Type', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['id'] = $id;
                $data['room_type_master'] = $this->db->get('room_type_master')->result();
//                //
                $this->load->view('admin/add_room_master',$data);
            } else {

                $image_name = "";

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/room_master/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {
                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/room_master/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {
                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/room_master/main/' . $image_name;
                            $config2['new_image'] = 'uploads/room_master/thumb/' . $image_name;
                            $config2['maintain_ratio'] = TRUE;
                            $config2['width'] = 460;
                            $config2['height'] = 280;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    }
                }
                $link = $this->input->post('hotel_master');
                $this->room_master_model->add_room_master($image_name);


                $this->session->set_flashdata('message', 'Sucessfully Added...');

                redirect('admin/room_master/index/'.$link);
            }
        }
    }

    function edit_room_master($room_master_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('room_type', 'Room Type', 'required');

            if ($this->form_validation->run() == FALSE) {
//                //
                $data['room_master'] = $this->room_master_model->get_room_master($room_master_id);
                $data['room_type_master'] = $this->db->get('room_type_master')->result();
                $this->load->view('admin/edit_room_master', $data);
            } else {

                $image_name = $this->input->post('old_image');

                if (!empty($_FILES['fileImage']['name'])) {

                    $this->load->library('image_lib');

                    $config['upload_path'] = 'uploads/room_master/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileImage')) {

                        @unlink('uploads/room_master/main/' . $image_name);
                        @unlink('uploads/room_master/thumb/' . $image_name);

                        $data = array('upload_data' => $this->upload->data());
                        $image_name = $data['upload_data']['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/room_master/main/' . $image_name;
                        $config['maintain_ratio'] = FALSE;
                        $config['x_axis'] = $this->input->post('x1');
                        $config['y_axis'] = $this->input->post('y1');
                        $config['width'] = $this->input->post('w');
                        $config['height'] = $this->input->post('h');

                        $this->image_lib->initialize($config);
                        if ($this->image_lib->crop()) {

                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = 'uploads/room_master/main/' . $image_name;
                            $config2['new_image'] = 'uploads/room_master/thumb/' . $image_name;
                            $config2['maintain_ratio'] = TRUE;
                            $config2['width'] = 460;
                            $config2['height'] = 280;
                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                        }
                    }
                }



                $this->room_master_model->edit_room_master($room_master_id, $image_name);
                $this->session->set_flashdata('message', 'Sucessfully Updated...');

                redirect('admin/room_master/edit_room_master/' . $room_master_id);
            }
        }
    }

    function delete_room_master($room_master_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $room_master = $this->room_master_model->get_room_master($room_master_id);
            
            @unlink('uploads/room_master/main/' . $room_master->image);
            @unlink('uploads/room_master/thumb/' . $room_master->image);
            
            $result = $this->db->where('room_master_id', $room_master_id)->get('room_availability_season')->result();
//            print_r($result);exit(0);
            foreach($result as $availabe){
                $this->room_master_model->delete_room_availability_season($availabe->room_availability_season_id);
            }
            $this->room_master_model->delete_room_master($room_master_id);

            $this->session->set_flashdata('message', 'Sucessfully deleted...');

            redirect('admin/room_master/index/'.$this->session->userdata('hotel_id'));
        }
    }

    function room_availability_season($room_master_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'admin/room_master/availability_season/' . $room_master_id;

            $this->db->where('room_master_id', $room_master_id);
            $config['total_rows'] = $this->db->get('room_availability_season')->num_rows();
            $config['per_page'] = 10;
            $config['uri_segment'] = 5;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);

            $data['room_master_id'] = $room_master_id;
//            //
            $data['room_availability_season'] = $this->room_master_model->list_room_availability_season($room_master_id, $config['per_page'], $this->uri->segment(5));

            $this->load->view('admin/room_availability_season', $data);
        }
    }

    function add_room_availability_season($room_master_id) {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('from_date', 'From Date', 'required');
            $this->form_validation->set_rules('to_date', 'To Date', 'required');
            $this->form_validation->set_rules('rate', 'Rate', 'required');
            $this->form_validation->set_rules('availability', 'Availability', 'required');

            if ($this->form_validation->run() == FALSE) {

                $data['room_master_id'] = $room_master_id;

                $this->load->view('admin/add_room_availability_season', $data);
            } else {

                $this->room_master_model->add_room_availability_season($room_master_id);

                $this->session->set_flashdata('message', 'Sucessfully Added...');

                redirect('admin/room_master/room_availability_season/' . $room_master_id);
            }
        }
    }

    function edit_room_availability_season($room_master_id, $room_availability_season_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('from_date', 'From Date', 'required');
            $this->form_validation->set_rules('to_date', 'To Date', 'required');
            $this->form_validation->set_rules('rate', 'Rate', 'required');
            $this->form_validation->set_rules('availability', 'Availability', 'required');

            if ($this->form_validation->run() == FALSE) {

                $data['room_availability_season'] = $this->room_master_model->get_room_availability_season($room_availability_season_id);

                $this->load->view('admin/edit_room_availability_season', $data);
            } else {

                $this->room_master_model->edit_room_availability_season($room_availability_season_id);
                $this->session->set_flashdata('message', 'Sucessfully Updated...');

                redirect('admin/room_master/edit_room_availability_season/' . $room_master_id . '/' . $room_availability_season_id);
            }
        }
    }

    function delete_room_availability_season($room_master_id, $room_availability_season_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->room_master_model->delete_room_availability_season($room_availability_season_id);

            $this->session->set_flashdata('message', 'Sucessfully deleted...');

            redirect('admin/room_master/room_availability_season/' . $room_master_id);
        }
    }

}

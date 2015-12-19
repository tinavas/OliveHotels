<?php

if (!defined('BASEPATH'))
    exit('No Drect script access allowed');

class career_sub extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('career_sub_model', 'obj_career_sub', TRUE);
        $this->load->model('career_model', 'obj_career', TRUE);
        $this->load->model(array('room_master_model', 'hotel_master_model'));
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        }
    }

    function set_data($id = 0) {
        $this->session->unset_userdata('career_id');

        $sess_data = array('career_id' => $this->uri->segment(4));

        $this->session->set_userdata($sess_data);


        redirect('admin/career_sub/index');
    }

    function index($id = '', $row = 0) {


        //$this->session->set_userdata('career_id',$id);
        //	echo $this->session->userdata('career_id');
        $condition = array('career_id' => $this->session->userdata('career_id'));



        $data['career_id'] = $this->session->userdata('career_id');
        $category_career_name = $this->obj_career->get_all($condition);
        if ($category_career_name) {
            $data['career_title'] = $category_career_name[0]['career_title'];
        } else {
            $data['career_title'] = '';
        }
        $limit = '100';
        $config['base_url'] = base_url() . '/career_sub/index/' . $this->session->userdata('career_id');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['total_rows'] = $this->obj_career_sub->countrows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['career'] = $this->obj_career_sub->get_all_entries($row, $limit, $condition, 'enquiry_id', 'desc');
        $data['row'] = $row;

        $this->load->view('admin/career_sub/career_sub_list', $data);
    }

    function add($id) {
        $condition = array('career_id' => $this->session->userdata('career_id'));
        $category_career_name = $this->obj_career->get_all($condition);
        if ($category_career_name) {
            $data['career_name'] = $category_career_name[0]['career_name'];
        } else {
            $data['career_name'] = '';
        }
        if ($this->session->userdata('ADMIN_NAME') == FALSE) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('career_sub_title', 'career_sub_title', '');
            $this->form_validation->set_rules('career_color', 'career_color', '');
            if ($this->form_validation->run() == TRUE) {

                $file_name = '';
                $error = '';
                if ($_FILES['image']['name'] != '') {

                    $config['upload_path'] = 'uploads/career/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        $error = $this->upload->display_errors();
                    } else {
                        $data = array('upload_data' => $this->upload->data());

                        $file_name = $data['upload_data']['file_name'];
                        $config['source_image'] = 'uploads/career/main/' . $file_name;
                        $config['new_image'] = 'uploads/career/thumb/' . $file_name;

                        $config['width'] = 228;
                        $config['height'] = 223;
                        $config['maintain_ratio'] = TRUE;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    }
                }


                $data_array = array('career_id' => $this->session->userdata('career_id'),
                    'career_sub_image' => $file_name,
                    'career_sub_title' => $this->input->post('career_sub_title')
                );

                if ($error) {

                    $condition = array('career_id' => $this->session->userdata('career_id'));
                    $category_career_name = $this->obj_career->get_all($condition);
                    if ($category_career_name) {
                        $data['career_name'] = $category_career_name[0]['career_name'];
                    } else {
                        $data['career_name'] = '';
                    }
                    $data['error'] = $error;
                    $this->load->view('admin/header', $data);

                    $this->load->view('admin/career_sub/add_career_sub');
                    $this->load->view('admin/footer');
                } else {

                    $this->obj_career_sub->add($data_array);

                    redirect('admin/career_sub/index/' . $id);
                }
            } else {

                $data['admin'] = $this->session->userdata('ADMIN_NAME');
                $data['id'] = $id;

                $this->load->view('admin/header', $data);
                $this->load->view('admin/left');
                $this->load->view('admin/career_sub/add_career_sub');
                $this->load->view('admin/footer');
            }
        }
    }

    public function crop($id) {


        $condition = array('career_sub_id' => $id);


        //echo $this->session->userdata('ADMIN_NAME');
        $condition_array = array('career_id' => $this->session->userdata('career_id'));
        $category_career_name = $this->obj_career->get_all($condition_array);
        if ($category_career_name) {
            $data['career_name'] = $category_career_name[0]['career_name'];
        } else {
            $data['career_name'] = '';
        }
        $data['career_sub'] = $this->obj_career_sub->get_all($condition);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left');
        $this->load->view('admin/career_sub/crop');
        $this->load->view('admin/footer');
    }

    public function edit($id) {

        $row = 0;
        $condition = array('enquiry_id' => $id);


        //echo $this->session->userdata('ADMIN_NAME');
        $condition_array = array('career_id' => $this->session->userdata('career_id'));
        $category_career_name = $this->obj_career->get_all($condition_array);
        if ($category_career_name) {
            $data['career_name'] = $category_career_name[0]['career_name'];
        } else {
            $data['career_name'] = '';
        }

        if ($this->session->userdata('ADMIN_NAME') == FALSE) {
            redirect('/');
        } else {



            $this->form_validation->set_rules('career_sub_title', 'career_sub_title', '');

            if ($this->form_validation->run() == TRUE) {

                $file_name = '';
                $error = '';

                if ($_FILES['image']['name'] != '') {

                    $config['upload_path'] = 'uploads/career/main/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        $data['error'] = $this->upload->display_errors();
                    } else {
                        $data_image = array('upload_data' => $this->upload->data());

                        $file_name = $data_image['upload_data']['file_name'];
                        $config['source_image'] = 'uploads/career/main/' . $file_name;
                        $config['new_image'] = 'uploads/career/thumb/' . $file_name;
                        $config['width'] = 228;
                        $config['height'] = 223;
                        $config['maintain_ratio'] = TRUE;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();


                        @unlink('./uploads/career/main/' . $this->input->post('career_sub_image'));
                        @unlink('./uploads/career/thumb/' . $this->input->post('career_sub_image'));
                    }
                } else {
                    $file_name = $this->input->post('career_sub_image');
                }


                if ($error) {
                    $data['error'] = $error;
                    $data['career_sub'] = $this->obj_career_sub->get_all($condition);

                    $this->load->view('admin/header', $data);

                    $this->load->view('admin/career_sub/edit_career_sub');
                    $this->load->view('admin/footer');
                } else {

                    $data_array = array(
                        'career_sub_image' => $file_name,
                        'career_sub_title' => $this->input->post('career_sub_title')
                    );
                    $this->obj_career_sub->edit($condition, $data_array);

                    $this->session->set_userdata('msg', 'Sucessfully updated');

                    $data['career_sub'] = $this->obj_career_sub->get_all($condition);
                    $data['row'] = $row;
                    $this->load->view('admin/header', $data);
                    $this->load->view('admin/left');
                    $this->load->view('admin/career_sub/edit_career_sub');
                    $this->load->view('admin/footer');
                }
            } else {


                $data['career_sub'] = $this->obj_career_sub->get_all($condition);
                $data['row'] = $row;
                $this->load->view('admin/header', $data);
                $this->load->view('admin/left');
                $this->load->view('admin/career_sub/edit_career_sub');
                $this->load->view('admin/footer');
            }
        }
    }

    function delete($id) {

        $condition = array('enquiry_id' => $id);
        $career = $this->obj_career_sub->get_all($condition);
        @unlink('./uploads/career/' . $career[0]['file']);

        $this->obj_career_sub->delete($condition);

        redirect('admin/career_sub/index/' . $this->session->userdata('career_id'));
    }

    function update_order() {

        $career_sub_id = $this->input->post('career_sub_id');
        $color_id = $this->input->post('color_id');
        $condition = array('career_sub_id' => $career_sub_id);
        $data_array = array('color_id' => $color_id);
        $this->obj_career_sub->edit($condition, $data_array);
    }

    function update_home_status() {

        $career_id = $this->input->post('career_id');
        $career_status = $this->input->post('career_status');
        $condition = array('career_id' => $career_id);
        $data_array = array('career_home_page_status' => $career_status
        );
        $this->obj_sub_career->edit($condition, $data_array);
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
        //$config['dynamic_output'] = TRUE;
        $this->image_lib->initialize($config);
        if ($this->image_lib->crop()) {
            $config2['image_library'] = 'gd2';
            $config2['source_image'] = 'uploads/career/thumb/' . $this->input->post('image_name');
            $config2['new_image'] = 'uploads/career/thumb/' . $this->input->post('image_name');

            $config2['maintain_ratio'] = TRUE;
            $config2['width'] = 228;
            $config2['height'] = 223;
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
        }
        redirect('admin/career_sub/index/' . $this->session->userdata('career_id'), 'refresh');
    }

}

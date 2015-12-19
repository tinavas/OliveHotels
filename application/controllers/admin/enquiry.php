<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enquiry extends CI_Controller {

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
            $this->load->library('pagination');
            $this->load->model('enquiry_model');

            $config['base_url'] = base_url() . 'admin/enquiry/list_all';
            $config['total_rows'] = $this->db->count_all_results('enquiry');
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);

            $data['enquirys'] = $this->enquiry_model->list_enquiry_pages($config['per_page'], $this->uri->segment(4));
            $data['room_masters'] = $this->db->get('room_master')->result();
            $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
            
            $this->load->view('admin/enquiry_list', $data);
        }
    }


    function edit_enquiry($enquiry_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->model('enquiry_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('checkin_date', 'Checkin Date', 'required');
            $this->form_validation->set_rules('checkout_date', 'Checkout Date', 'required');
            $this->form_validation->set_rules('room_type', 'Room Type', 'required');
            $this->form_validation->set_rules('no_rooms', 'Number of Rooms', 'required');
            $this->form_validation->set_rules('enquiry_name', 'Brand Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('no_child', 'no_child', '');
            $this->form_validation->set_rules('no_extra_bed', 'no_extra_bed', '');
            $this->form_validation->set_rules('requirements', 'requirements', '');
            $this->form_validation->set_rules('email', 'email', '');
            $this->form_validation->set_rules('country', 'country', '');
            $this->form_validation->set_rules('state', 'state', '');
            $this->form_validation->set_rules('city', 'city', '');
            $this->form_validation->set_rules('address', 'address', '');
            
            if ($this->form_validation->run() == FALSE) {
                $data['enquiry'] = $this->enquiry_model->get_enquiry($enquiry_id);
                $data['enquiry_rooms'] = $this->db->where('enquiry_id', $enquiry_id)->get('enquiry_rooms')->result();
                $data['room_masters'] = $this->db->get('room_master')->result();
                $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                
                $this->load->view('admin/edit_enquiry', $data);
            } else {
                $checkin_date = $this->input->post('checkin_date');
                $checkout_date = $this->input->post('checkout_date');
                $room_type = $this->input->post('room_type');
                $no_rooms = $this->input->post('no_rooms');
                $no_people = $this->input->post('no_people');
                $no_child = $this->input->post('no_child');
                $no_extra_bed = $this->input->post('no_extra_bed');
                $enquiry_status = '';
                $date_diff = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
                if (!empty($checkin_date) && !empty($checkout_date) && !empty($room_type)) {

                    $this_date = $checkin_date;
                    for ($i = 1; $i <= $date_diff; $i++) {

                        $booked_rooms = 0;
                        $remaining_rooms = 0;

                        $this->db->select('SUM(no_rooms) as booked_rooms');
                        $this->db->where('date_checkin <=', $this_date);
                        $this->db->where('date_checkout >=', $this_date);
                        $this->db->where('room_master_id', $room_type);
                        $this->db->where('enquiry_id !=', $enquiry_id);
                        $booked_rooms = $this->db->get('enquiry')->first_row()->booked_rooms;
                        if (empty($booked_rooms)) {
                            $booked_rooms = 0;
                        }

                        $this->db->select('room_availability_season.availability,room_availability_season.rate');
                        $this->db->from('room_master');
                        $this->db->join('room_availability_season', 'room_master.room_master_id=room_availability_season.room_master_id');
                        $this->db->where('room_availability_season.from_date <=', $this_date);
                        $this->db->where('room_availability_season.to_date >=', $this_date);
                        $this->db->where('room_master.room_master_id', $room_type);
                        $this->db->order_by('room_availability_season.priority', 'asc');
                        $room_master = $this->db->get()->first_row();

                        $remaining_rooms = $room_master->availability - $booked_rooms;

                        if ($remaining_rooms < $no_rooms) {
                            $enquiry_status = 'Selected Number of Rooms are not Available';
                            break;
                        }
                        $this_date = date('Y-m-d', strtotime($this_date . '+1 days'));
                    }

                    if (empty($enquiry_status)) {
                        $this->db->where('room_master.room_master_id', $room_type);
                        $room_master = $this->db->get('room_master')->first_row();

                        if (($room_master->no_adults * $no_rooms) < $no_people) {
                            $enquiry_status = 'Number of People Exceed. Please Select More Rooms';
                        }
                        if (($room_master->no_child * $no_rooms) < $no_child) {
                            $enquiry_status = 'Number of Child Exceed. Please Select More Rooms';
                        }
                        if (($room_master->no_extra_bed * $no_rooms) < $no_extra_bed) {
                            $enquiry_status = 'Number of Child Exceed. Please Select More Rooms';
                        }
                    }
                } else {
                    $enquiry_status = 'Please Select Check in Date, Check out Date and Room Type';
                }

                if (!empty($enquiry_status)) {

                    $data['enquiry'] = $this->enquiry_model->get_enquiry($enquiry_id);
                    $data['enquiry_rooms'] = $this->db->where('enquiry_id', $enquiry_id)->get('enquiry_rooms')->result();
                    $data['room_masters'] = $this->db->get('room_master')->result();
                    $data['err_mgs'] = $enquiry_status;
                    $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
                    
                    $this->load->view('admin/edit_enquiry', $data);
                } else {

                    $this->enquiry_model->edit_enquiry($enquiry_id);
                    $this->session->set_flashdata('message', 'Sucessfully Updated...');

                    redirect('admin/enquiry/edit_enquiry/' . $enquiry_id);
                }
            }
        }
    }

    function delete_enquiry($enquiry_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->model('enquiry_model');
            $this->enquiry_model->delete_enquiry($enquiry_id);
            $this->session->set_flashdata('message', 'Sucessfully Deleted...');

            redirect('admin/enquiry');
        }
    }
    
    function gm_enquiry(){
       if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');
            $this->load->model('enquiry_model');

            $config['base_url'] = base_url() . 'admin/enquiry/list_all';
            $config['total_rows'] = $this->db->count_all_results('enquiry');
            $config['per_page'] = 100;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);

            $data['enquirys'] = $this->enquiry_model->list_gm_enquiry_pages($config['per_page'], $this->uri->segment(4));
//            $data['room_masters'] = $this->db->get('room_master')->result();
//            $data['hotel_master'] = $this->hotel_master_model->list_hotel_master();
            
            $this->load->view('admin/gm-enquiry-list', $data);
        }
    }
    
    function delete_gm_enquiry($enquiry_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->model('enquiry_model');
            $this->enquiry_model->delete_gm_enquiry($enquiry_id);
            $this->session->set_flashdata('message', 'Sucessfully Deleted...');

            redirect('admin/enquiry/gm_enquiry');
        }
    }


}

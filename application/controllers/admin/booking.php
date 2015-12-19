<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('hotel_master_model', 'room_master_model'));
    }

    function calendar() {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $timeid = $this->uri->segment(4);
            if ($timeid == 0) {
                $time = time();
            } else {
                $time = $timeid;
            }
            $data = $this->_date($time);
            //
            $this->load->view('admin/calendar', $data);
        }
    }

    public function list_all() {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');
            $this->load->model('booking_model');

            $config['base_url'] = base_url() . 'admin/booking/list_all';
            $config['total_rows'] = $this->db->count_all_results('booking');
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);

            $data['bookings'] = $this->booking_model->list_booking_pages($config['per_page'], $this->uri->segment(4));
            $data['room_masters'] = $this->db->get('room_master')->result();
            //

            $this->load->view('admin/booking_list', $data);
        }
    }

    public function search() {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');
            $this->load->model('booking_model');

            $search_query = $this->input->get('search_query');
            $room_type = $this->input->get('room_type');
            $checkin_date = $this->input->get('checkin_date');
            $hotel_master = $this->input->get('hotel_master');

            $config['base_url'] = base_url() . 'admin/booking/search?search_query=' . $search_query
                    . '&room_type=' . $room_type
                    . '&checkin_date=' . $checkin_date
                    . '&hotel_master=' . $hotel_master;

            $config['total_rows'] = $this->booking_model->search_booking_count();
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);

            $data['bookings'] = $this->booking_model->search_booking_pages($config['per_page'], $this->input->get('per_page'));
            $data['room_masters'] = $this->db->get('room_master')->result();
            //

            $this->load->view('admin/booking_list', $data);
        }
    }

    function add_booking() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->model('booking_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('checkin_date', 'Checkin Date', 'required');
            $this->form_validation->set_rules('checkout_date', 'Checkout Date', 'required');
            $this->form_validation->set_rules('room_type', 'Room Type', 'required');
            $this->form_validation->set_rules('no_rooms', 'Number of Rooms', 'required');
            $this->form_validation->set_rules('booking_name', 'Brand Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('hotel_master', 'Hotel', 'required');
            $this->form_validation->set_rules('no_people', 'no_people', '');
            $this->form_validation->set_rules('no_child', 'no_child', '');
            $this->form_validation->set_rules('no_extra_bed', 'no_extra_bed', '');
            $this->form_validation->set_rules('requirements', 'requirements', '');
            $this->form_validation->set_rules('email', 'email', '');
            $this->form_validation->set_rules('country', 'country', '');
            $this->form_validation->set_rules('state', 'state', '');
            $this->form_validation->set_rules('city', 'city', '');
            $this->form_validation->set_rules('address', 'address', '');

            if ($this->form_validation->run() == FALSE) {
                $data['room_masters'] = $this->db->get('room_master')->result();
                //

                $this->load->view('admin/add_booking', $data);
            } else {

                $checkin_date = $this->input->post('checkin_date');
                $checkout_date = $this->input->post('checkout_date');
                $room_type = $this->input->post('room_type');
                $hotel_master = $this->input->post('hotel_master');
                $no_rooms = $this->input->post('no_rooms');
                $no_people = $this->input->post('no_people');
                $no_child = $this->input->post('no_child');
                $no_extra_bed = $this->input->post('no_extra_bed');
                $booking_status = '';
                $date_diff = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
                if ($date_diff == '0') {
                    $booking_status = 'Invalid checkin and checkout date';
                }
                if (!empty($checkin_date) && !empty($checkout_date) && !empty($room_type)) {

                    $this_date = $checkin_date;
                    for ($i = 0; $i <= $date_diff; $i++) {

                        $booked_rooms = 0;
                        $remaining_rooms = 0;

                        $this->db->select('SUM(no_rooms) as booked_rooms');
                        $this->db->where('date_checkin <=', $this_date);
                        $this->db->where('date_checkout >=', $this_date);
                        $this->db->where('room_master_id', $room_type);
                        $this->db->where('hotel_master_id', $hotel_master);
                        $booked_rooms = $this->db->get('booking')->first_row()->booked_rooms;
                        if (empty($booked_rooms)) {
                            $booked_rooms = 0;
                        }

                        $this->db->select('room_availability_season.availability,room_availability_season.rate');
                        $this->db->from('room_master');
                        $this->db->join('room_availability_season', 'room_master.room_master_id=room_availability_season.room_master_id');
                        $this->db->where('room_availability_season.from_date <=', $this_date);
                        $this->db->where('room_availability_season.to_date >=', $this_date);
                        $this->db->where('room_master.room_master_id', $room_type);
                        $this->db->where('room_master.hotel_master_id', $hotel_master);
                        $this->db->order_by('room_availability_season.priority', 'asc');
                        $room_master = $this->db->get()->first_row();
                        if (empty($room_master)) {
                            $booking_status = 'Rooms are not available for the selected dates';
                        }
                        $remaining_rooms = $room_master->availability - $booked_rooms;
                        if (($remaining_rooms < $no_rooms) || ($remaining_rooms == 0)) {
                            $booking_status = 'Selected Number of Rooms are not Available';
                            break;
                        }

                        $this_date = date('Y-m-d', strtotime($this_date . '+1 days'));
                    }

                    if (empty($booking_status)) {
                        $this->db->where('room_master.room_master_id', $room_type);
                        $this->db->where('room_master.hotel_master_id', $hotel_master);
                        $room_master = $this->db->get('room_master')->first_row();

                        if (($room_master->no_adults * $no_rooms) < $no_people) {
                            $booking_status = 'Number of People Exceed. Please Select More Rooms';
                        }
                        if (($room_master->no_child * $no_rooms) < $no_child) {
                            $booking_status = 'Number of Child Exceed. Please Select More Rooms';
                        }
                        if (($room_master->no_extra_bed * $no_rooms) < $no_extra_bed) {
                            $booking_status = 'Number of Child Exceed. Please Select More Rooms';
                        }
                    }
                } else {
                    $booking_status = 'Please Select Check in Date, Check out Date and Room Type';
                }

                if (!empty($booking_status)) {
                    $data['room_masters'] = $this->db->get('room_master')->result();
                    $data['err_mgs'] = $booking_status;
                    //

                    $this->load->view('admin/add_booking', $data);
                } else {

                    $this->output->set_output(json_encode($booking_status));

                    $this->booking_model->add_booking();
                    $this->session->set_flashdata('message', 'Sucessfully Added...');

                    redirect('admin/booking/list_all');
                }
            }
        }
    }

    function edit_booking($booking_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->model('booking_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('checkin_date', 'Checkin Date', 'required');
            $this->form_validation->set_rules('checkout_date', 'Checkout Date', 'required');
            $this->form_validation->set_rules('room_type', 'Room Type', 'required');
            $this->form_validation->set_rules('hotel_master', 'Hotel', 'required');
            $this->form_validation->set_rules('no_rooms', 'Number of Rooms', 'required');
            $this->form_validation->set_rules('booking_name', 'Brand Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('no_child', 'no_child', '');
            $this->form_validation->set_rules('no_people', 'no_people', '');
            $this->form_validation->set_rules('no_extra_bed', 'no_extra_bed', '');
            $this->form_validation->set_rules('requirements', 'requirements', '');
            $this->form_validation->set_rules('email', 'email', '');
            $this->form_validation->set_rules('country', 'country', '');
            $this->form_validation->set_rules('state', 'state', '');
            $this->form_validation->set_rules('city', 'city', '');
            $this->form_validation->set_rules('address', 'address', '');

            if ($this->form_validation->run() == FALSE) {
                $data['booking'] = $this->booking_model->get_booking($booking_id);
                $data['booking_rooms'] = $this->db->where('booking_id', $booking_id)->get('booking_rooms')->result();
                $data['room_masters'] = $this->db->get('room_type_master')->result();;
                //

                $this->load->view('admin/edit_booking', $data);
            } else {
                
            }
        }
    }

    function delete_booking($booking_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->model('booking_model');
            $this->booking_model->delete_booking($booking_id);
            $this->session->set_flashdata('message', 'Sucessfully Deleted...');

            redirect('admin/booking/list_all');
        }
    }

    function _date($time) {
        $data['events'] = array();

        $today = date("Y/n/j", time());
        $data['today'] = $today;

        $current_month = date("n", $time);
        $data['current_month'] = $current_month;

        $current_year = date("Y", $time);
        $data['current_year'] = $current_year;

        $current_month_text = date("F Y", $time);
        $data['current_month_text'] = $current_month_text;

        $total_days_of_current_month = date("t", $time);
        $data['total_days_of_current_month'] = $total_days_of_current_month;

        $first_day_of_month = mktime(0, 0, 0, $current_month, 1, $current_year);
        $data['first_day_of_month'] = $first_day_of_month;

        //geting Numeric representation of the day of the week for first day of the month. 0 (for Sunday) through 6 (for Saturday).
        $first_w_of_month = date("w", $first_day_of_month);
        $data['first_w_of_month'] = $first_w_of_month;

        //how many rows will be in the calendar to show the dates
        $total_rows = ceil(($total_days_of_current_month + $first_w_of_month) / 7);
        $data['total_rows'] = $total_rows;

        //trick to show empty cell in the first row if the month doesn't start from Sunday
        $day = -$first_w_of_month;
        $data['day'] = $day;

        $next_month = mktime(0, 0, 0, $current_month + 1, 1, $current_year);
        $data['next_month'] = $next_month;

        $next_month_text = date("F \'y", $next_month);
        $data['next_month_text'] = $next_month_text;

        $previous_month = mktime(0, 0, 0, $current_month - 1, 1, $current_year);
        $data['previous_month'] = $previous_month;

        $previous_month_text = date("F \'y", $previous_month);
        $data['previous_month_text'] = $previous_month_text;

        $next_year = mktime(0, 0, 0, $current_month, 1, $current_year + 1);
        $data['next_year'] = $next_year;

        $next_year_text = date("F \'y", $next_year);
        $data['next_year_text'] = $next_year_text;

        $previous_year = mktime(0, 0, 0, $current_month, 1, $current_year - 1);
        $data['previous_year'] = $previous_year;

        $previous_year_text = date("F \'y", $previous_year);
        $data['previous_year_text'] = $previous_year_text;

        return $data;
    }

    function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d') {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while ($current <= $last) {
            $dates[] = date($format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }

    function check_availability() {
        $checkin_date = $this->input->post('checkin_date');
        $checkout_date = $this->input->post('checkout_date');
        $room_type = $this->input->post('room_type');
        $no_rooms = $this->input->post('no_rooms');
        $no_people = $this->input->post('no_people');
        $no_child = $this->input->post('no_child');
        $no_extra_bed = $this->input->post('no_extra_bed');
        $booking_status = '';
        $date_diff = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
        if ($date_diff == '0') {
            $booking_status = 'Invalid checkin and checkout date';
        }
        if (!empty($checkin_date) && !empty($checkout_date) && !empty($room_type)) {

            $this_date = $checkin_date;
            for ($i = 1; $i <= $date_diff; $i++) {

                $booked_rooms = 0;
                $remaining_rooms = 0;

                $this->db->select('SUM(no_rooms) as booked_rooms');
                $this->db->where('date_checkin <=', $this_date);
                $this->db->where('date_checkout >=', $this_date);
                $this->db->where('room_master_id', $room_type);
                $booked_rooms = $this->db->get('booking')->first_row()->booked_rooms;
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

                if (($remaining_rooms < $no_rooms) || ($remaining_rooms == 0)) {
                    $booking_status = 'Selected Number of Rooms are not Available';
                    break;
                }
                $this_date = date('Y-m-d', strtotime($this_date . '+1 days'));
            }

            if (empty($booking_status)) {
                $this->db->where('room_master.room_master_id', $room_type);
                $room_master = $this->db->get('room_master')->first_row();

                if (($room_master->no_adults * $no_rooms) < $no_people) {
                    $booking_status = 'Number of People Exceed. Please Select More Rooms';
                }
                if (($room_master->no_child * $no_rooms) < $no_child) {
                    $booking_status = 'Number of Child Exceed. Please Select More Rooms';
                }
                if (($room_master->no_extra_bed * $no_rooms) < $no_extra_bed) {
                    $booking_status = 'Number of Child Exceed. Please Select More Rooms';
                }
            }
        } else {
            $booking_status = 'Please Select Check in Date, Check out Date and Room Type';
        }
        $this->output->set_output(json_encode($booking_status));
    }

    function check_availability_update($booking_id) {
        $checkin_date = $this->input->post('checkin_date');
        $checkout_date = $this->input->post('checkout_date');
        $room_type = $this->input->post('room_type');
        $no_rooms = $this->input->post('no_rooms');
        $no_people = $this->input->post('no_people');
        $no_child = $this->input->post('no_child');
        $no_extra_bed = $this->input->post('no_extra_bed');
        $booking_status = '';
        $date_diff = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
        if ($date_diff == '0') {
            $booking_status = 'Invalid checkin and checkout date';
        }
        if (!empty($checkin_date) && !empty($checkout_date) && !empty($room_type)) {

            $this_date = $checkin_date;
            for ($i = 1; $i <= $date_diff; $i++) {

                $booked_rooms = 0;
                $remaining_rooms = 0;

                $this->db->select('SUM(no_rooms) as booked_rooms');
                $this->db->where('date_checkin <=', $this_date);
                $this->db->where('date_checkout >=', $this_date);
                $this->db->where('room_master_id', $room_type);
                $this->db->where('booking_id !=', $booking_id);
                $booked_rooms = $this->db->get('booking')->first_row()->booked_rooms;
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

                if (($remaining_rooms < $no_rooms) || ($remaining_rooms == 0)) {
                    $booking_status = 'Selected Number of Rooms are not Available';
                    break;
                }
                $this_date = date('Y-m-d', strtotime($this_date . '+1 days'));
            }

            if (empty($booking_status)) {
                $this->db->where('room_master.room_master_id', $room_type);
                $room_master = $this->db->get('room_master')->first_row();

                if (($room_master->no_adults * $no_rooms) < $no_people) {
                    $booking_status = 'Number of People Exceed. Please Select More Rooms';
                }
                if (($room_master->no_child * $no_rooms) < $no_child) {
                    $booking_status = 'Number of Child Exceed. Please Select More Rooms';
                }
                if (($room_master->no_extra_bed * $no_rooms) < $no_extra_bed) {
                    $booking_status = 'Number of Extra Bed Exceed. Please Select More Rooms';
                }
            }
        }
        $this->output->set_output(json_encode($booking_status));
    }

    function get_bookig_date_room($date, $room_master_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $date = date('Y-m-d', $date);

            $this->db->select('booking.date_checkin,booking.hotel_master_id,booking.date_checkout,booking.no_rooms,booking.no_people,'
                    . 'booking.no_child,booking.no_extra_bed,booking.requirements,'
                    . 'users.first_name,users.first_name,users.email,users.phone');
            $this->db->from('booking');
            $this->db->join('users', 'booking.booking_id=users.booking_id');
            $this->db->where('booking.room_master_id', $room_master_id);
            $this->db->where('booking.date_checkin <=', $date);
            $this->db->where('booking.date_checkout >=', $date);
            $data['bookings'] = $this->db->get()->result();
            //

            $this->load->view('admin/bookig_date_room_dynamic', $data);
        }
    }

    function get_rate() {
        $checkin_date = $this->input->post('checkin_date');
        $checkout_date = $this->input->post('checkout_date');
        $room_type = $this->input->post('room_type');
        $no_rooms = $this->input->post('no_rooms');
        $no_people = $this->input->post('no_people');
        $no_child = $this->input->post('no_child');
        $no_extra_bed = $this->input->post('no_extra_bed');
        $booking_status = '';
        $rate = 0;
        $date_diff = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
        if ($date_diff == '0') {
            $booking_status = 'Invalid checkin and checkout date';
        }
        if (!empty($checkin_date) && !empty($checkout_date) && !empty($room_type)) {

            $this_date = $checkin_date;
            for ($i = 1; $i <= $date_diff; $i++) {

                $booked_rooms = 0;
                $remaining_rooms = 0;

                $this->db->select('SUM(no_rooms) as booked_rooms');
                $this->db->where('date_checkin <=', $this_date);
                $this->db->where('date_checkout >=', $this_date);
                $this->db->where('room_master_id', $room_type);
                $booked_rooms = $this->db->get('booking')->first_row()->booked_rooms;
                if (empty($booked_rooms)) {
                    $booked_rooms = 0;
                }

                $this->db->select('room_availability_season.availability,room_availability_season.rate,room_availability_season.rate_double,room_availability_season.rate_extra_bed');
                $this->db->from('room_master');
                $this->db->join('room_availability_season', 'room_master.room_master_id=room_availability_season.room_master_id');
                $this->db->where('room_availability_season.from_date <=', $this_date);
                $this->db->where('room_availability_season.to_date >=', $this_date);
                $this->db->where('room_master.room_master_id', $room_type);
                $this->db->order_by('room_availability_season.priority', 'asc');
                $room_master = $this->db->get()->first_row();

                $remaining_rooms = $room_master->availability - $booked_rooms;

                if ($remaining_rooms < $no_rooms) {
                    $booking_status = 'Selected Number of Rooms are not Available';
                    break;
                } else {

                    if ($no_people == 1) {
                        $rate += $room_master->rate + ($no_extra_bed * $room_master->rate_extra_bed);
                    } elseif ($no_people == 2) {
                        $rate += $room_master->rate_double + ($no_extra_bed * $room_master->rate_extra_bed);
                    } elseif ($no_people > 2) {
                        $rate += $room_master->rate_double + ($no_extra_bed+1 * $room_master->rate_extra_bed);
                    } else {
                        $rate += $room_master->rate + ($no_extra_bed * $room_master->rate_extra_bed);
                    }
                }
                $this_date = date('Y-m-d', strtotime($this_date . '+1 days'));
                
                
            }

            if (empty($booking_status)) {
                $this->db->where('room_master.room_master_id', $room_type);
                $room_master = $this->db->get('room_master')->first_row();

                if (($room_master->no_adults * $no_rooms) < $no_people) {
                    $booking_status = 'Number of People Exceed. Please Select More Rooms';
                }
                if (($room_master->no_child * $no_rooms) < $no_child) {
                    $booking_status = 'Number of Child Exceed. Please Select More Rooms';
                }
                if (($room_master->no_extra_bed * $no_rooms) < $no_extra_bed) {
                    $booking_status = 'Number of Child Exceed. Please Select More Rooms';
                }
            }
        } else {
            $booking_status = 'Please Select Check in Date, Check out Date and Room Type';
        }
        if (empty($booking_status)) {
            $this->output->set_output($rate * $no_rooms);
        } else {
            $this->output->set_output('0');
        }
    }

    public function confirm_booking($booking_id) {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->model('booking_model');

            $status = 1;

            $this->booking_model->change_status($booking_id, $status);

            redirect('admin/booking/edit_booking/' . $booking_id);
        }
    }

    public function cancel_booking($booking_id) {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->model('booking_model');

            $status = 2;

            $this->booking_model->change_status($booking_id, $status);

            redirect('admin/booking/edit_booking/' . $booking_id);
        }
    }

    public function change_room($id) {
        $condition = array('hotel_master_id' => $id);
        $rooms = $this->room_master_model->list_hotel_rooms($condition);
//        echo $rooms;
        echo '<option>Select Room Type</option>';
        foreach ($rooms as $result) {
            echo '<option value="' . $result->room_master_id . '">' . $result->name . '</option>';
        }
    }

}

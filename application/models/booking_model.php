<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_booking() {
        $query = $this->db->get('booking');
        return $query->result();
    }

    function list_booking_pages($num, $offset) {

        $this->db->select('booking.booking_id,booking.date_checkin,booking.date_checkout,users.first_name,users.phone,users.email');
        $this->db->from('booking');
        $this->db->join('users', 'users.booking_id=booking.booking_id');
        $this->db->limit($num, $offset);
        $this->db->order_by('booking.booking_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function search_booking_pages($num, $offset) {
        if (empty($offset)) {
            $offset = 0;
        }

        $search_query = $this->input->get('search_query');
        $room_type = $this->input->get('room_type');
        $checkin_date = $this->input->get('checkin_date');
        $hotel_master = $this->input->get('hotel_master');

        $query = 'SELECT booking.booking_id,booking.date_checkin,booking.date_checkout,booking.hotel_master_id,users.first_name,users.phone,users.email'
                . ' FROM `booking` JOIN `users` ON `users`.`booking_id`=`booking`.`booking_id` ';
        $qnd = 0;

        if (!empty($search_query)) {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=" ((`users`.`first_name` LIKE '%" . $search_query . "%')"
                    . "||(`users`.`phone` LIKE '%" . $search_query . "%')"
                    . "||(`users`.`email` LIKE '%" . $search_query . "%'))";
            $qnd = $qnd + 1;
        }
        if ($room_type != "") {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=' `booking`.`room_master_id`=' . $room_type;
            $qnd = $qnd + 1;
        }
        if ($hotel_master != "") {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=' `booking`.`hotel_master_id`=' . $hotel_master;
            $qnd = $qnd + 1;
        }
        if ($checkin_date != "") {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=" (`booking`.`date_checkin`<='" . $checkin_date . "' AND `booking`.`date_checkout`>='" . $checkin_date . "')";
            $qnd = $qnd + 1;
        }

        $query .= ' ORDER BY `booking`.`booking_id` desc';
        $query.=' LIMIT ' . $offset . ',' . $num;

        $result = $this->db->query($query)->result();

        return $result;
    }

    function search_booking_count() {

        $search_query = $this->input->get('search_query');
        $room_type = $this->input->get('room_type');
        $checkin_date = $this->input->get('checkin_date');
        $hotel_master = $this->input->get('hotel_master');

        $query = 'SELECT booking.booking_id'
                . ' FROM `booking` JOIN `users` ON `users`.`booking_id`=`booking`.`booking_id` ';
        $qnd = 0;

        if (!empty($search_query)) {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=" ((`users`.`first_name` LIKE '%" . $search_query . "%')"
                    . "||(`users`.`phone` LIKE '%" . $search_query . "%')"
                    . "||(`users`.`email` LIKE '%" . $search_query . "%'))";
            $qnd = $qnd + 1;
        }
        if ($room_type != "") {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=' `booking`.`room_master_id`=' . $room_type;
            $qnd = $qnd + 1;
        }
        if ($hotel_master != "") {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=' `booking`.`hotel_master_id`=' . $hotel_master;
            $qnd = $qnd + 1;
        }
        if ($checkin_date != "") {
            if ($qnd == 0) {
                $query.=' WHERE';
            } else {
                $query.=' AND';
            }
            $query.=" (`booking`.`date_checkin`<='" . $checkin_date . "' AND `booking`.`date_checkout`>='" . $checkin_date . "')";
            $qnd = $qnd + 1;
        }

        return $this->db->query($query)->num_rows();
    }

    function get_booking($booking_id) {
        $this->db->select('booking.*,users.*');
        $this->db->from('booking');
        $this->db->join('users', 'users.booking_id=booking.booking_id');
        $this->db->where('booking.booking_id', $booking_id);
        $query = $this->db->get();
        return $query->first_row();
    }
    
    function add_booking($datas=array()){
       $this->db->insert('booking', $datas);
       $booking_id = $this->db->insert_id();
       
       $datas = array('booking_id' => $booking_id,
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('name'),
            'last_name' => '',
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'phone' => $this->input->post('phone'));
        $this->db->insert('users', $datas);
        
        return $booking_id;
    }

    function add_booking1() {

        $datas = array(
            'hotel_master_id' => $this->input->post('hotel_master'),
            'date_checkin' => $this->input->post('checkin_date'),
            'date_checkout' => $this->input->post('checkout_date'),
            'room_master_id' => $this->input->post('room_type'),
            'no_rooms' => $this->input->post('no_rooms'),
            'no_people' => $this->input->post('no_people'),
            'no_child' => $this->input->post('no_child'),
            'requirements' => $this->input->post('requirements'),
            'no_extra_bed' => $this->input->post('no_extra_bed'),
            'total_rate' => $this->input->post('total_rate'));
        $this->db->insert('booking', $datas);
        $booking_id = $this->db->insert_id();

        $datas = array('booking_id' => $booking_id,
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('name'),
            'last_name' => '',
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'));
        $this->db->insert('users', $datas);


        return $booking_id;
    }

    function edit_booking($booking_id) {

        $datas = array('date_checkin' => $this->input->post('checkin_date'),
            'date_checkout' => $this->input->post('checkout_date'),
            'room_master_id' => $this->input->post('room_type'),
            'no_rooms' => $this->input->post('no_rooms'),
            'no_people' => $this->input->post('no_people'),
            'no_child' => $this->input->post('no_child'),
            'requirements' => $this->input->post('requirements'),
            'no_extra_bed' => $this->input->post('no_extra_bed'),
            'total_rate' => $this->input->post('total_rate'));
        $this->db->where(array('booking_id' => $booking_id));
        $this->db->update('booking', $datas);

        $datas = array('email' => $this->input->post('email'),
            'first_name' => $this->input->post('booking_name'),
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'));
        $this->db->where(array('booking_id' => $booking_id));
        $this->db->update('users', $datas);
    }

    function change_status($booking_id, $status) {
        $datas = array('booking_status' => $status);
        $this->db->where(array('booking_id' => $booking_id));
        $this->db->update('booking', $datas);
    }
    
    function update_transaction($booking_id, $transaction) {
        $datas = array('transactionid' => $transaction);
        $this->db->where(array('booking_id' => $booking_id));
        $this->db->update('booking', $datas);
    }

    function change_payment_status($booking_id, $status) {
        $datas = array('payment_status' => $status);
        $this->db->where(array('booking_id' => $booking_id));
        $this->db->update('booking', $datas);
    }

    function delete_booking($booking_id) {

        $this->db->where('booking_id', $booking_id)->delete('booking');
        $this->db->where('booking_id', $booking_id)->delete('users');
    }

}

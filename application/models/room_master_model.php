<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room_master_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_room_master() {
        $query = $this->db->get('room_master');
        return $query->result();
    }
    
    function room_details($id,$hotel_id){
        $this->db->where(array('room_type'=>$id,'hotel_master_id'=>$hotel_id));
        $query = $this->db->get('room_master');
        return $query->result();
    }

    function list_hotel_rooms($condition = array()) {
        $this->db->where($condition);
        $query = $this->db->get('room_master');
        return $query->result();
    }

//    function list_room_master_pages($num, $offset,$hotel_master_id) {
//        $this->db->where(array('hotel_master_id'=> $hotel_master_id));
//        $this->db->limit($num, $offset);
//        $query = $this->db->get('room_master');
//        return $query->result();
//    }

    function list_room_availability_season($room_master_id, $num, $offset) {
        $this->db->where('room_master_id', $room_master_id);
        $this->db->limit($num, $offset);
        $query = $this->db->get('room_availability_season');
        return $query->result();
    }

    function get_room_master($room_master_id) {
        $result = $this->db->where('room_master_id', $room_master_id)->get('room_master')->first_row();
        return $result;
    }

    function get_room_availability_season($room_availability_season_id) {
        $result = $this->db->where('room_availability_season_id', $room_availability_season_id)->get('room_availability_season')->first_row();
        return $result;
    }

    function add_room_master($image_name) {
        $datas = array('room_type' => $this->input->post('room_type'),
            'hotel_master_id' => $this->input->post('hotel_master'),
//            'no_adults' => 3,
//            'no_child' => 2,
//            'no_extra_bed' => 1,
            'description' => $this->input->post('room_master_description'),
            'image' => $image_name);
        $this->db->insert('room_master', $datas);
    }

    function edit_room_master($room_master_id, $image_name) {
        $datas = array('room_type' => $this->input->post('room_type'),
            'hotel_master_id' => $this->input->post('hotel_master'),
//            'no_adults' => $this->input->post('no_adults'),
//            'no_child' => $this->input->post('no_child'),
//            'no_extra_bed' => $this->input->post('no_extra_bed'),
            'description' => $this->input->post('room_master_description'),
            'image' => $image_name);

        $this->db->where(array('room_master_id' => $room_master_id));
        $this->db->update('room_master', $datas);
    }

    function delete_room_master($room_master_id) {
        $this->db->where('room_master_id', $room_master_id)->delete('room_master');
    }

    function add_room_availability_season($room_master_id) {

        $datas = array(
            'room_master_id' => $room_master_id,
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'availability' => $this->input->post('availability'),
            'rate' => $this->input->post('rate'),
            'rate_double' => $this->input->post('rate_double'),
            'rate_extra_bed' => $this->input->post('rate_extra_bed'),
            'priority' => $this->input->post('priority'),
            'hotel_master_id' => $this->input->post('hotel_name')
        );

        $this->db->insert('room_availability_season', $datas);
    }

    function edit_room_availability_season($room_availability_season_id) {
        $datas = array('from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'availability' => $this->input->post('availability'),
            'rate' => $this->input->post('rate'),
            'rate_double' => $this->input->post('rate_double'),
            'rate_extra_bed' => $this->input->post('rate_extra_bed'),
            'priority' => $this->input->post('priority'));

        $this->db->where(array('room_availability_season_id' => $room_availability_season_id));
        $this->db->update('room_availability_season', $datas);
    }

    function delete_room_availability_season($room_availability_season_id) {
        $this->db->where('room_availability_season_id', $room_availability_season_id)->delete('room_availability_season');
    }

}

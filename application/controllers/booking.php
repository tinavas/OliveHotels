<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->load->model(array('room_master_model', 'hotel_master_model', 'booking_model'));
    }

    function booking_landing() {
        
        $this->load->view('web/booking-landing');
    }

    function test() {
        $data['message'] = 'Thank you for booking with us. Our representative will contact you shortly..!';
        $this->load->view('web/cc-avenue',$data);
    }

    function submit_room_type() {

        $this->load->model('booking_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('checkin_date', 'Checkin Date', 'required');
        $this->form_validation->set_rules('checkout_date', 'Checkout Date', 'required');
        $this->form_validation->set_rules('no_rooms', 'Number of Rooms', 'required');
        $this->form_validation->set_rules('no_people', 'Number of Adults', 'required');
        $this->form_validation->set_rules('room_type', 'Room Type', 'required');
        $this->form_validation->set_rules('no_child', 'no_child', '');
        $this->form_validation->set_rules('no_extra_bed', 'no_extra_bed', '');

        if ($this->form_validation->run() == FALSE) {
            $data['room_masters'] = $this->db->get('room_master')->result();
            $data['id'] = $id;
            $this->load->view('web/booking-step-3', $data);
        } else {

            $data['post_data'] = $_POST;

            $this->load->view('web/booking-step-4', $data);
        }
    }

    function submit_personal_details1() {
        $this->load->model('booking_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('checkin_date', 'Checkin Date', 'required');
        $this->form_validation->set_rules('checkout_date', 'Checkout Date', 'required');
        $this->form_validation->set_rules('room_type', 'Room Type', 'required');
        $this->form_validation->set_rules('no_rooms', 'Number of Rooms', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|number');
        $this->form_validation->set_rules('no_child', 'no_child', '');
        $this->form_validation->set_rules('no_extra_bed', 'no_extra_bed', '');
        $this->form_validation->set_rules('requirements', 'requirements', '');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('country', 'country', '');
        $this->form_validation->set_rules('state', 'state', '');
        $this->form_validation->set_rules('city', 'city', '');
        $this->form_validation->set_rules('address', 'address', '');
        $this->form_validation->set_rules('requirement', 'requirement', '');

        if ($this->form_validation->run() == FALSE) {
            $data['room_masters'] = $this->db->get('room_master')->result();
            $data['post_data'] = $_POST;
            $data['id'] = $this->input->post('hotel_master');
            $this->load->view('web/booking-step-4.php', $data);
        } else {

            $checkin_date = date('Y-m-d', strtotime($this->input->post('checkin_date')));
            $checkout_date = date('Y-m-d', strtotime($this->input->post('checkout_date')));
            $room_type = $this->input->post('room_type');
            $no_rooms = $this->input->post('no_rooms');
            $no_people = $this->input->post('no_people');
            $no_child = $this->input->post('no_child');
            $no_extra_bed = $this->input->post('no_extra_bed');
            $hotel_master = $this->input->post('hotel_master');
            $booking_status = '';

            $this->output->set_output(json_encode($booking_status));

            $booking_id = $this->booking_model->add_booking();
            $this->session->set_flashdata('message', 'Sucessfully Added...');

            if (isset($_POST['formSubmitted']) && $_POST['formSubmitted'] == 1) {

                require_once('lib/nusoap.php');

                //Live
                //don't change this url
                $client = new nusoap_client('http://payment.billserve.net/service.asmx?wsdl', true);
                //Test
                //don't change this url
                //$client = new nusoap_client('http://payment-test.billerzone.com/service.asmx?wsdl', true);

                $name = trim($_POST['name']);
                $city = trim($_POST['city']);
                $state = trim($_POST['state']);
                $Address1 = trim($_POST['address']);
                $address2 = trim($_POST['address']);
                $country = trim($_POST['country']);
                $phone = trim($_POST['phone']);
                $email = trim($_POST['email']);
                $orderid = $booking_id; //pass ur orderid 
                $merchentid = "x/Y+Znc5N763y229iyJZl2AuyXH9jwRCKQHTWVZSs9Q=";  // live- highland
                $password = "9dSFdYi5hJeZkdSqzI5HYQ=="; // live- highland


                $amount = 0.1; //pass amount  

                $redirecturl = "http://getmydesigner.com/olivehotels/booking/thankyou/" . $booking_id; // Merchant Thanks Page
                $ZIPCDOE = ''; //$_POST['TxtZipcode'];
                $POSTDATE = " ";

                //Live
                $targeturl = "http://threeds-uspayment.billserve.net/Home/Confirmation/";
                //Test;	
                //$targeturl="http://66.6.131.87:8089/Home/Confirmation/";

                $status = "pending";
                $P_URl = $_SERVER['HTTP_HOST'];
                $P_IP = $_SERVER['REMOTE_ADDR'];


                $post_data = array('Name' => $name, 'city' => $city, 'state' => $state, 'Address1' => $Address1, 'address2' => $address2, 'country' => $country, 'phone' => $phone, 'email' => $email, 'orderid' => $orderid, 'merchentid' => $merchentid, 'amount' => $amount, 'redirecturl' => $redirecturl, 'Zipcode' => $ZIPCDOE, 'POSTDATE' => $POSTDATE, 'targeturl' => $targeturl, 'P_STATUS' => $status, 'P_URl' => $P_URl, 'P_IP' => $P_IP, 'password' => $password);
                $result = $client->call('Address', $post_data);

                if ($client->fault) {
                    echo '<h2>Fault</h2><pre>';
                    print_r($result);
                    echo '</pre>';
                } else {
                    $location = $targeturl . "?InvID=" . $result['AddressResult'];

                    echo '<script>window.location.href = "' . $location . '"</script>';
                }
            }
        }
    }

    function quick_book() {
        $id = $this->input->post('hotel_master');
        $this->session->set_userdata('hotel_id', $id);
        $this->load->model('booking_model');
        $this->load->model('room_master_model');


        $data['post_data'] = $_POST;
        $data['id'] = $id;
        $checkin = $this->input->post('checkin_date');
        $checkout = $this->input->post('checkout_date');
        $data['checkin_date'] = $checkin;
        $data['checkout_date'] = $checkout;
        $checkin_date = date('d/m/Y', strtotime($checkin));
        $checkout_date = date('d/m/Y', strtotime($checkout));

        if ($id == 2) {
            $xml = '<?xml version="1.0" encoding="utf-8"?><RoomDetailsRequest Key="cf8b6bb7-7437-b24a-bc21-1158529afd5b" PropertyID="DT" FromDate="' . $checkin_date . '" ToDate="' . $checkout_date . '" AllInclusive="Yes"/>';
            $url = 'http://182.74.219.174';
            $port = 16002;
        } else if ($id == 1) {
            $xml = '<?xml version="1.0" encoding="utf-8"?><RoomDetailsRequest Key="72ad7cae-35ff-7144-9a3d-2974d1437e12" PropertyID="OE" FromDate="' . $checkin_date . '" ToDate="' . $checkout_date . '" AllInclusive="Yes"/>';
            $url = 'http://115.118.116.103';
            $port = 16002;
        }


//            $url = 'http://61.17.224.151';
//            $port = 16003;
        $this->session->set_userdata('check_in', $checkin);
        $this->session->set_userdata('check_out', $checkout);
        $response = $this->xml_post(array('xml' => $xml), $url, $port);
//            $response = read_file('newXMLDocument.xml');
        $data['response'] = $response;
//            print_r($response);exit(0);
        $this->load->view('web/booking-step-3', $data);
    }

    function submit_booking($id) {
        $this->session->set_userdata('hotel_id', $id);
        $this->load->model('booking_model');
        $this->load->model('room_master_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('checkin_date', 'Checkin Date', 'required');
        $this->form_validation->set_rules('checkout_date', 'Checkout Date', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['room_masters'] = $this->db->get('room_master')->result();
            $data['id'] = $id;
            $this->load->view('web/booking-step-2', $data);
        } else {

            $data['post_data'] = $_POST;
            $data['id'] = $id;
            $checkin = $data['post_data']['checkin_date'];
            $checkout = $data['post_data']['checkout_date'];
            $checkin_date = date('d/m/Y', strtotime($data['post_data']['checkin_date']));
            $checkout_date = date('d/m/Y', strtotime($data['post_data']['checkout_date']));
            if ($id == 2) {
                $xml = '<?xml version="1.0" encoding="utf-8"?><RoomDetailsRequest Key="cf8b6bb7-7437-b24a-bc21-1158529afd5b" PropertyID="DT" FromDate="' . $checkin_date . '" ToDate="' . $checkout_date . '" AllInclusive="Yes"/>';
                $url = 'http://182.74.219.174';
                $port = 16002;
            } else if ($id == 1) {
                $xml = '<?xml version="1.0" encoding="utf-8"?><RoomDetailsRequest Key="72ad7cae-35ff-7144-9a3d-2974d1437e12" PropertyID="OE" FromDate="' . $checkin_date . '" ToDate="' . $checkout_date . '" AllInclusive="Yes"/>';
                $url = 'http://115.118.116.103';
                $port = 16002;
            }

//            $url = 'http://61.17.224.151';
//            $port = 16003;
            $this->session->set_userdata('check_in', $checkin);
            $this->session->set_userdata('check_out', $checkout);
            $response = $this->xml_post(array('xml' => $xml), $url, $port);
//            $response = read_file('newXMLDocument.xml');
            $data['response'] = $response;
//            print_r($response);exit(0);
            $this->load->view('web/booking-step-3', $data);
        }
    }

    function xml_post($xml, $url, $port) {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $ch = curl_init();    // initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);              // Fail on errors

        if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off'))
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    // allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
        curl_setopt($ch, CURLOPT_PORT, $port);          //Set the port number
        curl_setopt($ch, CURLOPT_TIMEOUT, 15); // times out after 15s
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml); // add POST fields
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

        if ($port == 443) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        }

        $ch_result = curl_exec($ch);

        curl_close($ch);

        return $ch_result;
    }

    function submit_user_details() {
        $data['room_id'] = $this->input->post('roomid');
        $data['available_rooms'] = $this->input->post('availablerooms');
        $data['rooms_selected'] = $this->input->post('roomsselected');
        $data['short_room_name'] = $this->input->post('roomname');
        $data['room_name'] = $this->input->post('roomdesc');
        $data['single_ap'] = $this->input->post('rateapsingle');
        $data['single_cp'] = $this->input->post('ratecpsingle');
        $data['single_map'] = $this->input->post('ratemapsingle');
        $data['single_ep'] = $this->input->post('rateepsingle');
        $data['double_ap'] = $this->input->post('rateapdouble');
        $data['double_cp'] = $this->input->post('ratecpdouble');
        $data['double_map'] = $this->input->post('ratemapdouble');
        $data['double_ep'] = $this->input->post('rateepdouble');
        $data['map_extra'] = $this->input->post('ratemapextra');
        $data['ap_extra'] = $this->input->post('rateapextra');
        $data['cp_extra'] = $this->input->post('ratecpextra');
        $data['ep_extra'] = $this->input->post('rateepextra');
        $data['length'] = $this->input->post('length');
        $this->session->set_userdata('rooms_count', $this->input->post('length'));
        $this->load->view('web/booking-details', $data);
    }

    function reservation_details() {
        $rate[] = 0;
        $singleroom[] = 0;
        $doubleroom[] = 0;
        $extra_adultroom[] = 0;
        $total_pax[] = 0;
        $children[] = 0;
        $adult[] = 0;
        $extra_bed[] = 0;
        $extra_bed_count[] = 0;
        for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {
            $room_id = $this->input->post('room_id');
            $users_short_room_name = $this->input->post('short_room_name');
            $room_name = $this->input->post('room_name');
            $single_ap = $this->input->post('single_ap');
            $price_cat = $this->input->post('price_cat');
            $single_cp = $this->input->post('single_cp');
            $single_map = $this->input->post('single_map');
            $single_ep = $this->input->post('single_ep');
            $double_ap = $this->input->post('double_ap');
            $double_cp = $this->input->post('double_cp');
            $double_ep = $this->input->post('double_ep');
            $double_map = $this->input->post('double_map');
            $map_extra = $this->input->post('map_extra');
            $ap_extra = $this->input->post('ap_extra');
            $cp_extra = $this->input->post('cp_extra');
            $ep_extra = $this->input->post('ep_extra');
            $user_selected_rooms = $this->input->post('user_selected_rooms');
            foreach ($user_selected_rooms as $key => $value) {
//                for ($j = 0; $j < count($user_selected_rooms); $j++) {
                for ($k = 0; $k < $value; $k++) {
                    $adults[$k] = $this->input->post('adults_' . $k . '_' . $i);
                    $child[$k] = $this->input->post('childrens_' . $k . '_' . $i);
                    $extra[$k] = $this->input->post('extrabed_' . $k . '_' . $i);
                }
                $adults_count[$i] = $adults;
                $childs_count[$i] = $child;
                $extra_bed_count[$i] = $extra;
//                }
            }
            for ($j = 0; $j < $user_selected_rooms[$i]; $j++) {
                $total_pax[$i] += $adults_count[$i][$j] + $childs_count[$i][$j];
            }
        }
//        print_r($total_pax);
        for ($a = 0; $a < $this->session->userdata('rooms_count'); $a++) {
            for ($b = 0; $b < $user_selected_rooms[$a]; $b++) {
//                if ($extra_bed_count[$a][$b] != 0) {
//                    $single[$a][$b] = 0;
//                    $double[$a][$b] = 0;
//                    $extra_adult[$a][$b] = $extra_bed_count[$a][$b];
//                } else 
                if ($adults_count[$a][$b] == 1) {
//                    $extra_bed_count[] = 0;
                    if ($extra_bed_count[$a][$b] == 0) {
                        $extra_bed_count[$a][$b] = 0;
                    } else {
                        $extra_bed_count[$a][$b] = $extra_bed_count[$a][$b];
                    }

                    if ($price_cat[$a] == 1) {
                        $rate[$a]+= $single_ap[$a] + ($extra_bed_count[$a][$b] * $ap_extra[$a]);
                    }
                    if ($price_cat[$a] == 2) {
                        $rate[$a]+= $single_cp[$a] + ($extra_bed_count[$a][$b] * $cp_extra[$a]);
                    }
                    if ($price_cat[$a] == 3) {
                        $rate[$a]+= $single_ep[$a] + ($extra_bed_count[$a][$b] * $ep_extra[$a]);
                    }
                    if ($price_cat[$a] == 4) {
                        $rate[$a]+= $single_map[$a] + ($extra_bed_count[$a][$b] * $map_extra[$a]);
                    }
                    $single[$a][$b] = 1;
                    $double[$a][$b] = 0;
                    $extra_adult[$a][$b] = $extra_bed_count[$a][$b];
                } else if ($adults_count[$a][$b] == 2) {
                    if ($extra_bed_count[$a][$b] == 0) {
                        $extra_bed_count[$a][$b] = 0;
                    } else {
                        $extra_bed_count[$a][$b] = $extra_bed_count[$a][$b];
                    }
                    if ($price_cat[$a] == 1) {
                        $rate[$a]+= $double_ap[$a] + ($extra_bed_count[$a][$b] * $ap_extra[$a]);
                    }
                    if ($price_cat[$a] == 2) {
                        $rate[$a]+= $double_cp[$a] + ($extra_bed_count[$a][$b] * $cp_extra[$a]);
                    }
                    if ($price_cat[$a] == 3) {
                        $rate[$a]+= $double_ep[$a] + ($extra_bed_count[$a][$b] * $ep_extra[$a]);
                    }
                    if ($price_cat[$a] == 4) {
                        $rate[$a]+= $double_map[$a] + ($extra_bed_count[$a][$b] * $map_extra[$a]);
                    }
                    $single[$a][$b] = 0;
                    $double[$a][$b] = 1;
                    $extra_adult[$a][$b] = $extra_bed_count[$a][$b];
                } else if ($adults_count[$a][$b] > 2) {
                    if ($extra_bed_count[$a][$b] == 0) {
                        $extra_bed_count[$a][$b] = 1;
                    } else {
                        $extra_bed_count[$a][$b] = $extra_bed_count[$a][$b];
                    }
                    if ($price_cat[$a] == 1) {
                        $rate[$a]+= $double_ap[$a] + ($extra_bed_count[$a][$b] * $ap_extra[$a]);
                    }
                    if ($price_cat[$a] == 2) {
                        $rate[$a]+= $double_cp[$a] + ($extra_bed_count[$a][$b] * $cp_extra[$a]);
                    }
                    if ($price_cat[$a] == 3) {
                        $rate[$a]+= $double_ep[$a] + ($extra_bed_count[$a][$b] * $ep_extra[$a]);
                    }
                    if ($price_cat[$a] == 4) {
                        $rate[$a]+= $double_map[$a] + ($extra_bed_count[$a][$b] * $map_extra[$a]);
                    }
                    $single[$a][$b] = 0;
                    $double[$a][$b] = 1;
                    $extra_adult[$a][$b] = $extra_bed_count[$a][$b];
                }
                $children[$a]+=$childs_count[$a][$b];
                $adult[$a]+=$adults_count[$a][$b];
                $extra_bed[$a]+=$extra_bed_count[$a][$b];
                $singleroom[$a]+= $single[$a][$b];
                $doubleroom[$a]+= $double[$a][$b];
                $extra_adultroom[$a]+= $extra_adult[$a][$b];
            }
        }
//        print_r($rate);exit(0);
        $data['single'] = $single;
        $data['double'] = $double;
        $data['extra_adult'] = $extra_adult;
        $data['singleroom'] = $singleroom;
        $data['doubleroom'] = $doubleroom;
        $data['extra_adultroom'] = $extra_adultroom;
        $data['rates'] = $rate;
        $data['children'] = $children;
        $data['adult'] = $adult;
        $data['extra_bed'] = $extra_bed;
        $data['total_pax'] = $total_pax;
        $data['plan'] = $price_cat;
        $data['room_id'] = $room_id;
        $data['room_name'] = $room_name;
        $data['adults_count'] = $adults_count;
        $data['childs_count'] = $childs_count;
        $data['extra_bed_count'] = $extra_bed_count;
        $data['user_selected_rooms'] = $user_selected_rooms;
        $this->load->view('web/booking-stage-4', $data);
    }

    function submit_personal_details() {
        $xml2[] = '';
        $xml3[] = '';
        $xml4[] = '';
        $property_id = "";
        $fullxml[] = '';
        $url = '';
        $key = '';
        $checkin_date = date('d/m/Y', strtotime($this->session->userdata('check_in')));
        $checkout_date = date('d/m/Y', strtotime($this->session->userdata('check_out')));
        $checkedin = date('d-m-Y', strtotime($this->session->userdata('check_in')));
        $checkedout = date('d-m-Y', strtotime($this->session->userdata('check_out')));
        $room_id = $this->input->post('room_id');
        $room_name = $this->input->post('room_name');
        $rates = $this->input->post('rates');
        $child = $this->input->post('child');
        $product_total = $this->input->post('product_total');
        $plan = $this->input->post('plan');
        $single_room = $this->input->post('single_room');
        $double_room = $this->input->post('double_room');
        $extra_adultroom = $this->input->post('extra_adultroom');
        $user_selected_rooms = $this->input->post('user_selected_rooms');
        $adult = $this->input->post('adult');
        $extra_bed = $this->input->post('extra_bed');

        $grand_total = $this->input->post('grand_total');
        $total_pax = $this->input->post('total_pax');
        $cust_name = $this->input->post('name');
        $cust_phone = $this->input->post('phone');
        $cust_email = $this->input->post('email');
        $cust_country = $this->input->post('country');
        $cust_state = $this->input->post('state');
        $cust_city = $this->input->post('city');
        $cust_address = $this->input->post('address');
        $cust_requirements = $this->input->post('requirements');
        $formSubmitted = $this->input->post('formSubmitted');
        $date_diff = (strtotime($checkedout) - strtotime($checkedin)) / (60 * 60 * 24);
        $this_date = $checkedin;
        if ($this->session->userdata('hotel_id') == 2) {
            $property_id = "DT";
            $url = 'http://182.74.219.174';
            $key = 'cf8b6bb7-7437-b24a-bc21-1158529afd5b';
        } else if ($this->session->userdata('hotel_id') == 1) {
            $property_id = "OE";
            $url = 'http://115.118.116.103';
            $key = '72ad7cae-35ff-7144-9a3d-2974d1437e12';
        }
        for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {

            if ($plan[$i] == 1) {
                $plans[$i] = 'AP';
            } else if ($plan[$i] == 2) {
                $plans[$i] = 'CP';
            } else if ($plan[$i] == 3) {
                $plans[$i] = 'EP';
            } else if ($plan[$i] == 4) {
                $plans[$i] = 'MAP';
            }

            $xml1[$i] = '<?xml version="1.0" encoding="utf-8"?>' .
                    '<SoftBookRequest Key="'.$key.'">' .
                    '<GuestDetails Title="Mr." Name="' . $cust_name . '" Address1="' . $cust_address . '" Address2="" Address3="' . $cust_city . '" Country="' . $cust_country . '" Pin="682017" EmailId="' . $cust_email . '" LandPhoneNo="" MobileNo="' . $cust_phone . '" AgentCode="" Instructions="'.$cust_requirements.'" AllInclusiveRates="Yes" />' .
                    '<Property ID="' . $property_id . '" CheckInDate="' . $checkin_date . '" CheckInTime="13:00" CheckOutDate="' . $checkout_date . '" CheckOutTime="12:00" PlanId="' . $plans[$i] . '" TotalPax="' . $total_pax[$i] . '" Female="0" Children="' . $child[$i] . '" Infants="0" Foreigner="0" TotalAmount="' . $product_total[$i] . '">';

//        for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {
            $xml2[$i] = '<RoomType ID="' . $room_id[$i] . '" Single="' . $single_room[$i] . '" Double="' . $double_room[$i] . '" Tripple="0" Adult="' . $extra_adultroom[$i] . '" Child1="0" Child2="0" Infant="0">';
            if ($plan[$i] == 1) {
                $plans[$i] = 'AP';
            } else if ($plan[$i] == 2) {
                $plans[$i] = 'CP';
            } else if ($plan[$i] == 3) {
                $plans[$i] = 'EP';
            } else if ($plan[$i] == 4) {
                $plans[$i] = 'MAP';
            }
            for ($j = 1; $j <= $date_diff; $j++) {
                $mydate = date('d/m/Y', strtotime($this_date));
                $xml3[$i].= '<Rates Date="' . $mydate . '" MealPlan="' . $plans[$i] . '"/>';
                $this_date = date('Y-m-d', strtotime($this_date . '+1 days'));
            }
            $xml4[$i] = '</RoomType>';
            $fullxml[$i].= $xml2[$i] . $xml3[$i] . $xml4[$i];
            $xml3[$i] = '';
            $this_date = $checkedin;


            $xml5[$i] = '<Activities></Activities></Property></SoftBookRequest>';
            $xml[$i] = $xml1[$i] . $fullxml[$i] . $xml5[$i];
        }
//        print_r($xml);exit(0);
//        $this->session->set_flashdata('message', 'Sucessfully Added...');
//        $url = 'http://182.74.219.174';
        $port = 16002;
        $status = 1;
        $softbookid[] = '';
        for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {
            $soft_resp[$i] = $this->xml_softbooking_post(array('xml' => $xml[$i]), $url, $port);
            $soft_status[$i] = simplexml_load_string($soft_resp[$i]);
            $softresponse_msg[$i] = $soft_status[$i]['SoftBookingSucess'];

            if ($softresponse_msg[$i] == 'True') {
                $softbookid[$i].= $soft_status[$i]['SoftBookId'];
                $status = 1;
            } else {
                $status = 0;
            }
        }
//        print_r($softbookid);exit(0);

        if ($status == 1) {
            $booking_id[] = 0;
            for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {
                $booking_status = '';
                if (($this->session->userdata('hotel_id') == 1) && ($room_id[$i] == '01')) {
                    $room_id[$i] = 5;
                } else if (($this->session->userdata('hotel_id') == 1) && ($room_id[$i] == '02')) {
                    $room_id[$i] = 2;
                } else if (($this->session->userdata('hotel_id') == 1) && ($room_id[$i] == '03')) {
                    $room_id[$i] = 6;
                }
                $datas = array(
                    'date_checkin' => date('Y-m-d', strtotime($this->session->userdata('check_in'))),
                    'date_checkout' => date('Y-m-d', strtotime($this->session->userdata('check_out'))),
                    'room_master_id' => $room_id[$i],
                    'no_rooms' => $user_selected_rooms[$i],
                    'no_people' => $adult[$i],
                    'no_child' => $child[$i],
                    'no_extra_bed' => $extra_bed[$i],
                    'requirements' => $cust_requirements,
                    'total_rate' => $product_total[$i],
                    'hotel_master_id' => $this->session->userdata('hotel_id'),
                    'softbookid' => $softbookid[$i]
                );
                $this->output->set_output(json_encode($booking_status));
                $booking_id[$i] = $this->booking_model->add_booking($datas);
            }
            $book_id = implode('_', $booking_id);
            $b = explode('_', $book_id);
            $data['booking_id'] = $book_id;
            $data['grand_total'] = $grand_total;
            $data['order_details'] = $this->booking_model->get_booking($b[0]);
            $this->session->sess_destroy();
            $this->load->view('web/payment-online', $data);
        } else {
            $data['softbooking'] = $status;
            $this->load->view('web/response-page', $data);
        }
    }

    function xml_softbooking_post($xml, $url, $port) {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $ch = curl_init();    // initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);              // Fail on errors

        if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off'))
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    // allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
        curl_setopt($ch, CURLOPT_PORT, $port);          //Set the port number
        curl_setopt($ch, CURLOPT_TIMEOUT, 15); // times out after 15s
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml); // add POST fields
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

        if ($port == 443) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        }

        $ch_result = curl_exec($ch);

        curl_close($ch);

        return $ch_result;
    }

    function thankyou1($id) {

        $this->load->model('booking_model');

        $orderid = $id;
        $booking_id = explode('_', $orderid);
        $respcode = 'AA';
//        $AACode = $_REQUEST['AACode'];
        $TranID = 1234;

        $payment_status = 'Payment not Done';
        $soft_response[] = '';
        if ($respcode == "AA") {
            for ($i = 0; $i < count($booking_id); $i++) {
                $booking = $this->booking_model->get_booking($booking_id[$i]);
                $this->booking_model->change_payment_status($booking_id[$i], 1);

                $xml[$i] = '<?xml version="1.0" encoding="utf-8"?><ConfirmSoftBookRequest Key="test123" PropertyID="DT" SoftBookId="' . $booking->softbookid . '" TransactionId="" Amount=""/>';
                $url = 'http://182.74.219.174';
                $port = 16002;
                $soft_response[$i].= $this->xml_post(array('xml' => $xml[$i]), $url, $port);

                $this->booking_model->change_status($booking_id[$i], 1);
                $this->booking_model->update_transaction($booking_id[$i], $TranID);
                $payment_status = 'Payment Done';


                if ($booking->hotel_master_id == 1) {
                    $hotel = 'Olive Eva';
                } else {
                    $hotel = 'Olive Downtown';
                }
                if ($booking->room_master_id == 1) {
                    $room_type = 'Standard Rooms';
                } else if ($booking->room_master_id == 2) {
                    $room_type = 'Deluxe Rooms';
                } else if ($booking->room_master_id == 3) {
                    $room_type = 'Executive Rooms';
                } else if ($booking->room_master_id == 4) {
                    $room_type = 'Suite Rooms';
                }
                $payment_status = 'Payment Done';


                $subject = ' Booking ';
                $contents = '<table width="400" border="0" cellpadding="3">	  	
                     <tr>
                        <td><span style="color:#289de2;"><b>Booking Details</b></span>&nbsp;<span style="color:red;"></span></td>
                      </tr>
                      <tr>
                        <td>Hotel Name</td>
                        <td>' . $hotel . '</td>
                      </tr>
                      <tr>
                        <td>Room Type</td>
                        <td>' . $room_type . '</td>
                      </tr>
                      <tr>
                        <td>Check in Date</td>
                        <td>' . $booking->date_checkin . '</td>
                      </tr>
                      <tr>
                        <td>Check out Date</td>
                        <td>' . $booking->date_checkout . '</td>
                      </tr>              
                      <tr>
                        <td>Number of Rooms</td>
                        <td>' . $booking->no_rooms . '</td>
                      </tr>
                      <tr>
                        <td>Number of Adults</td>
                        <td>' . $booking->no_people . '</td>
                      </tr>
                      <tr>
                        <td>Number of Children</td>
                        <td>' . $booking->no_child . '</td>
                      </tr>
                      <tr>
                        <td>Number of Extra Bed</td>
                        <td>' . $booking->no_extra_bed . '</td>
                      </tr>
                      <tr>
                        <td>Total Rate</td>
                        <td><strong>' . $booking->total_rate . '</strong></td>
                      </tr>
                      <tr>
                        <td>payment Status</td>
                        <td><strong>' . $payment_status . '</strong></td>
                      </tr> 
                        <tr>
                        <td>Name</td>
                        <td>' . $booking->first_name . '</td>
                      </tr>              
                      <tr>
                        <td>Email</td>
                        <td>' . $booking->email . '</td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td>' . $booking->phone . '</td>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <td>' . $booking->country . '</td>
                      </tr> 
                      <tr>
                        <td>Address</td>
                        <td>' . $booking->address . '</td>
                      </tr>               
                      <tr>
                        <td><strong>Our representative will contact you shortly.</strong></td>               
                      </tr> 

                    </table>';

                $this->load->library('email');
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('info@olivehotels.com', 'Olive Hotels');

                $this->email->to($booking->email);
                $this->email->subject($subject);
                $this->email->message($contents);
                @$this->email->send();
                @$this->email->clear();

                $this->load->library('email');
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('info@olivehotels.com', 'Olive Hotels');

                $this->email->to('itm.dt@olivehotels.com');
                $this->email->subject('Test Booking');
                $this->email->message($contents);
                @$this->email->send();
            }
//            print_r($xml);exit(0);
        }
        $data['respcode'] = $respcode;
//        $data['softresp'] = $soft_response;

        $this->load->view('web/thankyou_payment', $data);
    }

    function thankyou() {

        $this->load->model('booking_model');

        $orderid = $_REQUEST['orderid'];
        $booking_id = explode('_', $orderid);
        $respcode = $_REQUEST['respcode'];
        $AACode = $_REQUEST['AACode'];
        $TranID = $_REQUEST['TranID'];

        $payment_status = 'Payment not Done';

        if ($respcode == "AA") {
            for ($i = 0; $i < count($booking_id); $i++) {
                $booking = $this->booking_model->get_booking($booking_id[$i]);
                $this->booking_model->change_payment_status($booking_id[$i], 1);
                $this->booking_model->update_transaction($booking_id[$i], $TranID);
                $xml[$i] = '<?xml version="1.0" encoding="utf-8"?><ConfirmSoftBookRequest Key="cf8b6bb7-7437-b24a-bc21-1158529afd5b" PropertyID="DT" SoftBookId="' . $booking->softbookid . '" TransactionId="" Amount=""/>';
                $url = 'http://182.74.219.174';
                $port = 16002;
                $soft_response[$i].= $this->xml_post(array('xml' => $xml[$i]), $url, $port);

                $this->booking_model->change_status($booking_id[$i], 1);

                if ($booking->hotel_master_id == 1) {
                    $hotel = 'Olive Eva';
                } else {
                    $hotel = 'Olive Downtown';
                }
                if ($booking->room_master_id == 1) {
                    $room_type = 'Standard Rooms';
                } else if ($booking->room_master_id == 2) {
                    $room_type = 'Deluxe Rooms';
                } else if ($booking->room_master_id == 3) {
                    $room_type = 'Executive Rooms';
                } else if ($booking->room_master_id == 4) {
                    $room_type = 'Suite Rooms';
                }
                $payment_status = 'Payment Done';


                $subject = ' Booking ';
                $contents = '<table width="400" border="0" cellpadding="3">	  	
                     <tr>
                        <td><span style="color:#289de2;"><b>Booking Details</b></span>&nbsp;<span style="color:red;"></span></td>
                      </tr>
                      <tr>
                        <td>Hotel Name</td>
                        <td>' . $hotel . '</td>
                      </tr>
                      <tr>
                        <td>Room Type</td>
                        <td>' . $room_type . '</td>
                      </tr>
                      <tr>
                        <td>Check in Date</td>
                        <td>' . $booking->date_checkin . '</td>
                      </tr>
                      <tr>
                        <td>Check out Date</td>
                        <td>' . $booking->date_checkout . '</td>
                      </tr>              
                      <tr>
                        <td>Number of Rooms</td>
                        <td>' . $booking->no_rooms . '</td>
                      </tr>
                      <tr>
                        <td>Number of Adults</td>
                        <td>' . $booking->no_people . '</td>
                      </tr>
                      <tr>
                        <td>Number of Children</td>
                        <td>' . $booking->no_child . '</td>
                      </tr>
                      <tr>
                        <td>Number of Extra Bed</td>
                        <td>' . $booking->no_extra_bed . '</td>
                      </tr>
                      <tr>
                        <td>Total Rate</td>
                        <td><strong>' . $booking->total_rate . '</strong></td>
                      </tr>              
                      <tr>
                        <td>Transation ID</td>
                        <td><strong>' . $TranID . '</strong></td>
                      </tr>
                      <tr>
                        <td>payment Status</td>
                        <td><strong>' . $payment_status . '</strong></td>
                      </tr> 
                        <tr>
                        <td>Name</td>
                        <td>' . $booking->first_name . '</td>
                      </tr>              
                      <tr>
                        <td>Email</td>
                        <td>' . $booking->email . '</td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td>' . $booking->phone . '</td>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <td>' . $booking->country . '</td>
                      </tr> 
                      <tr>
                        <td>Address</td>
                        <td>' . $booking->address . '</td>
                      </tr>    
                      <tr>
                        <td>Special Requirement</td>
                        <td>' . $booking->requirements . '</td>
                      </tr> 
                      <tr>
                        <td><strong>Our representative will contact you shortly.</strong></td>               
                      </tr> 

                    </table>';

                $this->load->library('email');
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('info@olivehotels.com', 'Olive Hotels');

                $this->email->to($booking->email);
                $this->email->to('gilsontomy@easysoftindia.com');
                $this->email->subject($subject);
                $this->email->message($contents);
                @$this->email->send();
                @$this->email->clear();

                $this->load->library('email');
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('info@olivehotels.com', 'Olive Hotels');

                $this->email->to('itm.dt@olivehotels.com');
                $this->email->subject('Test Booking');
                $this->email->message($contents);
                @$this->email->send();
            }
        }
        $data['respcode'] = $respcode;
        $this->load->view('web/thankyou_payment', $data);
    }

}

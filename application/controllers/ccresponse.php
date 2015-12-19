<?php

error_reporting(1);

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccresponse extends CI_Controller {

    public function index() {

        $this->load->library('crypto');
        $this->load->model('booking_model');
        $soft_response[] = '';
        $payment_status = 'Payment not Done';
        $url = "";
        $property_id = "";
        $key = "";
        $workingKey = '759B88243A417FA158C982234C14B30C';  //Working Key should be provided here.
        $encResponse = $_POST["encResp"];   //This is the response sent by the CCAvenue Server
        $rcvdString = $this->crypto->decrypt($encResponse, $workingKey);  //Crypto Decryption used as per the specified working key.
        $order_status = "";
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        echo "<center>";

        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 3)
                $order_status = $information[1];
        }

        $information = explode('=', $decryptValues[0]);
        $invoice = $information[1];

        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 1) {
                $tracking_id = $information[1];
            }
        }
        $booking_id = explode('_', $invoice);
        if ($order_status === "Success") {
            for ($i = 0; $i < count($booking_id); $i++) {
//            $sql = "UPDATE booking SET `payment_status` = '1' , `transactionid` = '".$tracking_id."' WHERE `shipping_id` = '" . $invoice . "'";
//            mysql_query($sql);
                $booking = $this->booking_model->get_booking($booking_id[$i]);
                $this->booking_model->change_payment_status($booking_id[$i], 1);
                $this->booking_model->update_transaction($booking_id[$i], $tracking_id);
                if ($booking->hotel_master_id == 2) {
                    $url = 'http://182.74.219.174';
                    $property_id = "DT";
                    $key = 'cf8b6bb7-7437-b24a-bc21-1158529afd5b';
                } else if ($booking->hotel_master_id == 1) {
                    $url = 'http://115.118.116.103';
                    $property_id = "OE";
                    $key = '72ad7cae-35ff-7144-9a3d-2974d1437e12';
                }
                $xml[$i] = '<?xml version="1.0" encoding="utf-8"?><ConfirmSoftBookRequest Key="'.$key.'" PropertyID="' . $property_id . '" SoftBookId="' . $booking->softbookid . '" TransactionId="" Amount=""/>';
//                $url = 'http://182.74.219.174';
                $port = 16002;
                $soft_response[$i].= $this->xml_post(array('xml' => $xml[$i]), $url, $port);
                $this->booking_model->change_status($booking_id[$i], 1);
                $payment_status = 'Payment Done';
                if ($booking->hotel_master_id == 1) {
                    $hotel = 'Olive Eva';
                    $email1 = 'reservations@olivehotels.com';
                    $email2 = 'fom.eva@olivehotels.com';
                } else {
                    $hotel = 'Olive Downtown';
                    $email1 = 'reservations.dt@olivehotels.com';
                    $email2 = 'fom.dt@olivehotels.com';
                }
                if ($booking->room_master_id == 1) {
                    $room_type = 'Standard Rooms';
                } else if ($booking->room_master_id == 2) {
                    $room_type = 'Deluxe Rooms';
                } else if ($booking->room_master_id == 3) {
                    $room_type = 'Executive Rooms';
                } else if ($booking->room_master_id == 4) {
                    $room_type = 'Suite Rooms';
                } else if ($booking->room_master_id == 5) {
                    $room_type = 'Luxury Rooms';
                } else if ($booking->room_master_id == 6) {
                    $room_type = 'Deluxe Suite Rooms';
                }
                $payment_status = 'Payment Done';


                $subject = ' Booking ';
                $contents = '<table width="400" border="0" cellpadding="3">	  	
                     <tr>
                        <td><span style="color:#289de2;"><b>Booking Details</b></span>&nbsp;<span style="color:red;"></span></td>
                      </tr>
                      <tr>
                        <td>Payment status</td>
                        <td>' . $order_status . '</td>
                      </tr>
                      <tr>
                        <td>CC Avenue Trasaction Id</td>
                        <td>' . $tracking_id . '</td>
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
                $this->email->subject($subject);
                $this->email->message($contents);
                @$this->email->send();
                @$this->email->clear();
                
                $this->load->library('email');
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('info@olivehotels.com', 'Olive Hotels');

                $this->email->to($email1);
                $this->email->subject('Booking Confirmation');
                $this->email->message($contents);
                @$this->email->send();
                @$this->email->clear();
                
                $this->load->library('email');
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('info@olivehotels.com', 'Olive Hotels');

                $this->email->to($email2);
                $this->email->subject('Booking Confirmation');
                $this->email->message($contents);
                @$this->email->send();
                
                $data['decryptValues'] = $decryptValues;
                $data['dataSize'] = $dataSize;
                $data['message'] = "Thank you for booking with us. Our representative will contact you shortly..!";
                $this->load->view('web/cc-avenue', $data);
            }
        } else if ($order_status === "Aborted") {
            for ($i = 0; $i < count($booking_id); $i++) {
//            $sql = "UPDATE booking SET `payment_status` = '1' , `transactionid` = '".$tracking_id."' WHERE `shipping_id` = '" . $invoice . "'";
//            mysql_query($sql);
                $booking = $this->booking_model->get_booking($booking_id[$i]);
                $this->booking_model->change_payment_status($booking_id[$i], 2);
                $this->booking_model->update_transaction($booking_id[$i], $tracking_id);
                $data['decryptValues'] = $decryptValues;
                $data['dataSize'] = $dataSize;
                $data['message'] = "Some error occcured while processing your request. Sorry for the inconvenience..!!";
                $this->load->view('web/cc-avenue', $data);
            }

//            $sql = "UPDATE shipping_info SET `pay_status` = '2' , `paypal_txid` = '0' WHERE `shipping_id` = '" . $invoice . "'";
//            mysql_query($sql);
        } else if ($order_status === "Failure") {
            $data['message'] = "Some error occcured while processing your request. Sorry for the inconvenience..!!";
            $this->load->view('web/cc-avenue', $data);
//            echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
        } else {
            echo "<br>Security Error. Illegal access detected";
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

}

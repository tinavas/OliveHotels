<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('country', 'Country', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('web/contact');
        }else {
           $hotel = $this->input->post('hotel_name');
            if($hotel=='1'){
                $hotel_name = 'Olive Eva';
            }else{
                $hotel_name = 'Olive Down Town';
            }
            $email = $this->input->post('email');
            $subject = ' Enquiry From ' . $this->input->post('name');
            
            $contents = '<table width="400" border="0" cellpadding="3">
	  	
             <tr>
                <td><span style="color:#289de2;"><b>Enquiry From</b></span>&nbsp;<span style="color:red;">'. $this->input->post('name'). '</span></td>

              </tr>
              <tr>
                <td>Hotel Name</td>
                <td>' . $hotel_name . '</td>
              </tr>
              
              <tr>
                <td>Name</td>
                <td>' . $this->input->post('name') . '</td>
              </tr>
		
              
              <tr>
                <td>Email</td>
                <td>' . $this->input->post('email') . '</td>
              </tr>
			 
			    <tr>
                <td>Phone</td>
                <td>' . $this->input->post('phone') . '</td>
              </tr>
              <tr>
                <td>Country</td>
                <td>' . $this->input->post('country') . '</td>
              </tr> 
              <tr>
                <td>Message</td>
                <td>' . $this->input->post('message') . '</td>
              </tr> 
            </table>';
            $this->load->library('email');
            $config['charset'] = 'iso-8859-1';
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@olivehotels.com', $this->input->post('name'));
            if($hotel=='1'){
                $email_sett = array('info@olivehotels.com');
            }else{
                $email_sett = array('reservations.dt@olivehotels.com');
            }
            $this->email->to($email_sett);
            $this->email->subject($subject);
            $this->email->message($contents);
            @$this->email->send();
            redirect('contact/thankyou');
        }
    }
    
    function send_gm() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('gemail', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('web/contact');
        }else {
           $hotel = $this->input->post('hotel_name');
            if($hotel=='1'){
                $hotel_name = 'Olive Eva';
            }else{
                $hotel_name = 'Olive Down Town';
            }
            $email = $this->input->post('gemail');
            $subject = ' Message for GM -- ';
            
            $contents = '<table width="400" border="0" cellpadding="3">
	  	
             <tr>
                <td><span style="color:#289de2;"><b>Message on</b></span>&nbsp;<span style="color:red;">'. $hotel_name. '</span></td>

              </tr>
              <tr>
                <td>Hotel Name</td>
                <td>' . $hotel_name . '</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>' . $email . '</td>
              </tr>
             <tr>
                <td>Message</td>
                <td>' . $this->input->post('message') . '</td>
              </tr> 
            </table>';
            $this->load->library('email');
            $config['charset'] = 'iso-8859-1';
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@olivehotels.com', 'GM-Message');
            if($hotel=='1'){
                $email_sett = array('gm.eva@olivehotels.com');
            }else{
                $email_sett = array('gm.dt@olivehotels.com');
            }
            $this->email->to($email_sett);
            $this->email->subject($subject);
            $this->email->message($contents);
            @$this->email->send();
            redirect('contact/thankyou');
        }
    }
    function thankyou(){
        $this->load->view('web/thankyou');
    }

}

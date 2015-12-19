<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Careers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('career_model', 'obj_career', TRUE);
    }

    function index($row=0) {

        $condition = array('career_active' => 'Y');
        $limit = '40';
        $config['base_url'] = base_url() . 'career/index/';
        $config['full_tag_open'] = '<p class="pagin">';
        $config['full_tag_close'] = '</p>';
        $config['uri_segment'] = 3;
        $total = $this->obj_career->countrows($condition);
        $config['total_rows'] = $total;
        $data['total_rows'] = $total;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['career'] = $this->obj_career->get_all_entries($row, $limit, $condition, 'career_display_order', 'asc');
        $data['row'] = $row;
        $this->load->view('web/careers', $data);
    }

    public function send($career_id = '') {

        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|xss_clean');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('experience', 'Experience', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $condition = array('career_id' => $career_id);
            $data['career'] = $this->obj_career->get_all($condition);

            $data['career_id'] = $career_id;
            $this->load->view('web/apply_careers', $data);
        } else {

            //image			
            $file_name = '';
            $filename = $_FILES['image']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
         
            if ($ext == 'pdf' || $ext == 'docx' || $ext == 'doc' || $ext == 'txt' || $ext == 'text') {

                if ($_FILES['image']['name'] != '') {

                    $config['upload_path'] = 'uploads/career/';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = '100000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $file_name = $data['upload_data']['file_name'];

                        $config['source_image'] = 'uploads/career/' . $file_name;
                    }
                }
                
            }
            $datas = array(
                'career_id' => $career_id,
                'first_name' => $this->input->post('firstname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'experience' => $this->input->post('experience'),
                'qualification' => $this->input->post('qualification'),
                'file' => $file_name,
                'date_added' => time()
            );

            $this->obj_career->add_data($datas);
            $email = $this->input->post('email');


            $subject = 'Career Enquiry for ' . $this->input->post('post_for') . ' - ' . date('d-m-y : H.i');
            $contents = '<table width="400" border="0" cellpadding="3">
	  	
              <tr>
                <td>Name</td>
                <td>' . $this->input->post('firstname') . '</td>
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
                <td>Experience</td>
                <td>' . $this->input->post('experience') . '</td>
              </tr> 
              <tr>
                <td>qualifications</td>
                <td>' . $this->input->post('qualification') . '</td>
              </tr> 
			   <tr>
                <td>Post applied for</td>
                <td>' . $this->input->post('post_for') . '</td>
              </tr>
            </table>';
            //echo $qualification;
            //echo $qualification;
            $this->load->library('email');
            $config['charset'] = 'iso-8859-1';
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@olivehotels.com', $this->input->post('firstname'));
            $this->email->to('hrm.dt@olivehotels.com');
//$this->email->bcc('sibin@easysoftindia.com'); 
            $this->email->subject($subject);
            $this->email->message($contents);
            if ($file_name) {
                $this->email->attach('uploads/career/' . $file_name);
            }

            @$this->email->send();


            $this->email->clear();

            $config2['charset'] = 'iso-8859-1';
            $config2['mailtype'] = 'html';
            $this->email->initialize($config2);

            $this->email->from('info@olivehotels.com');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Thank you for contacting us');
            $this->email->message('Thank you for contacting us. Our HR department will soon get in touch with you regarding your request');
            @$this->email->send();
            // SEND MAIL
            //mail($to,$subject,$qualification,$headers);
            //@mail('sibin@easysoftindia.com',$subject,$qualification,$headers);
            $this->session->set_userdata('msg', 'Mail Send Sucessfully');
            redirect('careers/thanks');
        }
    }
    function thanks()
    {
         $this->load->view('web/thanku');
    }

}

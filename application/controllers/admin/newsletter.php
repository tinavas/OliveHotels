<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class newsletter extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('newsletter_model','hotel_master_model'));
    }
    
    function index(){
        
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'admin/newsletter/index';
            $config['total_rows'] = $this->db->count_all_results('newsletter');
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';

            $this->pagination->initialize($config);
            $data['newsletter'] = $this->newsletter_model->list_newsletter_pages($config['per_page'], $this->uri->segment(4));

            $this->load->view('admin/newsletter-list', $data);
        }
    }
    
    function add() {
        $this->load->model('newsletter_model');
        $this->load->library('form_validation');
        $data = array();
        $this->form_validation->set_rules('newsletter_email', 'Email', 'required|valid_email|is_unique[newsletter.email]');

        if ($this->form_validation->run() == FALSE) {

            echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> The Email already  exist</div>';
        } else {
            $this->newsletter_model->add_newsletter();


//            $subject = 'Newsletter Email From  Landmarkbuilders  - ' . date('d-m-y : H.i');
//            $message = '<table width="500" border="0" cellpadding="3">
//              <tr>
//                <td>Newsletter Email Id : </td>
//                <td>' . $newsletter_email . '</td>
//              </tr>
//			 </table>';
//            $this->load->library('email');
//            $config['charset'] = 'iso-8859-1';
//            $config['mailtype'] = 'html';
//            $this->email->initialize($config);
//            $this->email->from('info@abadbuilders.com');
//            $condition = array('admin_settings_id' => 1);
//            $admission_email = $this->obj_admin_settings->get_count_data($condition, 'admin_settings_email1');
//            $this->email->to($admission_email);
//            $this->email->subject($subject);
//            $this->email->message($message);
//            @$this->email->send();

            echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
Newsletter Submitted Successfully 
</div>';




//@mail('sibin@easysoftindia.com',$subject,$message,$headers);
        }
    }
    function delete($id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        } else {

            $this->load->model('newsletter_model');
            $this->newsletter_model->delete($id);
            $this->session->set_flashdata('message', 'Sucessfully Deleted...');

            redirect('admin/newsletter/index');
        }
    }

}

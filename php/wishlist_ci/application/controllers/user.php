<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login() {

        //validate Form
        $this->form_validation->set_rules('login_username', 'Login User Name', 'required|min_length[5]');
        $this->form_validation->set_rules('login_password', 'Login Password', 'required');

        if($this->form_validation->run()){
            if($this->user_model->can_login()){
                $this->session->set_userdata('logstart', date('H:i'));
                redirect('/wishlist/'); //proceed to dashboard
            } else {
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect('/main/'); //Go Back To Login Page -- 
            }
        } else {
            $this->session->set_flashdata('notice', validation_errors());
            redirect('/main/'); //Go Back To Login Page
            
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/main/');
    }

    public function register(){
        $this->form_validation->set_rules('register_name', 'Your Name', 'required');
        $this->form_validation->set_rules('username', 'Your User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
        
        if($this->form_validation->run()){
            if($this->user_model->user_register()) {
                redirect('/main/');
            }
        } else {
            $this->session->set_flashdata('notice', validation_errors());
            redirect('/main/');
        }

        redirect('/main/');
    }

    
}
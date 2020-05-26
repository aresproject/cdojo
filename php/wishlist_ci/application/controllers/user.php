<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {

        //validate Form
        $this->form_validation->set_rules('username', 'Your User Name', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Your Password', 'required');

        if($this->form_validation->run()){
            $this->load->model('user_model');
            if($this->user_model->can_login()){
                $this->session->set_userdata('logstart', date('H:i'));
                redirect('/wishlist/'); //proceed to dashboard
            } else {
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect('/main/'); //Go Back To Login Page
            }
        } else {
            redirect('/main/'); //Go Back To Login Page
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/main/');
    }

    public function register(){
        $this->form_validation->set_rules('username', 'Your User Name', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Your Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        $this->load->model('user_model');
        $this->load->view('home');
    }
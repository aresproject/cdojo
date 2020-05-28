<?php
class Main extends CI_Controller {

    public $view_data = [];
	public $user_id = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('DBtest');
        $this->load->helper('url_helper');
    }

    public function index() {
        date_default_timezone_set('Asia/Hong_Kong');
        $this->load->view('header/heading');
        $this->load->view('home');
    }

    public function sample(){
        $view_data['users'] = $this->DBtest->get_users();
        $view_data['items'] = $this->DBtest->get_items();
        $view_data['wishlist'] = $this->DBtest->get_wishlists();
        $this->load->view('test', $view_data);
    }

}
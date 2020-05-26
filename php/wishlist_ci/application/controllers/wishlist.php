<?php

class Wishlist extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $this->load->model('wishlist_model');
        $view_data['logged_user_wishlist'] = $this->wishlist_model->get_wishlist($_SESSION['logged_userid']);
        $view_data['other_user_wishlist'] = $this->wishlist_model->get_wishlist();
        $this->load->view('/header/menu');
        $this->load->view('wishlist', $view_data);
        $this->load->view('/footer/footer');
        //$this->load->view('wishlist');

    }

    public function item_view($item_id, $item_name) {
        $this->load->model('wishlist_model');
        $view_data['title'] = "Item View Page";
        $view_data['users'] = $this->wishlist_model->get_item_users($item_id);
        $view_data['item_name'] = $item_name;
        $this->load->view('item_view', $view_data);
    }

}

?>
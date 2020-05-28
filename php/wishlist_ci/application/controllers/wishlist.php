<?php

class Wishlist extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('wishlist_model');
    }

    public function index() {
        //$this->load->model('wishlist_model');
        $view_data['logged_user_wishlist'] = $this->wishlist_model->get_wishlist($_SESSION['logged_userid']);
        $view_data['other_user_wishlist'] = $this->wishlist_model->get_wishlist();
        $this->load->view('/header/heading')->view('/header/menu');
        $this->load->view('wishlist', $view_data);
        $this->load->view('/footer/footer');
    }

    public function item_view($item_id, $item_name) {
        //$this->load->model('wishlist_model');
        $view_data['title'] = "Item View Page";
        $view_data['users'] = $this->wishlist_model->get_item_users($item_id);
        $view_data['item_name'] = $item_name;
        $this->load->view('/header/menu');
        $this->load->view('item_view', $view_data);
    }

    public function view_create(){
        /* $this->load->view('/header/heading');
        $this->load->view('item_create');
        $this->load->view('/footer/footer'); */
        $this->load->view('/header/heading')->view('item_create')->view('/footer/footer');
    }

    public function create(){
        //$this->load->model('wishlist_model');
        if($this->wishlist_model->item_create($this->input->post('item_name'))) {
            redirect('wishlist');
        }
        else {
            redirect('/wishlist/view_create');
        }
        
    }

    public function add($item_id, $creator_id){
        $this->wishlist_model->wishlist_add($item_id, $creator_id);
        redirect('/wishlist/');
    }

    public function remove($recid) {
        $this->wishlist_model->wishlist_remove($recid);
        redirect('/wishlist/');
    }

    public function delete($itemid) {
        $this->wishlist_model->wishlist_delete($itemid);
        redirect('/wishlist/');
    }

}

?>
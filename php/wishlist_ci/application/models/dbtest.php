<?php

class DBtest extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_items() {
        $query = $this->db->get('items');
        return $query->result_array();
    }

    public function get_wishlists() {
        $query = $this->db->get('user_wishlists');
        return $query->result_array();
    }

    



}

?>
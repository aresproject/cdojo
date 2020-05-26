<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function can_login(){
        //unset password if OK else return error
        //assign to session User name, username and ID
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $query = $this->db->get_where('users', array('username' => $data['username'], "password" =>  $data['password']));
        $row = $query->row();
        if($query->num_rows() > 0){
            $this->session->set_userdata('logged_name', $row->name);
            $this->session->set_userdata('logged_userid', $row->id);
            return true;
        } else {
            return false;
        }

    }

   

}

?>
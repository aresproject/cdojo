<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function can_login(){
        //unset password if OK else return error
        //assign to session User name, username and ID
        $data['username'] = $this->input->post('login_username');
        $data['password'] = $this->input->post('login_password');
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

    public function user_register() {
        /* $this->db->select('*')->where('username', $this->input->post['username']);
        $query = $this->db->get('users');
        $x = $this->db->last_query();
        if($query->num_rows() > 0) { */
        $query = $this->db->get_where('users', array('username' => $this->input->post('username')));
        $row = $query->row();
        $x = $this->db->last_query();
        if($query->num_rows() > 0){
            $this->session->set_flashdata('notice', 'Username already exists... pls use different username');
            return false;
        } else {
            $users= array(
                'name' => $this->input->post['name'],
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'hired_at' => $this->input->post('hired_at'),
                'created_at' => date("Y-m-d H:i:s")
            );
            if($this->db->insert('users', $users)) {
                $this->session->set_flashdata('notice', 'User registered... please use login form below to proceed');
                return true;
            } else {
                $this->session->set_flashdata('notice', 'Please try again later');
                return false;
            }
        }
        
    }

   

}

?>
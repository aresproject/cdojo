<?php
class Wishlist_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }

    public function get_wishlist($userid = null){
        /* $query = $this->db->get_where('user_wishlists', array('added_by_user_id' => $_SESSION['logged_userid']));
        return $query->result_array(); */

        /* $this->db->select('items.id AS itemid, 
                           item_name, 
                           user_wishlists.added_by_user_id 
                           AS added_by, 
                           user_wishlists.user_id AS creator, 
                           name,
                           user_wishlists.created_at AS created')
                 ->from('user_wishlists')
                 ->join('items', 'items.id = user_wishlists.id', 'left')
                 ->join('users', 'users.id = user_wishlists.id', 'left')
                ->where('added_by_user_id', $_SESSION['logged_userid']); */

        /* $this->db->select('items.*, users.*, user_wishlists.*')
                 ->from('user_wishlists')
                 ->join('items', 'items.id = user_wishlists.id', 'left')
                 ->join('users', 'users.id = user_wishlists.id', 'left')
                 ->where('added_by_user_id', $_SESSION['logged_userid']);  */

        // $query = $this->db->get();
        
        $sql = "SELECT listed_items.*, users.name as adder_name
                                FROM (SELECT user_wishlists.*, items.item_name
                                FROM user_wishlists
                                LEFT JOIN items ON items.id = user_wishlists.item_id
                                LEFT JOIN users ON users.id = items.user_id) as listed_items 
                                LEFT JOIN users ON users.id = listed_items.added_by_user_id";

        if($userid != null){
            $sql .= " WHERE listed_items.added_by_user_id LIKE " . $userid;
        } else {
            $sql .= " WHERE listed_items.added_by_user_id != " . $_SESSION['logged_userid'];
        }
        $query = $this->db->query($sql);
       
        //$x = $this->db->last_query();

        return $query->result_array();
    }

    public function get_item_users($item_id) {
        $sql = "SELECT u.name  FROM user_wishlists as uw 
                LEFT JOIN items as i ON i.id = uw.item_id
                LEFT JOIN users as u ON u.id = uw.added_by_user_id
                WHERE i.id = {$item_id}";
        
        $query = $this->db->query($sql);
        //$x = $this->db->last_query();
        //$query = $this->db->get();
        return $query->result_array();
        
    }


}

?>
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

    public function item_create($post_data){
        $this->db->select('*')->where('item_name', $post_data);
        $query = $this->db->get('items');
        if($query->num_rows() > 0) {
            $this->session->set_flashdata('notice', 'Item already created... Please check other users wishlist');
            return false;
        } else {
            $items = array(
                'user_id' => $_SESSION['logged_userid'],
                'item_name' => $post_data,
                'created_at' => date("Y-m-d H:i:s")
            );
            if($this->db->insert('items', $items)) {
                $insert_id = $this->db->insert_id();
                $wishlist_items = array(
                    'added_by_user_id' => $_SESSION['logged_userid'],
                    'user_id' => $_SESSION['logged_userid'],
                    'item_id' => $insert_id,
                    'created_at' => date("Y-m-d H:i:s")
                );
                if($this->db->insert('user_wishlists', $wishlist_items)){
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }
        }


    }

    public function wishlist_add($item_id, $creator_id){
        $this->db->select('*')->where('item_id', $item_id)
                              ->where('added_by_user_id', $_SESSION['logged_userid']);
        $query = $this->db->get('user_wishlists');
        $x = $this->db->last_query();
        if($query->num_rows() > 0) {
            $this->session->set_flashdata('notice', 'Item is already in your wishlist... Please add items from other users or create a new one');
            return false;
        } else {
            $wishlists = array(
                'added_by_user_id' => $_SESSION['logged_userid'],
                'user_id' => $creator_id,
                'item_id' => $item_id,
                'created_at' => date("Y-m-d H:i:s")
            );
            if($this->db->insert('user_wishlists', $wishlists)) {
                $x = $this->db->last_query();
                return true;
            } else {
                return false;
            }
        }
    }

    public function wishlist_remove($recid) {
        $this->db->delete('user_wishlists', array('id' => $recid));
    }

    public function wishlist_delete($itemid) {

        $this->db->delete('user_wishlists', array('item_id' => $recid));
        $this->db->delete('items', array('id' => $recid));
        $this->session->set_flashdata('notice', "Item Deleted from system");
        
    }




}

?>
<?php

class user_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }
    public function get_user($username)
    {
        $query = $this->db->get_where('users', array('username' => $username ));
        return $query->row_array();
    }
    public function get_user_fb($fb_id){
        $query = $this->db->get_where('users', array('fb_id' => $fb_id ));
        return $query->row_array();
    }
    public function insert_fbuser($fbid, $email)
    {
        $sql = 'CALL insertUser(?,?)';
        $this->db->query($sql, array($fbid, $email));
    }
}
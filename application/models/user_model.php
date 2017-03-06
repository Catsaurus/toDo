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
}
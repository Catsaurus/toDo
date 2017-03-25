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
        $sql = 'CALL insertFbUser(?,?)';
        $this->db->query($sql, array($fbid, $email));
    }
    public function insert_user($username, $email, $pswd_hash){
        $sql = 'CALL insertUser(?,?,?)';
        $this->db->query($sql, array($username, $email, $pswd_hash));
    }
    public function change_password($id, $pswd_hash){
        $sql = 'CALL changePassword(?,?)';
        $this->db->query($sql, array($id, $pswd_hash));
    }
    public function change_email($id, $email){
        $sql = 'CALL changeEmail(?,?)';
        $this->db->query($sql, array($id, $email));
    }
    //TODO get user count from view
}
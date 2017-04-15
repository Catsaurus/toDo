<?php

class user_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }
    public function get_user_from_id($id){
        $query = $this->db->get_where('users', array('id' => $id ));
        $user = $query->row_array();
        return $user;
    }
    public function get_user($username)
    {
        $query = $this->db->get_where('users', array('username' => $username ));
        $user = $query->row_array();
        return $user;
    }
    public function get_user_fb($fb_id){
        $query = $this->db->get_where('users', array('fb_id' => $fb_id ));
        $user = $query->row_array();
        return $user;
    }
    public function get_user_id($id_code){
        $query = $this->db->get_where('users', array('id_code' => $id_code));
        $user = $query->row_array();
        return $user;
    }
    public function insert_fbuser($fbid, $email)
    {
        $sql = 'CALL insertFbUser(?,?)';
        $this->db->query($sql, array($fbid, $email));
    }
    public function insert_IDuser($email, $IdCode)
    {
        $sql = 'CALL insertIdUser(?,?)';
        $this->db->query($sql, array($email, $IdCode));
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
    public function delete_user($id){
        $sql = 'CALL deleteUser(?)';
        $this->db->query($sql, array($id));
    }
    //TODO get user count from view

    public function getPoints($id){
        $sql = 'CALL getUserPoints(?)';
        $query = $this->db->query($sql, array($id));
        $points = $query->row_array();
        return $points;
    }
    public function setPoints($id, $amount){
        $sql = 'CALL setUserPoints(?,?)';
        $this->db->query($sql, array($id, $amount));
    }

}
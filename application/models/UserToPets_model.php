<?php

/**
 * Created by PhpStorm.
 * User: Andra
 * Date: 8.04.2017
 * Time: 22:05
 */
class UserToPets_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insert_user_pets($user, $pet){
        $sql = 'CALL insertPet(?,?)';
        $this->db->query($sql, array($user, $pet));

    }
}
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


    public function get_user_pets($userId) {
        $sql = 'CALL getUserPets("'.$userId.'")';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            $data = array(
                'pet_id' => $row->pet_id
            );
            array_push($result, $data);
        }
        //$query->next_result();
        return $result;
    }

    public function show_user_pets($petId){
        $sql = 'CALL showUserPets("'.$petId.'")';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            $data = array(
                'name' =>$row->name,
                'score' =>$row->score,
                'description'=>$row->description,
                'imgname' =>$row->imgname
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;
    }
}
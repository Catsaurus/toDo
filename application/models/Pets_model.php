<?php

class Pets_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_pets($start, $alreadyPresented)
    {
        $sql = 'CALL showPets(?, ?);';
        $result = array();
        $query = $this->db->query($sql, array($start, $alreadyPresented));

        foreach ($query->result() as $row) {
            $data = array(
                'name' =>$row->name,
                'description'=>$row->description,
                'imgname' =>$row->imgname
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;
    }

}
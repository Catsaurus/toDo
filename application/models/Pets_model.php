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

    //näitab kasutaja looma(loomi) Pet lehel.
    public function show_users_pets($userID){
        $sql = 'CALL showUsersPets("'.$userID.'");';
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


    //delete after, see hetkel kuvab ChoosePet lehele kõik loomad
    public function get_pet() {
        $query = $this->db->get('pets');
        $this->db->select('id','name', 'description', 'imgname');
        $result = array();
        foreach ($query->result() as $row){
            $data = array(
                'id' =>$row->id,
                'name' =>$row->name,
                'description'=>$row->description,
                'imgname' =>$row->imgname
            );
            array_push($result, $data);
        }
        //$query->next_result();
        return $result;
    }

}
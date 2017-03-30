<?php
//paneb veebilehel kuvama pildi, kirjelduse ja nime or sth
class Pets_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   public function get_pet() {
       $query = $this->db->get('pets');
       $this->db->select('name', 'description', 'imgname');


       $result = array();

        foreach ($query->result() as $row){
            $data = array(
                'name' =>$row->name,
                'description'=>$row->description,
                'imgname' =>$row->imgname
            );
            array_push($result, $data);
        }
        //$query->next_result();        Pole vaja alati kasutada, oluline tasks lehel, kuna see jooksutab mitut queryt korraga samal tabelil
                                        // siis see meetod lõpetab eelmise ära, et saaks järgmist välja kutsuda.
       return $result;
   }
}
<?php

class Pets extends CI_Controller {

    public function index()
    {
        $_SESSION['afterLogIn'] = 'pets';
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'pets';
            $data['title'] = ucfirst($page);
            $data['pets']=$this->show_pets();
            view_loader($page,$data);
        }
        else{
            view_loader('login');
        }
    }
    public function show_pets() {
        $this->db->reconnect();
        $this->load->model('Pets_model');

        $pets = $this->pets_model->get_pet();
        $data = array();

        foreach ($pets as $pet) {
            $one = array(
                'name' => $pet['name'],
                'description' => $pet['description'],
                'imgname' => $pet['imgname']
            );
            array_push($data, $one);
        }
        return $data;
    }
}
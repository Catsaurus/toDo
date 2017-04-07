<?php

class Pets extends CI_Controller {

    public function index()
    {
        $_SESSION['afterLogIn'] = 'pets';
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'pets';
            $data['title'] = ucfirst($page);
            //$data['pets']=$this->show_pets();
            view_loader($page,$data);
        }
        else{
            view_loader('login');
        }
    }
    public function show_pets($start=0) {
        $result = array();
        $this->db->reconnect();
        $pets = $this->pets_model->get_pets($start, 3);
        foreach ($pets as $pet) {
            $one = array(
                'name' => $pet['name'],
                'description' => $pet['description'],
                'imgname' => $pet['imgname']
            );
            array_push($result, $one);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
}
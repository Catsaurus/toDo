<?php

class Pets extends CI_Controller {

    public function index()
    {
        $_SESSION['afterLogIn'] = 'pets';
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            if ($this->getMainPet() != NULL) {
                $page = 'pets';
                $data['title'] = ucfirst($page);
                //$data['pets']=$this->show_pets();
                $data['user_pets']=$this->showUsersPets();
                view_loader($page,$data);
            }
            else {
                redirect(site_url()."/ChoosePet/index");
            }
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


    public function showUsersPets()
    {
        $this->db->reconnect();
        $user_id = $_SESSION['id'];

        $pets = $this->pets_model->show_users_pets($user_id);
        $data = array();
        foreach ($pets as $pet) {
            $one = array(
                'name' => $pet['name'],
                'score' => $pet['score'],
                'description' => $pet['description'],
                'imgname' => $pet['imgname']
            );
            array_push($data, $one);
        }
        return $data;
    }
    private function getMainPet()
    {
        $this->db->reconnect();
        $userId = $_SESSION['id'];
        $pet = $this->user_model->getMainPetId($userId);
        return $pet;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Andra
 * Date: 8.04.2017
 * Time: 22:21
 */
class ChoosePet extends CI_Controller
{
    public function index()
    {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            $page = 'choosePet';
            $data['title'] = ucfirst($page);
            $data['pets'] = $this->show_pets();
            //$data['user_pets'] = $this->getUserPets();
            view_loader($page, $data);
        }else{
            view_loader('login');
        }
    }

    public function insertPet()
    {
        $userId = $_SESSION['id'];
        $pet_id = $_POST['pet'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->usertopets_model->insert_user_pets($userId, $pet_id);
            redirect(site_url() . "/Tasks/index");
        }
    }

    /*public function getUserPets(){
        $this->db->reconnect();
        $user_id = $_SESSION['id'];
        $users = $this->usertopets_model->get_user_pets($user_id);
        $data = array();
        foreach ($users as $user) {
            $one = array(
                'pet_id'  => $user['pet_id'],
            );
            array_push($data, $one);
        }
        return $data;
    }*/



    //ajutine
    public function show_pets() {
        $this->db->reconnect();
        $this->load->model('Pets_model');
        $pets = $this->pets_model->get_pet();
        $data = array();
        foreach ($pets as $pet) {
            $one = array(
                'id' =>$pet['id'],
                'name' => $pet['name'],
                'description' => $pet['description'],
                'imgname' => $pet['imgname']
            );
            array_push($data, $one);
        }
        return $data;
    }
}
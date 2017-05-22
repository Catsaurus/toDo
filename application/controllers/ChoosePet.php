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
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ) {
            $points = $this->getUserPoints();
            //$mainpet = $this->getMainPet();

            if ($this->showUsersPets() != NULL && $points <= 50) {
                redirect("Tasks/index");
            } else {
                $page = 'choosePet';
                $data['title'] = ucfirst($page);
                $data['pets'] = $this->show_pets();
                //$data['user_pets'] = $this->getUserPets();
                view_loader($page, $data);
            }
        }

            else{
                view_loader('login');
        }
    }

    public function points50()
    {

        $userPoints = $this->getUserPoints();
        if ($userPoints >= 50) {
            $userPoints = $userPoints - 50;
            //$this->db->reconnect();
            $this->db->close();
            $this->db->initialize();
            $this->setUserPoints($userPoints);
        }
    }
    public function insertPet()
    {

        $userId = $_SESSION['id'];
        $pet_id = $_POST['pet'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->UserToPets_model->insert_user_pets($userId, $pet_id);
            $this->setMainPet($pet_id);
            $this->points50();
            redirect(site_url() . "/Tasks/index");
        }
    }
    public function setMainPet($pet_id){
        $userId = $_SESSION['id'];
        //$pet_id = $_POST['pet'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->user_model->setMainPet($pet_id, $userId);
        }
    }

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
    public function getUserPoints(){
        $this->db->reconnect();
        $id = $_SESSION['id'];
        $answer = $this->user_model->getPoints($id);
        return $answer['points'];
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
    public function setUserPoints($amount){
        $this->db->reconnect();
        $id = $_SESSION['id'];
        $answer = $this->user_model->setPoints($id, $amount);
        return $answer;
    }

}
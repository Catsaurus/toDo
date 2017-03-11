<?php

class Tasks extends CI_Controller {

    public function index()
    {
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            view_loader($page);
        }
        else{
            view_loader('login');
        }
    }
    public function insert()
    {
        session_start();
        $userId = $_SESSION['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $description = $_POST['description'];
            $date = $_POST['date'];
            $task = $this->task_model->inser_task($description, $date, $userId);
            header("location:index");
        }
    }

    public function show_tasks()
    {
        session_start();
        $user = $_SESSION['username'];
        $tasks = $this->task_model->get_user_tasks_of_today($user);
        foreach ($tasks as $task) {
            echo $task['content']."<br>";
        }
    }

}
<?php

class Tasks extends CI_Controller {

    public function index()
    {
        $page = 'tasks';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
    public function insert()
    {
        session_start();
        $user = $_SESSION['username'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $description = $_POST['description'];
            $date = $_POST['date'];
            $task = $this->task_model->inser_task($description, $date, $user);
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
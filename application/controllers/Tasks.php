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

    public function show_tasks_today()
    {
        session_start();
        $user = $_SESSION['id'];
        $tasks = $this->task_model->get_user_tasks_of_today($user);
        foreach ($tasks as $task) {

            echo "<p>";
            echo "<input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            echo "<label for='".$task['id']."'>".$task['content']."</label>";
            echo "</p>";
        }
    }

    public function show_tasks_week()
    {
        session_start();
        $userId = $_SESSION['id'];
        echo"<script>console.log('DebugObjects:".$userId."');</script>";
        $tasks = $this->task_model->get_user_tasks_week($userId);
        foreach ($tasks as $task) {
            //lisab igale andmebaasist võetud taskile ette checkboxi andmebaasist võetud id järgi
            echo "<p>";
            echo "<input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            echo "<label for='".$task['id']."'>".$task['content']."</label>";
            echo "</p>";


        }
    }
    public function show_tasks_future()
    {
        session_start();
        $userId = $_SESSION['id'];
        $tasks = $this->task_model->get_user_tasks_future($userId);
        foreach ($tasks as $task) {
            //lisab igale andmebaasist võetud taskile ette checkboxi andmebaasist võetud id järgi
            echo "<p>";
            echo "<input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            echo "<label for='".$task['id']."'>".$task['content']."</label>";
            echo "</p>";
        }
    }
}
<?php

class Tasks extends CI_Controller {

    public function index()
    {

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            $data['taskCount'] = $this->getTaskCount();
            view_loader($page, $data);
        }
        else{
            view_loader('login');
        }
    }
    public function insert()
    {

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
    public function markTaskDone($id)
    {
        echo"<script>console.log('DebugMarkAsDoneId:".$id."');</script>";
        $answer = $this->task_model->markDone($id);
        return $answer;
    }
    public function getTaskCount(){
        $userId = $_SESSION['id'];
        $count = $this->task_model->getCount($userId);
        return $count;

    }
}
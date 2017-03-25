<?php

class Tasks extends CI_Controller {

    public function index()
    {

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            $tasks['todaysTasks'] = $this->show_tasks_today();
            $tasks['weekTasks'] = $this->show_tasks_week();
            $tasks['futureTasks'] = $this->show_tasks_future();
            view_loader($page, $tasks);
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
        $result = "";
        $tasks = $this->task_model->get_user_tasks_of_today($user);
        foreach ($tasks as $task) {
            $result = $result."<p>";
            $result = $result."<input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            $result = $result."<label for='".$task['id']."'>".$task['content']."</label>";
            $result = $result."</p>";
        }
        return $result;
    }

    public function show_tasks_week()
    {

        $userId = $_SESSION['id'];
        $result = "";
        $tasks = $this->task_model->get_user_tasks_week($userId);
        foreach ($tasks as $task) {
            //lisab igale andmebaasist võetud taskile ette checkboxi andmebaasist võetud id järgi
            $result = $result."<p>";
            $result = $result."<input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            $result = $result."<label for='".$task['id']."'>".$task['content']."</label>";
            $result = $result."</p>";
        }
        return $result;
    }
    public function show_tasks_future()
    {
        $this->db->reconnect();
        $userId = $_SESSION['id'];
        $result = "";
        $tasks = $this->task_model->get_user_tasks_future($userId);
        foreach ($tasks as $task) {
            //lisab igale andmebaasist võetud taskile ette checkboxi andmebaasist võetud id järgi
            $result = $result."<p>";
            $result = $result."<input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            $result = $result."<label for='".$task['id']."'>".$task['content']."</label>";
            $result = $result."</p>";
        }
        return $result;
    }
    public function markTaskDone($id)
    {
        $answer = $this->task_model->markDone($id);
        return $answer;
    }
}
<?php

class Tasks extends CI_Controller {

    public function index()
    {

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            $data['taskCount'] = $this->getTaskCount();
            $data['todaysTasks'] = $this->show_tasks_today();
            $data['weekTasks'] = $this->show_tasks_week();
            $data['futureTasks'] = $this->show_tasks_future();
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
        $this->db->reconnect();
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
        $this->db->reconnect();
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

    public function getTaskCount(){
        $userId = $_SESSION['id'];
        $count = $this->task_model->getCount($userId);
        return $count;

    }
    public function allTasksCount()
    {
        $recentResults = $this->task_model->getAllTasksCount();
        echo json_encode($recentResults);
    }
}
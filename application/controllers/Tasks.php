<?php

class Tasks extends CI_Controller {

    public function index()
    {

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            view_loader($page, $this->getData($page));
        }
        else{
            redirect(site_url('login'));
        }
    }

    public function getData($page){
        $data['title'] = ucfirst($page);
        $data['taskCount'] = $this->getTaskCount();
        $data['todayTasks'] = $this->show_tasks_today();
        $data['weekTasks'] = $this->show_tasks_week();
        $data['futureTasks'] = $this->show_tasks_future();
        return $data;
    }
    public function insert()
    {

        $this->form_validation->set_rules('description', lang('description'), 'required');
        $userId = $_SESSION['id'];
        if ($this->form_validation->run() === TRUE) {
            $description = $_POST['description'];
            $date = $_POST['date'];
            $task = $this->task_model->inser_task($description, $date, $userId);
            header("location:index");
        }
        else{
            view_loader('tasks', $this->getData('tasks'));
        }
    }

    public function show_tasks_today()
    {
        $this->db->reconnect();
        $user = $_SESSION['id'];
        $tasks = $this->task_model->get_user_tasks_of_today($user);
        $data = array();
        foreach ($tasks as $task) {
            $one = array(
                'content'  => $task['content'],
                'id' => $task['id']
            );
            array_push($data, $one);
        }
        return $data;
    }

    public function show_tasks_week()
    {
        $this->db->reconnect();
        $userId = $_SESSION['id'];
        $tasks = $this->task_model->get_user_tasks_week($userId);
        $data = array();
        foreach ($tasks as $task) {
            $one = array(
                'content'  => $task['content'],
                'id' => $task['id'],
                'date' => date_format(date_create($task['date']), 'd/m')
            );
            array_push($data, $one);
        }
        return $data;
    }
    public function show_tasks_future()
    {
        $this->db->reconnect();
        $userId = $_SESSION['id'];
        $tasks = $this->task_model->get_user_tasks_future($userId);
        $data = array();
        foreach ($tasks as $task) {
            $one = array(
                'content'  => $task['content'],
                'id' => $task['id'],
                'date' => date_format(date_create($task['date']), 'd/m')
            );
            array_push($data, $one);
        }
        return $data;
    }
    public function markTaskDone($id)
    {
        $answer = $this->task_model->markDone($id);
        return $answer;
    }
    public function markTaskUndone($id)
    {
        $answer = $this->task_model->markUndone($id);
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
    public function show_tasks_done()
    {
        $this->db->reconnect();
        $userId = $_SESSION['id'];
        $tasks = $this->task_model->get_user_tasks_done($userId);
        foreach ($tasks as $task) {
            echo "<p>";
            echo "<input onclick=unCheckTask(".$task['id'].") type='checkbox' checked='checked' class='filled-in checkbox-red' id='".$task['id']."'>";
            echo "<label for='".$task['id']."'>".htmlspecialchars($task['content'])."</label>";
            echo "</p>";
        }
    }
    public function show_tasks_undone_and_past()
    {
        $this->db->reconnect();
        $userId = $_SESSION['id'];
        $tasks = $this->task_model->get_user_tasks_past_and_undone($userId);
        foreach ($tasks as $task) {
            echo "<p>";
            echo "<input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            echo "<label for='".$task['id']."'>".htmlspecialchars($task['content'])." ".date_format(date_create($task['date']), 'd/m')."</label>";
            echo "</p>";
        }
    }

    public function superTasks(){
        $result = "";
        $this->db->reconnect();
        $tasks = $this->task_model->getSuperUserTasks();
        foreach ($tasks as $task) {
            $result = $result."<p><input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            $result = $result."<label for='".$task['id']."'>".$task['content']." ".date_format(date_create($task['date']), 'd/m')."</label></p>";
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
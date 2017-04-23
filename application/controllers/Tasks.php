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
        $data['points'] = $this->getUserPoints();
        return $data;
    }
    public function insert()
    {

        $this->form_validation->set_rules('description', lang('description'), 'required');
        $userId = $_SESSION['id'];
        if ($this->form_validation->run() === TRUE) {
            $description = $_POST['description'];
            $date = $_POST['date'];
            $repeat = $_POST['groupRepeat'];
            $task = $this->task_model->inser_task($description, $date, $userId, $repeat);
            header("location:index");
        }
        else{
            view_loader('tasks', $this->getData('tasks'));
        }
    }

    public function delete($id){
        $this->db->reconnect();
        $taskDeleted = $this->task_model->delete_task($id, $_SESSION['id']);
    }

    public function show_tasks_today()
    {
        $user = $_SESSION['id'];
        $this->db->reconnect();
        $this->task_model->updateRepeatedTasks($user);

        $this->db->reconnect();
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
        $now = $this->getUserPoints();

        $this->db->reconnect();
        $user = $this->task_model->getTask($id)->user_id;

        if($user == $_SESSION['id']){
            $answer = $this->task_model->markDone($id);

            $task = $this->task_model->get_task_type($id);
            $dateType = $task->time;

            $toBe = $this->calculatePoints($now, 'done', $dateType);
            $this->setUserPoints($toBe);

            return $answer;
        }
    }

    public function calculatePoints($now, $doneOrUndone, $dateType){
        if($doneOrUndone == 'done'){

            if ($dateType=='TODAY') {
                return $now + 2;
            }
            else if ($dateType=='WEEK'){
                return $now + 3;
            }
            else if ($dateType=='LATER'){
                return $now + 4;
            }
            else return $now + 1;
        }
        else{
            if ($dateType=='TODAY') {
                return $now - 2;
            }
            else if ($dateType=='WEEK'){
                return $now - 3;
            }
            else if ($dateType=='LATER'){
                return $now - 4;
            }
            else return $now - 1;
        }
    }
    public function markTaskUndone($id)
    {
        $now = $this->getUserPoints();

        $this->db->reconnect();
        $user = $this->task_model->getTask($id)->user_id;

        if($user == $_SESSION['id']){
            $answer = $this->task_model->markUndone($id);

            $task = $this->task_model->get_task_type($id);
            $dateType = $task->time;

            $toBe = $this->calculatePoints($now,'undone', $dateType);
            $this->setUserPoints($toBe);

            return $answer;
        }
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
            echo "<span onclick=deleteTask(".$task['id'].") class='deleteX'>x</span>";
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
            $result = $result."<p><span onclick=deleteTask(".$task['id'].") class='deleteX'>x</span><input onclick=checkTask(".$task['id'].") type='checkbox' class='filled-in checkbox-red' id='".$task['id']."'>";
            $result = $result."<label for='".$task['id']."'>".$task['content']." ".date_format(date_create($task['date']), 'd/m')."</label></p>";
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function getUserPoints(){
        $this->db->reconnect();
        $id = $_SESSION['id'];
        $answer = $this->user_model->getPoints($id);
        return $answer['points'];
    }

    public function userPoints(){
        $this->db->reconnect();
        $id = $_SESSION['id'];
        $answer = $this->user_model->getPoints($id);
        echo json_encode($answer['points'], JSON_UNESCAPED_UNICODE);
    }

    public function setUserPoints($amount){
        $this->db->reconnect();
        $id = $_SESSION['id'];
        $answer = $this->user_model->setPoints($id, $amount);
        return $answer;
    }

}
<?php

class task_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function inser_task($description, $date, $id, $repeat)
    {
        $sql = 'CALL insertTask(?,?,?,?)';
        $this->db->query($sql, array($description, $date, $id, $repeat));
    }

    public function delete_task($id, $userID){
        $sql = 'CALL deleteTask(?,?)';
        $this->db->query($sql, array($id, $userID));
    }

    public function get_task_type($id){
        $query = $this->db->get_where('taskdatetype', array('id' => $id));
        return $query->row();
    }

    public function get_user_tasks_of_today($username)
    {
        $sql = 'CALL getUserTasksOfToday("'.$username.'")';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            $data = array(
                'content' => $row->content,
                'id' => $row-> id
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;

    }

    public function updateRepeatedTasks($id){
        $update = 'CALL updateRepeatTasks(?)';
        $this->db->query($update, array($id));
    }

    public function get_user_tasks_week($id)
    {
        $sql = 'CALL getUsersTasksThisWeek("'.$id.'")';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
            $data = array(
                'content'  => $row->content,
                 'id' => $row->id,
                'date' => $row->due_time
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;
    }

    public function get_user_tasks_future($id)
    {
        $sql = 'CALL getUsersTasksFuture("'.$id.'")';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
            $data = array(
                'content'  => $row->content,
                'id' => $row-> id,
                'date' => $row->due_time
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;
    }

    public function markDone($id)
    {
        $sql = 'CALL markTaskDone("'.$id.'")';
        $answer = $this->db->query($sql);
        return $answer;
    }
    public function markUndone($id)
    {
        $sql = 'CALL markTaskUndone("'.$id.'")';
        $answer = $this->db->query($sql);
        return $answer;
    }

    public function getCount($id){
        $sql = 'CALL tasksOfUser("'.$id.'")';
        $response = $this->db->query($sql);
        $tasks = $response->row()->tasks;
        $response->next_result();
        return $tasks;
    }

    public function getAllTasksCount(){
        $sql = 'CALL allTasksAmount()';
        $response = $this->db->query($sql);
        return $response->row()->tasks;
    }
    public function get_user_tasks_done($id)
    {
        $sql = 'CALL getDoneTasks("'.$id.'")';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
            $data = array(
                'content'  => $row->content,
                'id' => $row-> id,
                'date' => $row->due_time
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;
    }
    public function get_user_tasks_past_and_undone($id)
    {
        $sql = 'CALL getUndonePastTasks("'.$id.'")';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
            $data = array(
                'content'  => $row->content,
                'id' => $row-> id,
                'date' => $row->due_time
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;
    }
    public function getSuperUserTasks()
    {
        $sql = 'CALL superUserTasks()';
        $result = array();
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
            $data = array(
                'content'  => $row->content,
                'id' => $row-> id,
                'date' => $row->due_time
            );
            array_push($result, $data);
        }
        $query->next_result();
        return $result;
    }
    public function getTask($id)
    {
        $sql = 'CALL getTask("'.$id.'")';
        $query = $this->db->query($sql);
        $result = $query->row();
        $query->next_result();
        return $result;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Riana
 * Date: 09.03.17
 * Time: 19:14
 */
class task_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function inser_task($description, $date, $id)
    {
        $sql = 'CALL insertTask(?,?,?)';
        $this->db->query($sql, array($description, $date, $id));
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
        return $result;

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
        return $result;
    }

    public function markDone($id)
    {
        $sql = 'CALL markTaskDone("'.$id.'")';
        $answer = $this->db->query($sql);
        return $answer;
    }
    public function getCount($id){
        $sql = 'CALL tasksOfUser("'.$id.'")';
        $response = $this->db->query($sql);
        return $response->row()->tasks;
    }

    public function getAllTasksCount(){
        $sql = 'CALL allTasksAmount()';
        $response = $this->db->query($sql);
        return $response->row()->tasks;
    }
}
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

        $connection = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);
        $query = mysqli_prepare($connection, $sql);
        mysqli_stmt_execute($query);
        if(mysqli_stmt_store_result($query))
        {
            mysqli_stmt_bind_result($query, $id, $due, $completed, $user, $content);
            /*
             * goes through users tasks of today and returns them in an array
            */
            while (mysqli_stmt_fetch($query)) {
                $data = array(
                    'content'  => $content
                );
                array_push($result, $data);
            }
            mysqli_stmt_free_result($query);
            mysqli_stmt_close($query);
        }
        mysqli_close($connection);
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
                'content'  => $row->content
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
                'content'  => $row->content
            );
            array_push($result, $data);
        }
        return $result;
    }
}
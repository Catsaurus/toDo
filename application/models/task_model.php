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

    public function inser_task($description, $date, $username)
    {
        $id = $this->user_model->get_user($username)['id'];
        $sql = 'CALL insertTask("'.$description.'", "'.$date.'", '.$id.')';
        $query = $this->db->query($sql);
    }

    public function get_user_tasks_of_today($username)
    {
        $sql = 'CALL getUserTasksOfToday("'.$username.'")';
        $result = array();
        $connection = mysqli_connect('localhost', 'root', '', 'todo');
        $query = mysqli_prepare($connection, $sql);
        mysqli_stmt_execute($query);
        if(mysqli_stmt_store_result($query))
        {
            mysqli_stmt_bind_result($query, $id, $due, $completed, $user, $content);
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
}
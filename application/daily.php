<?php

// Jooksutada cronjob'ist kord päevas

define("BASEPATH","");
define("ENVIRONMENT", "");
require_once "config/database.php";
$username = $db['default']['username'];
$password = $db['default']['password'];
$dbname = $db['default']['database'];
$mysqli = new mysqli("localhost", $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$undone_tasks = $mysqli->query("SELECT user_id, COUNT(*) as `undone_tasks` from allUndonePastTasks group by user_id");

foreach ($undone_tasks as $row){
    $count = $row['undone_tasks'];
    $minuses = intval($count)*(-5);
    $userID = intval($row['user_id']);
    $pointsResult = $mysqli->query("CALL getUserPoints($userID)");
    $mysqli->next_result();
    $pointsRow = $pointsResult->fetch_assoc();
    $points = intval($pointsRow["points"])+$minuses;
    $mysqli->query("CALL setUserPoints($userID, $points)");
}


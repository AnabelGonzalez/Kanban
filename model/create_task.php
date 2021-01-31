<?php
error_reporting(1);
ini_set('display_errors');

require_once('db_conn.php');

    if(isset($_POST['submit'])){

        $taskName = $_POST['task_name'];

        // $boardID = $_POST['boardID'];
        $boardID = '1';
        $columnID = '1';
        $description = $_POST['description'];


        //$sql = "INSERT INTO `testTasks` (`id`, `title`, `description`) VALUES (?, ?, ?);";
        //$conn->prepare($sql)->execute([NULL, $taskName, $description]);

        $sql = "INSERT INTO `tasks` (`taskID`, `taskName`, `boardID`, `columnID`, `description`) VALUES (?, ?, ?, ?, ?)";

        $conn->prepare($sql)->execute([NULL, $taskName, $boardID, $columnID, $description]);
    
    } else{ 
        echo "not sent";
        }

?>
<?php
error_reporting(1);
ini_set('display_errors');

require_once('db_conn.php');

    if(isset($_POST['submit'])){

        if (empty($_POST['task_name'])){
            $taskName = 'New Card';
        } else {
            $taskName = $_POST['task_name'];
        }

        $boardID = '1';
        $columnID = $_POST['columnID'];
        $description = $_POST['description'];


        $sql = "INSERT INTO `tasks` (`taskID`, `taskName`, `boardID`, `columnID`, `description`) VALUES (?, ?, ?, ?, ?)";

        $conn->prepare($sql)->execute([NULL, $taskName, $boardID, $columnID, $description]);
    
    } else{ 
        echo "not sent";
        }

?>
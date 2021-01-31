<?php

require('db_conn.php');

// Update query
if(isset($_POST['taskID'])){

    $taskID = $_POST['taskID'];
    $boardID = '1';
    $columnID = '1';
    $date = $_POST['dueDate'];

    $sql = $conn->prepare( "UPDATE tasks SET dueDate= :date WHERE taskID='$taskID'");

    $sql-> bindParam(':date', $date, PDO::PARAM_STR);
    $sql->execute();

}

?>



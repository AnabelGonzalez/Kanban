<?php

require('db_conn.php');

// Update query
if(isset($_POST['submit'])){

    $taskName = $_POST['taskName'];
    $taskID = $_POST['taskID'];
    $description = $_POST['description'];

    $sql = $conn->prepare( "UPDATE tasks SET taskName= :taskName,  description = :description WHERE taskID='$taskID'");

    $sql-> bindParam(':taskName', $taskName, PDO::PARAM_STR);
    $sql-> bindParam(':description', $description, PDO::PARAM_STR);
    $sql->execute();

}

?>



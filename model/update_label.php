<?php

require('db_conn.php');

// Update query
if(isset($_POST['taskID'])){

    $taskID = $_POST['taskID'];
    $boardID = '1';
    $columnID = '1';
    $label = $_POST['label'];

    $sql = $conn->prepare( "UPDATE tasks SET label= :label WHERE taskID='$taskID'");

    $sql-> bindParam(':label', $label, PDO::PARAM_STR);
    $sql->execute();

}

?>



<?php

require_once('db_conn.php');

if(isset($_POST['taskID']) ){
    $pdo_statement=$conn->prepare("DELETE FROM tasks WHERE taskID=" . $_POST['taskID']);

    $pdo_statement->execute();
}
?>
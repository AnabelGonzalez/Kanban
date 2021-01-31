<?php
error_reporting(1);
ini_set('display_errors');

require_once('db_conn.php');

if(isset($_GET['taskID'])){
    //$columnID = $_GET['columnID'];
    $taskID = $_GET['taskID'];
    $pdo_statement =$conn->prepare("SELECT * FROM `tasks` WHERE `taskID`=?");
    //Execute
    $pdo_statement->execute([$taskID]);
    //Store results
    $task = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json;charset=utf-8');
    $json = json_encode($task);
    print_r($json);
    //$load_boards = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    //$json = json_encode($load_boards);
    //print_r($json);
} else {
    echo 'error';
}



?>
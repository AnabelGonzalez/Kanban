<?php

require('db_conn.php');

// Update query
if(isset($_POST['columnID'])){
    $columnID = $_POST['columnID'];
    $columnName = $_POST['columnName'];
    $boardID = '1';

    $sql = $conn->prepare( "UPDATE `columns` SET `columnName` = :columnName WHERE   `columnID` =:columnID");

    $sql-> bindParam(':columnName', $columnName, PDO::PARAM_STR);
   // $sql-> bindParam(':boardID', $assessment, PDO::PARAM_STR);
    $sql-> bindParam(':columnID', $columnID, PDO::PARAM_STR);
    $sql->execute();

    

    $select_title = $conn->prepare("SELECT * FROM `columns` WHERE `columnID`= ?");
        //Execute
    $select_title -> execute([$columnID]);
        //Store results
    $title = $select_title -> fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json;charset=utf-8');
    $json = json_encode($title);
    print_r($json);
    //$load_boards = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    //$json = json_encode($load_boards);
    //print_r($json);
  
}

?>

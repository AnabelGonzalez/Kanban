<?php
error_reporting(1);
ini_set('display_errors');

require_once('db_conn.php');

if(isset($_GET['columnID'])) {
    $id = $_GET['columnID'];
    $statement = $conn->prepare("SELECT * FROM `tasks` WHERE `columnID`=?");
    $statement->execute(array($id));
    $tasks = $statement->fetchAll();

} else {
    die();
}


//print_r($assessment);

foreach($tasks as $row){

  echo  '
    <div class="element">
    
 <div class="clickToEdit standard-border '. $row['label'] .'" id="'. $row['taskID'] .'">
    <div class="text-dark card-item">'. $row['taskName']. '</div>
        <a href="#" class="text-dark littleButton"><i class="material-icons">drag_handle</i></a>
    </div>
    <form class="editable update-text" method="POST" action="./model/edit_task.php">
        <input type="hidden" value="'.$row['taskID'].'" name="taskID" class="taskID"/>
        <input type="text" name="taskName" value="'.$row['taskName'].'" class="form-control taskName" />
        <textarea name="description" id="" cols="28" rows="5" class="form-control">'.$row['description'].'</textarea>
        <input type="submit" value="Save" class="btn btn-sm btn-success save" name="submit">
        <input type="button" value="Delete" class="btn btn-sm btn-danger delete-element" name="'.$row['taskID'].'">
        <a href="#" class="text-dark settings" data-toggle="modal" data-target="#settingsForm"><i class="material-icons">settings</i></a>
    </form>
    
    </div>
    
    </div>'; 
}




?>
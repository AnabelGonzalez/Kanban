<?php

require_once('db_conn.php');

$pdo_statement = $conn->prepare("SELECT * FROM columns");

//Execute
$pdo_statement->execute();

$load_boards = $pdo_statement->fetchAll();

foreach($load_boards as $row){

 echo '<div class="list-container">
 <span class="material-icons my-handle">
     drag_indicator
 </span>
     <h6 class="edit-title" id="'.$row['columnID'].'" >'.$row['columnName'].'</h6>
     <div class="form-container">
        <form action="./model/update_board.php" action="POST" class="update_board">
            <div class="form-group custom-form-group edit-title-input">
                <input type="text" class="form-control title" value="'.$row['columnName'].'"> 
                <a class="btn btn-sm btn-success title-save">Save</a>
            </div>
        </form>
     </div>
     

     <div id="load" class="load">
     <!-- Content from database will be loaded here -->
     <div class="loader"></div>
     </div>
     
     <div class="clickable ">
         <!--
         
         <div class="clickToEdit border-left-info">
             <div class="text-dark card-item">Some text</div>
             <a href="#" class="text-dark littleButton"><i class="material-icons">edit</i></a>
         </div>
         
         <div class="editable">
             <textarea name="" id="" cols="28" rows="5" class="form-control">Some Text</textarea>
             <input type="button" value="Save" class="btn btn-sm btn-success save">
         </div> -->

     </div> 
     <a href="#" class="btn btn-sm btn-outline-secondary add-card">+ Add card</a>
     

 </div>';
}


echo '                <div class="list-container inactive-container">
<button class="add_column btn btn-outline-secondary">+ Add Column</button>   
</div>';
/*
<div class="new">
         <form class="new-element" method="POST" action="./model/create_task.php">
             <input type="text" name="task_name" class="form-control title" value="Card Name">
             <textarea name="description" id="" cols="28" rows="5" class="form-control">Description</textarea>
             <input type="submit" value="Save" class="btn btn-sm btn-success save" name="submit">
             <input type="button" value="Close" class="btn btn-sm btn-danger save close-new-card" name="close">
         </form>
         
     </div>*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrapTheme.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark nav-custom ">
  <a class="navbar-brand" href="#">Kanban Board</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Boards</a>
      </li>
    </ul>
    <a href="#" class="btn btn-danger create-board" data-toggle="modal" data-target="#createBoardModal"><i class="material-icons">
        add</i> Add Board
    </a>
    <a href="#" class="btn text-light account-settings"> <i class="material-icons">settings</i></a>
    
    
  </div>
</nav>


<div class="container-fluid">
    <main>
        <div id="board-settings">
            <h5 id="board-name">Board Name</h5>
            <button class="btn dropdown-toggle change-board" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Dropdown link</a>
                <a class="dropdown-item" href="#">Dropdown link</a>
            </div>

            <button class="board-settings-btn btn btn-secondary"> Options</button>
        </div>
        <div class="container-fluid columns">
            <div class="btn-container">
                <a class="btn btn-lg btn-danger" id="createBoard">Create Board +</a>
            </div>    
            
            <div class="board" id="board">
            
                
                <div class="list-container">
                    <span class="material-icons my-handle">
                        drag_indicator
                    </span>
                    <h6 class="edit-title"></h6>
                </div>


            </div>
        </div>


<!-- Modal Form  -->
<div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="createCard" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      <div class="new">
        <form class="new-element" method="POST" action="./model/create_task2.php">
             <input type="hidden" value="" name="columnID" id="columnID">
             <input type="text" name="task_name" class="form-control title" placeholder="Card Name">
             <textarea name="description" id="" cols="28" rows="5" class="form-control" placeholder="Description"></textarea>
             <input type="submit" value="Save" class="btn btn-sm btn-success save" name="submit" >
             <input type="button" value="Close" class="btn btn-sm btn-danger save close-new-card" name="close" data-dismiss="modal">
        </form>
         
     </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Task -->
<div class="modal fade" id="settingsForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Settings</h5>
        <form id="editTask">

          <div class="row">
            <div class="col-md-6">
              <input type="text" hidden name="taskID">
              <input type="text" class="taskNameSettings settings-input form-control" name="taskName">
              <textarea class="form-control taskDescription settings-input" cols="28" rows="5" name="taskDescription"></textarea>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 no-padding">
                  <a class="btn btn-sm btn-outline-secondary settings-buttons"  data-toggle="collapse" href="#editLabel" role="button" aria-expanded="false" aria-controls="editLabel">
                <span class="material-icons labels">
                label
                </span> Edit Label</a>
                </div>
                <div class="col-md-6 no-padding">
                  <a class="btn btn-sm btn-outline-secondary settings-buttons"  data-toggle="collapse" href="#addDueDate" role="button" aria-expanded="false" aria-controls="addDueDate">
                <span class="material-icons labels">
                calendar_today
                </span> Due Date</a>
                </div>
              </div>
              <div class="collapse" id="editLabel">
                <div class="card card-body dropdown-settings">
                <fieldset name="label" class="label-radio">
                    <label class="color-box red">  
                      <input type="radio" name="label" value="b-red" class="radio">
                      <span class="checkmark material-icons">done</span>
                    </label>
                    <label class="color-box orange">  
                      <input type="radio" name="label" value="b-orange" class="radio">
                      <span class="checkmark material-icons">done</span>
                    </label>
                    <label class="color-box yellow">  
                      <input type="radio" name="label" value="b-yellow" class="radio">
                      <span class="checkmark material-icons">done</span>
                    </label>
                    <label class="color-box green">  
                      <input type="radio" name="label" value="b-green" class="radio">
                      <span class="checkmark material-icons">done</span>
                    </label>
                    <label class="color-box blue">  
                      <input type="radio" name="label" value="b-blue" class="radio">
                      <span class="checkmark material-icons">done</span>
                    </label>
                    <label class="color-box pink">  
                      <input type="radio" name="label" value="b-pink" class="radio">
                      <span class="checkmark material-icons">done</span>
                    </label>
              
                </fieldset>
                </div>
              </div>
              <div class="collapse" id="addDueDate">
                <input class="form-control due-date" type="date">
              </div>
              <div class="row">
                <div class="col-md-6 no-padding">
                  <a class="btn btn-sm btn-outline-secondary settings-buttons"  data-toggle="collapse" href="#addAttachments" role="button" aria-expanded="false" aria-controls="addAttachments">
                  <span class="material-icons labels">
                    attach_file
                  </span> Add Attachments</a>
                </div>
              </div>
              

              <div class="collapse" id="addAttachments">
                  <div class="custom-file no-padding">
                    <input type="file" class="custom-file-input">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                  </div>
              </div>
            </div>
            

          </div>
          
          


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-success" id="saveSettings">Save</button>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal Create Board -->
    <div class="modal fade" id="createBoardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Create Board Form
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-success">Save</button>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</main>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
   <script src="https://malsup.github.io/min/jquery.form.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>
window.addEventListener("load", function load(event) {
  let newElement = document.querySelector(".new-element");
  //let addcard = document.querySelector(".add-card");
  let createTask = document.getElementById("createTask");

  //clickable.addEventListener("click", showEditable);
  //save.addEventListener("click", hideEditable);
  //title.addEventListener("click", showInput);
  //titleSave.addEventListener("click", saveTitle);
  $(".dropdown-toggle").dropdown();

  let el = document.getElementById("board");
  let sortable = Sortable.create(el, {
    animation: 150,
    draggable: ".list-container", // Specifies which items inside the element should be draggable
    handle: ".my-handle"
  });

  //addcard.addEventListener("click", displaynewcard);

  function displaynewcard() {
    newElement.style.display = "block";
    addcard.style.display = "none";

    let closeCard = document.querySelector(".close-new-card");
    closeCard.addEventListener("click", function hideCard() {
      newElement.style.display = "none";
      addcard.style.display = "inline";
    });
  }

  $(".new-element").ajaxForm(function () {
    //alert("submitted");
    window.location.reload();
    createTask.style.display = "none";
    addcard.style.animation = "fadeIn ease 1s";
    addcard.style.display = "inline";
  });

  $(".create-board").click(function () {
    $("#createBoardModal").on("shown.bs.modal", function () {
      $(".create-board").trigger("focus");
    });
  });

  $("document").ready(function () {
    $.ajax({
      type: "GET", url: "./model/load_boards.php", dataType: "text", //expect html to be returned
      success: function (response) {
        $("#board").html(response);

        let column = document.querySelectorAll(".load");

        //
        for (let i = 0; i < column.length; i++) {
          console.log(column.length + " col");
          //addcard.addEventListener("click", displaynewcard);
          let addcard = document.querySelectorAll(".add-card");

          let columnID = document.querySelectorAll(".edit-title");

          for (let i = 0; i < addcard.length; i++) {
            addcard[i].addEventListener("click", function showModal() {
              console.log("click");
              //console.log(columnID[i].id);
              let colID = document.getElementById("columnID");
              colID.value = columnID[i].id;
              console.log(colID);
              $("#createTask").modal();
            });
          }

          for (let b = 0; b < columnID.length; b++) {
            let getColumnID = columnID[b].id;
            console.log(getColumnID + "columna" + [b]);
            //console.log(columnID.length);
            loadTaks(getColumnID, columnID);
          }

          for (let t = 0; t < columnID.length; t++) {
            columnID[t].addEventListener("click", function hideTitle() {
              this.nextElementSibling.style.display = "block";
              this.style.display = "none";
              $(this).parent().find(".title-save").on("click", function () {
                let newTitle = $(this).parent().parent().find(".title").val();
                let currentColumnID = $(this).parent().parent().parent().parent().find(".edit-title");

                let values = {
                  columnID: currentColumnID.attr("id"),
                  columnName: newTitle
                };
                $.ajax({
                  type: "post",
                  url: "./model/edit_colum_title.php",
                  data: values,
                  success: function (data) {
                    columnID[t].innerText = data[0].columnName;
                    console.log(columnID + " test");
                  }
                });
                $(this).parent().parent().parent().parent().find(".edit-title").css("display", "block");
                $(this).parent().parent().parent().parent().find(".form-container").css("display", "none");
              });
            });
          }
        }
        $(document).ready(function () {
          $.ajax({
            type: "GET",
            url: "./model/boards.php",
            dataType: "json",
            success: function (response) {
              console.log(response);
            }
          });
        });
      }
    });
  });

  function loadTaks(id, active) {
    $.ajax({
      type: "GET", url: `./model/load_tasks2.php?columnID=${id}`, dataType: "text", //expect html to be returned
      success: function (response) {
        let columnTaskContainer = document.getElementById(id);
        $(columnTaskContainer).parent().find(".load").html(response);

        $(".list-container").sortable({items: ".element", handle: ".littleButton", connectWith: ".list-container"});

        //alert(response);
        let clickToEdit = document.querySelectorAll(".clickToEdit");

        for (let i = 0; i < clickToEdit.length; i++) {
          console.log(clickToEdit.length + "click to edit");
          clickToEdit[i].addEventListener("click", function (event) {
            let taskID = $(this).attr("id");

            let current = clickToEdit[i];
            $(this).css("display", "none").addClass("current-edit");
            let editor = $(current).next();
            //$(editor).toggle("block");
            // $(editor).css("display", "block");
            $(editor).addClass("block");
            let darkenContainer = $(current).parent().parent().parent().css("background-color", "rgba(23, 13, 58, 0.2)");
            $(darkenContainer).find(".clickToEdit").css({"background-color": "rgba(0,0,0,0.1)", opacity: "0.4"});
            $(".update-text").ajaxForm(function () {
              //alert("submitted");
              $(editor).css("display", "none").remove("current-edit");
              window.location.reload();
            });

            $(".delete-element").click(function () {
              let elem = this;
              let deleteid = $(this).attr("name");
              console.log(deleteid);
              $.ajax({
                url: "./model/delete_task.php",
                type: "POST",
                data: {
                  taskID: deleteid
                },
                success: function (response) {
                  console.log(response);
                  window.location.reload();
                }
              });
            });

            $(".settings").click(function () {
              let taskIDEdit = $(this).parent().find(".taskID").val();
              console.log(taskIDEdit);
              $("#settingsForm").on("shown.bs.modal", function () {
                $(".settings").trigger("focus");
                $("#saveSettings").on("click", function () {
                  window.location.reload();
                });

                $(document).ready(function () {
                  loadTask(taskIDEdit);

                  console.log("task id " + taskIDEdit);
                });

                $(".label-radio").on("change", function () {
                  let selectedColour = $(".radio:checked").val();
                  console.log(selectedColour);
                  saveTaskSettings(taskIDEdit);
                });

                $(".due-date").on("change", function () {
                  let dueDate = $(".due-date").val();
                  changeDueDate(taskIDEdit, dueDate);
                });

                $("#saveSettings").on("click", function () {
                  let taskNameSettings = $(".taskNameSettings").val();
                  let taskDescription = $(".taskDescription").val();
                  saveTaskText(taskIDEdit, taskNameSettings, taskDescription);
                });
              });
            });

            function saveTaskSettings(taskIDEdit) {
              let values = {
                label: $(".radio:checked").val(),
                taskID: taskIDEdit
              };
              $.ajax({
                url: "./model/update_label.php",
                type: "POST",
                data: values,
                success: function (data) {
                  console.log(data);
                }
              });
            }

            function changeDueDate(taskIDEdit, dueDate) {
              let values = {
                dueDate: dueDate,
                taskID: taskIDEdit
              };
              $.ajax({
                url: "./model/update_dueDate.php",
                type: "POST",
                data: values,
                success: function (data) {
                  console.log(data);
                }
              });
            }

            function loadTask(id) {
              $.ajax({
                type: "GET",
                url: `./model/load_task.php?taskID=${id}`,
                data: "JSON",
                success: function (response) {
                  console.log(response[0].taskName);
                  let taskLabel = response[0].label;
                  $(".radio").each(function () {
                    if ($(this).val() == taskLabel) {
                      $(this).prop("checked", true);
                    }
                  });
                  $(".taskNameSettings").val(response[0].taskName);
                  $(".taskDescription").val(response[0].description);
                  $(".due-date").val(response[0].dueDate);
                }
              });
            }

            function saveTaskText(id, taskName, description) {
              let values = {
                submit: true,
                taskName: taskName,
                description: description,
                taskID: id
              };
              $.ajax({
                url: "./model/edit_task.php",
                type: "POST",
                data: values,
                success: function (data) {
                  console.log(data);
                }
              });
            }
          });
        }
      }
    });
  }
});

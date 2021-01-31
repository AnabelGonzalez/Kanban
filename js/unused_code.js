let clickable = document.querySelector(".clickToEdit");
let editable = document.querySelector(".editable");
let save = document.querySelector(".editable .save");
let textarea = document.querySelector(".editable textarea");
let cardItem = document.querySelector(".card-item");
let title = document.querySelectorAll(".edit-title");
let updateBoard = document.querySelector(".update-board");
let titleInput = document.querySelector(".edit-title-input");
let titleSave = document.querySelector(".title-save");
let titleInputBox = document.querySelector(".title");
let boardName = document.getElementById("board-name");

/*
function showEditable() {
    editable.style.display = "block";
    clickable.style.display = "none";
}

function hideEditable() {
    editable.style.display = "none";
    clickable.style.display = "flex";
    let editedText = textarea.value;
    console.log(editedText);
    cardItem.textContent = editedText;
    console.log(cardItem.textContent);
}

function showInput() {
    alert("Click!");
    updateBoard.style.display = "block";
    title.style.display = "none";
}

function saveTitle() {
    titleInput.style.display = "none";
    title.style.display = "block";
    let inputTitle = titleInputBox.value;
    title.textContent = inputTitle;
    let noSpaces = inputTitle.replace(/\s/g, "");
    titleInputBox.setAttribute("id", inputTitle.replace(/\s/g, ""));
}*/

/* //alert(response[2].columnName);

/*var keys = Object.keys(response),
len = keys.length,
i = 0,
prop,
value;
while (i < len) {
prop = keys[i];
value = response[prop];
i += 1;
$("#load").append("<div> ID: " + value.columnID + " > " + value.columnName + "</div>");
$(".edit-title").html(value.columnName);
} */

$(".container-fluid").on("click", ".edit-title", function () {
  let element = $(this).parent().find(".form-container").css("display", "block");
  $(this).css("display", "none");

  let newTitle = $(this).parent().parent().find(".title").val();
  let columnID = $(this).parent().parent().find(".edit-title").attr("id");

  $(".container-fluid").on("change", ".title", function () {
    console.log(newTitle);
    console.log(columnID);
    let values = {
      columnID: columnID,
      columnName: newTitle
    };
    $.ajax({
      type: "post",
      url: "./model/edit_colum_title.php",
      data: values,
      success: function (data) {
        console.log(data);
      }
    });

    $("#board").on("click", titleSave, function () {
      $(this).parent().parent().parent().find(".form-container").css("display", "none");
      $(this).parent().parent().parent().find(".edit-title").css("display", "block");
    });
  });
});

/*let load = document.getElementById("load");
                                                Sortable.create(load, {
                                                  animation: 150,
                                                  draggable: ".element", // Specifies which items inside the element should be draggable
                                                  handle: ".littleButton"
                                                });*/
//$(".load").html(response);

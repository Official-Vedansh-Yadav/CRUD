<?php

require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   if (isset($_POST['sno'])){
      $sno = $_POST['sno'];
      $ntitle = $_POST['titleEdit'];
      $ndesc = $_POST['descriptionEdit'];
      $sql = "UPDATE `notes` SET `title` = '$ntitle' WHERE `notes`.`sno.` = '$sno'";
      $update = mysqli_query($conn,$sql);
      $sql = "UPDATE `notes` SET `description` = '$ndesc' WHERE `notes`.`sno.` = '$sno'"; 
      $update = mysqli_query($conn,$sql);
   }

  if (isset($_POST['title'])) {
       // get title and description
   $title = $_POST['title'];
   $desc = $_POST['description'];

   $sql = "INSERT INTO `notes` (`title`, `description`, `date`) VALUES ('$title', '$desc', current_timestamp())";
   $insert = mysqli_query($conn,$sql); 
  }}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['dsno'])) {
    $dsno = $_GET['dsno'];
    $sql = "DELETE FROM `notes` WHERE `notes`.`sno.` = '$dsno'";
    $delete = mysqli_query($conn,$sql);
  }}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>iNotes - CRUD APP</title>
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="shortcut icon" href="document.png" type="image/x-icon">
  </head>
  <body>

  <!-- Edit modal -->
         
  <div class='modal fade' id='Editmodal' tabindex='-1' aria-labelledby='EditmodalLabel' aria-hidden='true'>
         <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='EditmodalLabel'>Edit your note</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
      <div class="mb-3">
        <form action = "/CRUD/index.php" method = "POST">
            <input type="text" id="sno" name = "sno" style="overflow: hidden; visibility: hidden;">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="titleEdit" name = "titleEdit" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
               <label for="description" class="form-label">Description</label>
               <textarea class="form-control" name = "descriptionEdit" id="descriptionEdit" rows="3"></textarea>
           </div>
           </div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal' id = "cancel">cancel</button>
        <button type='submit' class='btn btn-primary' id = "save">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- End of edit modal -->


  <!-- Delete modal -->
         
  <div class='modal fade' id='Deletemodal' tabindex='-1' aria-labelledby='DeletemodalLabel' aria-hidden='true'>
         <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='DeletemodalLabel'>Delete your note</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
      <div class="mb-3">
        <form action = "/CRUD/index.php" method = "GET">
            <input type="text" id="dsno" name = "dsno" style="overflow: hidden; visibility: hidden;">
            <p>Are you sure to delete your Note It may Contain Important Information</p>
           </div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal' id = "cancel">cancel</button>
        <button type='submit' class='btn btn-primary' id = "save">Delete Note</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- End of Delete modal -->


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="php.jpg" alt="PHP Logo" style="width: 80px; height: 65px; margin-right: 20px;">
    <a class="navbar-brand" href="#">iNOTES - The Crud App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // if the Note is inserted successfully
  if (isset($_POST['title'])) {
    if ($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> - Your Note is added successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    } else {
     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
     <strong>Failed!</strong> - Your Note is not added successfully.
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>"; 
  }}

  // if the note is updated successfully
   if (isset( $_POST['sno'])){
     if ($update) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> - Your Note is Updated successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
     }else{
      echo "div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Failed!</strong> - Your Note is not Updated successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>"; 
  }}}

  // if the Note is deleted successfully
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
     if (isset($_GET['dsno'])){
       if ($delete){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> - Your Note is Deleted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";  
       } else{
        echo "div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Failed!</strong> - Your Note is not Deleted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";   
       }}}

?>


<div class="container my-2">
          <form action = "/CRUD/index.php" method = "POST">
          <h3>Add a Note</h3><hr>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name = "title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
               <label for="description" class="form-label">Description</label>
               <textarea class="form-control" name = "description" id="description" rows="3"></textarea>
           </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
          </form>
          </div>

<div class="container my-4">
          <table class="table" id = "myTable">
  <thead>
    <tr>
      <th scope="col">s.r.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php

      $sql = "SELECT * FROM `notes` ";
      $result = mysqli_query($conn,$sql);
      
      //  Fetching Notes from the database
       $sno = 1;
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>
          <th scope='row'>" . $sno . "</th>
          <td><strong>" . $row['title'] . "</strong></td>
          <td>" . $row['description'] . "</td>
          <td><div class='btn-group' role='group' aria-label='Basic example'>
         <!-- <button class='btn btn-primary mx-1' type='submit'>Edit</button> -->
         <button type='button' class='btn btn-primary mx-1 edit' data-bs-toggle='modal' data-bs-target='#Editmodal' id = " . $row['sno.'] . ">
        Edit  </button>
         <button type='button' class='btn btn-primary mx-1 delete' data-bs-toggle='modal' data-bs-target='#Deletemodal' id = " . $row['sno.'] . ">
        Delete </button>
        </div></td>
        </tr>";
        $sno++;
      }
      ?>
  </tbody>
</table>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>     
    <script src="js/jquery.js"></script>
    <script src="js/datatables.min.js"></script>
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
     } );
     </script>

    <script>
    console.log("PHP CRUD APP CREATED BY VEDANSH YADAV");
     var edits = document.querySelectorAll(".edit");
     Array.from(edits).forEach((element)=>{
        element.addEventListener('click', (e)=>{
          console.log("edit",e.target.id);
          var tr = e.target.parentNode.parentNode.parentNode;
          var title = tr.querySelectorAll("td")[0].innerText;
          var description = tr.querySelectorAll("td")[1].innerText;
          titleEdit.value = title;
          descriptionEdit.value = description;
          sno.value = e.target.id;
          console.log(sno);
        })
     });

     var deletes = document.querySelectorAll(".delete");
     Array.from(deletes).forEach((element)=>{
        element.addEventListener('click', (e)=>{
          console.log("edit",e.target.id);
          dsno.value = e.target.id;
          console.log(dsno.value);
        })
     });

    </script>
</body>
</html>
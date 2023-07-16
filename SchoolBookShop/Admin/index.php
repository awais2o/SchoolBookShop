
<?php 
$loc = 1;
session_start();
    if($_SESSION['Admin']==Null){
  header('location:Admin_Login.php');
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/Nav_Style.css">


    <title>Document</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"> -->

<link rel="icon" type="image/jpg" href="../src/image1.jpg">
<title>Admin Panel</title>
<style>
      .navbar {
  padding: 20px;
}

.nav-item {
  padding: 10px;
}

.form-inline {
  margin-left: auto;
}
body {
  background-image: url("../src/download.jpg");
  /* background: rgb(2,0,36);
background: linear-gradient(97deg, rgba(2,0,36,1) 0%, rgba(63,255,240,1) 0%, rgba(223,255,248,1) 0%, rgba(144,209,201,1) 43%, rgba(122,233,232,1) 100%, rgba(255,244,188,1) 100%, rgba(212,197,25,1) 100%); */
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  height: 100vh;
  width: 100%;
}

body::before {
  content: "";

  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;

}




</style>
</head>
<body>
<!--  -->

<nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Book Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="Add_Book.php">Add Book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Subject.php">Add Subject</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Type.php">Add Type</a>
            </li>
          </ul>
          <?php
          if ($loc == 1) {

            ?>
          <form class="form-inline" method="POST"   action="index.php" >
            <div class="form-group">
              <select name="searchby" id="" class="form-control custom-select">
              <option value="none" selected hidden>All</option>
              <option value="title">Title</option>
              <option value="standard">Standard</option>
              <option value="subject">Subject</option>                
              </select>
            </div>
            <input type="text" class="form-control mr-sm-2" placeholder="Search"  name="search" required >
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
<?php } ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="Admin_Logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
<!--  -->



<div class="container" style="padding-top:150px;">
  <div class="row">
  <?php 
  include("../includes/database_connection.php");
  if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    $qry = "SELECT Book_Id, Book_Title,Standard,Book_Subject,Book_Author,Book_Type,Book_Price FROM book";
    $run = mysqli_query($db_connection, $qry);

}
else{
  $find = $_POST['search'];
  $sl = $_POST['searchby'];
  if ($sl == "title") {
    $qry1 = "SELECT Book_Id, Book_Title,Standard,Book_Subject,Book_Author,Book_Type,Book_Price FROM book where Book_Title='$find'";
    $run = mysqli_query($db_connection, $qry1);
  }
  else if($sl == "standard"){
    $qry2 = "SELECT Book_Id, Book_Title,Standard,Book_Subject,Book_Author,Book_Type,Book_Price FROM book where Standard='$find'";
    $run = mysqli_query($db_connection, $qry2);
  }
  else if($sl == "subject"){
    $qry4 = "SELECT Subject_Id FROM subject where Subject='$find'";
    $run1 = mysqli_query($db_connection, $qry4);
    $data1 = mysqli_fetch_assoc($run1);
      $sbn = $data1['Subject_Id'];

    $qry3 = "SELECT Book_Id, Book_Title,Standard,Book_Subject,Book_Author,Book_Type,Book_Price FROM book where Book_Subject='$sbn'";
    $run = mysqli_query($db_connection, $qry3);
  }
  //  else if ($sl == "all") {
  //   $qry4 = "SELECT Book_Id, Book_Title,Standard,Book_Subject,Book_Author,Book_Type,Book_Price FROM book ";
  //   $run = mysqli_query($db_connection, $qry4);  
  // }


  // if (empty($run)) {
  //   header('location:Add_Book.php');
  // }
}


while ($data = mysqli_fetch_assoc($run)) {
  $id = $data['Book_Id'];

  ?>
    <div class="col-md-3">
      <div class="card card-xs" style="margin-bottom:30px;">
        <!-- <img src="../src/download.jpg" class="card-img-top img-sm" alt="Book 1"> -->
        <div class="card-body">
          <h5 class="card-title"><center><?php echo $data['Book_Title'] ;?></center></h5>
          <p class="card-text"> <strong>Standard: </strong><?php echo $data['Standard'] ;?></p>
          <p class="card-text"><strong>Subject: </strong><?php
    $temp=$data['Book_Subject'];
    $qry1 = "SELECT Subject  from subject where Subject_Id='$temp'";
    $run1 = mysqli_query($db_connection, $qry1);
    $data1 = mysqli_fetch_assoc($run1);
    echo $data1['Subject'] ;?></p>
          <p class="card-text"><strong>Type: </strong> <?php
    $temp2=$data['Book_Type'];
    $qry2 = "SELECT Type  from type where Type_Id='$temp2'";
    $run2 = mysqli_query($db_connection, $qry2);
    $data2 = mysqli_fetch_assoc($run2);
    echo $data2['Type'] ;?></p>
          <p class="card-text"><strong>Price: </strong> <?php echo $data['Book_Price'] ;?></p>
          <a href="Book_Update.php?id=<?php echo $id;?>" class="btn btn-primary">Update</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>








</body>
</html>
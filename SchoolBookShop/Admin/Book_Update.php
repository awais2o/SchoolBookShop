<?php 
    session_start();
    if($_SESSION['Admin']==Null){
  header('location:Admin_Login.php');
    }

    ?>
<?php
  include("../includes/database_connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $qry = "SELECT * FROM book where Book_Id= '$id'";
        $run = mysqli_query($db_connection, $qry);
      $data = mysqli_fetch_assoc($run);
    
}
  ?>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Book_Author = $_POST['author'];
  $Book_Id = $_POST['id'];
  $Book_Price = $_POST['price'];
  $qry = "UPDATE book SET Book_Author= '$Book_Author' ,Book_Price= '$Book_Price' where Book_Id='$Book_Id'";
  $run = mysqli_query($db_connection, $qry);
    header("location:index.php");
}
?>
<!DOCTYPE html>
<head>
<link rel="icon" type="image/jpg" href="../src/image1.jpg">
<style>
  form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    height: 100%;

  }
  
  .form-box {
    border: 1px solid gray;

    width: 30%;
    padding: 2em;

    border-radius: 1em;
    text-align: center;
    box-shadow: 0px 30px 60px -5px #000;  
}
  
  input, select {
    width: 80%;
    padding: 0.5em;
    margin: 0.65em 0.5em;
    font-size: 1em;
  }
  
  button {
    padding: 0.5em 1em;
    margin: 1em 0;
    font-size: 1em;
    background-color: blue;
    color: white;
    border: none;
    border-radius: 0.5em;
  }
  body{
          background-color: #d3d3d3;
  font-family: 'Montserrat', sans-serif;
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
        }
</style>
<title>Update Book</title>
</head>
<body>



<div style="display: flex;
    background-color: lightgray;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;">

<form class="form-box" style="width: 40%;
    height: 50%;
    background-color: lightgray;
    border: 1px solid black;
    text-align: center;
    background: url(https://picsum.photos/id/1004/5616/3744) no-repeat   center center #505050;   
  background-size: cover;"
    method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"
  >
  <div>  <h3>Update Book</h3></div>
  <div>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $data['Book_Title']; ?>" disabled>
  </div>
  <div>
    <label for="standard">Standard:</label>
    <input type="text" id="standard" name="standard" value="<?php echo $data['Standard']; ?>" disabled>

  </div>
  <div>
    <label for="subject">Subject:</label>
<?php
$tempn = $data['Book_Subject'];
$su = "SELECT Subject from subject where Subject_Id='$tempn'";
$runsu=mysqli_query($db_connection, $su);
$su_data = mysqli_fetch_assoc($runsu);
?>
    <input type="text" id="subject" name="subject" value="<?php echo $su_data['Subject'];?>" disabled>
  </div>
  <div>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author"  value="<?php echo $data['Book_Author'];?>" required>
  </div>
  <div>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="<?php echo $data['Book_Price'];?>"  required>
  </div>
  <div>
    <label for="type">Type:</label>
    <?php
$tempty = $data['Book_Subject'];
$ty = "SELECT Type from type where Type_Id='$tempty'";
$runty=mysqli_query($db_connection, $ty);
$ty_data = mysqli_fetch_assoc($runty);
?>
    <input type="text" id="type" name="type" value="<?php echo $ty_data['Type'];?>" disabled>  </div>
<input type="text" name="id" value="<?php echo $data['Book_Id'];?>" hidden>
    <input type="submit">
<button type="button" onclick="window.location.href='delete.php?id=<?php echo $data['Book_Id'];?>';">Delete</button>
  </form>


  </div>
</body>


</html>

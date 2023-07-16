<?php
$loc = 0;
session_start();
    if($_SESSION['Admin']==Null){
  header('location:Admin_Login.php');
    }

    ?>
<?php
$pass=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include("../includes/database_connection.php");

  $subject = $_POST['subject'];

  $qry = "SELECT * FROM subject where Subject = '$subject'";
  $run = mysqli_query($db_connection, $qry);
  $data = mysqli_fetch_assoc($run);
  if ($data == NULL) {
    $qry = "INSERT INTO subject(Subject) VALUES ('$subject')";
    $run = mysqli_query($db_connection, $qry);
    header('location:index.php');
  } else {
    $pass = 1;
  }

}
?>

<!DOCTYPE html>
<head>
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
<link rel="icon" type="image/jpg" href="../src/image1.jpg">
<title>Add Subject</title>
</head>
<body>
<?php
include("NavBar.php");

 ?>
    
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
  <div>  <h3>Add Subject</h3></div>
  <div>
    <label for="title">Subject:</label>
    <input type="text" id="title" name="subject">
  </div>
  <?php
if ($pass == 1) {
  ?>
  <div>  <h3>Subject already exists</h3></div>
  <?php
}
?>
  <button type="submit">Submit</button>
</form>
</div>
</body>


</html>
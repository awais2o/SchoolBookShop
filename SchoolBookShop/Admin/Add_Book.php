<?php 
    session_start();
    if($_SESSION['Admin']==Null){
  header('location:Admin_Login.php');
    }

    ?>
<?php
  include("../includes/database_connection.php");
$pass = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Book_Title = $_POST['title'];
  $Standard = $_POST['standard'];
  $Book_Subject = $_POST['subject'];
  $Book_Author = $_POST['author'];
  $Book_Type = $_POST['type'];
  $Book_Price = $_POST['price'];
  $qry = "SELECT * FROM book where Book_Title= '$Book_Title' AND Standard='$Standard' AND Book_Type= '$Book_Type'";
  $run = mysqli_query($db_connection, $qry);
$data = mysqli_fetch_assoc($run);
  if (empty($data)) {
    $qry = "INSERT INTO Book(Book_Title,Standard,Book_Subject,Book_Author,Book_Type,Book_Price,Stock) VALUES ('$Book_Title','$Standard','$Book_Subject','$Book_Author','$Book_Type','$Book_Price',100)";
    $run = mysqli_query($db_connection, $qry);
    header('location:index.php');
  } else {
$pass=1;  
  }
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
<title>Add Book</title>
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
  <div>  <h3>Add Book</h3></div>
  <div>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"  required>
  </div>
  <div>
    <label for="standard">Standard:</label>
    <select id="standard" name="standard" required>

    <option value="" selected disabled hidden>Choose here</option>
    <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
  </div>
  <div>
    <label for="subject">Subject:</label>
    <select id="subject" name="subject"  required>
    <option value="" selected disabled hidden>Choose here</option>
      <?php include('../includes/database_connection.php'); 
					$qry = "SELECT * FROM subject";
					$data = mysqli_query($db_connection, $qry);
					while($sub_data = mysqli_fetch_assoc($data))
					{					
					?>
                        <option value="<?php echo $sub_data['Subject_Id'] ?>"><?php echo $sub_data['Subject'] ?></option>
                    <?php } ?>
      
    </select>
  </div>
  <div>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>
  </div>
  <div>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required>
  </div>
  <div>
    <label for="type">Type:</label>
    <select id="type" name="type" required>
    <option value="" selected disabled hidden>Choose here</option>
      <?php
      //  include('../includes/database_connection.php'); 
					$qry = "SELECT * FROM type";
					$data = mysqli_query($db_connection, $qry);
					while($t_data = mysqli_fetch_assoc($data))
					{					
					?>
                        <option value="<?php echo $t_data['Type_Id'] ?>"><?php echo $t_data['Type'] ?></option>
                    <?php } ?>    </select>
  </div>
  <button type="submit">Submit</button>
  <?php 
  if($pass==1){
  ?>
  <div>
    Book Already Exists
  </div>
  <?php 
  }
  ?>
</form>
</div>
</body>


</html>

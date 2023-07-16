<?php 
  include("../includes/database_connection.php");
   session_start();

   if($_SESSION['Cust']==Null){

       header('location:Cust_Login.php');
   }
   $cust_id=$_SESSION['cu'];
if($_SERVER['REQUEST_METHOD']=='POST'){
$street=$_POST['street'];
$city=$_POST['city'];
$postalCode=$_POST['postalCode'];
$contact=$_POST['contact'];
$qry1="select Street from student where Std_Id=$cust_id";
$run=mysqli_query($db_connection, $qry1);
if(empty($run)){
  $qry2="insert into student(Street,City,PostalCode,Contact) values('$street','$city','$postalCode','$contact') where Std_Id=$cust_id";
$run=mysqli_query($db_connection, $qry2);
}
else{
  $qry3="update student set Street='$street', City='$city',PostalCode=$postalCode,Contact='$contact' where Std_Id=$cust_id";
$run=mysqli_query($db_connection, $qry3);
}
header('location:index.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Student Payment Form</title>
  <style>
    body{
        background-color: #d3d3d3;
  font-family: 'Montserrat', sans-serif;
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
  color:black;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-5">Confirm Address</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="form-group">
        <label for="street">Street</label>
        <input type="text" class="form-control" name="street">
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" name="city">
      </div>
      <div class="form-group">
        <label for="postalCode">Postal Code</label>
        <input type="text" class="form-control" name="postalCode">
      </div>
      <div class="form-group">
        <label for="contact">Contact</label>
        <input type="text" class="form-control" name="contact" pattern="[0-9]*">
      </div>
      <div class="form-group">
        <label for="paymentOption">Payment Option</label>
        <select class="form-control" id="paymentOption">
          <option>Cash</option>
          <option>card</option>
        </select>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="confirmAddress">
        <label class="form-check-label" for="confirmAddress">Confirm Address</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>

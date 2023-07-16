<?php
$pass = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  function encrypt($pass)
  {
      $pass = '!' . $pass;
      return MD5($pass);
  }
  include("../includes/database_connection.php");
echo  $cust_username = $_POST['cust_username'];
  $cust_password = encrypt(($_POST['cust_password']));
  $qry = "SELECT * FROM Student where Std_Username= '$cust_username'";
    $run = mysqli_query($db_connection, $qry);
  $data = mysqli_fetch_assoc($run);
  if (!empty($data)) {
  
    if($data['Std_Password']!=$cust_password && $data['Std_Username']==$cust_username){
      $pass = 1;
  }
  else if($data['Std_Password']==$cust_password && $data['Std_Username']==$cust_username){
    session_start();
    $_SESSION['Cust'] = $cust_username;
      echo $cust_username;

    header('location:index.php');
}
  } else {
    $pass = 2;
  }
}
?>
<html>
  <head>
  <link rel="icon" type="image/jpg" href="../src/image1.jpg">
    <title>Customer Login</title>
    <link rel="stylesheet" href="../form.css">

  </head>
  <body>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<div class="login">
<h1>Customer</h1>
  <h2 class="active"> sign in </h2>

  <h2 class="nonactive" onclick="location.href='Cust_Signup.php'">  sign up </h2>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
   
    

    <input type="text" class="text" name="cust_username">
     <span>username</span>

    <br>
    
    <br>

    <input type="password" class="text" name="cust_password">
    <span>password</span>
    <br>
    <?php
    if ($pass == 2) {
    
    ?>
    <p>No User Found</p>
<?php }?>
<?php
    if ($pass == 1) {
    
    ?>
    <p>Incorrect password</p>
<?php }?>
    <!-- <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
    <label for="checkbox-1-1">Keep me Signed in</label> -->
    
    <button class="signin">
      Sign In
    </button>


    <hr>

    <!-- <a href="#">Forgot Password?</a> -->
    <a href="../Home.php">Change User Type</a>

  </form>

</div>
  </body>
</html>

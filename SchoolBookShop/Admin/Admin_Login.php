<?php
$pass = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  function encrypt($pass)
  {
      $pass = '!' . $pass;
      return MD5($pass);
  }
  include("../includes/database_connection.php");
  $admin_username = $_POST['admin_username'];
  $admin_password = encrypt(($_POST['admin_password']));
  $qry = "SELECT * FROM Admin where Admin_Username= '$admin_username'";
    $run = mysqli_query($db_connection, $qry);
  $data = mysqli_fetch_assoc($run);
  if (!empty($data)) {
  
    if($data['Admin_Password']!=$admin_password && $data['Admin_Username']==$admin_username){
      $pass = 1;
  }
  else if($data['Admin_Password']==$admin_password && $data['Admin_Username']==$admin_username){
    session_start();
    $_SESSION['Admin'] = $data['Admin_Username'];
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="../form.css">

  </head>
  <body>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<div class="login">
<h1>Admin</h1>
  <h2 class="active"> sign in </h2>

  <h2 class="nonactive" onclick="location.href='Admin_Signup.php'">  sign up </h2>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
   
    

    <input type="text" class="text" name="admin_username">
     <span>username</span>

    <br>
    
    <br>

    <input type="password" class="text" name="admin_password">
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

    <a href="../Home.php">Change User Type</a>
  </form>

</div>
  </body>
</html>

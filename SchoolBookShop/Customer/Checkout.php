<?php 



include("../includes/database_connection.php");  include("../includes/database_connection.php");
if($_SERVER['REQUEST_METHOD']=='GET')
   $cust_id = $_GET['std'];
   session_start();
   $_SESSION['cu']=$cust_id;
   $qry1 = "Update Cart set Checkout=1 where  Cust_Id='$cust_id'";
           $run1 = mysqli_query($db_connection, $qry1);
header('location:Address.php');
?>
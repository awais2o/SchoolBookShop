<?php
   include("../includes/database_connection.php");
$id=$_GET['id'];
echo $id;
$qry = "delete from book where Book_Id='$id'";
$run = mysqli_query($db_connection, $qry);
$qry1 = "delete from cart where Book_Id='$id'";
$run = mysqli_query($db_connection, $qry1);
header('location:index.php');
?>


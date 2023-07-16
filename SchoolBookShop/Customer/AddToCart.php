<?php
    session_start();
    if($_SESSION['Cust']==Null){

        header('location:Cust_Login.php');
    }
  include("../includes/database_connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $book_id = $_GET['id'];
    $cust_id = $_GET['custid'];

    $qry1 = "SELECT * FROM Cart where Book_Id= '$book_id' AND Cust_Id='$cust_id' AND Checkout=0";
        $run1 = mysqli_query($db_connection, $qry1);
      $data1 = mysqli_fetch_assoc($run1);
    $cart_id = $data1['Cart_Id'];
    if (empty($data1)) {
        $qry2 = "Insert into Cart(Cust_Id,Book_Id,Quantity,Checkout) values ('$cust_id','$book_id',1,0 )";
        $run2 = mysqli_query($db_connection, $qry2);    
    } else {
        $ne = $data1['Quantity'] + 1;
        $qry4 = "update Cart set Quantity='$ne' where Cust_Id='$cust_id' AND Book_Id= '$book_id'";
        $run4 = mysqli_query($db_connection, $qry4);    
    
    }
}
header('location:index.php');
  ?>
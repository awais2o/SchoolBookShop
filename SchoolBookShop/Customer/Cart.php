<?php 
  include("../includes/database_connection.php");
    session_start();
    if($_SESSION['Cust']==Null){

        header('location:Cust_Login.php');
    }
$cust_id = NULL; 
   if($_SERVER['REQUEST_METHOD']=='GET')
$cust_id = $_GET['id'];
    $qry1 = "SELECT * FROM Cart where  Cust_Id='$cust_id' AND Checkout=0";
        $run1 = mysqli_query($db_connection, $qry1);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/jpg" href="../src/image1.jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
button {
  padding: 10px 20px;
  background-color: blue;
  color: white;
  border-radius: 5px;
  border: none;
  font-size: 16px;
  cursor: pointer;
}

table {
    margin: 0 auto;
    width: 50%;
    background: url(https://picsum.photos/id/1004/5616/3744) no-repeat   center center #505050;   
  background-size: cover;
  box-shadow: 0px 30px 60px -5px #000;
  }
  body{
text-align: center;
    background-color: #d3d3d3;
  font-family: 'Montserrat', sans-serif;
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
  }
</style>
<title>My Cart</title>
</head>
<body>
    <h2 style="  box-shadow: 0px 30px 60px -5px #000; color:black;">Your Cart</h2>

    <table >
    <tr>
    <th>Product Name</th>
    <th>Price per unit</th>
    <th>Quantity</th>
    <th>Price</th>
  </tr>
  <br>

    <?php
    $count = 0;
    $TotalPrice =0 ;
    while($data1 = mysqli_fetch_assoc($run1)){
      $count++;
 
      $cs=$data1['Book_Id'];
$qry2 = "SELECT * FROM Book where  Book_Id='$cs'";
            $run2 = mysqli_query($db_connection, $qry2);
            $data2 = mysqli_fetch_assoc($run2)
        
        ?>
    <tr>
       
    <td><?php echo $data2['Book_Title'];?></td>
          <td>Rs. <?php echo $data2['Book_Price'];?></td>
          <td>   <?php echo $data1['Quantity'];?></td>
          <td>Rs. <?php 
               $TotalPrice = $data1['Quantity'] * $data2['Book_Price']+$TotalPrice;
          echo $data1['Quantity']*$data2['Book_Price'];?></td>
        </tr>
        <?php
         } 
        ?>


<tr>
    <th></th>
    <th></th>
    <th>Total Items</th>
    <th><?php echo $count;?></th>
  </tr>

  <tr>
    <th></th>
    <th></th>
    <th>Total Price</th>
    <th>Rs. <?php echo $TotalPrice;?></th>
  </tr>

<tr>
    <td  colspan='4'>
<button onclick="location.href='Checkout.php?std=<?php echo $cust_id;?>'" style="margin:10px;">Check Out!</button>
    </td>
  </tr> 
      </table>

      
      
</body>
</html>
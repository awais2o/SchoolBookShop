
<?php 
  // include("../includes/database_connection.php");
  // session_start();
  $cust_=$_SESSION['Cust'];
$custq = "select Std_Id from Student where Std_Id= '$cust_'";
$runcus = mysqli_query($db_connection, $custq);
$cus_data = mysqli_fetch_assoc($runcus);
$cust_id = $cus_data['Std_Id'];

?>
<style>
    ul {
    list-style-type: none;
    margin: 0;
    padding: 0px;
    overflow: hidden;
    background-color: whitesmoke;
    /* box-shadow:  0px 4px 35px -5px #4082f5; */
    
  }
  
  li {
    float: left;
  }
  
  li a {
    display: block;
    color: black;
   font-size:20px;
    text-align: center;
    padding: 10px 20px;
    text-decoration: none;
  }
  /* .active{
  background-color: gray;
  color: white;
  } */
  li a:hover {
    background-color: orange;
    color: white;
  }
  body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<div style="">
    <ul>
  <li><a class="active" href="index.php">Book</a></li>
  <li><a href="Cart.php?std=<?php echo $cust_id; ?>">My Cart</a></li>
  <li><form  method="POST"  class="example" action="index.php" style="margin:0px 50px;max-width:300px">
  <input type="text" placeholder="Find Book" name="search" required>
  <!-- <select style="display:inline-block " name="selectby" id="" >
    <option value="1" >Subject</option>

  </select> -->
  <button style="margin-top:0px;border-radius:0px;"type="submit">Find</button>
</form></li>
  <li style="position:absolute;
  top:0;
  right:0;
  margin:10px;
  "><a href="Cust_Logout.php">Logout</a></li>
</ul>
<!-- <style>
    ul {
    list-style-type: none;
    margin: 0;
    padding: 0px;
    overflow: hidden;
    /* background-color: Black; */
    /* box-shadow:  0px 4px 35px -5px #4082f5; */
    /* border-radius: 10px;     */
  
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
    color: whitesmoke;
  }
  <style>
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
</style>
<div style="">
    <ul>
  <li><a class="active" href="index.php">Book</a></li>
  <li><a href="Subject.php">Subject</a></li>
  <li><a href="Type.php">Type</a></li>
<?php
if ($loc == 1) {

?>
  <li><form method="POST"  class="example" action="index.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Find Book" name="search" required>
  <button style="margin-top:0px;border-radius:0px;"type="submit">Find</button>
<?php }?>

</form></li>
  <li style="position:absolute;
  top:0;
  right:0;
  margin:10px;
  "><a href="Admin_Logout.php">Logout</a></li>
</ul> -->








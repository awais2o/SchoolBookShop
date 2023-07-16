<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" type="image/jpg" href="src/image1.jpg">
    <style>
        body{
          background-color: #d3d3d3;
  font-family: 'Montserrat', sans-serif;
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
        }
      .center {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }
      .box {
        background: url(https://picsum.photos/id/1004/5616/3744) no-repeat   center center #505050;   
  background-size: cover;
        min-width: 250px;
        box-shadow: 0px 30px 60px -5px #000;
        /* background-color: lightgray;
        background: linear-gradient(110deg, #fdcd3b 60%, #ffed4b 60%); */
        padding: 20px;
        border: 1px solid gray;
        border-radius: 10px;
        text-align: center;
        
      }
      button {
        border-radius: 10px;
        width: 100%;
        padding: 10px;
        margin-top: 10px;
      }
      button:hover {
        border-radius: 10px;
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        background-color: ghostwhite;
    }
    </style>
        <title>Select User</title>
  </head>
  <body>
    <div class="center">
      <div class="box">
        <h1>User Type</h1>
        <button onclick="location.href='Admin/Admin_Login.php'">Admin</button>
        <button onclick="location.href='Customer/Cust_Login.php'">Customer</button>
      </div>
    </div>
  </body>
</html>
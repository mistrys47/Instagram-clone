<?php

if(isset($_POST["submit"])){
$username=$_POST["username"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","") or die("can't connect");
mysqli_select_db($con,"Instagram");
  $q="select count(*) from user_info where username='$username' AND password='$password'";
  $i=mysqli_query($con,$q);
  $r=mysqli_fetch_row($i);
  if($r[0])
  {
        session_start();
        $_SESSION["username"]=$username;
        echo "<script>window.location.href='home.php';</script>";
  }
  else
  {
    echo '<script>alert("Invalid username or password");window.location.href="login.html";</script>';
  }}
  
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}
.container {
  position: relative;
  border-radius: 5px;
  background-color: #2196f34d;
  padding: 20px 0 30px 0;
  border-radius: 15px;
  opacity: 1;
} 
.container:hover{
  opacity: 1;
  
}
input {
  width: 290px;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin-left: 50px;
  margin-top: 10px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; 
}
.btn{
  width: 100%;
  padding: 10px;
  border-radius: 4px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; 
  background-color: transparent;
  border-color: red;
}
input:hover,
.btn:hover {
  opacity: 1;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
.col {
  float: left;
  width: 50%;
  margin: auto;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }}
  a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}
.ert:hover{
  background-color: white;
}
</style>
</head>
<body background="job2.jpg" style="background-size: cover;">
<center>
  <div style="margin-top: 100px;"><h1>Login</h1></div>
<div  class="container" style="width: 25%;" >
  <form method="post" action="login.php">
    <div class="row">
      <div class="col">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login" name="submit" class="">
      </div>
      
    </div>
  </form>
  <div style="margin-top: 18px;"><a href="signup.php" style="color:black;">Don't have account?</a></div>
</div>
</center>
</body>
</html>

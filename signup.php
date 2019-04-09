<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$name="";
$email="";
$username="";
$password="";
$password1="";
$image="";
$imagename="";
$otp="";
$otpvalue="";
if(isset($_POST['submit1']))
{
  $con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
  
  mysqli_select_db($con,"Instagram")or
    die("Could not select db: " . mysql_error());
  $name=$_POST["name"];
  $email=$_POST["email"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  $password1=$_POST["password1"];
  $image=$_POST["imagename"];
  $imagetmp=addslashes(file_get_contents($image));
  $otp=$_POST["otp"];
  $otpvalue=$_POST["otpvalue"];
  if($otpvalue==$otp)
  {
    $q="insert into user_info (name,email,username,password,profile_image) values ('$name','$email','$username','$password','$imagetmp')";
    //echo $q;
    if(mysqli_query($con,$q))
    {
      echo '<script>location="login.php";</script>';
    }
    else
    {
      echo '<script>alert("sign in issue...!!!");</script>';
    }
  }
}
if(isset($_POST['submit']))
{
  //echo "<script>alert('hey');</script>";
  $name=$_POST["name"];
  $email=$_POST["email"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  $password1=$_POST["password1"];
  $imagename=$_FILES['image']['name'];
  $otpvalue=rand(100000,999999);
  //mail
  /*
  $mail = new PHPMailer(true);       
    try {
  
      $mail->isSMTP();               
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;                               
      $mail->Username = 'mistrys013@gmail.com';               
      $mail->Password = '9879339580';                           
      $mail->SMTPSecure = 'ssl';                            
      $mail->Port = 465;                                    

      $mail->setFrom('jinesh1076@gmail.com','jinesh patel');
      
      
      
      $mail->addAddress($email);
      $mail->isHTML(true);                               
      $mail->Subject = "Verfication";
      $mail->Body    = "This is Your OTP : ".$otpvalue."\n Don't Share With anyone.";
    
      $mail->send();
      echo "<script>alert($email);</script>";
    } 
    catch (Exception $e) {
      
      echo "<script>alert('OTP hasnot been sent...".$mail->ErrorInfo."');</script>";
      echo "<script> location='signup.php';</script>";
    }*/
 echo '<script>alert('.$otpvalue.');</script>';

  
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
  function validate()
  {
    var x1=document.getElementById("password").value;
    var x2=document.getElementById("password1").value;
    if(x1!=x2)
    {
      alert("password not same...!!!");
      return false;
    }
    return true;}
</script>
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
  
  padding: 20px 0 30px 0;
  border-radius: 12px;
} 
input {
  width: 290px;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin-left: 79px;
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
input[type=submit]{
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
}</style></head>
<body background="job6.jpg" style="background-size: cover;">
	<div style="padding-left: 1370px;"><input type="button" name="login" onclick="window.location.href='login.php'"  value="login"  style="width:initial;color:green;border:solid;"></div>
	<center>
		<div id="b1" style="margin-top: 100px;font-size: 33px;">Sign Up</div>
    <div id="b2" style="margin-top: 100px;font-size: 33px;display: none;">Enter OTP</div>
<div class="container" style="width: 30%;" >
  <form method="post" action="signup.php" enctype="multipart/form-data" onsubmit="return validate()">
    <div class="row">
      <div class="col" id="blk">
      	<input type="text" name="name" placeholder="Name" value="<?php echo  $name; ?>" >
      	<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" >
        <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" >
        <input type="password" name="password" id="password"   placeholder="Password" value="<?php echo $password; ?>" >
        <input type="password" name="password1" id="password1"  value="<?php echo $password1; ?>" placeholder="Confirm Password" >
        <input type="file" name="image"   />
        <input type="hidden" name="imagename" value="<?php echo $imagename; ?>">
        <input type="submit" name="submit" id="submit" value="Sign Up">
      </div>
      <div id="otpblk" style="display: none;">
        <input type="text" name="otp" id="otp" >
        <input type="hidden" name="otpvalue" id="otpvalue" value="<?php echo $otpvalue; ?>">
        <input type="submit" name="submit1" id="submit1" >
        </div>
    </div>
  </form>
</div>
</center>
</body>
</html>
<?php
  if(isset($_POST["submit"]))
  {
    echo "<script>document.getElementById('otpblk').style.display='block';document.getElementById('blk').style.display='none';document.getElementById('b1').style.display='none';document.getElementById('b2').style.display='block';</script>";
  }
?>

<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
  
  mysqli_select_db($con,"Instagram")or
    die("Could not select db: " . mysql_error());
    session_start();
    if(!isset($_SESSION["username"]))
    {
    	echo "<script>window.location.href='login.php';</script>";
    }
    $username=$_SESSION["username"];
    $x=$_POST["dd1"];
    $q="select * from post where id='$x'";
    //echo $q;
    $i=mysqli_query($con,$q);
    $x1=0;
    while($r=mysqli_fetch_row($i))
    {
    	$x1=$r[5];
    	$x1=$x1+1;
    	$q="update post set downloads=$x1 where id=$x";
    	//echo $q;
    	mysqli_query($con,$q);
    }
    
    echo "<script>window.location.href='home.php';</script>";
?>
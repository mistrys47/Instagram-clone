<style type="text/css">
body{
	background: radial-gradient(circle at 30% 107%,  #fd5949 30%,#d6249f 60%,#285AEB 90%);
}
.post{
  height: 400px;
  width: 400px;
}
.description{
  min-height: 80px;
  width: 400px;
  color: white;
  text-align: left;
  padding: 5px;
}
.post_top{
	background-color: white;
}
</style>
<body ><center>
	<h1>Images</h1>
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
    $q="select * from post where username='$username'";
    //echo $q;
    $r=mysqli_query($con,$q);
    while($row=mysqli_fetch_row($r))
    {
    	echo '
      <div style="margin-left:340px;">
      <div class="post_top">

      </div>
       <div class="post">
          <img src="data:image/png;base64,'.base64_encode($row[1]).'" alt="post" width="400" height="100%">
        </div>
        <div class="description">
          <label style="color:blue;"><b>count : '.$row[5].'</b> </label>
        </div>
      </div>';
    }
    ?><h1>Hashtags</h1><?php
    $q="select * from tags";
    $i=mysqli_query($con,$q);
    while($r=mysqli_fetch_row($i))
    {
    	echo $r[0]."   : ".$r[1]."\n";
    }
    ?></center>
    </body>
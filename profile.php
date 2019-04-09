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
      $sub="sub";
      $inp="inp";
      $del="del";
      $q="select * from post where username='$username' order by id";
      $i=mysqli_query($con,$q);
      while($r=mysqli_fetch_row($i))
      {
        $x=$r[3].$del;
        if(isset($_POST[$x]))
        {
          $q1="delete from post where id='$r[3]'";
          mysqli_query($con,$q1);
        }
        $x=$r[3].$sub;
        if(isset($_POST[$x]))
        {
          $z=$r[3].$inp;
          $y=$_POST[$z];
          $q1="update post set description='$y' where id=$r[3]";
          mysqli_query($con,$q1);
          echo "<script>alert('updated');</script>";
        }
      }
      
      
      
    $q="select * from user_info where username='$username'";
   // echo $q;
    $i=mysqli_query($con,$q);
    while($r=mysqli_fetch_row($i))
    {
      $img=base64_encode($r[4]);
?>
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style type="text/css">
body{
	background: white;
}
.intro-display-widget {
    background-color: #2D2F31;
    position: relative;
    
    margin-left: auto;
    margin-right: auto;
    
    display: block;
}

.intro-display-widget .card-display {
    background-color: #985332;
    padding: 10px;
    width: 100%;
    height: 165px;
    margin:0;
  box-shadow: 0px 3px 2px -1px rgba(0,0,0,0.75);
}

.intro-display-widget .card-display .face {
    display: inline-block;
    float: left;
    height: 120px;
    margin-left: 100px;
    width: 120px;
    background-color: #2D2F31;
    background-size: contain;
    background-image: url(https://avatars3.githubusercontent.com/u/1109686?v=3&s=250);
    border-radius: 50%;
    border: 2px solid #DCD8D6;
    position: relative;
    top: 10px; 
}

.intro-display-widget .card-display .details {
    display: block;
    color: #eee;
    width: 262px;
    float: left;
    position: relative;
    top: 10px;
    left: 10px;
}

.intro-display-widget .card-display .details ul {
    margin: 5px 0 0 0;
    padding-left: 5px;
    list-style: none;
}

.intro-display-widget .card-display .details ul li{
    line-height: 1.7em; 
    padding-left: 5px; 
    font-size: 1em;
}

.intro-display-widget .card-display .details ul li a{
    color: #eee;
}


.intro-display-widget .card-display .details .name{
    font-size: 1.3em;
    color: #fff;
    padding: 0;
    margin: 5px 0 0 10px;
}

.intro-display-widget .card-display .details .line-text{
    display: block;
    font-size: 14px;
    padding: 0;
    margin: 5px 0;
}

.intro-display-widget .desc {
    font-size: 14px;
    color: #fff;
    padding:15px;
    text-align: left;
}
.post{
  height: 400px;
  width: 400px;
  background-color: red;
}
.description{
  min-height: 80px;
  width: 400px;
  
  text-align: left;
  padding: 5px;
}
.btn {
   
    width: 25%;
    
  border-width:2px;  
    border-style:outset;
    color: white;
    background-color: #0E6251  ;
    opacity: 0.8;
    border-radius: 12px;
    margin-top: 13px;
    margin-left: 30px;
    outline: none;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $( "#searchValue" ).autocomplete({
        source: function( request, response ) {
         // Fetch data
         $.ajax({
          url: "search.php",
          type: 'post',
          dataType: "json",
          data: {
           query: request.term
          },
          success: function( data ) {
            //alert(typeof data);
            //console.log(data);
            response( data );
          }
         });
      }
        
    });
    
  });
  var input = document.getElementById("searchValue");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("b1").click();
  }
});
function a(x){
  document.getElementById(x).style.display='none';
  var y=x;
  x+="sub";
  document.getElementById(x).style.display='block';
  var z=y;
  y+="edit";
  document.getElementById(y).style.display="none";
  z+="inp";
  document.getElementById(z).style.display="block";
}
</script>
<body>
  <form action="display.php" method="post">
  <header class="site-navbar py-1" role="banner" style="background-color: #20222e;position: fixed;top:0;" >

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="home.php" class="text-black h2 mb-0"><img src="logo.png" height="80px" style="margin-left: -120px;"></img></a></h1>
          </div>
         
          <div class="col-10 col-xl-10 d-none d-xl-block">
            <nav class="site-navigation text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active" ><a href="home.php" style="color: white;opacity: 0.8;">Home</a></li>
                
        <li class="active"><a href="profile.php" style="color: white;opacity: 0.8;">Profile</a></li>
        <li class="active"><a href="add.php" style="color: white;opacity: 0.8;">New Post</a></li>
        <li class="active"><input type="text" name="query" id="searchValue" placeholder="Search" style="border-radius: 8px;"></li>
        <li class="active"><a href="logout.php" style="color: white;opacity: 0.8;">Logout</a></li>
        <input type="submit" name="b1" id="b1" style="display: none;">
        </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right d-block">
            
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>
  </form>
  <br>
  <br>
  <br>
    <div class="intro-display-widget" >
   <div class="card-display">
     <div class="face"> <img src="data:image/png;base64,<?php echo $img; ?>"  style="width: 100%;height: 100%;border-radius: 50%;"> </div>
      <div class="details">
         <h4 class="name" style="margin-top: 10px;"> <?php echo $r[0];  ?></h4>
         <ul>
            <li style="margin-top:15px;"> <i class="fi-torso"> </i><?php echo $r[1]; ?> </li>
            <li> <i class="fi-marker"> </i> <?php echo $r[2]; }?></li>
         </ul>
      </div>
   </div>
</div>
<form action="profile.php" method="post">
<div >
  <?php
    $q="select * from post where username='$username' order by id desc";
    //echo $q;
    $i=mysqli_query($con,$q);
    if(mysqli_num_rows($i)>=1)
    {
      while($r=mysqli_fetch_row($i)){
        $sub="sub";
        $edit="edit";
        $inp="inp";
        $del="del";
      echo '
      <center>
       
          <img src="data:image/png;base64,'.base64_encode($r[1]).'" alt="post" width="400" height="400" >
        
        <div class="description">
          <label style="color:blue;"><b>'.$username.'</b> :</label><span id="'.$r[3].''.$edit.'" style="margin-left:5px;">'.$r[2].'</span>
          <input type="text" id='.$r[3].''.$inp.' name="'.$r[3].''.$inp.'" style="display:none;" value="'.$r[2].'" >
          <button type="button" id='.$r[3].' class="btn" onclick="a(this.id)" >Edit</button>
          <button id='.$r[3].''.$sub.' name="'.$r[3].''.$sub.'" type="submit" class="btn" style="display:none;" >Save</button>
          <button type="submit" id="'.$r[3].''.$del.'" name="'.$r[3].''.$del.'"><img src="delete.png" height="30" width="30"></button>
        </div>
      </center>';
     }
  }
    else
    {
      echo '<center style="margin-top:10px;"><h2>No Posts...!!!</h2></center>';
    }
  ?>
  </div>
</form>
</body>
</html>
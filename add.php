<?php
session_start();
if(!isset($_SESSION["username"]))
{
  echo "<script>window.location.href='login.php';</script>";
}
$username=$_SESSION["username"];
  if(isset($_POST["submit"]))
  {
    $image=$_FILES['image']['name'];
    $imagetmp=addslashes(file_get_contents($image));
    $description=$_POST["description"];
    $con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
  
  mysqli_select_db($con,"Instagram")or
    die("Could not select db: " . mysql_error());
    $d=date("y-m-d");
    $q="insert into post (username,image,description,date) values ('$username','$imagetmp','$description','$d')";
    if(mysqli_query($con,$q))
    {
      echo '<script>alert("posted succesfully");</script>';
    }
  }
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
<style type="text/css">
body{
	background: radial-gradient(circle at 30% 107%,  #fd5949 30%,#d6249f 60%,#285AEB 90%);
}
.a{
      width: 100%;
    max-width: 940px;
    margin: 0;
    background: linear-gradient(rgba(79, 172, 254, 0.8) 0%, rgba(0, 242, 254, 0.8) 100%);
    padding: 50px 70px 20px 70px;
    border-radius: 10px;
    margin-left: 300px;
    margin-top: 100px;
    color: black;
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
  <br>
  <br>
    <div class="a">
      <form action="add.php" method="post" enctype="multipart/form-data">
        <div>
        <label >Select Image :</label>
        <input type="file" name="image" id="image" />
      </div>
      <div style="margin-top: 10px;">
        <label>Description     :</label><div>
        <textarea  name="description"  style="width:450px;height: 100px;border-radius: 10px;border:none;outline: none;"></textarea>
      </div>
      </div>
      <div style="margin-top: 20px;"><input type="submit" name="submit" value=" Post "style="border-radius: 4px;border:none;"></div>
      </form>
    </div>
</body>
</html>
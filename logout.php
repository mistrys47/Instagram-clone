<?php
session_start();
	session_destroy();
	$_SESSION["username"]=null;
	echo "<script>alert('Logging out...');window.location.href='login.php';</script>";
?>
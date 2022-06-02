<?php
	session_start();
	session_destroy();
 
	if (isset($_COOKIE["LoggedUser"])){
		setcookie("LoggedUser", '', time() - (3600));
	}
 
	header('location:login.php');
 
?>
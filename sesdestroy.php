<?php
	session_start(); 
	setcookie("key","",time()-3600);
	session_unset();

	session_destroy(); 
	session_regenerate_id();

	header('Location:login.php');									
?>
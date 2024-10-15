<?php

	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("DATABASE", "kaavalan");
	error_reporting(0);

	$db = mysqli_connect(HOST, USER, PASS) or die("Unable to connect !");		
	mysqli_select_db($db,DATABASE);
	
?>
<?php
	$hostname = "localhost";
	$username = "root";
	$password = "root";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	$selected = mysql_select_db("Mini_Bizi",$dbhandle);
?>
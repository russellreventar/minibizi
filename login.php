<?php

include("functions/db.php");
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
	$username=mysqli_real_escape_string($mysqli,$_POST['username']);
	//todo implement md5
	$password=mysqli_real_escape_string($mysqli,$_POST['password']);
	$query = "SELECT UID FROM Users WHERE Username= '$username' and Password='$password'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($result->num_rows > 0) {
		$_SESSION['id']=$row['UID'];
		echo $row['UID'];
	}
	mysql_close();
}
?>
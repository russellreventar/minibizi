<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	changePassword.php
		create new password for user
*/

session_start();
require_once('../class/User.php');

//if all specified parameters are provided
if(isset($_POST['currPass']) && isset($_POST['newPass'])){
	
	//new user object
	$user = new User();
	$cPass=$_POST['currPass'];
	$nPass=$_POST['newPass'];
	
	//create new password
	$change = $user->changePassword($_SESSION['id'],$cPass,$nPass);
	
	//return success status
	if($change){
		echo 1;
	}else{
		echo 0;
	}
	
}else{
	header("Location: /minibizi/index.php");
}
?>
<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	login.php
		login the user to the system given a username
		and password
*/

session_start();
require_once('../class/User.php');

//if all specified parameters are provided
if(isset($_POST['username']) && isset($_POST['password'])){
	
	$user = new User();
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	//login user
	$login = $user->login($username,$password);
	
	//return success status
	if($login>0){
		$_SESSION['id']=$login;	
		echo $_SESSION['id'];
	}else{
		echo 0;
	}
}else{
	header("Location: /minibizi/index.php");
}
?>
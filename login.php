<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once('class/Database.php');
require_once('class/User.php');
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){

	$user = new User();
	$username=$_POST['username'];
	$password=$_POST['password'];
	//server validation here
	
	
	
	//
	
	$login = $user->login($username,$password);
	if($login>0){
		$_SESSION['id']=$login;	
		echo $_SESSION['id'];
	}else{
		echo 0;
	}
}
?>
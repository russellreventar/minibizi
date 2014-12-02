<?php
session_start();
require_once('../class/Database.php');
require_once('../class/User.php');

if(isset($_POST['username']) && isset($_POST['password'])){
	$user = new User();
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$login = $user->login($username,$password);
	if($login>0){
		$_SESSION['id']=$login;	
		echo $_SESSION['id'];
	}else{
		echo 0;
	}
}else{
	header("Location: /Mini-Bizi/index.php");
}
?>
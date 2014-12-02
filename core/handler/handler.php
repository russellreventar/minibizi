<?php
session_start();
require_once( '../class/Database.php' );
require_once( '../class/User.php' );
require_once( '../class/Business.php' );
date_default_timezone_set('EST');

if(isset($_POST['date']) && isset($_POST['sales']) &&
	isset($_POST['expenses']) && isset($_POST['tCount'])){
	
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo $business->addEntry($_POST['date'],$_POST['sales'],$_POST['expenses'],$_POST['tCount']);
}

if(isset($_POST['username']) && isset($_POST['password']) &&
	isset($_POST['email']) && isset($_POST['firstname']) &&
	isset($_POST['lastname'])){
	
	$user = new User();
	$username	=$_POST['username'];	
	$password	=$_POST['password'];
	$email		=$_POST['email'];
	$firstname	=$_POST['firstname'];
	$lastname	=$_POST['lastname'];

	
	$data = array(
		'Username' => $username,
		'Password' => $password,
		'Email' => $email,
		'FirstName' => $firstname,
		'LastName' => $lastname
	);
	
	if(!$user->exists($username)){

		$userAdded = $user->addUser($data);
		if($userAdded){
			echo 1;	
		}else{
			echo -2;	
		}
		
	}else{
		echo -1;
	}
/*
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo $business->addEntry($_POST['date'],$_POST['sales'],$_POST['expenses'],$_POST['tCount']);
*/
}


?>
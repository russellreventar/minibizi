<?php
session_start();
require_once( '../include/allClasses.php' );

if (isset($_POST['username']) && isset($_POST['password']) && 
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

}else{
	header("Location: /Mini-Bizi/index.php");
}
?>
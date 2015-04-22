<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	addUser.php
		register new user into system
*/

session_start();
require_once( '../class/User.php' );
require_once('../class/Business.php');

//if all specified parameters are provided
if (isset($_POST['username']) && isset($_POST['password']) && 
	isset($_POST['email']) && isset($_POST['firstname']) && 
	isset($_POST['lastname'])){
	
	$username	=$_POST['username'];	
	$password	=$_POST['password'];
	$email		=$_POST['email'];
	$firstname	=$_POST['firstname'];
	$lastname	=$_POST['lastname'];
	
	//build array to send off
	$data = array(
		'username' => $username,
		'password' => $password,
		'email' => $email,
		'firstName' => $firstname,
		'lastName' => $lastname
	);
	
	//create new user object
	$user = new User();	
	
	//make sure username doesnt exist
	if(!$user->usernameExists($username)){
		
		//make sure email is not already registered
		if(!$user->emailExists($email)){
		
			//add user to database
			$userAdded = $user->addUser($data);
			
			//return success status
			if($userAdded){
				echo 1;	
			}else{
				echo -3;	
			}
		}else{
			echo -2;
		}
	}else{
		echo -1;
	}

}else{
	header("Location: /minibizi/index.php");
}
?>
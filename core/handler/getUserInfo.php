<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	getUserInfo.php
		return a json object of all users data
*/
session_start();
require_once('../class/User.php');

//if logged in
if (isset($_SESSION['id'])) {

	//return user data
	$user = User::initWithID($_SESSION['id']);
	echo json_encode($user->allData);
}else{
	header("Location: /minibizi/index.php");
}
?>
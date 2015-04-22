<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	logout.php
		logout the current user
*/

session_start();

//if session exists, destroy it
if(!empty($_SESSION['id'])){
	$_SESSION['id']='';
	session_destroy();
}
header("Location: /minibizi/index.php");
?>
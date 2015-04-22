<?php

/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	getBusinessInfo.php
		return a json object of current business row
*/

session_start();
require_once('../class/Business.php');

//if user logged in
if (isset($_SESSION['id'])) {

	//create business object with logged in user
	$business = Business::initWithUserID($_SESSION['id']);
	
	//return json object of bussiness data
	echo json_encode($business->allData);
}else{
	header("Location: /minibizi/index.php");
}
?>

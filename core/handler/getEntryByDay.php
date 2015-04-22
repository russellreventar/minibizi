<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	getEntryByDay.php
		return a json object of all entries for a specific
		date
*/

session_start();
require_once('../class/Business.php');

//if logged in and all specified parameters are provided 
if (isset($_SESSION['id']) && isset($_POST['date'])) {
	$date = $_POST['date'];
	
	//create business object with logged in user
	$business = Business::initWithUserID($_SESSION['id']);
	
	//return json object of entry for specified date
	echo json_encode($business->entryByDate($date));
}else{
	header("Location: /minibizi/index.php");
}

?>
<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	getEntriesByMonthYear.php
		return a json object of all entries for a given
		month and year
*/

session_start();
require_once('../class/Business.php');

//if logged in and all specified parameters are provided 
if (isset($_SESSION['id']) && isset($_POST['month']) && isset($_POST['year'])) {
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	//create business object with logged in user
	$business = Business::initWithUserID($_SESSION['id']);
	
	//return json object of all entries for month year
	echo json_encode($business->entriesFor($month,$year));
}else{
	header("Location: /minibizi/index.php");
}

?>
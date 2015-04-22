<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	addEntry.php
		insert or update an entry into database
*/
session_start();
require_once('../class/Business.php');


//if logged in and all specified parameters are provided 
if (isset($_SESSION['id']) && isset($_POST['date']) && 
	isset($_POST['sales']) && isset($_POST['expenses']) && 
	isset($_POST['tCount'])) {
	
	$date = $_POST['date'];
	$sales = $_POST['sales'];
	$expenses = $_POST['expenses'];
	$tCount = $_POST['tCount'];

	//build array to send off to prepare
	$data = array(
		'date' => $date,
		'sales' => $sales,
		'expenses' => $expenses,
		'tCount' => $tCount
	);

	//init users business
	$business = Business::initWithUserID($_SESSION['id']);
	//add entry. return success status
	echo $business->addEntry($data);
}else{
	header("Location: /minibizi/index.php");
}
?>
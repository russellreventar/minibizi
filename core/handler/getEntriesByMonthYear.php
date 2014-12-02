<?php
session_start();
require_once( '../include/allClasses.php' );

if (isset($_SESSION['id']) && isset($_POST['month']) && isset($_POST['year'])) {
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo json_encode($business->entriesFor($month,$year));
}else{
	header("Location: /Mini-Bizi/index.php");
}

?>
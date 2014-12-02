<?php
session_start();
require_once( '../include/allClasses.php' );

if (isset($_SESSION['id']) && isset($_POST['date'])) {
	$date = $_POST['date'];
	
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo json_encode($business->entryByDate($date));
}else{
	header("Location: /Mini-Bizi/index.php");
}

?>
<?php
session_start();
require_once( '../include/allClasses.php' );

if (isset($_SESSION['id'])) {
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo json_encode($business->allData);}
else{
	header("Location: /Mini-Bizi/index.php");
}
?>

<?php
session_start();
require_once( '../include/allClasses.php' );

if (isset($_SESSION['id']) && isset($_POST['date']) && 
	isset($_POST['sales']) && isset($_POST['expenses']) && 
	isset($_POST['tCount'])) {
	
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo $business->addEntry($_POST['date'],$_POST['sales'],$_POST['expenses'],$_POST['tCount']);
else{
	header("Location: /Mini-Bizi/index.php");
}
?>
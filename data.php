<?php
ini_set('display_errors', 1);
error_reporting(~0);
session_start();
require_once( 'class/Database.php' );
require_once( 'class/User.php' );
require_once( 'class/Business.php' );

if (isset($_POST['userInfo'])) {
	$user = User::initWithID($_SESSION['id']);
	echo json_encode($user->allData);
}

if (isset($_POST['businessInfo'])) {
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo json_encode($business->allData);
}

if(isset($_POST['allEntries'])){
	$business = Business::initWithOwnerID($_SESSION['id']);
	echo json_encode($business->allEntries);
}



?>
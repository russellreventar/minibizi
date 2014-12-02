<?php
session_start();
require_once( '../include/allClasses.php' );
if (isset($_SESSION['id'])) {
	$user = User::initWithID($_SESSION['id']);
	echo json_encode($user->allData);
}else{
	header("Location: /Mini-Bizi/index.php");
}
?>
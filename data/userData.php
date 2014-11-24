<?php
header('Content-Type: application/json');
include '../functions/db.php';
session_start();
$uid=$_SESSION['id'];
$query = "SELECT * FROM Users WHERE UID= '$uid'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);			  			
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo json_encode($row);
mysql_close();
?>
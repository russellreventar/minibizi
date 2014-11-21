<?php
	$seconds = -10 + time();
	/* setcookie('user', date("F jS - g:i a"), $seconds); */
	session_start();
	session_destroy();
	header("location:index.php");
?>
<!--
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

index.php
	initial index of website
	
	- website logo
	- website tagline
	- login form
	- link-> forgot.php
	- link-> signup.php
	- website footer
-->

<?php
session_start();
if(!empty($_SESSION['id'])){header('Location: home.php');}
?>
<!DOCTYPE html>
<html>
    <?php include 'core/include/head.php';?>
    <script src="js/index.js"></script>
    <title>Mini Bizi</title>
  <body>
  	<div id = "logo">
  	  	<div class = "pulse"></div>
  		<img src = "res/images/logo2@2x.png"/>
  	</div>
  	<div id = "tagline" class = "teal-gradient-text">
  		Monitor your business
  	</div>
  	<div id = "loginPanel">
  		<div id = "card">
  			<div id = "formCon">
	  			<h1> Sign in </h1>
	  			<span id="errorMessage"></span>
	  			<form id="loginForm">
		  			<input class = "loginTextField" type = "text" id = "username" placeholder="username" name = "username"/>
		  			<input class = "loginTextField" type = "password" id = "password" placeholder="password" name = "password"/>
		  			<input class = "loginButton" type = "submit" value = "LOGIN" />
		  		</form>
		  		<div id = "forgot-signup">
			  		<a href="forgot.php">Forgot Password?</a> &nbsp&nbsp|&nbsp&nbsp
			  		<a href="signup.php">Sign-Up now</a> 
			  	</div>
  			</div>
  		</div>
  	</div>
  	<div id="hint"class="whiteLabel">username: bill &nbsp&nbsp password: pass123</div>
  	<div id = "footer">
  		MiniBizi &copy 2014 All Rights Reserved
  		<ul>
  		<li><a href = "/contact">Contact</a></li>
  		<li><a href = "/about">About</a></li>
  		<li><a href = "/help">Help</a></li>
  		</ul>
  	</div>
  </body>
</html>
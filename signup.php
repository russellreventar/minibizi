<!DOCTYPE html>
<html>
	<head>
		<?php include 'core/include/head.php';?>
		<script src="js/signup.js"></script>
	</head>
	<body>
		<div id = "logo">
  	  		<div class = "pulse"></div>
  	  		<img src = "res/images/logo2@2x.png"/>
  		</div>
  		<div id = "tagline" class = "teal-gradient-text">
  			Sign Up
  		</div>
  		<h1 id ="signupMessage"></h1>
  		<p id ="backIndex"> Click <a href="index.php">here</a> to login</p>
  		<div id="accountinfo">
 
	  		<div id = "formTitle">
  				<label>ACCOUNT</label>
	  		</div>
  			<div id = "form">
  				<form id = "signupForm">
					<div class="textboxLabel">First Name</div>
					<input id="fname" class = "textbox"type="text" name="firstname" autocomplete="off"/>
					<br/>
					<div class="textboxLabel">Last Name</div>
					<input id = "lname" class = "textbox"type="text" name="lastname" autocomplete="off"/>
					<br/>
					<div class="textboxLabel">Username</div>
					<input id = "uname"class = "textbox"type="text" name="user" autocomplete="off"/>
					<br/>
					<div class="textboxLabel">Email</div>
					<input id = "email" class = "textbox" type="text" name="email" />
					<br/>
					<div class="textboxLabel">Password </div>
					<input id = "pass" class = "textbox" type="password" name="pass" />
					<br/>
					<div class="textboxLabel">Retype Password </div>
					<input id = "passConfirm" class = "textbox" type="password" name="passConfirm" />
					<br/>
  			</div>
  		
  		
  			<div id = "formTitle">
  				<label>BUSINESS</label>
  				<label id="sub">(optional)</label>
	  		</div>
  			<div id = "form">
 
					<div class="textboxLabel">Business Name</div>
					<input class = "textbox"type="text" name="businessname" />
					<br/>
  			</div>
  		
  				<input type="submit" class="formSubmitButton"value="Signup!" />
			</form>
  		
  		
  		</div>
  		
  	  		
	</body>
</html>
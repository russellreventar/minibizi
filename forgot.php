<!DOCTYPE html>
<html>
	<head>
		<?php include 'core/include/head.php';?>
		<script src="js/forgot.js"></script>
	</head>
	<body>
		<div id = "logo">
  	  		<div class = "pulse"></div>
  	  		<img src = "res/images/logo2@2x.png"/>
  		</div>
  		<div id = "tagline" class = "teal-gradient-text">
  			Forgot Password?
  		</div>
  		<div id="accountinfo">
	  		<div id = "formTitle">
  				<label>TYPE IN VALID EMAIL</label>
	  		</div>
  			<div id = "form">
        <!-- input box for email input -->
  				<form id = "forgotForm">
					<div class="textboxLabel">Email</div>
					<input id = "email" class = "textbox" type="text" name="email" />
  			</div>
          <!-- send button for confirmation, requires a valid email address -->
  				<input type="submit" class="formSubmitButton"value="Send" />
			</form>
  		</div>
	</body>
</html>
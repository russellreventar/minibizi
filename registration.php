<?php
	include_once("functions/db_conn.php");
	include_once("functions/users.php");

	if(isset($_POST['firstname']) && 
	   isset($_POST['lastname']) && 
	   isset($_POST['user']) && 
	   isset($_POST['pass']) && 
	   isset($_POST['email'])){
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$user = $_POST['user'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		
		
		if(user_exists($user)){
			echo 'username already exists';
		}else{
			if(email_exists($email)){
				echo 'email already exists';
			}else{
				 mysql_query("INSERT INTO users (FirstName, LastName, Username, Email,Password) 
				 				VALUES ('$firstname','$lastname','$user','$email', '$pass')");
				 header("location:index.php");
			}
		}
	}
	mysql_close();
?>

<html>
	<?php include 'includes/head.php';?>
	<script src="js/registration.js"></script>
	<body>
		<div id = "logo">
  	  		<div class = "pulse"></div>
  	  		<img src = "res/images/logo2@2x.png"/>
  		</div>
  		<div id = "tagline" class = "teal-gradient-text">
  			Sign Up
  		</div>

  		<div id="accountinfo">
 
	  		<div id = "formTitle">
  				<label>ACCOUNT</label>
	  		</div>
  			<div id = "form">
  				<form id = "signupForm" action="registration.php" method="POST">
					<div class="textboxLabel">First Name</div>
					<input id="fname" class = "textbox"type="text" name="firstname" />
					<br/>
					<div class="textboxLabel">Last Name</div>
					<input id = "lname" class = "textbox"type="text" name="lastname" />
					<br/>
					<div class="textboxLabel">Username</div>
					<input id = "uname"class = "textbox"type="text" name="user" />
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
					<div class="textboxLabel">Location</div>
					<input class = "textbox"type="text" name="location" />
					<br/>
				
					
  			</div>
  		
  				<input type="submit" value="Signup!" />
			</form>
  		
  		
  		</div>
  		
  	  		
	</body>
</html>
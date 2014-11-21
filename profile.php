<?php
	include 'functions/db_conn.php';
	include 'functions/users.php';
	session_start();
	if (!logged_in()) {
		//invalid access
    	header("location:index.php");
	} 
	$user_data = getUserData($_SESSION['id'],'Username', 'Password' , 'Active', 'Email');
	echo 'Logged In!' . 'Welcome ' . $user_data['Username'];
	mysql_close();
?>
<!DOCTYPE html>
<html>
  <?php include 'includes/head.php';?>
  <body>
	  <div id = "sidebar">
	  	<div class = "companyCon">
	  		<div class = "ovalImage">
	  		</div>
	  		<div class = "companyTitle">
	  			<h1> Lady Christines Baby Back Ribs</h1>
	  			<h2> Sm City, Lipa <h2>
	  		</div>
	  	</div>
	  	<div class = "companyCon2">
	  	</div>
	  	
	  </div>
	  	
	  <div id = "main">
	  	<div id = "header"> 
	  		<a href = "logout.php">logout</a>
	  	</div>
	  	<div id = "content"> 
	  		<div id = "graphCon">
	  		</div>
	  		<div id = "tableCon">
	  			<table id = "dailySales">
	  				<thead>
	  				<tr>
	  					<th>SURPLUS</th>
	  					<th>DATE</th>
	  					<th>Paid</th>
	  					<th>Paid</th>
	  				</tr>
	  				</thead>
	  				<tbody>
	  				<tr>
	  					<td>+</td>
	  					<td>October 23, 2014</td>
	  					<td>$23,304</td>
	  					<td></td>
	  				</tr>
	  				<tr>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  				</tr>
	  				<tr>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  				</tr>
	  				<tr>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  				</tr>
	  				<tr>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  				</tr>
	  				<tr>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  				</tr>
	  				<tr>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  				</tr>
	  				<tr>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  					<td></td>
	  				</tr>
	  				</tbody>
	  			</table>
	  		</div>
	  		
	  	</div>
	  	</div>
  	</div>
  </body>
</html>

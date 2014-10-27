<?php
	include_once("functions/db_conn.php");

	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$query = mysql_query("SELECT * FROM users WHERE Username='$user'");
		if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
			echo "Username already exists!";
		}else{
			mysql_query("INSERT INTO users (Username, Password) VALUES ('$user', '$pass')");
			header("location:index.php");
		}
	}
	mysql_close();
?>

<html>
	<body>
		<h1>Register!</h1>
			<form action="registration.php" method="POST">
				Username:<input type="text" name="user" />
				Password:<input type="password" name="pass" />
				<br />
				<input type="submit" value="Signup!" />
			</form>
	</body>
</html>
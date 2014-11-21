<?php
function getUserData($UID){
	$data = array();
	$UID = (int)$UID;
	$args = func_get_args();
	
	if(func_num_args() > 1){
		unset($args[0]);
		$fields = '`' . implode('`, `', $args) . '`';
		$data = mysql_fetch_assoc( 
					mysql_query("SELECT $fields 
								FROM users
								WHERE UID = $UID"));
		return $data;
	}
}

function email_exists($email){
	$result = mysql_query(" SELECT *
			  				FROM users 
			  				WHERE Email= '$email'");
	return (mysql_num_rows($result) >= 1) ? true : false;

}
function user_exists($username){
	$result = mysql_query(" SELECT *
			  				FROM users 
			  				WHERE Username= '$username'");
	return (mysql_num_rows($result) >= 1) ? true : false;
}

function user_active($username){
	$result = mysql_query(" SELECT *
			  				FROM users 
			  				WHERE Username = '$username' and
			  					  Active   =  1");
	return (mysql_num_rows($result) >= 1) ? true : false;
}

function getUserId($username){
	return mysql_result(mysql_query("SELECT UID
									 FROM users
									 WHERE Username = '$username'"),0,'UID');
}

function login($username,$password){
	$UID = getUserId($username);
	
	//encrypt password
	
	$result = mysql_query(" SELECT * 
			  				FROM users 
			  				WHERE Username = '$username' and 
			  				Password = '$password'");
	return ( mysql_num_rows($result) == 1)? $UID: false;	
}

function logged_in(){
	return ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true) ? true : false;
}

?>
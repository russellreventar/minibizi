<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	encryption.php
		encryption functions
*/
if(isset($accesscryp) && $accesscryp){
	function encrypt($str){
		$str = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5('bamboo'),$str,MCRYPT_MODE_ECB)));
		return $str;
	}
	function decrypt($str){
		$str = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5('bamboo'),base64_decode($str),MCRYPT_MODE_ECB));
		return $str;
	}
	function hashword($str){
		$str = crypt($str,'$1$' .  md5('bamboo') . '$');
		return $str;
	}
}else{
	header("HTTP/1.1 403 Forbidden");
	exit;
}

?>
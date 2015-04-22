<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	User.php
		user object for handling user related queries 
		to the database
*/

$accesscryp = true; //allow access to encryption
require_once( '../include/encryption.php' );
include_once('Database.php');

class User{

	public $allData; 	//array of all user data
	private $db;		//database connection
	
	public function __construct(){
		$this->db = new Database();	
	}
	
	/*	construct::initWithID
			initialize object with a provided userID
	*/
	public static function initWithID($uid){
		$instance = new self();
		$instance->loadByID($uid);
		return $instance;
	}
	
	/*	construct::initNewUser
			initialize object with a new user
	*/
	public static function initNewUser($data){
		$instance = new self();
		return $instance;
	}
	
	/*	loadByID
			given an id. Checks to see if that id
			already exists	
	*/
	protected function loadByID($id){
		$this->db->query('SELECT * FROM users WHERE UserID = :uid');
		$this->db->bind(':uid', $id);
		$this->db->execute();
		$this->allData = $this->db->getRow();	
	}
	
	/*	login
			given a username and password. Checks
			to see if user credentials are valid
	*/
	public function login($username, $password){
				
		$this->db->query('SELECT * FROM users WHERE Username = :uname AND Password = :pass');
		$this->db->bind(':uname', $username);
		$this->db->bind(':pass', hashword($password));
		$this->db->execute();
		if($this->db->numRow() > 0){
			$row = $this->db->getRow();
			return $row['UserID'];
		}else{
			return 0;
		}
	}
	
	/*	usernameExists
			given a username. Checks to see if that user
			already exists	
	*/
	public function usernameExists($username){
		$this->db->query('SELECT * FROM users WHERE Username = :uname');
		$this->db->bind(':uname', $username);
		$this->db->execute();
		if($this->db->numRow()>0){
			return true;
		}else{
			return false;
		}
	}
	
	/*	emailExists
			given an email. Checks to see if that email
			already exists	
	*/
	public function emailExists($email){
		$this->db->query('SELECT * FROM users WHERE Email = :email');
		$this->db->bind(':email', $email);
		$this->db->execute();
		if($this->db->numRow()>0){
			return true;
		}else{
			return false;
		}
	}
	
	/*	addUser
			given an array of data. inserts new row into users table
	*/
	public function addUser(array $data){

		$this->db->query('INSERT INTO users (Username, Password, Email, FirstName, LastName) VALUES (:uname, :pass, :email, :fname, :lname)');
		$this->db->bind(':uname', $data['username']);
		$this->db->bind(':pass', hashword($data['password']));
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':fname', $data['firstName']);
		$this->db->bind(':lname', $data['lastName']);
		$this->db->execute();
		if($this->db->lastInsertId() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/*	changePassword
			checks is old password is correct with userid.
			if so, updates new password
	*/
	public function changePassword($uid, $currPass, $newPass){
		$this->db->query('SELECT * FROM users WHERE UserID = :uid AND Password = :pass');
		$this->db->bind(':uid', $uid);
		$this->db->bind(':pass', hashword($currPass));
		$this->db->execute();
		
		if($this->db->numRow() > 0){
		
			$this->db->query('UPDATE users SET Password = :pass WHERE UserID = :uid');
			$this->db->bind(':pass', hashword($newPass));
			$this->db->bind(':uid', $uid);
			$this->db->execute();
			
			return true;
		}else{
			return false;
		}

	}
	public function __destruct(){
		$this->destroy();
	}
	
	private function destroy(){
	}

}
?>
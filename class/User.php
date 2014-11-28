<?php
class User{
	public $username;
	public $password;
	public $email;
	public $firstname;
	public $lastname;
	public $allData; //array of all user data
	private $db;
	
	public function __construct(){
		$this->username = NULL;
		$this->password = NULL;
		$this->email = NULL;
		$this->firstname = NULL;
		$this->lastname = NULL;
		$this->db = new Database();	
	}
	public function destroy(){
		$this->db->disconnect();
	}

	public static function initWithID($uid){
		$instance = new self();
		$instance->loadByID($uid);
		return $instance;
	}
	public static function initNewUser($data){
		$instance = new self();
		$instance->addUser($data);
		return $instance;

	}
	public function login($username, $password){
		
		$this->db->filter( $username );
		$this->db->filter( $password );
		
		$query = "SELECT UserID FROM Users WHERE Username= '$username' and Password='$password'";
		if($this->db->num_rows($query)>0){
			$row = $this->db->getRow( $query );
			return $row['UserID'];
		}else{
			return 0;
		}
	}
	protected function loadByID($id){
		$this->db->filter( $id );
		$query = "SELECT * FROM Users WHERE UserID= '$id'";	
		$this->allData = $this->db->getRow( $query );	
    	/* $this->fill($row); */

	}
	
	protected function addUser($data){
		//insert into table
	}
	
	protected function fill(array $row){
		$this->username = $row["Username"];
		$this->password = $row["Password"];
		$this->email = $row["Email"];
		$this->firstname = $row["FirstName"];
		$this->lastname = $row["LastName"];

	}
	
	public function newUser(){
		
	}

}
?>
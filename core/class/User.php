<?php
class User{

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
	
	public function exists($username){
		$this->db->filter( $username );
		$query = "SELECT * FROM Users WHERE Username= '$username'";
		if($this->db->num_rows($query)>0){
			return true;
		}else{
			return false;
		}
	}
	
	protected function loadByID($id){
		$this->db->filter( $id );
		$query = "SELECT * FROM Users WHERE UserID= '$id'";	
		$this->allData = $this->db->getRow( $query );	
	}
	
	public function addUser(array $data){
		$this->db->filter($data);
		return $this->db->insert( 'Users', $data ); 
	}
	
	protected function __destruct(){
		$this->destroy();
	}
	
	protected function destroy(){
		$this->db->disconnect();
	}

}
?>
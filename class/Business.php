<?php
ini_set('display_errors', 1);
error_reporting(~0);

class Business
{
	public $allData; //array of all business data
	public $allEntries;
	private $db;
	
	public function __construct(){
		$this->allData = NULL;
		$this->db = new Database();	
	}
	public function destroy(){
		$this->db->disconnect();
	}

	public static function initWithID($bid){
		$instance = new self();
		$instance->loadByID($bid);
		return $instance;
	}
	public static function initWithOwnerID($uid){
		$instance = new self();
		$instance->loadByUserID($uid);
		return $instance;
	}
	public static function initNewBusiness($data){
		$instance = new self();
		$instance->addUser($data);
		return $instance;

	}
	protected function loadByID($bid){
		$this->db->filter( $uid );
		$query = "SELECT * FROM Businesses WHERE BusinessID= '$bid' LIMIT 1";
		$this->allData = $this->db->getRow( $query );

	}
	protected function loadByUserID($uid){
	
		$this->db->filter( $uid );
		$query = "SELECT * FROM Businesses WHERE UserID= '$uid' LIMIT 1";	
		$this->allData = $this->db->getRow( $query );

		$bid = $this->allData['BusinessID'];
		$query = "SELECT * FROM Journals WHERE BusinessID = '$bid'";
		$this->allEntries = $this->db->getResults( $query );
		
	}
	

	
	protected function fill(array $row){

	}
	
	public function getEntriesByMonth($month){
		$entries;
		
	}
	public function getEntriesForYear($year){
		
	}

}
?>
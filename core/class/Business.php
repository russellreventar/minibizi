<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	Business.php
		business object for handling business related queries 
		to the database
*/
include_once('Database.php');

class Business{

	public $allData; 	//array of all business info
	public $allEntries; //array of all business entries
	private $db;		//database connection
	
	/*	construct
			object constructor
			allocate variables
			create new database connection
	*/
	public function __construct(){
		$this->allData = NULL;
		$this->allEntries = NULL;
		$this->db = new Database();	
	}
	
	/*	construct::initWithID
			initialize object with a provided businessID
	*/
	public static function initWithID($bid){
		$instance = new self();
		$instance->loadByID($bid);
		return $instance;
	}
	
	/*	construct::initWithUserID
			initialize object with the users ID
	*/
	public static function initWithUserID($uid){
		$instance = new self();
		$instance->loadByUserID($uid);
		return $instance;
	}
	
	/*	construct::initNewBusiness
			initialize object with new business
	*/
	public static function initNewBusiness($data){
		$instance = new self();
		$instance->addBusiness($data);
		return $instance;

	}
	
	/*	loadByID
			retrieve business information and all business
			entries with the provided businessID
	*/
	protected function loadByID($bid){
		$this->db->query('SELECT * FROM businesses WHERE BusinessID = :bid');
		$this->db->bind(':bid', $bid);
		$this->db->execute();
		$this->allData = $this->db->getRow();

		$this->db->query('SELECT * FROM journals WHERE BusinessID = :bid');
		$this->db->bind(':bid', $bid);
		$this->db->execute();
		$this->allEntries = $this->db->getRow();	
	}
	
	/*	loadByUserID
			retrieve business information and all business
			entries with the provided userID
	*/
	protected function loadByUserID($uid){
		$this->db->query('SELECT * FROM businesses WHERE UserID = :uid');
		$this->db->bind(':uid', $uid);
		$this->db->execute();
		$this->allData = $this->db->getRow();	
		// echo $this->allData['BusinessName'];

		$bid = $this->allData['BusinessID'];
		$this->db->query('SELECT * FROM journals WHERE BusinessID = :bid');
		$this->db->bind(':bid', $bid);
		$this->db->execute();
		$this->allEntries = $this->db->getRow();
		
	}
	
	/*	entriesFor
			expects a month and year to retrieve all
			entries made in that month
	*/
	public function entriesFor($month,$year){
		$bid = $this->allData['BusinessID'];	
		$this->db->query('SELECT * FROM journals WHERE BusinessID = :bid AND YEAR(Date) =:year AND MONTH(Date)=:month');
		$this->db->bind(':bid', $bid);
		$this->db->bind(':month', $month);
		$this->db->bind(':year', $year);
		$this->db->execute();	
		return $this->db->getResults();
	}
	
	/*	addEntry
			expects an array of values to insert into the journal of
			entries table. if entry already exists, values are updated
			if not, a new row inserted with businessID 
	*/
	public function addEntry(array $data){

		$time = date("H:i:s", strtotime("now"));
		$bid = $this->allData['BusinessID'];
		$uid = $this->allData['UserID'];
		
		//update only
		if($this->entryExists($data['date'])){
			$entry = $this->entryByDate($data['date']);
			$this->db->query('UPDATE journals SET Time = :time, NetSales = :sales, Expenses = :expenses, TransactionCount = :tc WHERE JournalID = :jid');
			$this->db->bind(':time', $time);
			$this->db->bind(':sales', $data['sales']);
			$this->db->bind(':expenses', $data['expenses']);
			$this->db->bind(':tc', $data['tCount']);
			$this->db->bind(':jid', $entry['JournalID']);
			$this->db->execute();
			return 2;
		//insert new row
		}else{
			$this->db->query('INSERT INTO journals (BusinessID, UserID, Date, Time,NetSales, Expenses,TransactionCount) VALUES (:bid,:uid,:date,:time,:sales,:exp,:tc)');
			$this->db->bind(':bid', $bid);
			$this->db->bind(':uid', $uid);
			$this->db->bind(':date', $data['date']);
			$this->db->bind(':time', $time);
			$this->db->bind(':sales', $data['sales']);
			$this->db->bind(':exp', $data['expenses']);
			$this->db->bind(':tc', $data['tCount']);
			$this->db->execute();
			return 1;
		}
	}
	
	/*	entryByDate
			expects a date and will retrieve the entry made on that date
	*/
	public function entryByDate($date){
		$bid = $this->allData['BusinessID'];	
		$this->db->query('SELECT * FROM journals WHERE BusinessID = :bid AND Date =:date');
		$this->db->bind(':bid', $bid);
		$this->db->bind(':date', $date);
		$this->db->execute();
		return $this->db->getRow();
	}
	
	/*	entryByDate
			expects a date and will determine if an entry exists
	*/
	public function entryExists($date){
		$bid = $this->allData['BusinessID'];	
		$this->db->query('SELECT * FROM journals WHERE BusinessID = :bid AND Date =:date');
		$this->db->bind(':bid', $bid);
		$this->db->bind(':date', $date);
		$this->db->execute();
		if($this->db->numRow() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function addBusiness($data){
		
	}
	public function __destruct(){
		$this->destroy();
	}
	
	private function destroy(){
	}
}
?>
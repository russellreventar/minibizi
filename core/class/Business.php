<?php
class Business{

	public $allData; //array of all business data
	public $allEntries;
	private $db;
	
	public function __construct(){
		$this->allData = NULL;
		$this->db = new Database();	
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
	
	public function entriesFor($month,$year){
		$this->db->filter($month);
		$this->db->filter($year);
		$bid = $this->allData['BusinessID'];
		$query = "SELECT * FROM Journals WHERE BusinessID = '$bid' AND YEAR(Date) = '$year' AND MONTH(Date) = '$month'";	
		return $this->db->getResults($query);
	}
	
	public function addEntry($date,$sales,$expenses,$tCount){

		$this->db->filter($date);
		$this->db->filter($sales);
		$this->db->filter($expenses);
		$this->db->filter($tCount);
		
		$time = date("H:i:s", strtotime("now"));
		$bid = $this->allData['BusinessID'];
		$uid = $this->allData['UserID'];

		//check if entry already made for date
		$query = "SELECT * FROM Journals WHERE BusinessID= '$bid' AND Date='$date' LIMIT 1";	
		$row = $this->db->getRow( $query );
		$entryID = $row['JournalID'];

		if($entryID>0){
			$updates = array(
				'Time' => $time,
				'NetSales' => $sales, 
				'Expenses' => $expenses,
				'TransactionCount' => $tCount
			);
			$where = array(
				'JournalID' => $entryID
			);
			$updated = $this->db->update( 'Journals', $updates, $where, 1 );
			if( $updated ) return 1;
			else return 0;
		}else{
			$inserts = array(
				'BusinessID' => $bid,
				'UserID' =>  1,
				'Date' => $date,
				'Time' => $time,
				'NetSales' => $sales,
				'Expenses' => $expenses,
				'TransactionCount' => $tCount
			);
			$addJournal = $this->db->insert( 'Journals', $inserts ); 
			if( $addJournal ) return 1;
			else return 0;
		}
	}
	
	public function entryByDate($date){
		$this->db->filter($date);
		$bid = $this->allData['BusinessID'];
		$query = "SELECT * FROM Journals WHERE BusinessID= '$bid' AND Date='$date' LIMIT 1";	
		return $this->db->getRow( $query );
	}
	
	protected function __destruct(){
		$this->destroy();
	}
	
	protected function destroy(){
		$this->db->disconnect();
	}
}
?>
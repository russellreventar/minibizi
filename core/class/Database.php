<?php
/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	Database.php
		database class for handling all database
		functionality and querying using PDO
*/

include_once('../../config.php');

class Database{

	public $errors;
	private $statement;
    private $pdo;

	public function __construct(){
		$errors = null;
        $options = array(
            PDO::ATTR_PERSISTENT=> true,
            PDO::ATTR_ERRMODE  	=> PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS,$options);
        }catch(PDOException $e){
            $this->errorLog($e->getMessage());
        }
	}

	public function errorLog($error){
		$this->errors .= $error;
	}

	public function query($query){
		try{
    		$this->statement = $this->pdo->prepare($query);
    	}catch(PDOException $e){
    		$this->errorLog($e->getMessage());
		}
	}

	public function bind($param, $value, $type = null){
    	if (is_null($type)) {
        	switch (true) {
            	case is_int($value):
                	$type = PDO::PARAM_INT;
                	break;
            	case is_bool($value):
                	$type = PDO::PARAM_BOOL;
                	break;
            	case is_null($value):
                	$type = PDO::PARAM_NULL;
                	break;
            	default:
                	$type = PDO::PARAM_STR;
        	}
    	}
    	try{
    		$this->statement->bindValue($param, $value, $type);
    	}catch(PDOException $e){
    		$this->errorLog($e->getMessage());
		}
	}

	public function execute(){
		try{
    		return $this->statement->execute();
    	}catch(PDOException $e){
    		$this->errorLog($e->getMessage());
		}
	}

	public function getResults(){
    	try{
    		return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    	}catch(PDOException $e){
    		$this->errorLog($e->getMessage());
		}
	}

	public function getRow(){
		try{
    		return $this->statement->fetch(PDO::FETCH_ASSOC);
    	}catch(PDOException $e){
    		$this->errorLog($e->getMessage());
		}
	}

	public function numRow(){
		try{
    		return $this->statement->rowCount();
    	}catch(PDOException $e){
    		$this->errorLog($e->getMessage());
		}
	}

	public function lastInsertId(){
    	return $this->pdo->lastInsertId();
	}

	public function beginTransaction(){
    	return $this->pdo->beginTransaction();
	}
	
	public function endTransaction(){
    	return $this->pdo->commit();
	}
	
	public function cancelTransaction(){
    	return $this->pdo->rollBack();
	}
	
	public function dumpParams(){
    	return $this->statement->debugDumpParams();
	}

    public function __destruct(){
        $this->pdo = null;
    }
}

?>
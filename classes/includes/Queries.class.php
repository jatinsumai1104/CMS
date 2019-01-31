<?php 

class Queries{
	
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	//getPost() : returns the fetched data from the db
	public function readData($table = 'post', $column = 1, $condition = 1){
		
		$query = "Select * from {$table} where {$column} = {$condition}";
		
		return $this->execteQuery($query);
	}
	
	public function execteQuery($query = "Select * from post"){
		$result = $this->conn->prepare($query);
		$result->execute();
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
}

?>
<?php 

include_once('includes/Queries.class.php');

class Categories extends Queries{
	
	private $table = "categories";
	private $conn;
	
	public function __construct($conn){
		parent::__construct($conn);
		$this->conn = $conn;
	}
	
	public function readAllCategories(){
		return parent::readData($this->table);
	}
}

?>
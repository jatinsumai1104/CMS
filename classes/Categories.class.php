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
	
	public function createCategory($data){
//		return parent::
	}
	public function getCategoryById($category_id){
		$res = parent::readData($this->table, "category_id = $category_id");
		return $res[0];
	}
}

?>
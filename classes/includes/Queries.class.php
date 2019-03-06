<?php 

class Queries{
	
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	//getPost() : returns the fetched data from the db
	//$table is used for table name
	public function readData($table = 'post',$wheres = 1, $start=0, $end=0){
		$query = "Select * from {$table} where $wheres";
		if($table == 'post'){
			$query .= " and is_deleted = 0";
		}
		if($start > 0 || $end > 0){
			$query .= " LIMIT $start, $end";
		}
		return $this->execteQuery($query);
	}
	
	public function execteQuery($query = "Select * from post"){
		$result = $this->conn->prepare($query);
		$result->execute();
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function addData($table, $data){
		$columnString = implode(", ", array_keys($data));
		$valueString = " :".implode(", :", array_keys($data));
		
		$sql = "insert into {$table} ({$columnString}) values ({$valueString})";
		
		$ps = $this->conn->prepare($sql);
		$result = $ps->execute($data);
		if($result){
			return $this->conn->lastInsertId();
		}else{
			return false;
		}
	}
	/*
	returns number of rowsaffected else return false
	$condition should be a string of conditions
	*/
	public function updateData($table, $data, $condition=1){
		$i = 0;
		$columnValueSet = "";
		foreach($data as $key=>$value){
			$comma = ($i<count($data)-1 ? ", " : "");
			$columnValueSet .= $key. "='".$value."'".$comma;
			$i++;
		}
		$sql = "update $table set $columnValueSet where $condition";
		echo $sql;
		$this->execteQuery($sql);
	}
	
	public function deleteData($table, $condition){
		$sql = "update $table set is_deleted = 1 where $condition";
		$this->execteQuery($sql);
	}
}

?>
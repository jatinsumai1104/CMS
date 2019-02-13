<?php 

include_once('includes/Queries.class.php');

class Authentication extends Queries{
	private $conn = null;
	private $table = "user";
	
	function __construct($conn){
		parent::__construct($conn);
	}
	
	public function login($username, $password){
		$result = parent::readData($this->table, 'username', $username);
		if(password_verify($password, $result[0]['password'])){
			Session::startSession($result[0]['user_id']);
			Helper::redirect("admin");
			return true;
		}else{
			return false;
		}
	}
	
	function logout(){
		Session::destroySession();
	}
}

?>

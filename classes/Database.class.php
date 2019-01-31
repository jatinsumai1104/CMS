<?php 
//include_once(BASEURL."classes/includes/Connection.class.php");
class Database{
	private $conn;
	private $host = "localhost";
	private $user = "Jatin Sumai";
	private $password = "jatin@99";
	private $dbname = "cms_degree";

    /**
     * Database constructor.
     */
    public function __construct(){
		try{
			$dsn = "mysql:host=$this->host;dbname=$this->dbname";

			//create an object of pdo(PHP Data Object)

			$this->conn = new PDO($dsn, $this->user, $this->password);
		}catch(PDOException $e){
			echo "Issue : " . $e->getMessage();
		}
	}
	public  function  getConnection(){
        return $this->conn;
    }
}

?>
<?php 
	 $conn;
	 $host = "localhost";
	 $user = "Jatin Sumai";
	 $password = "jatin@99";
	 $dbname = "test";

	$dsn = "mysql:host=$host;dbname=$dbname";

	//create an object of pdo(PHP Data Object)

	$conn = new PDO($dsn, $user, $password);

	$sql = "insert into tp (name, email, phonenumber) values ('Nikhil Ghind', 'nikhil@gmail.com', '7021197094')";
		
	$conn->query($sql);
	
//	$result = $ps->execute($data);

?>
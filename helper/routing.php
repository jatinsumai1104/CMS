<?php 

include_once("../includes/constants.php");
spl_autoload_register(function($class_name){
	include "../classes/".$class_name.'.class.php';
});
if(isset($_REQUEST['login'])){
	//you pressed login button
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$db = new Database();
	$conn = $db->getConnection();
	$auth = new Authentication($conn);
	echo $auth->login($username, $password);
	
}
if(isset($_REQUEST['logout'])){
	//you pressed logout button
	$db = new Databse();
	$conn = $db->getConnection();
	$auth = new Authentication($conn);
	$auth->logout();
}

?>
<?php 

include_once("classes/Database.class.php");
include_once("classes/Posts.class.php");
include_once("classes/Session.class.php");
include_once("classes/Authentication.class.php");


$db = new Database();
$conn = $db->getConnection();
$auth = new Authentication($conn);
$auth->logout();


?>
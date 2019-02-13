<?php 

include_once("classes/Database.class.php");
include_once("classes/Posts.class.php");
$db = new Database();
$conn = $db->getConnection();
$post = new Authentication($conn);
$array = array("post_category_id"=>10, "post_title"=>"some New Post Title", "post_body"=>"<b>Some Body</b>");
echo $post->updatePost($array);


?>
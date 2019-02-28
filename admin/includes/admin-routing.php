<?php
include_once ("../../includes/constants.php");	
spl_autoload_register(function ($class_name) {
	include_once("../../classes/".$class_name . '.class.php');
});
$db = new Database();
$conn = $db->getConnection();
$post = new Posts($conn);	
$auth = new Authentication($conn);
	if(isset($_REQUEST['publish_post'])){
		$keys = array("post_category_id", "post_title", "post_body", "post_tags", "post_status");
		
		$date = date('Y-m-d');
		if(isset($_SESSION['user_id'])){
			$post_author_id = $_SESSION['user_id'];
		}else{
			die("How did u came here????");
		}
		
		$data = array();
		foreach($keys as $key){
			$data += array($key=>$_POST[$key]);
		}
		$img = explode(".", $_FILES['post_image']['name']);
		$extension = ".".$img[1];
		$_FILES['post_image']['name'];
		$data += array("post_image_extension"=>$extension);
		$data += array("post_author_id"=>$post_author_id);
		$data += array("post_date"=> $date);
		$last_insert_id = $post->createPost($data);
		if($last_insert_id){
			//Now Upload Image
			$tmpName = $_FILES['post_image']['tmp_name'];
			if(!move_uploaded_file($tmpName , "../../images/".$last_insert_id."".$extension))
				die("Error While Uploading Image");
			header("Location: ".BASEURL."admin/posts/managePost");
		}else{
			die("Error While Inserting Post!");
		}

	}if(isset($_REQUEST['deleteBtn'])){
		$db = new Database();
		$conn = $db->getConnection();
		$post = new Posts($conn);	
		include_once ("../../../includes/constants.php");	
		spl_autoload_register(function ($class_name) {
			include_once("../../../classes/".$class_name . '.class.php');
		});
		$post_id = $_REQUEST['post_id'];
		echo $post_id;
	}if(isset($_REQUEST['logout'])){
		$auth->logout();
		header("Location: ".BASEURL);
	}else{
		echo "Some Issue!!";
	}
?>

<?php 

include_once('includes/Queries.class.php');

class Posts extends Queries{
	
	private $table = "post";
	
	public function __construct($conn){
		parent::__construct($conn);
	}
	
	public function readAllPosts(){
		return parent::readData($this->table);
	}
	
	//get a specific post whose post_id is given id
	public function readPostByPostId($post_id){
		$row = parent::readData($this->table, 'post_id = '.$post_id);
		return $row[0];
	}
	
	public function readAllPostsOfCategory($category_id){
		return parent::readData($this->table, 'post_category_id = '.$category_id);
	}
	
	public function createPost($data){
		return parent::addData($this->table, $data);
	}
	
	public function updatePost($data){
		return parent::updateData($this->table, $data);
	}
	
	public function readAllPostsBySearch($keywords){
		$query = "SELECT post.post_id, post.post_author_id, post.post_category_id, post.post_title, post.post_body, post.post_tags, post.post_image_extension, post.post_date, post.post_status, post.post_status, post.created_at, post.updated_at, CONCAT(member.member_first_name, CONCAT(\" \", member.member_last_name)) as post_author FROM post, member WHERE (post.post_author_id = member.member_id) and (member.member_first_name like '%{$keywords}%' or member.member_first_name like '%{$keywords}%' or post.post_tags like '%{$keywords}%' or post.post_title like '%{$keywords}%' or post.post_body like '%{$keywords}%' or CONCAT(member.member_first_name, CONCAT(\" \", member.member_last_name)) like '%{$keywords}%') and post.is_deleted = 0";
		
		return parent::execteQuery($query);
	}
	
	public function readAllPostsByTag($tag){
		$query = "SELECT post.post_id, post.post_author_id, post.post_category_id, post.post_title, post.post_body, post.post_tags, post.post_image_extension, post.post_date, post.post_status, post.post_status, post.created_at, post.updated_at, CONCAT(member.member_first_name, CONCAT(\" \", member.member_last_name)) as post_author FROM post, member WHERE (post.post_author_id = member.member_id) and (post.post_tags like '%{$tag}%') and post.is_deleted = 0";
		
		return parent::execteQuery($query);
	}
	
	public function readAllPostsOfAuthor($post_author_id, $start=0, $end=0){
		return parent::readData($this->table, 'post_author_id = '.$post_author_id, $start, $end);
	}
	
	public function getAuthorName($post_author_id){
		$sql = "Select CONCAT(member_first_name, member_last_name) as author_name from member where member_id = {$post_author_id}";
		$result = parent::execteQuery($sql);
		return $result[0]['author_name'];
	}
	
	public function setPostAsPublished($post_id){
		$data = array("post_status"=>"published");
		return parent::updateData($this->table, $data, "post_id = ".$post_id);
	}
	
	public function setPostAsDraft($post_id){
		$data = array("post_status"=>"draft");
		return parent::updateData($this->table, $data, "post_id = ".$post_id);
	}
	public function deletePost($post_id){
		parent::deleteData($this->table, "post_id = ".$post_id);
	}
}

?>
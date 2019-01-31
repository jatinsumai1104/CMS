<div class="col-md-8">
	
	<!-- Blog Post -->
	
	<?php 
	require_once("classes/Database.class.php");
	require_once("classes/Posts.class.php");
	$db = new Database();
	$connection = $db->getConnection();
	$post = new Posts($connection);
	if(isset($_REQUEST['category_id'])){
		$result = $post->readAllPostsOfCategory($_REQUEST['category_id']);
	}else if(isset($_REQUEST['author_id'])){
		$result = $post->readAllPostsOfAuthor($_REQUEST['author_id']);
	}else if(isset($_REQUEST['search'])){
		$result = $post->readAllPostsBySearch($_REQUEST['keywords']);
	}else if(isset($_REQUEST['tag'])){
		$result = $post->readAllPostsByTag($_REQUEST['tag']);
	}else{
		$result = $post->readAllPosts();	
	}
	
	if(count($result) != 0){
		echo<<<HEAD
		<h1 class="my-4">Posts</h1>
HEAD;
		for($i = 0; $i < count($result); $i++){
	?>
	
	<div class="card mb-4">
		<img class="card-img-top img-fluid" src="<?php echo POSTIMAGES."".$result[$i]['post_id']."".$result[$i]['post_image_extension'];?>" alt="<?php echo $result[$i]['post_title'];?>">
		<div class="card-body">
			<h2 class="card-title"><?php echo $result[$i]['post_title']; ?></h2>
			<p class="card-text"><?php
				$post_body = $result[$i]['post_body']; 
				echo substr($post_body, 0, strrpos(substr($post_body, 0, 300), " "))."...";	
			?></p>
			<a href="<?php echo BASEURL."post/".$result[$i]['post_id'];?>" class="btn btn-primary">Read More &rarr;</a>
			<?php 
				$tag = explode(",", $result[$i]['post_tags']);
				$URL = BASEURL;
				for($j = 0; $j < count($tag); $j++){
					$tag[$j] = trim($tag[$j]);
					echo<<<TAG
<a href="{$URL}tags/{$tag[$j]}" class="btn btn-primary float-right mr-sm-1">{$tag[$j]}</a>
TAG;
				}
			?>
		</div>
		<div class="card-footer text-muted">
			Posted on <?php echo $result[$i]['post_date']; ?> by
			<a href="<?php echo BASEURL."author/{$result[$i]['post_author_id']}"?>"><?php echo $post->getAuthorName($result[$i]['post_author_id']); ?></a>
		</div>
	</div>
	<?php }
	}else{
		$URL = BASEURL;
		echo<<<NOPOST
<br><br><h1 class="my-4">No Post Available For Releated Topic!</h1><img class="card-img-top img-fluid" src="{$URL}images/nopost.jpg" alt="No Posts Exists Related to This Topic!!">
NOPOST;
	} ?>
	<!-- Pagination -->
	<?php if(count($result) != 0){?>
	<ul class="pagination justify-content-center mb-4">
		<li class="page-item">
			<a class="page-link" href="#">&larr; Older</a>
		</li>
		<li class="page-item <?php if(count($result) <= 3){echo disabled;}?>">
			<a class="page-link" href="#">Newer &rarr;</a>
		</li>
	</ul>
	<?php } ?>
</div>

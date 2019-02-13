<form action="../edit_posts/insert" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<div class="form-row">
			<div class="col-md-6">
				<div class="form-label-group">
					<select class="custom-select custom-select-lg" name="post_category_id" id="inlineFormCustomSelect">
						<option selected>Choose...</option>
						<?php
        require_once("includes/admin-bootstrap.php");
                            $db = new Database();
                            $conn = $db->getConnection();
                            $category  = new Categories($conn);
                            $result = $category->readAllCategories();
                            for($i=0;$i<count($result);$i++){?>
						<option value="<?php echo $result[$i]['category_id'];?>">
							<?php echo $result[$i]['category_name'];?>
						</option>
						<?php
								}
							?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-label-group">
					<input type="text" name="post_title" id="post_title" class="form-control" placeholder="Post Title" required="required">
					<label for="post_title">Post Title</label>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group m">
		<div class="form-row">
			<div class="col-md-6">
				<div class="form-label-group">
					<input type="text" id="post_tags" name="post_tags" class="form-control" placeholder="Password">
					<label for="post_tags">Post Tags</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-label-group">
					<select class="custom-select custom-select-lg" name="post_status" id="inlineFormCustomSelect">
						<option selected>Choose...</option>
						<option value="published">Published</option>
						<option value="draft">Draft</option>
					</select>
				</div>
			</div>
			<br><br><br>
			<div class="col-md-12">
				<div class="form-label-group">
					<input type="file" id="post_image" name="post_image" class="form-control" placeholder="Post Image">
					<label for="post_image">Post Image</label>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="form-label-group">
			<textarea name="post_body" id="" cols="30" rows="10"></textarea>
		</div>
	</div>
	<button type="submit" name="publish_post" class="btn btn-primary btn-block">Submit</button>
</form>

<?php 
Session::start_session();
//$_SESSION['user_id'] = 1;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand text-center" href="<?php echo BASEURL;?>" style="width:100px;"><img src="<?php echo BASEURL;?>images/logo.png" alt="Logo" width="30px"/> Blog</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<?php if(isset($_SESSION['user_id'])){?>
				<li class="nav-item active">
					<a class="nav-link" href="<?php $baseurl = BASEURL; echo "{$baseurl}admin";?>">Admin Panel
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
</nav>

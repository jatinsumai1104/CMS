<?php 
include_once('includes/admin-bootstrap.php');
Session::start_session();
?>
<ul class="sidebar navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="<?php echo BASEURL;?>admin">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-fw fa-folder"></i>
			<span>Posts</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<a class="dropdown-item" href="<?php echo BASEURL;?>admin/posts/addPost">Add Post</a>
			<a class="dropdown-item" href="<?php echo BASEURL;?>admin/posts/managePosts/1">Manage Post</a>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="charts.html">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Charts</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="tables.html">
			<i class="fas fa-fw fa-table"></i>
			<span>Tables</span></a>
	</li>
</ul>

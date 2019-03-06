<?php 
include_once('includes/admin-bootstrap.php');
Session::start_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="<?php echo BASEURL;?>images/logo.png" />
	<title>Blog</title>

	<!-- Bootstrap core CSS-->
	<link href="<?php echo BASEURL;?>admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="<?php echo BASEURL;?>admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="<?php echo BASEURL;?>admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo BASEURL;?>admin/css/sb-admin.css" rel="stylesheet">
	
	<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>

</head>

<body id="page-top">

	<!--Nav Bar-->
	<?php
		include_once('includes/layouts/admin-navigation.php');
	?>

	<div id="wrapper">

		<!-- Sidebar -->
		<?php 
			include_once('includes/layouts/admin-sidebar.php');
		?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- Breadcrumbs-->
				<?php 
					include_once('includes/layouts/admin-breadcrumbs.php');
				?>

				<!-- Page Content -->
				<?php 
				
				if($_REQUEST['required_page'] == "addPost"){
					include_once('includes/layouts/add-post.php');	
				}else if($_REQUEST['required_page'] == "managePosts"){
					include_once('includes/layouts/manage-post.php');	
				}
				
				?>


			</div>
		</div>
	</div>


	<!-- /.container-fluid -->

	<!-- Sticky Footer -->
	<footer class="sticky-footer">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright © Your Website 2018</span>
			</div>
		</div>
	</footer>

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo BASEURL;?>admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo BASEURL;?>admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo BASEURL;?>admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo BASEURL;?>admin/js/sb-admin.min.js"></script>
	<script>
		var postsTable = $("#author_posts");
		postsTable.on('click','.delete',function(e){
			$id = $(this).attr('id');
			$("#deleteID").val($id);
		});
		postsTable.on('click','.edit',function(e){
			$id = $(this).attr('id');
			$("#editID").val($id);
		});
		postsTable.on('click','.toggle',function(e){
			$id = $(this).attr('id');
			$("#toggleID").val($id);
		});
	</script>

</body>

</html>

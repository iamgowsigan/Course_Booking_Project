<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		$adminid=$_SESSION['userid'];
		
		if(isset($_POST['updatee']))
		{	
			
				
	
				
				$title = addslashes($_POST['title']);
				$detail = addslashes($_POST['detail']);
				$dated = date('d M Y');
				
				
		
				$file_name = $_FILES['image']['name'];
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'blog' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
				
				$query = mysqli_query($con, "insert into blog(title,detail,image,dated) values('$title','$detail','$file_name','$dated')");
				
				if ($query) {
				
					$msg = " Blog Added";
					} else {
					$error = "Something Wrong";
				}
				
			
			
		}
	?>
	
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
		</head>	
		<body class="loading" data-layout-config='{"leftSideBarTheme":"light","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
			<div class="wrapper">		
				<?php include 'includes/left-navigation.php';?>
				<div class="content-page">
					<div class="content">
						<?php include 'includes/top-menu.php';?>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="page-title-box">
										<div class="page-title-right">
											<ol class="breadcrumb m-0">
												<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
												<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
												<li class="breadcrumb-item active">Add Blog</li>
											</ol>
										</div>
										<h4 class="page-title">Add Blog</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<form class="form" method="post" enctype="multipart/form-data">
									
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<h4 class="header-title">Blog Management</h4>
												
											</p>
											<div class="row">
												
												<div class="col-12">
													<div class="form-group mb-3">
														<label for="validationCustom01">Title </label>
														<input type="text" class="form-control" name="title" required>
													</div>
												</div>
												
												
												
												<div class="col-12">
													<div class="form-group mb-3">
														<label for="validationCustom01">Detail </label>
														<textarea class="form-control" name="detail" row="4" required></textarea>
													</div>
												</div>
												
												
												
												
												<div class="col-12">
													<div class="form-group mb-3">
														<label for="validationCustom03">Main Image</label>
														<input type="file" class="form-control-file" id="exampleInputFile" name="image" required><br><br>
														
													</div>
													</div>
													
												</div>
												
												
											</div> <!-- end card-body-->
										</div> <!-- end card-->
									</div> <!-- end col-->		
									
									
									
									
									
									
									
									
								</div>
								<button name="updatee" class="btn btn-primary" type="submit">Add Blog</button>
							
						</div> <!-- end card-body-->
					</div> <!-- end card-->
				</div> <!-- end col-->		
				
				
			</form>    
			
			
			
			
			
			
			
			
			<!-- --------------->							
			<!-- container End-->							
			<!------------------>							
		</div> 
	</div> 
	<!-- Footer Start -->
	<?php include 'includes/footer.php';?>
</div>
</div>
<!-- Right Sidebar -->
<?php include 'includes/right-bar.php';?>
<!-- bundle -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>

<!-- Apex js -->
<script src="assets/js/vendor/apexcharts.min.js"></script>

<!-- Todo js -->
<script src="assets/js/ui/component.todo.js"></script>

<!-- demo app -->
<script src="assets/js/pages/demo.dashboard-crm.js"></script>
<!-- end demo js-->
</body>
</html>
<?php } ?>	
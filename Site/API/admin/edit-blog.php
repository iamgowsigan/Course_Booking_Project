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
		$id = intval($_GET['scid']);
		
		
		if (isset($_POST['summitnews'])) {
			
			$catid = intval($_GET['scid']);
			$file_name = $_FILES['image']['name'];
			$file_name = $_FILES['image']['name'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$temp = explode(".", $_FILES["image"]["name"]);
			$file_name = 'productimages' . round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($file_tmp, "../mec/" . $file_name);
			
			$query = mysqli_query($con, "insert into product_image(p_id,pi_image) values('$catid','$file_name')");
			
			if ($query) {
				
				
				$msg = " Image Added";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		
				if ($_GET['action'] == 'del' && $_GET['delid']) {
			$id = intval($_GET['delid']);
			$query = mysqli_query($con, "delete from product_image where pi_id='$id'");
			$msg = "Deleted ";
			
		}
		
		if(isset($_POST['updatee']))
		{
			
			$id = intval($_GET['scid']);
			$adminid=$_SESSION['userid'];
			
			$title = addslashes($_POST['title']);
			$detail = addslashes($_POST['detail']);
			
			
			
			$oldimage = $_POST['oldimage'];
			$file_name = $_FILES['image']['name'];
			
			if($file_name=="")
			{
				$file_name=$oldimage;
				
				}else{
				
				$file_name = $_FILES['image']['name'];
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'blog' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
			}
			
			
			
			$query = mysqli_query($con, "UPDATE blog SET 
			title='$title',
			image='$file_name',
			detail='$detail'
			WHERE b_id=$id");
			
			
			if ($query) {
				
				$msg = "Blog Updated";
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
												<li class="breadcrumb-item active">Edit Blog</li>
											</ol>
										</div>
										<h4 class="page-title">Edit Blog</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="manage-blog.php" class="btn btn-primary m-2" >Back</a>
								
								

								
								<?php
									
									$query1 = mysqli_query($con, "SELECT * FROM blog WHERE b_id=$id");
									while ($rowp = mysqli_fetch_array($query1)) {
									?>							
									
								
										
										
										<div class="col-lg-12">
										<form class="form" method="post" enctype="multipart/form-data">
											<div class="card">
												<div class="card-body">
													<h4 class="header-title">Blog Detail</h4>
													
												</p>	
												<div class="row">
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Title </label>
															<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['title']); ?>" required >
														</div>
													</div>
	
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Detail </label>
															<textarea class="form-control" name="detail" row="4"  required><?php echo htmlentities($rowp['detail']); ?></textarea>
														</div>
													</div>
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom03">Main Image</label>
															<input type="file" class="form-control-file" id="exampleInputFile" name="image"><br><br>
															<?php if($rowp['image']!=""){ ?>
																<img src="<?php echo htmlentities($imgloc.$rowp['image']); ?>" alt="image" class="img-fluid avatar-md rounded">
																<?php } else{ ?>
																<img src="assets/images/banner.jpg" alt="image" class="img-fluid avatar-md rounded">
															<?php } ?>
															<input type="hidden" name="oldimage" value="<?php echo htmlentities($rowp['image']); ?>">
															
														</div>
													</div>
													
												</div>
												
												
											</div> <!-- end card-body-->
										</div> <!-- end card-->
									</div> <!-- end col-->		
									
							
				
								<div class="col-lg-12">
									<button name="updatee" class="btn btn-primary" type="submit">Update Blog</button><br><br>
								</div>
							</form>    
						<?php } ?>	
						
						
						
		
						
						
						
						
						
						
						
						
						
						
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
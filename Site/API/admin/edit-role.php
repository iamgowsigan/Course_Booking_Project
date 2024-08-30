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
		

		
		
		if(isset($_POST['updatee']))
		{
			
			
			$designation = addslashes($_POST['designation']);
			$detail = addslashes($_POST['detail']);
		

			
			$query = mysqli_query($con, "UPDATE designation SET 
			designation='$designation',
			detail='$detail' WHERE d_id=$id");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Disignation Updated')");
				
				$msg = " Disignation Updated";
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">MyClinic</a></li>
												<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
												<li class="breadcrumb-item active">Edit Designation</li>
											</ol>
										</div>
										<h4 class="page-title">Edit Designation</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="add-role.php" class="btn btn-primary m-2" >Back</a>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title"></h4>
											
										</p>
										<?php
											
											$query1 = mysqli_query($con, "Select * from designation WHERE d_id=$id");
											while ($rowp = mysqli_fetch_array($query1)) {
											?>							
											
											<form class="form" method="post" enctype="multipart/form-data">
												<div class="row">
												
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Designation</label>
															<input type="text" class="form-control" name="designation" value="<?php echo htmlentities($rowp['designation']); ?>">
														</div>
													</div>
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Detail</label>
															<textarea  class="form-control" type="text" id="detail" required="" name="detail"><?php echo htmlentities($rowp['detail']); ?></textarea>
														</div>
													</div>
													
		
													
												</div>
												<button name="updatee" class="btn btn-primary" type="submit">Update Designation</button>
											</form>    
										<?php } ?>	
									</div> <!-- end card-body-->
								</div> <!-- end card-->
							</div> <!-- end col-->		
							
							
							
							
							
							
							
							
							
							
							
							
							
							
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
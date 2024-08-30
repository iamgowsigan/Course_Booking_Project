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
			
			
			$name = addslashes($_POST['name']);
			$phone = addslashes($_POST['phone']);
			$role = addslashes($_POST['role']);
			$about = addslashes($_POST['about']);
			$email = addslashes($_POST['email']);
			$username = addslashes($_POST['username']);
			
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
				$file_name = 'admin' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
			}
			
			
			$query = mysqli_query($con, "UPDATE admin SET 
			admin_name='$name',
			admin_phone='$phone',
			admin_email='$email',
			username='$username',
			admin_work='$role',
			admin_about='$about',
			admin_image='$file_name' WHERE id=$id");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','User Updated')");
				
				$msg = " Profile Updated";
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
												<li class="breadcrumb-item active">Edit User</li>
											</ol>
										</div>
										<h4 class="page-title">Edit User</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="add-user.php" class="btn btn-primary m-2" >Back</a>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title"></h4>
											
										</p>
										<?php
											
											$query1 = mysqli_query($con, "Select * from admin WHERE id=$id");
											while ($rowp = mysqli_fetch_array($query1)) {
											?>							
											
											<form class="form" method="post" enctype="multipart/form-data">
												<div class="row">
												
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Name</label>
															<input type="text" class="form-control" name="name" value="<?php echo htmlentities($rowp['admin_name']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Email</label>
															<input type="text" class="form-control" name="email" value="<?php echo htmlentities($rowp['admin_email']); ?>">
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Phone</label>
															<input type="text" class="form-control" name="phone" value="<?php echo htmlentities($rowp['admin_phone']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Username</label>
															<input type="text" class="form-control" name="username" value="<?php echo htmlentities($rowp['username']); ?>">
														</div>
													</div>
													
							
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">About</label>
															<textarea class="form-control" name="about" row="4"><?php echo htmlentities($rowp['admin_about']); ?></textarea>
														</div>
													</div>
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Role</label>
															<select class="form-control select2" data-toggle="select2" required="" name="role">
															<?php
															$ret=mysqli_query($con,"SELECT * FROM userrole ORDER BY role ASC");
															while($result=mysqli_fetch_array($ret))
															{    ?>
															<option value="<?php echo htmlentities($result['u_id']);?>" <?php if(strpos($rowp['admin_work'],$result['u_id'])!==false)echo"selected";?>><?php echo htmlentities($result['role']);?></option>
															<?php } ?>
															</select>
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom03">Profile Image</label>
															<input type="file" class="form-control-file" id="exampleInputFile" name="image" ><br><br>
														
															<?php if($rowp['admin_image']){ ?>
																<img src="<?php echo htmlentities($imgloc.$rowp['admin_image']); ?>" alt="image" class="img-fluid avatar-md rounded">
																<?php } else{ ?>
																<img src="assets/images/users/avatar-1.jpg" alt="image" class="img-fluid avatar-md rounded">
															<?php } ?>
															<input type="hidden" name="oldimage" value="<?php echo htmlentities($rowp['admin_image']); ?>">
														</div>
													</div>
						
													
													
													
													
													
													
													
												</div>
												<button name="updatee" class="btn btn-primary" type="submit">Update Profile</button>
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
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
			$gender = addslashes($_POST['gender']);
			$dob = addslashes($_POST['dob']);
			$phone = addslashes($_POST['phone']);
			$purpose = addslashes($_POST['purpose']);
			$type = addslashes($_POST['type']);
			$password = addslashes($_POST['password']);
			$city = addslashes($_POST['city']);
			$address = addslashes($_POST['address']);
			
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
				$file_name = 'patient' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
			}
			
			
			$query = mysqli_query($con, "UPDATE patient SET 
			patient_name='$name',
			gender='$gender',
			dob='$dob',
			phone='$phone',
			city='$city',
			address='$address',
			purpose='$purpose',
			patient_type='$type',
			password='$password',
			profile='$file_name' WHERE p_id=$id");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Patient Updated')");
				
				$msg = "Patient Profile Updated";
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
												<li class="breadcrumb-item active">Edit Patient</li>
											</ol>
										</div>
										<h4 class="page-title">Edit Patient</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="patients.php" class="btn btn-primary m-2" >Back</a>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title"></h4>
											
										</p>
										<?php
											
											$query1 = mysqli_query($con, "Select * from patient WHERE p_id=$id");
											while ($rowp = mysqli_fetch_array($query1)) {
											?>							
											
											<form class="form" method="post" enctype="multipart/form-data">
												<div class="row">
												
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Name</label>
															<input type="text" class="form-control" name="name" value="<?php echo htmlentities($rowp['patient_name']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Gender</label>
															<select class="form-control select2" data-toggle="select2" required="" name="gender">
													
															<option value="Male" <?php if(strpos($rowp['gender'],"Male")!==false)echo"selected";?>>Male</option>
															<option value="Female" <?php if(strpos($rowp['gender'],"Female")!==false)echo"selected";?>>Female</option>
															<option value="Other" <?php if(strpos($rowp['gender'],"Other")!==false)echo"selected";?>>Other</option>
														
															</select>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Date of Birth</label>
															<input type="date" class="form-control" name="dob" value="<?php echo htmlentities($rowp['dob']); ?>">
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Phone</label>
															<input type="text" class="form-control" name="phone" value="<?php echo htmlentities($rowp['phone']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Purpose</label>
															<input type="text" class="form-control" name="purpose" value="<?php echo htmlentities($rowp['purpose']); ?>">
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Type</label>
															<select class="form-control select2 primary" data-toggle="select2" required="" name="type">
													
															<option value="Out Patient" <?php if(strpos($rowp['patient_type'],"Out Patient")!==false)echo"selected";?>>Out Patient</option>
															<option value="In Patient" <?php if(strpos($rowp['patient_type'],"In Patient")!==false)echo"selected";?>>In Patient</option>
															<option value="Other" <?php if(strpos($rowp['patient_type'],"Other")!==false)echo"selected";?>>Other</option>
														
															</select>
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Password</label>
															<input type="text" class="form-control" name="password" value="<?php echo htmlentities($rowp['password']); ?>">
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">City</label>
															<input type="text" class="form-control" name="city" value="<?php echo htmlentities($rowp['city']); ?>">
														</div>
													</div>
							
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Address</label>
															<textarea class="form-control" name="address" row="4"><?php echo htmlentities($rowp['address']); ?></textarea>
														</div>
													</div>
													
													
							
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom03">Profile Image</label>
															<input type="file" class="form-control-file" id="exampleInputFile" name="image" ><br><br>
														
															<?php if($rowp['profile']){ ?>
																			<img src="<?php echo htmlentities($imgloc.$rowp['profile']); ?>" class="img-fluid avatar-md rounded-circle">
																			<?php } else{ ?>
																			<div class="avatar-md">
																				<span class="avatar-title bg-primary rounded-circle">
																					<?php echo htmlentities(strtoupper(substr($rowp['patient_name'],0,2))); ?>
																				</span>
																			</div>
																		<?php } ?>
															<input type="hidden" name="oldimage" value="<?php echo htmlentities($rowp['profile']); ?>">
														</div>
													</div>
						
													
													
													
													
													
													
													
												</div>
												<button name="updatee" class="btn btn-primary" type="submit">Update Parient Profile</button>
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
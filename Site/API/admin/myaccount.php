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
		
		
		if(isset($_POST['submit']))
		{
			$password=$_POST['password'];
			$options = ['cost' => 12];
			$hashedpass=password_hash($password, PASSWORD_BCRYPT, $options);
			// new password hashing 
			$newpassword=$_POST['newpassword'];
			$newhashedpass=password_hash($newpassword, PASSWORD_BCRYPT, $options);
			
			date_default_timezone_set('Asia/Kolkata');// change according timezone
			$currentTime = date( 'd-m-Y h:i:s A', time () );
			$sql=mysqli_query($con,"SELECT password FROM  admin where id='$adminid'");
			$num=mysqli_fetch_array($sql);
			if($num>0)
			{
				
				$dbpassword=$num['password'];
				if (password_verify($password, $dbpassword)) {
					$conqq=mysqli_query($con,"update admin set password='$newhashedpass' where id='$adminid'");
					
					$msg="Password Changed Successfully";
					
				}
				else{
					$error="password not match !!";
				}
			}
			else
			{
				$error="Old Password not match !!";
			}
			
			
		}
		
		
		if(isset($_POST['updatee']))
		{
			
			
			$name = addslashes($_POST['name']);
			$phone = addslashes($_POST['phone']);
			$work = addslashes($_POST['work']);
			$about = addslashes($_POST['about']);
			
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
			admin_work='$work',
			admin_about='$about',
			admin_image='$file_name' WHERE id=$adminid");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','City Updated')");
				
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
												<li class="breadcrumb-item active">Account</li>
											</ol>
										</div>
										<h4 class="page-title">My Account</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								<div class="col-lg-6">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title">Change Password</h4>
											<p class="text-muted font-14">Change password for your profile
												
											</p>
											<form class="form" method="post" name="chngpwd" enctype="multipart/form-data">
												
												<div class="form-group mb-3">
													<label for="validationCustom01">Old Password</label>
													<input type="text" class="form-control"
													placeholder="" name="password" >
												</div>
												
												<div class="form-group mb-3">
													<label for="validationCustom02">New Password</label>
													<input type="text" class="form-control" 
													placeholder="" name="newpassword" >
												</div>
												
												<div class="form-group mb-3">
													<label for="validationCustom02">Conform Password</label>
													<input type="password" class="form-control" 
													placeholder="" name="confirmpassword" >
												</div>
												
												
												
												<button name="submit" class="btn btn-primary" type="submit">Change Password</button>
											</form>    
											
										</div> <!-- end card-body-->
									</div> <!-- end card-->
								</div> <!-- end col-->	
								
								
								<div class="col-lg-6">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title">My Profile</h4>
											<p class="text-muted font-14">Update your profile for other reference<?php echo htmlentities($adminid); ?>
												
											</p>
											<?php
												
												$query1 = mysqli_query($con, "Select * from admin WHERE id=2");
												while ($rowp = mysqli_fetch_array($query1)) {
												?>							
												
												<form class="form" method="post" enctype="multipart/form-data">
													
													<div class="form-group mb-3">
														<label for="validationCustom01">Name</label>
														<input type="text" class="form-control" name="name" value="<?php echo htmlentities($rowp['admin_name']); ?>">
													</div>
													
													<div class="form-group mb-3">
														<label for="validationCustom02">Phone</label>
														<input type="text" class="form-control" name="phone" value="<?php echo htmlentities($rowp['admin_phone']); ?>">
													</div>
													
													
													<div class="form-group mb-3">
														<label for="validationCustom03">Designation</label>
														<textarea class="form-control" row="3" name="work"><?php echo htmlentities($rowp['admin_work']); ?></textarea>
													</div>
													
													<div class="form-group mb-3">
														<label for="validationCustom03">About you</label>
														<textarea class="form-control" row="4" name="about"><?php echo htmlentities($rowp['admin_about']); ?></textarea>
													</div>
													
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
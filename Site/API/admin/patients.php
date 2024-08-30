<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		if(isset($_POST['submit']))
		{
			
			
			$name = addslashes($_POST['name']);
			$gender = addslashes($_POST['gender']);
			$dob = addslashes($_POST['dob']);
			$phone = addslashes($_POST['phone']);
			$city = addslashes($_POST['city']);
			$address = addslashes($_POST['address']);
			$purpose = addslashes($_POST['purpose']);
			$type = addslashes($_POST['type']);
			
			
			$file_name = $_FILES['image']['name'];
			
			if($file_name=="")
			{
				$file_name="";
				
				}else{
				
				$file_name = $_FILES['image']['name'];
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'patient' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
			}
			
			
			
			$query = mysqli_query($con, "insert into patient(patient_name,gender,dob,phone,city,address,purpose,patient_type,profile) values('$name','$gender','$dob','$phone','$city','$address','$purpose','$type','$file_name')");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'Patient Created')");
				
				$msg = " Patient Added";
				$msg = "App link and login details sent to patient successfully";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from patient  where p_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','Patient deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		
		
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
			<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">Patient</li>
											</ol>
										</div>
										<h4 class="page-title">PATIENT MANAGEMENT</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add Patient</button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th>Profile</th>
														<th>Name</th>
														<th>Phone</th>
														<th>Purpose</th>
														<th>City</th>
														<th>Action</th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM patient");
														$cnt = 1;
														$rowcount = mysqli_num_rows($query);
														if ($rowcount == 0) {
														?>
														<tr>
															<td colspan="7" align="center">
																<h3 style="color:black">No record found</h3>
															</td>
															<tr>
																<?php
																	} else {
																	while ($row = mysqli_fetch_array($query)) {
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['p_id']); ?></td>
																		<td><?php if($row['profile']){ ?>
																			<img src="<?php echo htmlentities($imgloc.$row['profile']); ?>" class="img-fluid avatar-sm rounded-circle">
																			<?php } else{ ?>
																			<div class="avatar-sm">
																				<span class="avatar-title bg-primary rounded-circle">
																					<?php echo htmlentities(strtoupper(substr($row['patient_name'],0,2))); ?>
																				</span>
																			</div>
																		<?php } ?></td>
																		<td><strong><?php echo htmlentities($row['patient_name']); ?></strong><br>
																		<span class="badge badge-primary-lighten"><?php echo htmlentities($row['patient_type']); ?></span></td>
																		
																		<td><?php echo htmlentities($row['phone']); ?></td>
																		<td><?php echo htmlentities($row['purpose']); ?></td>
																		<td><small><?php echo htmlentities($row['city']); ?></small></td>
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['p_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');"  ><i class="dripicons-trash"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
																			
																			<a href="edit-patient?scid=<?php echo htmlentities($row['p_id']); ?>" ><i class="dripicons-document-edit"></i></a>
																			
																		</td>
																		
																	</tr>
																<?php } } ?>
														</tbody>
													</table> 
													
												</div> <!-- end card-body-->
											</div> <!-- end card-->
										</div> <!-- end col-->		
										
										
										
										
										<!-- Form Model-->		
										<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													
													<div class="modal-body">
														<div class="text-center mt-2 mb-4">
															<a href="index.html" class="text-success">
																<span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															
															<input type="hidden" name="bookId" id="bookId" value=""/>
															
															
															<div class="form-group">
																<label for="username">Name</label>
																<input class="form-control" type="text" required="" name="name">
															</div>
															
															<div class="form-group">
																<label for="emailaddress">Gender</label>
																
																<select class="form-control select2" data-toggle="select2" required="" name="gender">		
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
																	<option value="Other">Other</option>
																</select>
															</div>
															
															<div class="form-group">
																<label for="emailaddress">Date of Birth</label>
																<input class="form-control" type="date"  name="dob">
															</div>
															
															
															
															<div class="form-group">
																<label for="password">Phone</label>
																<input class="form-control" type="phone" required="" name="phone">
															</div>
															
															<div class="form-group">
																<label for="password">Type</label>
																<div class="mt-1">
																	<div class="custom-control custom-radio custom-control-inline">
																		<input type="radio" id="customRadio3" value="Out Patient" name="type" class="custom-control-input" checked >
																		<label class="custom-control-label" for="customRadio3" name="type" >Out Patient</label>
																	</div>
																	<div class="custom-control custom-radio custom-control-inline">
																		<input type="radio" id="customRadio4" value="In Patient" name="type" class="custom-control-input">
																		<label class="custom-control-label" for="customRadio4">In Patient</label>
																	</div>
																	<div class="custom-control custom-radio custom-control-inline">
																		<input type="radio" id="customRadio4" value="Other" name="type" class="custom-control-input">
																		<label class="custom-control-label" for="customRadio4">Other</label>
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label for="username">Purpose</label>
																<input class="form-control" type="text" name="purpose">
															</div>
															
															<div class="form-group">
																<label for="username">City</label>
																<input class="form-control" type="text" name="city" required>
															</div>
															
															<div class="form-group">
																<label for="username">Address</label>
																<textarea class="form-control" name="address"></textarea>
															</div>
															
															
															
															<div class="form-group">
																<label for="password">Profile</label>
																<input type="file" class="form-control-file" id="exampleInputFile" name="image" >
															</div>
															
															
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit">Add Patient</button>
															</div>
															
														</form>
														
													</div>
												</div>
											</div>
										</div>
										
										<!--  Form modal end -->
										
										
										
										
										
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
						<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
						<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
						<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
						<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
						
						<!-- Datatable Init js -->
						<script src="assets/js/pages/demo.datatable-init.js"></script>
						<!-- end demo js-->
					</body>
				</html>
			<?php } ?>										
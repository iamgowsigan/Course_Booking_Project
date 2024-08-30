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
			
			
			$title = addslashes($_POST['title']);
			$detail = addslashes($_POST['detail']);
			$cat = addslashes($_POST['cat']);
			
			$query = mysqli_query($con, "insert into subcategory(sub_name,sub_detail,cat) values('$title','$detail','$cat')");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'Sub Category Added')");
				
				$msg = " Category Added";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from subcategory  where sub_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','Subcategory deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		
		if ($_GET['action'] == 'act' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE subcategory SET sub_active='1' WHERE sub_id=$id");
			$msg = "Activated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'dact' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE subcategory SET sub_active='0' WHERE sub_id=$id");
			$msg = "Deactivated ";
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">Sub Category</li>
											</ol>
										</div>
										<h4 class="page-title">Sub Category Management</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add Sub Category</button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th>Sub Category</th>
														<th>Category</th>
														
														<th>Active</th>
														<th>Action</th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM subcategory");
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
																		<td><?php echo htmlentities($row['sub_id']); ?></td>
																		
																		<td><?php echo htmlentities($row['sub_name']); ?></td>
																		<td><span class="badge badge-primary"><?php echo htmlentities($row['cat']); ?></span></td>
																		
																		
																		<td>
																			<?php if($row['sub_active']){ ?>
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['sub_id']); ?>&&action=dact" onclick="return confirm('Are you sure you want to deactivate?');"  ><span class="badge badge-outline-success">Available</span></a>
																				<?php }else{ ?>
																				
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['sub_id']); ?>&&action=act" onclick="return confirm('Are you sure you want to activate?');"  ><span class="badge badge-outline-danger">Unavailable</span></a>
																				
																			<?php } ?>
																		</td>
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['sub_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');" class="action-icon" ><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
																			
																			<a href="edit-subcategory.php?scid=<?php echo htmlentities($row['sub_id']); ?>" class="action-icon"><i class="mdi mdi-pencil"></i></a>
																			
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
											<div class="modal-dialog  modal-lg modal-dialog-centered">
												<div class="modal-content">
													
													<div class="modal-body">
														<div class="text-center mt-2 mb-4">
															<a href="index.html" class="text-success">
																<span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															<div class="row">
																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01">Select Category</label>
																		<select class="form-control select2" data-toggle="select2" name="cat">
																			<option value="Offer" >Offer</option>
																			<option value="Chicken" >Chicken</option>
																			<option value="Mutton" >Mutton</option>
																			<option value="Sea Food" >Sea Food</option>
																			<option value="Ready to Cook" >Ready to Cook</option>
																			<option value="Cut Piece" >Cut Piece</option>
																			<option value="Eggs" >Eggs</option>
																			<option value="Others" >Others</option>
																			
																			
																		</select>
																	</div>
																</div>
																
																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01">Sub Category Name </label>
																		<input type="text" class="form-control" name="title" required>
																	</div>
																</div>
																
																
																
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01">Detail </label>
																		<textarea class="form-control"  name="detail"></textarea>
																	</div>
																</div>
																
																
																
																
																
															</div>
															
															
															
															
															
															
															
															
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit">Add Sub Category</button>
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
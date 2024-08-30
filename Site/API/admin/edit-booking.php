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
			
			
			$ship = addslashes($_POST['ship']);
			
	
			
			$query = mysqli_query($con, "UPDATE booking SET 
			b_send_summary='$ship' WHERE b_id=$id");
			
			if ($query) {

				$msg = "Status Updated";
				} else {
				$error = "Something Wrong";
			}
		}
		
		if ($_GET['action'] == 'act' && $_GET['aid']) {
			$id = intval($_GET['aid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE booking SET b_received='1' WHERE b_id=$id");
			$msg = "Activated ";
			
		}
		
		if ($_GET['action'] == 'dact' && $_GET['aid']) {
			$id = intval($_GET['aid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE booking SET b_received='0' WHERE b_id=$id");
			$msg = "Updated ";

			
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
												<li class="breadcrumb-item active">Edit Category</li>
											</ol>
										</div>
										<h4 class="page-title">Edit Category</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="bookings.php" class="btn btn-primary m-2" >Back</a>
								
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Name</th>	
														<th>Price</th>
														<th>Total</th>
														<th>Action</th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														$getbid=intval($_GET['scid']);
														$query2 = mysqli_query($con, "SELECT cart.*,products.* FROM cart JOIN products ON products.p_id=cart.p_id WHERE cart.c_booking_id=$getbid");
														$cnt = 1;
														$rowcount = mysqli_num_rows($query2);
														if ($rowcount == 0) {
														?>
														<tr>
															<td colspan="7" align="center">
																<h3 style="color:black">No record found</h3>
															</td>
															<tr>
																<?php
																	} else {
																	while ($row = mysqli_fetch_array($query2)) {
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['c_id']); ?></td>
																		<td><img src="../mec/<?php echo htmlentities($row['image']); ?>" alt="image" height="80px"  class="rounded"></td>
																		<td>
																			<?php echo htmlentities($row['title']); ?>
																		</td>
																		<td>
																			<b>₹ <?php echo htmlentities($row['mrp']); ?> INR</b>
																		</td>
																		<td>
																			 <?php echo htmlentities($row['quantity']); ?>  Items
																		</td>
																		
																		<td>₹ <?php echo htmlentities($row['quantity']*$row['mrp']); ?> INR</td>
																		
															
																		
																		
																
																	</tr>
																<?php } } ?>
														</tbody>
													</table> 
													
												</div> <!-- end card-body-->
											</div> <!-- end card-->
										</div> <!-- end col-->		
										
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h4 class="header-title"></h4>
													
												</p>
												<?php
													
													$query1 = mysqli_query($con, "Select * from booking WHERE b_id=$id");
													while ($rowp = mysqli_fetch_array($query1)) {
													?>							
													
													<form class="form" method="post" enctype="multipart/form-data">
														<div class="row">
															
															
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01">AMOUNT RECEIVED</label>
																	<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['b_price']); ?>" readonly>
																</div>
															</div>
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01">TOTAL QUANTITY</label>
																	<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['b_quantity']); ?>" readonly>
																</div>
															</div>
															
															
															
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01">SHIPPING ADDRESS</label>
																	<textarea class="form-control" name="detail" readonly><?php echo htmlentities($rowp['b_address']); ?></textarea>
																</div>
															</div>
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01">CITY</label>
																	<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['b_city']); ?>" readonly>
																</div>
															</div>
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01">ZIP</label>
																	<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['zip']); ?>" readonly>
																</div>
															</div>
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01">PHONE</label>
																	<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['b_phone']); ?>" readonly>
																</div>
															</div>
															
															<div class="col-12">
																<div class="form-group mb-3">
																	<label for="validationCustom01">ITEM SENT STATUS </label><br>
																	<?php if($rowp['b_received']){ ?>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($id); ?>&aid=<?php echo htmlentities($rowp['b_id']); ?>&&action=dact" onclick="return confirm('Are you sure you want to deactivate?');"  ><span class="badge badge-outline-success">Sent</span></a>
																			<?php }else{ ?>
																			
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($id); ?>&aid=<?php echo htmlentities($rowp['b_id']); ?>&&action=act" onclick="return confirm('Are you sure you want to activate?');"  ><span class="badge badge-outline-danger">Processing ..</span></a>
																			
																			<?php } ?> &nbsp;&nbsp;&nbsp;( Click to Change Status )
																</div>
															</div>
															
															<div class="col-12">
																<div class="form-group mb-3">
																	<label for="validationCustom01">SHIPMENT SUMMARY</label>
																	<textarea class="form-control" name="ship"><?php echo htmlentities($rowp['b_send_summary']); ?></textarea>
																</div>
															</div>
															
															
															
															
															
															
													
															
															
															
															
															
															
															
														</div>
														<button name="updatee" class="btn btn-primary" type="submit">Update Summary</button>
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
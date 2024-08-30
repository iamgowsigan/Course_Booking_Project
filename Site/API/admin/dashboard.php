<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">CRM</li>
											</ol>
										</div>
										<h4 class="page-title">CRM</h4>
									</div>
								</div>
							</div>     
							<div class="row"><!-- container Start-->
								
								<?php
									
									$query = mysqli_query($con, "SELECT * from user");
									$countuser = mysqli_num_rows($query);
									
									$queryproducts = mysqli_query($con, "SELECT * from products");
									$countproducts = mysqli_num_rows($queryproducts);
									
									$queryimages = mysqli_query($con, "SELECT * from booking");
									$countimages = mysqli_num_rows($queryimages);
									
									$querytotalbook = mysqli_query($con, "SELECT SUM(b_price) as totalamount, SUM(b_quantity) AS totalquantity from booking");
									$rowtotalbook = mysqli_fetch_array($querytotalbook);
									$totalAmount = $rowtotalbook['totalamount'];
									$totalquantity = $rowtotalbook['totalquantity'];
								?>		
								
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat bg-success text-white">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
											</div>
											<h6 class="text-uppercase mt-0" title="Customers">Customers</h6>
											<h3 class="mt-3 mb-3">0<?php echo htmlentities($countuser); ?></h3>
											<p class="mb-0">
												<span class="badge badge-light-lighten mr-1">
												<i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
												<span class="text-nowrap">Since last month</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-camera-image widget-icon bg-danger rounded-circle text-white"></i>
											</div>
											<h5 class="text-muted font-weight-normal mt-0" title="Revenue">Total Bookings</h5>
											<h3 class="mt-3 mb-3"><?php echo htmlentities($countimages); ?></h3>
											<p class="mb-0 text-muted">
												<span class="badge badge-info mr-1">
												<i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
												<span class="text-nowrap">Since last month</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								
								
								
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-pulse widget-icon"></i>
											</div>
											<h5 class="text-muted font-weight-normal mt-0" title="Growth">Total Products</h5>
											<h3 class="mt-3 mb-3"><?php echo htmlentities($countproducts); ?></h3>
											<p class="mb-0 text-muted">
												<span class="text-success mr-2">
												<i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
												<span class="text-nowrap">Since last Product</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								
								
								
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat bg-primary text-white">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
											</div>
											<h5 class="font-weight-normal mt-0" title="Revenue">Revenue</h5>
											<h3 class="mt-3 mb-3 text-white">₹ <?php echo htmlentities(round($totalAmount)); ?></h3>
											<p class="mb-0">
												<span class="badge badge-info mr-1">
												<i class="mdi mdi-arrow-up-bold"></i>for <?php echo htmlentities($totalquantity); ?> Items</span>
												<span class="text-nowrap">Since last Booking</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								
								<?php
									
									$querycart = mysqli_query($con, "SELECT * from cart");
									$countcart = mysqli_num_rows($querycart);
									
									$querycate = mysqli_query($con, "SELECT * from category");
									$countcate = mysqli_num_rows($querycate);
									
									$queryfav = mysqli_query($con, "SELECT * from favorite");
									$countfav = mysqli_num_rows($queryfav);
									
									$queryban = mysqli_query($con, "SELECT * from banner");
									$countban = mysqli_num_rows($queryban);
							
								?>	
								<!-- end row-->
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-cart-outline widget-icon"></i>
											</div>
											<h5 class="text-muted font-weight-normal mt-0" title="Growth">Items in Cart</h5>
											<h3 class="mt-3 mb-3"><?php echo htmlentities($countcart); ?></h3>
											<p class="mb-0 text-muted">
												<span class="text-success mr-2">
												<span class="text-nowrap">Added by user</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								<!-- end row-->
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-castle widget-icon"></i>
											</div>
											<h5 class="text-muted font-weight-normal mt-0" title="Growth">Total Categories</h5>
											<h3 class="mt-3 mb-3"><?php echo htmlentities($countcate); ?></h3>
											<p class="mb-0 text-muted">
												<span class="text-success mr-2">
												<span class="text-nowrap">Product Category</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								<!-- end row-->
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-cards-heart widget-icon"></i>
											</div>
											<h5 class="text-muted font-weight-normal mt-0" title="Growth">Items in Fav</h5>
											<h3 class="mt-3 mb-3"><?php echo htmlentities($countfav); ?></h3>
											<p class="mb-0 text-muted">
												<span class="text-success mr-2">
												<span class="text-nowrap">Added by user</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								<!-- end row-->
								<div class="col-xl-3 col-lg-6">
									<div class="card widget-flat">
										<div class="card-body">
											<div class="float-right">
												<i class="mdi mdi-cellphone widget-icon"></i>
											</div>
											<h5 class="text-muted font-weight-normal mt-0" title="Growth">App Banner</h5>
											<h3 class="mt-3 mb-3"><?php echo htmlentities($countban); ?></h3>
											<p class="mb-0 text-muted">
												<span class="text-success mr-2">
												<span class="text-nowrap">Banners</span>
											</p>
										</div>
									</div>
								</div> <!-- end col-->
								
								
								
								
								
								
								
								
								
								
								
								
								
								
							</div> <!-- container End-->
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
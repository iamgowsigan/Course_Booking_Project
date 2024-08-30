<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from products where p_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','Product deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		
		if ($_GET['action'] == 'act' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE products SET p_active='1' WHERE p_id=$id");
			$msg = "Activated ".$id;
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'dact' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE products SET p_active='0' WHERE p_id=$id");
			$msg = "Deactivated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'avai' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE products SET p_available='1' WHERE p_id=$id");
			$msg = "Activated ".$id;
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'unav' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE products SET p_available='0' WHERE p_id=$id");
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
												<li class="breadcrumb-item active">Products</li>
											</ol>
										</div>
										<h4 class="page-title">Product Management</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<a href="add-product.php" class="btn btn-primary m-2" >Add Products</a>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Title</th>	
														<th>Price</th>
														<th>Category</th>
														<th>Sub Category</th>
														<th>Active</th>
														<th>Action</th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select products.*,subcategory.* FROM products 
														
														JOIN subcategory ON subcategory.sub_id=products.sub_cat");
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
																		
																		<td>
																			<?php if($row['image']!="") {?>
																				<img src="../mec/<?php echo htmlentities($row['image']); ?>"  width="100"  class="rounded">
																				<?php } else{?>
																				<img src="assets/images/banner.jpg"  width="60"  class="rounded">
																			<?php } ?>
																		</td>
																		<td><?php echo htmlentities($row['title']); ?></td>
																		
																		<td>₹ <strong class="text-success"><?php echo htmlentities($row['mrp']); ?></strong></td>
																		
																		<td><a class="text-info"><?php echo htmlentities($row['category_id']); ?></a></td>
																		
																		<td><a class="text-info"><?php echo htmlentities($row['sub_name']); ?></a></td>
																		
														
																		
																		
																		<td>
																			<?php if($row['p_active']){ ?>
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['p_id']); ?>&&action=dact" onclick="return confirm('Are you sure you want to deactivate?');"  ><span class="badge badge-outline-success">Available</span></a>
																				<?php }else{ ?>
																				
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['p_id']); ?>&&action=act" onclick="return confirm('Are you sure you want to activate?');"  ><span class="badge badge-outline-danger">Unavailable</span></a>
																				
																			<?php } ?>
																		</td>
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['p_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');" class="action-icon" ><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
																			
																			<a href="edit-product.php?scid=<?php echo htmlentities($row['p_id']); ?>" class="action-icon"><i class="mdi mdi-pencil"></i></a>
																			
																		</td>
																		
																	</tr>
																<?php } } ?>
														</tbody>
													</table> 
													
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
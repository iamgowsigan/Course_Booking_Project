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
			$detail = addslashes($_POST['detail']);
			$type = addslashes($_POST['type']);
			$price = addslashes($_POST['price']);


			$query = mysqli_query($con, "insert into pharmacy(name,detail,p_type,price) values('$name','$detail','$type','$price')");
				
				if ($query) {
					$ulog=$_SESSION['login'];
					$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'Medicine Added')");
					
					$msg = " Medicine Added";
					} else {
					$error = "Something Wrong";
				}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from pharmacy  where id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','pharmacy item deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
			
		if ($_GET['action'] == 'act' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE pharmacy SET active='1' WHERE id=$id");
			$msg = "Activated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'dact' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE pharmacy SET active='0' WHERE id=$id");
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">Pharmacy</li>
											</ol>
										</div>
										<h4 class="page-title">PHARMACY MANAGEMENT</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add Medicine</button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th>Type</th>
														<th>Name</th>	
														<th>Price</th>
														<th>Active</th>
														<th>Action</th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM pharmacy");
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
																		<td><?php echo htmlentities($row['id']); ?></td>
																		
																		<td>
																			<?php if($row['p_type']==1){ ?>
																			<img src="assets/images/tabletico.png" alt="image" width="40"  class="rounded-circle">
																			<?php } ?>
																			
																			<?php if($row['p_type']==2){ ?>
																			<img src="assets/images/syrupico.png" alt="image" width="40"  class="rounded-circle">
																			<?php } ?>
																			
																			<?php if($row['p_type']==3){ ?>
																			<img src="assets/images/gelico.png" alt="image" width="40"  class="rounded-circle">
																			<?php } ?>
																			
																			<?php if($row['p_type']==0){ ?>
																			<img src="assets/images/other.png" alt="image" width="40"  class="rounded-circle">
																			<?php } ?>
																		</td>
																		
																		<td><strong><?php echo htmlentities($row['name']); ?></strong>
																			
																		</td>
																		
																		<td>₹ <?php echo htmlentities($row['price']); ?></td>
																		<td>
																			<?php if($row['active']){ ?>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['id']); ?>&&action=dact" onclick="return confirm('Are you sure you want to deactivate?');"  ><span class="badge badge-outline-success">Available</span></a>
																			<?php }else{ ?>
																			
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['id']); ?>&&action=act" onclick="return confirm('Are you sure you want to activate?');"  ><span class="badge badge-outline-danger">Unavailable</span></a>
																			
																			<?php } ?>
																		</td>
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');"  ><i class="dripicons-trash"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
																			
																			<a href="edit-user?scid=<?php echo htmlentities($row['id']); ?>" ><i class="dripicons-document-edit"></i></a>
																			
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
															
															<input type="hidden" name="bookId" id="bookId" value=""/>
															
															
															<div class="form-group">
																<label for="username">Drug Name</label>
																<input class="form-control" type="text" id="username" required="" name="name">
															</div>
															
															<div class="form-group">
																<label for="emailaddress">Detail</label>
																<textarea class="form-control" type="email" placeholder="Medicine usage instruction" name="detail"></textarea>
															</div>
															
															<div class="form-group">
																<label for="emailaddress">Type</label>
																<select class="form-control select2" data-toggle="select2" required="" name="type">		
																	<option value="1">Tablet</option>
																	<option value="2">Syrup</option>
																	<option value="3">Gel</option>
																	<option value="0">Other</option>
																</select>
															</div>
															
															<div class="form-group">
																<label for="password">Price</label>
																<input class="form-control" type="number" required="" name="price">
															</div>
											
							
															
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit">Add Medicine</button>
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
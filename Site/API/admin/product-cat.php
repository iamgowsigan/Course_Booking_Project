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
		
		if(isset($_POST['updatee']))
		{	
			
			$queryget = mysqli_query($con, "SELECT * from admin WHERE id=$adminid LIMIT 1");
			while ($row = mysqli_fetch_array($queryget)) {
				
				$getvalid=$row['valid_date'];
				
				
				$adminid=$_SESSION['userid'];
				
				$title = addslashes($_POST['title']);
				$detail = addslashes($_POST['detail']);
				$category_id = addslashes($_POST['category']);
				$mrp = addslashes($_POST['mrp']);
				$offer = addslashes($_POST['offer']);
				$material = addslashes($_POST['material']);
				$washable = addslashes($_POST['washable']);
				$activity = addslashes($_POST['activity']);
				$battery = addslashes($_POST['battery']);
				$batterycount = addslashes($_POST['batterycount']);
				$content = addslashes($_POST['content']);
				$brand = addslashes($_POST['brand']);
				$warrenty = addslashes($_POST['warrenty']);
				$age = addslashes($_POST['age']);
				$height = addslashes($_POST['height']);
				$length = addslashes($_POST['length']);
				$width = addslashes($_POST['width']);
				$weight = addslashes($_POST['weight']);
				
				
				foreach ($_POST['tag'] as $tag){
					$tags=$tags.$tag.'  ';
				}
				
				
				$file_name = $_FILES['image']['name'];
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'product' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
				
				$query = mysqli_query($con, "insert into products(title,detail,category_id,tag,image,mrp,offer,material,washable,activity,battery,batterycount,content,brand,warrenty,age,height,length,width,weight) values('$title','$detail','$category_id','$tags','$file_name','$mrp','$offer','$material','$washable','$activity','$battery','$batterycount','$content','$brand','$warrenty','$age','$height','$length','$width','$weight')");
				
				if ($query) {
					$ulog=$_SESSION['login'];
					$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'User Updated')");
					
					$msg = " Product Added";
					} else {
					$error = "Something Wrong";
				}
				
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
												<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
												<li class="breadcrumb-item active">Add Product</li>
											</ol>
										</div>
										<h4 class="page-title">Add Product</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								<div class="col-lg-4">
									<a href="add-product.php?cat=Offer"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/dd.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Offer</h5>
												<p class="mb-0 font-13">Add item to Offer</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
								<div class="col-lg-4">
									<a href="add-product.php?cat=Chicken"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/aa.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Chicken</h5>
												<p class="mb-0 font-13">Add item to Chicken</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
								<div class="col-lg-4">
									<a href="add-product.php?cat=Mutton"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/bb.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Mutton</h5>
												<p class="mb-0 font-13">Add item to Mutton</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
								<div class="col-lg-4">
									<a href="add-product.php?cat=Sea Food"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/cc.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Sea Food</h5>
												<p class="mb-0 font-13">Add item to Food</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
								<div class="col-lg-4">
									<a href="add-product.php?cat=Cut Piece"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/ff.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Cut Piece</h5>
												<p class="mb-0 font-13">Add item to Cut Piece</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
									<div class="col-lg-4">
									<a href="add-product.php?cat=Eggs"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/gg.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Eggs</h5>
												<p class="mb-0 font-13">Add item to Eggs</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
								<div class="col-lg-4">
									<a href="add-product.php?cat=Ready to Cook"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/dd.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Ready to Cook</h5>
												<p class="mb-0 font-13">Add item to Ready to Cook</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
								<div class="col-lg-4">
									<a href="add-product.php?cat=Others"><div class="card">
										<div class="card-body">
											<span class="float-left m-2 mr-4">
												<img src="assets/hh.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
											</span>
											<div class="media-body">
												<h5 class="mb-1">Others</h5>
												<p class="mb-0 font-13">Add item to Others</p>
											</div>
											<!-- end media-body-->
										</div></a>
										<!-- end card-body-->
									</div>
								</div> 
								<!-- end col -->
								
							
				
								
								
								
								
								
								
								
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
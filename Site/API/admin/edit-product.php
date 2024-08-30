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
		
		
		if (isset($_POST['summitnews'])) {
			
			$catid = intval($_GET['scid']);
			$file_name = $_FILES['image']['name'];
			$file_name = $_FILES['image']['name'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$temp = explode(".", $_FILES["image"]["name"]);
			$file_name = 'productimages' . round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($file_tmp, "../mec/" . $file_name);
			
			$query = mysqli_query($con, "insert into product_image(p_id,pi_image) values('$catid','$file_name')");
			
			if ($query) {
				
				
				$msg = " Image Added";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		
		if ($_GET['action'] == 'del' && $_GET['delid']) {
			$id = intval($_GET['delid']);
			$query = mysqli_query($con, "delete from product_image where pi_id='$id'");
			$msg = "Deleted ";
			
		}
		
		if(isset($_POST['updatee']))
		{
			
			$id = intval($_GET['scid']);
			$adminid=$_SESSION['userid'];
			
			$title = addslashes($_POST['title']);
			$detail = addslashes($_POST['detail']);
			$subcat = addslashes($_POST['subcat']);
			$category_id = addslashes($_POST['category']);
			$mrp = addslashes($_POST['mrp']);
			$offer = addslashes($_POST['offer']);
			$pieces = addslashes($_POST['pieces']);
			
			
			
			foreach ($_POST['tag'] as $tag){
				$tags=$tags.$tag.'  ';
			}
			
			
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
				$file_name = 'product' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
			}
			
			
			
			$query = mysqli_query($con, "UPDATE products SET 
			title='$title',
			tag='$tags',
			image='$file_name',
			mrp='$mrp',
			offer='$offer',
			material='$pieces',
			sub_cat='$subcat'
			WHERE p_id=$id");
			
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Product Updated')");
				
				$msg = "Product Updated";
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
												<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
												<li class="breadcrumb-item active">Edit Product</li>
											</ol>
										</div>
										<h4 class="page-title">Edit Product</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="manage-product.php" class="btn btn-primary m-2" >Back</a>
								
								
								
								
								<?php
									
									$query1 = mysqli_query($con, "Select products.*,subcategory.* FROM products 
									
									JOIN subcategory ON subcategory.sub_id=products.sub_cat WHERE p_id=$id");
									while ($rowp = mysqli_fetch_array($query1)) {
									?>							
									
									<form class="form" method="post" enctype="multipart/form-data">
										
										
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h4 class="header-title">Basic Information</h4>
													
												</p>
												<div class="row">
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Title </label>
															<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['title']); ?>" required >
														</div>
													</div>
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Detail </label>
															<textarea class="form-control" name="detail" row="4"  required><?php echo htmlentities($rowp['detail']); ?></textarea>
														</div>
													</div>
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Number of Pieces </label>
															<input type="text" class="form-control" name="pieces" value="<?php echo htmlentities($rowp['material']); ?>" >
														</div>
													</div>
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Category </label>
															<input type="text" class="form-control"  value="<?php echo htmlentities($rowp['category_id']); ?>" readonly>
														</div>
													</div>
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Sub Category</label>
															<select class="select2 form-control" data-toggle="select2" name="subcat" >
																
																<?php
																	$catid=$rowp['category_id'];
																	$ret=mysqli_query($con,"SELECT * FROM subcategory WHERE cat='$catid'");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																
																	<option value="<?php echo htmlentities($result['sub_id']);?>" <?php if(strpos($rowp['sub_cat'],$result['sub_id'])!==false)echo"selected";?>><?php echo htmlentities($result['sub_name']);?></option>
																	
																	
																<?php } ?>
															</select>
														</div>
													</div>
													
													
													
													
													
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Tab Lines</label>
															<select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple"  name="tag[]" data-placeholder="Choose ...">
																
																<?php
																	$ret=mysqli_query($con,"SELECT * FROM tag WHERE tag_active=1");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																	<option value="<?php echo htmlentities($result['tag_id']);?>" <?php if(strpos($rowp['tag'],$result['tag_id'])!==false)echo"selected";?>><?php echo htmlentities($result['tag_name']);?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom03">Main Image</label>
															<input type="file" class="form-control-file" id="exampleInputFile" name="image"><br><br>
															<?php if($rowp['image']!=""){ ?>
																<img src="<?php echo htmlentities($imgloc.$rowp['image']); ?>" alt="image" class="img-fluid avatar-md rounded">
																<?php } else{ ?>
																<img src="assets/images/banner.jpg" alt="image" class="img-fluid avatar-md rounded">
															<?php } ?>
															<input type="hidden" name="oldimage" value="<?php echo htmlentities($rowp['image']); ?>">
															
														</div>
													</div>
													
												</div>
												
												
											</div> <!-- end card-body-->
										</div> <!-- end card-->
									</div> <!-- end col-->		
									
									<!-- Contact Business -->	
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<h4 class="header-title">PRICING INFORMATION</h4>
												
												
												
												<div class="row">
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">MRP PRICE </label>
															<div class="input-group">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-currency-inr"></i></span>
																</div>
																<input type="number" class="form-control" name="mrp" value="<?php echo htmlentities($rowp['mrp']); ?>" required>
															</div>
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">STRICK PRICE (offer) </label>
															<div class="input-group">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-ticket-percent"></i></span>
																</div>
																<input type="number" class="form-control" value="<?php echo htmlentities($rowp['offer']); ?>" name="offer">
															</div>
														</div>
													</div>
													
													
													
												</div>
												
											</div> <!-- end card-body-->
										</div> <!-- end card-->
									</div> <!-- end col-->		
									
									
									<div class="col-lg-12">
										<button name="updatee" class="btn btn-primary" type="submit">Update Product</button><br><br>
									</div>
								</form>    
							<?php } ?>	
							
							
							
							<!-- Contact Business -->	
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<h4 class="header-title">Product Images</h4>
										
										
										
										
										
										<form class="form" name="chngpwd" method="post" id="registration"
										enctype="multipart/form-data">
											<div class="form-body">
												
												<div class="form-group">
													
													<input type="file" class="form-control-file" id="exampleInputFile"
													name="image" required>
												</div>
												<a href="manage-products.php" class="btn btn-danger mr-1">Back</a>
												<button type="submit" class="btn btn-dark btn-sm" name="summitnews">
													<i class="la la-check-square-o"></i> Add Image
												</button><br><br>
											</div>
											
											
											
											
											<div class="form-actions">
												
												
											</div>
										</form>
										
										
										<?php
											$catid = intval($_GET['scid']);
											$query = mysqli_query($con, "Select * from product_image WHERE p_id='$catid'");
											$cnt = 1;
											while ($row = mysqli_fetch_array($query)) {
											?>
											
											
											<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($catid); ?>&delid=<?php echo htmlentities($row['pi_id']); ?>&&action=del"
											onclick="return confirm('Are you sure you want to delete?');"><img src="../mec/<?php echo htmlentities($row['pi_image']); ?>"height="80" style="border-radius: 10%;"></a> 
											
											
											
											
											
										<?php }?>
										
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
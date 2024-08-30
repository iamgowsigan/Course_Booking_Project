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
				$subcategory = addslashes($_POST['subcategory']);
				$mrp = addslashes($_POST['mrp']);
				$offer = addslashes($_POST['offer']);
				$pieces = addslashes($_POST['pieces']);
				
				
				
				foreach ($_POST['tag'] as $tag){
					$tags=$tags.$tag.'  ';
				}
				
				
				$file_name = $_FILES['image']['name'];
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'product' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
				
				$query = mysqli_query($con, "insert into products(title,detail,category_id,sub_cat,tag,image,mrp,offer,material) values('$title','$detail','$category_id','$subcategory','$tags','$file_name','$mrp','$offer','$pieces')");
				
				if ($query) {
					$ulog=$_SESSION['login'];
					$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'Product Updated')");
					
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
			<script>
				function getSubCat(val) {
					
					$.ajax({
						type: "POST",
						url: "get_subcategory.php",
						data:'catid='+val,
						success: function(data){
							$("#subcategory").html(data);
							
						}
					});
				}
			</script>
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
														<input type="text" class="form-control" name="title" required>
													</div>
												</div>
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">Detail </label>
														<textarea class="form-control" name="detail" row="4" required></textarea>
													</div>
												</div>
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">Number of Pieces </label>
														<input type="number" class="form-control" name="pieces" required>
													</div>
												</div>
												
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">Category</label>
														<select class="form-control select2" data-toggle="select2" required="" name="category"  id="category" onChange="getSubCat(this.value);" required>
															
															
															
															
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
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">Sub Category</label>
														<select class="form-control select2" data-toggle="select2" required="" name="subcategory" id="subcategory">
															<option value="">First Select City</option>
														</select>
													</div>
												</div>
												
												
												
												
												
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">Tab Lines</label>
														<select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple"  name="tag[]" data-placeholder="Choose ...">
															
															<?php
																$ret=mysqli_query($con,"SELECT * FROM tag WHERE tag_active=1");
																while($result=mysqli_fetch_array($ret))
																{    ?>
																<option value="<?php echo htmlentities($result['tag_id']);?>" ><?php echo htmlentities($result['tag_name']);?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom03">Main Image</label>
														<input type="file" class="form-control-file" id="exampleInputFile" name="image" required><br><br>
														
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
															<input type="number" class="form-control" name="mrp" required>
														</div>
													</div>
												</div>
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">STRICK PRICE(Offer) </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-ticket-percent"></i></span>
															</div>
															<input type="number" class="form-control" name="offer">
														</div>
													</div>
												</div>
												
												
												
											</div>
											
										</div> <!-- end card-body-->
									</div> <!-- end card-->
								</div> <!-- end col-->		
								
								
								
								
								
								
								
							</div>
							<button name="updatee" class="btn btn-primary" type="submit">Add Product</button>
							
						</div> <!-- end card-body-->
					</div> <!-- end card-->
				</div> <!-- end col-->		
				
				
			</form>    
			
			
			
			
			
			
			
			
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
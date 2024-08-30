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
			
			
			$title = addslashes($_POST['title']);
			$detail = addslashes($_POST['detail']);
			$cat = addslashes($_POST['cat']);
			
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
				$file_name = 'category' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
			}
			
			
			
			$query = mysqli_query($con, "UPDATE subcategory SET 
			sub_name='$title',
			cat='$cat',
			sub_detail='$detail' WHERE sub_id=$id");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Sub category Updated')");
				
				$msg = "Sub Category Updated";
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
												<li class="breadcrumb-item active">Edit Sub Category</li>
											</ol>
										</div>
										<h4 class="page-title">Edit Sub Category</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="subcategory.php" class="btn btn-primary m-2" >Back</a>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title"></h4>
											
										</p>
										<?php
											
											$query1 = mysqli_query($con, "Select * from subcategory WHERE sub_id=$id");
											while ($rowp = mysqli_fetch_array($query1)) {
											?>							
											
											<form class="form" method="post" enctype="multipart/form-data">
												<div class="row">
													
													
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Sub Category Name </label>
															<input type="text" class="form-control" name="title" value="<?php echo htmlentities($rowp['sub_name']); ?>" required>
														</div>
													</div>
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Select Category </label>
															<select class="form-control select2" data-toggle="select2" name="cat">
										
																
																
																<option value="Offer" <?php if(strpos($rowp['sub_id'],'Offer')!==false)echo"selected";?>>Offer</option>
																<option value="Chicken" <?php if(strpos($rowp['sub_id'],'Chicken')!==false)echo"selected";?>>Chicken</option>
																<option value="Mutton" <?php if(strpos($rowp['sub_id'],'Mutton')!==false)echo"selected";?>>Mutton</option>
																<option value="Sea Food" <?php if(strpos($rowp['sub_id'],'Sea Food')!==false)echo"selected";?>>Sea Food</option>
																<option value="Ready to Cook" <?php if(strpos($rowp['sub_id'],'Ready to Cook')!==false)echo"selected";?>>Ready to Cook</option>
																<option value="Cut Piece" <?php if(strpos($rowp['sub_id'],'Cut Piece')!==false)echo"selected";?>>Cut Piece</option>
																<option value="Eggs" <?php if(strpos($rowp['sub_id'],'Eggs')!==false)echo"selected";?>>Eggs</option>
																<option value="Others" <?php if(strpos($rowp['sub_id'],'Others')!==false)echo"selected";?>>Others</option>
																
															</select>
														</div>
													</div>
													
													
													
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="validationCustom01">Detail</label>
															<textarea class="form-control" name="detail" required><?php echo htmlentities($rowp['sub_detail']); ?></textarea>
														</div>
													</div>
													
													
													
													
													
													
													
													
													
													
													
												</div>
												<button name="updatee" class="btn btn-primary" type="submit">Update Sub Category</button>
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
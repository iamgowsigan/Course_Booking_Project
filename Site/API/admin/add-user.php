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
			$phone = addslashes($_POST['phone']);
			$email = addslashes($_POST['email']);
			$password = addslashes($_POST['password']);
			$role = addslashes($_POST['role']);
			$user = addslashes($_POST['user']);
			
			$options = ['cost' => 12];
			$newhashedpass=password_hash($password, PASSWORD_BCRYPT, $options);
			
			
			$file_name = $_FILES['image']['name'];
			
			if($file_name=="")
			{
				$file_name="";
				
			}else{
				
				$file_name = $_FILES['image']['name'];
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'admin' . round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($file_tmp, $imgloc . $file_name);
				
			}
			
			
			
			$sql = mysqli_query($con, "SELECT * FROM admin WHERE (username='$user' || admin_email='$email')");
			$row = mysqli_fetch_array($sql);
			if ($row > 0) {
				$error = "Email or username already exists";
				}else{
				
					$query = mysqli_query($con, "insert into admin(username,password,admin_name,admin_email,admin_image,admin_phone,admin_work) values('$user','$newhashedpass','$name','$email','$file_name','$phone','$role')");

					if ($query) {
						$ulog=$_SESSION['login'];
						$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'User Updated')");
				
						$msg = " User Added";
						} else {
							$error = "Something Wrong";
						}
				
				}
			
			
		}
	
	if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from admin  where id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','User deleted')");
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
												<li class="breadcrumb-item active">User</li>
											</ol>
										</div>
										<h4 class="page-title">USER MANAGEMENT</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add User</button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>User ID</th>
														<th>Profile</th>
														<th>Name</th>
														
														<th>Phone</th>
														<th>Email</th>
														<th>Action</th>
													</tr>
												</thead>
												
												
												<tbody>
 <?php
											
	$query = mysqli_query($con, "Select admin.*,designation.* from admin JOIN designation ON designation.d_id=admin.admin_work");
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
														<td><?php if($row['admin_image']){ ?>
											<img src="<?php echo htmlentities($imgloc.$row['admin_image']); ?>" alt="image" width="40"  class="rounded-circle">
											<?php } else{ ?>
											<img src="assets/images/users/avatar-1.jpg" alt="image"  width="40"  class="rounded-circle">
											<?php } ?></td>
														<td><?php echo htmlentities($row['admin_name']); ?><br>
															<span class="badge badge-primary"><?php echo htmlentities($row['designation']); ?></span></td>
														
														<td><?php echo htmlentities($row['admin_phone']); ?></td>
														<td><?php echo htmlentities($row['admin_email']); ?></td>
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
                        <input class="form-control" type="text" id="username" required="" name="name">
                    </div>

                    <div class="form-group">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control" type="email"  required="" name="email">
                    </div>
					
					<div class="form-group">
                        <label for="emailaddress">Username</label>
                        <input class="form-control" type="text"  required="" name="user">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" required="" name="password">
                    </div>
					
					<div class="form-group">
                        <label for="password">Phone</label>
                        <input class="form-control" type="phone" required="" name="phone">
                    </div>
					
					<div class="form-group">
                        <label for="password">Role</label>
						<select class="form-control select2" data-toggle="select2" required="" name="role">
						
						<?php
							$ret=mysqli_query($con,"SELECT * FROM designation ORDER BY designation ASC");
							while($result=mysqli_fetch_array($ret))
							{    ?>
								<option value="<?php echo htmlentities($result['d_id']);?>"><?php echo htmlentities($result['designation']);?></option>
							<?php } ?>
						</select>
                    </div>
					
					<div class="form-group">
                        <label for="password">Profile</label>
                        <input type="file" class="form-control-file" id="exampleInputFile" name="image" >
                    </div>



                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit" name="submit">Add User</button>
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
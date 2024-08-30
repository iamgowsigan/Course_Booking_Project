<?php
	
	session_start();
	//session_destroy();
	include 'includes/config.php';
	error_reporting(0);
	$id = intval($_GET['id']);
	
	$queryupdate=mysqli_query($con,"UPDATE courses SET co_views=co_views+1 WHERE co_id=$id");
	
	if ($_GET['action'] == 'fav' && $_GET['id']) {
		
        $pid = intval($_GET['id']);
        $uid = $_SESSION['userid'];
		
		if($uid==""){
			echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}else{
			
			$checkuser = mysqli_query($con, "select * from favorite WHERE u_id='$uid' AND co_id='$pid'");
			$countuser = mysqli_num_rows($checkuser);
			if ($countuser == 0){
				
				$sql = mysqli_query($con, "INSERT INTO favorite(u_id,co_id) VALUES ('$uid','$pid')");
				
				$success = "Courses add to wishlist";
				$queryupdate=mysqli_query($con,"UPDATE courses SET co_likes = co_likes+1 WHERE co_id=$pid");
			}
			else{
				
				$warning = "already added to wishlist";
			}
		}
		
		
	}
	
	if ($_GET['action'] == 'cart' && $_GET['id']) {
		
        $pid = intval($_GET['id']);
        $uid = $_SESSION['userid'];
		
		if($uid==""){
			echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}else{
			$checkuser = mysqli_query($con, "select * from cart WHERE u_id='$uid' AND co_id='$pid' AND c_status=0 AND c_booking_id=0");
			$countuser = mysqli_num_rows($checkuser);
			if ($countuser == 0){
				
				$sql = mysqli_query($con, "INSERT INTO cart(u_id,co_id) VALUES ('$uid','$pid')");
				
				$success = "Product add to Cart";
			}
			else{
				
				$warning = "already in Cart";
			}
		}
		
	}
	
	
	$query=mysqli_query($con,"SELECT courses.*,category.* FROM courses 
	JOIN category ON category.cat_id=courses.cat_id WHERE courses.co_id=$id");
	
	$queryupdate=mysqli_query($con,"UPDATE courses SET co_views=co_views+1 WHERE co_id=$id");
	
	while($rowpid = mysqli_fetch_array($query))
	{
		
	$tags = explode(',',$rowpid['tag']); 
	
	
	
	?>
	
	<!doctype html>
	<html class="no-js" lang="en">
		<head>
			<?php include 'includes/head.php';?>
			
		</head>	
		<body >
			
			<div class="main-wrapper">
				<?php include 'includes/navigation.php';?>
				<!-- CONTENT START-->
				
				<?php include 'layout/single-banner.php';?>
				
				
				<?php include 'layout/single-detail.php';?>
				<?php// include 'layout/single-related.php';?>
				
				
				<?php include 'layout/home-promise.php';?>
				
				<!-- CONTENT END-->
				<?php include 'includes/footer.php';?>
				<?php// include 'includes/toast.php';?>
				
			</div>	
			<?php include 'includes/script.php';?>	
		</body>
		
	</html>
	
<?php } ?>
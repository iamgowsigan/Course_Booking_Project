<?php
	session_start();
	//session_destroy();
	include 'includes/config.php';
	error_reporting(0);
	
	if ($_GET['action'] == 'cart' && $_GET['pid']) {
		
        $pid = intval($_GET['pid']);
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
			
			<?php include 'layout/home-banner.php';?>
			<?php include 'layout/home-popular.php';?>
			<?php include 'layout/home-deals.php';?>
			
			<!-- CONTENT END-->
			<?php include 'includes/footer.php';?>
			<?php include 'includes/toast.php';?>

			
		</div>	
		<?php include 'includes/script.php';?>	
	</body>

	</html>
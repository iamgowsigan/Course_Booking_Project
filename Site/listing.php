<?php
	
	session_start();
	//session_destroy();
	include 'includes/config.php';
	error_reporting(0);
	
	
	if(isset($_POST['updatee']))
	{	
		
		
		$category = addslashes($_POST['category']);
		$age = addslashes($_POST['age']);
		$prange = addslashes($_POST['prange']);	
		$price=explode('  -  ',$_POST['prange']);
		
		$minPrice=substr($price[0],3);
		$maxPrice=substr($price[1],3);
		
		foreach ($_POST['category'] as $cat){
			$categoryitems=$categoryitems.$cat.',';
		}
		
		foreach ($_POST['age'] as $age){
			$ageitems=$ageitems.$age.',';
		}
		
		$pricelist=$minPrice.",".$maxPrice;
		
		
		
		echo "<script type='text/javascript'> document.location = 'listing.php?cat=".$categoryitems."&age=".$ageitems."&price=".$pricelist."'; </script>";
		
		
		
	}
	
	if ($_GET['action'] == 'fav' && $_GET['pid']) {
		
		
		
        $pid = intval($_GET['pid']);
        $uid = $_SESSION['userid'];
		if($uid==""){
			echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}else{
			$checkuser = mysqli_query($con, "select * from favorite WHERE u_id='$uid' AND p_id='$pid'");
			$countuser = mysqli_num_rows($checkuser);
			if ($countuser == 0){
				
				$sql = mysqli_query($con, "INSERT INTO favorite(u_id,p_id) VALUES ('$uid','$pid')");
				
				$success2 = "Product add to wishlist";
				$queryupdate=mysqli_query($con,"UPDATE products SET p_likes=p_likes+1 WHERE p_id=$pid");
			}
			else{
				
				$warning = "already added to wishlist";
			}
		}
	}
	
	if ($_GET['action'] == 'cart' && $_GET['pid']) {
		
        $pid = intval($_GET['pid']);
        $uid = $_SESSION['userid'];
		if($uid==""){
			echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}else{
			$checkuser = mysqli_query($con, "select * from cart WHERE u_id='$uid' AND p_id='$pid' AND c_status=0 AND c_booking_id=0");
			$countuser = mysqli_num_rows($checkuser);
			if ($countuser == 0){
				
				$sql = mysqli_query($con, "INSERT INTO cart(u_id,p_id,quantity) VALUES ('$uid','$pid','1')");
				
				$success2 = "Product add to Cart";
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
		<style>
			.accordion {
			background-color: #eee;
			color: #000000;
			cursor: pointer;
			text-align: center;
			padding: 10px;
			width: 100%;
		border: none;
		text-align: left;
		outline: none;
		font-size: 15px;
		transition: 0.4s;
		}
		
		.accordion:hover {
		background-color: #ccc; 
		}
		
		.panel {
		padding: 0 18px;
		display: none;
		background-color: white;
		overflow: hidden;
		}
		</style>
	</head>	
	<body >
		
		<div class="main-wrapper">
			<?php include 'includes/navigation.php';?>
			<!-- CONTENT START-->
			<?php include 'layout/listing-banner.php';?>
			
			
		    <!-- Page Section Start -->
			<div class="page-section section section-padding">
				<div class="container">
					<div class="row row-30 mbn-40">
						
						<?php include 'layout/listing-left.php';?>
						<?php include 'layout/listing-right.php';?>
						
						
					</div>
				</div>
			</div><!-- Page Section End -->
			
			
			<?php include 'layout/home-promise.php';?>
			<!-- CONTENT END-->
			<?php include 'includes/toast.php';?>
			<?php include 'includes/footer.php';?>
			
			
		</div>	
		<?php include 'includes/script.php';?>	
		<script>
			var acc = document.getElementsByClassName("accordion");
			var i;
			
			for (i = 0; i < acc.length; i++) {
				acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.display === "block") {
						panel.style.display = "none";
						} else {
						panel.style.display = "block";
					}
				});
			}
		</script>
	</body>
	
</html>
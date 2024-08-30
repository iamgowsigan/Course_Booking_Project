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
	

	
	if ($_GET['action'] == 'del' && $_GET['cid']) {
			$cid = intval($_GET['cid']);
			
			$query = mysqli_query($con, "delete from favorite where f_id='$cid'");
            $success2 = "Deleted ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
	
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<?php include 'includes/head.php';?>
		<style>
			.dot {
			height: 25px;
			width: 25px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			}
		</style>
		
	</head>	
	<body >
		
		<div class="main-wrapper">
			<?php include 'includes/navigation.php';?>
			<!-- CONTENT START-->
			<?php include 'layout/wishlist-banner.php';?>
			<?php include 'layout/wishlist-items.php';?>
			
			
			
			<?php include 'layout/home-promise.php';?>
			<!-- CONTENT END-->
			<?php include 'includes/toast.php';?>
			<?php include 'includes/footer.php';?>
			
			
		</div>	
		<script type="text/javascript">
			function sum() {
				var txtFirstNo = document.getElementById('txtFirstNo').value;
				var result = parseInt(txtFirstNo) ;
				if (!isNaN(result)) {
					document.getElementById('txtResult').value = result;
				}
			}
		</script>
		
		<?php include 'includes/script.php';?>	
		
	</body>
	
</html>
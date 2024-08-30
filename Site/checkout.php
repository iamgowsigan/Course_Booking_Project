<?php
	
	session_start();
	//session_destroy();
	include 'includes/config.php';
	error_reporting(0);
	
	
	if ($_POST['pprice']) {
		
		$uid = $_SESSION['userid'];
		$ptype = $_POST['ptype'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$zip = $_POST['zip'];
		$price = $_POST['pprice'];
		$quantity = $_POST['pquantity'];
		$delivery = $_POST['delivery'];
		
		$_SESSION['b_name'] = $name;
		$_SESSION['b_phone'] = $phone;
		$_SESSION['b_address'] = $address;
		$_SESSION['b_city'] = $city;
		$_SESSION['b_zip'] = $zip;
		$_SESSION['b_price'] = $price;
		$_SESSION['b_quantity'] = $quantity;
		
		
		if($ptype=="P"){
			
			
			$sql = "INSERT INTO booking(u_id,co_id,b_price,b_quantity,b_address,b_city,b_phone,payment_status,zip,delivery_range,book_type) VALUES ('$uid','2','$price','$quantity','$address','$city','$phone','W','$zip','$delivery','C')";
			if(mysqli_query($con, $sql)){
				$last_id = $con->insert_id;
				
				$_SESSION['paylast_id'] = $last_id;
				
				echo "<script type='text/javascript'> document.location = 'razor/pay.php'; </script>";
				
				
				}else{
				$warning="Something wrong";
			}
			
			
			
			}else{
			
			
			$sql = "INSERT INTO booking(u_id,co_id,b_price,b_quantity,b_address,b_city,b_phone,payment_status,zip,delivery_range,booking_complete,book_type,pay_ref) VALUES ('$uid','2','$price','$quantity','$address','$city','$phone','C','$zip','$delivery','1','C','COD')";
			if(mysqli_query($con, $sql)){
				$last_id = $con->insert_id;
				
				$_SESSION['paylast_id'] = $last_id;
				
				
				mysqli_query($con,"UPDATE cart SET c_status=1,c_booking_id=$last_id WHERE u_id=$uid AND c_booking_id=0");
				
				echo "<script type='text/javascript'> alert('Booking Success'); </script>";
				echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
				
				
				}else{
				$warning="Something wrong";
			}
			
		}
		
		
		
	}
	
	
	
	if(isset($_GET['payid'])){
		
		
		$last_id = $_SESSION['paylast_id'] ;
		$uid = $_SESSION['userid'];
		$get_refid = $_GET['payid'];
		
		mysqli_query($con,"UPDATE booking SET payment_status='p',pay_ref='$get_refid',booking_complete='1' WHERE b_id=$last_id");
		mysqli_query($con,"UPDATE cart SET c_status=1,c_booking_id=$last_id WHERE u_id=$uid AND c_booking_id=0");
		$success2="Booking placed successfully";
		echo "<script type='text/javascript'> alert('Order placed succeed'); </script>";
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		
		
		
		
	}
	
?>



<!doctype html>
<html class="no-js" lang="en">
	<head>
		<?php include 'includes/head.php';?>
		<style>
			
			.radio-toolbar input[type="radio"] {
			opacity: 0;
			position: fixed;
			width: 0;
			
			}
			
			.radio-toolbar label {
			display: inline-block;
			background-color: #fff;
			padding: 4px 4px;
			font-family: sans-serif, Arial;
			font-size: 13px;
			border: 1px solid #3b3b3b;
			color: #3b3b3b;
			border-radius: 4px;
			margin:2px;
			}
			
			.radio-toolbar label:hover {
			background-color: #ec0000;
			border: 1px solid #ec0000;
			color: #fff;
			font-size: 13px;
			}
			
			.radio-toolbar input[type="radio"]:focus + label {
			border: 1px solid #444;
			font-size: 14px;
			}
			
			.radio-toolbar input[type="radio"]:checked + label {
			background-color: #e52d2a;
			border-color: #e52d2a;
			color:#fff;
			font-size: 13px;
			}
			
			
			
		</style>
	</head>	
	<body >
		
		<div class="main-wrapper">
			<?php include 'includes/navigation.php';?>
			<!-- CONTENT START-->
			
			<?php include 'layout/checkout-banner.php';?>
			<?php include 'layout/checkout-detail.php';?>
			
			
			
			
			
			<!-- CONTENT END-->
			<?php include 'includes/footer.php';?>
			<?php include 'includes/toast.php';?>
			
		</div>	
		<?php include 'includes/script.php';?>	
	</body>
	
</html>
<?php
	session_start();
	//session_destroy();
	include 'includes/config.php';
	error_reporting(0);
	
	if (isset($_POST['pupdate'])) {
		
		$uid = $_SESSION['userid'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		
		$query = mysqli_query($con, "UPDATE user SET 
		name='$name',
		phone='$phone' WHERE u_id=$uid");
		
        if ($query) {
			$success2="updated";
			}else{
			$warning="Something Wrong";
		}	
	}
	
	if (isset($_POST['password'])) {
		
		$uid = $_SESSION['userid'];
		$opassword = $_POST['opassword'];
		$opasswordhide = $_POST['opasswordhide'];
		$npassword = $_POST['npassword'];
		$cpassword = $_POST['cpassword'];
		
		if($npassword==$cpassword){
			if($opassword==$opasswordhide){
				$query = mysqli_query($con, "UPDATE user SET 
				password='$npassword' WHERE u_id=$uid");
				
				if ($query) {
					$success2="updated";
					}else{
					$warning="Something Wrong";
				}
				} else{
				$warning="Old password wrong";
				}
			} else{
			$warning="Password not matching";
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
			
			<?php include 'layout/profile-banner.php';?>
			<?php include 'layout/profile-detail.php';?>
			
			<!-- CONTENT END-->
			<?php include 'includes/footer.php';?>
			<?php include 'includes/toast.php';?>
			
		</div>	
		<?php include 'includes/script.php';?>	
	</body>
	
</html>
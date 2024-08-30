<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$key = $_POST['key'];
    $uid = $_POST['uid'];
    $payref = $_POST['payref'];
    $lastid = $_POST['lastid'];
	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		
		
		mysqli_query($conn,"UPDATE booking SET payment_status='p',pay_ref='$payref',booking_complete='1' WHERE b_id=$lastid");
		mysqli_query($conn,"UPDATE cart SET c_status=1,c_booking_id=$lastid WHERE u_id=$uid AND c_booking_id=0");
		
		echo json_encode(['success' => true,'action' => 'added']);
		
		
		
		
		
	}
	else{
		echo json_encode(['success' => false,'action' => 'failed']);
		
	}
	
	
	
	
	
	
	$conn->close();
?>
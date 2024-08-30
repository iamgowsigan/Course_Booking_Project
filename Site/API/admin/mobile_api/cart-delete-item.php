<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	

	
	$key = $_POST['key'];
    $cid = $_POST['cid'];

	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		mysqli_query($conn,"delete from cart WHERE c_id=$cid");
		echo json_encode(['success' => true,'action' => 'updated']);
		
		}
	else{
		echo json_encode(['success' => false,'action' => 'failed']);
		
	}
	
	
	
	
	
	
	$conn->close();
?>
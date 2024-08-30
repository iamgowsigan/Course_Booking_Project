<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	

	
	$key = $_POST['key'];
    $cid = $_POST['cid'];

	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		$queryupdate=mysqli_query($conn,"UPDATE cart SET quantity=quantity+1 WHERE c_id=$cid");
		echo json_encode(['success' => true,'action' => 'updated']);
		
		}
	else{
		echo json_encode(['success' => false,'action' => 'failed']);
		
	}
	
	
	
	
	
	
	$conn->close();
?>
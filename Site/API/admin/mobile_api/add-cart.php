<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	
	$key = $_POST['key'];
    $uid = $_POST['uid'];
    $pid = $_POST['pid'];
	$success=false;
	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		$sql = "SELECT * FROM cart WHERE (u_id='$uid' AND p_id='$pid' AND c_status=0)";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
		//	$queryupdate=mysqli_query($conn,"UPDATE cart SET quantity=quantity+1 WHERE p_id=$pid AND u_id=$uid");
			echo json_encode(['success' => true,'action' => 'updated']);

		} 
		else 
		{
			$sql = "INSERT INTO cart(u_id,p_id) VALUES ('$uid','$pid')";
			if(mysqli_query($conn, $sql)){
				
				echo json_encode(['success' => true,'action' => 'added']);
				
			}
			else{
				echo json_encode(['success' => false,'action' => 'failed']);
			}
			
			
		}
		
		}
	else{
		echo json_encode(['success' => false,'action' => 'failed']);
		
	}
	
	
	
	
	
	
	$conn->close();
?>
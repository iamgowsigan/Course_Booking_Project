<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$email = $obj['email'];
	$password = $obj['password'];
	$key = $obj['key'];
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$tem = $row;
			}
			echo json_encode(['success' => true,'jsonlist' => $tem]);
		} 
		else 
		{
			echo json_encode(['success' => false,'jsonlist' => []]);
		}
		
		}else{
		echo json_encode(['success' => false,'jsonlist' => []]);
		
	}
	
	
	
	$conn->close();
?>
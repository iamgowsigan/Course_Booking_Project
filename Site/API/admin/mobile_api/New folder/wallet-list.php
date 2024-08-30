<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$uid = $obj['uid'];
	
	
	if(strcmp($AppKey,$key)==0){
		

		$wallet=array();
		$balance="";
		
		$sql2 = "SELECT * FROM user WHERE id=$uid LIMIT 1";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows >0) 
		{
			while($row2[] = $result2->fetch_assoc()) 
			{
				$balance = $row2[0]["wallet"];
			}
			
		} 
		
		
		$sql = "SELECT * FROM wallet WHERE u_id=$uid ORDER BY w_id DESC";
		$result = $conn->query($sql);
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$wallet = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'wallet' => $wallet ,'balance' => $balance]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'wallet' => $wallet,'balance' => $balance]);
		
	}
	
	
	
	$conn->close();
?>
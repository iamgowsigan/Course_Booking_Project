<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$uid = $obj['uid'];
	$todaydate=date("Ymd");


	
	if(strcmp($AppKey,$key)==0){
		

		$upcoming=array();
		$previous=array();
		
		$sql = "SELECT bookings.*, package.* FROM bookings JOIN package ON package.p_id=bookings.p_id WHERE bookings.u_id=$uid AND bookings.bookeddateint >=$todaydate";	
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$upcoming = $row;
			}
			
		} 
		
		$sql2 = "SELECT bookings.*, package.* FROM bookings JOIN package ON package.p_id=bookings.p_id WHERE bookings.u_id=$uid AND bookings.bookeddateint <$todaydate";	
		$result2 = $conn->query($sql2);
		
		if ($result2->num_rows >0) 
		{
			while($row2[] = $result2->fetch_assoc()) 
			{
				$previous = $row2;
			}
			
		} 
		
		
		
		

		
		echo json_encode(['success' => true,'upcoming' => $upcoming,'previous' => $previous  ]);
		
		
		
		
		
		}else{
		
		
		echo json_encode(['success' => false,'upcoming' => $upcoming,'previous' => $previous ]);
		
	}
	
	
	
	$conn->close();
?>
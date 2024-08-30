<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$bookid = $obj['bid'];
	$uid = $obj['uid'];


	if(strcmp($AppKey,$key)==0){
		

		$pack=array();
		$rating=array();
		$live;
		$pid;
		$todayDate=date("Ymd");
		
		
		$sql = "SELECT bookings.*,package.*,city.* FROM bookings JOIN package ON package.p_id=bookings.p_id JOIN city ON city.c_id=package.city_id WHERE
		 bookings.b_id=$bookid";

		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$pack = $row;
				$live = $row[0]['bookeddateint'];
				$pid = $row[0]['p_id'];
		
			}
			
		} 
		
		$sql2 = "SELECT * FROM ratings WHERE p_id=$pid AND r_user=$uid ORDER BY r_id DESC LIMIT 1";
	
			$result2 = $conn->query($sql2);
		
			if ($result2->num_rows >0) 
			{
				while($row2[] = $result2->fetch_assoc()) 
				{
					$rating = $row2;
		
				}
				
			}

		
		
		

		
		
		echo json_encode(['success' => true,'booking' => $pack,'rating' => $rating ]);
		
		
		
		
		}else{
		echo json_encode(['success' => false,'booking' => $pack,'rating' => $rating ]);
		
	}
	
	
	
	$conn->close();
?>
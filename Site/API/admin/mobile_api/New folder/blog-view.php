<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$bid = $obj['bid'];
	$uid = $obj['uid'];
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		$blog=array();
		$blogimage=array();

		
		
		$sql = "SELECT * FROM news WHERE n_id=$bid";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			$queryupdate=mysqli_query($conn,"UPDATE news SET viewed=viewed+1 WHERE n_id=$bid");
			while($row[] = $result->fetch_assoc()) 
			{
				$blog = $row;
				
				
				
			}
			
			$sql2 = "SELECT * FROM newsimage WHERE n_id=$bid ORDER BY nm_id ASC";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows >0) 
			{
				while($row2[] = $result2->fetch_assoc()) 
				{
					$blogimage = $row2;
				}
			} 
			


			

			
			
			
			
		} 
		
		
		echo json_encode(['success' => true,'blog' => $blog,'blogimage' => $blogimage]);
		
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'blog' => $blog,'blogimage' => $blogimage]);
		
	}
	
	
	
	$conn->close();
?>
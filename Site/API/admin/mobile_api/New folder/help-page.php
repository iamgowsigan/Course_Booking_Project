<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];

	
	if(strcmp($AppKey,$key)==0){
		

		$help=array();
		
		$sql = "SELECT * FROM help WHERE id='1' ORDER BY id LIMIT 1";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$help = $row[0]["detail"];
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'help' => $help ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'help' => $help]);
		
	}
	
	
	
	$conn->close();
?>
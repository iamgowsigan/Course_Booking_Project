<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$vid = $obj['vid'];

	
	if(strcmp($AppKey,$key)==0){
		

		$help=array();
		
		$sql = "SELECT * FROM tbladmin WHERE id='$vid' LIMIT 1";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$help = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'vendor' => $help ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'vendor' => $help]);
		
	}
	
	
	
	$conn->close();
?>
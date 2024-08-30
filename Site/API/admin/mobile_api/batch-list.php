<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
//	$json = file_get_contents('php://input');
//	$obj = json_decode($json,true);
//	$key = $obj['key'];
//	$page = $obj['page'];

	
	$key = $_POST['key'];
	$page = 1;
	
	$start = 0; 
	$limit=10;
	$start = ($page - 1) * $limit; 

	
	if(strcmp($AppKey,$key)==0){
		

		$batch=array();
		
		$sql = "SELECT * FROM batch where batch_active=1 limit $start, $limit";
		
		
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$batch = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'batch' => $batch ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'batch' => $batch]);
		
	}
	
	
	
	$conn->close();
?>
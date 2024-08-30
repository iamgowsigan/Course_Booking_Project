<?php
	include 'try-con.php';
	
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	

		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin:*');
		header('Access-Control-Allow-Headers:Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN, Access-Control-Allow-Origin');
		
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$page = $obj['page'];
	
	$start = 0; 
	$limit=10;
	$start = ($page - 1) * $limit; 

	
	if(strcmp($AppKey,$key)==0){
		

		$blog=array();
		
		$sql = "SELECT * FROM news limit $start, $limit";
		
		
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$blog = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'blog' => $blog ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'blog' => $blog]);
		
	}
	
	
	
	$conn->close();
?>
<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];

	
	if(strcmp($AppKey,$key)==0){
		

		$aminity=array();
		$category=array();
		$tags=array();
		
		$sql = "SELECT * FROM aminity WHERE amn_active=1 ORDER BY amn_name ASC";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$aminity = $row;
			}
			
		} 
		
		
		$sql2 = "SELECT * FROM category WHERE cat_active=1 ORDER BY cat_name ASC";
		$result2 = $conn->query($sql2);
		
		if ($result2->num_rows >0) 
		{
			while($row2[] = $result2->fetch_assoc()) 
			{
				$category = $row2;
			}
			
		} 
		
		$sql3 = "SELECT * FROM tag WHERE tag_active=1 ORDER BY tag_name ASC";
		$result3 = $conn->query($sql3);
		
		if ($result3->num_rows >0) 
		{
			while($row3[] = $result3->fetch_assoc()) 
			{
				$tags = $row3;
			}
			
		} 
		
	
		
		echo json_encode(['success' => true,'aminity' => $aminity ,'category' => $category,'tags' => $tags]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'aminity' => $aminity ,'category' => $category,'tags' => $tags]);
		
	}
	
	
	
	$conn->close();
?>
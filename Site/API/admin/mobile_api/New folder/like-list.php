<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$uid = $obj['uid'];
	$page = $obj['page'];
	
	$start = 0; 
	$limit=3;
	$start = ($page - 1) * $limit; 

	
	if(strcmp($AppKey,$key)==0){
		

		$pack=array();
		
		$sql = "SELECT package_like.*,package.*,city.city_name FROM package_like JOIN package on package.p_id=package_like.p_id 
		JOIN city ON city.c_id=package.city_id WHERE p_active=1 AND package_like.u_id=$uid ORDER BY package_like.p_id ASC limit $start, $limit";
		
		
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$pack = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'packlist' => $pack ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'jsonlist' => []]);
		
	}
	
	
	
	$conn->close();
?>
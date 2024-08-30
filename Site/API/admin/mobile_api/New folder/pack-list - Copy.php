<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$page = $obj['page'];
	
	$aminity = $obj['aminity'];
	$city = $obj['city'];
	$category = $obj['category'];
	$tag = $obj['tag'];
	$minprice = $obj['minprice'];
	$maxprice = $obj['maxprice'];
	$ratings = $obj['ratings'];
	
	
	
	$start = 0; 
	$limit=3;
	$start = ($page - 1) * $limit; 

	
	if(strcmp($AppKey,$key)==0){
		

		$pack=array();
		
		$sql = "SELECT package.*,city.city_name FROM package JOIN city ON city.c_id=package.city_id WHERE 
		category IN ($category)
		ORDER BY p_id ASC limit $start, $limit";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$pack = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => $category,'packlist' => $pack ]);
		
		
		
		
		
		}else{

		echo json_encode(['success' => false,'jsonlist' => []]);
		
	}
	
	
	
	$conn->close();
?>
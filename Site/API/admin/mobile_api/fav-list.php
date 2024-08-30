<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$key = $_POST['key'];
	$page = $_POST['page'];
	$uid = $_POST['uid'];




	$start = 0; 
	$limit=5;
	$start = ($page - 1) * $limit; 

	
	if(strcmp($AppKey,$key)==0){
		

		$pack=array();
		
		$sql = "SELECT favorite.*,products.*,subcategory.* FROM favorite JOIN products ON products.p_id=favorite.p_id JOIN subcategory ON subcategory.sub_id=products.sub_cat WHERE favorite.u_id=$uid limit $start, $limit
		";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$pack = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'productlist' => $pack ]);
		
		
		
		
		
		}else{

		echo json_encode(['success' => false,'productlist' => $pack]);
		
	}
	
	
	
	$conn->close();
?>
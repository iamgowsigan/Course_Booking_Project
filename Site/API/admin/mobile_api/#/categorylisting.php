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
	$cat = $_POST['cat'];
	
	$dated = date('Ymd');
	

	
	
	if(strcmp($AppKey,$key)==0){
		
		
		$catListing=array();

		
		

		$sql = "SELECT product.*, city.*,category.* FROM product JOIN city ON city.city_id=product.city_id JOIN category ON category.cat_id=product.p_id WHERE p_valid>=$dated AND p_active=1 AND product.category_id=$cat ORDER BY views DESC ";
		$result = $conn->query($sql);	
		if ($result->num_rows >0) 
		{
			while($row = $result->fetch_assoc()) 
			{	
				$TagItems=array();
				$tagString="";
				
				$getTagID=explode("  ",$row['p_tags']);
				for ($x = 0; $x < sizeof($getTagID); $x++) {
				$sql4 = "SELECT tag_name FROM tag WHERE tag_id=$getTagID[$x] LIMIT 1";
				$result4 = $conn->query($sql4);
					if ($result4->num_rows >0) 
					{
						while($row4 = $result4->fetch_assoc()) 
						{
							$tagString=$tagString. $row4["tag_name"].", ";
						
						}
					}
				
				}
				
				$tagarray=['tagstring' => $tagString];
				$joinall=$row+$tagarray;
				array_push($catListing,$joinall);

			}
			
		} 
		
		
	



		
		echo json_encode(['success' => true,'catListing' => $catListing ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'catListing' => $catListing ]);
		
		
	}
	
	
	
	$conn->close();
?>
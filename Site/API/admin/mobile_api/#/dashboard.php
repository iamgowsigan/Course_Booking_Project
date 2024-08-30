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
	$city = $_POST['city'];
	$tag = $_POST['tag'];
	
	$page = $_POST['page'];
	$dated = date('Ymd');
	
	$start = 0; 
	$limit=10;
	$start = ($page - 1) * $limit; 
	
	
	if(strcmp($AppKey,$key)==0){
		
		
		$product=array();
		$tempp=array();

		$sql = "SELECT product.*, city.*,category.* FROM product JOIN city ON city.city_id=product.city_id JOIN category ON category.cat_id=product.p_id WHERE p_valid>=$dated AND p_active=1";
		$result2 = $conn->query($sql);	
		if ($result2->num_rows >0) 
		{
			while($row2 = $result2->fetch_assoc()) 
			{	
				$TagItems=array();
				$tagString="";
				
				$getTagID=explode("  ",$row2['p_tags']);
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
				$joinall=$row2+$tagarray;
				array_push($tempp,$joinall);

			}
			
		} 
		
		
		
		
		echo json_encode(['success' => true,'product' => $tempp ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'product' => $product]);
		
	}
	
	
	
	$conn->close();
?>
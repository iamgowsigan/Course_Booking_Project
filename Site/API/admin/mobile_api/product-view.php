<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	

	$key = $_POST['key'];
	$pid = $_POST['pid'];
	$uid = $_POST['uid'];
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		$product=array();
		$productimage=array();
		$tags=array();
		$TagItems=array();
		$TagsID[]="";


		$sql = "SELECT products.*,subcategory.* FROM products JOIN subcategory ON subcategory.sub_id=products.sub_cat WHERE products.p_id=$pid AND products.p_active=1";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			$queryupdate=mysqli_query($conn,"UPDATE products SET p_views=p_views+1 WHERE p_id=$pid");
			while($row[] = $result->fetch_assoc()) 
			{
				$product = $row;
				
				
				
			}
			
			$sql2 = "SELECT * FROM product_image WHERE p_id=$pid ORDER BY pi_id ASC";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows >0) 
			{
				while($row2[] = $result2->fetch_assoc()) 
				{
					$productimage = $row2;
				}
			} 
			
			$sql3 = "SELECT ratings.*,user.* FROM ratings JOIN user on user.id=ratings.r_user WHERE p_id=$pid ORDER BY r_id desc";
			$result3 = $conn->query($sql3);
			if ($result3->num_rows >0) 
			{
				while($row3[] = $result3->fetch_assoc()) 
				{
					$productrating = $row3;
				}
			}
			
			//Category Items
			$TagsID=explode("  ",$product[0]['tag']);
	
			for ($x = 0; $x < sizeof($TagsID); $x++) {
				$sql4 = "SELECT * FROM tag WHERE tag_id=$TagsID[$x] LIMIT 1";
				$result4 = $conn->query($sql4);
				if ($result4->num_rows >0) 
				{
					while($row4 = $result4->fetch_assoc()) 
					{
						
						
						array_push($TagItems, $row4["tag_name"]); 
						
					}
				}
				
			}
			
		
			
			
			
			$querylike = mysqli_query($conn, "SELECT * from favorite WHERE u_id=$uid AND p_id=$pid");
			$countLike = mysqli_num_rows($querylike);
			
			$queryCart = mysqli_query($conn, "SELECT * from cart WHERE u_id=$uid AND p_id=$pid");
			$countCart = mysqli_num_rows($queryCart);
			

			
			
			
			
		} 
		
		
		echo json_encode(['success' => true,'product' => $product,'productimage' => $productimage,'tagitem' => $TagItems,'likes' => $countLike,'cart' => $countCart]);
		
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'product' => $product,'productimage' => $productimage,'tagitem' => $TagItems,'likes' => $countLike,'cart' => $countCart]);
		
	}
	
	
	
	$conn->close();
?>
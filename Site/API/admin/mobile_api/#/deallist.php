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
	$uid = $_POST['uid'];
	
	$dated = date('Ymd');
	

	if(strcmp($AppKey,$key)==0){
		
		
		$product=array();
		$tempp=array();
		
		

		$sql = "SELECT product_deal.*,product_deal.detail as dealdetail,follow.*,product.*, city.*,category.* FROM product_deal 
		RIGHT JOIN follow ON follow.p_id=product_deal.p_id 
		JOIN product ON product.p_id=product_deal.p_id 
		JOIN city ON city.city_id=product.city_id 
		JOIN category ON category.cat_id=product.p_id
		WHERE p_valid>=$dated AND p_active=1 AND follow.u_id=$uid LIMIT 50";
		

		$result2 = $conn->query($sql);	
		if ($result2->num_rows >0) 
		{
			while($row2 = $result2->fetch_assoc()) 
			{	



				array_push($product,$row2);

			}
			
		} 
		
		
		
		
		echo json_encode(['success' => true,'product' => $product ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'product' => $product]);
		
	}
	
	
	
	$conn->close();
?>
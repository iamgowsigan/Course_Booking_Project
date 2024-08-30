<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
	
	$key = $_POST['key'];

	
	
	if(strcmp($AppKey,$key)==0){
		
		
		$product=array();
		$banner=array();
		$category=array();
		$searchList=array();

		$sql = "SELECT products.*,subcategory.* FROM products JOIN subcategory ON subcategory.sub_id=products.sub_cat WHERE p_active=1 ORDER by p_id DESC";
		$result = $conn->query($sql);	
		if ($result->num_rows >0) 
		{
			while($row = $result->fetch_assoc()) 
			{	
				array_push($product,$row);
			}
			
		} 
		
		
		$sql2 = "SELECT * FROM banner order by ban_id DESC";
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows >0) 
		{
			while($row2 = $result2->fetch_assoc()) 
			{	
				array_push($banner,$row2);
			}
			
		}
		
		

		
		$sql6 = "SELECT title FROM products WHERE p_active=1 ORDER BY title ASC";
		$result6 = $conn->query($sql6);	
		if ($result6->num_rows >0) 
		{
			while($row6[] = $result6->fetch_assoc()) 
			{
				$searchList = $row6;
			}
			
		} 
		
		
		
		
		echo json_encode(['success' => true,'product' => $product ,'banner' => $banner ,'searchList' => $searchList ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'product' => $product ,'banner' => $banner ,'searchList' => $searchList  ]);
		
	}
	
	
	
	$conn->close();
?>
<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
	
	$key = $_POST['key'];

	
	
	if(strcmp($AppKey,$key)==0){
		

		$productList=array();

		
		$sql3 = "SELECT products.*,category.* FROM products JOIN category ON category.cat_id=products.p_id order by products.p_id ASC";
		$result3 = $conn->query($sql3);	
		if ($result3->num_rows >0) 
		{
			while($row3 = $result3->fetch_assoc()) 
			{	
				array_push($productList,$row3);
			}
			
		}
		
		
		
		
		echo json_encode($productList);
		
		
		
		
		
		}else{
		echo json_encode($productList);
		
	}
	
	
	
	$conn->close();
?>
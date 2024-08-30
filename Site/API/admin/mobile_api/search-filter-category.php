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
	
	$dated = date('Ymd');
	

		$productList=array();

		$sql = "SELECT cat_id,cat_name,cat_image FROM category WHERE cat_active=1 ORDER BY cat_id ASC";
		$result = $conn->query($sql);	
		if ($result->num_rows >0) 
		{
			while($row = $result->fetch_assoc()) 
			{	

				array_push($productList,$row);

			}
			
		} 
		



		
		echo json_encode($productList);
	
	
	
	$conn->close();
?>
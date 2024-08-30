<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
	
	$key = $_POST['key'];

	
	
	if(strcmp($AppKey,$key)==0){
		

		$category=array();
		$subcategory=array();

		
		$sql3 = "SELECT * FROM subcategory order by sub_id DESC";
		$result3 = $conn->query($sql3);	
		if ($result3->num_rows >0) 
		{
			while($row3 = $result3->fetch_assoc()) 
			{	
				array_push($subcategory,$row3);
			}
			
		}
		
		
		$sql2 = "SELECT * FROM category order by cat_id DESC";
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows >0) 
		{
			while($row2 = $result2->fetch_assoc()) 
			{	
				array_push($category,$row2);
			}
			
		}
		
		
		
		echo json_encode(['success' => true ,'category' => $category,'subcategory' => $subcategory ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false ,'category' => $category,'subcategory' => $subcategory ]);
		
	}
	
	
	
	$conn->close();
?>
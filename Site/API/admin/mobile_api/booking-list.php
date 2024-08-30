<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	
	$key = $_POST['key'];
	$uid = $_POST['uid'];
	
	
	
	if(strcmp($AppKey,$key)==0){
		
		
		$product=array();

		
		$sql = "SELECT * FROM booking WHERE u_id=$uid AND booking_complete='1' ORDER BY b_id DESC";
		$result = $conn->query($sql);	
		if ($result->num_rows >0) 
		{
			while($row = $result->fetch_assoc()) 
			{	
				$getbid= $row["b_id"];
				$sql4 = "SELECT cart.*,products.* FROM cart JOIN products ON products.p_id=cart.p_id WHERE cart.u_id=$uid AND c_booking_id=$getbid  ORDER BY c_id DESC LIMIT 1";
				$result4 = $conn->query($sql4);
					if ($result4->num_rows >0) 
					{
						while($row4 = $result4->fetch_assoc()) 
						{
							$imagelable= $row4["image"];
						
						}
					}
					
				$tagarray=['imagelable' => $imagelable];
				$joinall=$row+$tagarray;
				
				array_push($product,$joinall);
			}
			
		} 
		
		
		
		echo json_encode(['success' => true,'product' => $product ]);
		
		
		
		
		
	}
	else{
		echo json_encode(['success' => false,'product' => $product]);
		
	}
	
	
	
	$conn->close();
?>
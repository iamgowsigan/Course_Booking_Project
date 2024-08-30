<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
	
	$key = $_POST['key'];
	$uid = $_POST['uid'];

	
	
	if(strcmp($AppKey,$key)==0){
		
		
		$product=array();
		$banner=array();
		$category=array();
		$range=array();

		$sql = "SELECT cart.*,products.* FROM cart JOIN products ON products.p_id=cart.p_id WHERE products.p_active=1 AND products.p_available=1 AND cart.u_id=$uid AND cart.c_status=0 ORDER BY c_id DESC";
		$result = $conn->query($sql);	
		if ($result->num_rows >0) 
		{
			while($row = $result->fetch_assoc()) 
			{	
				array_push($product,$row);
				}
			
		} 
		
		$sql2 = "SELECT * FROM shop_range";
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows >0) 
		{
			while($row2 = $result2->fetch_assoc()) 
			{	
				array_push($range,$row2);
				}
			
		} 
		
		
		$query4 = mysqli_query($conn, "SELECT SUM(mrp*quantity) as totalamount, SUM(quantity) as totalquantity FROM cart JOIN products ON products.p_id=cart.p_id WHERE cart.u_id=$uid AND products.p_active=1 AND products.p_available=1 AND cart.c_status=0");
		$rowsum = mysqli_fetch_array($query4);
		$totalAmount = $rowsum['totalamount'];
		$totalquantity = $rowsum['totalquantity'];
		
		
		
		
		
		echo json_encode(['success' => true,'product' => $product,'totalAmount' => $totalAmount,'totalquantity' => $totalquantity ,'range' => $range  ]);
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'product' => $product,'totalAmount' => $totalAmount,'totalquantity' => $totalquantity ,'range' => $range  ]);
		
	}
	
	
	
	$conn->close();
?>
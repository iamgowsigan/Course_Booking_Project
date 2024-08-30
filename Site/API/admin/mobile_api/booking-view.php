<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
	
	$key = $_POST['key'];
	$bid = $_POST['bid'];

	
	
	if(strcmp($AppKey,$key)==0){
		
		
		$product=array();
		$banner=array();
		$category=array();

		$sql = "SELECT cart.*,products.* FROM cart JOIN products ON products.p_id=cart.p_id WHERE cart.c_booking_id=$bid ORDER BY cart.c_id DESC";
		$result = $conn->query($sql);	
		if ($result->num_rows >0) 
		{
			while($row = $result->fetch_assoc()) 
			{	
				array_push($product,$row);
				}
			
		} 
		
		
		$query4 = mysqli_query($conn, "SELECT SUM(mrp*quantity) as totalamount, SUM(quantity) as totalquantity FROM cart JOIN products ON products.p_id=cart.p_id WHERE cart.c_booking_id=$bid");
		$rowsum = mysqli_fetch_array($query4);
		$totalAmount = $rowsum['totalamount'];
		$totalquantity = $rowsum['totalquantity'];
		
		$query5 = mysqli_query($conn, "SELECT * FROM booking WHERE b_id=$bid");
		$rowsum2 = mysqli_fetch_array($query5);
		
		$address = $rowsum2['b_address'];
		$city = $rowsum2['b_city'];
		$phone = $rowsum2['b_phone'];
		$summary = $rowsum2['b_send_summary'];
		$received = $rowsum2['b_received'];
		$b_price = $rowsum2['b_price'];
		$b_quantity = $rowsum2['b_quantity'];
		$b_created_on = $rowsum2['b_created_on'];
		
		
		
		
		
		echo json_encode(['success' => true,'product' => $product,
		'address' => $address,
		'city' => $city,
		'phone' => $phone,
		'summary' => $summary,
		'received' => $received,
		'price' => $b_price,
		'quantity' => $b_quantity,
		'created' => $b_created_on  
		]);
		
		
		
		
		
		}else{
		
		echo json_encode(['success' => false,'product' => $product,
		'address' => $address,
		'city' => $city,
		'phone' => $phone,
		'summary' => $summary,
		'received' => $received,
		'price' => $b_price,
		'quantity' => $b_quantity,
		'created' => $b_created_on  
		]);
		
	}
	
	
	
	$conn->close();
?>
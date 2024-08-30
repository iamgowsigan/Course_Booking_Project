<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	

	$key = $_POST['key'];
    $uid = $_POST['uid'];
    $pid = $_POST['pid'];
	
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $zip = $_POST['zip'];
    $delivery = $_POST['delivery'];


	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
	
	

		
			$sql = "INSERT INTO booking(u_id,p_id,b_price,b_quantity,b_address,b_city,b_phone,payment_status,zip, delivery_range,book_type) VALUES ('$uid','$pid','$price','$quantity','$address','$city','$phone','W','$zip','$delivery','P')";
			
			if(mysqli_query($conn, $sql)){
				$last_id = mysqli_insert_id($conn);

				
				echo json_encode(['success' => true,'insertid' => $last_id]);
				
			}
			else{
			
				echo json_encode(['success' => false,'insertid' => $last_id]);
			}
		
		
		
		
		}
	else{
		echo json_encode(['success' => false,'insertid' => $last_id]);
		
	}
	
	
	
	
	
	
	$conn->close();
?>
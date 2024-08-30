<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	


    $key = $_POST['key'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];


	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
	
		
		
		
		$checkuser = mysqli_query($conn, "select * from user WHERE (phone='$phone' OR email='$email')");
		$countuser = mysqli_num_rows($checkuser);
		
		if ($countuser == 0) {
			
			$sql = "INSERT INTO user(name,email,password,phone,city) VALUES ('$name','$email','$password','$phone','$city')";
			if(mysqli_query($conn, $sql)){
			$last_id = $conn->insert_id;
				
				
				
				echo json_encode(['success' => true,'userid' => "$last_id"]);
				
			}
			else{
				echo json_encode(['success' => false,'userid' => "0"]);
			}
			
		}
		else{
			
			
			echo json_encode(['success' => true,'userid' => "0"]);
			
		}
		
		}else{
		echo json_encode(['success' => false,'userid' => "0"]);
		
	}
	
	
	
	$conn->close();
?>
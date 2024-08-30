<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
    $key = $_POST['key'];
    $uid = $_POST['uid'];

    $name = $_POST['name'];
    $phone = $_POST['phone'];

	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
	
			$sql = "UPDATE user SET name='$name',phone='$phone' WHERE id='$uid'";
			if(mysqli_query($conn, $sql)){

				
				
				
				echo json_encode(['success' => true]);
				
			}
			else{
				echo json_encode(['success' => false]);
			}
			
			
		
		}else{
		
		echo json_encode(['successkey' => $uid]);
		
	}
	
	
	
	$conn->close();
?>
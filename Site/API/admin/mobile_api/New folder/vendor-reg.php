<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
    $key = $_POST['key'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $lableName = $_POST['lableName'];
    $name = $_POST['name'];
    $actype = $_POST['actype'];
	
	$options = ['cost' => 12];
	$hashedpass=password_hash($password, PASSWORD_BCRYPT, $options);

	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
	
		
		
		
		$checkuser = mysqli_query($conn, "select * from tbladmin WHERE (admin_email='$email' OR username='$email')");
		$countuser = mysqli_num_rows($checkuser);
		
		if ($countuser == 0) {
			
			$sql = "INSERT INTO tbladmin(username,password,admin_name,admin_email,admin_company,admin_type,admin_percent,power,admin_active) VALUES ('$email','$hashedpass','$name','$email','$lableName','$actype','30','0','0')";
			if(mysqli_query($conn, $sql)){
			$last_id = $conn->insert_id;
				
				
				
				echo json_encode(['success' => true,'alert' => "Added",'vid' => $last_id]);
				
			}
			else{
				echo json_encode(['success' => true,'alert' => "Error",'vid' => "0"]);
			}
			
		}
		else{
			
			
			echo json_encode(['success' => false,'alert' => "Already exists",'vid' => "0"]);
			
			}
		
		}	
	
	
	$conn->close();
?>
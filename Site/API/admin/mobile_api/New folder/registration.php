<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$image = $_POST['image'];
    $key = $_POST['key'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
	$filename="";
	
	if($image=="no"){
		$filename="";
	}else{
	
		define('UPLOAD_DIR', '../../mec/');
		$realImage = base64_decode($image);
		$filename = 'profile_'. uniqid() . '.png';
		$target = UPLOAD_DIR .$filename;
		file_put_contents($target, $realImage);
	}
 
	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
	
		
		
		
		$checkuser = mysqli_query($conn, "select * from user WHERE email='$email'");
		$countuser = mysqli_num_rows($checkuser);
		
		if ($countuser == 0) {
			
			$sql = "INSERT INTO user(name,email,password,profile_image,phone) VALUES ('$name','$email','$password','$filename','$phone')";
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
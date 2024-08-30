<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$image = $_POST['image'];
    $key = $_POST['key'];
    $uid = $_POST['uid'];
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
	
		$sql = "UPDATE user SET profile_image='$filename' WHERE u_id='$uid'";
			
			
			if(mysqli_query($conn, $sql)){
			$last_id = $conn->insert_id;
				
				
				
				echo json_encode(['success' => true,'userid' => "$last_id"]);
				
			}
			else{
				echo json_encode(['success' => false,'userid' => "0"]);
			}
		
		}else{
		echo json_encode(['success' => false,'userid' => "0"]);
		
	}
	
	
	
	$conn->close();
?>
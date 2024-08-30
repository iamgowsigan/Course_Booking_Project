<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	

	$key = $_POST['key'];
    $uid = $_POST['uid'];
    $pid = $_POST['pid'];
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
			$checkuser = mysqli_query($conn, "select * from follow WHERE u_id='$uid' AND p_id='$pid'");
			$countuser = mysqli_num_rows($checkuser);
	
			if ($countuser == 0) {
			
			$sql = "INSERT INTO follow(u_id,p_id) VALUES ('$uid','$pid')";
			if(mysqli_query($conn, $sql)){
			
				$queryupdate=mysqli_query($conn,"UPDATE product SET follow=follow+1 WHERE p_id=$pid");

				echo json_encode(['success' => true,'action' => 'added']);
			
			}
			else{
				echo json_encode(['success' => false,'action' => 'failed']);
			}
		
		}
		else{
		
			$sql = "delete from follow WHERE u_id=$uid AND p_id=$pid";
			$result = $conn->query($sql);
			$queryupdate=mysqli_query($conn,"UPDATE product SET follow=follow-1 WHERE p_id=$pid");
			echo json_encode(['success' => true,'action' => 'deleted']);
		
		}
		
		
		}else{
		echo json_encode(['success' => false,'action' => 'fail']);
		
	}
	
	
	
	$conn->close();
?>
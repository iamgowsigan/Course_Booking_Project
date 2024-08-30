<?php

include 'DatabaseConfig.php';

// Create connection
//$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 if($conn != null)
 {
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);

	$uid = $obj['uid'];
	$pid = $obj['pid'];
	$key = $obj['key'];

	
	

	if(strcmp($AppKey,$key)==0){
		

			$checkuser = mysqli_query($conn, "select * from package_like WHERE u_id='$uid' AND p_id='$pid'");
			$countuser = mysqli_num_rows($checkuser);
	
			if ($countuser == 0) {
			
			$sql = "INSERT INTO package_like(u_id,p_id) VALUES ('$uid','$pid')";
			if(mysqli_query($conn, $sql)){

				echo json_encode(['success' => true,'action' => 'added']);
			
			}
			else{
				echo json_encode(['success' => false,'action' => 'added']);
			}
		
		}
		else{
		
			$sql = "delete from package_like WHERE u_id=$uid AND p_id=$pid";
			$result = $conn->query($sql);
			echo json_encode(['success' => true,'action' => 'deleted']);
		
		}
		
		
	}else{
		
		echo json_encode(['success' => false,'jsonlist' => []]);
		
	}
	

	

 
 mysqli_close($conn);
 
 
 }
 
 
 else{
 echo "0";
 }

?>
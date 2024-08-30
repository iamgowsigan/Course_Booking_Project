<?php

include 'DatabaseConfig.php';

// Create connection
//$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 if($conn != null)
 {
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);

	$key = $obj['key'];
	$uid = $obj['uid'];
	$reason = $obj['reason'];
	$amount = $obj['amount'];
	$dated = date('d M Y');

	
	if(strcmp($AppKey,$key)==0){
		

		$sql = "INSERT INTO wallet(u_id,reason,amount,type,dated) VALUES 
			('$uid','$reason','$amount','1','$dated')";
			if(mysqli_query($conn, $sql)){
			
				$query = mysqli_query($conn, "UPDATE user SET wallet=wallet+$amount WHERE id=$uid");

				echo json_encode(['success' => true]);
			
			}
			else{
				echo json_encode(['success' => false]);
			}
		
		
	}else{
		
		echo json_encode(['success' => false]);
		
	}
	

	

 
 mysqli_close($conn);
 
 
 }
 
 
 else{
 echo "0";
 }

?>
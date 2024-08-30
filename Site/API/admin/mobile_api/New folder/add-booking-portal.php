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
		$pid = $obj['pid'];
		$Bookeddated = $obj['dated'];
		$datedint = $obj['datedint'];
		$vid = $obj['vendor'];
		
		$childno = $obj['childno'];
		$adultno = $obj['adultno'];
		
		$total_person = $obj['total_person'];
		$pricechild = $obj['pricechild'];
		$priceadult = $obj['priceadult'];
		$totalprice = $obj['totalprice'];
		$pname = $obj['pname'];
		$note = $obj['note'];
		$venderpercent = $obj['venderpercent'];
		$dated = date('d M Y');
		$balance = "";
		
		$erdifnyShare=($totalprice/100)*$venderpercent;
		$vendorShare=$totalprice-$erdifnyShare;
		
		
		
		
		
		
		if(strcmp($AppKey,$key)==0){
		

				$checkuser = mysqli_query($conn, "select * from bookings WHERE u_id='$uid' AND p_id='$pid' AND booked_dated='$Bookeddated'");
				$countuser = mysqli_num_rows($checkuser);
			
				if ($countuser == 0) {
				
				
					$sql = "INSERT INTO wallet(u_id,reason,amount,type,dated) VALUES 
					('$uid','Direct Booking from Payment Gateway','$totalprice','1','$dated')";
					if(mysqli_query($conn, $sql)){
			
						$query = mysqli_query($conn, "UPDATE user SET wallet=wallet+$totalprice WHERE id=$uid");
						
						$sql = "INSERT INTO bookings(p_id,u_id,child_no,adult_no,total_person,pricechild,priceadult,totalprice,booked_dated,bookeddateint,pament_status,v_id, erdifny_share,vendor_share ,erdifny_percentage,booking_note) VALUES 
						('$pid','$uid','$childno','$adultno','$total_person','$pricechild','$priceadult','$totalprice','$Bookeddated','$datedint','S','$vid','$erdifnyShare','$vendorShare','$venderpercent','$note')";
						if(mysqli_query($conn, $sql)){
					
							$query = mysqli_query($conn, "UPDATE package SET booking_count=booking_count+1 WHERE p_id=$pid");
							$query = mysqli_query($conn, "UPDATE user SET wallet=(wallet-$totalprice) WHERE id=$uid");
							$query = mysqli_query($conn, "INSERT INTO wallet(u_id,reason,amount,type,dated) VALUES 
								('$uid','$pname','$totalprice','0','$dated')");
					
							echo json_encode(['success' => true,'action' => 'added']);
					
						}
						else{
							echo json_encode(['success' => false,'action' => 'Failed']);
						}
	
						
			
					}


				
				}
				else{

					echo json_encode(['success' => false,'action' => 'Already you Booked']);	
				}
				
		
			
			
			
			
			
			}

		else{
			
			echo json_encode(['success' => false,'jsonlist' => []]);
			
		}
		
		
		
		
		
		mysqli_close($conn);
		
		
	}
	
	
	else{
		echo "0";
	}

?>
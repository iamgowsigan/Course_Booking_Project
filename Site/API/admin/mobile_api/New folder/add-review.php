
<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$image = $_POST['image'];
    $key = $_POST['key'];
    $bookid = $_POST['bid'];
    $ratingcount = $_POST['rating'];
    $comment = $_POST['comment'];
    $prid = $_POST['pid'];
    $uid = $_POST['uid'];
	$filename="";
	

	if($image=="no"){
		$filename="";
	}else{
	
		define('UPLOAD_DIR', '../../mec/');
		$realImage = base64_decode($image);
		$filename = 'rating_'. uniqid() . '.png';
		$target = UPLOAD_DIR .$filename;
		file_put_contents($target, $realImage);
	}
 
	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
	
		$pack=array();
		$rating=array();
		$live;
		$pid;
		$todayDate=date("Ymd");
		
		
		$sql = "INSERT INTO ratings(p_id,r_user,r_stars,r_commend,r_image) VALUES 
		('$prid','$uid','$ratingcount','$comment','$filename')";
		if(mysqli_query($conn, $sql)){
			
			
			$sql = "SELECT bookings.*,package.*,city.* FROM bookings JOIN package ON package.p_id=bookings.p_id JOIN city ON city.c_id=package.city_id WHERE
			bookings.b_id=$bid";
			
			$result = $conn->query($sql);
			
			if ($result->num_rows >0) 
			{
				while($row[] = $result->fetch_assoc()) 
				{
					$pack = $row;
					$live = $row[0]['bookeddateint'];
					$pid = $row[0]['p_id'];
					
				}
				
			} 
			
			if($live<$todayDate){
				
				$sql2 = "SELECT * FROM ratings WHERE p_id=$pid AND r_user=$uid ORDER BY r_id DESC LIMIT 1";
				
				$result2 = $conn->query($sql2);
				
				if ($result2->num_rows >0) 
				{
					while($row2[] = $result2->fetch_assoc()) 
					{
						$rating = $row2;
						
					}
					
				} 
				
			}	
			
		}
		
		
		echo json_encode(['success' => true,'booking' => $pack,'rating' => $rating ]);
		
		
		
		
	}else{
		echo json_encode(['success' => false,'userid' => "0"]);
		
	}
	
	
	
	$conn->close();
?>


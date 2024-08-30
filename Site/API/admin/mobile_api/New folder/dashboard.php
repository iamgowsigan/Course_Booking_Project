<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		$city=array();
		$cityName=array();
		$pack=array();
		$banner=array();
		$blog=array();
		
		
		$sql = "SELECT * FROM package WHERE p_active=1 ORDER BY p_id ASC LIMIT 10";
		$result = $conn->query($sql);	
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$pack = $row;
			}
			
		} 
		
		
		$sql2 = "SELECT * FROM city WHERE city_active=1 ORDER BY c_id ASC  LIMIT 6";
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows >0) 
		{
			while($row2[] = $result2->fetch_assoc()) 
			{
				$city = $row2;
				
			
			}
		} 
		
		$sql3 = "SELECT banner.ban_image,banner.ban_text FROM banner ORDER BY ban_id DESC  LIMIT 5";
		$result3 = $conn->query($sql3);	
		if ($result3->num_rows >0) 
		{
			while($row3[] = $result3->fetch_assoc()) 
			{
				$banner = $row3;
			}
			
		} 
		
		$sql4 = "SELECT * FROM news ORDER BY n_id DESC  LIMIT 5";
		$result4 = $conn->query($sql4);	
		if ($result4->num_rows >0) 
		{
			while($row4[] = $result4->fetch_assoc()) 
			{
				$blog = $row4;
			}
			
		} 

		
		echo json_encode(['success' => true,'packlist' => $pack ,'citylist' => $city,'cityname' => $cityName,'bannerlist' => $banner,'blog' => $blog]);


		
		}else{


		echo json_encode(['success' => false,'packlist' => $pack ,'citylist' => $city,'cityname' => $cityName,'bannerlist' => $banner,'blog' => $blog]);
		
	}
	
	
	
	$conn->close();
?>
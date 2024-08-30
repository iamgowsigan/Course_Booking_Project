<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$pid = $obj['pid'];
	$uid = $obj['uid'];
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		$product=array();
		$productimage=array();
		$productrating=array();
		$CategoryID="";
		$TagsID[]="";
		$AminityID[]="";
		$CityRangeID[]="";
		
		$CategoryItems=array();
		$TagsItems=array();
		$AminityItems=array();
		$CityRangeItems=array();
		$Reviews=array();
		
		
		
		$sql = "SELECT package.*,tbladmin.*,city.* FROM package 
		JOIN tbladmin ON tbladmin.id=package.vendor_id 
		JOIN city on city.c_id=package.city_id WHERE package.p_id=$pid AND package.p_active=1";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			$queryupdate=mysqli_query($conn,"UPDATE package SET view_count=view_count+1 WHERE p_id=$pid");
			while($row[] = $result->fetch_assoc()) 
			{
				$product = $row;
				
				
				
			}
			
			$sql2 = "SELECT * FROM package_image WHERE p_id=$pid ORDER BY pi_id ASC";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows >0) 
			{
				while($row2[] = $result2->fetch_assoc()) 
				{
					$productimage = $row2;
				}
			} 
			
			$sql3 = "SELECT ratings.*,user.* FROM ratings JOIN user on user.id=ratings.r_user WHERE p_id=$pid ORDER BY r_id desc";
			$result3 = $conn->query($sql3);
			if ($result3->num_rows >0) 
			{
				while($row3[] = $result3->fetch_assoc()) 
				{
					$productrating = $row3;
				}
			}
			
			//Category Items
			$CategoryID=explode("  ",$product[0]['category']);
	
			for ($x = 0; $x < sizeof($CategoryID); $x++) {
				$sql4 = "SELECT * FROM category WHERE cat_id=$CategoryID[$x] LIMIT 1";
				$result4 = $conn->query($sql4);
				if ($result4->num_rows >0) 
				{
					while($row4 = $result4->fetch_assoc()) 
					{
						
						
						array_push($CategoryItems, $row4["cat_name"]); 
						
					}
				}
				
			}
			
			//Tag Items
			$TagsID=explode("  ",$product[0]['tag']);
	
			for ($x = 0; $x < sizeof($TagsID); $x++) {
				$sql4 = "SELECT * FROM tag WHERE tag_id=$TagsID[$x] LIMIT 1";
				$result4 = $conn->query($sql4);
				if ($result4->num_rows >0) 
				{
					while($row4 = $result4->fetch_assoc()) 
					{

						array_push($TagsItems, $row4["tag_name"]); 
						
					}
				}
				
			}
			
			//AminityItems
			$AminityID=explode("  ",$product[0]['aminity']);
	
			for ($y = 0; $y < sizeof($AminityID); $y++) {
				$sql4 = "SELECT * FROM aminity WHERE amn_id=$AminityID[$y] LIMIT 1";
				$result4 = $conn->query($sql4);
				if ($result4->num_rows >0) 
				{
					while($row4 = $result4->fetch_assoc()) 
					{
						
						$Aminity=array();
					//	$AminityItems=$row4;

						
						array_push($AminityItems, $row4); 
						
						
					}
					
				}
				
			}
			

			
			
			//City Items
			$CityRangeID=explode("  ",$product[0]['cityrange']);
	
			for ($x = 0; $x < sizeof($CityRangeID); $x++) {
				$sql4 = "SELECT * FROM city WHERE c_id=$CityRangeID[$x] LIMIT 1";
				$result4 = $conn->query($sql4);
				if ($result4->num_rows >0) 
				{
					while($row4 = $result4->fetch_assoc()) 
					{

						array_push($CityRangeItems, $row4["city_name"]); 
						
					}
				}
				
			}
			
			
			
			$querylike = mysqli_query($conn, "SELECT * from package_like WHERE u_id=$uid AND p_id=$pid");
			$countLike = mysqli_num_rows($querylike);
			

			
			
			
			
		} 
		
		
		echo json_encode(['success' => true,'product' => $product,'productimage' => $productimage,'productrating' => $productrating,'categoryitem' => $CategoryItems,'tagitem' => $TagsItems,'aminityitem' => $AminityItems,'cityRangeitem' => $CityRangeItems,'likes' => $countLike]);
		
		
		
		
		
		
		}else{
		echo json_encode(['success' => false,'jsonlist' => []]);
		
	}
	
	
	
	$conn->close();
?>
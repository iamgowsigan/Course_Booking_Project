<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	
	$key = $obj['key'];
	$page = $obj['page'];
	
	$aminity = $obj['aminity'];
	$city = $obj['city'];
	$category = $obj['category'];
	$tag = $obj['tag'];
	$minprice = $obj['minprice'];
	$maxprice = $obj['maxprice'];
	$ratings = $obj['ratings'];
	$today = $obj['today'];
	$tomorrow = $obj['tomorrow'];
	$selectdate = $obj['selectdate'];
	$popular = $obj['popular'];
	$citylist = $obj['citylist'];
	$offers = $obj['offers'];
	

	
	//Category	
	$categoryarray=explode(",",$category);
	
	if($category!=""){
		$category_class=" AND (";
		for($i=0;$i<sizeof($categoryarray);$i++ ){
			$category_class=$category_class."category LIKE ".$categoryarray[$i]. " OR ";
		}
		
		$category_class=substr($category_class, 0, -4)." )";
	}
	
	//aminity
	$aminityarray=explode(",",$aminity);
	
	if($aminity!=""){
		$aminity_class=" AND (";
		
		for($i=0;$i<sizeof($aminityarray);$i++ ){
			$aminity_class=$aminity_class."aminity LIKE '%".$aminityarray[$i]."%' OR ";
		}
		
		$aminity_class=substr($aminity_class, 0, -4)." )";
	}
	
	
	//Tags
	$tagarray=explode(",",$tag);
	
	if($tag!=""){
		$tag_class=" AND (";
		
		for($i=0;$i<sizeof($tagarray);$i++ ){
			$tag_class=$tag_class."tag LIKE '%".$tagarray[$i]."%' OR ";
		}
		
		$tag_class=substr($tag_class, 0, -4)." )";
	}
	
	
	//Ratings
	
	$ratingarray=explode(",",$ratings);
	if($ratings!=""){
		$rating_class=" AND (";
		for($i=0;$i<sizeof($ratingarray);$i++ ){
			$rating_class=$rating_class."ratings LIKE ".$ratingarray[$i]. " OR ";
		}
		
		$rating_class=substr($rating_class, 0, -4)." )";
	}
	
	
//CITYList
	
	$cityarray=explode(",",$citylist);
	if($citylist!=""){
		$citylist_class=" AND (";
		for($i=0;$i<sizeof($cityarray);$i++ ){
			$citylist_class=$citylist_class."city_id = ".$cityarray[$i]. " OR ";
		}
		
		$citylist_class=substr($citylist_class, 0, -4)." )";
	}

	//Popular
	
	if($popular!=""){
		$popular_class=" p_id ASC ";
	}else{
		$popular_class=" booking_count DESC ";
	}
	
		//today
	

	//OFFERS
	
	if($offers!=""){
		$offers_class=" AND ( offer_adult_price !='')";
	}
	

	
	
	$start = 0; 
	$limit=3;
	$start = ($page - 1) * $limit; 

	
	if(strcmp($AppKey,$key)==0){
		

		$pack=array();
		
		$sql = "SELECT package.*,city.city_name FROM package JOIN city ON city.c_id=package.city_id WHERE 
		(city_name LIKE '%$city%') 
		AND (adultprice BETWEEN $minprice AND $maxprice)$category_class $aminity_class $tag_class $rating_class $citylist_class $today_class $offers_class AND p_active=1 ORDER BY $popular_class limit $start, $limit
		";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$pack = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'packlist' => $pack ]);
		
		
		
		
		
		}else{

		echo json_encode(['success' => false,'packlist' => $pack]);
		
	}
	
	
	
	$conn->close();
?>
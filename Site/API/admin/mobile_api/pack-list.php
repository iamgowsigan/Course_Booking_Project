<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$key = $_POST['key'];
	$page = $_POST['page'];
	$category = $_POST['category'];
	$subcategory = $_POST['subcategory'];
	$minprice = $_POST['minprice'];
	$maxprice = $_POST['maxprice'];
	
	
	$priceOrder = $_POST['priceOrder'];
	$itemOrder = $_POST['itemOrder'];
	
	$ageOrder = $_POST['ageOrder'];
	
	
	
	//Category	
	$categoryarray=explode(",",$category);
	
	if($category!=""){
		$category_class=" AND (";
		for($i=0;$i<sizeof($categoryarray);$i++ ){
			$category_class=$category_class."category_id LIKE '".$categoryarray[$i]. "' OR ";
		}
		
		$category_class=substr($category_class, 0, -4)." )";
	}
	
	//Category	
	$subcategoryarray=explode(",",$subcategory);
	
	if($subcategory!=""){
		$subcategory_class=" AND (";
		for($i=0;$i<sizeof($subcategoryarray);$i++ ){
			$subcategory_class=$subcategory_class."sub_cat LIKE '".$subcategoryarray[$i]. "' OR ";
		}
		
		$subcategory_class=substr($subcategory_class, 0, -4)." )";
	}
	
	
	
	if($priceOrder=="1"){
		$pricefilter_class=" ,mrp ASC";
	}else{
	
		if($priceOrder=="0"){
			$pricefilter_class=" ,mrp DESC";
		}else{
			$pricefilter_class="";
		}
	}
	
	
	if($itemOrder=="1"){
		$itemfilter_class=" ,p_id ASC";
	}else{
	
		if($itemOrder=="0"){
			$itemfilter_class=" ,p_id DESC";
		}else{
			$itemfilter_class="";
		}
	}
	
	if($agefilter!=""){
		$agefilter_class=" AND age=".$agefilter;
		
	}else{
	
		$agefilter_class="";	
	}
	

	


	$start = 0; 
	$limit=5;
	$start = ($page - 1) * $limit; 

	
	if(strcmp($AppKey,$key)==0){
		

		$pack=array();
		
		$sql = "SELECT products.*,subcategory.sub_name FROM products JOIN subcategory ON subcategory.sub_id=products.sub_cat WHERE p_active=1 AND (mrp BETWEEN $minprice AND $maxprice)  $category_class $subcategory_class ORDER BY p_active ASC $pricefilter_class $itemfilter_class limit $start, $limit
		";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$pack = $row;
			}
			
		} 
		
		

		
		echo json_encode(['success' => true,'productlist' => $pack ]);
		
		
		
		
		
		}else{

		echo json_encode(['success' => false,'productlist' => $pack]);
		
	}
	
	
	
	$conn->close();
?>
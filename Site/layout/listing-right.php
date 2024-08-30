<div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-40">
	<div class="row">
		
		<?php
			
			
			
			
			$getCat = $_GET['cat'];
			$getAge = $_GET['age'];
			$getPrice = $_GET['price'];
			$getTitle = $_GET['title'];
			
			$getCatarray=explode(",",$getCat);
			if($getCat!=""){
				$cat_class=" AND (";
				
				for($i=0;$i<sizeof($getCatarray);$i++ ){
					$cat_class=$cat_class."category_id LIKE '%".$getCatarray[$i]."%' OR ";
				}
				
				$cat_class=substr($cat_class, 0, -28)." )";
			}
			
			
			$getAgearray=explode(",",$getAge);
			if($getAge!=""){
				$age_class=" AND (";
				
				for($i=0;$i<sizeof($getAgearray);$i++ ){
					$age_class=$age_class."age LIKE '%".$getAgearray[$i]."%' OR ";
				}
				
				$age_class=substr($age_class, 0, -21)." )";
			}
			
			$getPricearray=explode(",",$getPrice);
			if($getPrice!=""){
				$price_class=" AND ( mrp BETWEEN ".$getPricearray[0]." AND ".$getPricearray[1].")";
				
			}
			
			if($getTitle!=""){
				$Title_class=" AND ( title LIKE '%".$getTitle."%' OR detail LIKE '%".$getTitle."%' )";
				
			}
			
			
			
	
			
			
			
			
			if (isset($_GET['pageno'])) {
				$pageno = $_GET['pageno'];
				} else {
				$pageno = 1;
			}
			
			$no_of_records_per_page = 9;
			$offset = ($pageno-1) * $no_of_records_per_page;
			$total_pages_sql = "SELECT COUNT(*) FROM products WHERE p_active=1 $cat_class.$price_class";
			$result = mysqli_query($con,$total_pages_sql);
			$total_rows = mysqli_fetch_array($result)[0];
			$total_pages = ceil($total_rows / $no_of_records_per_page);
			
			
			
			$query=mysqli_query($con,"SELECT products.*,category.* FROM products 
			
			JOIN category ON category.cat_name=products.category_id 
			WHERE p_active=1 $cat_class $price_class $Title_class
			ORDER BY p_id DESC LIMIT $offset, $no_of_records_per_page");
			
			
			
			if(mysqli_num_rows($query)==0){
			?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Listing Found</p>
			<?php
				
			}
			while($row = mysqli_fetch_array($query))
			{
			?>	
			
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-40">
				
				<div class="product-item mycard" style="border-style: groove;border: 1px solid #c6daf9;">
					<div class="product-inner">
						
						<div class="image ">
							<img src="API/mec/<?php echo htmlentities($row['image']); ?>" style="height:300px;object-fit:cover;">
							
							<div class="image-overlay">
								<div class="action-buttons">
									<a href="single-list.php?id=<?php echo htmlentities($row['p_id']); ?>"><button>View</button></a>
									
									<button onclick="location.href='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?pid=<?php echo htmlentities($row['p_id']); ?>&&action=cart'">add to Cart</button>
								</div>
							</div>
							
						</div>
						
						<div class="content">
							
							<div class="content-left">
								
								<h4 class="title"><a href="single-product.html"><?php echo htmlentities($row['title']); ?></a></h4>
								
								
								<div class="ratting">
									<p><i class="fa fa-folder" ></i><a href="single-product.html"><?php echo htmlentities($row['cat_name']); ?></a></p>
								</div>
								
								<h5 class="size">₹ <?php echo htmlentities($row['mrp']); ?> INR  
									<?php if($row['offer']!=""){ ?>
										<span style="text-decoration: line-through;color:red;">₹ <?php echo htmlentities($row['offer']); ?> INR</span>
									<?php } ?>
								</h5>
								<h5 class="color"><?php echo htmlentities($row['activity']); ?></h5>
								
							</div>
							
							<div class="content-right">
								<span class="price">₹<?php echo htmlentities($row['mrp']); ?></span>
								
							</div>
							
						</div>
						
					</div>
				</div>
				
			</div>
			
			
		<?php } ?>
		
		
		
		<div class="col-12">
			<ul class="page-pagination">
				<li><a href="?pageno=1"><i class="fa fa-angle-double-left"></i></a></li>
				<li ><a  href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left"></i></a></li>
				<li><a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> "><i class="fa fa-angle-right"></i></a></li>
				
				<li><a href="?pageno=<?php echo $total_pages; ?>"><i class="fa fa-angle-double-right"></i></a></li>
			</ul>
		</div>
		
		
		
		
		
	</div>
</div>

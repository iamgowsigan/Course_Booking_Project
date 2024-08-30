<div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">
	
	<div class="sidebar">
		<h4 class="sidebar-title">Category</h4>
		<ul class="sidebar-list">
			
			<?php
				
				$query=mysqli_query($con,"SELECT products.*,category.*,COUNT(*) AS totalitem FROM products JOIN category ON category.cat_id=products.category_id WHERE products.p_active=1 GROUP BY products.category_id");
				if(mysqli_num_rows($query)==0){
				?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Items</p>
				<?php
					
				}
				while($row = mysqli_fetch_array($query))
				{
				?>
				<li><a href="listing.php?cat=<?php echo htmlentities($row['cat_id']); ?>"><?php echo htmlentities($row['cat_name']); ?> <span class="num"><?php echo htmlentities($row['totalitem']); ?></span></a></li>
				
				
			<?php	} ?>
			
		</ul>
	</div>
	
	<div class="sidebar">
		<h4 class="sidebar-title">Age</h4>
		<ul class="sidebar-list">
			<li><a href="listing.php?agemin=0&agemax=1">0 - 12 Months</a></li>
			<li><a href="listing.php?agemin=1&agemax=3">1 - 3 Years</a></li>
			<li><a href="listing.php?agemin=3&agemax=6">3 - 6 Years</a></li>
			<li><a href="listing.php?agemin=6&agemax=9">6 - 9 Years</a></li>
			<li><a href="listing.php?agemin=9&agemax=13">9 - 13 Years</a></li>
			<li><a href="listing.php?agemin=13&agemax=50">13+ Years</a></li>
		</ul><br>

	</div>
	
		

	
	<div class="sidebar">
		<h3 class="sidebar-title">Price</h3>
		
		<div class="sidebar-price">
			<div id="price-range"></div>
			<input type="text" id="price-amount" readonly>
		</div>
	</div>
	

	
</div>
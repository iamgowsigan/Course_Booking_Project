
<!-- Page Section Start -->
<div class="section section-padding">
	<div class="container">
		
		<div class="row">
			<div class="section-title text-center col mb-30">
				<h1 style="color:#0d72b4">Top Viewed Products</h1>
				<p style="color:#f1891e">All popular product find here</p>
			</div>
		</div>
		
		<!-- Single Product Thumbnail Slider -->
		<ul id="pro-thumb-img" class="pro-thumb-img">
			
			<?php
				
				
				$query=mysqli_query($con,"SELECT products.*,category.* FROM products JOIN category ON category.cat_id=products.category_id WHERE p_active=1 ORDER BY p_views DESC LIMIT 8");
				if(mysqli_num_rows($query)==0){
				?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Items</p>
				<?php
					
				}
				while($row = mysqli_fetch_array($query))
				{
				?>
				<li><a href="#" >
					
					<div class="col mb-40">
						
						<div class="on-sale-product mycard">
							
							<span class="price">₹ <?php echo htmlentities($row['mrp']); ?> INR</span>
						</div>
						
					</div></a></li>
					
					
			<?php } ?>
		</ul>
		
		
		
	</div>
</div><!-- Page Section End -->
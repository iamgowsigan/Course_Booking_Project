
<!-- Page Section Start -->
<div class="section section-padding">
	<div class="container">
		
		<div class="row">
			<div class="section-title text-center col mb-30">
				<h1 style="color:#433C97">Top Viewed Products</h1>
				<p style="color:#595959">All popular product find here</p>
			</div>
		</div>
		
		<!-- Single Product Thumbnail Slider -->
		<ul id="pro-thumb-img" class="pro-thumb-img">
			
			<?php
				
				
				$query=mysqli_query($con,"SELECT products.*,subcategory.* FROM products JOIN subcategory ON subcategory.sub_id=products.sub_cat WHERE p_active=1 ORDER BY p_views DESC LIMIT 8");
				if(mysqli_num_rows($query)==0){
				?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Items</p>
				<?php
					
				}
				while($row = mysqli_fetch_array($query))
				{
				?>
				<li><a href="single-product.php?id=<?$row['p_id'];?>" >
					
					<div class="col mb-40">
						
						<div class="on-sale-product mycard">
							<a href="single-product.html" class="image"><img src="API/mec/<?php echo htmlentities($row['image']); ?>" style="height:200px;object-fit:cover;"></a>
							<div class="content text-center">
								<h4 class="title"><a href="single-product.html"><?php echo htmlentities($row['title']); ?></a></h4>
								<span class="price">₹ <?php echo htmlentities($row['mrp']); ?> INR</span>
								
							</div>
						</div>
						
					</div></a></li>
					
					
			<?php } ?>
		</ul>
		
		
		
	</div>
</div><!-- Page Section End -->
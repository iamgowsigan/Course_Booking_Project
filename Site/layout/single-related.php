<!-- Related Product Section Start -->
<div class="section section-padding pt-0">
	<div class="container">
		<div class="row">
			
			<div class="section-title text-left col col mb-30">
				<h1 style="color:#0d72b4">Related Product<?= $rowpid['category_id'];?></h1>
			</div>
			
			<div class="related-product-slider related-product-slider-1 col-12 p-0">
				
				<?php
					
					$cid = $rowpid['category_id'];
					$query=mysqli_query($con,"SELECT courses.*,category.* FROM courses JOIN category ON category.cat_id=courses.cat_id WHERE co_active=1 AND courses.cat_id='$cid' ORDER BY co_id DESC LIMIT 8");
					if(mysqli_num_rows($query)==0){
					?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Items</p>
					<?php
						
					}
					while($row = mysqli_fetch_array($query))
					{
					?>
					
					<div class="col">
						
						<div class="product-item mycard" style="border-style: groove;border: 1px solid #c6daf9;">
							<div class="product-inner">
								
								<div class="image ">
									<img src="API/mec/<?php echo htmlentities($row['image']); ?>" style="height:300px;object-fit:cover;">
									
									<div class="image-overlay">
										<div class="action-buttons">
											<a href="single-list.php?id=<?php echo htmlentities($row['p_id']); ?>"><button>View Product</button></a>
										
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
				
				
			</div>
			
		</div>
	</div>
</div><!-- Related Product Section End -->
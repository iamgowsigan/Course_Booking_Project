<!-- Product Section Start -->
<div class="product-section section section-padding">
	<div class="container">
		
		<div class="row">
			<div class="section-title text-center col mb-30">
				<h1 style="color:#433C97">Popular Courses</h1>
				<p style="color:#3e3e3e">All popular courses find here</p>
			</div>
		</div>
		
		<div class="row mbn-40">
			<?php		
				$query=mysqli_query($con,"SELECT courses.*,subcategory.* FROM courses JOIN subcategory ON subcategory.sub_id=courses.sub_id 
				WHERE co_active=1 ORDER BY co_id DESC LIMIT 8");
				if(mysqli_num_rows($query)==0){
				?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Items</p>
				<?php
					
				} while($row = mysqli_fetch_array($query)) { ?>
				
				<div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">
					<div class="product-item mycard" style="border-style: groove;border: 1px solid #c6daf9;">
						<div class="product-inner">
							
							<div class="image ">
								<img src="API/mec/<?php echo htmlentities($row['co_image']); ?>" style="height:300px;object-fit:cover;">
								
								<div class="image-overlay">
									<div class="action-buttons">
										<a href="single-list.php?id=<?php echo htmlentities($row['co_id']); ?>">
										<button>View</button></a>
										<button onclick="location.href='<?php 
										echo htmlentities($_SERVER['PHP_SELF']); ?>?pid=<?php echo htmlentities($row['co_id']); ?>
										&&action=cart'">Add to Cart</button>
									</div>
								</div>
								
							</div>
							
							<div class="content">
								<div class="content-left">									
									<h4 class="title"><a href="single-product.html"><?php echo htmlentities($row['co_name']); ?></a></h4>
									<div class="ratting">
										<p><i class="fa fa-folder" ></i><a href="single-product.html"><?php echo htmlentities($row['cat_id']); ?></a></p>
									</div>
									<h5 class="size">₹ <?php echo htmlentities($row['co_prize']); ?> INR  
										<?php if($row['co_offer']!=""){ ?>
											<span style="text-decoration: line-through;color:red;">₹ <?php echo htmlentities($row['co_offer']); ?> INR</span>
											<?php } ?>
									</h5>
									<h5 class="color"><?php echo htmlentities($row['activity']); ?></h5>
								</div>
								<div class="content-right">
									<span class="price">₹<?php echo htmlentities($row['co_prize']); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div><!-- Product Section End -->
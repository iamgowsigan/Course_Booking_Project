<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">
		<div class="row row-30 mbn-50">
			
			<div class="col-12">
				<div class="row row-20 mb-10">
					
					<div class="col-lg-6 col-12 mb-40">
						
						<div class="pro-large-img mb-10 fix easyzoom easyzoom--overlay easyzoom--with-thumbnails">
							<a href="API/mec/<?php echo htmlentities($rowpid['image']); ?>" >
								<img src="API/mec/<?php echo htmlentities($rowpid['image']); ?>" alt=""/>
							</a>
						</div>
						<!-- Single Product Thumbnail Slider -->
						<ul id="pro-thumb-img" class="pro-thumb-img">
							
							<?php 
								
								$queryimage=mysqli_query($con,"SELECT * FROM product_image WHERE co_id=$id");
								while($rowimagesitem = mysqli_fetch_array($queryimage))
								{ ?>
                                <li><a href="API/mec/<?php echo htmlentities($rowimagesitem['pi_image']); ?>" data-standard="API/mec/<?php echo htmlentities($rowimagesitem['pi_image']); ?>"><img src="API/mec/<?php echo htmlentities($rowimagesitem['pi_image']); ?>" alt="" style="height:100px;object-fit:cover;"/></a></li>
								
							<?php } ?>
							
						</ul>
					</div>
					
					<div class="col-lg-6 col-12 mb-40">
						<div class="single-product-content">
							
							<div class="head">
								<div class="head-left">
									
									<h3 class="title" style="color:#d84f57"><?php echo htmlentities($rowpid['co_name']); ?></h3>
									<h5 style="color:#f1891e" class="title"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<?php echo htmlentities($rowpid['cat_name']); ?></h5>
									
									
									
								</div>
								
								<div class="head-right">
									<span class="price">₹<?php echo htmlentities($rowpid['co_prize']); ?>  &nbsp;
										<?php if($rowpid['co_offer']!=""){ ?>
										<span style="font-size:15px;color:#4e4e4e;text-decoration: line-through;">₹<?php echo htmlentities($rowpid['co_offer']); ?></span></span>
									<?php } ?>
									
								</div>
							</div>
							
							<div class="description">
								<p><?php echo htmlentities($rowpid['co_detail']); ?></p>
							</div>
							<br>

							<span class="availability">Duration: <span class="text-primary"><?php echo htmlentities($rowpid['co_duration']); ?> hours</span></span>
							
							<?php if($rowpid['co_available']=="1"){ ?>
								<span class="availability">Availability: <span class="text-success">In Stock</span></span>
								<?php }else{ ?>
								<span class="availability">Availability: <span class="text-danger">Out of Stock</span></span>
							<?php } ?>
							<!-- <span class="availability">Number of Pieces: <span class="text-danger"><?php echo htmlentities($rowpid['material']); ?> Pieces</span></span> -->
							
							
							<!-- <div class="quantity-colors">
								
								<div class="quantity">
									<h5>Quantity:</h5>
									<div class="pro-qty"><input type="text" value="1"></div>
								</div>                            
								
								
								
							</div> -->
							
							<div class="actions">
								
								<?php
									$uid = $_SESSION['userid'];
									$id = $rowpid['co_id'];
									$querycart = mysqli_query($con, "SELECT * from cart WHERE co_id=$id AND u_id=$uid");
									$countcart = mysqli_num_rows($querycart);
								?>
								
								
								<button onclick="location.href='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?id=<?php echo htmlentities($rowpid['co_id']); ?>&&action=cart'"><i class="ti-shopping-cart"></i><span>ADD TO CART
								</span></button>
								<button onclick="location.href='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?id=<?php echo htmlentities($rowpid['co_id']); ?>&&action=fav'" class="box" data-tooltip="Wishlist"><i class="ti-heart"></i></button>
								
								<?php if($uid!="" && $countcart!=0){ ?>
									<button onclick="location.href='cart.php'" style="background-color:orange"><i class="ti-shopping-cart" ></i><span>Buy Now
									<?php } ?>
									
									</div>
									
									<div class="actions">
									
									<button onclick="location.href='https://api.whatsapp.com/send?phone=919486884277&text=Royal Meat, I need <?php echo htmlentities($rowpid['co_name']); ?>'" style="background-color:#1bd741;color:white"><i class="ti-whatsapp"></i><span>Whatsapp</span></button>
									
									<button onclick="location.href='tel:919486884277'" style="background-color:#9e1cd7;color:white"><i class="ti-whatsapp"></i><span>Call us</span></button>
										
					
											
											</div>
											
											
											
										</div>
									</div>
									
								</div>
								
								<div class="row mb-50">
									<!-- Nav tabs -->
									<div class="col-12">
										<ul class="pro-info-tab-list section nav">
											<li><a class="active" href="#more-info" data-toggle="tab" style="color:#0d72b4">More info</a></li>
											
										</ul>
									</div>
									<!-- Tab panes -->
									<div class="tab-content col-12">
										<div class="pro-info-tab tab-pane active" id="more-info">
											<?php 
												for ($x = 0; $x < sizeof($tags); $x++) {
													$querycat=mysqli_query($con,"SELECT * FROM tag WHERE tag_id=$tags[$x] LIMIT 1");
													while($rowcatitem = mysqli_fetch_array($querycat))
													{ ?>
													
													<p><i style="color:green;" class="fa fa-check-circle"></i>&nbsp;&nbsp;<?php echo htmlentities($rowcatitem['tag_name']); ?></p>
													
													<?php  }
												}
											?>
										</div>
										<div class="pro-info-tab tab-pane" id="data-sheet">
											<table class="table-data-sheet">
												<tbody>
													<?php if($rowpid['height']!=""){ ?>
														<tr class="even"><td>Height</td><td><?php echo htmlentities($rowpid['height']); ?></td></tr>
													<?php } ?>
													<?php if($rowpid['weight']!=""){ ?>
														<tr class="even"><td>Weight</td><td><?php echo htmlentities($rowpid['weight']); ?></td></tr>
													<?php } ?>
													<?php if($rowpid['length']!=""){ ?>
														<tr class="even"><td>Length</td><td><?php echo htmlentities($rowpid['length']); ?></td></tr>
													<?php } ?>
													<?php if($rowpid['width']!=""){ ?>
														<tr class="even"><td>Width</td><td><?php echo htmlentities($rowpid['width']); ?></td></tr>
													<?php } ?>
													
													
													
												</tbody>
											</table>
										</div>
										<div class="pro-info-tab tab-pane" id="reviews">
											
											<?php 
												for ($x = 0; $x < sizeof($tags); $x++) {
													$querycat=mysqli_query($con,"SELECT * FROM tag WHERE tag_id=$tags[$x] LIMIT 1");
													while($rowcatitem = mysqli_fetch_array($querycat))
													{ ?>
													
													<p><i style="color:green;" class="fa fa-check-circle"></i>&nbsp;&nbsp;<?php echo htmlentities($rowcatitem['tag_name']); ?></p>
													
													<?php  }
												}
											?>
											
											
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div><!-- Page Section End -->										
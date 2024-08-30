
<?php 
	$uid = $_SESSION['userid'];
	$queryimage=mysqli_query($con,"SELECT cart.*,courses.* FROM cart JOIN courses ON courses.co_id=cart.co_id WHERE co_active=1 AND co_available=1 AND cart.u_id=$uid ORDER BY c_id DESC");
	while($rowcart = mysqli_fetch_array($queryimage))
	{ 
		$perproduct=$rowcart['co_prize'];
		
		
		
		$queryimage=mysqli_query($con,"SELECT SUM(co_prize) as totalamount FROM cart JOIN courses ON courses.co_id=cart.co_id WHERE cart.u_id=$uid AND courses.co_active=1 AND courses.co_available=1 AND cart.c_status=0");
		$rowsum = mysqli_fetch_array($queryimage);
		
		$totalAmount = $rowsum['totalamount'];
		//$totalDuration = $rowsum['totalduration'];
		$GetGst=$totalAmount*0.18;
		$GrandTotal=$GetGst+$totalAmount;
		
	}
?>
<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">
		
		<!-- Checkout Form s-->
		<div class="row row-50 mbn-40">
			
			<div class="col-lg-7">
				<form class="checkout-form" method="post" enctype="multipart/form-data">
					<!-- Billing Address -->
					
					
					
					
					<div id="billing-form" class="mb-20">
						<h4 class="checkout-title">STEP 1: Payment Type</h4>
						
						
						<div class="row">
							
							<div class="col-md-4" width="100%;">
								<input type="radio" id="radioApple1" name="ptype" value="C" >
								<label for="radioApple1"><center>Cash on Delivery</center></label>
								
								<input type="radio" id="radioApple1" name="ptype" value="P" checked>
								<label for="radioApple1"><center>Pay Online</center></label>
							</div>
							
							
							
							
						</div>
						
						<br><br>
						<h4 class="checkout-title">STEP 2: Shipping Address</h4>
						
						
						
						<div class="row">
							
							<div class="col-md-12 col-12 mb-5">
								<label>Name*</label>
								<input type="text" placeholder="First Name" name="name" required>
							</div>
							
							
							
							
							<div class="col-md-12 col-12 mb-5">
								<label>Phone no*</label>
								<input type="text" placeholder="Phone number" name="phone" required>
							</div>

							<div class="col-12 mb-5">
								<label>Address*</label>
								<input type="text" placeholder="Address" name="address" required>
							</div>

							
							<div class="col-md-6 col-12 mb-5">
								<label>Town/City*</label>
								<input type="text" placeholder="City with Pincode" name="city" required>
							</div>
							
							
							<div class="col-md-6 col-12 mb-5">
								<label>Zip Code*</label>
								<input type="text" placeholder="Zip Code" name="zip" required>
							</div>
							
							<div class="col-md-6 col-12 mb-5">
								<input type="hidden" name="pprice" value="<?php echo htmlentities($GrandTotal); ?>">
								<input type="hidden" name="pquantity" value="<?php echo htmlentities($totalDuration); ?>">
								
							</div>
							<div class="col-md-6 col-12 mb-5">
								<button name="booknow"  class="place-order" type="submit">Check Out Now</button>
							</div>
							
							
							
							
							
						</div>
					</form>
					
				</div>
				
				
				
			</div>
			
			<div class="col-lg-5">
				<div class="row">
					
					<!-- Cart Total -->
					<div class="col-12 mb-40">
						
						<h4 class="checkout-title">Cart Total</h4>
						
						<div class="checkout-cart-total">
							
							<h4>Product <span>Total</span></h4>
							
							<ul>
								
								<?php 
									$uid = $_SESSION['userid'];
									$querynames=mysqli_query($con,"SELECT cart.*,courses.* FROM cart JOIN courses ON courses.co_id=cart.co_id WHERE co_active=1 AND co_available=1 AND c_status=0 AND cart.u_id=$uid ORDER BY c_id DESC");
									while($rowcart2 = mysqli_fetch_array($querynames))
									{ ?>
									<li><?php echo htmlentities($rowcart2['co_name']); ?> x <?php echo htmlentities($rowcart2['co_available']); ?><span>₹ <?php echo htmlentities($rowcart2['co_prize']); ?></span></li>
									<?php 	
									}
								?>
								
							</ul>
							
							<p>Duration <span>24 Hours</span></p>
							<p>Sub Total <span>₹ <?php echo htmlentities($totalAmount); ?></span></p>
							<p>GST Fee <span>+ ₹ <?php echo htmlentities($GetGst); ?></span></p>
							
							<h4>Grand Total <span>₹ <?php echo htmlentities($GrandTotal); ?> INR</span></h4>
							
						</div>
						
					</div>
					
					
					
				</div>
			</div>
			
		</div>
		
		
	</div>
</div><!-- Page Section End -->	


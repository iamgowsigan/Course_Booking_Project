
<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">
		
		<form action="#">				
			<div class="row mbn-40">
				<div class="col-12 mb-40">
					<div class="cart-table table-responsive">
						<table>
							<thead>
								<tr>
									<th class="pro-thumbnail">Image</th>
									<th class="pro-title">Product</th>
									<th class="pro-price">Price</th>
									<th class="pro-subtotal">Total</th>
									<th class="pro-remove">Remove</th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
									$uid = $_SESSION['userid'];
									$queryimage=mysqli_query($con,"SELECT cart.*,courses.* FROM cart 
									JOIN courses ON courses.co_id=cart.co_id WHERE co_active=1 AND cart.u_id=$uid AND cart.c_status=0 ORDER BY c_id DESC");
									while($rowcart = mysqli_fetch_array($queryimage))
									{ 
										$perproduct=$rowcart['co_prize'];
										
									?>
									
									
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img src="API/mec/<?php echo htmlentities($rowcart['co_image']); ?>" alt="" /></a></td>
                                        <td class="pro-title"><a href="#"><?php echo htmlentities($rowcart['co_name']); ?></a></td>
                                        <td class="pro-price"><span class="amount">₹ <?php echo htmlentities($rowcart['co_prize']); ?></span></td>
                                        
                                        <td class="pro-subtotal">₹ <?php echo htmlentities($perproduct); ?></td>
                                        <td class="pro-remove"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?cid=<?php 
										echo htmlentities($rowcart['c_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');">×</a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-8 col-md-7 col-12 mb-40"></div>
				
				<?php 
					$uid = $_SESSION['userid'];
					$queryimage=mysqli_query($con,"SELECT SUM(co_prize) as totalamount FROM cart 
					JOIN courses ON courses.co_id=cart.co_id WHERE cart.u_id=$uid AND courses.co_active=1 AND cart.c_status=0");
					$rowsum = mysqli_fetch_array($queryimage);
					$totalAmount = $rowsum['totalamount'];
					$GetGst=$totalAmount*0.18;
					$GrandTotal=$GetGst+$totalAmount;
					?>
					
					<div class="col-lg-4 col-md-5 col-12 mb-40">
						<div class="cart-total fix">
							<h3>Cart Totals</h3>
							<table>
								<tbody>

									<tr class="cart-subtotal">
										<th>Subtotal </th>
										<td><span class="amount">₹ <?php echo htmlentities($totalAmount); ?> INR</span></td>
									</tr>
									<tr class="cart-subtotal">
										<th>GST (18%)</th>
										<td><span class="amount">+ ₹ <?php echo htmlentities($GetGst); ?> INR</span></td>
									</tr>
									<tr class="order-total">
										<th>TOTAL</th>
										<td>
										<strong><span class="amount text-success">₹ <?php echo htmlentities($GrandTotal); ?> INR</span></strong>
									</td>
								</tr>											
							</tbody>
						</table>
						<div class="proceed-to-checkout section mt-30">
							<a href="checkout.php">Proceed to Checkout</a>
						</div>
					</div>
				</div>
			</div>
		</form>
		
	</div>
</div><!-- Page Section End -->
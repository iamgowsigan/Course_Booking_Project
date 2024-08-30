
<?php 
	$uid = $_SESSION['userid'];
	$query=mysqli_query($con,"SELECT * FROM user WHERE u_id=$uid");
	while($row = mysqli_fetch_array($query))
	{ ?>
	
	<!-- Page Section Start -->
    <div class="page-section section section-padding">
        <div class="container">
			<div class="row mbn-30">
				
				<!-- My Account Tab Menu Start -->
				<div class="col-lg-3 col-12 mb-30">
					<div class="myaccount-tab-menu nav" role="tablist">
						<a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-user"></i>
						My Profile</a>
						
						<a href="#orders" data-toggle="tab"><i class="fa fa-key"></i> Password</a>
						
						<a href="#download" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> My Orders</a>
						
						<a href="wishlist.php" "><i class="fa fa-heart"></i> My Wishlist</a>
						
						<a href="cart.php" ><i class="fa fa-shopping-cart"></i> My Cart</a>
						
						<a href="logout.php" onclick="return confirm('Are you sure you want to Logout?');"><i class="fa fa-sign-out"></i> Logout</a>
					</div>
				</div>
				<!-- My Account Tab Menu End -->
				
				<!-- My Account Tab Content Start -->
				<div class="col-lg-9 col-12 mb-30">
					<div class="tab-content" id="myaccountContent">
						<!-- Single Tab Content Start -->
						<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
							<div class="myaccount-content">
								<h3>Dashboard</h3>
								
								<div class="account-details-form">
									<form  method="post" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6 col-12 mb-30">
												<input id="first-name" placeholder="Name" name="name" type="text" value="<?php echo htmlentities($row['name']); ?>" required>
											</div>
											
											<div class="col-lg-6 col-12 mb-30">
												<input id="last-name" placeholder="Phone" type="text" name="phone" value="<?php echo htmlentities($row['phone']); ?>" required>
											</div>
											
											<div class="col-12 mb-30">
												<input id="email" placeholder="Email Address" type="email" value="<?php echo htmlentities($row['email']); ?>" readonly >
											</div>
											
											
											<div class="col-12">
												<button name="pupdate" class="btn btn-dark btn-round btn-lg" type="submit">Save Changes</button>
											</div>
											
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Single Tab Content End -->
						
						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="orders" role="tabpanel">
							<div class="myaccount-content">
								<h3>Orders</h3>
								
								<div class="account-details-form">
									<form  method="post" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-12 col-12 mb-30">
												<input id="first-name" placeholder="Old Password" name="opassword" type="text"  required>
												<input   name="opasswordhide" type="hidden"  value="<?php echo htmlentities($row['password']); ?>">
											</div>
											
											<div class="col-lg-6 col-12 mb-30">
												<input id="last-name" placeholder="New Password" type="text" name="npassword"  required>
											</div>
											
											<div class="col-lg-6 col-12 mb-30">
												<input id="last-name" placeholder="Confirm Password" type="text" name="cpassword"  required>
											</div>
											
											
											
											
											
											<div class="col-12">
												<button name="password" class="btn btn-dark btn-round btn-lg" type="submit">Save Password</button>
											</div>
											
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Single Tab Content End -->
						
						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="download" role="tabpanel">
							<div class="myaccount-content">
								<h3>My Orders</h3>
								
								<div class="myaccount-table table-responsive text-center">
									<table class="table table-bordered">
										<thead class="thead-light">
											<tr>
												<th>Id</th>
												<th>Detail</th>
												<th>Total</th>
												<th>Shipping</th>
												<th>Summary</th>
											</tr>
										</thead>
										
										<tbody>
											
											<?php 
												$uid = $_SESSION['userid'];
												$queryimage=mysqli_query($con,"SELECT * FROM booking WHERE u_id=$uid AND booking_complete=1");
												while($rowsitem = mysqli_fetch_array($queryimage))
												{ 
													
													
												?>
												
												
												
												<tr>
													<td><?php echo htmlentities($rowsitem['b_id']); ?></td>
													<td>
														<?php 
															$getbid = $rowsitem['b_id'];
															$querycart=mysqli_query($con,"SELECT cart.*,products.* FROM cart JOIN products ON products.p_id=cart.p_id WHERE c_booking_id=$getbid");
															while($rowscart = mysqli_fetch_array($querycart))
															{ ?>
															<b><?php echo htmlentities($rowscart['title']); ?></b>  x  <?php echo htmlentities($rowscart['quantity']); ?><br>
															<?php } ?>
															
														</td>
														<td>
															₹ <?php echo htmlentities($rowsitem['b_price']); ?> INR<br>
															for <?php echo htmlentities($rowsitem['b_quantity']); ?> Items<br>
															<?php echo htmlentities($rowsitem['b_created_on']); ?>
															
														</td>
														<td>
															<?php echo htmlentities($rowsitem['b_address']); ?><br>
															<?php echo htmlentities($rowsitem['b_city']); ?><br>
															<?php echo htmlentities($rowsitem['b_phone']); ?><br>
															<?php echo htmlentities($rowsitem['b_zip']); ?>
														</td>
														<td>
															<?php if($rowsitem['b_received']=="0"){?>
															
															<b><span style="color:orange">Processing ..</span></b>
															<?php }else{ ?>
															<b><span style="color:green">Sent ..</span></b>
															<?php }?><br>
															<?php echo htmlentities($rowsitem['b_send_summary']); ?>
															
														</td>
													</tr>
													
												<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Single Tab Content End -->
							
							<!-- Single Tab Content Start -->
							<div class="tab-pane fade" id="payment-method" role="tabpanel">
								<div class="myaccount-content">
								<h3>Payment Method</h3>
								
								<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
							</div>
						</div>
						<!-- Single Tab Content End -->
						
						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="address-edit" role="tabpanel">
							<div class="myaccount-content">
								<h3>Billing Address</h3>
								
								<address>
									<p><strong>Alex Tuntuni</strong></p>
									<p>1355 Market St, Suite 900 <br>
									San Francisco, CA 94103</p>
									<p>Mobile: (123) 456-7890</p>
								</address>
								
								<a href="#" class="btn btn-dark btn-round d-inline-block"><i class="fa fa-edit"></i>Edit Address</a>
							</div>
						</div>
						<!-- Single Tab Content End -->
						
						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="account-info" role="tabpanel">
							<div class="myaccount-content">
								<h3>Account Details</h3>
								
								<div class="account-details-form">
									<form action="#">
										<div class="row">
											<div class="col-lg-6 col-12 mb-30">
												<input id="first-name" placeholder="First Name" type="text">
											</div>
											
											<div class="col-lg-6 col-12 mb-30">
												<input id="last-name" placeholder="Last Name" type="text">
											</div>
											
											<div class="col-12 mb-30">
												<input id="display-name" placeholder="Display Name" type="text">
											</div>
											
											<div class="col-12 mb-30">
												<input id="email" placeholder="Email Address" type="email">
											</div>
											
											<div class="col-12 mb-30"><h4>Password change</h4></div>
											
											<div class="col-12 mb-30">
												<input id="current-pwd" placeholder="Current Password" type="password">
											</div>
											
											<div class="col-lg-6 col-12 mb-30">
												<input id="new-pwd" placeholder="New Password" type="password">
											</div>
											
											<div class="col-lg-6 col-12 mb-30">
												<input id="confirm-pwd" placeholder="Confirm Password" type="password">
											</div>
											
											<div class="col-12">
												<button name="updatep" class="btn btn-dark btn-round btn-lg">Save Changes</button>
											</div>
											
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Single Tab Content End -->
					</div>
				</div>
				<!-- My Account Tab Content End -->
				
			</div>
		</div>
	</div><!-- Page Section End -->
	
<?php } ?>
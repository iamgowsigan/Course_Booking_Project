<?php
	
	$username=$_SESSION['name'];
	$userid=$_SESSION['userid'];
	$username=$_SESSION['name'];
	
		if (isset($_POST['searchbox'])) {	
		$searchbox = $_POST['search'];
		echo "<script type='text/javascript'> document.location = 'listing.php?title=$searchbox'; </script>";
	}
	
?>

<!-- Header Section Start -->
<div class="header-section section">
	
	
	<!-- Header Top Start -->
	<div class="header-top header-top-one bg-theme-two" style="background-color: #433C97">
		<div class="container-fluid">
			<div class="row align-items-center justify-content-center">
				
				<div class="col mt-10 mb-10 d-none d-md-flex">
					<!-- Header Top Left Start -->
					<div class="header-top-left">
						<p>Welcome to Online Training and Course Booking</p>
					</div><!-- Header Top Left End -->
				</div>
				
				<div class="col mt-10 mb-10">
					<!-- Header Language Currency Start -->
					<div class="header-top-left">
						<p><i class="fa fa-mobile"></i>&nbsp;&nbsp;+918015477585</p>
						<p><i class="fa fa-envelope"></i>&nbsp;&nbsp;info@drooob.com</p>
					</div><!-- Header Top Left End -->
				</div>
				
				<div class="col mt-10 mb-10">
					<!-- Header Shop Links Start -->
					<div class="header-top-right">
								
						<?php 
							if($userid!=""){ ?>
							<ul class="header-lan-curr">
								
								<li><a href="#">Hello  &nbsp;<?php echo htmlentities($username); ?>&nbsp;&nbsp;<i class="fa fa-user-o"></i></a>
									<ul>
										<li><a href="profile.php">My Profile</a></li>
										<li><a href="wishlist.php">My Wishlist</a></li>
										<li><a href="cart.php">My Cart</a></li>
										<li><a href="logout.php" onclick="return confirm('Are you sure you want to Logout?');">Logout</a></li>
									</ul>
								</li>
							</ul>
							
							<?php } else{ ?>
							<p><a href="login.php">Register&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;<a href="login.php">Login</a></p>
						<?php } ?>
						
					</div><!-- Header Shop Links End -->
				</div>
				
			</div>
		</div>
	</div><!-- Header Top End -->
	
	<!-- Header Bottom Start -->
	<div class="header-bottom header-bottom-one header-sticky">
		<div class="container-fluid">
			<div class="row menu-center align-items-center justify-content-between">
				
				<div class="col mt-15 mb-15">
					<!-- Logo Start -->
					<div class="header-logo">
						<a href="index.php">
							<img src="assets/images/logo.png" alt="ToddleBee" style="width:150px">
						</a>
					</div><!-- Logo End -->
				</div>
				
				<div class="col order-2 order-lg-3">
					<!-- Header Advance Search Start -->
					<div class="header-shop-links">
						
						<div class="header-search">
							<button class="search-toggle"><img src="assets/images/icons/search.png" style="width: 24px; height:24px; alt="Search Toggle"><img class="toggle-close" src="assets/images/icons/close.png" alt="Search Toggle"></button>
							<div class="header-search-wrap">
							
								<form  method="post" enctype="multipart/form-data">
									<input type="text" placeholder="Type and hit enter" name="search">
									<button  name="searchbox" type="submit"><img src="assets/images/icons/search.png" style="width: 24px; height:24px; alt="Search"></button>
								</form>
							</div>
						</div>
						
						<?php
							if($userid!=""){ 
								
								$querycart = mysqli_query($con, "SELECT * from cart WHERE u_id=$userid AND c_status=0");
								$countcart = mysqli_num_rows($querycart);
								
								$queryfav = mysqli_query($con, "SELECT * from favorite WHERE u_id=$userid");
							$countfav = mysqli_num_rows($queryfav); ?>
							
							<div class="header-wishlist">
								<a href="wishlist.php"><img src="assets/images/icons/heart.png" style="width: 24px; height:24px;" alt="Wishlist"> <span><?php echo htmlentities($countfav); ?></span></a>
							</div>
							
							<div class="header-mini-cart">
								<a href="cart.php"><img src="assets/images/icons/shop.png" style="width: 24px; height:24px;" alt="Cart"> <span><?php echo htmlentities($countcart); ?></span></a>
							</div>
							
							
						<?php } ?>
						
						
						
					</div><!-- Header Advance Search End -->
				</div>
				
				<div class="col order-3 order-lg-2">
					<div class="main-menu">
						<nav>
							<ul>
								<li class="<?php if(strpos($_SERVER['PHP_SELF'],"index.php")!==false)echo"active";?>"><a href="index.php">HOME</a> </li>
								<li class="<?php if(strpos($_SERVER['PHP_SELF'],"listing.php")!==false)echo"active";?>"><a href="#">COURSES</a> </li>
								<li class="<?php if(strpos($_SERVER['PHP_SELF'],"listing.php")!==false)echo"active";?>"><a href="books.php">REFERENCES</a> </li>
								<li ><a href="#">CATEGORY</a>
									<ul class="sub-menu">
										
										<?php
											
											$query=mysqli_query($con,"SELECT * FROM category WHERE cat_active=1");
											if(mysqli_num_rows($query)==0){
											?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Items</p>
											<?php
												
											}
											while($row = mysqli_fetch_array($query))
											{
											?>
											
											
                                            <li><a href="listing.php?cat=<?php echo htmlentities($row['cat_name']); ?>,"><?php echo htmlentities($row['cat_name']); ?></a></li>
											
										<?php } ?>
									</ul>
								</li>
								
								
								<li class="<?php if(strpos($_SERVER['PHP_SELF'],"contact.php")!==false)echo"active";?>"><a href="contact.php" >CONTACT</a></li>
								
							</ul>
						</nav>
					</div>
				</div>
				
				<!-- Mobile Menu -->
				<div class="mobile-menu order-12 d-block d-lg-none col"></div>
				
			</div>
		</div>
	</div><!-- Header BOttom End -->
	
</div><!-- Header Section End -->
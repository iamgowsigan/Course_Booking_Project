<?php 
	
	$uid=$_SESSION['uid'];
?>


<?php
	
	$countorder = mysqli_num_rows( mysqli_query($con, "SELECT * from booking WHERE admin_seen=0"));							
	
	
	
	
	
?>


<div class="left-side-menu">
    
	<!-- LOGO -->
	<a href="dashboard.php" class="logo text-center logo-light">
		<span class="logo-lg">
			<img src="assets/images/logo.png" alt="" height="16">
		</span>
		<span class="logo-sm">
			<img src="assets/images/logo_sm.png" alt="" height="16">
		</span>
	</a>
	
	<!-- LOGO -->
	<a href="dashboard.php" class="logo text-center logo-dark">
		<span class="logo-lg">
			<img src="assets/images/logo-dark.png" alt="" height="16">
		</span>
		<span class="logo-sm">
			<img src="assets/images/logo_sm_dark.png" alt="" height="16">
		</span>
	</a>
    
	<div class="h-100" id="left-side-menu-container" data-simplebar>
		
		<!--- Sidemenu -->
		<ul class="metismenu side-nav">
			
			<li class="side-nav-title side-nav-item">Navigation</li>
			
			
			
			<li class="side-nav-title side-nav-item">MANAGEMENT</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-users-alt"></i>
					<span> User </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="user-list.php">Manage User</a>
					</li>
				</ul>
			</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class=" uil-map-pin"></i>
					<span> Delivery Range </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="range.php">Manage Range</a>
					</li>
				</ul>
			</li>
			
			
			<li class="side-nav-item">
				<a href="banner.php" class="side-nav-link">
					<i class="uil-money-bill"></i>
					<span> Banner </span>
				</a>
			</li>
			
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-puzzle-piece"></i>
					<span> Product Management </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="subcategory.php">Manage Sub Category</a>
					</li>
					<li>
						<a href="tag.php">Manage Tag</a>
					</li>
				</ul>
			</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-briefcase"></i>
					<span> Products </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="add-product.php">Add Products</a>
					</li>
					<li>
						<a href="manage-product.php">Manage Products</a>
					</li>
					
				</ul>
			</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-shopping-cart-alt"></i>
					<span> Orders </span>
					
					
					<?php if($countorder=='0'){ ?>
						
						<span class="menu-arrow"></span>
						<?php }else{ ?>
						<span class="badge badge-success float-right"><?=$countorder;?></span>
					<?php } ?>
					
					
					
					
					
					
					
					
					
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="bookings.php">Manage Orders</a>
					</li>
					
				</ul>
			</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class=" uil-atom"></i>
					<span> Blog </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="blog.php">Add Blog</a>
					</li>
					<li>
						<a href="manage-blog.php">Manage Blog</a>
					</li>
					
				</ul>
			</li>
			
			
			
			
			
			
			
			
			
		</ul>
		
		<!-- Help Box -->
		<div class="help-box text-white text-center">
			<a href="javascript: void(0);" class="float-right close-btn text-white">
				<i class="mdi mdi-close"></i>
			</a>
			<img src="assets/images/help-icon.svg" height="90" alt="Helper Icon Image" />
			<h5 class="mt-3">Mechuter Tech</h5>
			<p class="mb-3">For more contact us</p>
			<a href="javascript: void(0);" class="btn btn-outline-light btn-sm">View</a>
		</div>
		<!-- end Help Box -->
		<!-- End Sidebar -->
		
		<div class="clearfix"></div>
		
	</div>
	<!-- Sidebar -left -->
	
</div>					
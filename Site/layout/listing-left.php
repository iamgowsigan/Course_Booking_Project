
<div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">
	<form class="form" method="post" enctype="multipart/form-data">
		<div class="sidebar">
			<h4 class="sidebar-title">Category</h4>
			
		</div>
		
		
		
		
		<a class="accordion sidebar">Category<i class="fa fa-angle-down float-right" style="text-align: center;"></i></a>
		<div class="panel">
			<ul class="sidebar-list">
				
				<?php
					
					$query=mysqli_query($con,"SELECT products.*,category.*,COUNT(*) AS totalitem FROM products JOIN category ON category.cat_name=products.category_id WHERE products.p_active=1 GROUP BY products.category_id");
					if(mysqli_num_rows($query)==0){
					?><p class="font-small-3 text-center" style="color:#bcbcbc" >No Items</p>
					<?php
						
					}
					while($row = mysqli_fetch_array($query))
					{
					?>
					<li><input type="checkbox" name="category[]" value="<?php echo htmlentities($row['cat_name']); ?>">&nbsp;&nbsp;<?php echo htmlentities($row['cat_name']); ?> <span class="num float-right"><?php echo htmlentities($row['totalitem']); ?></span></li>
					
					
				<?php	} ?>
				
			</ul><br>

		</div>


		
		<a class="accordion sidebar">PRICE<i class="fa fa-angle-down float-right" style="text-align: center;"></i></a>
		<div class="panel">
			<div class="sidebar-price">
				<div id="price-range"></div>
				<input type="text" id="price-amount" name="prange" readonly>
			</div>
			<br>

		</div>
		<a href="listing.php" class="btn btn-danger" type="submit">Clear</a> &nbsp;&nbsp;<button name="updatee" class="btn btn-primary" type="submit">Apply Filter</button>

		
	</form>
	
</div>
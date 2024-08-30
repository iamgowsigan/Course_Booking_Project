<!-- Product Section Start -->
<div class="product-section section section-padding pt-0">
	<div class="container">
		<div class="row mbn-40">

			<div class="col-lg-4 col-md-6 col-12 mb-40">

				<div class="row">
					<div class="section-title text-left col mb-30">
						<h1 style="color:#433C97">Best Offer</h1>
						<p style="color:#595959">Exclusive Offer for you</p>
					</div>
				</div>

				<div class="best-deal-slider w-100">
					<?php
					$query3 = mysqli_query($con, "SELECT * FROM courses WHERE co_active=1 AND co_offer!='' LIMIT 5");
					if (mysqli_num_rows($query3) == 0) {
						?>
						<p class="font-small-3 text-center" style="color:#bcbcbc">No Items</p>
						<?php

					}
					while ($row = mysqli_fetch_array($query3)) {

						?>

						<div class="slide-item" style="border-style: groove;border: 1px solid #c6daf9;">
							<div class="best-deal-product">

								<div class="image"><img src="API/mec/<?php echo htmlentities($row['co_image']); ?>"
										style="height:570px;object-fit:cover;"></div>

								<div class="content-top">

									<div class="content-top-left">
										<h4 class="title">
											<a href="single-list.php?id=<?php echo htmlentities($row['co_id']); ?>"><?php echo htmlentities($row['co_name']); ?></a>
										</h4>

									</div>
									<div class="content-top-right">
										<span class="price">₹
											<?php echo htmlentities($row['co_prize']); ?>
										</span>
									</div>
								</div>
								<div class="content-bottom">
									<a href="single-list.php?id=<?php echo htmlentities($row['co_id']); ?>"
										data-hover="SHOP NOW">SHOP NOW</a>
								</div>

							</div>
						</div>
					<?php } ?>
				</div>
			</div>

			<div class="col-lg-8 col-md-6 col-12 pl-3 pl-lg-4 pl-xl-5 mb-40">

				<div class="row">
					<div class="section-title text-left col mb-30">
						<h1 style="color:#433C97">Best Selling Courses on Categories</h1>
						<p style="color:#595959">All featured courses find here</p>
					</div>
				</div>

				<div class="small-product-slider row row-7 mbn-40">
					<?php
					$query = mysqli_query($con, "SELECT * FROM category WHERE cat_active=1 LIMIT 8");
					if (mysqli_num_rows($query) == 0) {
						?>
						<p class="font-small-3 text-center" style="color:#bcbcbc">No Items</p>
						<?php
					}
					while ($row = mysqli_fetch_array($query)) {
						$getcatid = $row['cat_name'];
						$querycat = mysqli_query($con, "SELECT * from courses WHERE cat_id='$getcatid'");
						$countCat = mysqli_num_rows($querycat);
						?>

						<div class="col mb-40">
							<div class="on-sale-product mycard" style="border-style: groove;border: 1px solid #c6daf9;">
								<a href="listing.php?cat=<?php echo htmlentities($row['cat_name']); ?>," class="image">
									<img src="assets/images/<?php echo htmlentities($row['cat_image']); ?>"
										style="height:200px;object-fit:cover;"></a>
								<div class="content text-center">
									<h4 class="title"><a href="single-product.html">
											<?php echo htmlentities($row['cat_name']); ?>
										</a></h4>
									<span class="price">
										<?php echo htmlentities($countCat); ?> Items
									</span>

								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- Product Section End -->

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
									<th width="20%" class="pro-price">Dated</th>
									<th class="pro-remove">Remove</th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
									$uid = $_SESSION['userid'];
									$queryimage=mysqli_query($con,"SELECT favorite.*,courses.* FROM favorite JOIN courses ON courses.co_id=favorite.co_id WHERE co_active=1 AND co_available=1 AND favorite.u_id=$uid ORDER BY f_id DESC");
									while($rowcart = mysqli_fetch_array($queryimage))
									{ 
										$perproduct=$rowcart['co_prize']*$rowcart['co_duration'];
										
									?>
									
									
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img src="API/mec/<?php echo htmlentities($rowcart['co_image']); ?>" style="height:100px;object-fit:contain;" /></a></td>
                                        <td class="pro-title"><a href="#"><?php echo htmlentities($rowcart['co_name']); ?></a></td>
                                        <td class="pro-price"><span class="amount">₹ <?php echo htmlentities($rowcart['co_prize']); ?></span></td>
                                        <td class=""><span class="amount"> <?php echo htmlentities($rowcart['f_created_on']); ?></span></td>
                                      
                                        <td class="pro-remove"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?cid=<?php echo htmlentities($rowcart['f_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');">×</a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-8 col-md-7 col-12 mb-40">
					
				</div>
				

					
					

			</div>
		</form>
		
	</div>
</div><!-- Page Section End -->
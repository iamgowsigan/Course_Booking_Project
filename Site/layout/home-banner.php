<?php 
	$appBanner=array();
	$querybanner=mysqli_query($con,"SELECT * FROM banner ORDER BY ban_id DESC LIMIT 5");
	while($rowban[] = mysqli_fetch_array($querybanner))
	{
		$appBanner=$rowban;
		
	}
?>

<!-- Hero Section Start -->
    <div class="hero-section section">

        <!-- Hero Slider Start -->
        <div class="hero-slider hero-slider-three fix" style="background-color: #433C97;">
			<?php for($i=0;$i<5;$i++){?>
            <div class="hero-item" style="background-image: url(API/mec/<?php echo $appBanner[$i]["ban_image"];  ?>) ">
				<div class="container">
					<div class="hero-content-2">
						<h1><br></h1>
					</div>
                </div>
            </div><!-- Hero Item End -->

			<?php } ?>
        </div><!-- Hero Slider End -->

    </div><!-- Hero Section End -->
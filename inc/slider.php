<!-- banner -->

	<div class="banner-silder">
		<div id="JiSlider" class="jislider">
			<ul>
				
<?php 
	$query = "SELECT * FROM tbl_slider ORDER BY id DESC limit 4";
	$slider = $db->select($query);
	if ($slider) {
		$i=0;
		while ($result = $slider->fetch_assoc()) {
			$i++;
?>
				<li>
					<div style="background: url(BDEXPERT/<?php echo $result['slider_image']; ?>);" class="w3layouts-banner-top w3layouts-banner-top<?php echo $i; ?>" >
							<div class="container">
								<div class="agileits-banner-info">								
									<h3><?php echo $result['slider_name']; ?></h3>
									 <p><?php echo $result['slider_tagline']; ?></p>
									<div class="more">
										<a href="blog.php" class="hvr-shutter-in-vertical">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</div>
								</div>	
							</div>
						</div>
				</li>
<?php } } ?>
				
			</ul>
		</div>
      </div>

<!-- //banner -->
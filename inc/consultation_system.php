<div class="banner-bottom">
		<div class="container">
			<h6>Our contsultaion System</h6>
			<h2> <span class="fixed_w3">We</span>  Carefully handle all <span class="fixed_w3">Clients</span> </h2>
			<p class="sub_para_agile">Take A Tour To Our System</p>
			<div class="agileits_banner_bottom_grids">
<?php 
	$query = "SELECT * FROM tbl_about WHERE status='consultation system' ORDER BY id DESC limit 8";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
				<div class="col-md-3 agileits_banner_bottom_grid" style="padding-bottom: 30px;">
					<div class="hovereffect w3ls_banner_bottom_grid">
						<img src="BDEXPERT/<?php echo $result['image']; ?>" alt=" " class="img-responsive" />
						<div class="overlay">
						   <h4><?php echo $result['description']; ?></h4>
						   <p><a href="mail.php" target="_blank">Get Service</a></p>
						</div>
					</div>
				</div>
<?php } } ?>	
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<!-- banner-bottom -->

<?php 
	$query = "SELECT * FROM tbl_about WHERE status='about us' ORDER BY id DESC limit 1";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) {
?>		
<!-- about -->
	<div class="inner_main_agile_section">
		<div class="container">
		<h6><?php echo $result['space_title']; ?></h6>
				<h3 class="w3l_header w3_agileits_header"><?php echo $result['title']; ?></h3>
		<p class="sub_para_agile two"><?php echo $result['subtitle']; ?></p>
			
			<div class="agile_inner_grids">
								
				<div class="col-md-6 w3_agileits_about_grid_left">
					<p><?php echo $result['description']; ?></p>
					
				</div>
				<div class="col-md-6 w3_agileits_about_grid_right">					
					<div class="img-overlay">
						<img src="BDEXPERT/<?php echo $result['image']; ?>" alt="" />
						<div class="overlay-text">
							<?php echo $result['image_content']; ?>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php } } ?>
<!-- //about -->
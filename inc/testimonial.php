<!-- agile_testimonials -->
<div class="test">
	<div class="container">
	<h3 class="w3l_header w3_agileits_header">Happy <span style="color: #0AC876;">Clients</span></h3>
		<p class="sub_para_agile two">Ipsum dolor sit amet consectetur adipisicing elit</p>
			
			<div class="agile_inner_grids">
					<div class="test-gri1">
					 <div id="owl-demo2" class="owl-carousel">

<?php 
	$query = "SELECT * FROM tbl_about WHERE status='TESTIMONIAL' ORDER BY id DESC limit 6";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>		 	
							<div class="agile">
							   	<div class="test-grid">
							   		<div class="col-md-8 test-grid1">
									  <i class="fa fa-quote-left" aria-hidden="true"></i>
										<p class="para-w3-agile"><?php echo $fm->textShorten($result['description'], 250); ?></p>
										<h4><?php echo $result['title']; ?></h4>
										<span> <?php echo $result['subtitle']; ?></span>
									</div>	
									<div class="col-md-4 test-grid2">
										<img style="max-width: 256px;height: 214px;" src="BDEXPERT/<?php echo $result['image']; ?>" alt="" class="img-r">
									</div>
								</div>	
								<div class="clearfix"></div>
							</div>
<?php } } ?>		
					</div>
				</div>	
		</div>
</div>	
</div>
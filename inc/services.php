<!-- services -->
	<div class="services" id="services">
		<div class="container">
		<h3 class="w3l_header w3_agileits_header two">Our <span>SERVICES</span></h3>
		<p class="sub_para_agile two">Ipsum dolor sit amet consectetur adipisicing elit</p>
			
			<div class="agile_inner_grids">		
<?php 
	$query = "SELECT * FROM tbl_about WHERE status='OUR SERVICES' ORDER BY id DESC limit 6";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>					
								   <!-- choose icon -->
								   <div class="col-md-4 choose_icon">									
									<div class="choose_right">
										<h3><?php echo $result['title']; ?></h3>
										<p><?php echo $fm->textShorten($result['description'], 180); ?></p>
									</div>
								 </div>	
<?php } } ?>						 
								  
							</div>
						</div>
					</div>
	<!-- //services -->
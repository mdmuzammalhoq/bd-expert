<?php include 'inc/header.php'; ?>

<div class="service-page-area">
	<div class="serv-heading section-heading">
		<h1>Canada</h1>
	</div>
	<div class="service-page-content">
		<div class="container">
<?php 
	$query = "SELECT * FROM  tbl_immigration WHERE status='CANADA' && side='LEFT' ORDER BY id DESC limit 4";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
			<div class="row single_imi_feature">

				<div class="col-md-6">
					<div class="service_img">
						<img src="BDEXPERT/<?php echo $result['image']; ?>" alt="" />				
					</div>	
				</div>	
				<div class="col-md-6">
					<div class="process">
						<h2><?php echo $result['title']; ?></h2>
						<p><i class="fa fa-arrow-right"></i><?php echo $result['content']; ?></p>
					</div>
					<p><a class="get_service_a" target="_blank" href="contact.php">Get Service</a></p>
				</div>		
			</div>
<?php } } ?>
<?php 
	$query = "SELECT * FROM  tbl_immigration WHERE status='CANADA' && side='RIGHT' ORDER BY id DESC limit 4";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
			<div class="row single_imi_feature">
				<div class="col-md-6">
					<div class="process">
						<h2><?php echo $result['title']; ?></h2>
						<p><i class="fa fa-arrow-right"></i><?php echo $result['content']; ?></p>
					</div>
					<p><a class="get_service_a" target="_blank" href="contact.php">Get Service</a></p>
				</div>

				<div class="col-md-6">
					<div class="service_img">
						<img src="BDEXPERT/<?php echo $result['image']; ?>" alt="" />				
					</div>	
				</div>			
			</div>
<?php } } ?>
			
		</div>
		<hr />
	</div>	
</div>
	
<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>

<div class="service-page-area">
	<div class="serv-heading section-heading">
		<h1>Student Visa</h1>
	</div>
	<div class="service-page-content">
<?php 
	$query = "SELECT * FROM  tbl_services WHERE status='Visit Visa' ORDER BY id DESC limit 1";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
		<div class="container">
			<div class="col-md-6">
				<div class="process">
					<h2><?php echo $result['title']; ?></h2>
					<p><?php echo $result['content']; ?></p>
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
		<hr />
		<div class="country_section">
		<div class="country_section_heading">
			<h2>Our Service country</h2>
		</div>
			<?php require('all_country.php');?>
		</div>
	</div>	
</div>
	
<?php include 'inc/footer.php'; ?>
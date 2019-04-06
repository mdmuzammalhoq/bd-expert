<?php include 'inc/header.php'; ?>
	<div class="service-page-area">
	<div class="serv-heading section-heading">
		<h1>Welcome To Our Service Country</h1>
	</div>
	<div class="service-page-content">
		<div class="container">			
			<div class="row single_contry_name">
<?php 
	$query = "SELECT * FROM tbl_country ORDER BY id DESC";
	$country = $db->select($query);
	if ($country) {
		while ($result = $country->fetch_assoc()) {
?>
				<div class="col-md-3" style="height: 100px;">
					<h3><?php echo $result['name']; ?></h3>
				</div>
<?php } } ?>
				
			</div>
		</div>
	
	</div>	
</div>
<?php include 'inc/footer.php'; ?>
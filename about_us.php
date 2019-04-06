<?php include 'inc/header.php'; ?>

<div class="about-us-area">
	<div class="about-heading section-heading">
		<h1>About Us</h1>
	</div>
	
	<div class="about-content">
		<div class="container">
			<div class="col-md-9 about_content_left">
<?php 
	 
	$query = "SELECT * FROM tbl_about_us ORDER BY id DESC limit 1";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
				<h2><?php echo $result['title']; ?></h2>
				<p><?php echo $result['content']; ?></p>
<?php } } ?>

			<div class="mission_vision_area">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#mission">
				  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>Our Mission</a></li>
				  <li><a data-toggle="tab" href="#vision">
				  <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Our Vision</a></li>
				</ul>

				<div class="tab-content">
<?php 
	 
	$query = "SELECT * FROM tbl_about_us WHERE status='OUR MISSION' ORDER BY id DESC limit 1";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
				  <div id="mission" class="tab-pane fade in active">
					<h3><?php echo $result['title']; ?></h3>
					<p><?php echo $result['content']; ?></p>
				  </div>
<?php } } ?>
<?php 
	 
	$query = "SELECT * FROM tbl_about_us WHERE status='OUR VISION' ORDER BY id DESC limit 1";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
				  <div id="vision" class="tab-pane fade">
					<h3><?php echo $result['title']; ?></h3>
					<p><?php echo $result['content']; ?></p>
				  </div>
<?php } } ?>
                </div>
			</div>
			
			</div>
			<div class="col-md-3 about_content_right">
				<h2>Our Service Country </h2>
<?php 
	 
	$query = "SELECT * FROM tbl_country  ORDER BY id DESC";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
				<p><i class="fa fa-arrow-right"> </i><?php echo $result['name']; ?></p>
<?php } } ?>
				
			</div>
		</div>
	
	</div>
	
	
</div>




<?php include 'inc/footer.php'; ?>
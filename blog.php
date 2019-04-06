<?php include 'inc/header.php'; ?>

<div class="blog-area">
	<div class="blog-heading section-heading">
		<h1>Our Blog</h1>
	</div>
	<div class="blog-content">
		<div class="container">
			<div class="col-md-12">
<?php 
	 $date = date('Y-m-d');
	$query = "SELECT * FROM  tbl_blog ORDER BY id DESC";
	$about = $db->select($query);
	if ($about) {
		while ($result = $about->fetch_assoc()) { 
?>
				<div class="single-blog col-md-6">					
					<div class="blog-image">
						<img src="BDEXPERT/<?php echo $result['image']; ?>" alt="" />
					</div>
					<div class="blog-author">
						<p><?php echo $date; ?></p>
						<p><?php echo $result['author']; ?></p>
					</div>
					<div class="blog-title">
						<h1><?php echo $result['title']; ?></h1>
					</div>
					<div class="blog-content">
						<p><?php echo $result['content']; ?></p>
					</div>
				</div>
<?php } } ?>
			</div>
		</div>
		<br><br><br>
		
	</div>
	
</div>
	
<?php include 'inc/footer.php'; ?>
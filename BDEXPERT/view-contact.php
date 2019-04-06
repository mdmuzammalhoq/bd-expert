<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>

<?php 
    $id = $_GET['view_conatct'];
  $query = "SELECT * FROM tbl_contact WHERE id='$id'";
  $blogg = $db->select($query);
  if ($blogg) {
    while ($result = $blogg->fetch_assoc()) {
?>
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i>VIEW CONTACT</h1>
            <p>See the right message.</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">VIEW CONTACT</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
        	
        	<div class="col-md-12">
        		<div class="card">
        			
        				
	        			
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" value="<?php echo $result['name']; ?>">
	        			</div>
                <div class="form-group">
                  <input type="text" name="author" class="form-control" value="<?php echo $result['email']; ?>">
                </div>
	        			<div class="form-group">
	        				<input type="text" name="author" class="form-control" value="<?php echo $result['phone']; ?>">
	        			</div>
	        			
	        			<div class="form-group">
                  <textarea name="description" id="" cols="30" rows="2" class="form-control" ><?php echo $result['subject']; ?></textarea>
                </div>
                <div class="form-group">
	        				<textarea name="description" id="" cols="30" rows="6" class="form-control" ><?php echo $result['message']; ?></textarea>
	        			</div>
	        			<a href="contact-list.php"><button type="submit" class="btn btn-primary btn-block">Back</button></a>
        			
        			</div>

        		</div>
        		
        	</div>
       
        </div>
      </div></div>
<?php } } ?>
<?php include 'inc/footer-admin.php'; ?>
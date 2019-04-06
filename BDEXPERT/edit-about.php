<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
    $id = $_GET['edit_about'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$Title 	  		= mysqli_real_escape_string($db->link, $_POST['title']);
		$description  = mysqli_real_escape_string($db->link, $_POST['description']);
		$status  	    = mysqli_real_escape_string($db->link, $_POST['status']);

			

        if ($Title == "") {
        	$n = "<span class='add_message'>Title empty !</span>";
        }elseif ($description == "") {
        	$n = "<span class='add_message'>Description empty !</span>";
        }else{
        	$query = "UPDATE tbl_about_us SET 
          title = '$Title', 
          content = '$description', 
          status = '$status'
            WHERE 
            id='$id'
          ";
        	$aboutInsert = $db->update($query);
        	if ($aboutInsert) {
        		$n = "<span class='suuccess_message'>Information updated Successfully. </span>";
                }else {
                 $n = "<span class='add_message'>Information Not updated !</span>";
                }
        	}
        }
?>
<?php 
  $query = "SELECT * FROM tbl_about_us WHERE id='$id'";
  $about_us = $db->select($query);
  if ($about_us) {
    while ($result = $about_us->fetch_assoc()) {
?>
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> About</h1>
            <p>Add about content in your homepage</p>
          </div>
          <?php echo $n; ?>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">About</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
        	
        	<div class="col-md-12">
        		<div class="card">
        			<form action="" method="post" enctype="multipart/form-data">
        				
	        			
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?> ">
	        			</div>
	        			
	        			
	        			<div class="form-group">
	        				<textarea name="description" id="" cols="30" rows="6" class="form-control" ><?php echo $result['content']; ?></textarea>
	        			</div>
	        			<div class="form-group">
	        				<select name="status" class="form-control">
	        					<option value="">---Select Position---</option>
	        					<option <?php if ($result['status'] == 'OUR MISSION') { ?>
                      selected = 'selected'
                    <?php } ?> value="OUR MISSION">OUR MISSION</option>
	        					<option <?php if ($result['status'] == 'OUR VISION') { ?>
                      selected = 'selected'
                    <?php } ?> value="OUR VISION">OUR VISION</option>
	        				</select>
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Update About Content</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>
<?php } } ?>

<?php include 'inc/footer-admin.php'; ?>
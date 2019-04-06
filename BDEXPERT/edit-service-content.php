<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
    $id = $_GET['edit_service'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$Title 	  		= mysqli_real_escape_string($db->link, $_POST['title']);
		$description  	= mysqli_real_escape_string($db->link, $_POST['description']);
		$status 		= mysqli_real_escape_string($db->link, $_POST['status']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "images/".$unique_image;

        if ($Title == "") {
        	$n = "<span class='add_message'>Title empty !</span>";
        }elseif ($status == "") {
        	$n = "<span class='add_message'>Select option empty !</span>";
        }elseif ($description == "") {
        	$n = "<span class='add_message'>Description empty !</span>";
        }elseif ($file_size >1048567) {
             $n = "<span class='add_message'>Image Size should be less then 1MB! </span>";
        } elseif (in_array($file_ext, $permited) === false) {
             $n = "<span class='add_message'>You can upload only:-".implode(', ', $permited)." </span> ";
        }else{
        			move_uploaded_file($file_temp, $uploaded_image);

        	$query = "UPDATE tbl_services SET 
          title = '$Title', 
          content = '$description', 
          image = '$uploaded_image', 
          status = '$status'
          WHERE
          id='$id'
          ";
        	$aboutInsert = $db->update($query);
        	if ($aboutInsert) {
        		$n = "<span class='suuccess_message'>Information Updated Successfully. </span>";
                }else {
                 $n = "<span class='add_message'>Information Not Updated !</span>";
                }
        	}
        }
?>

<?php 
  $query = "SELECT * FROM tbl_services WHERE id='$id'";
  $servicess = $db->select($query);
  if ($servicess) {
    while ($result = $servicess->fetch_assoc()) {
?>

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> SERVICES</h1>
            <p>Add services in your services pages</p>
          </div>
          <?php echo $n; ?>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">SERVICES</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
       	
        	<div class="col-md-12">
        		<div class="card">
        			<form action="" method="post" enctype="multipart/form-data">
        				<div class="form-group">
	        				<select name="status" class="form-control">
	        					<option value="">Select Page</option>
	        					<option <?php if ($result['status'] == 'Student Visa') { ?>
                        selected = 'selected'
                    <?php } ?> value="Student Visa">Student Visa</option>
	        					<option <?php if ($result['status'] == 'Immigration') { ?>
                        selected = 'selected'
                    <?php } ?> value="Immigration">Immigration</option>
	        					<option <?php if ($result['status'] == 'Visit Visa') { ?>
                        selected = 'selected'
                    <?php } ?> value="Visit Visa">Visit Visa</option>
	        					<option <?php if ($result['status'] == 'Scholarship') { ?>
                        selected = 'selected'
                    <?php } ?> value="Scholarship">Scholarship</option>
	        					<option <?php if ($result['status'] == 'Jobs Visa') { ?>
                        selected = 'selected'
                    <?php } ?> value="Jobs Visa">Jobs Visa</option> 
	        					<option <?php if ($result['status'] == 'Tour Packages') { ?>
                        selected = 'selected'
                    <?php } ?> value="Tour Packages">Tour Packages</option>
	        					<option <?php if ($result['status'] == 'Accomodation') { ?>
                        selected = 'selected'
                    <?php } ?> value="Accomodation">Accomodation</option>
	        					<option <?php if ($result['status'] == 'Air Ticketing') { ?>
                        selected = 'selected'
                    <?php } ?> value="Air Ticketing">Air Ticketing</option>
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?>">
	        			</div>
	        			
	        			<div class="form-group">
							
	        				<textarea name="description" id="summernote" cols="30" rows="6" class="form-control" ><?php echo $result['content']; ?></textarea>
	        			</div>
	        			
	        			<div class="form-group">
	        				<input type="file" name="image" class="form-control" >
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Update Service</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>
<?php } } ?>
<?php include 'inc/footer-admin.php'; ?>
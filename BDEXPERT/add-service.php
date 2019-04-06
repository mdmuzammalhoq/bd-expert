<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
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

        	$query = "INSERT INTO tbl_services(title, content, image, status) VALUES('$Title', '$description', '$uploaded_image', '$status')";
        	$aboutInsert = $db->insert($query);
        	if ($aboutInsert) {
        		$n = "<span class='suuccess_message'>Information Added Successfully. </span>";
                }else {
                 $n = "<span class='add_message'>Information Not Added !</span>";
                }
        	}
        }
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
	        					<option value="Student Visa">Student Visa</option>
	        					<option value="Immigration">Immigration</option>
	        					<option value="Visit Visa">Visit Visa</option>
	        					<option value="Scholarship">Scholarship</option>
	        					<option value="Jobs Visa">Jobs Visa</option> 
	        					<option value="Tour Packages">Tour Packages</option>
	        					<option value="Accomodation">Accomodation</option>
	        					<option value="Air Ticketing">Air Ticketing</option>
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" placeholder="Add Title here">
	        			</div>
	        			
	        			<div class="form-group">
							
	        				<textarea name="description" id="summernote" cols="30" rows="6" class="form-control" placeholder="Add description here"></textarea>
	        			</div>
	        			
	        			<div class="form-group">
	        				<input type="file" name="image" class="form-control" placeholder="Add Image here">
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Add Service</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>

<?php include 'inc/footer-admin.php'; ?>
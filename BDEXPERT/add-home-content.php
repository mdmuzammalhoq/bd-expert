<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$topTitle 		= mysqli_real_escape_string($db->link, $_POST['spacetitle']);
		$Title 	  		= mysqli_real_escape_string($db->link, $_POST['title']);
		$subTitle 		= mysqli_real_escape_string($db->link, $_POST['subtitle']);
		$description  	= mysqli_real_escape_string($db->link, $_POST['description']);
		$ImageContent 	= mysqli_real_escape_string($db->link, $_POST['imageContent']);
		$status 		= mysqli_real_escape_string($db->link, $_POST['status']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "images/".$unique_image;

        if ($topTitle == "") {
        	$n = "<span class='add_message'>Top title empty !</span>";
        }elseif ($Title == "") {
        	$n = "<span class='add_message'>Title empty !</span>";
        }elseif ($status == "") {
        	$n = "<span class='add_message'>Select option empty !</span>";
        }elseif ($subTitle == "") {
        	$n = "<span class='add_message'>Sub-title empty !</span>";
        }elseif ($description == "") {
        	$n = "<span class='add_message'>Description empty !</span>";
        }elseif ($ImageContent == "") {
        	$n = "<span class='add_message'>Image Content empty !</span>";
        }elseif ($file_size >1048567) {
             $n = "<span class='add_message'>Image Size should be less then 1MB! </span>";
        } elseif (in_array($file_ext, $permited) === false) {
             $n = "<span class='add_message'>You can upload only:-".implode(', ', $permited)." </span> ";
        }else{
        			move_uploaded_file($file_temp, $uploaded_image);

        	$query = "INSERT INTO tbl_about(title, subtitle, space_title, description, image_content, image, status) VALUES('$Title', '$subTitle', '$topTitle', '$description', '$ImageContent', '$uploaded_image', '$status')";
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
	        				<select name="status" class="form-control">
	        					<option value="">Select</option>
	        					<option value="about us">ABOUT US</option>
	        					<option value="consultation system">CONTSULTAION SYSTEM</option>
	        					<option value="OUR SERVICES">OUR SERVICES</option>
	        					<option value="TESTIMONIAL">TESTIMONIAL</option>
	        					<option value="CONTSULTAION SYSTEM">CONTSULTAION SYSTEM</option>
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="spacetitle" class="form-control" placeholder="Add top title here">
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" placeholder="Add Title here">
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="subtitle" class="form-control" placeholder="Add subtitle here">
	        			</div>
	        			
	        			<div class="form-group">
	        				<textarea name="description" id="" cols="30" rows="6" class="form-control" placeholder="Add description here"></textarea>
	        			</div>
	        			
	        			<div class="form-group">
	        				<textarea name="imageContent" id="" cols="30" rows="6" class="form-control" placeholder="Add Image content here"></textarea>
	        			</div>
	        			
	        			<div class="form-group">
	        				<input type="file" name="image" class="form-control" placeholder="Add Image here">
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Add About Content</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>
      </div></div>

<?php include 'inc/footer-admin.php'; ?>
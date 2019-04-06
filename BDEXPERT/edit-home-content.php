<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
        $id = $_GET['edit_content'];
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
        }elseif ($ImageContent == "") {
            $n = "<span class='add_message'>Image Content empty !</span>";
        }elseif ($file_size >1048567) {
             $n = "<span class='add_message'>Image Size should be less then 1MB! </span>";
        } elseif (in_array($file_ext, $permited) === false) {
             $n = "<span class='add_message'>You can upload Image which only: &ensp;".implode(', ', $permited)." </span> ";
        }else{
        			move_uploaded_file($file_temp, $uploaded_image);

        	$query = "UPDATE tbl_about SET 
                title           = '$Title', 
                subtitle        = '$subTitle', 
                space_title     = '$topTitle', 
                description     = '$description', 
                image_content   = '$ImageContent', 
                image           = '$uploaded_image', 
                status          = '$status'
                WHERE
                id='$id'
                ";
        	$aboutInsert = $db->update($query);
        	if ($aboutInsert) {
        		$n = "<span class='suuccess_message'>Information Updated Successfully. </span>";
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
<?php 
    $query = "SELECT * FROM tbl_about WHERE id='$id'";
    $edit = $db->select($query);
    if ($edit) {
        while ($resultt = $edit->fetch_assoc()) {
?> 	
        	<div class="col-md-12">
        		<div class="card">
        			<form action="" method="post" enctype="multipart/form-data">
        				<div class="form-group">
	        				<select name="status" class="form-control">
	        					<option value="">Select</option>
	        					<option <?php if( $resultt['status'] == 'about us' ) { ?>
                                    selected = "selected"
                            <?php } ?> value="about us">ABOUT US</option>
	        					<option <?php if( $resultt['status'] == 'consultation system' ) { ?>
                                    selected = "selected"
                            <?php } ?> value="consultation system">CONTSULTAION SYSTEM</option>
	        					<option <?php if( $resultt['status'] == 'OUR SERVICES' ) { ?>
                                    selected = "selected"
                            <?php } ?> value="OUR SERVICES">OUR SERVICES</option>
	        					<option <?php if( $resultt['status'] == 'TESTIMONIAL' ) { ?>
                                    selected = "selected"
                            <?php } ?> value="TESTIMONIAL">TESTIMONIAL</option>
	        					<option <?php if( $resultt['status'] == 'CONTSULTAION SYSTEM' ) { ?>
                                    selected = "selected"
                            <?php } ?> value="CONTSULTAION SYSTEM">CONTSULTAION SYSTEM</option>
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="spacetitle" class="form-control" value="<?php echo $resultt['space_title']; ?>">
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" value="<?php echo $resultt['title']; ?>">
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="subtitle" class="form-control" value="<?php echo $resultt['subtitle']; ?>">
	        			</div>
	        			
	        			<div class="form-group">
	        				<textarea name="description" id="" cols="30" rows="6" class="form-control"><?php echo $resultt['description']; ?></textarea>
	        			</div>
	        			
	        			<div class="form-group">
	        				<textarea name="imageContent" id="" cols="30" rows="6" class="form-control" ><?php echo $resultt['image_content']; ?></textarea>
	        			</div>
	        			
	        			<div class="form-group">
	        				<input type="file" name="image" class="form-control" value="<?php echo $resultt['image']; ?>">
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Update Content</button>
        			</form>
        			</div>

        		</div>
<?php } } ?>
        	</div>
       
        </div>
      </div></div>

<?php include 'inc/footer-admin.php'; ?>
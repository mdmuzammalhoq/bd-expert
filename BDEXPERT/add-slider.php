<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$Title 	  		= mysqli_real_escape_string($db->link, $_POST['title']);
		$tagline 		= mysqli_real_escape_string($db->link, $_POST['tagline']);

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
        }elseif ($tagline == "") {
        	$n = "<span class='add_message'>Tagline empty !</span>";
        }elseif ($file_size >1048567) {
             $n = "<span class='add_message'>Image Size should be less then 1MB! </span>";
        } elseif (in_array($file_ext, $permited) === false) {
             $n = "<span class='add_message'>You can upload only:-".implode(', ', $permited)." </span> ";
        }else{
        			move_uploaded_file($file_temp, $uploaded_image);

        	$query = "INSERT INTO tbl_slider(slider_name, slider_tagline, slider_image) VALUES('$Title', '$tagline', '$uploaded_image')";
        	$aboutInsert = $db->insert($query);
        	if ($aboutInsert) {
        		$n = "<span class='suuccess_message'>Slider Added Successfully. </span>";
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
	        				<input type="text" name="title" class="form-control" placeholder="Add Title here">
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="tagline" class="form-control" placeholder="Add tagline here">
	        			</div>
	        			<div class="form-group">
	        				<input type="file" name="image" class="form-control" placeholder="Add Image here">
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Add Slider</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>
      </div></div>

<?php include 'inc/footer-admin.php'; ?>
<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
    $id = $_GET['edit_blog'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$Title 	  		= mysqli_real_escape_string($db->link, $_POST['title']);
		$description  	= mysqli_real_escape_string($db->link, $_POST['description']);
		$author         = mysqli_real_escape_string($db->link, $_POST['author']);

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
        }elseif ($description == "") {
        	$n = "<span class='add_message'>Description empty !</span>";
        }elseif ($author == "") {
            $n = "<span class='add_message'>Add Author Name !</span>";
        }elseif ($file_size >1048567) {
             $n = "<span class='add_message'>Image Size should be less then 1MB! </span>";
        }elseif (in_array($file_ext, $permited) === false) {
             $n = "<span class='add_message'>You can upload only:-".implode(', ', $permited)." </span> ";
        }else{
        			move_uploaded_file($file_temp, $uploaded_image);

        	$query = "UPDATE tbl_blog SET 
          title = '$Title', 
          content = '$description', 
          image = '$uploaded_image',
          author = '$author'
          WHERE id='$id'
          ";
        	$aboutInsert = $db->update($query);
        	if ($aboutInsert) {
        		$n = "<span class='suuccess_message'>Blog information updated to Blog Successfully. </span>";
                }else {
                 $n = "<span class='add_message'>Information Not updated !</span>";
                }
        	}
        }
?>
<?php 
  $query = "SELECT * FROM tbl_blog WHERE id='$id'";
  $blogg = $db->select($query);
  if ($blogg) {
    while ($result = $blogg->fetch_assoc()) {
?>
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> BLOG</h1>
            <p>Add blog content in your blog Page</p>
          </div>
          <?php echo $n; ?>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">BLOG</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
        	
        	<div class="col-md-12">
        		<div class="card">
        			<form action="" method="post" enctype="multipart/form-data">
        				
	        			
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?>">
	        			</div>
	        			<div class="form-group">
	        				<input type="text" name="author" class="form-control" value="<?php echo $result['author']; ?>">
	        			</div>
	        			
	        			<div class="form-group">
	        				<textarea name="description" id="" cols="30" rows="6" class="form-control" ><?php echo $result['content']; ?></textarea>
	        			</div>
	        			<div class="form-group">
	        				<input type="file" name="image" class="form-control" >
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Update blog Content</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>
      </div></div>
<?php } } ?>
<?php include 'inc/footer-admin.php'; ?>
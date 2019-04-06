<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
  $n = "";
  $id = $_GET['edit_immigration'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Title        = mysqli_real_escape_string($db->link, $_POST['title']);
    $description    = mysqli_real_escape_string($db->link, $_POST['description']);
    $status     = mysqli_real_escape_string($db->link, $_POST['status']);
    $side     = mysqli_real_escape_string($db->link, $_POST['side']);

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
        }elseif ($side == "") {
          $n = "<span class='add_message'>Select Image Side !</span>";
        }elseif ($description == "") {
          $n = "<span class='add_message'>Description empty !</span>";
        }elseif ($file_size >1048567) {
             $n = "<span class='add_message'>Image Size should be less then 1MB! </span>";
        }elseif (in_array($file_ext, $permited) === false) {
             $n = "<span class='add_message'>You can upload only:-".implode(', ', $permited)." </span> ";
        }else{
              move_uploaded_file($file_temp, $uploaded_image);

          $query = "UPDATE  tbl_immigration SET 
            title = '$Title', 
            content = '$description', 
            image = '$uploaded_image', 
            status = '$status', 
            side = '$side'
            WHERE id='$id'
            ";
          $aboutInsert = $db->update($query);
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
            <h1><i class="fa fa-dashboard"></i> IMMIGRATION</h1>
            <p>Add immigration in your immigration pages</p>
          </div>
          <?php echo $n; ?>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">IMMIGRATION</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
<?php 
  $query = "SELECT * FROM tbl_immigration WHERE id='$id'";
  $imm_edit = $db->select($query);
  if ($imm_edit) {
    while ($result = $imm_edit->fetch_assoc()) {
?>      	
        	<div class="col-md-12">
        		<div class="card">
        			<form action="" method="post" enctype="multipart/form-data">
        				<div class="form-group">
	        				<select name="status" class="form-control">
	        					<option value="">---Select Country---</option>
	        					<option <?php if ($result['status'] == 'CANADA') { ?>
                      selected = 'selected'
                    <?php } ?> value="CANADA">CANADA</option>
                    <option <?php if ($result['status'] == 'UK') { ?>
                      selected = 'selected'
                    <?php } ?> value="UK">UK</option>
                    <option <?php if ($result['status'] == 'AUSTRALIA') { ?>
                      selected = 'selected'
                    <?php } ?> value="AUSTRALIA">AUSTRALIA</option>
                    <option <?php if ($result['status'] == 'NEW ZEALAND') { ?>
                      selected = 'selected'
                    <?php } ?> value="NEW ZEALAND">NEW ZEALAND</option>
                    <option <?php if ($result['status'] == 'MALAYSIA') { ?>
                      selected = 'selected'
                    <?php } ?> value="MALAYSIA">MALAYSIA</option>
                    <option <?php if ($result['status'] == 'DENMARK') { ?>
                      selected = 'selected'
                    <?php } ?> value="DENMARK">DENMARK</option>
                    <option <?php if ($result['status'] == 'USA') { ?>
                      selected = 'selected'
                    <?php } ?> value="USA">USA</option>
	        				</select>
	        			</div>
	        			<div class="form-group">
                  <select name="side" class="form-control">
                    <option value="">---Select Image Side---</option>
                    <option  <?php if ($result['side'] == 'LEFT') { ?>
                      selected = 'selected'
                    <?php } ?>  value="LEFT">LEFT</option>
                    <option  <?php if ($result['side'] == 'RIGHT') { ?>
                      selected = 'selected'
                    <?php } ?> value="RIGHT">RIGHT</option>
                  </select>
                </div>
	        			<div class="form-group">
	        				<input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?>">
	        			</div>
	        			<div class="form-group">
	        				<textarea name="description" id="" cols="30" rows="6" class="form-control" ><?php echo $result['content']; ?></textarea>
	        			</div>
	        			
	        			<div class="form-group">
	        				<input type="file" name="image" class="form-control" placeholder="Add Image here">
	        			</div>
	        			
	        			<button type="submit" class="btn btn-primary btn-block">Add About Content</button>
        			</form>
        			</div>

        		</div>
<?php } } ?>
        	</div>
       
        </div>
      </div></div>

<?php include 'inc/footer-admin.php'; ?>
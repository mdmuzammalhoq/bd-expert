<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$Title 	  		= mysqli_real_escape_string($db->link, $_POST['title']);
		$description  	= mysqli_real_escape_string($db->link, $_POST['description']);
		$status  	= mysqli_real_escape_string($db->link, $_POST['status']);

			

        if ($Title == "") {
        	$n = "<span class='add_message'>Title empty !</span>";
        }elseif ($description == "") {
        	$n = "<span class='add_message'>Description empty !</span>";
        }else{
        	$query = "INSERT INTO tbl_about_us(title, content, status) VALUES('$Title', '$description', '$status')";
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
	        				<input type="text" name="title" class="form-control" placeholder="Add Title here">
	        			</div>
	        			
	        			
	        			<div class="form-group">
	        				<textarea name="description" id="" cols="30" rows="6" class="form-control" placeholder="Add description here"></textarea>
	        			</div>
	        			<div class="form-group">
	        				<select name="status" class="form-control">
	        					<option value="">---Select Position---</option>
	        					<option value="OUR MISSION">OUR MISSION</option>
	        					<option value="OUR VISION">OUR VISION</option>
	        				</select>
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Add About Content</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>
      </div></div>

<?php include 'inc/footer-admin.php'; ?>
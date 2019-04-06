<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $name		= mysqli_real_escape_string($db->link, $_POST['name']);

        if ($name == "") {
        	$n = "<span class='add_message'>Enter Country Name.</span>";
        }else{
        	$query = "INSERT INTO tbl_country(name) VALUES('$name')";
        	$aboutInsert = $db->insert($query);
        	if ($aboutInsert) {
        		$n = "<span class='suuccess_message'>Country Added Successfully. </span>";
                }else {
                 $n = "<span class='add_message'>Country Not Added !</span>";
                }
        	}
        }
?>



<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> COUNTRY</h1>
            <p>Add countries in your country page</p>
          </div>
          <?php echo $n; ?>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">COUNTRY</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
       	
        	<div class="col-md-12">
        		<div class="card">
        			<form action="" method="post" enctype="multipart/form-data">
        				
	        			<div class="form-group">
	        				<input type="text" name="name" class="form-control" placeholder="Add country Name">
	        			</div>
	        			<button type="submit" class="btn btn-primary btn-block">Add Country</button>
        			</form>
        			</div>

        		</div>
        		
        	</div>
       
        </div>

<?php include 'inc/footer-admin.php'; ?>
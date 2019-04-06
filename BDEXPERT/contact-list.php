<?php include 'inc/header-admin.php'; ?>
<?php include 'inc/menu-bar.php'; ?>
<style>
  th{
    text-align: center;
  }
  td{
    text-align: center;
  }
</style>
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> CONTACT LIST</h1>
            <p>Who have messaged you today or before</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
       	
        	<div class="col-md-12">
        		<div class="card" id="content_delete">
        			<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
	$query = "SELECT * FROM tbl_contact order by id desc";
	$hompage = $db->select($query);
	if ($hompage) {
		while ($result = $hompage->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $result['id']; ?></td>
      <td><?php echo $result['name']; ?></td>
      <td><?php echo $result['email']; ?></td>
      <td><?php echo $result['phone']; ?></td>
      <td><?php echo $fm->textShorten($result['subject'], 50); ?></td>
      <td><?php echo $fm->textShorten($result['message'], 50); ?></td>
      
      <td>
      	<a style="color: #4296ff; font-size: 19px;" href="view-contact.php?view_conatct=<?php echo $result['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> 
  	  </td>
    </tr>
<?php } } ?>
  </tbody>
</table>
        			</div>

        		</div>
        		
        	</div>
       
        </div>


<?php include 'inc/footer-admin.php'; ?>
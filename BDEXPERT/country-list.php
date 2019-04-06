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
            <h1><i class="fa fa-dashboard"></i> COUNTRY</h1>
            <p>All country of country page shown here</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">COUNTRY</a></li>
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
      <th scope="col">Country Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
	$query = "SELECT * FROM tbl_country order by id desc";
	$hompage = $db->select($query);
	if ($hompage) {
		while ($result = $hompage->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $result['id']; ?></td>
      <td><?php echo $result['name']; ?></td>
      
      <td>
      	<a style="color: #4296ff; font-size: 19px;" href="edit-country.php?edit_country=<?php echo $result['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a style="color: #ff4545; font-size: 20px;" onclick="CountryDelete(delCountry=<?php echo $result['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
  	  </td>
    </tr>
<?php } } ?>
  </tbody>
</table>
        			</div>

        		</div>
        		
        	</div>
       
        </div>
<script>
    function CountryDelete(delCountry){
        var id = delCountry;
        var data_Link = 'delete_country.php';
        var data_string = 'id='+id;

        $.ajax({
            type : 'POST',
            url : data_Link,
            data : data_string,
            success:function(data){
                 $("#content_delete").html(data);
                 //alert(data);
            }
        });

    }
</script>

<?php include 'inc/footer-admin.php'; ?>
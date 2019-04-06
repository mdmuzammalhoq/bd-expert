<?php
  include '../lib/config.php';
  include '../lib/database.php';
  include '../lib/helpers.php';

  $db = new Database();
  $fm = new Format();
?>

<?php 
	$id = $_POST['id'];
		$delquery = "DELETE FROM tbl_services WHERE id='$id'";
		$delProduct = $db->delete($delquery);
		if ($delProduct ) { 
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
  $query = "SELECT * FROM tbl_services order by id desc";
  $hompage = $db->select($query);
  if ($hompage) {
    while ($result = $hompage->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $result['id']; ?></td>
      <td><?php echo $fm->textShorten($result['title'], 30); ?></td>
      <td><?php echo $fm->textShorten($result['content'], 30); ?></td>
      <td><img style="width: 50px;height: 30px;" src="<?php echo $result['image']; ?>" alt=""></td>
      <td><?php echo $result['status']; ?></td>
      <td>
        <a href="edit-service-content.php?edit_service=<?php echo $result['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a onclick="sDelete(delService=<?php echo $result['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
      </td>
    </tr>
<?php } } ?>
  </tbody>
</table>
	<?php }else{ echo "NO"; } ?>
<script>
    function sDelete(delService){
        var id = delService;
        var data_Link = 'delete_service.php';
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
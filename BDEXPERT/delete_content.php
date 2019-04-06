<?php
  include '../lib/config.php';
  include '../lib/database.php';
  include '../lib/helpers.php';

  $db = new Database();
  $fm = new Format();
?>

<?php 
	$id = $_POST['id'];
		$delquery = "DELETE FROM tbl_about WHERE id='$id'";
		$delProduct = $db->delete($delquery);
		if ($delProduct ) { 
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Subtitle</th>
      <th scope="col">Top Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image Content</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
	$query = "SELECT * FROM tbl_about order by id desc";
	$hompage = $db->select($query);
	if ($hompage) {
		while ($result = $hompage->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $result['id']; ?></td>
      <td><?php echo $fm->textShorten($result['title'], 30); ?></td>
      <td><?php echo $fm->textShorten($result['subtitle'], 30); ?></td>
      <td><?php echo $fm->textShorten($result['space_title'], 30); ?></td>
      <td><?php echo $fm->textShorten($result['description'], 30); ?></td>
      <td><?php echo $fm->textShorten($result['image_content'], 30); ?></td>
      <td><?php echo $result['image']; ?></td>
      <td><?php echo $result['status']; ?></td>
      <td>
      	<a href="edit-home-content.php?edit_content=<?php echo $result['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a onclick="cDelete(delContent=<?php echo $result['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
  	  </td>
    </tr>
<?php } } ?>
  </tbody>
</table>
	<?php }else{ echo "NO"; } ?>
<script>
    function cDelete(delContent){
        var id = delContent;
        var data_Link = 'delete_content.php';
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
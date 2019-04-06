<?php
  include '../lib/config.php';
  include '../lib/database.php';
  include '../lib/helpers.php';

  $db = new Database();
  $fm = new Format();
?>

<?php 
	$id = $_POST['id'];
		$delquery = "DELETE FROM tbl_slider WHERE id='$id'";
		$delProduct = $db->delete($delquery);
		if ($delProduct ) { 
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Slider Name</th>
      <th scope="col">Tagline</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
  $query = "SELECT * FROM tbl_slider order by id desc";
  $hompage = $db->select($query);
  if ($hompage) {
    while ($result = $hompage->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $result['id']; ?></td>
      <td><?php echo $result['slider_name']; ?></td>
      <td><?php echo $result['slider_tagline']; ?></td>
      <td><img style="width: 50px;height: 30px;" src="<?php echo $result['slider_image']; ?>" alt=""></td>
      
      <td>
        <a onclick="sDelete(delSlider=<?php echo $result['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
      </td>
    </tr>
<?php } } ?>
  </tbody>
</table>
	<?php }else{ echo "NO"; } ?>
<script>
    function sDelete(delSlider){
        var id = delSlider;
        var data_Link = 'delete_slider.php';
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
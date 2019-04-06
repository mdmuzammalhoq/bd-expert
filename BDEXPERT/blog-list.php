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
            <h1><i class="fa fa-dashboard"></i> BLOG</h1>
            <p>All info of blog page shown here</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">BLOG</a></li>
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
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Author</th>
      <th scope="col">Image</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
	$query = "SELECT * FROM tbl_blog order by id desc";
	$hompage = $db->select($query);
	if ($hompage) {
		while ($result = $hompage->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $result['id']; ?></td>
      <td><?php echo $result['title']; ?></td>
      <td><?php echo $fm->textShorten($result['content'], 50); ?></td>
      <td><?php echo $result['author']; ?></td>
      <td><img style="width: 50px; height: 30px;" src="<?php echo $result['image']; ?>" alt=""></td>
      <td><?php echo $result['date']; ?></td>
      
      <td>
      	<a style="color: #4296ff; font-size: 19px;" href="edit-blog.php?edit_blog=<?php echo $result['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a style="color: #ff4545; font-size: 20px;" onclick="bDelete(delBlog=<?php echo $result['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    function bDelete(delBlog){
        var id = delBlog;
        var data_Link = 'delete_blog.php';
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
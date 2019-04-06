<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $fm -> validation($_POST['email']);
		$password = $fm -> validation(md5($_POST['password']));

		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$password = mysqli_real_escape_string($db->link, md5($_POST['password']));

		if($email == ""){
			$n = "email empty !";
		}elseif($password == ""){
			$n = "password empty !";
		}else{
			$query = "SELECT * FROM tbl_log_reg WHERE email = '$email' AND password='$password'";
			$signin= $db->select($query);
			if ($signin != false) {
				$value = mysqli_fetch_array($signin);
				$row = mysqli_num_rows($signin);

				if($row > 0){
					
	        		$_SESSION['email'] = $value['email'];		
	        		$_SESSION['password'] = $value['password'];
	        						
					header("Location: log_landing.php");
					
				}else{
					echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
				} 
				}else{
					echo "<span style ='color: red; font-size=18px; '>Email or Password Not Matched !!</span>";
			}
			}
		}
	
?>
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
							<div class="signin-form profile">
							<h3 class="agileinfo_sign">Sign In</h3>	
								<div class="login-form">
									<form action="#" method="post">
										<input type="email" name="email" placeholder="E-mail" required="">
										<input type="password" name="password" placeholder="Password" required="">
										<div class="tp">
											<input type="submit" value="Sign In">
										</div>
									</form>
									</div>
									<div class="login-social-grids">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<p><a href="#" data-toggle="modal" data-target="#myModal3" > Don't have an account?</a></p>
								</div>
						</div>
					</div>
				</div>
				</div>
				<!-- //Modal1 -->	
<?php include 'inc/signup.php'; ?>
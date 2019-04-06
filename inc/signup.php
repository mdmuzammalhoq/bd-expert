<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$password = mysqli_real_escape_string($db->link, md5($_POST['password']));

		if ($name == "") {
			$n = "name empty !";
		}elseif($email == ""){
			$n = "email empty !";
		}elseif($password == ""){
			$n = "password empty !";
		}else{
			$query = "INSERT INTO tbl_log_reg(name, email, password) VALUES('$name', '$email', '$password')";
			$signup = $db->insert($query);
			if ($signup) {
				$n = "Registration Successful.";
			}else{
				$n = "Error occured. Try again";
			}
		}
	}
?>
				<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								
								<div class="signin-form profile">
								<h3 class="agileinfo_sign">Sign Up</h3>	
								<div class="login-form">
									<?php echo $n;  ?>
									<form action="" method="post">
									   <input type="text" name="name" placeholder="Name">
										<input type="email" name="email" placeholder="Email" >
										<input type="password" name="password" placeholder="Password" >
										<input type="submit" value="Sign Up">
									</form>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
	<!-- //Modal2 -->
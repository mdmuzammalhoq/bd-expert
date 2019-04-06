<?php include 'inc/header.php'; ?>
<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name    = mysqli_real_escape_string($db->link, $_POST['name']);
		$email   = mysqli_real_escape_string($db->link, $_POST['email']);
		$phone 	 = mysqli_real_escape_string($db->link, $_POST['phone']);
		$subject = mysqli_real_escape_string($db->link, $_POST['subject']);
		$message = mysqli_real_escape_string($db->link, $_POST['message']);

		if ($name == "") {
			$n = "<span style='color: red;'>Name field empty. Please fill...</span>";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	 		$n = "<span style='color: red;'>Invalid Email Address ! </span>";
	 	}elseif ($phone == "") {
			$n = "<span style='color: red;'>Phone field empty. Please fill...</span>";
		}elseif ($subject == "") {
			$n = "<span style='color: red;'>Subject field empty. Please fill...</span>";
		}elseif ($message == "") {
			$n = "<span style='color: red;'>Message field empty. Please fill...</span>";
		}else{
			$query = "INSERT INTO tbl_contact(name, email, phone, subject, message) VALUES('$name', '$email', '$phone', '$subject', '$message')";
			$contact = $db->insert($query);
			if ($contact) {
				$n = "<span style='color: #0c6102;padding: 54px;'>Message sent successfully. Thanks.</span>";
			}else{
				$n = "<span>Error occured ! Message not sent.</span>";
			}
		}
	}
?>
	<div class="section-heading contact-head">
		<h1>Contact Us</h1>
	</div>
	<div class="contact-area">
		<div class="contact-content  container">
			<div class="row">
				<div class="col-md-6">
					<div class="messege-title">
						<h1>Give Us Messege</h1>

					</div>
					<div style="height: 20px;width: 360px; margin-left: 20px;margin-bottom: 20px;"><?php echo $n; ?></div>
					<form action="" method="post">
						<div class="form-group">
							<div class="col-sm-8">
							  <input type="text" name="name" class="form-control" id="" placeholder="Name">
							</div>					 
						</div>
						<div class="form-group">
							<div class="col-sm-8">
							  <input type="text" name="email" class="form-control" id="" placeholder="E-Mail">
							</div>					 
						</div>
						<div class="form-group">
							<div class="col-sm-8">
							  <input type="text" name="phone" class="form-control" id="" placeholder="Phone Number">
							</div>					 
						</div>
						<div class="form-group">
							<div class="col-sm-8">
							  <input type="text" name="subject" class="form-control" id="" placeholder="Subject">
							</div>					 
						</div>
						<div class="form-group">
							<div class="col-sm-12">
							 <textarea name="message" class="form-control" rows="4" placeholder="Your Messege"></textarea>
							</div>					 
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="submit" class="btn btn-default">Send Messege</button>
							</div>
						</div>
						</form>					
				</div>
		
				<div class="col-md-6">
					<div class="messege-title">
						<h1>Find Us In Map</h1>
					</div>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1535.4331508146226!2d90.3866280769722!3d23.75108582432961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1511755276567" width="380" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>
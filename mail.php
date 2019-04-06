<?php include 'inc/header.php'; ?>
<!--/ banner -->
<div class="banner1">			
		<div class="w3_agileits_service_banner_info">
			<h2>Mail Us </h2>
		</div>
	</div>
<!--/ banner -->
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
<!-- /contact -->	
<div class="inner_main_agile_section">
	<div class="container">
	   
			<h3 class="w3l_header w3_agileits_header"> Leave a <span style="color: #e2a64c;">Message</span></h3>

			<p class="sub_para_agile two">Ipsum dolor sit amet consectetur adipisicing elit</p>
			 <div class="contact-form agile_inner_grids">
			 	<div style="height: 43px;width: 100%;margin-left: 20px;margin-bottom: 20px;text-align: center;background: #f3f3f3;padding: 6px;font-size: 21px;"><?php echo $n; ?></div>
				<form action="" method="post">
					<div class="fields-grid">
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="name" required="">
							<label>Full Name</label>
							<span></span>
						</div>
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="phone" required=""> 
							<label>Phone</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="email" name="email" required=""> 
							<label>Email</label>
							<span></span>
						</div> 
						<div class="styled-input">
							<input type="text" name="subject" required="">
							<label>Subject</label>
							<span></span>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="styled-input textarea-grid">
						<textarea name="message" required=""></textarea>
						<label>Message</label>
						<span></span>
					</div>	 
					<input type="submit" value="SEND">
				</form>
			</div>
    </div>
</div>
            <!-- map -->
				<h3 class="w3l_header w3_agileits_header"> Find <span>Us</span></h3>
			<p class="sub_para_agile two">Ipsum dolor sit amet consectetur adipisicing elit</p>
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.86654334463!2d-74.25818682528057!3d40.70531100753592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1497241987900"  allowfullscreen></iframe>
				</div>
			<!-- //map --> 
<!-- //contact -->
<?php include 'inc/footer.php'; ?>
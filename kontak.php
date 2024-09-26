<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
<link rel="stylesheet" type="text/css" href="assets/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="assets/styles/contact_responsive.css">
</head>
<style>
    /* Responsif peta untuk tampilan kecil */
.map-container {
    position: relative;
    width: 100%; /* Membuat peta mengikuti lebar kontainer */
    padding-top: 56.25%; /* Rasio aspek 16:9 */
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

</style>
<?php
			
$sql = "SELECT * FROM kontak WHERE id_kontak = 1"; // Adjust the query as needed
$result = $koneksi->query($sql);

if ($result === false) {
    die("Error: " . $koneksi->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$map_url = $row['link_maps'];
} else {
    $row = null;
}


?>
<body>

<div class="super_container">


	

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	

	<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
					</ul>
				</div>

			</div>
      
		</div>

		<!-- Map Container -->
		 
	

		<div class="row">
    <div class="col">
	<div class="map-container">
        <iframe src="<?php echo $map_url; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
</div>


		<!-- Contact Us -->

		<div class="row">


<div class="col-lg-6 contact_col">
    <div class="contact_contents">
        <h1>Contact Us</h1>
        <p><?php echo $row ? $row['deskripsi'] : 'Description Belum Ada silahkan di isi di frontend'; ?></p>
        <div>
            <p><?php echo $row ? $row['notelp'] : 'Phone number Belum Ada silahkan di isi di frontend'; ?></p>
            <p><?php echo $row ? $row['email'] : 'Email Belum Ada silahkan di isi di frontend'; ?></p>
        </div>
        <div>
            <p><?php echo $row ? $row['nama_pemilik'] : 'Owner name Belum Ada silahkan di isi di frontend'; ?></p>
        </div>
        <div>
            <p>Open hours: <?php echo $row ? $row['jambuka'] : 'Hours Belum Ada silahkan di isi di frontend'; ?></p>
            <p>Sunday: Closed</p>
        </div>
    </div>
	
    <!-- Follow Us -->
    <div class="follow_us_contents">
        <h1>Follow Us</h1>
        <ul class="social d-flex flex-row">
            <li><a href="<?php echo $row ? $row['facebook'] : '#'; ?>" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo $row ? $row['twitter'] : '#'; ?>" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo $row ? $row['instagram'] : '#'; ?>" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo $row ? $row['tiktok'] : '#'; ?>" style="background-color: #fb4343"><i class="bi bi-tiktok"></i></a></li>
        </ul>
    </div>
</div>

			<div class="col-lg-6 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Get In Touch With Us!</h1>
					<p>Fill out the form below to recieve a free and confidential.</p>
					<form action="post">
						<div>
							<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
							<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
							<input id="input_website" class="form_input input_website input_ph" type="url" name="name" placeholder="Website" required="required" data-error="Name is required.">
							<textarea id="input_message" class="input_ph input_message" name="message"  placeholder="Message" rows="3" required data-error="Please, write us a message."></textarea>
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">send message</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Subscribe to our newsletter and get 20% off your first purchase</p>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="post">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



</div>


<script src="assets/plugins/easing/easing.js"></script>
<script src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255314.40364579426!2d100.22645675785662!3d-0.9345797341146096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b942e2b117bb%3A0xb8468cb5c3046ba5!2sPadang%2C%20Kota%20Padang%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1726559051169!5m2!1sid!2sid"></script>
<script src="assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/contact_custom.js"></script>
</body>

</html>

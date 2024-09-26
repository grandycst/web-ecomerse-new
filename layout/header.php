<?php

			
$sql = "SELECT * FROM kontak WHERE id_kontak = 1"; // Adjust the query as needed
$result = $koneksi->query($sql);

if ($result === false) {
    die("Error: " . $koneksi->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$map_url = $row['link_maps'];
	$nama_toko=$row['nama_toko'];
	$title=$row['title'];
} else {
    $row = null;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
<link href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">


<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="frontend/css/bootstrap.min.css" />

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="frontend/css/slick.css" />
<link type="text/css" rel="stylesheet" href="frontend/css/slick-theme.css" />

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="frontend/css/nouislider.min.css" />

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="frontend/css/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="frontend/css/style.css" />



</head>


<?php

session_start();

$file = basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['customer_status'])){

	// halaman yg dilindungi jika customer belum login
	$lindungi = array('?page=customer/index','?page=customer/customer_logout');

	// periksa halaman, jika belum login ke halaman di atas, maka alihkan halaman
	if(in_array($file, $lindungi)){
		header("location:?pege=home");
	}

	if($file == "?page=checkout"){
		header("location:masuk.php?alert=login-dulu");
	}

}else{

	// halaman yg tidak boleh diakses jika customer sudah login
	$lindungi = array('?page=masuk','?page=daftar');

	// periksa halaman, jika sudah dan mengakses halaman di atas, maka alihkan halaman
	if(in_array($file, $lindungi)){
		header("location:?page=customer/index");
	}

}



if($file == "?page=checkout"){


	if(!isset($_SESSION['keranjang']) || count($_SESSION['keranjang']) == 0){

		header("location:?page=keranjang/keranjang?alert=keranjang_kosong");

	}
}
						if(isset($_SESSION['customer_status'])){
							$id_customer = $_SESSION['customer_id'];
							$customer = mysqli_query($koneksi,"select * from customer where customer_id='$id_customer'");
							$c = mysqli_fetch_assoc($customer);
							?>
							<!-- Account -->
							<li class="header-account dropdown default-dropdown" style="min-width: 200px">
								<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
									<div class="header-btns-icon">
										<i class="fa fa-user-o"></i>
									</div>
									<strong class="text-uppercase"><?php echo $c['customer_nama']; ?> <i class="fa fa-caret-down"></i></strong>
								</div>
								<span><?php echo $c['customer_email']; ?></span>
								<ul class="custom-menu">
									<li><a href="customer.php"><i class="fa fa-user-o"></i> Akun Saya</a></li>
									<li><a href="customer_pesanan.php"><i class="fa fa-list"></i> Pesanan Saya</a></li>
									<li><a href="customer_password.php"><i class="fa fa-lock"></i> Ganti Password</a></li>
									<li><a href="customer_logout.php"><i class="fa fa-sign-out"></i> Keluar</a></li>
								</ul>
							</li>
							<!-- /Account -->
							<?php
						}else{
							?>
							<li class="header-account dropdown default-dropdown">
								<a href="masuk.php" class="text-uppercase main-btn">Login</a> 
								<a href="daftar.php" class="text-uppercase primary-btn">Daftar</a> 
							</li>
							<?php
						}
						?>


<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all u.s orders over $50</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->

								<li class="currency">
									<a href="#">
										IDR
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">usd</a></li>
										<li><a href="#">cad</a></li>
										<li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li>
									</ul>
								</li>
								<li class="language">
									<a href="#">
										Bahasa Indonesia
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li>
							

<!-- Menu Akun -->
<li class="account">
    <a href="#">
        My Account
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="account_selection">
        <?php if (isset($_SESSION['customer_id'])): ?>
            <!-- Jika pengguna sudah login, tampilkan opsi logout -->
            <li><a href="?page=customer/customer_logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
        <?php else: ?>
            <!-- Jika pengguna belum login, tampilkan opsi login dan registrasi -->
            <li><a href="?page=masuk"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
            <li><a href="?page=daftar"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
        <?php endif; ?>
    </ul>
</li>

									
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="?page=home"><?php echo $nama_toko; ?></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="?page=home">home</a></li>
								<li><a href="?page=shop">shop</a></li>
							
								<li><a href="?page=blog">blog</a></li>
								<li><a href="?page=kontak">contact</a></li>
							</ul>
<!-- Cart -->
				
							<?php 
							if(isset($_SESSION['keranjang'])){
								$jumlah_isi_keranjang = count($_SESSION['keranjang']);
							}else{
								$jumlah_isi_keranjang = 0;
							}
							?>

							
							
						
						<!-- /Cart -->

							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
							
							


<?php if (isset($_SESSION['customer_id'])): ?>
    <li><a href="?page=customer/customer"><i class="fa fa-user" aria-hidden="true"></i></a></li>
	<?php endif; ?>



								<?php 
								$total = 0;
								if(isset($_SESSION['keranjang'])){
									$jumlah_isi_keranjang = count($_SESSION['keranjang']);
									for($a = 0; $a < $jumlah_isi_keranjang; $a++){
										$id_produk = $_SESSION['keranjang'][$a]['produk'];
										$isi = mysqli_query($koneksi,"select * from produk where produk_id='$id_produk'");
										$i = mysqli_fetch_assoc($isi);
										$total += $i['produk_harga'];
									}
								}
								?>
								<span><?php echo "Rp. ".number_format($total)." ,-"; ?></span>
								<li class="checkout">
									<a href="?page=keranjang/keranjang">
									<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty"><?php echo $jumlah_isi_keranjang; ?></span>
								</div>
									</a>
									<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										<?php 
										$total_berat = 0;
										if(isset($_SESSION['keranjang'])){

											$jumlah_isi_keranjang = count($_SESSION['keranjang']);

											if($jumlah_isi_keranjang != 0){
												// cek apakah produk sudah ada dalam keranjang
												for($a = 0; $a < $jumlah_isi_keranjang; $a++){
													$id_produk = $_SESSION['keranjang'][$a]['produk'];
													$isi = mysqli_query($koneksi,"select * from produk where produk_id='$id_produk'");
													$i = mysqli_fetch_assoc($isi);

													$total_berat += $i['produk_berat'];
													?>

													<div class="product product-widget">
														<div class="product-thumb">
															<?php if($i['produk_foto1'] == ""){ ?>
																<img src="gambar/sistem/produk.png">
															<?php }else{ ?>
																<img src="gambar/produk/<?php echo $i['produk_foto1'] ?>">
															<?php } ?>
														</div>
														<div class="product-body">
															<h3 class="product-price"><?php echo "Rp. ".number_format($i['produk_harga']) . " ,-"; ?></h3>
															<h2 class="product-name"><a href="produk_detail.php?id=<?php echo $i['produk_id'] ?>"><?php echo $i['produk_nama'] ?></a></h2>
														</div>
														<a class="cancel-btn" href="keranjang_hapus.php?id=<?php echo $i['produk_id']; ?>&redirect=keranjang"><i class="fa fa-trash"></i></a>
													</div>

													<?php

												}
											}else{
												echo "<center>Keranjang Masih Kosong.</center>";
											}
											

										}else{
											echo "<center>Keranjang Masih Kosong.</center>";
										}
										?>
										
									</div>
									<div class="shopping-cart-btns">
										<a class="main-btn" href="keranjang.php">Keranjang</a>
										<a class="primary-btn" href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>
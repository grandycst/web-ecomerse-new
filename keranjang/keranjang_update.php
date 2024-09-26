<?php 


$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$redirect = $_GET['redirect'];
session_start();
$jumlah_isi_keranjang = count($_SESSION['keranjang']);

for($a = 0;$a < $jumlah_isi_keranjang; $a++){
	
	$_SESSION['keranjang'][$a] = array(
		'produk' => $produk[$a],
		'jumlah' => $jumlah[$a]
	);

}

if (isset($_GET['redirect'])) {
    $redirect = $_GET['redirect'];
    header("Location: ../index.php?page=keranjang/$redirect");
    exit();
} else {
    header("Location: ../index.php?page=keranjang/keranjang");
    exit();
}
?>
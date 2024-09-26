<?php 
session_start();

$id_produk = $_GET['id'];
$redirect = $_GET['redirect'];

if(isset($_SESSION['keranjang'])){


	for($a=0;$a<count($_SESSION['keranjang']);$a++){
		if($_SESSION['keranjang'][$a]['produk'] == $id_produk){
			unset($_SESSION['keranjang'][$a]);

			// urutkan kembali
			sort($_SESSION['keranjang']);
		}
	}

	
}

if (isset($_GET['redirect'])) {
    $redirect = $_GET['redirect'];
    header("Location: ../index.php?page=keranjang/$redirect");
    exit();
} else {
    header("Location: ../keranjang.php");
    exit();
}

print_r($_SESSION['keranjang']);
header("location:".$produk);
?>
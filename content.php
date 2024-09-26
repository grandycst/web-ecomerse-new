<?php
// // Daftar halaman yang diperbolehkan
// $allowed_pages = ['home', 'keranjang/keranjang', 'keranjang/keranjang_masukan','detail_produk','keranjang','keranjang/keranjang_update','keranjang_hapus']; // Tambahkan nama file yang diizinkan

// // Cek apakah parameter 'page' ada dan nilainya termasuk dalam daftar halaman yang diizinkan
// if (!empty($_GET['page']) && in_array($_GET['page'], $allowed_pages)) {
//     include_once($_GET['page'] . ".php");
// } else {
//     // Jika parameter 'page' tidak ada atau tidak valid, tampilkan halaman default (misalnya 'home.php')
//     include "home.php";
// }

if (!empty($_GET['page'])) {
    include_once($_GET['page'] . ".php");
} else {
    include "home.php";
}
?>

<?php
include '../../koneksi.php';

$title = $_POST['title'];
$nama_toko = $_POST['nama_toko'];
$deskripsi = $_POST['deskripsi'];
$nama_pemilik = $_POST['nama_pemilik'];
$notelp = $_POST['notelp'];
$email = $_POST['email'];
$jambuka = $_POST['jambuka'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$tiktok = $_POST['tiktok'];
$link_maps = $_POST['link_maps'];

// Menutup tanda kutip pada query dan menambahkan titik koma
$query = "INSERT INTO kontak (title, nama_toko, deskripsi, nama_pemilik, notelp,email,jambuka,facebook,twitter,instagram,toktok,link_maps) ;
VALUES ('$title', '$nama_toko', '$deskripsi',
 '$nama_pemilik', '$notelp','$email','$jambuka',
 '$facebook','$twitter','$instagram','$toktok')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>

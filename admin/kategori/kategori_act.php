<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];

mysqli_query($koneksi, "insert into kategori values (NULL,'$nama')");
header("location:../index.php?page=kategori/index");
<?php
include '../../koneksi.php';

$id_kontak = $_POST['id_kontak'];
$query = "DELETE FROM kontak WHERE id_kontak='$id_kontak'";
mysqli_query($koneksi, $query);
?>

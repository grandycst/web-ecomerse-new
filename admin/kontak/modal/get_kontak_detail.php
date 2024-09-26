<?php
include '../../koneksi.php';

$id_kontak = $_POST['id_kontak'];
$query = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id_kontak='$id_kontak'");
$data = mysqli_fetch_assoc($query);

echo json_encode($data);
?>

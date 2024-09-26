
<?php
include '../../koneksi.php';

$id_kontak = $_POST['id_kontak'];
$title = $_POST['title'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$peran = $_POST['peran'];

$query = "UPDATE kontak SET title='$title', email='$email', telepon='$telepon', peran='$peran' WHERE id_kontak='$id_kontak'";
mysqli_query($koneksi, $query);
?>

<?php

// untuk memulai session
session_start();

// if ($_SESSION == NULL){
//     echo "<script>
//     alert('Harap Login Terlebih Dahulu')
//     window.location.href='?page=home'
//     </script>";
// }


// Cek apakah pengguna sudah login



include "koneksi.php";
include "layout/header.php";
include "content.php";
include "layout/footer.php";
?>
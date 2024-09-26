<?php

// untuk memulai session
session_start();


//jika belum login
if ($_SESSION == NULL){
    echo "<script>
    alert('Harap Login Terlebih Dahulu')
    window.location.href='login/index.php'
    </script>";
}
include "koneksi.php";
include "layout/header.php";
include "content.php";
include "layout/footer.php";
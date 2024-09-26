<?php 


session_start();

unset($_SESSION['customer_id']);
unset($_SESSION['customer_status']);

//menghapus session
session_destroy();

echo "<script>
alert('Anda Telah Logout')
window.location.href='index.php'
</script>";

?>
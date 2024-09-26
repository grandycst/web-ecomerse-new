<?php
session_start();
include '../koneksi.php'; // File untuk menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input untuk mencegah serangan injeksi
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['admin_password'];

    // Query untuk cek apakah pengguna ada
    $sql = "SELECT * FROM admin WHERE admin_username = ?";
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verifikasi kata sandi
            if (password_verify($password, $user['admin_password'])) {
                $_SESSION['admin'] = htmlspecialchars($user['admin_nama']); // Escape output untuk menghindari XSS
                echo "<script>
                        alert('Login berhasil! Selamat datang, " . htmlspecialchars($user['admin_nama']) . "');
                        window.location.href = '../index.php?page=home';
                      </script>";
            } else {
                echo "<script>
                        alert('Kata sandi salah. Silakan coba lagi.');
                        window.location.href = 'index.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Pengguna tidak ditemukan');
                    window.location.href = 'index.php';
                  </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Terjadi kesalahan pada server. Silakan coba lagi nanti.');
              </script>";
    }
}
?>

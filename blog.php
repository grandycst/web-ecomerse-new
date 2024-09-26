


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Tambahkan file CSS jika diperlukan -->
</head>
<body>

<div class="container mt-5">
    <h1>Blog Terbaru</h1>
    
    <div class="blog-grid mt-5">
    <?php
$sql = "SELECT * FROM blog ORDER BY tanggal_blog DESC"; 
$result = $koneksi->query($sql);
?>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="blog-item">';
                echo '<img src="admin/blog/uploads/' . $row['gambar_blog'] . '" alt="' . $row['judul_blog'] . '">';
                echo '<h2>' . $row['judul_blog'] . '</h2>';
                echo '<p class="date">Posted on: ' . $row['tanggal_blog'] . '</p>';
                echo '<p>' . substr($row['isi_blog'], 0, 100) . '...</p>';
                echo '<a href="?page=blog_detail&id_blog=' . $row['id_blog'] . '" class="read-more">Read More</a>';
                echo '</div>';
            }
        } else {
            echo "<p>No blogs found.</p>";
        }
        $koneksi->close();
        ?>
    </div>
</div>

</body>
</html>

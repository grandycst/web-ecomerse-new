<?php


// Cek apakah id_blog tersedia di URL
if (isset($_GET['id_blog'])) {
    $id_blog = $_GET['id_blog'];

    // Query untuk mengambil data blog berdasarkan id_blog
    $sql = "SELECT * FROM blog WHERE id_blog = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_blog);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Blog tidak ditemukan.";
        exit();
    }
} else {
    echo "ID blog tidak ditemukan.";
    exit();
}

$koneksi->close();
?>


<body>
<style>
        .custom-margin1 {
            margin-top: 160px; /* Adjust the value as needed */
        }
    </style>
<div class="container custom-margin1">
   
    <h2><?php echo $row['judul_blog']; ?></h2>
    <p class="date">Posted on: <?php echo date("M d, Y", strtotime($row['tanggal_blog'])); ?></p>

    <div class="blog-detail-image">
        <img src="admin/blog/uploads/<?php echo $row['gambar_blog']; ?>" alt="<?php echo $row['judul_blog']; ?>" style="width:100%; max-height:400px; object-fit:cover;">
    </div>

    <div class="blog-content">
        <p><?php echo nl2br($row['isi_blog']); ?></p>
    </div>

    <a href="index.php?page=blog" class="btn btn-danger">Kembali ke Blog</a>
</div>

</body>


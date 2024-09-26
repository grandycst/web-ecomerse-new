<?php


// Tangani penghapusan blog
if (isset($_POST['action']) && $_POST['action'] === 'hapus') {
    $id_blog = $_POST['id_blog'];
    $query = "SELECT gambar_blog FROM blog WHERE id_blog = $id_blog";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    unlink('blog/uploads/' . $row['gambar_blog']); // Hapus gambar dari folder
    $query = "DELETE FROM blog WHERE id_blog = $id_blog";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Blog berhasil dihapus', 'success').then(() => location.reload());</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Blog gagal dihapus', 'error');</script>";
    }
    exit;
}

// Tangani penambahan blog
if (isset($_POST['action']) && $_POST['action'] === 'tambah') {
    $judul_blog = $_POST['judul_blog'];
    $tanggal_blog = $_POST['tanggal_blog'];
    $isi_blog = $_POST['isi_blog'];

    // Upload gambar
    $gambar_blog = $_FILES['gambar_blog']['name'];
    $target = "blog/uploads/" . basename($gambar_blog);
    move_uploaded_file($_FILES['gambar_blog']['tmp_name'], $target);

    $query = "INSERT INTO blog (judul_blog, tanggal_blog, isi_blog, gambar_blog) VALUES ('$judul_blog', '$tanggal_blog', '$isi_blog', '$gambar_blog')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Blog berhasil ditambahkan', 'success').then(() => location.reload());</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Blog gagal ditambahkan', 'error');</script>";
    }
    exit;
}


// Tangani pengeditan blog
if (isset($_POST['action']) && $_POST['action'] === 'edit') {
    $id_blog = $_POST['id_blog'];
    $judul_blog = $_POST['judul_blog'];
    $tanggal_blog = $_POST['tanggal_blog'];
    $isi_blog = $_POST['isi_blog'];
    $gambar_blog = $_FILES['gambar_blog']['name'];

    // Update gambar jika ada gambar baru
    if ($gambar_blog) {
        $query = "SELECT gambar_blog FROM blog WHERE id_blog = $id_blog";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        unlink('blog/uploads/' . $row['gambar_blog']); // Hapus gambar lama
        $target = "blog/uploads/" . basename($gambar_blog);
        move_uploaded_file($_FILES['gambar_blog']['tmp_name'], $target);
        $gambar_blog_update = ", gambar_blog = '$gambar_blog'";
    } else {
        $gambar_blog_update = '';
    }

    $query = "UPDATE blog SET judul_blog = '$judul_blog', tanggal_blog = '$tanggal_blog', isi_blog = '$isi_blog' $gambar_blog_update WHERE id_blog = $id_blog";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Blog berhasil diperbarui', 'success').then(() => location.reload());</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Blog gagal diperbarui', 'error');</script>";
    }
    exit;
}

// Ambil data blog untuk ditampilkan
$query = "SELECT * FROM blog ORDER BY id_blog DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Blog</title>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Daftar Blog</h2>
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Blog</button>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Blog</th>
                <th>Tanggal</th>
                <th>Isi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['judul_blog']; ?></td>
                <td><?= $row['tanggal_blog']; ?></td>
                <td><?= $row['isi_blog']; ?></td>
                <td><img src="blog/uploads/<?= $row['gambar_blog']; ?>" alt="gambar" width="50"></td>
                <td>
                <button class="btn btn-primary editBtn" data-id="<?= $row['id_blog']; ?>" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit</button>

                    <button class="btn btn-danger deleteBtn" data-id="<?= $row['id_blog']; ?>">Hapus</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalLabelTambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formTambah" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelTambah">Tambah Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Blog</label>
                        <input type="text" class="form-control" id="judul" name="judul_blog" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Blog</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal_blog" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Blog</label>
                        <textarea class="form-control" id="isi" name="isi_blog" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Blog</label>
                        <input type="file" class="form-control" id="gambar" name="gambar_blog" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" name="action" value="tambah">
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalLabelEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEdit" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelEdit">Edit Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editJudul" class="form-label">Judul Blog</label>
                        <input type="text" class="form-control" id="editJudul" name="judul_blog" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTanggal" class="form-label">Tanggal Blog</label>
                        <input type="date" class="form-control" id="editTanggal" name="tanggal_blog" required>
                    </div>
                    <div class="mb-3">
                        <label for="editIsi" class="form-label">Isi Blog</label>
                        <textarea class="form-control" id="editIsi" name="isi_blog" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editGambar" class="form-label">Gambar Blog</label>
                        <input type="file" class="form-control" id="editGambar" name="gambar_blog">
                        <input type="hidden" id="existingGambar" name="existing_gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" id="editId" name="id_blog">
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="blog/blog.js"></script>
</body>
</html>

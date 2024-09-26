

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen kontak</title>
 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-15">
    <h2>Manajemen kontak</h2>
    <!-- <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah kontak</button> -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Nama Toko</th>
                <th>Deskripsi</th>
                <th>Nama Pemilik</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Jam Buka</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM kontak");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['nama_toko'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td><?= $row['nama_pemilik'] ?></td>
                <td><?= $row['notelp'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['jambuka'] ?></td>
               
                <td>
                    <button class="btn btn-warning btn-sm editBtn" data-id="<?= $row['id_kontak'] ?>" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                    <!-- <button class="btn btn-danger btn-sm deleteBtn" data-id="<?= $row['id_kontak'] ?>">Hapus</button> -->
                </td>
            </tr>
            
     
            
        
    
        </tbody>
    </table>
    <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="modal-title">Social Media Links</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Link Facebook: <?= $row['facebook'] ?></p>
                        <p class="card-text">Link Twitter: <?= $row['twitter'] ?></p>
                        <p class="card-text">Link Instagram: <?= $row['instagram'] ?></p>
                        <p class="card-text">Link Tiktok: <?= $row['tiktok'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="tambahForm">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah kontak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" name="nama_toko" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik" required>
                    </div>
                    <div class="mb-3">
                        <label for="notelp" class="form-label">No Telp</label>
                        <input type="text" class="form-control" name="notelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="jambuka" class="form-label">Jam Buka</label>
                        <input type="text" class="form-control" name="jambuka">
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" name="facebook">
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name="twitter">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">instagram</label>
                        <input type="text" class="form-control" name="instagram">
                    </div>
                    <div class="mb-3">
                        <label for="tiktok" class="form-label">Tiktok</label>
                        <input type="text" class="form-control" name="tiktok">
                    </div>
                    <div class="mb-3">
                        <label for="link_maps" class="form-label">Link Maps</label>
                        <input type="text" class="form-control" name="lisk_maps">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title">Edit kontak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_kontak" id="id_kontak">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" name="nama_toko" id="nama_toko" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" required>
                    </div>
                    <div class="mb-3">
                        <label for="notelp" class="form-label">No Telp</label>
                        <input type="text" class="form-control" name="notelp" id="notelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="jambuka" class="form-label">Jam Buka</label>
                        <input type="text" class="form-control" name="jambuka" id="jambuka">
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook">
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name="twitter" id="twitter">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" name="instagram" id="instagram">
                    </div>
                    <div class="mb-3">
                        <label for="tiktok" class="form-label">Tiktok</label>
                        <input type="text" class="form-control" name="tiktok" id="tiktok">
                    </div>
                    <div class="mb-3">
                        <label for="link_maps" class="form-label">Link Maps</label>
                        <input type="text" class="form-control" name="link_maps" id="link_maps">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Tambah kontak
$('#tambahForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: 'kontak/modal/tambah_kontak.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            Swal.fire('Berhasil!', 'kontak berhasil ditambahkan.', 'success').then(function() {
                location.reload();
            });
        }
    });
});

// Edit kontak
$('.editBtn').click(function() {
    const id = $(this).data('id');
    $.ajax({
        url: 'kontak/modal/get_kontak_detail.php',
        type: 'POST',
        data: { id_kontak: id },
        success: function(data) {
            const kontak = JSON.parse(data);
            $('#id_kontak').val(kontak.id_kontak);
            $('#title').val(kontak.title);
            $('#nama_toko').val(kontak.nama_toko);
            $('#deskripsi').val(kontak.deskripsi);
            $('#nama_pemilik').val(kontak.nama_pemilik);
            $('#notelp').val(kontak.notelp);
            $('#email').val(kontak.email);
            $('#jambuka').val(kontak.jambuka);
            $('#facebook').val(kontak.facebook);
            $('#twitter').val(kontak.twitter);
            $('#instagram').val(kontak.instagram);
            $('#tiktok').val(kontak.tiktok);
            $('#link_maps').val(kontak.link_maps);
        }
    });
});

$('#editForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: 'kontak/modal/edit_kontak.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            Swal.fire('Berhasil!', 'kontak berhasil diupdate.', 'success').then(function() {
                location.reload();
            });
        }
    });
});

// Hapus kontak
$('.deleteBtn').click(function() {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "kontak ini akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'kontak/modal/hapus_kontak.php',
                type: 'POST',
                data: { id_kontak: id },
                success: function(response) {
                    Swal.fire('Terhapus!', 'kontak berhasil dihapus.', 'success').then(function() {
                        location.reload();
                    });
                }
            });
        }
    });
});
</script>

</body>
</html>

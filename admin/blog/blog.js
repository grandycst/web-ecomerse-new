$(document).ready(function() {
    // Tambah Blog
    $('#formTambah').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '?page=blog/index',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Blog berhasil ditambahkan',
                    icon: 'success'
                }).then(() => location.reload());
            },
            error: function(xhr, status, error) {
                Swal.fire('Gagal', 'Blog gagal ditambahkan: ' + error, 'error');
            }
        });
    });

    // Edit Blog
    $(document).on('click', '.editBtn', function() {
        var id_blog = $(this).data('id');  // Ambil id_blog dari tombol

        $.ajax({
            url: 'blog/get_blog_detail.php',  // Sesuaikan path dengan lokasi file PHP Anda
            type: 'POST',
            data: { id_blog: id_blog },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Isi modal dengan data yang diterima
                    $('#editId').val(response.data.id_blog);
                    $('#editJudul').val(response.data.judul_blog);
                    $('#editTanggal').val(response.data.tanggal_blog);
                    $('#editIsi').val(response.data.isi_blog);
                    $('#existingGambar').val(response.data.gambar_blog);  // Jika Anda menyimpan gambar lama
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire('Error', 'Terjadi kesalahan: ' + error, 'error');
            }
        });
    });

    $('#formEdit').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '?page=blog/index',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Blog berhasil diperbarui',
                    icon: 'success'
                }).then(() => location.reload());
            },
            error: function(xhr, status, error) {
                Swal.fire('Gagal', 'Blog gagal diperbarui: ' + error, 'error');
            }
        });
    });

    // Hapus Blog
    $('.deleteBtn').on('click', function() {
        var id = $(this).data('id');

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '?page=blog/index',
                    type: 'POST',
                    data: { action: 'hapus', id_blog: id },
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Blog berhasil dihapus',
                            icon: 'success'
                        }).then(() => location.reload());
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Gagal', 'Blog gagal dihapus: ' + error, 'error');
                    }
                });
            }
        });
    });
});

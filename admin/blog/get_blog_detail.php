<?php

if (isset($_POST['id_blog'])) {
    $id_blog = $_POST['id_blog'];



    // Query untuk mengambil data blog berdasarkan id
    $query = "SELECT id_blog, judul_blog, tanggal_blog, isi_blog, gambar_blog FROM blog WHERE id_blog = ?";
    $stmt = $koneksi->prepare($query);

    if ($stmt) {
        $stmt->bind_param('i', $id_blog);
        $stmt->execute();
        $result = $stmt->get_result();

        // Jika data ditemukan
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Blog tidak ditemukan']);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Query preparation failed']);
    }

    // Close the connection
    $koneksi->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID blog tidak disertakan']);
}
?>

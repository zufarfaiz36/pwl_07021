<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
    $id_pengguna = $_POST['id_pengguna'];

    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
    $max_size = 2 * 1024 * 1024; // 2MB

    if (in_array($file['type'], $allowed_types) && $file['size'] <= $max_size) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $timestamp = date('YmdHis');
        $new_name = $id_pengguna . '_' . $timestamp . '.' . $ext;

        $upload_dir = 'profile_pics/';
        $upload_path = $upload_dir . $new_name;

        // Simpan file ke folder
        move_uploaded_file($file['tmp_name'], $upload_path);

        // Simpan ke database: id_pengguna, nama_file, lokasi_file
        $stmt = $conn->prepare("INSERT INTO gambar (filename, filepath, id_pengguna) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $new_name, $upload_path, $id_pengguna);
        $stmt->execute();
        $stmt->close();

        header("Location: dashboard.php?id=" . urlencode($id_pengguna));
        exit();
    } else {
        echo "File tidak valid. Harus JPG/PNG dan kurang dari 2MB.";
    }
}
?>

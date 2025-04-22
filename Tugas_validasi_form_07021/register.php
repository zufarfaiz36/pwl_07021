<?php
include 'config.php';
include 'csrf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validate_csrf_token($_POST['csrf_token'])) {
        die("CSRF token tidak valid.");
    }

    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mendaftar.'); window.location.href='index.php';</script>";
    }

    $stmt->close();
}
?>

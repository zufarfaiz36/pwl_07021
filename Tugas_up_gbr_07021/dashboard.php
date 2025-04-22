<?php
include 'config.php';

$id_pengguna = $_GET['id'] ?? '';

if ($id_pengguna) {
    $stmt = $conn->prepare("SELECT * FROM gambar WHERE id_pengguna = ? ORDER BY uploaded_at DESC LIMIT 1");
    $stmt->bind_param("s", $id_pengguna);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>ID Pengguna: <?= htmlspecialchars($id_pengguna) ?></p>

    <?php if (!empty($data)): ?>
        <p>Gambar Profil Terakhir:</p>
        <img src="<?= $data['filepath'] ?>" width="200"><br>
        <small>Nama File: <?= $data['filename'] ?></small><br>
        <small>Lokasi: <?= $data['filepath'] ?></small>
    <?php else: ?>
        <p>Belum ada gambar profil yang diunggah.</p>
    <?php endif; ?>
</body>
</html>

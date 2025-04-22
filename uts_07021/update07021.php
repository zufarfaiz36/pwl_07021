<?php
include "config07021.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan ID
    $result = mysqli_query($conn, "SELECT * FROM product WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['bupdate'])) {
    // Ambil data dari form
    $nama_produk = $_POST['tnama'];
    $harga = $_POST['tharga'];
    $stok = $_POST['tstock'];
    $kategori = $_POST['tkategori'];

    // Sanitasi harga
    $harga = str_replace('.', '', $harga);
    $harga = str_replace(',', '.', $harga);
    $harga = preg_replace('/[^\d.]/', '', $harga);

    // Update data ke database
    $stmt = $conn->prepare("UPDATE product SET nama_produk = ?, harga = ?, stok = ?, kategori = ? WHERE id = ?");
    $stmt->bind_param("sdii", $nama_produk, $harga, $stok,$kategori, $id);

    if ($stmt->execute()) {
        $_SESSION['sukses'] = "Data berhasil diupdate!";
        header("Location: index07021.php");
        exit();
    } else {
        $_SESSION['gagal'] = "Data gagal diupdate!";
        header("Location: index07021.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3 class="text-center mb-4">Update Produk</h3>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Form Update Produk
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="tnama" value="<?= $data['nama_produk']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" name="tharga" value="<?= $data['harga']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok Produk</label>
                    <input type="number" class="form-control" name="tstock" value="<?= $data['stok']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">kategori Produk</label>
                    <input type="number" class="form-control" name="tkategori" value="<?= $data['kategori']; ?>" required>
                </div>
                

                <button type="submit" class="btn btn-primary" name="bupdate">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include "config.php";

if (isset($_POST['bsimpan'])) {
    $nama_produk = $_POST['tnama'];
    $harga = $_POST['tharga'];
    $stok = $_POST['tstock'];

    // Sanitasi harga
    $harga = str_replace('.', '', $harga);
    $harga = str_replace(',', '.', $harga);
    $harga = preg_replace('/[^\d.]/', '', $harga);

    // Cek dan siapkan prepared statement
    $stmt = $conn->prepare("INSERT INTO product (nama_produk, harga, stok) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sdi", $nama_produk, $harga, $stok);

    if ($stmt->execute()) {
        echo "<script>
            alert('Simpan Data Sukses!');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Simpan Data Gagal');
            document.location='index.php';
        </script>";
    }
}
?>

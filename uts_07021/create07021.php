<?php
include "config07021.php";

if (isset($_POST['bsimpan'])) {
    $nama_produk = $_POST['tnama'];
    $harga = $_POST['tharga'];
    $stok = $_POST['tstock'];
    $kategori = $_POST['tkategori'];

    // Sanitasi harga
    $harga = str_replace('.', '', $harga);
    $harga = str_replace(',', '.', $harga);
    $harga = preg_replace('/[^\d.]/', '', $harga);

    // Siapkan prepared statement
    $stmt = $conn->prepare("INSERT INTO product (nama_produk, harga, stok, kategori) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sdis", $nama_produk, $harga, $stok, $kategori);

    if ($stmt->execute()) {
        echo "<script>
            alert('Simpan Data Sukses!');
            document.location='index07021.php';
        </script>";
    } else {
        echo "<script>
            alert('Simpan Data Gagal');
            document.location='index07021.php';
        </script>";
    }

    $stmt->close();
}
?>

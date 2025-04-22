<?php
session_start();
include "config07021.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['sukses'] = "Data berhasil dihapus!";
        header("Location: index07021.php");
        exit();
    } else {
        echo "<script>alert('Gagal menghapus data.');window.location='index07021.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');window.location='index07021.php';</script>";
}
?>

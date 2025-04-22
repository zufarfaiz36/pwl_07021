<?php
require 'config.php';
file_put_contents('debug_log.txt', print_r($_POST, true));


if (isset($_POST['keyword'])) {
    $keyword = "%{$_POST['keyword']}%";

    $stmt = $conn->prepare("SELECT nama, nim, jurusan FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? OR jurusan LIKE ?");
    $stmt->bind_param("sss", $keyword, $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped mt-3'>";
        echo "<thead class='table-dark'><tr><th>Nama</th><th>NIM</th><th>Jurusan</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['nama']) . "</td>
                    <td>" . htmlspecialchars($row['nim']) . "</td>
                    <td>" . htmlspecialchars($row['jurusan']) . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='text-muted'>Tidak ada hasil ditemukan.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

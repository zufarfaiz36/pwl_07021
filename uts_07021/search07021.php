<?php
include "config07021.php";

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

$query = "SELECT * FROM product 
          WHERE nama_produk LIKE '%$keyword%' 
             OR harga LIKE '%$keyword%' 
             OR stok LIKE '%$keyword%' 
             OR kategori LIKE '%$keyword%' 
          ORDER BY id DESC";

$result = mysqli_query($conn, $query);

$no = 1;

echo '<table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>';

while ($data = mysqli_fetch_array($result)) {
    echo '<tr>
            <td>' . $no++ . '</td>
            <td>' . $data['id'] . '</td>
            <td>' . $data['nama_produk'] . '</td>
            <td>' . $data['harga'] . '</td>
            <td>' . $data['stok'] . '</td>
            <td>' . $data['kategori'] . '</td>
            <td>
                <a href="update07021.php?id=' . $data['id'] . '" class="btn btn-warning">Ubah</a>
                <a href="delete07021.php?id=' . $data['id'] . '" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>
            </td>
        </tr>';
}

echo '</table>';
?>

<?php
session_start(); 
include "config07021.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mohammad zufar faiz 07021</title>
  </head>
  <body>

<div class="container">
    <div class="mt-3">
      <h3 class="text-center">Daftar Product</h3> 
    </div> 
    <div class="card">
      <div class="card-header bg-primary text-white">
        Data Product Mohammad Zufar Faiz 07021
      </div>
      <div class="card-body">

      <?php if (isset($_SESSION['sukses'])): ?>
        <div class="alert alert-success alert-dismissible fade show alert-auto-close" role="alert">
          <?= $_SESSION['sukses']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['sukses']); ?>
      <?php endif; ?>

      <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modaltambah">
        Tambah Data
      </button>

      <div class="mb-3">
        <input type="text" id="search" class="form-control" placeholder="Cari produk...">
      </div>

      <div id="loading" class="text-center" style="display: none;">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>


      <div id="tabel-data">
        <table class="table table-bordered table-striped table-hover">
          <tr>
            <th>No.</th>
            <th>id</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>

          <?php
            $no = 1;
            $tampil = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC");
            while($data = mysqli_fetch_array($tampil)):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['id']?></td>
            <td><?= $data['nama_produk']?></td>
            <td><?= $data['harga']?></td>
            <td><?= $data['stok']?></td>
            <td><?= $data['kategori']?></td>
            <td>
              <a href="update07021.php?id=<?= $data['id'] ?>" class="btn btn-warning">Ubah</a>
              <a href="delete07021.php?id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </table>
      </div>

      <div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modaltambah">Form Daftar Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="create07021.php">
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Nama Product</label>
                  <input type="text" class="form-control" name="tnama" placeholder="Masukan Nama Product">
                </div>
                <div class="mb-3">
                  <label class="form-label">Harga Product</label>
                  <input type="text" class="form-control" name="tharga" placeholder="Masukan harga Product">
                </div>
                <div class="mb-3">
                  <label class="form-label">Stock</label>
                  <input type="text" class="form-control" name="tstock" placeholder="Masukan Jumlah Stock">
                </div>
                <div class="mb-3">
                  <label class="form-label">Kategori</label>
                  <input type="text" class="form-control" name="tkategori" placeholder="Masukan Kategori Product">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#search').on('keyup', function() {
    var keyword = $(this).val();
    $('#loading').show();

    setTimeout(function() {
      $.ajax({
        url: 'search07021.php',
        type: 'POST',
        data: { keyword: keyword },
        success: function(data) {
          $('#tabel-data').html(data);
          $('#loading').hide();
        }
      });
    }, 500); 
  });
});
</script>

</body>
</html>

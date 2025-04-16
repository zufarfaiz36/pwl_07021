<?php
session_start(); 
include "config.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Daftar Product</title>
  </head>
  <body>

<div class="container">
   
    <div class="mt-3">
    <h3 class="text-center">Daftar Product</h3> 
    </div> 
    <div class="card">
  <div class="card-header bg-primary text-white">
    Data Product
  </div>
  <div class="card-body">

      <!-- Notifikasi Sukses -->

  <?php if (isset($_SESSION['sukses'])): ?>
    <div class="alert alert-success alert-dismissible fade show alert-auto-close" role="alert">
      <?= $_SESSION['sukses']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['sukses']); ?>
  <?php endif; ?>
    
  <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modaltambah">
  Tambah Data
</button>
   

    <table class= "table table-bordered table-striped table-hover">
        <tr>
            <th>No.</th>
            <th>id</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

     <?php
        
        //menampilkan data

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
            <td>
                <a href="update.php?id=<?= $data['id'] ?> " class="btn btn-warning">Ubah</a>
                <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>

            </td>
        </tr>
    <?php endwhile; ?>
</table>


    

<!-- Modal -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltambah">Form Daftar Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="create.php">
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
            </div>
       
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
<!---akhir modal-->

  </div>
</div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
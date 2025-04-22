<?php
include 'config.php';
include 'csrf.php';
$csrf_token = generate_csrf_token();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Pendaftaran Mahasiswa</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar Sekarang</button>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1">
      <div class="modal-dialog">
        <form method="POST" action="register.php" class="modal-content needs-validation" novalidate>
          <div class="modal-header">
            <h5 class="modal-title">Form Pendaftaran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required minlength="6">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Daftar</button>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
      })()
    </script>
</body>
</html>

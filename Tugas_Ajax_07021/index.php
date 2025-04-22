<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Search Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #spinner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-3">Live Search Mahasiswa</h2>
    <input type="text" class="form-control" id="search" placeholder="Cari Nama / NIM / Jurusan...">
    
    <div id="spinner">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div id="result" class="mt-3"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="custom.js"></script>
</body>
</html>

<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'uts_07021';
$conn = new mysqli($host,$user,$pass,$dbname);

if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
} 
?>
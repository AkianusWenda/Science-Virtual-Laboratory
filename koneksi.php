<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "u801340747_svl";

// Membuat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Mengecek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// echo "Koneksi berhasil!";
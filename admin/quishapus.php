<?php
include '../koneksi.php';
$koneksi->query("DELETE FROM video WHERE idvideo='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='quisdaftar.php';</script>";
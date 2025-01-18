<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM soalessay WHERE idsoalessay='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='latihanedit.php?id=$_GET[idkuis]';</script>";

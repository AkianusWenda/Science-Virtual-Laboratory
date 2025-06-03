<?php
include('koneksi.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getBulan($bln)
{
    $bulanList = [
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
    ];
    return $bulanList[(int)$bln] ?? "Tidak Diketahui";
}

function hari($hari)
{
    $hari = date("D", strtotime($hari));
    $hariList = [
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    ];
    return $hariList[$hari] ?? "Tidak Diketahui";
}

// Cek apakah harus menyembunyikan navbar
$hide_navbar = isset($_SESSION['hide_navbar']) && $_SESSION['hide_navbar'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Science Virtual Learning</title>
    <link href="assets/assets/img/favicon.png" rel="icon">
    <link href="assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <h1 class="sitename">Science Virtual Learning</h1>
            </a>

            <?php if (!$hide_navbar): ?>
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#about-contact">About Us</a></li>
                        <li><a href="materi.php">Learning</a></li>
                        <li><a href="quis.php">Quiz</a></li>
                        <li><a href="form_peserta.php?id=1">Pilihan Ganda</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            <?php endif; ?>
        </div>
    </header>
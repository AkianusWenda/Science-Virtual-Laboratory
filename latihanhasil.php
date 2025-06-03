<?php
session_start();
$_SESSION['hide_navbar'] = true;
include 'header.php';

include 'koneksi.php'; // Pastikan koneksi dimuat

// Ambil jawaban dari session
$jawaban = isset($_SESSION['jawaban']) ? $_SESSION['jawaban'] : [];

// Pastikan ID kuis ada
if (!isset($_GET['id'])) {
    echo "<p class='alert alert-danger'>ID kuis tidak ditemukan.</p>";
    exit;
}

$idkuis = (int)$_GET['id'];

// Ambil semua soal dari kuis
$query = $koneksi->prepare("SELECT * FROM soal WHERE idkuis = ?");
$query->bind_param("i", $idkuis);
$query->execute();
$result = $query->get_result();

$soalList = [];
while ($soal = $result->fetch_assoc()) {
    $soalList[] = $soal;
}

// Hitung skor
$benar = 0;
$salah = 0;
$kosong = 0;
$total = count($soalList);

foreach ($soalList as $soal) {
    $idsoal = $soal['idsoal'];
    $jawabanUser = isset($jawaban[$idsoal]) ? $jawaban[$idsoal] : null;

    if (!$jawabanUser) {
        $kosong++;
    } elseif ($jawabanUser == $soal['kunci']) {
        $benar++;
    } else {
        $salah++;
    }
}

$persentase = ($total > 0) ? ($benar / $total) * 100 : 0;
?>

<main class="main">
    <div class="container mt-5">
        <script>
            alert('Jawaban Anda berhasil terkirim');
        </script>
        <div class="alert alert-success">
            Terima kasih, jawaban Anda sudah berhasil terkirim.
        </div>
        <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</main>

<?php
// Bersihkan session setelah submit
unset($_SESSION['jawaban']);
unset($_SESSION['nama']);
unset($_SESSION['kelas']);
unset($_SESSION['sekolah']);
unset($_SESSION['hide_navbar']); // agar navbar muncul kembali di halaman lain
?>
<?php
include 'header.php';

// Ambil jawaban dari sesi
$jawaban = isset($_SESSION['jawaban']) ? $_SESSION['jawaban'] : [];
$skor = $_GET['skor'];
if ($skor <= 6) {
    $hasil = "Tidak Dysmenorrhea";
} elseif ($skor <= 14) {
    $hasil = "Anda Terkena Dysmenorrhea Ringan";
} elseif ($skor <= 24) {
    $hasil = "Anda Terkena Dysmenorrhea Sedang";
} else {
    $hasil = "Anda Terkena Dysmenorrhea Berat";
}
// Ambil soal dari database berdasarkan ID kuis
if (isset($_GET['id'])) {
    $idkuis = $_GET['id'];
    $query = $koneksi->query("SELECT * FROM soal WHERE idkuis='$idkuis'");
} else {
    echo "<p class='alert alert-danger'>ID kuis tidak ditemukan.</p>";
    exit;
}

// Hitung hasil
$benar = 0;
$salah = 0;
$kosong = 0;
$total = 0;
?>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1><?= $hasil ?></h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Hasil Kuis</li>
                </ol>
            </nav>
        </div>
    </div>


    <section id="recent-posts" class="recent-posts section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Hasil</h2>

        </div>

        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-12 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <ul class="list-group mb-4">
                        <?php while ($soal = $query->fetch_assoc()): ?>
                            <?php
                            $idsoal = $soal['idsoal'];
                            $total++;
                            $jawabanUser = isset($jawaban[$idsoal]) ? $jawaban[$idsoal] : null;

                            if (!$jawabanUser) {
                                $kosong++;
                            } elseif ($jawabanUser == $soal['kunci']) {
                                $benar++;
                            } else {
                                $salah++;
                            }
                            ?>
                        <?php endwhile; ?>
                        <li class="list-group-item">Jumlah Soal: <?= $total; ?></li>
                        <!-- <li class="list-group-item">Skor: <?= $skor; ?></li> -->
                        <li class="list-group-item"><b>Hasil: <?= $hasil; ?></b></li>
                        <!-- <li class="list-group-item">Salah: <?= $salah; ?></li>
                        <li class="list-group-item">Tidak Dijawab: <?= $kosong; ?></li>
                        <li class="list-group-item"><strong>Nilai: <?= number_format(($benar / $total) * 100, 2); ?></strong></li> -->
                    </ul>

                    <h3>Pembahasan Soal</h3>
                    <?php
                    // Ambil kembali soal untuk pembahasan
                    $queryPembahasan = $koneksi->query("SELECT * FROM soal WHERE idkuis='$idkuis'");
                    $nomor = 1;

                    while ($data = $queryPembahasan->fetch_assoc()):
                        $idsoal = $data['idsoal'];
                        $jawabanUser = isset($jawaban[$idsoal]) ? $jawaban[$idsoal] : null;
                    ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5><?= $data['soal']; ?></h5>
                                <?php if ($data['gambar']): ?>
                                    <img src="upload/<?= $data['gambar']; ?>" width="100%" class="question-image mb-3" alt="Gambar Soal">
                                <?php endif; ?>
                                <ul class="list-unstyled">
                                    <li <?= $data['kunci'] == 'A' ? '' : ''; ?>>
                                        A. <?= $data['a']; ?> <?= $jawabanUser == 'A' ? '' : ''; ?>
                                    </li>
                                    <li <?= $data['kunci'] == 'B' ? '' : ''; ?>>
                                        B. <?= $data['b']; ?> <?= $jawabanUser == 'B' ? '' : ''; ?>
                                    </li>
                                    <li <?= $data['kunci'] == 'C' ? '' : ''; ?>>
                                        C. <?= $data['c']; ?> <?= $jawabanUser == 'C' ? '' : ''; ?>
                                    </li>
                                    <li <?= $data['kunci'] == 'D' ? '' : ''; ?>>
                                        D. <?= $data['d']; ?> <?= $jawabanUser == 'D' ? '' : ''; ?>
                                    </li>
                                </ul>
                                <p><strong>Pilihan Kamu:</strong> <?= $jawabanUser ? $jawabanUser : 'Tidak Dijawab'; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <div style="padding-top: 100px;"></div>
</main>

<?php
unset($_SESSION['jawaban']);
unset($_SESSION['nama']);
unset($_SESSION['email']);
unset($_SESSION['nohp']);
include 'footer.php';
?>
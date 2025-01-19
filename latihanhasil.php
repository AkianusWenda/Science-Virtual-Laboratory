<?php
include 'header.php';

// Mengambil jawaban dari sesi (menangani ketidakadaan jawaban dengan aman)
$jawaban = isset($_SESSION['jawaban']) ? $_SESSION['jawaban'] : [];
$skor = isset($_GET['skor']) ? (int)$_GET['skor'] : 0;

// Menentukan hasil berdasarkan skor
if ($skor <= 6) {
    $hasil = "Kurang";
} elseif ($skor <= 14) {
    $hasil = "Cukup";
} elseif ($skor <= 24) {
    $hasil = "Baik";
} else {
    $hasil = "Sangat Baik";
}

// Memastikan ID kuis ada dalam parameter GET
if (isset($_GET['id'])) {
    $idkuis = (int)$_GET['id'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $query = $koneksi->prepare("SELECT * FROM soal WHERE idkuis = ?");
    $query->bind_param("i", $idkuis); // "i" berarti integer
    $query->execute();
    $result = $query->get_result();
} else {
    echo "<p class='alert alert-danger'>ID kuis tidak ditemukan.</p>";
    exit;
}

// Menghitung hasil
$benar = 0;
$salah = 0;
$kosong = 0;
$total = 0;
?>

<main class="main">
    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1><?= htmlspecialchars($hasil); ?></h1>
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
                        <?php while ($soal = $result->fetch_assoc()): ?>
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
                        <li class="list-group-item"><b>Hasil: <?= htmlspecialchars($hasil); ?></b></li>
                    </ul>

                    <h3>Pembahasan Soal</h3>
                    <?php
                    // Ambil kembali soal untuk pembahasan
                    $queryPembahasan = $koneksi->prepare("SELECT * FROM soal WHERE idkuis = ?");
                    $queryPembahasan->bind_param("i", $idkuis);
                    $queryPembahasan->execute();
                    $resultPembahasan = $queryPembahasan->get_result();
                    $nomor = 1;

                    while ($data = $resultPembahasan->fetch_assoc()):
                        $idsoal = $data['idsoal'];
                        $jawabanUser = isset($jawaban[$idsoal]) ? $jawaban[$idsoal] : null;
                    ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5><?= htmlspecialchars($data['soal']); ?></h5>
                                <?php if ($data['gambar']): ?>
                                    <img src="upload/<?= htmlspecialchars($data['gambar']); ?>" width="100%"
                                        class="question-image mb-3" alt="Gambar Soal">
                                <?php endif; ?>
                                <ul class="list-unstyled">
                                    <li <?= $data['kunci'] == 'A' ? '' : ''; ?>>
                                        A. <?= htmlspecialchars($data['a']); ?> <?= $jawabanUser == 'A' ? '' : ''; ?>
                                    </li>
                                    <li <?= $data['kunci'] == 'B' ? '' : ''; ?>>
                                        B. <?= htmlspecialchars($data['b']); ?> <?= $jawabanUser == 'B' ? '' : ''; ?>
                                    </li>
                                    <li <?= $data['kunci'] == 'C' ? '' : ''; ?>>
                                        C. <?= htmlspecialchars($data['c']); ?> <?= $jawabanUser == 'C' ? '' : ''; ?>
                                    </li>
                                    <li <?= $data['kunci'] == 'D' ? '' : ''; ?>>
                                        D. <?= htmlspecialchars($data['d']); ?> <?= $jawabanUser == 'D' ? '' : ''; ?>
                                    </li>
                                </ul>
                                <p><strong>Pilihan Kamu:</strong>
                                    <?= $jawabanUser ? htmlspecialchars($jawabanUser) : 'Tidak Dijawab'; ?></p>
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
// Menghapus jawaban dan informasi terkait di sesi setelah digunakan
unset($_SESSION['jawaban']);
unset($_SESSION['nama']);
unset($_SESSION['email']);
unset($_SESSION['nohp']);
include 'footer.php';
?>
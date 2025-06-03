<?php
include 'header.php';

if (isset($_POST['nama'], $_POST['kelas'], $_POST['sekolah'], $_POST['idkuis'])) {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['kelas'] = $_POST['kelas'];
    $_SESSION['sekolah'] = $_POST['sekolah'];
    $_SESSION['idkuis'] = $_POST['idkuis'];
}

$idkuis = $_SESSION['idkuis'] ?? null;

if (!$idkuis) {
    echo "<p class='alert alert-danger'>ID kuis tidak ditemukan.</p>";
    exit;
}

// Ambil data kuis dan soal
$kuis = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$idkuis'")->fetch_assoc();
$ambildata = $koneksi->query("SELECT * FROM soal WHERE idkuis='$idkuis' ORDER BY idsoal ASC");

if (isset($_POST['simpan'])) {
    $nama = $_SESSION['nama'];
    $kelas = $_SESSION['kelas'];
    $sekolah = $_SESSION['sekolah'];
    $pilihan = $_POST['pilihan'] ?? [];
    $_SESSION['jawaban'] = $pilihan;

    $querySoal = $koneksi->query("SELECT * FROM soal WHERE idkuis='$idkuis'");
    $benar = $salah = $kosong = $skor = 0;
    $idsoalList = [];

    while ($soal = $querySoal->fetch_assoc()) {
        $idsoal = $soal['idsoal'];
        $kunci = $soal['kunci'];
        $idsoalList[] = $idsoal;

        if (!isset($pilihan[$idsoal]) || empty($pilihan[$idsoal])) {
            $kosong++;
        } elseif ($pilihan[$idsoal] == $kunci) {
            $benar++;
            $skor += 1; // Nilai 1 poin per soal benar
        } else {
            $salah++;
        }
    }

    $totalSoal = count($idsoalList);
    $nilai = $totalSoal > 0 ? number_format(($benar / $totalSoal) * 100, 2) : 0;

    // Simpan jawaban utama
    $koneksi->query("INSERT INTO jawaban (nama, kelas, sekolah, idkuis, benar, salah, nilai, skor)
                     VALUES ('$nama', '$kelas', '$sekolah', '$idkuis', '$benar', '$salah', '$nilai', '$skor')")
        or die(mysqli_error($koneksi));
    $idjawaban = $koneksi->insert_id;

    // Simpan detail jawaban
    foreach ($idsoalList as $idsoal) {
        $jawaban = $pilihan[$idsoal] ?? null;
        $koneksi->query("INSERT INTO jawabandetail (idjawaban, idsoal, jawaban)
                         VALUES ('$idjawaban', '$idsoal', '$jawaban')")
            or die(mysqli_error($koneksi));
    }

    header("Location: latihanhasil.php?id=$idkuis&skor=$skor");
    exit;
}
?>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1>Kuis</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Kuis</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="recent-posts" class="recent-posts section">
        <div class="container section-title" data-aos="fade-up">
            <h2><?= htmlspecialchars($kuis['judul']); ?></h2>
        </div>

        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-12 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <form method="post">
                        <?php while ($soal = $ambildata->fetch_assoc()): ?>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5><?= $soal['soal']; ?></h5>
                                    <?php if (!empty($soal['gambar'])): ?>
                                        <img src="upload/<?= $soal['gambar']; ?>" class="img-fluid mb-3" alt="Gambar Soal">
                                    <?php endif; ?>
                                    <?php foreach (['A', 'B', 'C', 'D'] as $opsi): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan[<?= $soal['idsoal']; ?>]"
                                                value="<?= $opsi ?>" required>
                                            <label class="form-check-label"><?= $soal[strtolower($opsi)]; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>

                        <button type="submit" name="simpan" class="btn btn-primary">Simpan Jawaban</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div style="padding-top: 100px;"></div>
</main>

<?php include "footer.php"; ?>
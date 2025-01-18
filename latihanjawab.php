<?php
include 'header.php';

if (isset($_POST['nama'], $_POST['email'], $_POST['nohp'], $_POST['idkuis'])) {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['nohp'] = $_POST['nohp'];
    $_SESSION['idkuis'] = $_POST['idkuis'];
}

$idkuis = $_SESSION['idkuis'] ?? null;

if (!$idkuis) {
    echo "<p class='alert alert-danger'>ID kuis tidak ditemukan.</p>";
    exit;
}

// Ambil data kuis berdasarkan ID
$query = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$idkuis'");
$kuis = $query->fetch_assoc();

// Ambil data soal
$ambildata = $koneksi->query("SELECT * FROM soal WHERE idkuis='$idkuis' ORDER BY idsoal ASC");

// Proses penyimpanan jawaban ke sesi dan ke database
if (isset($_POST['simpan'])) {
    $nama = $_SESSION['nama'];
    $email = $_SESSION['email'];
    $nohp = $_SESSION['nohp'];
    $_SESSION['jawaban'] = $_POST['pilihan']; // Jawaban yang dipilih oleh peserta
    $pilihan    = $_POST['pilihan'];
    // Ambil semua soal berdasarkan ID kuis
    $querySoal = $koneksi->query("SELECT * FROM soal WHERE idkuis='$idkuis'");
    $benar = 0;
    $salah = 0;
    $kosong = 0;
    $skor = 0;
    $idsoalList = [];

    // Proses penilaian jawaban
    while ($soal = $querySoal->fetch_assoc()) {
        $idsoalList[] = $soal['idsoal'];
        $idsoal = $soal['idsoal'];
        $kunci = $soal['kunci'];

        if (!isset($pilihan[$idsoal]) || empty($pilihan[$idsoal])) {
            $kosong++;
        } elseif ($pilihan[$idsoal] == "A") {
            $skor = $skor + 1;
        } elseif ($pilihan[$idsoal] == "B") {
            $skor = $skor + 2;
        } elseif ($pilihan[$idsoal] == "C") {
            $skor = $skor + 3;
        } else {
            $skor = $skor + 4;
        }

        // if (!isset($pilihan[$idsoal]) || empty($pilihan[$idsoal])) {
        //     $kosong++;
        // } elseif ($pilihan[$idsoal] == $kunci) {
        //     $benar++;
        // } else {
        //     $salah++;
        // }
    }

    // Hitung nilai (misalnya skala 100)
    $totalSoal = count($idsoalList);
    $nilai = $totalSoal > 0 ? number_format(($benar / $totalSoal) * 100, 2) : 0;

    // Simpan ke tabel jawaban
    $koneksi->query("INSERT INTO jawaban (nama, email, nohp, idkuis, benar, salah, nilai, skor) 
                     VALUES ('$nama', '$email', '$nohp', '$idkuis', '$benar', '$salah', '$nilai', '$skor')")
        or die(mysqli_error($koneksi));
    $idjawaban = $koneksi->insert_id; // Ambil ID dari jawaban yang baru disimpan

    // Simpan detail jawaban peserta ke tabel jawabandetail
    foreach ($idsoalList as $idsoal) {
        if (isset($pilihan[$idsoal])) {
            $jawaban = $pilihan[$idsoal];
        } else {
            $jawaban = null; // Jika tidak dijawab
        }

        $koneksi->query("INSERT INTO jawabandetail (idjawaban, idsoal, jawaban) 
                         VALUES ('$idjawaban', '$idsoal', '$jawaban')")
            or die(mysqli_error($koneksi));
    }
    $_SESSION['jawaban'] = $_POST['pilihan'];
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
                        <?php $nomor = 1; ?>
                        <?php while ($soal = $ambildata->fetch_assoc()): ?>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5><?= $soal['soal']; ?></h5>
                                    <?php if (!empty($soal['gambar'])): ?>
                                        <img src="upload/<?= $soal['gambar']; ?>" class="img-fluid mb-3" alt="Gambar Soal">
                                    <?php endif; ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan[<?= $soal['idsoal']; ?>]" value="A" required>
                                        <label class="form-check-label"><?= $soal['a']; ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan[<?= $soal['idsoal']; ?>]" value="B">
                                        <label class="form-check-label"><?= $soal['b']; ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan[<?= $soal['idsoal']; ?>]" value="C">
                                        <label class="form-check-label"><?= $soal['c']; ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan[<?= $soal['idsoal']; ?>]" value="D">
                                        <label class="form-check-label"><?= $soal['d']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <?php $nomor++; ?>
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
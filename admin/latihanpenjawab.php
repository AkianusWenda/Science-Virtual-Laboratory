<?php
include 'header.php';

$idkuis = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($idkuis <= 0) {
    echo "<p class='alert alert-danger'>ID kuis tidak valid.</p>";
    exit;
}

// Ambil data kuis (termasuk hitung jumlah soal untuk persentase)
$ambil = $koneksi->prepare("SELECT * FROM kuis WHERE idkuis = ?");
$ambil->bind_param("i", $idkuis);
$ambil->execute();
$kuisData = $ambil->get_result()->fetch_assoc();

if (!$kuisData) {
    echo "<p class='alert alert-danger'>Data kuis tidak ditemukan.</p>";
    exit;
}

// Ambil jumlah soal untuk hitung persentase skor
$ambilSoal = $koneksi->prepare("SELECT COUNT(*) AS total_soal FROM soal WHERE idkuis = ?");
$ambilSoal->bind_param("i", $idkuis);
$ambilSoal->execute();
$totalSoalData = $ambilSoal->get_result()->fetch_assoc();
$totalSoal = (int)$totalSoalData['total_soal'];

// Fungsi konversi nilai persentase ke grade huruf
function skorHuruf($persentase)
{
    if ($persentase >= 85 && $persentase <= 100) {
        return "A";
    } elseif ($persentase >= 75 && $persentase < 85) {
        return "B";
    } elseif ($persentase >= 65 && $persentase < 75) {
        return "C";
    } elseif ($persentase >= 55 && $persentase < 65) {
        return "D";
    } else {
        return "E";
    }
}

// Fungsi hasil deskriptif berdasarkan persentase
function hasilDeskriptif($persentase)
{
    if ($persentase < 40) {
        return "Kurang";
    } elseif ($persentase < 60) {
        return "Cukup";
    } elseif ($persentase < 85) {
        return "Baik";
    } else {
        return "Sangat Baik";
    }
}

?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Data Jawaban Kuis: <?= htmlspecialchars($kuisData['judul']); ?></h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Sekolah</th>
                                        <!-- <th>Skor</th> -->
                                        <th>Nilai</th>
                                        <th>Hasil</th>
                                        <th>Waktu Submit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    $ambildata = $koneksi->prepare("SELECT * FROM jawaban WHERE idkuis = ?");
                                    $ambildata->bind_param("i", $idkuis);
                                    $ambildata->execute();
                                    $result = $ambildata->get_result();

                                    while ($data = $result->fetch_assoc()) {
                                        $jumlahBenar = (int)$data['skor'];
                                        $persentase = ($totalSoal > 0) ? ($jumlahBenar / $totalSoal) * 100 : 0;

                                        $grade = skorHuruf($persentase);
                                        $hasil = hasilDeskriptif($persentase);
                                    ?>
                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= htmlspecialchars($data['nama']); ?></td>
                                            <td><?= htmlspecialchars($data['kelas']); ?></td>
                                            <td><?= htmlspecialchars($data['sekolah']); ?></td>
                                            <!-- <td><?= round($persentase, 2); ?>%</td> -->
                                            <td><b><?= $grade; ?></b></td>
                                            <td><?= $hasil; ?></td>
                                            <td><?= date('d-m-Y H:i', strtotime($data['waktu'])); ?></td>
                                            <td>
                                                <a href="latihanhasiljawaban.php?id=<?= $data['idjawaban']; ?>&idkuis=<?= $idkuis; ?>"
                                                    class="btn btn-success btn-sm m-1">Jawaban</a>
                                                <a href="jawabanhapus.php?id=<?= $data['idjawaban']; ?>&idkuis=<?= $idkuis; ?>"
                                                    class="btn btn-danger btn-sm m-1"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
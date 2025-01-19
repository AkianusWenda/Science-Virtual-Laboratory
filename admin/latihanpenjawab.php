<?php include 'header.php';
$idkuis = $_GET['id'];

// Menggunakan prepared statements untuk query SQL
$ambil = $koneksi->prepare("SELECT * FROM kuis WHERE idkuis = ?");
$ambil->bind_param("i", $idkuis); // Mengikat parameter sebagai integer
$ambil->execute();
$data = $ambil->get_result()->fetch_assoc();

function skor($skor)
{
    if ($skor <= 6) {
        return "Kurang";
    } elseif ($skor <= 14) {
        return "Cukup";
    } elseif ($skor <= 24) {
        return "Baik";
    } else {
        return "Sangat Baik";
    }
}

?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Jawaban</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- <a href="latihanpenjawabcetak.php?id=<?= $idkuis ?>" class="btn btn-success float-right btn-sm m-1 mb-4">Cetak</a> -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel">
                                <thead class="text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
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
                                    ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                            <td><?php echo htmlspecialchars($data['email']); ?></td>
                                            <td><?php echo htmlspecialchars($data['nohp']); ?></td>
                                            <td><?php echo skor($data['skor']); ?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($data['waktu'])); ?></td>
                                            <td>
                                                <a href="latihanhasiljawaban.php?id=<?php echo $data['idjawaban']; ?>&idkuis=<?php echo $idkuis; ?>"
                                                    class="btn btn-success btn-sm m-1">Jawaban</a>
                                                <a href="jawabanhapus.php?id=<?php echo $data['idjawaban']; ?>&idkuis=<?php echo $idkuis; ?>"
                                                    class="btn btn-danger btn-sm m-1"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $nomor++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Memeriksa apakah form disubmit untuk menyimpan kuis baru
if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];

    // Menggunakan prepared statement untuk menyimpan data kuis
    $stmt = $koneksi->prepare("INSERT INTO kuis (judul, isi, tanggal, status) VALUES (?, ?, ?, 'Tidak Aktif')");
    $stmt->bind_param("sss", $judul, $isi, $tanggal); // "sss" berarti tiga parameter string
    $stmt->execute();

    $idlatihan = $stmt->insert_id;
    echo "<script>alert('Data Berhasil Disimpan');</script>";
    echo "<script>location='latihanedit.php?id=$idlatihan';</script>";
}
?>

<?php
include 'footer.php';
?>
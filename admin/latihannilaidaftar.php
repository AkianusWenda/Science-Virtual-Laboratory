<?php include 'header.php';
include 'koneksi.php';
$idkuis = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kuis left join kelompok ON kuis.idkelompok = kelompok.idkelompok WHERE idkuis='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h2 class="page-title"> Data Nilai </h2>
        </div>
        <div id="blog_page_area">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" placeholder="Judul Evaluasi" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelompok</label>
                                        <input type="text" class="form-control" name="kelompok" value="<?= $data['kelompok'] ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" class="form-control" name="tanggal" value="<?= hari($data['tanggal']) . ', ' . tanggal($data['tanggal']) ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" name="isi" id="isi" rows="10" readonly><?= $data['isi'] ?></textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Nilai Siswa</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="tabel">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Nilai Pilihan Ganda</th>
                                                <th>Nilai Essay</th>
                                                <th>Nilai Praktik</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nomor = 1;
                                            $ambilrow = $koneksi->query("SELECT siswa.idsiswa as ids, siswa.*, kuisnilai.* FROM siswa LEFT JOIN kuisnilai ON siswa.idsiswa = kuisnilai.idsiswa AND kuisnilai.idkuis = '$idkuis' WHERE siswa.idkelompok = '$data[idkelompok]'");
                                            while ($row = $ambilrow->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $nomor; ?></td>
                                                    <td><?php echo $row['nis']; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo isset($row['nilaipilihanganda']) ? $row['nilaipilihanganda'] : '-'; ?></td>
                                                    <td><?php echo isset($row['nilaiessay']) ? $row['nilaiessay'] : '-'; ?></td>
                                                    <td><?php echo isset($row['nilaipraktik']) ? $row['nilaipraktik'] : '-'; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#kelolaNilaiModal<?php echo $nomor; ?>">
                                                            Kelola Nilai
                                                        </button>

                                                        <div class="modal fade" id="kelolaNilaiModal<?php echo $nomor; ?>" tabindex="-1" aria-labelledby="kelolaNilaiModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="kelolaNilaiModalLabel">Kelola Nilai</h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post">
                                                                            <input type="hidden" name="idsiswa" value="<?= $row['ids'] ?>">
                                                                            <input type="hidden" name="idkuis" value="<?= $idkuis ?>">
                                                                            <div class="form-group">
                                                                                <label for="nilaipilihanganda">Nilai Pilihan Ganda</label>
                                                                                <input type="number" class="form-control" id="nilaipilihanganda" name="nilaipilihanganda" value="<?= $row['nilaipilihanganda'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nilaiessay">Nilai Essay</label>
                                                                                <input type="number" class="form-control" id="nilaiessay" name="nilaiessay" value="<?= $row['nilaiessay'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nilaipraktik">Nilai Praktik</label>
                                                                                <input type="number" class="form-control" id="nilaipraktik" name="nilaipraktik" value="<?= $row['nilaipraktik'] ?>" required>
                                                                            </div>
                                                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                                $nomor++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>





<?php
if (isset($_POST['submit'])) {
    $idsiswa = $_POST['idsiswa'];
    $idkuis = $_POST['idkuis'];
    $nilaipilihanganda = $_POST['nilaipilihanganda'];
    $nilaiessay = $_POST['nilaiessay'];
    $nilaipraktik = $_POST['nilaipraktik'];

    $cek = $koneksi->query("SELECT * FROM kuisnilai WHERE idsiswa='$idsiswa' AND idkuis='$idkuis'");
    if ($cek->num_rows > 0) {
        // Update existing record
        $koneksi->query("UPDATE kuisnilai SET nilaipilihanganda='$nilaipilihanganda', nilaiessay='$nilaiessay', nilaipraktik='$nilaipraktik' WHERE idsiswa='$idsiswa' AND idkuis='$idkuis'");
    } else {
        // Insert new record
        $koneksi->query("INSERT INTO kuisnilai (idkuis, idsiswa, nilaipilihanganda, nilaiessay, nilaipraktik) VALUES ('$idkuis', '$idsiswa', '$nilaipilihanganda', '$nilaiessay', '$nilaipraktik')");
    }

    echo "<script>alert('Nilai Berhasil Disimpan');</script>";
    echo "<script>location='latihannilaidaftar.php?id=$idkuis';</script>";
}
?>
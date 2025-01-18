<?php include 'header.php';
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM kuis left join kelompok ON kuis.idkelompok = kelompok.idkelompok WHERE idkuis='$_GET[id]'");
$data = $ambil->fetch_assoc();
$idsiswa = $_SESSION['pengguna']['idsiswa'];
$ambiljawaban = $koneksi->query("SELECT * FROM jawaban left join siswa ON jawaban.idsiswa = siswa.idsiswa WHERE jawaban.idsiswa='$idsiswa' and idkuis='$_GET[id]'");
$jawaban = $ambiljawaban->fetch_assoc();
if ($_SESSION["pengguna"]['level'] == 'Siswa') {
    if (!empty($jawaban)) {
        echo "<script>location='latihanhasil.php?id=$_GET[id]';</script>";
    }
}
// var_dump($jawaban);
?>
<style>
    .question-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .question-text {
        margin-top: 10px;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h2 class="page-title"> Jawab Evaluasi </h2>
        </div>
        <div id="blog_page_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <table border="0" width="100%">
                                        <tr>
                                            <td width="20%">Judul Kuis</td>
                                            <td><?= $data['judul'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelompok</td>
                                            <td><?= $data['kelompok'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hari / Tanggal</td>
                                            <td><?= hari($data['tanggal']) . ', ' . tanggal($data['tanggal']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td><?= $data['isi'] ?></td>
                                        </tr>
                                    </table> -->
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
                            <div class="card-body">
                                <h4>Jawab Evaluasi</h4>
                                <br>
                                <form method="post">
                                    <?php $nomor = 1;
                                    $ambildata = $koneksi->query("SELECT*FROM soal WHERE idkuis='$_GET[id]' order by idsoal asc");
                                    while ($data = $ambildata->fetch_assoc()) { ?>
                                        <input type="hidden" name="idsoal[]" value="<?php echo $data['idsoal']; ?>">
                                        <input type="hidden" name="idkuis" value="<?php echo $data['idkuis']; ?>">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td width="10px"><?php echo $nomor ?>.</td>
                                                        <td>
                                                            <?php if ($data['gambar']) { ?>
                                                                <img src="upload/<?php echo $data['gambar']; ?>" width="550px" class="question-image" alt="Gambar Soal">
                                                            <?php } ?>
                                                            <div class="question-text">
                                                                <?php echo $data['soal']; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>A. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="A" required> <?php echo $data['a']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>B. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="B"> <?php echo $data['b']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>C. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="C"> <?php echo $data['c']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>D. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="D"> <?php echo $data['d']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                    <?php
                                        $nomor++;
                                    } ?>
                                    <div class="form-group">
                                        <button class="btn btn-primary float-right pull-right" type="submit" name="simpan" value="simpan" onclick="return confirm('Apakah anda yakin ingin mengsubmit jawaban ? Jawaban yang telah di submit tidak dapat dirubah kembali')">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['simpan'])) {
            $idkuis = $_POST['idkuis'];
            $pilihan    = $_POST['pilihan'];
            $idsoal    = $_POST['idsoal'];
            $ambilkuis = $koneksi->query("SELECT * FROM soal
    WHERE idkuis='$idkuis'");
            $jumlah = $ambilkuis->num_rows;
            $score    = 0;
            $benar    = 0;
            $salah    = 0;
            $kosong    = 0;

            for ($i = 0; $i < $jumlah; $i++) {
                $nomor    = $idsoal[$i];
                if (empty($pilihan[$nomor])) {
                    $kosong++;
                } else {
                    $jawaban    = $pilihan[$nomor];
                    $query    = mysqli_query($koneksi, "SELECT * FROM soal WHERE idsoal='$nomor' AND kunci='$jawaban'");
                    $cek    = mysqli_num_rows($query);
                    if ($cek) {
                        $benar++;
                    } else {
                        $salah++;
                    }
                }
                $score    = 100 / $jumlah * $benar;
                $hasil    = number_format($score, 2);
            }
            $koneksi->query("INSERT INTO jawaban
		(idsiswa,idkuis,benar,salah,nilai)
		VALUES('$idsiswa','$idkuis','$benar','$salah','$hasil')") or die(mysqli_error($koneksi));
            $idjawaban = $koneksi->insert_id;
            $nomor = 0;
            for ($i = 0; $i < $jumlah; $i++) {
                $nomor    = $idsoal[$i];
                if (empty($pilihan[$nomor])) {
                    $kosong++;
                } else {
                    $jawaban    = $pilihan[$nomor];
                    $koneksi->query("INSERT INTO jawabandetail
            (idjawaban,idsoal,jawaban)
            VALUES('$idjawaban','$nomor','$jawaban')") or die(mysqli_error($koneksi));
                }
            }
            echo "<script>alert('Jawaban Anda Berhasil Di Simpan');</script>";
            echo "<script>location='latihanhasil.php?id=$idkuis';</script>";
        }
        include 'footer.php';
        ?>
<?php include 'header.php';
$idjawaban = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$_GET[idkuis]'");
$data = $ambil->fetch_assoc();
function skor($skor)
{
    if ($skor <= 6) {
        $hasil = "Tidak Dysmenorrhea";
    } elseif ($skor <= 14) {
        $hasil = "Dysmenorrhea Ringan";
    } elseif ($skor <= 24) {
        $hasil = "Dysmenorrhea Sedang";
    } else {
        $hasil = "Dysmenorrhea Berat";
    }
    return $hasil;
}
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
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Detail Hasil</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detail Hasil</h5>
                    <div class="card-body">
                        <?php
                        $ambiljawaban = $koneksi->query("SELECT * FROM jawaban WHERE idjawaban='$idjawaban' and idkuis='$_GET[idkuis]'");
                        $jawaban = $ambiljawaban->fetch_assoc();
                        ?>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="15%">Nama</td>
                                    <td>: <?= $jawaban['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Email</td>
                                    <td>: <?= $jawaban['email'] ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Nomor HP</td>
                                    <td>: <?= $jawaban['nohp'] ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Hasil</td>
                                    <td>: <?= skor($jawaban['skor']) ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Waktu Submit</td>
                                    <td><?php echo tanggal(date('Y-m-d', strtotime($jawaban['waktu']))) . ' ' . date('H:i', strtotime($jawaban['waktu'])) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <?php
                        $nomor = 1;
                        $ambildata = $koneksi->query("SELECT * FROM soal where idkuis='$_GET[idkuis]' order by idsoal asc");
                        while ($data = $ambildata->fetch_assoc()) {
                            $ambiljawabandetail = $koneksi->query("SELECT * FROM jawabandetail WHERE idjawaban='$jawaban[idjawaban]' and idsoal='$data[idsoal]'");
                            $jawabandetail = $ambiljawabandetail->fetch_assoc();
                        ?>
                            <input type="hidden" name="idsoal[]" value="<?php echo $data['idsoal']; ?>">
                            <input type="hidden" name="idkuis" value="<?php echo $data['idkuis']; ?>">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td width="5%"><?php echo $nomor ?>.</td>
                                            <td>
                                                <?php if ($data['gambar']) { ?>
                                                    <img src="upload/<?php echo $data['gambar']; ?>" width="550px" class="question-image" alt="Gambar Soal">
                                                <?php } ?>
                                                <div class="question-text">
                                                    <?php echo $data['soal']; ?>
                                                </div>
                                            </td>
                                            <td width="10%"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>A. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'A') echo 'checked'; ?> value="A" disabled> <?php echo $data['a']; ?> </td>
                                            <td>
                                                <?php if ($data['kunci'] == "A") {
                                                    echo '<i class="fa fa-check text-success"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times text-danger"></i>';
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>B. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'B') echo 'checked'; ?> value="B" disabled> <?php echo $data['b']; ?></td>
                                            <td>
                                                <?php if ($data['kunci'] == "B") {
                                                    echo '<i class="fa fa-check text-success"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times text-danger"></i>';
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>C. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'C') echo 'checked'; ?> value="C" disabled> <?php echo $data['c']; ?>
                                            </td>
                                            <td>
                                                <?php if ($data['kunci'] == "C") {
                                                    echo '<i class="fa fa-check text-success"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times text-danger"></i>';
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>D. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'D') echo 'checked'; ?> value="D" disabled> <?php echo $data['d']; ?>
                                            </td>
                                            <td>
                                                <?php if ($data['kunci'] == "D") {
                                                    echo '<i class="fa fa-check text-success"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times text-danger"></i>';
                                                } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        <?php
                            $nomor++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['simpan'])) {
    $koneksi->query("INSERT INTO kuis
		(judul,isi,tanggal,status)
		VALUES('$_POST[judul]','$_POST[isi]','$_POST[tanggal]','Tidak Aktif')") or die(mysqli_error($koneksi));
    $idlatihan = $koneksi->insert_id;
    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='latihanedit.php?id=$idlatihan';</script>";
}
?>
<?php
include 'footer.php';
?>
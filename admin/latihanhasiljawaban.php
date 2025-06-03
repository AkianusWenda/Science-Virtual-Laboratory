<?php
include 'header.php';
$idjawaban = $_GET['id'];
$idkuis = $_GET['idkuis'];

// Menggunakan prepared statement untuk mencegah SQL Injection
$ambil = $koneksi->prepare("SELECT * FROM kuis WHERE idkuis = ?");
$ambil->bind_param("i", $idkuis); // "i" berarti integer
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
                        // Menggunakan prepared statement untuk query jawaban
                        $ambiljawaban = $koneksi->prepare("SELECT * FROM jawaban WHERE idjawaban = ? AND idkuis = ?");
                        $ambiljawaban->bind_param("ii", $idjawaban, $idkuis); // "ii" berarti dua parameter integer
                        $ambiljawaban->execute();
                        $jawaban = $ambiljawaban->get_result()->fetch_assoc();
                        ?>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="15%">Nama</td>
                                    <td>: <?= htmlspecialchars($jawaban['nama']); ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Kelas</td>
                                    <td>: <?= htmlspecialchars($jawaban['kelas']); ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Sekolah</td>
                                    <td>: <?= htmlspecialchars($jawaban['sekolah']); ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Hasil</td>
                                    <td>: <?= skor($jawaban['skor']); ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Waktu Submit</td>
                                    <td><?php echo date('d-m-Y H:i', strtotime($jawaban['waktu'])); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <?php
                        $nomor = 1;
                        // Menggunakan prepared statement untuk mengambil soal
                        $ambildata = $koneksi->prepare("SELECT * FROM soal WHERE idkuis = ? ORDER BY idsoal ASC");
                        $ambildata->bind_param("i", $idkuis); // "i" untuk parameter integer
                        $ambildata->execute();
                        $result = $ambildata->get_result();

                        while ($data = $result->fetch_assoc()) {
                            // Menggunakan prepared statement untuk jawaban detail
                            $ambiljawabandetail = $koneksi->prepare("SELECT * FROM jawabandetail WHERE idjawaban = ? AND idsoal = ?");
                            $ambiljawabandetail->bind_param("ii", $jawaban['idjawaban'], $data['idsoal']);
                            $ambiljawabandetail->execute();
                            $jawabandetail = $ambiljawabandetail->get_result()->fetch_assoc();
                        ?>
                            <input type="hidden" name="idsoal[]" value="<?php echo $data['idsoal']; ?>">
                            <input type="hidden" name="idkuis" value="<?php echo $data['idkuis']; ?>">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td width="5%"><?php echo $nomor; ?>.</td>
                                            <td>
                                                <?php if ($data['gambar']) { ?>
                                                    <img src="upload/<?php echo htmlspecialchars($data['gambar']); ?>"
                                                        width="550px" class="question-image" alt="Gambar Soal">
                                                <?php } ?>
                                                <div class="question-text">
                                                    <?php echo htmlspecialchars($data['soal']); ?>
                                                </div>
                                            </td>
                                            <td width="10%"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>A. <input name="pilihan[<?php echo $data['idsoal']; ?>]" type="radio"
                                                    <?php if ($jawabandetail['jawaban'] == 'A') echo 'checked'; ?> value="A"
                                                    disabled> <?php echo htmlspecialchars($data['a']); ?></td>
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
                                            <td>B. <input name="pilihan[<?php echo $data['idsoal']; ?>]" type="radio"
                                                    <?php if ($jawabandetail['jawaban'] == 'B') echo 'checked'; ?> value="B"
                                                    disabled> <?php echo htmlspecialchars($data['b']); ?></td>
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
                                            <td>C. <input name="pilihan[<?php echo $data['idsoal']; ?>]" type="radio"
                                                    <?php if ($jawabandetail['jawaban'] == 'C') echo 'checked'; ?> value="C"
                                                    disabled> <?php echo htmlspecialchars($data['c']); ?></td>
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
                                            <td>D. <input name="pilihan[<?php echo $data['idsoal']; ?>]" type="radio"
                                                    <?php if ($jawabandetail['jawaban'] == 'D') echo 'checked'; ?> value="D"
                                                    disabled> <?php echo htmlspecialchars($data['d']); ?></td>
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
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
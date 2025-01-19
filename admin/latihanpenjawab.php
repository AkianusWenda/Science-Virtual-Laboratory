<?php include 'header.php';
$idkuis = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$_GET[id]'");
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
                                    <?php $nomor = 1;
                                    $ambildata = $koneksi->query("SELECT*FROM jawaban  where idkuis = '$idkuis'");
                                    while ($data = $ambildata->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['email'] ?></td>
                                        <td><?php echo $data['nohp'] ?></td>
                                        <td><?php echo skor($data['skor']) ?></td>
                                        <td><?php echo tanggal(date('Y-m-d', strtotime($data['waktu']))) . ' ' . date('H:i', strtotime($data['waktu'])) ?>
                                        </td>
                                        <td>
                                            <a href="latihanhasiljawaban.php?id=<?php echo $data['idjawaban']; ?>&idkuis=<?php echo $_GET['id']; ?>"
                                                class="btn btn-success btn-sm m-1">Jawaban</a>
                                            <a href="jawabanhapus.php?id=<?php echo $data['idjawaban']; ?>&idkuis=<?php echo $_GET['id']; ?>"
                                                class="btn btn-danger btn-sm m-1"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
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
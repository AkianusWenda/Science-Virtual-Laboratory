<?php include 'header.php';
$ambil = $koneksi->query("SELECT * FROM materi WHERE idmateri='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Materi</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Materi</h5>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="mb-2">Judul</label>
                                <input type="text" class="form-control mb-2" name="judul" value="<?= $data['judul'] ?>"
                                    placeholder="Judul Materi" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Tanggal</label>
                                <input type="date" class="form-control mb-2" name="tanggal"
                                    value="<?= $data['tanggal'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Deskripsi</label>
                                <textarea class="form-control mb-2" name="isi" id="isi"
                                    rows="10"><?= $data['isi'] ?></textarea>
                                <script>
                                CKEDITOR.replace('isi');
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="mb-2 mt-2">Foto Materi (JPG, JPEG, PNG)</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="file" class="form-control mb-2" name="foto">
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-success" href="../foto/<?= $data['foto'] ?>"
                                            target="_blank">Lihat Foto Materi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">File</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="file" class="form-control mb-2" name="file">
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-success" href="../foto/<?= $data['file'] ?>"
                                            target="_blank">Lihat File Materi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary float-end" type="submit" name="simpan"
                                    value="simpan">Simpan</button>
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
    $lokasifoto = $_FILES['foto']['tmp_name'];
    if (!empty($lokasifoto)) {
        $namafoto = $_FILES['foto']['name'];
        move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
    } else {
        $namafoto = $data['foto'];
    }
    $lokasifile = $_FILES['file']['tmp_name'];
    if (!empty($lokasifile)) {
        $namafile = $_FILES['file']['name'];
        move_uploaded_file($lokasifile, "../foto/" . $namafile);
    } else {
        $namafile = $data['file'];
    }
    $koneksi->query("UPDATE materi SET judul='$_POST[judul]',isi='$_POST[isi]',tanggal='$_POST[tanggal]',foto='$namafoto', file='$namafile' WHERE idmateri='$_GET[id]'") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Edit');</script>";
    echo "<script>location='materidaftar.php';</script>";
}
?>
<?php
include 'footer.php';
?>
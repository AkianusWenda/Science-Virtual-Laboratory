<?php
include 'header.php';
?>
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Tambah Materi</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Materi</h5>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="mb-2">Nama Materi</label>
                            <input type="text" class="form-control mb-2" name="judul" placeholder="Judul Materi" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Tanggal</label>
                            <input type="date" class="form-control mb-2" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Deskripsi</label>
                            <textarea class="form-control mb-4" name="isi" id="isi" rows="10"></textarea>
                            <script>
                                CKEDITOR.replace('isi');
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="mb-2 mt-2">Foto Materi (JPG, JPEG, PNG)</label>
                            <input type="file" class="form-control mb-2" name="foto" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">File Materi (PDF)</label>
                            <input type="file" class="form-control mb-2" name="file" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-end" type="submit" name="simpan" value="simpan">Simpan</button>
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
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
        $namafile = $_FILES['file']['name'];
        $lokasifile = $_FILES['file']['tmp_name'];
        move_uploaded_file($lokasifile, "../foto/" . $namafile);
        $koneksi->query("INSERT INTO materi
    (judul,isi,tanggal,foto,file)
    VALUES('$_POST[judul]','$_POST[isi]','$_POST[tanggal]','$namafoto','$namafile')") or die(mysqli_error($koneksi));
        echo "<script>alert('Data Berhasil Di Simpan');</script>";
        echo "<script> location ='materidaftar.php';</script>";
    }
    ?>
<?php
include 'footer.php';
?>
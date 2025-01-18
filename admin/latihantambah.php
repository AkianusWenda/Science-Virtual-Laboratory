<?php
include 'header.php';
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Tambah Evaluasi</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tambah Evaluasi</h5>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="mb-2">Judul</label>
                                <input type="text" class="form-control mb-2" name="judul" placeholder="Judul Evaluasi" required>
                            </div>

                            <div class="form-group">
                                <label class="mb-2">Tanggal</label>
                                <input type="date" class="form-control mb-2" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Deskripsi</label>
                                <textarea class="form-control mb-2" name="isi" id="isi" rows="10"></textarea>
                                <script>
                                    CKEDITOR.replace('isi');
                                </script>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary float-end mt-2" type="submit" name="simpan" value="simpan">Simpan</button>
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
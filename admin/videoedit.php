<?php 
include 'header.php'; 
$ambil = $koneksi->query("SELECT * FROM video WHERE idvideo='$_GET[id]'"); 
$data = $ambil->fetch_assoc(); 
?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Gambar</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Gambar</h5>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="mb-2">Judul</label>
                                <input type="text" class="form-control mb-2" name="judul" value="<?= $data['judul'] ?>" placeholder="Judul Gambar" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Tanggal</label>
                                <input type="date" class="form-control mb-2" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Deskripsi Gambar</label>
                                <textarea class="form-control mb-2" name="isi" id="isi" rows="10"><?= $data['isi'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('isi');
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="mb-2 mt-2">File Gambar (JPG, PNG, JPEG)</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="file" class="form-control mb-2" name="file" accept="image/jpg, image/jpeg, image/png">
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Menampilkan gambar yang sudah ada -->
                                        <a class="btn btn-success" href="../foto/<?= $data['file'] ?>" target="_blank">Lihat Gambar</a>
                                    </div>
                                </div>
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
    // Ambil lokasi file yang diupload
    $lokasifile = $_FILES['file']['tmp_name'];
    
    // Jika ada file gambar yang diupload
    if (!empty($lokasifile)) {
        $namafile = $_FILES['file']['name'];
        // Validasi gambar
        $cekGambar = getimagesize($lokasifile);
        if ($cekGambar !== false) {
            // Tentukan folder tujuan dan pindahkan file
            $targetFolder = "../foto/";
            move_uploaded_file($lokasifile, $targetFolder . $namafile);
        } else {
            echo "<script>alert('File yang diupload bukan gambar!');</script>";
        }
    } else {
        // Jika tidak ada file yang diupload, gunakan file gambar lama
        $namafile = $data['file'];
    }

    // Update data video dengan gambar baru atau gambar lama
    $koneksi->query("UPDATE video 
        SET judul='$_POST[judul]', isi='$_POST[isi]', tanggal='$_POST[tanggal]', file='$namafile' 
        WHERE idvideo='$_GET[id]'") or die(mysqli_error($koneksi));
    
    echo "<script>alert('Data Berhasil Di Edit');</script>";
    echo "<script>location='videodaftar.php';</script>";
}
?>
<?php
include 'footer.php';
?>

<?php
include 'header.php';
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Tambah Kuis</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tambah Kuis</h5>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="mb-2">Judul</label>
                                <input type="text" class="form-control mb-2" name="judul" placeholder="Judul Gambar" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Tanggal</label>
                                <input type="date" class="form-control mb-2" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Deskripsi Gambar</label>
                                <textarea class="form-control mb-2" name="isi" id="isi" rows="10"></textarea>
                                <script>
                                    CKEDITOR.replace('isi');
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="mb-2 mt-2">File Gambar (JPG, PNG, JPEG)</label>
                                <input type="file" class="form-control mb-2" name="file" accept="image/jpg, image/jpeg, image/png" required>
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
    // Ambil nama file dan lokasi file yang diupload
    $namafile = $_FILES['file']['name'];
    $lokasifile = $_FILES['file']['tmp_name'];
    $ukuranfile = $_FILES['file']['size'];

    // Mengecek apakah file yang diupload adalah gambar
    $cekGambar = getimagesize($lokasifile); // Cek apakah file adalah gambar
    if ($cekGambar !== false) {
        // Validasi ukuran file (misalnya, maksimal 5MB)
        if ($ukuranfile > 5000000) { // 5MB
            echo "<script>alert('Ukuran gambar terlalu besar! Maksimal 5MB');</script>";
        } else {
            // Tentukan folder tujuan untuk menyimpan gambar
            $targetFolder = "../foto/";

            // Pindahkan file gambar ke folder tujuan
            move_uploaded_file($lokasifile, $targetFolder . $namafile);

            // Masukkan data ke database
            $koneksi->query("INSERT INTO video
                (judul, isi, tanggal, file)
                VALUES('$_POST[judul]', '$_POST[isi]', '$_POST[tanggal]', '$namafile')")
                or die(mysqli_error($koneksi));

            // Tampilkan pesan berhasil dan redirect
            echo "<script>alert('Data Berhasil Di Simpan');</script>";
            echo "<script>location ='videodaftar.php';</script>";
        }
    } else {
        echo "<script>alert('File yang diupload bukan gambar!');</script>";
    }
}
?>
<?php
include 'footer.php';
?>

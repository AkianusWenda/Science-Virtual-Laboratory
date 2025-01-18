<?php
include 'header.php';
include '../koneksi.php';
if (!isset($_SESSION["pengguna"])) {
    echo "<script> alert('Harap login terlebih dahulu');</script>";
    echo "<script> location ='login.php';</script>";
}
if ($_SESSION["pengguna"]['level'] == 'Admin') {
    $id = $_SESSION["pengguna"]['id'];
    $ambil = $koneksi->query("SELECT *FROM pengguna WHERE id='$id'");
    $pecah = $ambil->fetch_assoc(); ?>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Profil</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Edit Profil</h5>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="mb-2">Nama</label>
                                    <input value="<?php echo $pecah['nama']; ?>" type="text" value="" class="form-control mb-2" name="nama">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Email</label>
                                    <input value="<?php echo $pecah['email']; ?>" type="email" class="form-control mb-2" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Telepon</label>
                                    <input value="<?php echo $pecah['telepon']; ?>" type="number" class="form-control mb-2" name="telepon">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Alamat</label>
                                    <textarea value="<?php echo $pecah['alamat']; ?>" class="form-control mb-2" name="alamat" id="alamat" rows="10"><?php echo $pecah['alamat']; ?></textarea>
                                    <script>
                                        CKEDITOR.replace('alamat');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Password</label>
                                    <input type="text" class="form-control mb-2" name="password">
                                    <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $pecah['password']; ?>">
                                    <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                </div>
                                <button class="btn btn-primary float-end" name="ubah"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
    $id = $_SESSION["pengguna"]['idsiswa'];
    $ambil = $koneksi->query("SELECT *FROM siswa left join kelompok ON siswa.idkelompok = kelompok.idkelompok WHERE idsiswa='$id'");
    $data = $ambil->fetch_assoc(); ?>

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Profil</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Edit Profil</h5>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="mb-2">Nama</label>
                                    <input type="text" class="form-control mb-2" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama Siswa" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">NIS</label>
                                    <input type="text" class="form-control mb-2" name="nis" value="<?= $data['nis'] ?>" placeholder="NIS Siswa" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Jenis Kelamin</label>
                                    <select class="form-control mb-2" name="jeniskelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option <?php if ($data['jeniskelamin'] == 'Laki - Laki') echo 'selected'; ?> value="Laki - Laki">Laki - Laki</option>
                                        <option <?php if ($data['jeniskelamin'] == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Kelompok</label>
                                    <input type="text" class="form-control mb-2" name="nis" value="<?= $data['kelompok'] ?>" placeholder="NIS Siswa" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Tempat Lahir</label>
                                    <input type="text" class="form-control mb-2" name="tempatlahir" value="<?= $data['tempatlahir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Tanggal Lahir</label>
                                    <input type="date" class="form-control mb-2" name="tanggallahir" value="<?= $data['tanggallahir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Alamat</label>
                                    <textarea class="form-control mb-2" name="alamat" id="alamat" rows="10"><?= $data['alamat'] ?></textarea>
                                    <script>
                                        CKEDITOR.replace('isi');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2 mt-2">Foto Siswa (JPG, JPEG, PNG)</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="file" class="form-control mb-2" name="foto">
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-success" href="foto/<?= $data['foto'] ?>" target="_blank">Lihat Foto</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Password</label>
                                    <input type="text" class="form-control mb-2" name="password">
                                    <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $data['password']; ?>">
                                    <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                </div>
                                <button class="btn btn-primary float-end" name="ubah"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    if (isset($_POST['ubah'])) {
        if ($_POST['password'] == "") {
            $password = $_POST['passwordlama'];
        } else {
            $password = $_POST['password'];
        }
        if ($_SESSION["pengguna"]['level'] == 'Admin') {
            $koneksi->query("UPDATE pengguna SET password='$password',nama='$_POST[nama]', email='$_POST[email]',telepon='$_POST[telepon]', alamat='$_POST[alamat]' WHERE id='$id'") or die(mysqli_error($koneksi));
            echo "<script>alert('Profil Berhasil Di Ubah');</script>";
            echo "<script>location='profil.php';</script>";
        } else {
            $lokasifoto = $_FILES['foto']['tmp_name'];
            if (!empty($lokasifoto)) {
                $namafoto = $_FILES['foto']['name'];
            } else {
                $namafoto = $data['foto'];
                move_uploaded_file($lokasifoto, "foto/" . $namafoto);
            }
            $koneksi->query("UPDATE siswa SET nama='$_POST[nama]',idkelompok='$_POST[kelompok]',nis='$_POST[nis]',password='$password',foto='$namafoto',jeniskelamin='$_POST[jeniskelamin]',tempatlahir='$_POST[tempatlahir]',tanggallahir='$_POST[tanggallahir]',alamat='$_POST[alamat]' WHERE idsiswa='$id'") or die(mysqli_error($koneksi));
            echo "<script>alert('Profil Berhasil Di Ubah');</script>";
            echo "<script>location='profil.php';</script>";
        }
    }
    ?>
    </div>

    <?php
    include 'footer.php';
    ?>
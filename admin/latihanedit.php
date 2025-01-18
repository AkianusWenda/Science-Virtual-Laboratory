<?php include 'header.php';
$idkuis = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Tugas</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Tugas</h5>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="mb-2">Judul</label>
                                <input type="text" class="form-control mb-2" name="judul" value="<?= $data['judul'] ?>" placeholder="Judul Evaluasi" required>
                            </div>

                            <div class="form-group">
                                <label class="mb-2">Tanggal</label>
                                <input type="date" class="form-control mb-2" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Deskripsi</label>
                                <textarea class="form-control mb-2" name="isi" id="isi" rows="10"><?= $data['isi'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('isi');
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="mb-2 mt-2">Status</label>
                                <select name="status" class="form-control mb-2">
                                    <option <?php if ($data['status'] == 'Aktif') echo 'selected'; ?> value="Aktif">Aktif</option>
                                    <option <?php if ($data['status'] == 'Tidak Aktif') echo 'selected'; ?> value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary float-end" type="submit" name="simpan" value="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tambah Soal</h5>
                    <div class="card-body">

                        <a href="#" data-bs-toggle="modal" data-bs-target="#tambahkuis" class="btn btn-primary">Tambah Soal</a>
                        <div class="modal fade" id="tambahkuis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="soal" class="mb-2"><span class="text-danger">*</span>Soal</label>
                                                <textarea name="soal" class="form-control ckeditor" id="soal"></textarea>
                                                <script>
                                                    CKEDITOR.replace('soal');
                                                </script>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar" class="mb-2 mt-2">Gambar Soal (optional)</label>
                                                <input type="file" name="gambar" class="form-control mb-2" id="gambar">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="a" class="mb-2"><span class="text-danger">*</span>Jawaban A</label>
                                                        <input type="text" name="a" class="form-control mb-2" id="a" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="b" class="mb-2"><span class="text-danger">*</span>Jawaban B</label>
                                                        <input type="text" name="b" class="form-control mb-2" id="b" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="c" class="mb-2"><span class="text-danger">*</span>Jawaban C</label>
                                                        <input type="text" name="c" class="form-control mb-2" id="c" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="d" class="mb-2"><span class="text-danger">*</span>Jawaban D</label>
                                                        <input type="text" name="d" class="form-control mb-2" id="d" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kunci" class="mb-2"><span class="text-danger">*</span>Kunci Jawaban</label>
                                                <select name="kunci" class="form-control mb-2" id="kunci">
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary float-end" type="submit" name="tambah" value="tambah">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel">
                                <thead class=" text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Soal</th>
                                        <th>Gambar</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th>Kunci</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1;
                                    $ambildata = $koneksi->query("SELECT*FROM soal where idkuis = '$idkuis' order by idsoal asc");
                                    while ($data = $ambildata->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $data['soal'] ?></td>
                                            <td>
                                                <?php if (!empty($data['gambar'])) { ?>
                                                    <img src="upload/<?php echo $data['gambar']; ?>" alt="Gambar Soal" width="100">
                                                <?php } else {
                                                    echo "Tidak ada gambar";
                                                } ?>
                                            </td>
                                            <td><?php echo $data['a'] ?></td>
                                            <td><?php echo $data['b'] ?></td>
                                            <td><?php echo $data['c'] ?></td>
                                            <td><?php echo $data['d'] ?></td>
                                            <td><?php echo $data['kunci'] ?></td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $nomor ?>" class="btn btn-warning btn-sm m-1">Edit Soal</a>

                                                <a href="soalhapus.php?id=<?= $data['idsoal'] ?>&idkuis=<?= $data['idkuis'] ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $nomor ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label for="soal<?= $nomor ?>" class="form-label"><span class="text-danger">*</span>Soal <?= $nomor ?></label>
                                                                <textarea name="soal" class="form-control" id="soal<?= $nomor ?>"><?= $data['soal'] ?></textarea>
                                                                <input type="hidden" name="idsoal" value="<?= $data['idsoal'] ?>">
                                                                <script>
                                                                    CKEDITOR.replace('soal<?= $nomor ?>');
                                                                </script>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="gambar" class="form-label">Gambar Soal (optional)</label>
                                                                <input type="file" name="gambar" class="form-control" id="gambar">
                                                                <?php if (!empty($data['gambar'])) { ?>
                                                                    <img src="../upload/<?php echo $data['gambar']; ?>" alt="Gambar Soal" width="100">
                                                                <?php } ?>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="a" class="form-label"><span class="text-danger">*</span>Jawaban A</label>
                                                                        <input type="text" name="a" value="<?= $data['a'] ?>" class="form-control" id="a" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="b" class="form-label"><span class="text-danger">*</span>Jawaban B</label>
                                                                        <input type="text" name="b" value="<?= $data['b'] ?>" class="form-control" id="b" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="c" class="form-label"><span class="text-danger">*</span>Jawaban C</label>
                                                                        <input type="text" name="c" value="<?= $data['c'] ?>" class="form-control" id="c" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="d" class="form-label"><span class="text-danger">*</span>Jawaban D</label>
                                                                        <input type="text" name="d" value="<?= $data['d'] ?>" class="form-control" id="d" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kunci" class="form-label"><span class="text-danger">*</span>Kunci Jawaban</label>
                                                                <select name="kunci" class="form-select" id="kunci">
                                                                    <option <?php if ($data['kunci'] == 'A') echo 'selected'; ?> value="A">A</option>
                                                                    <option <?php if ($data['kunci'] == 'B') echo 'selected'; ?> value="B">B</option>
                                                                    <option <?php if ($data['kunci'] == 'C') echo 'selected'; ?> value="C">C</option>
                                                                    <option <?php if ($data['kunci'] == 'D') echo 'selected'; ?> value="D">D</option>
                                                                </select>
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-primary" type="submit" name="edit" value="edit">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    $koneksi->query("UPDATE kuis SET judul='$_POST[judul]',isi='$_POST[isi]',tanggal='$_POST[tanggal]', status='$_POST[status]' WHERE idkuis='$_GET[id]'") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Edit');</script>";
    echo "<script>location='latihanedit.php?id=$_GET[id]';</script>";
}
if (isset($_POST['tambah'])) {
    $soal = $_POST['soal'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $kunci = $_POST['kunci'];
    $gambar = '';

    if (!empty($_FILES['gambar']['name'])) {
        $target_dir = "upload/";
        $unique_id = uniqid('', true);
        $extension = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
        $new_file_name = $unique_id . '.' . $extension;
        $target_file = $target_dir . $new_file_name;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = $new_file_name;
        }
    }

    $koneksi->query("INSERT INTO soal (idkuis, soal, a, b, c, d, kunci, gambar) VALUES ('$idkuis','$soal','$a','$b','$c','$d','$kunci','$gambar')") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Disimpan');</script>";
    echo "<script>location='latihanedit.php?id=$_GET[id]';</script>";
}

if (isset($_POST['edit'])) {
    $idsoal = $_POST['idsoal'];
    $soal = $_POST['soal'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $kunci = $_POST['kunci'];
    $gambar = '';

    if (!empty($_FILES['gambar']['name'])) {
        $target_dir = "../upload/";
        $unique_id = uniqid('', true);  // Menghasilkan ID unik dengan mikrodetik
        $extension = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);  // Mendapatkan ekstensi file
        $new_file_name = $unique_id . '.' . $extension;  // Menggabungkan ID unik dan ekstensi file
        $target_file = $target_dir . $new_file_name;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = $new_file_name;
        }
    } else {
        $gambar = $data['gambar'];
    }

    $koneksi->query("UPDATE soal SET soal = '$soal', a = '$a', b = '$b', c = '$c', d = '$d', kunci = '$kunci', gambar = '$gambar' WHERE idsoal = '$idsoal'");
    echo "<script>alert('Data Berhasil Diedit');</script>";
    echo "<script>location='latihanedit.php?id=$_GET[id]';</script>";
}


include 'footer.php';
?>
<?php include 'header.php';
?>
<div class="content-wrapper">
    <?php
    if ($_SESSION["pengguna"]['level'] == 'Admin') {
    ?>
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Materi</h4>

            <div class="card">
                <div class="card-body">
                    <a href="materitambah.php" class="btn btn-primary">Tambah Materi</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="tabel">
                            <thead class=" text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Foto</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $ambildata = $koneksi->query("SELECT*FROM materi order by tanggal desc");
                                while ($data = $ambildata->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo tanggal($data['tanggal']) ?></td>
                                        <td><?php echo $data['judul'] ?></td>
                                        <td><img src="../foto/<?= $data['foto'] ?>" width="150px" style="border-radius: 10px"></td>
                                        <td><a class="btn btn-success btn-sm" href="../foto/<?= $data['file'] ?>" target="_blank">Download</a></td>
                                        <td>
                                            <a href="materiedit.php?id=<?php echo $data['idmateri']; ?>" class="btn btn-warning btn-sm m-1">Edit</a>
                                            <a href="materihapus.php?id=<?php echo $data['idmateri']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
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
    <?php } else {
        if (!empty($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $ambildata = $koneksi->query("SELECT*FROM materi where judul like '$keyword%' order by tanggal desc");
        } else {
            $keyword = "";
            $ambildata = $koneksi->query("SELECT*FROM materi order by tanggal desc");
        }
        $cek = $ambildata->num_rows;
    ?>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($cek >= 1) {
                        while ($data = $ambildata->fetch_assoc()) { ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="single_blog">
                                        <div class="single_blog_img">
                                            <a href="materidetail.php?id=<?= $data['idmateri'] ?>"><img src="foto/<?= $data['foto'] ?>" width="100%"></a>
                                        </div>
                                        <div class="blog_content">
                                            <div class="blog_date text-center mt-3">
                                                <div class="bd_day float-right"><?= tanggal($data['tanggal']) ?></div>
                                            </div>
                                            <h4 class="post_title"><a href="materidetail.php?id=<?= $data['idmateri'] ?>"><?= $data['judul'] ?></a></h4>
                                            <p>
                                                <?php echo wordlimiter($data['isi'], 10); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="single_blog">
                                    <div class="single_blog_img">
                                        <a href="#"><img src="foto/kosong.jpg" width="100%"></a>
                                        <div class="blog_date text-center">
                                        </div>
                                        <div class="blog_content">
                                            <h4 class="post_title"><a href="#">Materi Kosong</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include 'footer.php';
?>
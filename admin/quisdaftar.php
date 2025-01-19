<?php include 'header.php'; ?>
<div class="content-wrapper">
    <?php
    if ($_SESSION["pengguna"]['level'] == 'Admin') {
    ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Tambah Kuis</h4>

        <div class="card">
            <div class="card-body">
                <a href="quistambah.php" class="btn btn-primary">Tambah Kuis</a>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tabel">
                        <thead class=" text-white">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nomor = 1;
                                $ambildata = $koneksi->query("SELECT*FROM video order by tanggal desc");
                                while ($data = $ambildata->fetch_assoc()) {
                                    $file = "../foto/" . $data['file'];
                                    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                                ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo tanggal($data['tanggal']) ?></td>
                                <td><?php echo $data['judul'] ?></td>
                                <td>
                                    <?php
                                            if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) { ?>
                                    <!-- Menampilkan gambar -->
                                    <img src="<?= $file ?>" alt="Gambar" width="150px">
                                    <?php } elseif ($file_extension == 'mp4') { ?>
                                    <!-- Menampilkan video -->
                                    <video width="150px" controls>
                                        <source src="<?= $file ?>" type="video/mp4">
                                    </video>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="quisedit.php?id=<?php echo $data['idvideo']; ?>"
                                        class="btn btn-warning btn-sm m-1">Edit</a>
                                    <a href="quishapus.php?id=<?php echo $data['idvideo']; ?>"
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
    <?php } else {
        if (!empty($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $ambildata = $koneksi->query("SELECT*FROM video where judul like '$keyword%' order by tanggal desc");
        } else {
            $keyword = "";
            $ambildata = $koneksi->query("SELECT*FROM video order by tanggal desc");
        }
        $cek = $ambildata->num_rows;
    ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if ($cek >= 1) {
                        while ($data = $ambildata->fetch_assoc()) {
                            $file = "foto/" . $data['file'];
                            $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                    ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="single_blog">
                            <div class="single_blog_img">
                                <a href="videodetail.php?id=<?= $data['idvideo'] ?>">
                                    <?php
                                                if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) { ?>
                                    <!-- Menampilkan gambar -->
                                    <img src="<?= $file ?>" alt="Gambar" width="100%">
                                    <?php } elseif ($file_extension == 'mp4') { ?>
                                    <!-- Menampilkan video -->
                                    <video width="100%" controls>
                                        <source src="<?= $file ?>" type="video/mp4">
                                    </video>
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="blog_content">
                                <div class="blog_date text-center mt-3">
                                    <div class="bd_day float-right"><?= tanggal($data['tanggal']) ?></div>
                                </div>
                                <h4 class="post_title"><a
                                        href="videodetail.php?id=<?= $data['idvideo'] ?>"><?= $data['judul'] ?></a></h4>
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
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="single_blog">
                            <div class="single_blog_img">
                                <a href="#"><img src="foto/kosong.jpg" width="100%"></a>
                            </div>
                            <div class="blog_content">
                                <h4 class="post_title"><a href="#">Quis Kosong</a></h4>
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
<?php include 'footer.php'; ?>
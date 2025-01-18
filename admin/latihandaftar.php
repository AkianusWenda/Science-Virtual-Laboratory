<?php include 'header.php';
?>
<div class="content-wrapper">
    <?php
    if ($_SESSION["pengguna"]['level'] == 'Admin') {
    ?>
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Evaluasi</h4>

            <div class="card">
                <div class="card-body">
                    <a href="latihantambah.php" class="btn btn-primary">Tambah Evaluasi</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="tabel">
                            <thead class=" text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1;
                                $ambildata = $koneksi->query("SELECT*FROM kuis  order by tanggal desc");
                                while ($data = $ambildata->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo tanggal($data['tanggal']) ?></td>
                                        <td><?php echo $data['judul'] ?></td>
                                        <td><?php echo $data['status'] ?></td>
                                        <td>
                                            <a href="latihanpenjawab.php?id=<?php echo $data['idkuis']; ?>" class="btn btn-success btn-sm m-1">Data Jawaban</a>

                                            <a href="latihanedit.php?id=<?php echo $data['idkuis']; ?>" class="btn btn-warning btn-sm m-1">Edit Soal</a>
                                            <a href="latihanhapus.php?id=<?php echo $data['idkuis']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
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
    <?php } ?>
</div>
<?php
include 'footer.php';
?>
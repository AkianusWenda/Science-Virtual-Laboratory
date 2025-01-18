<?php include 'header.php';
$ambil = $koneksi->query("SELECT * FROM materi WHERE idmateri='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h2 class="page-title"> Materi </h2>
        </div>
        <div id="blog_page_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="single_blog_img">
                                    <img src="foto/<?= $data['foto'] ?>" style="width:100%">
                                </div>
                                <div class="blog_content mt-3">
                                    <div class="blog_date float-right">
                                        <div class="bd_day"><?= tanggal($data['tanggal']) ?></div>
                                    </div>
                                    <h4 class="post_title"><a href="materidetail.php?id=<?= $data['idmateri'] ?>"><?= $data['judul'] ?></a></h4>
                                    <p class="blog_dtls_page"><?= $data['isi'] ?></p>
                                    <br>
                                    <a class="btn btn-success float-right" href="foto/<?= $data['file'] ?>" target="_blank"><i class="fa fa-download"></i> Download File Materi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
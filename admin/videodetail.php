<?php include 'header.php';
$ambil = $koneksi->query("SELECT * FROM video WHERE idvideo='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h2 class="page-title"> Video Detail </h2>
        </div>
        <div id="blog_page_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="single_blog_img">
                                    <video width="100%" controls>
                                        <source src="foto/<?= $data['file'] ?>" type="video/mp4">
                                    </video>
                                </div>
                                <div class="blog_content mt-3">
                                    <div class="blog_date float-right">
                                        <div class="bd_day"><?= tanggal($data['tanggal']) ?></div>
                                    </div>
                                    <h4 class="post_title"><a href="videodetail.php?id=<?= $data['idvideo'] ?>"><?= $data['judul'] ?></a></h4>
                                    <p class="blog_dtls_page"><?= $data['isi'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
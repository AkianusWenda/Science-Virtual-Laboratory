<?php include "header.php"; ?>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1>Daftar Quis</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Quis</li>
                </ol>
            </nav>
        </div>
    </div>


    <section id="recent-posts" class="recent-posts section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Quis</h2>

        </div>

        <div class="container">

            <div class="row gy-5">
                <?php
                // Ambil data video dari database
                $query = "SELECT * FROM video";
                $result = $koneksi->query($query);

                if ($result->num_rows > 0):
                    while ($video = $result->fetch_assoc()):
                ?>
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="post-box">
                                <div class="post-img"><img src="assets/assets/img/bgkiri.png" class="img-fluid" alt=""></div>
                                <div class="meta">
                                    <span class="post-date"> <?php echo tanggal($video['tanggal']); ?></span>
                                </div>
                                <h3 class="post-title"><?php echo htmlspecialchars($video['judul']); ?></h3>
                                <a href="quisdetail.php?id=<?php echo $video['idvideo']; ?>"
                                    class="readmore stretched-link"><span>Lihat QUis</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                else:
                    ?>
                    <div class="col-12">
                        <p class="alert alert-warning">Belum ada quis yang tersedia.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <div style="padding-top: 100px;"></div>
</main>

<?php include "footer.php"; ?>
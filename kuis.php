<?php include "header.php"; ?>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1>Kuis</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Kuis</li>
                </ol>
            </nav>
        </div>
    </div>


    <section id="recent-posts" class="recent-posts section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kuis</h2>

        </div>

        <div class="container">

            <div class="row gy-5">
            <?php
            $query = "SELECT * FROM kuis WHERE status = 'Aktif'";
            $result = $koneksi->query($query);
            if ($result->num_rows > 0):
                while ($data = $result->fetch_assoc()):
            ?>
                <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                        <div class="post-img"><img src="assets/assets/img/kuis.jpg" class="img-fluid" alt=""></div>
                        <div class="meta">
                            <span class="post-date"><?= tanggal($data['tanggal']) ?></span>
                        </div>
                        <h3 class="post-title"><?= $data['judul'] ?></h3>
                        <a href="form_peserta.php?id=<?= $data['idkuis'] ?>" class="readmore stretched-link"><span>Jawab Kuis</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <?php
                endwhile;
            else:
                ?>
                <div class="col-12">
                    <p class="alert alert-warning">Belum ada kuis yang tersedia.</p>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </section>
    <div style="padding-top: 100px;"></div>
</main>

<?php include "footer.php"; ?>
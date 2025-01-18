<?php include "header.php"; ?>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1>Materi</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Materi</li>
                </ol>
            </nav>
        </div>
    </div>


    <section id="recent-posts" class="recent-posts section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Materi</h2>

        </div>

        <div class="container">

            <div class="row gy-5">
            <?php
        
        $result = $koneksi->query("SELECT idmateri, judul, foto, tanggal FROM materi");

        while ($row = $result->fetch_assoc()):
        ?>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                        <div class="post-img"><img style="height: 450px;object-fit:contain" width="100%" src="foto/<?php echo htmlspecialchars($row['foto']); ?>" class="img-fluid" alt=""></div>
                        <div class="meta">
                            <span class="post-date"><?php echo htmlspecialchars($row['tanggal']); ?></span>
                        </div>
                        <h3 class="post-title"><?php echo htmlspecialchars($row['judul']); ?></h3>
                        <a href="materidetail.php?id=<?php echo $row['idmateri']; ?>" class="readmore stretched-link"><span>Lihat Materi</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <div style="padding-top: 100px;"></div>
</main>

<?php include "footer.php"; ?>
<?php include "header.php"; ?>

<?php


if (isset($_GET['id'])) {
    $idmateri = $_GET['id'];

    $query = $koneksi->prepare("SELECT * FROM materi WHERE idmateri = ?");
    $query->bind_param("i", $idmateri);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $materi = $result->fetch_assoc();
    } else {
        echo "<div class='container'><p class='alert alert-danger'>Materi tidak ditemukan.</p></div>";
        exit;
    }
} else {
    echo "<div class='container'><p class='alert alert-danger'>ID materi tidak ditemukan.</p></div>";
    exit;
}
?>

<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1>Materi Detail</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="materi.php">Materi</a></li>
                    <li class="current">Materi Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section id="blog-details" class="blog-details section">
                    <div class="container">
                        <article class="article">
                            <img width="100%" style="border-radius: 20px;"
                                src="foto/<?php echo htmlspecialchars($materi['foto']); ?>" alt="" class="img-fluid">

                            <h2 class="title"><?php echo htmlspecialchars($materi['judul']); ?></h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="404.php"><?php echo htmlspecialchars($materi['judul']); ?></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="404.php"><time
                                                datetime="2020-01-01"><?php echo htmlspecialchars($materi['tanggal']); ?></time></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="content">
                                <p>
                                    <?php echo $materi['isi']; ?>
                                </p>
                                <!-- 
                                <?php if (!empty($materi['file'])): ?>
                                    <a href="foto/<?php echo htmlspecialchars($materi['file']); ?>" class="btn btn-success" download>Download Materi</a>
                                <?php endif; ?> -->

                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <div style="padding-top: 100px;"></div>
</main>

<?php include "footer.php"; ?>
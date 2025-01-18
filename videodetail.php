<?php include "header.php"; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data berdasarkan ID
    $query = $koneksi->prepare("SELECT * FROM video WHERE idvideo = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $video = $result->fetch_assoc();
    } else {
        echo "<div class='container'><p class='alert alert-danger'>Gambar tidak ditemukan.</p></div>";
        exit;
    }
} else {
    echo "<div class='container'><p class='alert alert-danger'>ID gambar tidak ditemukan.</p></div>";
    exit;
}
?>

<main class="main">
    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1>Detail Gambar</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Detail Gambar</li>
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
                            <!-- Tampilkan Gambar di bagian paling atas -->
                            <div class="text-center">
                                <img src="foto/<?php echo htmlspecialchars($video['file']); ?>" alt="Gambar" class="img-fluid">
                            </div>
                            
                            <!-- Tampilkan Judul Gambar setelah gambar -->
                            <h2 class="title text-center"><?php echo htmlspecialchars($video['judul']); ?></h2>
                            
                            <!-- Tampilkan Deskripsi Gambar -->
                            <p><?php echo ($video['isi']); ?></p>
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div style="padding-top: 100px;"></div>
</main>

<?php include "footer.php"; ?>

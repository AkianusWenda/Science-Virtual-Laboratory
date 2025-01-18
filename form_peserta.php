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
            <h2>Isi Data Sebelum Memulai Kuis</h2>

        </div>

        <div class="container">
            <div class="col-xl-12 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <form action="latihanjawab.php" method="POST">
                    <input type="hidden" name="idkuis" value="<?= $_GET['id']; ?>">

                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nohp">No HP</label>
                        <input type="text" class="form-control" name="nohp" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Mulai Kuis</button>
                </form>
            </div>
        </div>
    </section>
    <div style="padding-top: 100px;"></div>
</main>

<?php include "footer.php"; ?>
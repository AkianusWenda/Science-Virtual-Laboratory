<?php include "header.php"; ?>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url();">
        <div class="container">
            <h1>Login</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Login</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-5">
                    <img src="assets/assets/img/login.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Silahkan Login</h5>
                            <form action="" method="post" data-aos="fade-up" data-aos-delay="200">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                </div>

                                <div class="">
                                    <button type="submit" name="login" class="btn btn-primary float-end">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include "footer.php"; ?>

<?php

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

    // Cek di tabel pengguna
    $query = $koneksi->query("SELECT * FROM pengguna WHERE username='$username' AND password='$password' AND level = 'Admin'");
    if ($query->num_rows > 0) {
        $akun = $query->fetch_assoc();
        $_SESSION["pengguna"] = $akun;
        echo "<script>alert('Login Berhasil');</script>";
        echo "<script>location='admin/index.php';</script>";
    } else {

        echo "<script>alert('Username atau Password salah');</script>";
        echo "<script>location='login.php';</script>";
    }
}
?>
<?php
include('koneksi.php');
session_start();
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
function hari($hari)
{
    $hari = date("D", strtotime($hari));
    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;
}

function wordlimiter($string, $limit)
{
    $word = explode(" ", $string);
    return implode(" ", array_splice($word, 0, $limit));
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <title>NURUL HUDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <link rel="stylesheet" href="assets/home/css/animate.css" />
    <link rel="stylesheet" href="assets/home/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/home/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/home/css/meanmenu.min.css" />
    <link rel="stylesheet" href="assets/home/css/venobox.css" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="assets/home/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/home/style.css" />
    <link rel="stylesheet" href="assets/home/css/responsive.css" />
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ja5OB_qGcqyvktue"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="css/gaya.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="preloader">
        <div class="status-mes">
            <div class="bigSqr">
                <div class="square first"></div>
                <div class="square second"></div>
                <div class="square third"></div>
                <div class="square fourth"></div>
            </div>
            <div class="text_loading text-center">loading</div>
        </div>
    </div>
    <header id="header_area">
        <div class="header_btm_area" style="background-color: #17435E;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <img src="foto/logo.png" width="75px">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 text-right">
                        <div class="menu_wrap">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="login.php" class="text-white">Beranda</a>
                                        </li>
                                        <li>
                                            <a href="materi.php" class="font-weight-bold text-danger">Materi</a>
                                        </li>
                                        <li>
                                            <a href="tentang.php" class="text-white">Tentang</a>
                                        </li>
                                        <button class="btn btn-danger btn-sm px-3 bundarpil text-white" href="#" data-toggle="modal" data-target="#login">Login</button>
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu text-right">
                                <nav>
                                    <ul>
                                        <li><a href="login.php">Beranda</a></li>
                                        <li><a href="materi.php">Materi</a></li>
                                        <li><a href="tentang.php">Tentang</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="mb-3 text-center text-danger">Login</h3>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" value="" class="form-control" placeholder="NIS / Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" value="" class="form-control" placeholder="Password">
                                </div>
                                <center>
                                    <div class="form-group">
                                        <button class="btn btn-outline-danger btn-sm" name="login" value="login" type="submit">Masuk</button>
                                    </div>
                                </center>
                            </form>
                        </div>
                        <div class="col-md-5 my-auto">
                            <p class="text-justify text-dark">
                                <img src="foto/daftar.png" class="bundar" width="100%">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr><br>
        <h1 class="text-center mb-4">Materi </h1>
        <?php
        if (!empty($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $ambildata = $koneksi->query("SELECT*FROM materi where judul like '$keyword%' order by tanggal desc");
        } else {
            $keyword = "";
            $ambildata = $koneksi->query("SELECT*FROM materi order by tanggal desc");
        }
        $cek = $ambildata->num_rows;
        ?>
        <div id="blog_page_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if ($cek >= 1) {
                            while ($data = $ambildata->fetch_assoc()) { ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="single_blog">
                                            <div class="single_blog_img">
                                                <a href="materidetailluar.php?id=<?= $data['idmateri'] ?>"><img src="foto/<?= $data['foto'] ?>" width="100%"></a>
                                            </div>
                                            <div class="blog_content">
                                                <div class="blog_date text-center mt-3">
                                                    <div class="bd_day float-right"><?= tanggal($data['tanggal']) ?></div>
                                                </div>
                                                <h4 class="post_title"><a href="materidetailluar.php?id=<?= $data['idmateri'] ?>"><?= $data['judul'] ?></a></h4>
                                                <p>
                                                    <?php echo wordlimiter($data['isi'], 10); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="single_blog">
                                        <div class="single_blog_img">
                                            <a href="#"><img src="foto/kosong.jpg" width="100%"></a>
                                            <div class="blog_date text-center">
                                            </div>
                                            <div class="blog_content">
                                                <h4 class="post_title"><a href="#">Materi Kosong</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-success">
        <div class="row">
            <div class="col-12 col-md-12" style="padding-top: 10px;padding-bottom:10px">
                <center>
                    <p class="text-white">
                        <b>NURUL HUDA (1804411444)</b>
                        <br>
                        FAKULTAS TEKNIK KOMPUTER
                        <br>
                        UNIVERSITAS COKROAMINOTO PALOPO
                    </p>
                </center>
            </div>
        </div>
    </div>
    <script src="assets/home/js/materialize.min.js"></script>
    <script src="assets/home/js/bootstrap.min.js"></script>
    <script src="assets/home/js/jquery.meanmenu.min.js"></script>
    <script src="assets/home/js/jquery.mixitup.js"></script>
    <script src="assets/home/js/jquery.counterup.min.js"></script>
    <script src="assets/home/js/waypoints.min.js"></script>
    <script src="assets/home/js/wow.min.js"></script>
    <script src="assets/home/js/venobox.min.js"></script>
    <script src="assets/home/js/owl.carousel.min.js"></script>
    <script src="assets/home/js/simplePlayer.js"></script>
    <script src="assets/home/js/main.js"></script>
    <script src="assets/home/js/sweetalert2.all.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
</body>
<?php
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM pengguna
      WHERE username='$username' AND password='$password'");
    $akunyangcocok = $ambil->num_rows;
    if ($akunyangcocok >= 1) {
        $akun = $ambil->fetch_assoc();
        $_SESSION["pengguna"] = $akun;
        echo "<script> alert('Login Berhasil');</script>";
        echo "<script> location ='index.php';</script>";
    } else {
        $ambilsiswa = $koneksi->query("SELECT * FROM siswa
      WHERE nis='$username' AND password='$password'");
        $datasiswa = $ambilsiswa->num_rows;
        if ($datasiswa >= 1) {
            $akunsiswa = $ambilsiswa->fetch_assoc();
            $_SESSION["pengguna"] = $akunsiswa;
            echo "<script> alert('Login Berhasil');</script>";
            echo "<script> location ='index.php';</script>";
        } else {
            echo "<script> alert('Username atau Password anda salah');</script>";
            echo "<script> location ='index.php';</script>";
        }
    }
}
?>

</html
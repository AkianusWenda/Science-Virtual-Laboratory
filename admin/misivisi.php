<?php
include('koneksi.php');
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
		<div class="header_top_area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-6">
						<div class="hdr_tp_left">
							<a href="index.php">
								<img src="assets/admin/assets/images/inilogo.png" width="75px">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header_btm_area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 text-right">
						<div class="menu_wrap">
							<div class="main-menu">
								<nav>
									<ul>
										<li>
											<a href="login.php">Beranda</a>
										</li>
										<li><a href="#" class="font-weight-bold text-danger">Profil <i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu">
												<li><a href="misivisi.php">Misi Visi</a></li>
												<li><a href="struktur.php">Struktur Organisasi</a></li>
											</ul>
										</li>
										<li>
											<a href="kontak.php">Kontak</a>
										</li>
										<button class="btn btn-danger btn-sm px-3 bundarpil" href="#" data-toggle="modal" data-target="#login">Login</button>
									</ul>
								</nav>
							</div>
							<div class="mobile-menu text-right">
								<nav>
									<ul>
										<li><a href="login.php">Beranda</a></li>
										<li><a href="#">Profil <i class="fa fa-angle-down"></i></a>
											<ul>
												<li><a href="misivisi.php">Misi Visi</a></li>
												<li><a href="struktur.php">Struktur Organisasi</a></li>
											</ul>
										</li>
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
	<!-- modal -->
	<hr><br>
	<h1 class="text-center mb-4">Visi & Misi </h1>
	<div>
		<img src="foto/bgutama.jpeg" class="img-fluid mb-4" alt="Responsive image">
	</div>
	<div class="container">
		<h1 class="text-center mb-4">Visi </h1>
		<div class="row mb-5">
			<div class=" col-lg-12 text-center">
				<div>
					<p style="font-size: 20px;" class="mb-3">Unggulan : Memiliki kualitas yang tinggi dalam penguasaan iptek dan imtaq serta berjiwa kompetitif
						sebagai khalifah fil ardhi.
					</p>
					<p style="font-size: 20px;" class="mb-3">Islami : Memiliki kesalehan dan selalu menjunjung tinggi nilai-nilai keislaman dalam hidup dan
						kehidupan.
					</p>
					<p style="font-size: 20px;" class="mb-3">Populis : Diakui, diterima dan dibutuhkan oleh semua lapisan masyarakat.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<h1 class="text-center mb-4">Misi </h1>
		<div class="row mb-5">
			<div class=" col-lg-12 ">
				<div>
					<p style="font-size: 20px;">Untuk mencapai visi madrasah, misi dari penyelenggaraan pendidikan dan pembelajaran di Madrasah
						Aliyah terurai sebagai berikut:
					</p>
					<br>
					<ol>
						<li style="font-size: 20px;" class="mb-3"> Menyelenggarakan pendidikan yang berorientasi pada mutu lulusan yang berkualitas baik secara
							keilmuan, maupun secara moral sosial</li>
						<li style="font-size: 20px;" class="mb-3"> Mengembangkan sumber daya insani yang unggul di bidang iptek dan imtaq melalui proses
							pembelajaran yang efektif dan efisien</li>
						<li style="font-size: 20px;" class="mb-3"> Menumbuhkembangkan semangat keunggulan dalam bidang ilmu pengetahuan, teknologi, agama,
							budaya, dan keterampilan bagi seluruh sivitas akademika</li>
						<li style="font-size: 20px;" class="mb-3"> Meningkatkan kualitas pembelajaran di Madrasah Aliyah dengan berbasis IPTEK-IMTAQ</li>
						<li style="font-size: 20px;" class="mb-3"> Meningkatkan pencapaian prestasi akademik dan prestasi non akademik</li>
						<li style="font-size: 20px;" class="mb-3"> Menerapkan pembelajaran aktif, inovatif, kreatif dan menyenangkan (PAIMEK)</li>
						<li style="font-size: 20px;" class="mb-3"> Meningkatkan keimanan dan ketaqwaan siswa, khususnya dibidang iptek agar siswa mampu
							melanjutkan pendidikan pada jenjang perguruan tinggi yang berkualitas</li>
					</ol>
				</div>
			</div>
		</div>
	</div>


	<div style="padding-top:100px"></div>


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
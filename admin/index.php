<?php
include 'header.php';
?>
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="card">
					<div class="d-flex align-items-end row">
						<div class="col-sm-12">
							<div class="card-body">
								<h5 class="card-title text-primary">Selamat Datang, <b><?= $_SESSION['pengguna']['nama'] ?></h5>
								<img src="assets/admin/assets/img/welcome.png" width="100%" style="border-radius:10px;object-fit:cover">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>
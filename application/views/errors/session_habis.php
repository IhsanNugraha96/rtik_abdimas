<!DOCTYPE html>
<html>
<head>
	<title>Error!</title>
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">
  	<link href="<?= base_url('assets/'); ?>landingPage2/assets/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
  	<link href="<?= base_url('assets/img/logo/logo-rtik.png'); ?>" rel="icon">
</head>
<body>
		<div class="row  justify-content-md-center">
			<div class="card text-center w-60 mt-5">
			  <div class="card-header">
				<h4>Error!</h4>
			  </div>
			  <div class="card-body">
			  	<i class="fas fa-user-clock fa-3x text-danger mt-3 mb-3"></i>
			    <h5 class="card-title">Waktu Menunggu Telah Habis (<i>Session Time Out</i>)</h5>
			    <p class="card-text">Akun sudah logout otomatis, karena server tidak di akses lebih lebih dari 60 menit.</p>
			    <a href="<?= base_url('landingPage'); ?>" class="btn btn-secondary mt-3 mb-4"> Kembali ke Beranda</a>
			  </div>
			</div>
		</div>
</body>
</html>
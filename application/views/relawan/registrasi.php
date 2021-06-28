
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- Content Row -->


	<div class="col-md-6  mb-4  ">
		<input type="file" class="custom-file-input form-control" id="id_card" name="id_card" accept=".jpg, .jpeg, .png" oninvalid="this.setCustomValidity('Anda belum mengunggah foto id card..')" oninput="setCustomValidity('')">
		<!-- menampilkan notifikasi kesalahan inputan -->
		
		<label class="custom-file-label" for="id_card">unggah file</label>
		<div class="invalid-feedback">Unggah surat izin orang tua jika anda berusia di bawah 25 tahun. klik <a href="<?= base_url('auth/unduh_template/surat_izin'); ?>" class="text-danger">di sini</a> untuk mengunduh template surat izin</div>
		<div class="valid-feedback">Unggah surat izin orang tua jika anda berusia di bawah 25 tahun. klik <a href="<?= base_url('auth/unduh_template/surat_izin'); ?>" class="text-danger">di sini</a> untuk mengunduh template surat izin</div>
	</div>



	<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content
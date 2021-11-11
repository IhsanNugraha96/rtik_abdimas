<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- Content Row -->
	<div class="row">
		<div class="col-md-9">
			<div class="card shadow" style="border: none; margin: 2vh 0% 1vh 2%; align-items: center;">
				<div class="row text-center m-0 mt-3 justify-content-md-center">
					<h5>Template Berkas</h5>
				</div>

				<div class="row text-center m-0  justify-content-md-center">

					<?php $i=0; foreach ($template as $tmp) {?>
						<a href="<?= base_url('Pembimbing/unduh_template/'.$tmp['nama_template']); ?>"> 
							<div class="card border-0">
								<div class="card-body text-info">
									<i class="fas fa-file-download fa-2x"></i><br>
									<small><?= $nama_template[$i] ?></small>
								</div>
							</div>
						</a>
					<?php $i++; } ?>

				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card shadow  border-left-info" style="border: none; margin: 2vh 2% 4vh 0%; align-items: center;">
				<div class="card-body text-justify m-0 justify-content-md-center">
					<small>
						<ol style="margin-left: -15%;">
							<li>Silahkan unduh template berkas jika diperlukan;</li>
						</ol>
					</small>
				</div>
			</div>
		</div>
	</div>

	<!-- End of Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content-->
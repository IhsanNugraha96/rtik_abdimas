<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Survei Program</h1>
	<div class="row">
		<div class="col-lg-10 ">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- <?php print_r($kegiatan_berlangsung); ?> -->


	<!-- Content Row -->
	<?php if ( strtotime($now) < strtotime($kegiatan_berlangsung['awal_penilaian'])) 
	{?>
		<div class="row  justify-content-md-center">
			<div class="col-md-7">
				<div class="card text-center mt-3 border-bottom-info shadow">
					<div class="card-body">
						<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 10%;">
						<h6 class="card-title font-weight-bold mt-5 mb-3">Jadwal Survei Program belum dibuka!</h6>
					</div>
					<div class="card-footer">
						<b >Awal Penilaian : </b><b class="text-danger" id="demo6">  ... </b>
					</div>
				</div>
			</div>
		</div>
	<?php }	

	elseif (strtotime($now) > strtotime($kegiatan_berlangsung['awal_penilaian']) && strtotime($now) < strtotime($kegiatan_berlangsung['akhir_penilaian']) ) {?>

		<?php if (!$status_penilaian || $status_penilaian['nilai_mitra'] == '0') {?>

			<div class="row" style="margin: 0 8% 5vh 8%;">
				<div class="col">
					<div class="card shadow">
						<div class="card-header">
							<b class="m-0">Survei Program Tim RTIKAbdimas</b>
						</div>
						<div class="card-body">

							<h5 class="font-weight-bold text-center">Tim <?= $mitra['nama_tim']; ?></h5>
							<p class="text-center text-danger mb-5"><small><u>( Anda hanya bisa mengirimkan data penilaian satu kali ! )</u></small></p>
							<form class="user was-validated" method="post" action="<?= base_url('Mitra/penilaian_mitra/').$mitra['id_tim'];?>">
								<?php $i=0;  ?>
								<?php foreach ($indikator_penilaian as $idk) 
								{?>
									<p class="mx-3 mt-3"><small class="font-weight-bold"><?= ($i+1).'. '.$idk['indikator']; ?></small></p>

									<div class="row justify-content-md-center">
										<center>

											<b><small  class="font-weight-bold text-danger mr-3">Sangat Kurang</small></b>

											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="<?=$idk['id_indikator'].'_'.($i+1); ?>" name="<?=$idk['id_indikator']; ?>" value="20" required>
												<label class="custom-control-label" for="<?=$idk['id_indikator'].'_'.($i+1); ?>">1</label>
											</div>

											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="<?=$idk['id_indikator'].'_'.($i+2); ?>" name="<?=$idk['id_indikator']; ?>" value="40" required>
												<label class="custom-control-label" for="<?=$idk['id_indikator'].'_'.($i+2); ?>">2</label>
											</div>

											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="<?=$idk['id_indikator'].'_'.($i+3); ?>" name="<?=$idk['id_indikator']; ?>" value="60" required>
												<label class="custom-control-label" for="<?=$idk['id_indikator'].'_'.($i+3); ?>">3</label>
											</div>

											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="<?=$idk['id_indikator'].'_'.($i+4); ?>" name="<?=$idk['id_indikator']; ?>" value="80" required>
												<label class="custom-control-label" for="<?=$idk['id_indikator'].'_'.($i+4); ?>">4</label>
											</div>

											<div class="custom-control custom-radio custom-control-inline mb-3">
												<input type="radio" class="custom-control-input" id="<?=$idk['id_indikator'].'_'.($i+5); ?>" name="<?=$idk['id_indikator']; ?>" value="100" required>
												<label class="custom-control-label" for="<?=$idk['id_indikator'].'_'.($i+5); ?>">5</label>
											</div>

											<b><small  class="font-weight-bold text-success">Sangat Bagus</small></b>

										</center>
									</div>
									<hr width="90%">

									<?php $i++; } ?>


									<div class="row">
										<div class="col text-right mx-4">
											<button type="submit" class="btn btn-sm btn-primary">Kirim</button>                  
										</div>
									</div>
								</form>
							</div>
							<div class="card-footer text-center">
								<b >Akhir Penilaian : </b><b class="text-danger" id="demo7">  ... </b>
							</div>
						</div>
					</div>
				</div>


				<!-- jika sudah menilai anggota tim-->

			<?php }


			else { ?>

				<div class="row  justify-content-md-center">
					<div class="col-md-7">
						<div class="card text-center mt-3 border-bottom-info shadow">
							<div class="card-body">
								<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 10%;">
								<h6 class="card-title font-weight-bold mt-5 mb-3">Terimakasih sudah memberikan penilaian,<br> Data penilaian sudah kami rekam!</h6>
							</div>
							<div class="card-footer">
								<b >Akhir Penilaian : </b><b class="text-danger" id="demo7">  ... </b>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } 


		elseif ( strtotime($now) > strtotime($kegiatan_berlangsung['akhir_penilaian'])) 
			{?>
				<div class="row  justify-content-md-center">
					<div class="col-md-7">
						<div class="card text-center mt-3 border-bottom-info shadow">
							<div class="card-body">
								<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 10%;">
								<h6 class="card-title font-weight-bold mt-5 mb-3">Jadwal penilaian sudah berlalu!</h6>
							</div>
							<div class="card-footer">
								<b >Terima kasih!</b>
							</div>
						</div>
					</div>
				</div>
			<?php }

			?>


		</div>
		<!-- /.container-fluid -->

	</div>
<!-- End of Main Content --->
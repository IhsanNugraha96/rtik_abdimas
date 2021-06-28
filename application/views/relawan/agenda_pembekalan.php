<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- Content Row -->


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tabel agenda kegiatan pembekalan "RTIKAbdimas"</h6>

			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 10%;">No</th>
							<th>Pelaksanaan</th>
							<th>Instruktur</th>
							<th>Keterangan</th>
							<th style="width: 15%;">Aksi</th> 
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php foreach ($agenda_pembekalan as $kgt) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i; ?></th>

								<?php if (strtotime($kgt['waktu_pelaksanaan']) >= strtotime(date('Y-m-d G:i:s'))) {
									echo "<td class='text-info font-weight-bold small'> Tanggal : ";
								} else {
									echo "<td class='text-danger font-weight-bold small'>Tanggal : ";
								} ?>
								<?= substr($kgt['waktu_pelaksanaan'], 8, 2).'-'.substr($kgt['waktu_pelaksanaan'], 5, 2).'-'.substr($kgt['waktu_pelaksanaan'], 0, 4).'<br> Pukul : '.substr($kgt['waktu_pelaksanaan'], 11, 5).' WIB' ?><br>
								<?php if (strtotime(date('Y-m-d G:i:s')) > strtotime($kgt['waktu_pelaksanaan'])+2*60*60) { echo"(Sudah Selesai)";}
                  					else {echo"(Segera Datang)";} ?>
								</td>
								<!-- <?= $kgt['waktu_pelaksanaan']; ?></td> -->

								<td><?= $kgt['nama']; ?></td>
								<td><?= $kgt['isi']; ?></td>
								<td>  
									<a href="" data-toggle="modal" data-target="#detail_event_<?= $kgt['id_pembekalan']?>" class="badge badge-success">detail event</i></a>
									<a href="<?= $kgt['link']?>" target="_blank" class="badge badge-info">link acara</i></a>
								</td>
							</tr>

							<?php $i++; ?>
						<?php } ?>


					</tbody>
				</table>
			</div>
		</div>
	</div>




	<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<!-- modal -->
<?php $i=0;
foreach ($agenda_pembekalan as $kgt) { ?>
	<div id="detail_event_<?= $kgt['id_pembekalan']?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%; margin-top: -5%;">
					<p><b>RTIKAbdimas</b></p>


					<h6 class="mt-4 mb-4">"<?= $kgt['isi']; ?>"</h6>
					<h6 class="font-weight-bold"><u>Instruktur</u></h6>
					<div class="row">
						<div class="col-4">
							<img class=" img-thumbnail mb-2 shadow" style="width: 90%;" src="<?= base_url('assets/img/instruktur/'.$kgt['image']) ?>">
							
						</div>
						<div class="col-8 text-left">
							<h6><?= $kgt['nama'] ?></h6>
							<p>Ttl     : <?= $kgt['tempat_lahir'].", ".$kgt['tgal_lahir']; ?></p>
							<p>No.hp   : <?= $kgt['no_hp']; ?></p>
							<p>Email   : <?= $kgt['email']; ?></p>
							<p>Profesi : <?= $kgt['profesi']; ?></p>
						</div>
					</div>

					<h6 class="mt-4">Jadwal : <?= substr($kgt['waktu_pelaksanaan'], 8, 2).'-'.substr($kgt['waktu_pelaksanaan'], 5, 2).'-'.substr($kgt['waktu_pelaksanaan'], 0, 4).'<br> pukul : '.substr($kgt['waktu_pelaksanaan'], 11, 5).' WIB' ?></h6>
					<h6 class="font-weight-bold"><a href="<?= $kgt['link_materi'] ?>" target="_blank">Link materi</a></h6>
					<h6 class="font-weight-bold"><a href="<?= $kgt['link'] ?>" target="_blank">Link acara</a></h6>
					

					
						
				</div>
			</div>
		</div>
	</div>
<?php $i++; } ?>
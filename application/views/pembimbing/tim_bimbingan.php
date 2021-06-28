<!-- Begin Page Content -->
<div class="container">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Data anggota</h1>
	<div class="row">
		<div class="col-lg-10">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>


	<!-- Content Row -->
	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-2">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-1 font-weight-bold text-primary">Tabel data tim </h6>
				<div>
					
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 5%;">No</th>
							<th>Nama Tim</th>
							<th>Ketua Tim</th>
							<th>Asal Pangkalan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($tim_pembimbing as $tim) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td><?= $tim['nama_tim'] ?></td> 
								<td><?= $tim['nama_lengkap'] ?></td>   
								<td><?= $tim['nama_komisariat']; ?></td>  

								<td scope="row">
									<a href="<?= base_url('pembimbing/tim/').$tim['id_tim']; ?>" name="detail" class="badge badge-primary">detail</i></a>
									<a href="" class="badge badge-info" data-toggle="modal" data-target="#berkas_tim_<?= $tim['id_tim']?>">berkas tim</a>
								</td>             
							</tr>
							<?php  $i++; 
						} ?>

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

<?php $i = 0; foreach ($tim_pembimbing as $tim): ?>
<div id="berkas_tim_<?=$tim['id_tim'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
	<div class="modal-dialog">
		<div class="modal-content shadow">
			<div class="modal-close-area modal-close-df">
				<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
			</div>
			<div class="modal-body">

				<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
				<h5 class="font-weight-bold mb-5">Berkas Tim <?=$tim['nama_tim'];?></h5>

				<table class="text-left table no-border bg-white" width="100%" cellspacing="0" > 
					<tr valign="top">
						<td>Surat Pengantar </td>
						<td> : </td>
						<td>
							<a href=<?php if($tim['surat_pengantar'] != '-')
								{ echo '"'.$tim['surat_pengantar'].'" target="_blank"';} 
								else{ echo '"'.base_url('pembimbing/lihat_berkas/surat_pengantar/'.$tim['surat_pengantar']).'"';} ?> > Lihat berkas surat pengantar
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Survey Permintaan </td>
						<td> : </td>
						<td>
							<a href=<?php if($tim['survey_permintaan'] != '-')
								{ echo '"'.$tim['survey_permintaan'].'" target="_blank"';} 
								else{ echo '"'.base_url('pembimbing/lihat_berkas/survey_permintaan/'.$tim['survey_permintaan']).'"';} ?> > Lihat berkas survey permintaan
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Surat Konfirmasi </td>
						<td> : </td>
						<td>
							<a href=<?php if($tim['surat_konfirmasi'] != '-')
								{ echo '"'.$tim['surat_konfirmasi'].'" target="_blank"';} 
								else{ echo '"'.base_url('pembimbing/lihat_berkas/surat_konfirmasi/'.$tim['surat_konfirmasi']).'"';} ?> > Lihat berkas surat konfirmasi
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Presensi Pelayanan </td>
						<td> : </td>
						<td>
							<a href=<?php if($tim['presensi_pelayanan'] != '-')
								{ echo '"'.$tim['presensi_pelayanan'].'" target="_blank"';} 
								else{ echo '"'.base_url('pembimbing/lihat_berkas/presensi_pelayanan/'.$tim['presensi_pelayanan']).'"';} ?> > Lihat berkas presensi pelayanan
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Berita Acara </td>
						<td> : </td>
						<td>
							<a href=<?php if($tim['berita_Acara'] != '-')
								{ echo '"'.$tim['berita_Acara'].'" target="_blank"';} 
								else{ echo '"'.base_url('pembimbing/lihat_berkas/berita_acara/'.$tim['berita_Acara']).'"';} ?> > Lihat berkas berita acara
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Artikel Berita </td>
						<td> : </td>
						<td><a href="<?= base_url('pembimbing/lihat_berkas/artikel_berita/'.$tim['id_tim']);?>"> Lihat artikel berita
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Artikel MIFTEK </td>
						<td> : </td>
						<td><a href=<?php if($tim['artikel_miftek'] != '-')
								{ echo '"'.$tim['artikel_miftek'].'" target="_blank"';} 
								else{ echo '"'.base_url('pembimbing/lihat_berkas/artikel_miftek/'.$tim['artikel_miftek']).'"';} ?> > Lihat berkas artikel MIFTEK
							</a>
						</td>
					</tr>
				</table>
				<hr>
			</div>
		</div>
	</div>
</div>
<?php $i++; endforeach ?>
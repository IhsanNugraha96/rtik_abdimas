<!-- Begin Page Content  -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Daftar pengajuan pangkalan</h1>
	<div class="row justify-content-md-left mb-3">
		<div class="col-md-10 col-sm-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<!-- Content Row -->

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tabel data pangkalan </h6>
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
							<th width="20%">Logo</th>
							<th>Nama Pangkalan</th>
							<th>Email</th>
							<th>Informasi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($pengajuan_komisariat as $kms) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td><img src="<?= base_url('assets/img/komisariat/').$kms['logo']; ?>" style="width: 50%;"></td>
								<td><?= $kms['nama_komisariat'] ?></td>   
								<th scope="row"><?= $kms['email']; ?></th>  
								<td><?= $kms['type'].'. '.$kms['nama_kota'].',<br>Provinsi. '.$kms['nama_provinsi']; ?></td>        
								<td scope="row">
									<a href="" class="badge badge-info" data-toggle="modal" data-target="#detail_komisariat_<?=$kms['id_komisariat'];?>">detail</i></a><br>
									<a href="" class="badge badge-primary" data-toggle="modal" data-target="#acc_komisariat_<?=$kms['id_komisariat'];?>">terima</i></a><br>
									<a href="" class="badge badge-danger" data-toggle="modal" data-target="#tolak_komisariat_<?=$kms['id_komisariat'];?>">tolak</i></a>
								</td>

							</tr>
							<?php  $i++; } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>




		<!-- /Content Row -->

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content --->

<?php $i=0; ?>
<?php foreach ($pengajuan_komisariat as $kms) { ?>
	<div id="detail_komisariat_<?=$kms['id_komisariat'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img src="<?= base_url('assets/img/komisariat/').$kms['logo']; ?>" style="width: 20%;" class="mb-3">
					<h5><?= $kms['nama_komisariat']; ?></h5><hr>

					<h6 class="font-weight-bold">Ketua Pangkalan</h6>
					<img class="img-thumbnail mb-1" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/komisariat/ketua/'.$kms['foto_ketua']) ?>">
					<p><?= $kms['ketua']; ?></p>
					<table class="text-left">                    
						<tr>
							<td valign=top>Email</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $kms['email']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Kontak</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $kms['kontak']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Surat Komitmen</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><a href="<?= $kms['surat_komitmen']; ?>" target="_blank"> Lihat surat komitmen</a></td>
						</tr>
						<tr>
							<td valign='top'>Surat Tugas</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><a href="<?= $kms['surat_tugas']; ?>" target="_blank"> Lihat surat tugas</a></td>
						</tr>
						<tr>
							<td valign='top'>Alamat</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $kms['type'].'. '.$kms['nama_kota'].',<br>Provinsi. '.$kms['nama_provinsi']; ?></td>
						</tr>
					</table>
					
				</div>
			</div>
		</div>
	</div>
	<?php  $i++; } ?>



	<?php $j=0; ?>
	<?php foreach ($pengajuan_komisariat as $kms) { ?>
		<div id="acc_komisariat_<?=$kms['id_komisariat'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
			<div class="modal-dialog">
				<div class="modal-content shadow">
					<div class="modal-close-area modal-close-df">
						<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
					</div>
					<div class="modal-body">
						<img src="<?= base_url('assets/img/komisariat/').$kms['logo']; ?>" style="width: 20%;" class="mb-3">
						<h6>Terima pengajuan pangkalan dari</h6>
						<h5><?= $kms['nama_komisariat']; ?>?</h5>		
					</div>
					<div class="modal-footer" style="margin-top: -10%;">
						<a href="<?= base_url('Admin/pengajuan_pangkalan/acc/'.urlencode($kms['id_komisariat'])); ?>" class="badge badge-primary badge-sm">Terima</a>
					</div>
				</div>
			</div>
		</div>
		<?php  $j++; } ?>


<?php $j=0; ?>
	<?php foreach ($pengajuan_komisariat as $kms) { ?>
		<div id="tolak_komisariat_<?=$kms['id_komisariat'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
			<div class="modal-dialog">
				<div class="modal-content shadow">
					<div class="modal-close-area modal-close-df">
						<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
					</div>
					<div class="modal-body">
						<img src="<?= base_url('assets/img/komisariat/').$kms['logo']; ?>" style="width: 20%;" class="mb-3">
						<h6>Tolak pengajuan pangkalan dari</h6>
						<h5><?= $kms['nama_komisariat']; ?>?</h5>		
					</div>
					<div class="modal-footer" style="margin-top: -10%;">
						<a href="<?= base_url('Admin/pengajuan_pangkalan/tolak/'.urlencode($kms['id_komisariat'])); ?>" class="badge badge-primary badge-sm">Tolak</a>
					</div>
				</div>
			</div>
		</div>
		<?php  $j++; } ?>
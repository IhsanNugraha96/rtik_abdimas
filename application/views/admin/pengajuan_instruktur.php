<!-- Begin Page Content  -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Daftar pengajuan instruktur</h1>
	<div class="row justify-content-md-left mb-3">
		<div class="col-md-10 col-sm-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<!-- Content Row -->

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tabel data pengajuan instruktur </h6>
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
							<th width="20%">Foto</th>
							<th>Nama</th>
							<th>Kontak</th>
							<th>Profesi</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($pengajuan_instruktur as $ins) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td>
									<img class="img-profile" src="<?= base_url('assets/img/instruktur/'.$ins['image']) ?>" style="width: 50%;">
		                           
		                        </td>
								<td><?= $ins['nama'] ?></td>   
	                          	<td scope="row">Email (<?= $ins['email']; ?>) <br> Handphone (<?= $ins['no_hp']; ?>)</td>
	                          	<td><?= $ins['profesi']; ?></td>  
	                          	<td><?= $ins['type'].'. '.$ins['nama_kota'].',<br>Provinsi. '.$ins['nama_provinsi']; ?></td>        
								<td scope="row">
									<a href="" class="badge badge-info" data-toggle="modal" data-target="#detail_instruktur_<?=$ins['id_instruktur'];?>">detail</i></a><br>
									<a href="" class="badge badge-primary" data-toggle="modal" data-target="#acc_instruktur_<?=$ins['id_instruktur'];?>">terima</i></a><br>
									<a href="" class="badge badge-danger" data-toggle="modal" data-target="#tolak_instruktur_<?=$ins['id_instruktur'];?>">tolak</i></a>
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
<?php foreach ($pengajuan_instruktur as $ins) { ?>
	<div id="detail_instruktur_<?=$ins['id_instruktur'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile mb-3" src="<?= base_url('assets/img/instruktur/'.$ins['image']) ?>" style="width: 30%;">
		            
					<h5><?= $ins['nama']; ?></h5><hr>

					<table class="text-left">                    
						<tr>
							<td valign=top>TTL</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $ins['tempat_lahir'].", ".$ins['tgal_lahir']; ?></td>
						</tr>
						<tr>
							<td valign=top>Jenis Kelamin</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'>
								<?php if ($ins['jenis_kelamin'] == '0') { echo "Laki-laki";}
								else{ echo "Perempuan";}?>
							</td>
						</tr>
						<tr>
							<td valign=top>Email</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $ins['email']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Kontak</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $ins['no_hp']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Profesi</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $ins['profesi']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Alamat</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $ins['type'].'. '.$ins['nama_kota'].',<br>Provinsi. '.$ins['nama_provinsi']; ?></td>
						</tr>
					</table>
					
				</div>
			</div>
		</div>
	</div>
	<?php  $i++; } ?>



	<?php $j=0; ?>
	<?php foreach ($pengajuan_instruktur as $ins) { ?>
		<div id="acc_instruktur_<?=$ins['id_instruktur'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
			<div class="modal-dialog">
				<div class="modal-content shadow">
					<div class="modal-close-area modal-close-df">
						<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
					</div>
					<div class="modal-body">
						<img class="img-profile mb-3" src="<?= base_url('assets/img/instruktur/'.$ins['image']) ?>" style="width: 20%;">
			           
						<h6>Terima pengajuan dari</h6>
						<h5><?= $ins['nama']; ?>?</h5>		
					</div>
					<div class="modal-footer" style="margin-top: -10%;">
						<a href="<?= base_url('admin/aksi_pengajuan_instruktur/acc/'.urlencode($ins['email']).'/'.urlencode($ins['id_instruktur'])); ?>" class="badge badge-primary badge-sm">Terima</a>
					</div>
				</div>
			</div>
		</div>
		<?php  $j++; } ?>


<?php $j=0; ?>
	<?php foreach ($pengajuan_instruktur as $ins) { ?>
		<div id="tolak_instruktur_<?=$ins['id_instruktur'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
			<div class="modal-dialog">
				<div class="modal-content shadow">
					<div class="modal-close-area modal-close-df">
						<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
					</div>
					<div class="modal-body">
						<img class="img-profile mb-3" src="<?= base_url('assets/img/instruktur/'.$ins['image']) ?>" style="width: 20%;">
			           
			            <h6>Tolak pengajuan dari</h6>
						<h5><?= $ins['nama']; ?>?</h5>		
					</div>
					<div class="modal-footer" style="margin-top: -10%;">
						<a href="<?= base_url('admin/aksi_pengajuan_instruktur/tolak/'.urlencode($ins['email']).'/'.urlencode($ins['id_instruktur'])); ?>" class="badge badge-warning badge-sm">Tolak</a>
					</div>
				</div>
			</div>
		</div>
		<?php  $j++; } ?>
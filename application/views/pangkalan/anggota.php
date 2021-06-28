<!-- Begin Page Content -->
<div class="container-fluid">

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
				<h6 class="m-0 font-weight-bold text-primary">Tabel data anggota </h6>
				<div>
					<a href="<?= base_url('pangkalan/pengajuan_anggota') ?>" class="d-sm-inline-block btn btn-sm btn-info shadow-sm">Pengajuan anggota <?php if ($jml_pengajuan_anggota) {?><div class="badge bg-danger text-light">  <?= $jml_pengajuan_anggota; ?> </div> <?php } ?></a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 5%;">No</th>
							<th width="15%">Image</th>
							<th>Nama Anggota</th>
							<th>Pekerjaan</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($anggota as $agt) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td>
									<img class="img-profile" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>" style="width: 50%;">
								</td>
								<td><?= $agt['nama_lengkap'] ?></td>   
								<td><?= $agt['pekerjaan']; ?></td>  
								<td>
									<?php if ($agt['kota'] != '-') 
									{
										echo $agt['alamat_lengkap'].', Kec.'.$agt['kecamatan'].', '.$alamat_anggota[$i]['type'].'. '.$alamat_anggota[$i]['nama_kota'].',<br>Provinsi. '.$alamat_anggota[$i]['nama_provinsi'];
									} 
									else 
									{
										echo $agt['kota'];
									}?>
								</td>        
								<td scope="row">
									<a href="" name="detail" class="badge badge-info" data-toggle="modal" data-target="#detail_anggota_<?=$agt['id_relawan'];?>">detail</i></a>
									<a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_anggota_<?=$agt['id_relawan'];?>">hapus</i></a>
									<a href="" name="reset" class="badge badge-warning" data-toggle="modal" data-target="#reset_password_<?=$agt['id_relawan'];?>">reset password</i></a>
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



<!-- modal -->

<?php $i=0; ?>
<?php foreach ($anggota as $agt) { ?>
	<div id="detail_anggota_<?=$agt['id_relawan'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile mb-3" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>" style="width: 30%;">
					<h5><?= $agt['nama_lengkap']; ?></h5>
					<small>(mengikuti <?= $jml_ikut_event[$i].' '; ?>event)</small><hr>

					<table class="text-left mb-3">  
						<tr>
							<td valign=top>NIK</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $agt['nik']; ?></td>
						</tr>                  
						<tr>
							<td valign=top>TTL</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $agt['tempat_lahir'].', '.substr($agt['tgl_lahir'], 8, 2).'-'.substr($agt['tgl_lahir'], 5, 2).'-'.substr($agt['tgl_lahir'], 0, 4); ?></td>
						</tr>
						<tr>
							<td valign=top>Jenis Kelamin</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'>
								<?= $agt['jenis_kelamin'] ?>
							</td>
						</tr>
						<tr>
							<td valign=top>Email</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $agt['email']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Kontak</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $agt['no_hp']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Pendidikan Terakhir</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $agt['pendidikan_terakhir']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Alamat</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'>
								<?php if ($agt['kota'] != '-') 
								{
									echo $agt['alamat_lengkap'].', Kec.'.$agt['kecamatan'].', '.$alamat_anggota[$i]['type'].'. '.$alamat_anggota[$i]['nama_kota'].',<br>Provinsi. '.$alamat_anggota[$i]['nama_provinsi'];
								} 
								else 
								{
									echo $agt['kota'];
								}?>

							</td>
						</tr>
						<tr>
							<td valign='top'>Pekerjaan</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $agt['pekerjaan']; ?></td>
						</tr>
						<tr>
							<td colspan="3"><hr></td>
						</tr>
						<tr>
							<td valign='top'>Keahlian</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?php foreach ($keahlian_anggota[$i] as $keahlian) 
								{
									echo $keahlian['nama_keahlian'].'<br>';
								}?>
							</td>
						</tr>
						<tr>
							<td colspan="3" class="text-center">
							<hr>
								<img class="img-profile mb-3" src="<?= base_url('assets/img/relawan/id_card/'.$agt['id_card']) ?>" style="width: 60%;">
							</td>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</div>
	<?php  $i++; 
} ?>



<?php $i=0; ?>
<?php foreach ($anggota as $agt) { ?>
	<div id="hapus_anggota_<?=$agt['id_relawan'];?>" class="modal modal-edu-general FullColor-popup-DangerModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile mb-2" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>" style="width: 20%;">
					<h5><?= $agt['nama_lengkap']; ?></h5>
					<h6>Hapus anggota dari daftar anggota?</h6>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('pangkalan/hapusanggota/'.urlencode($agt['id_relawan'])); ?>" class="badge badge-danger badge-sm">hapus</a>
				</div>
			</div>
		</div>
	</div>
	<?php  $i++; 
} ?>



<?php $i=0; ?>
<?php foreach ($anggota as $agt) { ?>
	<div id="reset_password_<?=$agt['id_relawan'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile mb-2" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>" style="width: 20%;">
					<h5><?= $agt['nama_lengkap']; ?></h5>
					<h6>Reset password akun anggota?</h6>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('pangkalan/reset_password_anggota/'.urlencode($agt['id_relawan'])); ?>" class="badge badge-warning badge-sm">reset</a>
				</div>
			</div>
		</div>
	</div>
	<?php  $i++; 
} ?>
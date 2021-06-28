<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Data Pembimbing</h1>
	<div class="row">
		<div class="col-lg-10">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>


	<!-- Content Row -->
	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-2">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tabel data Pembimbing </h6>
				<div>
					<a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#tambah_pembimbing">Tambah Pembimbing</a>
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
							<th>Nama Pembimbing</th>
							<th>Profesi</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($pembimbing as $pmb) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td>
									<img class="img-profile" src="<?= base_url('assets/img/pembimbing/'.$pmb['image']) ?>" style="width: 50%;">
								</td>
								<td><?= $pmb['nama'] ?></td>   
								<td><?= $pmb['jabatan']; ?></td>  
								<td align="left">
									<?php if ($pmb['id_kota'] == '-' || $pmb['id_kota'] == '') 
									{
										echo $pmb['id_kota'];
									} 
									else 
									{
										echo $pmb['alamat_rumah'].', Kec.'.$pmb['kecamatan'].', '.$alamat_pembimbing[$i]['type'].'. '.$alamat_pembimbing[$i]['nama_kota'].',<br>Provinsi. '.$alamat_pembimbing[$i]['nama_provinsi']; 
									}?>
								</td>        
								<td scope="row">
									<a href="" name="detail" class="badge badge-info" data-toggle="modal" data-target="#detail_pembimbing_<?=$pmb['id_pembimbing'];?>">detail</i></a>
									<a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_pembimbing_<?=$pmb['id_pembimbing'];?>">hapus</i></a><br>
									<a href="" name="reset" class="badge badge-warning" data-toggle="modal" data-target="#reset_password_<?=$pmb['id_pembimbing'];?>">reset password</i></a>
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

<div id="tambah_pembimbing" class="modal modal-edu-general  Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
	<div class="modal-dialog">
		<div class="modal-content shadow">
			<div class="modal-close-area modal-close-df">
				<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
			</div>
			<div class="modal-body">
				<h5>Tambah Pembimbing</h5>

				<form class="user was-validated mt-5" method="post" action="<?= base_url('pangkalan/tambah_pembimbing');?>" enctype="multipart/form-data">
					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="email" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi email pembimbing')" oninput="setCustomValidity('')" is_unique="pembimbing.email">

						<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
						<div class="invalid-feedback text-left">Isi email pembimbing.</div>
						<div class="valid-feedback text-left">Email pembimbing.</div>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="nama pembimbing" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi nama pembimbing')" oninput="setCustomValidity('')">

						<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
						<div class="invalid-feedback text-left">Isi nama pembimbing.</div>
						<div class="valid-feedback text-left">Nama pembimbing.</div>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="nik" name="nik" placeholder="nik pembimbing" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi nik pembimbing')" oninput="setCustomValidity('')">

						<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
						<div class="invalid-feedback text-left">Isi nik pembimbing.</div>
						<div class="valid-feedback text-left">NIK pembimbing.</div>
					</div>

					<div class="form-group">
	                    <select class="custom-select" id="provinsi" name="provinsi" required oninvalid="this.setCustomValidity('Anda belum memilih provinsi..')" oninput="setCustomValidity('')">
	                   
	                    </select>
	                    <!-- menampilkan notifikasi kesalahan inputan -->
	                    <div class="invalid-feedback text-left">Pilih provinsi.</div>
						<div class="valid-feedback text-left">Provinsi.</div>
					</div>
					<div class="form-group">
	                    
	                    <!-- <?= $alamat_pembimbing['id_provinsi'].' - '.$alamat_pembimbing['id_kota'];?> -->
	                    <select class="custom-select" id="kota" name="kota" required oninvalid="this.setCustomValidity('Anda belum memilih di kota mana anda tinggal..')" oninput="setCustomValidity('')" >
	                    </select>
                    
                    
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <div class="invalid-feedback text-left">Masukkan Kabupaten/Kota.</div>
					<div class="valid-feedback text-left">Kabupaten/Kota.</div>
                </div>
					
				
					<button type="submit" class="btn btn-primary btn-sm" align="right">Tambah</button>
				
				</form>
			</div>
		</div>
	</div>
</div>




<?php $i=0; ?>
<?php foreach ($pembimbing as $pmb) { ?>
	<div id="detail_pembimbing_<?=$pmb['id_pembimbing'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile mb-3" src="<?= base_url('assets/img/pembimbing/'.$pmb['image']) ?>" style="width: 30%;">
					<h5><?= $pmb['nama']; ?></h5><hr>

					<table class="text-left mb-3">  
						<tr>
							<td valign=top>NIK</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $pmb['nik']; ?></td>
						</tr>                  
						<tr>
							<td valign=top>Tanggal lahir</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $pmb['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<td valign=top>Jenis Kelamin</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'>
								<?= $pmb['jenis_kelamin']; ?>
							</td>
						</tr>
						<tr>
							<td valign=top>Email</td>
							<td width="5%" valign=top>:</td>
							<td valign='top'><?= $pmb['email']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Kontak</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $pmb['no_telp']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Sektor pekerjaan</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $pmb['sektor_pekerjaan']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Jabatan</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?= $pmb['jabatan']; ?></td>
						</tr>
						<tr>
							<td valign='top'>Alamat</td>
							<td width="5%" valign='top'>:</td>
							<td valign='top'><?php if ($pmb['id_kota'] == '-' || $pmb['id_kota'] == '') 
									{
										echo $pmb['id_kota'];
									} 
									else 
									{
										echo $pmb['alamat_rumah'].', Kec.'.$pmb['kecamatan'].', '.$alamat_pembimbing[$i]['type'].'. '.$alamat_pembimbing[$i]['nama_kota'].',<br>Provinsi. '.$alamat_pembimbing[$i]['nama_provinsi']; 
									}?>

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
<?php foreach ($pembimbing as $pmb) { ?>
	<div id="hapus_pembimbing_<?=$pmb['id_pembimbing'];?>" class="modal modal-edu-general FullColor-popup-DangerModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile mb-2" src="<?= base_url('assets/img/pembimbing/'.$pmb['image']) ?>" style="width: 20%;">
					<h5><?= $pmb['nama']; ?></h5>
					<h6>Hapus pembimbing dari daftar pembimbing?</h6>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('pangkalan/hapuspembimbing/'.urlencode($pmb['id_pembimbing'])); ?>" class="badge badge-danger badge-sm">hapus</a>
				</div>
			</div>
		</div>
	</div>
	<?php  $i++; 
} ?>



<?php $i=0; ?>
<?php foreach ($pembimbing as $pmb) { ?>
	<div id="reset_password_<?=$pmb['id_pembimbing'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile mb-2" src="<?= base_url('assets/img/pembimbing/'.$pmb['image']) ?>" style="width: 20%;">
					<h5><?= $pmb['nama']; ?></h5>
					<h6>Reset password akun pembimbing?</h6>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('pangkalan/reset_password_pembimbing/'.urlencode($pmb['id_pembimbing'])); ?>" class="badge badge-warning badge-sm">reset</a>
				</div>
			</div>
		</div>
	</div>
	<?php  $i++; 
} ?>
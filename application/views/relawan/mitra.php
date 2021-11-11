<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<!-- Content Row -->

	<?php if (!$mitra) { ?>

		<div class="card shadow"  style="border: none; margin: 2vh 2% 2vh 2%; ">
			<h5 class="mt-3 text-center">Mitra Penerima Manfaat</h5>
			<div class="card-body text-center">
				<i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
				<?php if ($data_di_tim['status_pengajuan'] == '4') {?>
					<p class="text-danger">Anda belum menambahkan mitra!</p>
					<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalTambahMitra">Tambah Mitra</a>
				<?php } elseif ($data_di_tim['status_pengajuan'] == '3') {?>
					<p class="text-danger">Ketua tim belum menambahkan mitra!</p>
				<?php }?>
			</div>
 
		</div>
	<?php } elseif ($mitra) {?>
		<div class="row mb-5">
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="single-cards-item text-center shadow">
					<div class="img-fluid">
						<img src="<?= base_url('assets/img/logo/background1.jpg') ?>" style="width: 100%; height: 20%;" alt="background profil">
					</div>
					<div class="single-product-text" style="padding-bottom: 10%;">
						<a href="" data-toggle="modal" data-target="#lihat_foto"><img class="rounded-profil rounded-circle img-thumbnail mb-3" src="<?= base_url('assets/img/mitra/'.$mitra['logo']) ?>"></a>
								<h4><b><?= $mitra['nama_mitra']; ?></b></h4>
								<h6>Email koordinator : <b><?= $mitra['email_koordinator']; ?></b></h6>	

								<a href="" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#ModalTambahMitra"> 
									Ubah mitra
								</a>
								<a href="<?= base_url('Relawan/unggah_berkas/reset_password/'.urlencode($mitra['email_koordinator']))?>" class="btn btn-warning btn-sm shadow text-light  mt-2">Reset password</a>
							</div>
						</div>
					</div>


					<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">

						<div class="table-responsive shadow">
							<table class="table no-border bg-white" id="dataTable" width="100%" cellspacing="0">
								<tbody>
									<tr>
										<td style="width: 25%;">Nama mitra </td>
										<td> : </td>
										<td><?= $mitra['nama_mitra']; ?></td>
									</tr>
									<tr>
										<td>Kategori mitra </td>
										<td> : </td>
										<td><?= $mitra['nama_cluster']; ?></td>
									</tr>
									<tr>
										<td>Alamat </td>
										<td> : </td>
										<td><?= $mitra['alamat'].", ".$mitra['type'].". ".$mitra['nama_kota']." - ".$mitra['nama_provinsi']; ?></td>
									</tr>
									<tr>
										<td>Titik koordinat G-map </td>
										<td> : </td>
										<td><?= $mitra['titik_koordinat']; ?></td>
									</tr>
									<tr>
										<td>situs web </td>
										<td> : </td>
										<td><?= $mitra['situs_web']; ?></td>
									</tr>
									<tr>
										<td>Profil ringkas </td>
										<td> : </td>
										<td><?= $mitra['profil_ringkas']; ?></td>
									</tr>
									<tr>
										<td>Jenis layanan </td>
										<td> : </td>
										<td><?= $mitra['jenis_layanan']; ?></td>
									</tr>
									<tr>
										<td>Pimpinan </td>
										<td> : </td>
										
									</tr>
									<tr>
										<td>Nama </td>
										<td> : </td>
										<td><?= $mitra['pimpinan']; ?></td>
									</tr>
									<tr>
										<td>Jabatan </td>
										<td> : </td>
										<td><?= $mitra['jabatan_pimpinan']; ?></td>
									</tr>
									<tr>
										<td>Kontak </td>
										<td> : </td>
										<td><?= $mitra['no_hp_pimpinan']; ?></td>
									</tr>
									<tr>
										<td>Email </td>
										<td> : </td>
										<td><?= $mitra['email_pimpinan']; ?></td>
									</tr>
									<tr>
										<td>Koordinator </td>
										<td> : </td>
										
									</tr>
									<tr>
										<td>Nama </td>
										<td> : </td>
										<td><?= $mitra['koordinator']; ?></td>
									</tr>
									<tr>
										<td>Jabatan </td>
										<td> : </td>
										<td><?= $mitra['jabatan_koordinator']; ?></td>
									</tr>
									<tr>
										<td>Kontak </td>
										<td> : </td>
										<td><?= $mitra['no_hp_koordinator']; ?></td>
									</tr>
									<tr>
										<td>Email </td>
										<td> : </td>
										<td><?= $mitra['email_koordinator']; ?></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				<?php } else { ?>
					<div class="row mb-5">
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="single-cards-item text-center shadow">
								<div class="img-fluid">
									<img src="<?= base_url('assets/img/logo/background1.jpg') ?>" style="width: 100%; height: 20%;" alt="background profil">
								</div>
								<div class="single-product-text" style="padding-bottom: 10%;">
									<a href="" data-toggle="modal" data-target="#lihat_foto"> 
										<img class="rounded-profil img-thumbnail mb-3" src="<?= base_url('assets/img/relawan/image/default_image.jpg') ?>">
									</a>

									<h6 class="mt-4"><b>Status pengajuan mitra :</b></h6>
									<button class="btn btn-outline-danger font-weight-bold shadow small"> Ketua tim belum mengajukan</button>       
								</div>
							</div>
						</div>
					</div>
				<?php } ?>


				<!-- End of Content Row -->


			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

		<!-- modal -->

		<div id="ModalTambahMitra" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
			<div class="modal-dialog">
				<div class="modal-content shadow">
					<div class="modal-close-area modal-close-df">
						<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
					</div>
					<div class="modal-body">
						<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
						<p><b>RTIKAbdimas</b></p>
						<!-- form -->
						<form class="user was-validated" method="post" 
							<?php if (!$mitra){ ?>
								action="<?= base_url('Relawan/unggah_berkas/akun_mitra/'.urlencode($tim['id_tim']));?>"
							<?php } elseif ($mitra) {?>
								action="<?= base_url('Relawan/unggah_berkas/update_akun_mitra/'.urlencode($mitra['id_mitra']));?>"
							<?php } ?>
						>
							<div class="form-group mt-3">
								<input type="email" class="custom-text-input form-control" id="email" name="email" oninvalid="this.setCustomValidity('Anda belum mengisi email mitra..')" oninput="setCustomValidity('')" 
								placeholder="<?php if(!$mitra) { echo "email mitra";} else {echo $mitra['email_koordinator'];}?>" 
								value="<?php if(!$mitra) { echo "";} else {echo $mitra['email_koordinator'];}?>" 
								required="" maxlength="125" >


								<div class="invalid-feedback text-left">masukkan alamat email mitra</div>
								<div class="valid-feedback text-left">email mitra</div>
							</div> 

							<div class="form-group">	
								<input type="text" class="custom-text-input form-control" id="nama" name="nama" oninvalid="this.setCustomValidity('Anda belum mengisi nama mitra..')" oninput="setCustomValidity('')" 
								placeholder="<?php if(!$mitra) { echo "nama mitra";} else {echo $mitra['nama_mitra'];}?>" 
								value="<?php if(!$mitra) { echo "";} else {echo $mitra['nama_mitra'];}?>" 
								required="" maxlength="125" >


								<div class="invalid-feedback text-left">masukkan nama mitra</div>
								<div class="valid-feedback text-left">nama mitra</div>
							</div>
							<!-- <?php print_r($mitra); ?> -->
							<div class="form-group">
								<select class="custom-select" id="jenis_mitra" name="jenis_mitra" required oninvalid="this.setCustomValidity('Anda belum memilih jenis lembaga..')" oninput="setCustomValidity('')">

									<option value="">--Pilih jenis mitra--</option>
									<?php foreach ($cluster as $cls) {?>
										<option value="<?= $cls['id_cluster']; ?>" <?php if ($mitra) { if ($mitra['id_cluster'] == $cls['id_cluster']) { echo"selected";}}?>> <?= $cls['nama_cluster']; ?></option>
									<?php } ?>

								</select>	

								<div class="invalid-feedback text-left">pilih jenis mitra</div>
								<div class="valid-feedback text-left">jenis mitra</div>
							</div>

							<div class="form-group">	
								 <select class="custom-select" id="provinsi" name="provinsi" oninvalid="this.setCustomValidity('Anda belum memilih provinsi..')" oninput="setCustomValidity('')" required>
				                  </select>
				                  <!-- menampilkan notifikasi kesalahan inputan -->
				                  <?= form_error('provinsi', '<small class="text-danger ">','</small>'); ?>
				                  <div class="invalid-feedback text-left">Pilih provinsi.</div>
				                  <div class="valid-feedback text-left">Provinsi</div>
							</div>

							<div class="form-group">
								<select class="custom-select" id="kota" name="kota" oninvalid="this.setCustomValidity('Anda belum memilih di kota mana anda tinggal..')" oninput="setCustomValidity('')" required>

									<?php if ($mitra) 
									{
										if ($relawan['provinsi'] == $distrik[0]['id_provinsi']) {
				                            echo "<option value=''>--Pilih Kabupaten/Kota--</option>";
				                            foreach ($distrik as $key => $distrik) 
				                            {                        
				                                echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
				                                if ($relawan['kota'] == $distrik['id_kota']) {
				                                    echo "selected";
				                                }
				                                echo ">";

				                                if ($distrik['type'] == 'Kabupaten') 
				                                {
				                                    echo "Kab".". ".$distrik['nama_kota'];
				                                } 
				                                else{
				                                    echo $distrik['type'].". ".$distrik['nama_kota']; 
				                                }
				                                echo "</option>";
				                            };
				                        }
			                        } ?>

				                  </select>
				                  <!-- menampilkan notifikasi kesalahan inputan -->
				                  <?= form_error('kota', '<small class="text-danger ">','</small>'); ?>
				                  <div class="invalid-feedback text-left">Masukkan Kabupaten/Kota.</div>
				                  <div class="valid-feedback text-left">Kabupaten/Kota</div>
							</div>


							<div class="form-group">	
								<input type="text" class="custom-text-input form-control" id="alamat" name="alamat" oninvalid="this.setCustomValidity('Anda belum mengisi alamat mitra..')" oninput="setCustomValidity('')" 
								placeholder="<?php if(!$mitra) { echo "alamat mitra";} else {echo $mitra['alamat'];}?>" 
								value="<?php if(!$mitra) { echo "";} else {echo $mitra['alamat'];}?>" 
								required="" >


								<div class="invalid-feedback text-left">masukkan alamat mitra</div>
								<div class="valid-feedback text-left">alamat mitra</div>
							</div>

							<div class="form-group">
								<select class="custom-select" id="jenis_pelayanan" name="jenis_pelayanan" oninvalid="this.setCustomValidity('Anda belum memilih jenis pelayanan untuk mitra..')" oninput="setCustomValidity('')" required>
									<option value="">--Pilih jenis pelayanan--</option>
									<option value="Layanan Pengguna" 
										<?php if ($mitra) 
										{
											if ($mitra['jenis_layanan'] == 'Layanan Pengguna') 
												{echo "selected";}
										}?> 
									>
										Layanan Pengguna
									</option>
									<option value="Layanan Informasi"
										<?php if ($mitra) 
										{
											if ($mitra['jenis_layanan'] == 'Layanan Informasi') 
												{echo "selected";}
										}?> 
									>
										Layanan Informasi
									</option>
									<option value="Layanan Perangkat"
										<?php if ($mitra) 
										{if ($mitra['jenis_layanan'] == 'Layanan Perangkat') {echo "selected";}}?> >
										Layanan Perangkat
									</option>
				                  </select> 
				                  <!-- menampilkan notifikasi kesalahan inputan -->
				                  <?= form_error('jenis_pelayanan', '<small class="text-danger ">','</small>'); ?>
				                  <div class="invalid-feedback text-left">Pilih jenis pelayanan.</div>
				                  <div class="valid-feedback text-left">Jenis pelayanan</div>
							</div>

							<!-- akhir form -->
						</div>
						<div class="card-footer text-right">
							<?php if (!$mitra) {?>
								<button type="submit" class="btn btn-primary btn-sm shadow text-light" >Buat akun mitra</button>
							<?php } else {?>
								<button type="submit" class="btn btn-primary btn-sm shadow text-light" >Simpan perubahan</button>
								
							<?php } ?> 
						</div>             
					</form>
				</div>
			</div>
		</div>

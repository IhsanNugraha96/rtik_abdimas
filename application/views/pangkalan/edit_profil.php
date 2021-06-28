<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-10 ">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- Content Row -->

	<!-- update profil akun -->
	<section class="akun" id="akun">
		<h5 class="mt-3"><b>Informasi Akun</b></h5>
		<div class="row">
			<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
				<h6>Perbaharui profil akun<br> dan Alamat email </h6> 
			</div>


			<div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
				<div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
					<div class="card-body mt-3">
						<form class="user was-validated" method="post" action="<?= base_url('pangkalan/update_data/akun/').$pangkalan['id_komisariat']; ?>" enctype="multipart/form-data">
							<label for="Foto"><b>Photo</b></label><br>
							<img class="img-profile rounded-circle mb-3 shadow img-thumbnail" style="height: 110px; width: 110px;" alt="background profil" src="   <?= base_url('assets/img/komisariat/'.$pangkalan['logo']) ?>" class="rounded-circle"><br>
							
							<div class="form-group">
								<label for="foto" class="btn btn-outline-primary btn-sm shadow">Pilih Foto Profil</label>
								<a href="<?= base_url('pangkalan/update_data/hapus_foto/').$pangkalan['id_komisariat']; ?>" class="btn btn-outline-primary btn-sm shadow  mb-2">Hapus Foto Profil</a><br>

								<input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" value="Pilih Foto Profil" style="visibility:hidden;" onchange="this.form.submit();">
							</div>

							<div class="form-group" style="margin-right: 30%; margin-top: -5%;" >
								<label for="email"><b>Email</b></label>
								<input type="email" class="form-control is_invalid form-control-sm shadow" id="email" name="email" aria-describedby="email" placeholder="<?= $pangkalan['email']; ?>" value="<?= $pangkalan['email']; ?>" required>
								<div class="invalid-feedback">
									Email harus di isi.
								</div>            
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary btn-sm shadow" style="float: right;">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section> <hr>
	<!-- akhir update profil akun -->

	<!-- update profil biodata -->
	<section class="bio" id="bio">
		<h5 class="mt-5"><b>Informasi Biodata Pangkalan</b></h5>
		<div class="row">
			<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
				<h6>Perbaharui biodata pangkalan<br>Serta informasi lainnya </h6>
			</div>


			<div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
				<div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
					<div class="card-body mb-4">
						<form class="user was-validated" method="post" action="<?= base_url('pangkalan/update_data/biodata/').$pangkalan['id_komisariat']; ?>" enctype="multipart/form-data">

							<div class="form-group" style="margin-right: 30%;" >
								<label for="nama"><b>Nama Pangkalan</b></label>
								<input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" aria-describedby="nama" placeholder="<?= $pangkalan['nama_komisariat']; ?>" value="<?= $pangkalan['nama_komisariat']; ?>" required>
								<div class="invalid-feedback">
									Nama pangkalan harus di isi.
								</div>            
							</div>


							<div class="form-group" style="margin-right: 30%;">
								<label for="hp"><b>Kontak</b></label>
								<input type="text" class="form-control form-control-sm" id="kontak"  name="kontak" placeholder="<?= $pangkalan['kontak'] ?>" value="<?= $pangkalan['kontak'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi kontak yang bisa di hubungi..')" oninput="setCustomValidity('')">
								<!-- menampilkan notifikasi kesalahan inputan -->
								<?= form_error('kontak', '<small class="text-danger pl-3">','</small>'); ?>
								<div class="invalid-feedback">Masukkan kontak pangkalan yag bisa dihubungi.</div>
							</div>

							<div class="form-group" style="margin-right: 30%;">
								<label for="srt_komitmen"><b>Surat Komitmen</b></label>
								<input type="text" class="form-control form-control-sm" id="srt_komitmen"  name="srt_komitmen" placeholder="<?= $pangkalan['surat_komitmen'] ?>" value="<?= $pangkalan['surat_komitmen'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi link berkas surat komitmen pangkalan..')" oninput="setCustomValidity('')">
								<!-- menampilkan notifikasi kesalahan inputan -->
								<?= form_error('srt_komitmen', '<small class="text-danger pl-3">','</small>'); ?>
								<div class="invalid-feedback">Masukkan link surat komitmen berkas pangkalan yag bisa dihubungi.</div>
							</div>

							<div class="form-group" style="margin-right: 30%;">
								<label for="srt_tugas"><b>Surat Tugas</b></label>
								<input type="text" class="form-control form-control-sm" id="srt_tugas"  name="srt_tugas" placeholder="<?= $pangkalan['surat_tugas'] ?>" value="<?= $pangkalan['surat_tugas'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi link berkas surat tugas pangkalan..')" oninput="setCustomValidity('')">
								<!-- menampilkan notifikasi kesalahan inputan -->
								<?= form_error('srt_tugas', '<small class="text-danger pl-3">','</small>'); ?>
								<div class="invalid-feedback">Masukkan link surat tugas berkas pangkalan yag bisa dihubungi.</div>
							</div>

							<div class="form-group" style="margin-right: 30%;">
								<label for="provinsi"  ><b>Provinsi</b></label>
								<select class="custom-select custom-select-sm" id="provinsi" name="provinsi" required oninvalid="this.setCustomValidity('Anda belum memilih provinsi..')" oninput="setCustomValidity('')">
								</select>
								<!-- menampilkan notifikasi kesalahan inputan -->
								<div class="invalid-feedback">Pilih provinsi.</div>

								<label for="kota" class="mt-3"><b>Kabupaten</b></label>
								<select class="custom-select custom-select-sm" id="kota" name="kota" required oninvalid="this.setCustomValidity('Anda belum memilih di kota mana anda tinggal..')" oninput="setCustomValidity('')">
									 <?php if ($pangkalan['id_provinsi'] == $distrik[0]['id_provinsi']) 
				                        {	
				                            echo "<option value=''>--Pilih Kabupaten/Kota--</option>";
				                            foreach ($distrik as $distrik) 
				                            {                        
				                                echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
				                                if ($pangkalan['id_kota'] == $distrik['id_kota']) {
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
				                        } ?>

								</select>
								<!-- menampilkan notifikasi kesalahan inputan -->
								<div class="invalid-feedback">Pilih Kabupaten/Kota.</div>
							</div>


						</div>
						<div class="card-footer" style="margin-top: -6%;">
							<button type="submit" class="btn btn-primary btn-sm shadow" style="float: right;">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<hr>
	<!-- akhir update profil biodata -->



	<!-- update ketua -->
	<section class="ketua" id="ketua">
		<h5 class="mt-5"><b>Ubah Data Ketua</b></h5>
		<div class="row">
			<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
				<h6>Perbaharui data <br> untuk informasi ketua pangkalan</h6>
			</div>
			<div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
				<div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">

					<div class="card-body">
						<form class="user was-validated" method="post" action="<?= base_url('pangkalan/update_data/ketua/').$pangkalan['id_komisariat']; ?>" enctype="multipart/form-data">
							<label for="Foto"><b>Photo</b></label><br>
							<img class="img-profile rounded-circle mb-3 shadow img-thumbnail" style="height: 110px; width: 110px;" alt="background profil" src="   <?= base_url('assets/img/komisariat/ketua/'.$pangkalan['foto_ketua']) ?>" class="rounded-circle"><br>
							<div class="form-group">
								<label for="foto_ketua" class="btn btn-outline-primary btn-sm shadow">Pilih Foto Ketua</label>
								<a href="<?= base_url('pangkalan/update_data/hapus_foto_ketua/').$pangkalan['id_komisariat']; ?>" class="btn btn-outline-primary btn-sm shadow  mb-2">Hapus Foto Ketua</a><br>

								<input type="file" id="foto_ketua" name="foto_ketua" accept=".jpg,.jpeg,.png" value="Pilih Foto Profil" style="visibility:hidden;" onchange="this.form.submit();">
							</div>

							<div class="form-group" style="margin-right: 30%; margin-top: -5%;" >
								<label for="ketua"><b>Nama Ketua</b></label>
								<input type="text" class="form-control is_invalid form-control-sm shadow" id="ketua" name="ketua" aria-describedby="ketua" placeholder="<?= $pangkalan['ketua']; ?>" value="<?= $pangkalan['ketua']; ?>" required>
								<div class="invalid-feedback">
									Nama ketua harus di isi.
								</div>            
							</div>
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-primary btn-sm shadow" style="float: right;"> Simpan </button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<hr>
	<!-- akhir update password -->


	<!-- update password -->
	<section class="password" id="password">
		<h5 class="mt-5"><b>Ubah Password</b></h5>
		<div class="row">
			<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
				<h6>Perbaharui password <br> untuk keamanan</h6>
			</div>
			<div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
				<div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">

					<div class="card-body">
						<form class="user was-validated" method="post" action="<?= base_url('pangkalan/update_data/ubah_password/').$pangkalan['id_komisariat']; ?>">
							<div class="form-group mt-3" style="margin-right: 30%;" >
								<label for="passwordlama"><b>Password lama</b></label>
								<input type="password" class="form-control form-password form-control-sm" id="passwordlama" name="passwordlama" placeholder="Password lama" required oninvalid="this.setCustomValidity('Anda belum mengisi password lama untuk akun anda..')" oninput="setCustomValidity('')" minlength="8" maxlength="50">
								<!-- menampilkan notifikasi kesalahan inputan -->
								<?= form_error('passwordlama', '<small class="text-danger pl-3">','</small>'); ?>
							</div>

							<div class="form-group mt-3" style="margin-right: 30%;" >
								<label for="passwordbaru"><b>Password baru</b></label>
								<input type="password" class="form-control form-password form-control-sm" id="passwordbaru" name="passwordbaru" placeholder="Password baru" required oninvalid="this.setCustomValidity('Anda belum mengisi password baru untuk akun anda..')" oninput="setCustomValidity('')" minlength="8" maxlength="50">
								<!-- menampilkan notifikasi kesalahan inputan -->
								<?= form_error('passwordbaru', '<small class="text-danger pl-3">','</small>'); ?>
							</div>

							<div class="form-group mt-3" style="margin-right: 30%;" >
								<label for="passwordbaru2"><b>Ulangi password</b></label>
								<input type="password" class="form-control form-password form-control-sm" id="passwordbaru2" name="passwordbaru2" placeholder="Password baru" required oninvalid="this.setCustomValidity('Harap mengulangi password baru anda..')" oninput="setCustomValidity('')" minlength="8" maxlength="50">
								<!-- menampilkan notifikasi kesalahan inputan -->
								<?= form_error('passwordbaru2', '<small class="text-danger pl-3">','</small>'); ?>
							</div>
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-warning btn-sm shadow"> Ubah </button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- akhir update password -->

	<!-- Hapus akun -->
	<?php if ($pangkalan['role_id'] != '1'): ?>   
		<hr>
		<section class="hapus_akun">
			<h5 class="mt-5"><b>Hapus Akun</b></h5>
			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
					<h6>Hapus akun secara permanen</h6>
				</div>
				<div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
					<div class="card bg-white shadow mb-5" style="max-width: 90%; align-content: right; margin-left: 5%;">

						<div class="card-body text-center" style="padding: 5%;">
							<i class="fas fa-exclamation-triangle fa-3x text-danger mb-4 mt-4"></i>
							<h6>Setelah akun anda dihapus, semua data yang terhubung dengan akun anda akan ikut terhapus secara permanen. Sebelum anda menghapus akun, harap <i>backup</i>/simpan data-data penting yang tersimpan pada sistem.</h6>
						</div>

						<div class="card-footer">
							<a href="" data-toggle="modal" data-target="#hapus_pangkalan_Modal" class="btn btn-danger btn-sm shadow">Hapus Akun</a>

						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endif ?>
	<!-- akhir hapus akun -->


	<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content-->


<!-- Modal -->
<div class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" id="hapus_pangkalan_Modal" tabindex="-1" role="dialog" style="padding: 20px;">
	<div class="modal-dialog">
		<div class="modal-content shadow">
			<div class="modal-close-area modal-close-df">
				<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
			</div>
			<div class="modal-body">
				<i class="fa fa-exclamation-triangle fa-3x text-warning"></i>
				<h4 class="mt-2"><b>Yakin anda mau menghapus pangkalan?</b></h4>
				<p>Pilih tombol "Hapus" di bawah jika Anda akan menghapus akun pangkalan.</p></div>
				<div class="modal-footer warning-md" style="margin-top: -7%;">
					<a class="badge badge-danger badge-xs" href="<?= base_url('pangkalan/hapus_akun/pangkalan2/'.$pangkalan['id_komisariat']) ?>">Hapus</a>
				</div>
			</div>
		</div>
	</div>

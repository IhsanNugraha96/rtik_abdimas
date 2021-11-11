<div class="container">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Laporan Artikel Kegiatan</h1>
	<div class="row">
		<div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- Content Row -->
	<div class="row">
		<div class="col-md-3">
			<div class="card shadow  border-left-info" style="border: none; margin: 2vh 2% 4vh 0%; align-items: center;">
				<div class="card-body text-justify m-0 ">
					<small>
						<ol style="margin-left: -10%;">
							<li>Silahkan unduh template berkas di atas untuk menunjang proses pelaporan;</li>
							<li>Unggah berkas tim pada link yang sudah di sediakan;</li>
							<li>dapatkan link berbagi pada google drive dari file yang diunggah;</li>
							<li>Copy link berbagi pada Google Drive;</li>
							<li>Input link berbagi pada kolom input yang disediakan;</li>
							<li>Ketua Tim yang mempunyai hak akses untuk mengunggah berkas laporan.</li>
						</ol>
					</small>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="card shadow" style="border: none; margin: 2vh 0% 1vh 2%; align-items: center;">
				<div class="row text-center m-0 mt-3 ">
					<h5>Template Berkas Pelaporan</h5>
				</div>

				<div class="row text-center m-0">

					<?php $i=0; foreach ($template as $tmp) {?>
						<a href="<?= base_url('Relawan/unduh_template/'.$tmp['nama_template']); ?>"> 
							<div class="card border-0">
								<div class="card-body text-info">
									<i class="fas fa-file-download fa-2x"></i><br>
									<small><?= $nama_template[$i] ?></small>
								</div>
							</div>
						</a>
						<?php $i++; 
					} ?>
				</div>
			</div>

			<?php if ($data_di_tim['status_pengajuan'] == '4') { ?>
				<div class="card shadow"  style="border: none; margin: 1vh 0% 4vh 2%; align-items: center;">
					<div class="card-body text-justify m-0">
						<div class="row text-center m-0 justify-content-md-center">
							<h5>Upload Berkas Pelayanan</h5>
						</div>
						<div class="row m-0 mt-3 mb-3 ">
							<!-- <div class="col-10 mb-4">
								<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/surat_pengantar/'.urlencode($tim['id_tim']));?>">

									<input type="text" class="custom-text-input form-control" id="link_surat_pengantar" name="link_surat_pengantar" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
									placeholder="<?php if($tim['surat_pengantar'] == '-') { echo "link berkas surat pengantar";} else {echo $tim['surat_pengantar'];}?>" 
									value="<?php if($tim['surat_pengantar'] == '-') { echo "";}else {echo $tim['surat_pengantar']; }?>" 
									required="" maxlength="535" >


									<div class="invalid-feedback">insert link surat pengantar yang telah di unggah</div>
									<div class="valid-feedback">Link surat pengantar</div>

									<button type="submit" class="badge badge-primary badge-sm shadow text-light" style="float: right; margin-top: -3%;" >Simpan</button>

								</form>
							</div>
							<div class="col-2 text-center">
								<a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank' > 
									<i class="fas fa-file-upload fa-2x text-primary"></i><br>
									<small>Upload</small>
								</a> 
							</div>  -->

							<!-- pemisah form -->

							<div class="col-10 mb-4">
								<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/survey_permintaan/'.urlencode($tim['id_tim']));?>">

									<input type="text" class="custom-text-input form-control" id="link_survey_permintaan" name="link_survey_permintaan" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
									placeholder="<?php if($tim['survey_permintaan'] == '-') { echo "link berkas survey pemintaan";} else {echo $tim['survey_permintaan'];}?>" 
									value="<?php if($tim['survey_permintaan'] == '-') { echo "";}else {echo $tim['survey_permintaan']; }?>" 
									required="" maxlength="535">


									<div class="invalid-feedback">insert link berkas survey permintaan yang telah di unggah</div>
									<div class="valid-feedback">Link berkas survey permintaan</div>

									<button type="submit" class="badge badge-primary badge-sm shadow text-light" style="float: right; margin-top: -3%;" >Simpan</button>
								</form>
							</div>
							<div class="col-2 text-center">
								<a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank'> 
									<i class="fas fa-file-upload fa-2x text-primary"></i><br>
									<small>Upload</small>
								</a> 
							</div>


							<!-- pemisah form -->

							<!-- <div class="col-10 mb-4">
								<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/buku_kendali/'.urlencode($tim['id_tim']));?>">

									<input type="text" class="custom-text-input form-control" id="link_buku_kendali" name="link_buku_kendali" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
									placeholder="<?php if($tim['buku_kendali'] == '-') { echo "link berkas buku kendali";} else {echo $tim['buku_kendali'];}?>" 
									value="<?php if($tim['buku_kendali'] == '-') { echo "";}else {echo $tim['buku_kendali']; }?>" 
									required="" maxlength="535">


									<div class="invalid-feedback">insert link berkas buku kendali permintaan yang telah di unggah</div>
									<div class="valid-feedback">Link berkas buku kendali</div>

									<button type="submit" class="badge badge-primary badge-sm shadow text-light" style="float: right; margin-top: -3%;" >Simpan</button>
								</form>
							</div>
							<div class="col-2 text-center">
								<a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank'> 
									<i class="fas fa-file-upload fa-2x text-primary"></i><br>
									<small>Upload</small>
								</a> 
							</div> -->

							<!-- pemisah form -->

							<div class="col-10 mb-4">
								<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/surat_konfirmasi/'.urlencode($tim['id_tim']));?>">

									<input type="text" class="custom-text-input form-control" id="link_surat_konfirmasi" name="link_surat_konfirmasi" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
									placeholder="<?php if($tim['surat_konfirmasi'] == '-') { echo "link berkas surat konfirmasi";} else {echo $tim['surat_konfirmasi'];}?>" 
									value="<?php if($tim['surat_konfirmasi'] == '-') { echo "";}else {echo $tim['surat_konfirmasi']; }?>" 
									required="" maxlength="535">


									<div class="invalid-feedback">insert link berkas surat konfirmasi yang telah di unggah</div>
									<div class="valid-feedback">Link berkas surat konfirmasi</div>

									<button type="submit" class="badge badge-primary badge-sm shadow text-light" style="float: right; margin-top: -3%;" >Simpan</button>
								</form>
							</div>
							<div class="col-2 text-center">
								<a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank'> 
									<i class="fas fa-file-upload fa-2x text-primary"></i><br>
									<small>Upload</small>
								</a> 
							</div>

							<!-- pemisah form -->

							<div class="col-10 mb-4">
								<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/presensi_pelayanan/'.urlencode($tim['id_tim']));?>">

									<input type="text" class="custom-text-input form-control" id="link_presensi_pelayanan" name="link_presensi_pelayanan" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
									placeholder="<?php if($tim['presensi_pelayanan'] == '-') { echo "link berkas presensi pelayanan";} else {echo $tim['presensi_pelayanan'];}?>" 
									value="<?php if($tim['presensi_pelayanan'] == '-') { echo "";}else {echo $tim['presensi_pelayanan']; }?>" 
									required="" maxlength="535">


									<div class="invalid-feedback">insert link berkas presensi pelayanan yang telah di unggah</div>
									<div class="valid-feedback">Link berkas presensi pelayanan</div>

									<button type="submit" class="badge badge-primary badge-sm shadow text-light" style="float: right; margin-top: -3%;" >Simpan</button>
								</form>
							</div>
							<div class="col-2 text-center">
								<a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank'> 
									<i class="fas fa-file-upload fa-2x text-primary"></i><br>
									<small>Upload</small>
								</a> 
							</div>

							<!-- pemisah form -->
							<div class="col-10 mb-4">
								<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/berita_acara/'.urlencode($tim['id_tim']));?>">

									<input type="text" class="custom-text-input form-control" id="link_berita_acara" name="link_berita_acara" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
									placeholder="<?php if($tim['berita_Acara'] == '-') { echo "link berkas berita acara penerapan konten";} else {echo $tim['berita_Acara'];}?>" 
									value="<?php if($tim['berita_Acara'] == '-') { echo "";}else {echo $tim['berita_Acara']; }?>" 
									required="" maxlength="535">


									<div class="invalid-feedback">insert link berkas berita acara penerapan konten yang telah di unggah</div>
									<div class="valid-feedback">Link berkas berita acara penerapan konten</div>

									<button type="submit" class="badge badge-primary badge-sm shadow text-light" style="float: right; margin-top: -3%;" >Simpan</button>
								</form>
							</div>
							<div class="col-2 text-center">
								<a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank'	> 
									<i class="fas fa-file-upload fa-2x text-primary"></i><br>
									<small>Upload</small>
								</a> 
							</div>


							<div class="col-10 mb-4">
								<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/artikel_miftek/'.urlencode($tim['id_tim']));?>">

									<input type="text" class="custom-text-input form-control" id="link_artikel_miftek" name="link_artikel_miftek" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
									placeholder="<?php if($tim['artikel_miftek'] == '-') { echo "link berkas artikel MIFTEK";} else {echo $tim['artikel_miftek'];}?>" 
									value="<?php if($tim['artikel_miftek'] == '-') { echo "";}else {echo $tim['artikel_miftek']; }?>" 
									required="" maxlength="535">


									<div class="invalid-feedback">insert link berkas artikel MIFTEK yang telah di unggah</div>
									<div class="valid-feedback">Link berkas artikel MIFTEK</div>

									<button type="submit" class="badge badge-primary badge-sm shadow text-light" style="float: right; margin-top: -3%;" >Simpan</button>
								</form>
							</div>
							<div class="col-2 text-center">
								<a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank'> 
									<i class="fas fa-file-upload fa-2x text-primary"></i><br>
									<small>Upload</small>
								</a> 
							</div>


						</div>
					</div>
				</div>

				
			<?php } ?>

		</div>
	</div>

	<div class="row text-center">
		<div class="col-md-9">

			<div class="card shadow">
				<div class="card-body text-justify m-0">
					<div class="row text-center m-0">
						<h5><u>Artikel Berita</u></h5>
					</div>
					<div class="row m-0 mt-3 mb-3">
						<div class="col mb-3">
							<form action="<?php echo site_url('relawan/save_artikel/'.urlencode($tim['id_tim']));?>" method="post">
								<div class="form-group">
									<label>Judul Artikel</label>
									<input type="text" name="title" class="form-control" placeholder="<?= $tim['judul_laporan']?>" value="<?= $tim['judul_laporan']?>" required>
								</div>
								<div class="form-group">
									<label>Isi Artikel</label>
									<textarea id="summernote" name="contents"><?= $tim['laporan']?></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Simpan</button>
								<!-- <a class="btn btn-info" href="<?= base_url('Relawan/lihat_artikel/'.urlencode($tim['id_tim'])) ?>">Lihat Artikel</a> -->
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>



	<!-- End of Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content
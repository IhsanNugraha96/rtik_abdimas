<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- Content Row -->

	<div class="row mb-3">
		<div class="col-lg-9">
			<div class="card mb-3 shadow">

				<!-- jika relawan sudah mengajukan menjadi anggota tim, namun belum di konfirmasi ketua tim -->
				<?php if (!$data_di_tim || $data_di_tim['id_tim'] == '0' || $data_di_tim['status_pengajuan'] <= '2' ) {?>
					<div class="card-header font-weight-bold bg-primary text-white justify-content-between d-sm-flex align-items-center"> 
						Data tim yang mengikuti event
						<div>
							<!-- jika relawan belum mengajukan, maka bisa membuat tim baru -->
							<?php if (!$data_di_tim || $data_di_tim['status_pengajuan'] == '0' || $data_di_tim['status_pengajuan'] == '2') { ?>                      		
								<a href="" class="d-sm-inline-block btn btn-sm btn-light shadow-sm text-primary font-weight-bold" data-toggle="modal" data-target="#ModalTambahTim"><i class="fas fa-plus text-primary-50"></i> Tim baru</a>
							<?php } ?>
						</div>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr style="text-align: center;">
										<th style="width: 10%;">No</th>
										<th>Nama Tim</th>
										<th style="width: 25%;">Aksi</th> 
									</tr>
								</thead>

								<tbody>
									<?php $i=1; ?>
									<?php foreach ($tim as $tm) { ?>
										<tr style="text-align: center;">
											<th scope="row"><?= $i; ?></th>
											<td><?= $tm['nama_tim']; ?></td>
											<td>  
												<a href="<?= base_url('Relawan/detail_tim/').urlencode($tm['id_tim']); ?>" name="detail" class="badge badge-success">detail</i></a>
												<?php  if ($tm['role_id'] == 0) { ?>
													<?php if (!$data_di_tim || $data_di_tim['status_pengajuan'] == 0 || $data_di_tim['status_pengajuan'] == 2 ) { ?>
														<a href="<?= base_url('Relawan/ajukan_anggota_tim/').urlencode($tm['id_tim'])."/".urlencode($data_kepesertaan['id_anggota']) ?>" name="ajukan" class="badge badge-info">ajukan permintaan</i></a>
													<?php } } else {?>
														<a href="" class="badge badge-danger">Anggota penuh</i></a>
													<?php } ?>
												</td>
											</tr>

											<?php $i++; ?>
										<?php } ?>


									</tbody>
								</table>
							</div>
						</div>
					<?php } 


                	// <!-- jika relawan sudah menjadi anggota tim -->
					elseif($data_di_tim['status_pengajuan'] >= '4') { ?>
						<div class="card-header font-weight-bold bg-primary text-white justify-content-between d-sm-flex align-items-center"> 
							Data personel tim "<?= $data_di_tim['nama_tim'] ?>"
						</div>

						<div class="card_header text-center mt-2 mb-2">
							<b class="card-title">KETUA TIM</b><br>
							<img class="rounded-circle img-thumbnail mb-2" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/relawan/image/'.$ketua_tim['image']) ?>">
							
							<br>
							<b class="card-text"><?= $ketua_tim['nama_lengkap']; ?></b><br>

							<hr style="width: 90%">

							<b class="card-title">ANGGOTA TIM</b>
							<div class="row mt-3">
								<?php if (!$anggota_tim) { ?> <i class="text-danger ml-4 mr-4">Belum ada anggota tim</i> <?php } else{?>
									<?php $i = 0; foreach ($anggota_tim as $agt){ ?>
										<div class="col-lg-3 col-md-4 text-center">
											<b class="card-text">Anggota <?= $i+1; ?></b><br>
											<img class="rounded-circle img-thumbnail mb-2" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>">
											<br>
											<b class="card-text"><?= $agt['nama_lengkap']; ?></b><br>
											<i class="card-text"><?= $agt['nama_komisariat']; ?></i><br>
											<?php if (strtotime($kegiatan_berlangsung['akhir_registrasi']) >= strtotime(date('Y-m-d G:i:s')) && $data_di_tim['status_pengajuan'] == '4'){?>
												<a href="<?= base_url('Relawan/konfirmasi_anggota_tim/tolak/'.urlencode($agt['id_anggota'])) ?>" class="d-sm-inline-block badge badge-sm badge-danger shadow-sm font-weight-bold" ></i> Hapus Anggota</a>
											<?php } ?>

										</div>
										<?php $i++; }} ?>
									</div>

									<?php if ($data_di_tim['status_pengajuan'] == 4 && strtotime($kegiatan_berlangsung['akhir_registrasi']) >= strtotime(date('Y-m-d G:i:s'))): ?>
									<?php if ($data_di_tim['role_id'] == '0') { ?>

										<hr class="mt-4 mb-2" style="width: 90%">

										<b class="card-title">PENGAJUAN ANGGOTA TIM</b><br>
										<div class="row">
											<?php if (!$pengajuan_anggota) { ?> <i class="text-danger ml-4 mr-4 card-text">Belum ada yang mengajukan menjadi anggota tim</i> <?php } else {?>
												<?php $i = 0; foreach ($pengajuan_anggota as $agt){ ?>
													<div class="col-lg-3 col-md-4 text-center">
														<b class="card-text">Calon anggota <?= $i+1; ?></b><br>
														<img class="rounded-circle img-thumbnail mb-2" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>">
														
														<br>
														<b class="card-text"><?= $agt['nama_lengkap']; ?></b><br>
														<i class="card-text"><?= $agt['nama_komisariat']; ?></i><br>
														<a href="<?= base_url('Relawan/konfirmasi_anggota_tim/acc/'.urlencode($agt['id_anggota'])) ?>" class="d-sm-inline-block badge badge-sm badge-primary shadow-sm font-weight-bold" ></i> Konfirmasi</a>
														<a href="<?= base_url('Relawan/konfirmasi_anggota_tim/tolak/'.urlencode($agt['id_anggota'])) ?>" class="d-sm-inline-block badge badge-sm badge-danger shadow-sm  font-weight-bold" > Tolak</a>
													</div>
													<?php $i++; }} ?>
												</div>
										<?php } ?>

												<div class="card-footer mt-5 text-left">
													<div class="row mt-2	">
														<div class="col-md-8">
															<b class="font-weight-bold text-primary">PEMBIMBING</b>
															
															<div class="small mt-2 mb-3">Sebagai ketua tim anda ditugaskan untuk memilih pembimbing. </div>
															<form class="user was-validated" method="post" action="<?= base_url('Relawan/ajukan_pembimbing/'.urlencode($ketua_tim['id_tim']));?>">

																<select class="custom-select" id="pembimbing" name="pembimbing" required oninvalid="this.setCustomValidity('Anda belum memilih pangkalan..')" oninput="setCustomValidity('')" <?php if ( $ketua_tim['status_pembimbing'] == '2') { echo "disabled";} ?>>

											                      <option value="">--Ajukan Pembimbing--</option>
											                      <?php foreach ($data_pembimbing as $pmb) {?>
											                        <option value="<?=$pmb['id_pembimbing'];?>" <?php if ($ketua_tim['id_pembimbing'] == $pmb['id_pembimbing']) { echo"selected";
											                        	# code...
											                        } ?>> <?= $pmb['nama']." - <b>".$pmb['nama_komisariat']."</b>"; ?></option>
											                      <?php } ?>

											                    </select>
											                    <!-- menampilkan notifikasi kesalahan inputan -->
											                    <?= form_error('pembimbing', '<small class="text-danger ">','</small>'); ?>
											                    <div class="invalid-feedback">Pilih pembimbing.</div>
											                    <div class="valid-feedback">Pembimbing</div>

																<?php if($ketua_tim['status_pembimbing'] == '-' || $ketua_tim['status_pembimbing'] == '1' || $ketua_tim['id_pembimbing'] == '-') { ?>
																	<button type="submit" class="btn btn-primary btn-sm shadow mt-3" style="float: left;">Ajukan</button>
																<?php } elseif($ketua_tim['status_pembimbing'] == '0') { ?>
																	<button type="submit" class="btn btn-warning btn-sm shadow mt-3" style="float: left;">Ubah</button>
																<?php } ?>
															</form>
														</div>	
														<div class="col-md-4 text-center">
															<div class="card shadow">
																<div class="card-header">
																	<b class="text-info font-weight-bold">Status Pengajuan</b>
																</div>
																<div class="card-body">
																	<?php if ($ketua_tim['status_pembimbing'] == '-'){ ?>
																		<p class="text-danger font-weight-bold">Belum mengajukan pembimbing</p> 		
																	<?php } elseif ($ketua_tim['status_pembimbing'] == 0) { ?>
																		<p class="text-warning font-weight-bold">Sedang mengajukan, <br>Belum di konfirmasi pembimbing</p>
																	<?php } elseif ($ketua_tim['status_pembimbing'] == 1) { ?>
																		<p class="text-danger font-weight-bold">Pengajuan ditolak, silahkan mengajukan ulang pembimbing</p>
																	<?php } elseif ($ketua_tim['status_pembimbing'] == 2) { ?>
																		<p class="text-success font-weight-bold">Pengajuan di acc pembimbing</p>
																	<?php } ?>
																</div>
															</div>
															
														</div>			
													</div>

													<hr>


													<b class="font-weight-bold text-success">UNGGAH SURAT IZIN</b>
													<div class="row mt-3	">
														<div class="col-md-8">
															<div class="small mb-3">Unggah surat izin orang tua jika anda berusia di bawah 25 tahun <a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank' class="text-danger font-weight-bold">di sini</a>. dapatkan link berbagi pada google drive dari file yang diunggah, kemudian insert link tersebut pada form dibawah.</div>
															<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/surat_izin/'.urlencode($data_kepesertaan['id_anggota']));?>">
																<input type="text" class="custom-text-input form-control" id="link_surat_izin" name="link_surat_izin" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" placeholder="<?php if($data_kepesertaan['file_surat_izin_ortu'] == '0') { echo "link berkas surat izin";} else {echo $data_kepesertaan['file_surat_izin_ortu'];}?>" value="<?= $data_kepesertaan['file_surat_izin_ortu'] ?>" required=""  maxlength="535">
																<!-- menampilkan notifikasi kesalahan inputan -->


																<div class="invalid-feedback">insert link surat izin orang tua yang telah di unggah</div>
																<div class="valid-feedback">Link surat izin orang tua</div>

																<?php if($data_kepesertaan['file_surat_izin_ortu'] == '0') { ?>
																	<button type="submit" class="btn btn-primary btn-sm shadow mt-3" style="float: left;">Simpan</button>
																<?php } else { ?>
																	<button type="submit" class="btn btn-warning btn-sm shadow mt-3" style="float: left;">Ubah</button>
																<?php } ?>
															</form>
														</div>				
													</div>

												</div>

											<?php endif ?>
										</div>

									<?php }  

									elseif($data_di_tim['status_pengajuan'] == '3') { ?>
										<div class="card-body">
											<b class="font-weight-bold text-success">UNGGAH SURAT IZIN</b>
											<div class="row mt-3	">
												<div class="col-md-8">
													<div class="small mb-3">Unggah surat izin orang tua jika anda berusia di bawah 25 tahun <a href="<?= $kegiatan_berlangsung['link_gdrive_default']; ?>" target='_blank' class="text-danger font-weight-bold">di sini</a>. dapatkan link berbagi pada google drive dari file yang diunggah, kemudian insert link tersebut pada form dibawah.</div>
													<form class="user was-validated" method="post" action="<?= base_url('Relawan/unggah_berkas/surat_izin/'.urlencode($data_kepesertaan['id_anggota']));?>">
														
														<input type="text" class="custom-text-input form-control" id="link_surat_izin" name="link_surat_izin" oninvalid="this.setCustomValidity('Anda belum mengisi link berkas..')" oninput="setCustomValidity('')" 
														placeholder="<?php if($data_kepesertaan['file_surat_izin_ortu'] == '0') { echo "link berkas surat izin";} else {echo $data_kepesertaan['file_surat_izin_ortu'];}?>" 
														value="<?php if($data_kepesertaan['file_surat_izin_ortu'] == '0') { echo "";}else {echo $data_kepesertaan['file_surat_izin_ortu']; }?>" 
														required="" maxlength="535">
														<!-- menampilkan notifikasi kesalahan inputan -->


														<div class="invalid-feedback">insert link surat izin orang tua yang telah di unggah</div>
														<div class="valid-feedback">Link surat izin orang tua</div>

														<?php if($data_kepesertaan['file_surat_izin_ortu'] == '0') { ?>
															<button type="submit" class="btn btn-primary btn-sm shadow mt-3" style="float: left;">Simpan</button>
														<?php } else { ?>
															<button type="submit" class="btn btn-warning btn-sm shadow mt-3" style="float: left;">Ubah</button>
														<?php } ?>
													</form>
												</div>				
											</div>
										</div>
									<?php } ?>

								</div>
							</div>
							<div class="col-lg-3">
								<div class="row">
									<?php if (!$data_di_tim || $data_di_tim['status_pengajuan'] == 0 || $data_di_tim['status_pengajuan'] == 1 || $data_di_tim['status_pengajuan'] == 2) { ?>
										<div class="col-lg-12 mb-2">
											<div class="card shadow">
												<div class="card-header font-weight-bold bg-warning text-white">

													<?php if (!$data_di_tim || $data_di_tim['status_pengajuan'] == 0) {?>
														<a href="" data-toggle="modal" data-target="#lihat_status_kepesertaan" class="text-white">Status Keanggotaan</a>
													</div>
													<div class="card-body">
														<b class="card-text text-info">Anda belum terdata sebagai anggota dari suatu tim.</b>
													<?php } elseif ($data_di_tim['status_pengajuan'] == 1) { ?>
														<a href="" data-toggle="modal" data-target="#lihat_status_kepesertaan" class="text-white">Status Pengajuan</a>
													</div>
													<div class="card-body">
														<b class="card-text">Menunggu konfirmasi dari Ketua Tim <b class="text-info"><?= $data_di_tim['nama_tim']; ?></b>.</b>
													<?php } elseif ($data_di_tim['status_pengajuan'] == 2) { ?>
														<a href="" data-toggle="modal" data-target="#lihat_status_kepesertaan" class="text-white">Status Pengajuan</a>
													</div>
													<div class="card-body">
														<p class="card-text">Pengajuan anda <b class="text-danger">di tolak</b> oleh ketua tim <b class="text-info"><?= $data_di_tim['nama_tim']; ?></b>, silahkan pilih tim lain.</p>
													<?php } ?>
												</div>
											</div>
										</div>

										<div class="col-lg-12">
											<div class="card shadow">
												<div class="card-header font-weight-bold bg-info text-white">
													<a href=""class="text-white">Informasi</a>
												</div>
												<div class="card-body">
													<small class="card-text">Anda dapat mengubah tim selama belum mengajukan permintaan kepada suatu tim, belum terdaftar menjadi anggota dari suatu tim, atau selama fase registrasi <b>belum selesai</b>.</small>
												</div>
											</div>
										</div>
									<?php } else { ?>
										<div class="col-lg-12">
											<div class="card shadow">
												<div class="card-header font-weight-bold bg-info text-white">
													Informasi Keanggotaan
												</div>
												<div class="card-body text-center">
													<img class="rounded-circle img-thumbnail mb-3" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/relawan/image/'.$relawan['image']) ?>">
													
													<br>
													<b><?= $relawan['nama_lengkap']; ?></b><br>

													<b>Jabatan : </b><?php if ($data_kepesertaan['status_pengajuan'] == 3) {echo"Anggota Tim";} else{echo"Ketua Tim";};?><br>
												</div>
											</div>
										</div>

										<div class="col-lg-12 mt-3">
											<div class="card shadow border-left-warning">
												<div class="card-body">
													<div>Unggah surat izin orang tua jika anda berusia di bawah 25 tahun. klik <a href="<?= base_url('Relawan/unduh_template/').$template['nama_template']; ?>" class="text-danger font-weight-bold">di sini</a> untuk mengunduh template surat izin</div>
												</div>
											</div>
										</div>

										<?php if ($data_di_tim['status_pengajuan'] == '4') {?>
											<div class="col-lg-12 mt-3">
												<div class="card shadow">
													<div class="card-body">
														<small class="card-text">Sebagai ketua tim, Anda dapat mengubah/memperbaharui anggota tim selama fase registrasi <b>belum selesai</b>.</small>
													</div>
												</div>
											</div>
										<?php }} ?>
									</div>
								</div>
							</div>


							<!-- End of Content Row -->


						</div>
						<!-- /.container-fluid -->

					</div>
					<!-- End of Main Content -->


					<div id="ModalTambahTim" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
						<div class="modal-dialog">
							<div class="modal-content shadow">
								<div class="modal-close-area modal-close-df">
									<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
								</div>
								<div class="modal-body">
									<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
									<p><b>RTIKAbdimas</b></p>
									<!-- form -->
									<form class="user was-validated mt-3" method="post" action="<?= base_url('Relawan/buat_tim_baru/'.$relawan['id_relawan'].'/'.urlencode($kegiatan_berlangsung['id_event']));  ?>">
										<div class="form-group">
											<p for="" class="text-left mb-1 font-weight-bold">Nama tim :</p>
											<input type="text" class="form-control is_invalid form-control-sm" id="nama_tim" name="nama_tim" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi nama tim yang akan dibuat..')" oninput="setCustomValidity('')">
											<div class="invalid-feedback text-left">
												Harap mengisi nama tim.
											</div>
										</div>

										<!-- akhir form -->
										<p>Anda yang membuat tim baru, akan otomatis menjadi <b>Ketua Tim</b></p>

									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
											Buat Tim
										</button>              
									</form>
								</div>
							</div>
						</div>
					</div>




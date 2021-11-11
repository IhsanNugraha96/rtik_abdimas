<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Data Pengajuan Pembimbing Tim</h1>
	<div class="row">
		<div class="col-lg-10">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>


	<!-- Content Row -->
	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-2">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-1 font-weight-bold text-primary">Tabel Daftar Pengajuan Pembimbing </h6>
				<div>
					<!-- <a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#tambah_pembimbing">Tambah Pembimbing</a> -->
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 5%;">No</th>
							<th width="15%">Nama Tim</th>
							<th>Ketua</th>
							<th>Asal Pangkalan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($kegiatan_berlangsung) 
						{ 
							if ($status_pembimbing['role_id'] == '2') 
								{ ?>
									<?php $i=0; ?>
									<?php if ($jml_pengajuan_pembimbing != '0') 
									{
										foreach ($ketua_tim as $ketua) 
											{ ?>
												<tr style="text-align: center;">
													<th scope="row"><?= $i+1; ?></th>
													<td>
														<?= $ketua['nama_tim'] ?>
													</td>
													<td><?= $ketua['nama_lengkap'] ?></td>   
													<td><?= $ketua['nama_komisariat'] ?></td>  
													<td>
														<a href="" class="badge badge-primary" data-toggle="modal" data-target="#acc_tim_<?= $ketua['id_tim'];?>">Acc</a>
														<a href="" class="badge badge-warning" data-toggle="modal" data-target="#tolak_tim_<?= $ketua['id_tim'];?>">Tolak</a>
													</td>
												</tr>
												<?php  $i++; 
											}
										}
									} ?>
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



	<?php $i=0; 
	if ($kegiatan_berlangsung) 
	{ 
		if ($jml_pengajuan_pembimbing != '0') 
		{
			foreach ($ketua_tim as $ketua) 
				{ ?>
					<div id="acc_tim_<?= $ketua['id_tim'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
						<div class="modal-dialog">
							<div class="modal-content shadow">
								<div class="modal-close-area modal-close-df">
									<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
								</div>
								<div class="modal-body">
									<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
									<h5 class="font-weight-bold mt-2">Terima pengajuan pembimbing dari <br><?= $ketua['nama_tim']; ?>?</h5>

								</div>
								<div class="modal-footer primary-md" style="margin-top: -7%;">
									<a class="badge badge-primary badge-xs" href="<?= base_url('Pembimbing/aksi_pengajuan_pembimbing/acc_tim/'.$ketua['id_tim']); ?>">Terima</a>
								</div>
							</div>
						</div>
					</div>
					<?php 
				}
				$i++;
			}
		}?>


		<?php $i=0; 
		if ($kegiatan_berlangsung) 
		{ 
			if ($jml_pengajuan_pembimbing != '0') 
			{
				foreach ($ketua_tim as $ketua) 
					{ ?>
						<div id="tolak_tim_<?= $ketua['id_tim'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
							<div class="modal-dialog">
								<div class="modal-content shadow">
									<div class="modal-close-area modal-close-df">
										<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
									</div>
									<div class="modal-body">
										<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
										<h5 class="font-weight-bold mt-2">Terima pengajuan pembimbing dari <br><?= $ketua['nama_tim']; ?>?</h5>

									</div>
									<div class="modal-footer warning-md" style="margin-top: -7%;">
										<a class="badge badge-warning badge-xs" href="<?= base_url('Pembimbing/aksi_pengajuan_pembimbing/tolak_tim/'.$ketua['id_tim']); ?>">Tolak</a>
									</div>
								</div>
							</div>
						</div>
						<?php 
					}
					$i++;
				}
			}?>
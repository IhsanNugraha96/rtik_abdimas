
<!--Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Detail Pangkalan</h1>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<!-- Content Row -->

	<div class="card shadow" style="border: none; margin: 8vh 10% 0vh 10%; align-items: center;">

		<div class="row text-center m-0 mt-3 justify-content-md-center">
			<a data-toggle="collapse" href="#profil" role="button" aria-expanded="false" aria-controls="#profil"> 
				<div class="card border-0">
					<div class="card-body">
						<i class="fas fa-house-user fa-2x"></i><br>
						<small>PROFIL PANGKALAN</small>
					</div>
				</div>
			</a>

			<a data-toggle="collapse" href="#ketua" role="button" aria-expanded="false" aria-controls="#ketua"> 
				<div class="card border-0">
					<div class="card-body">
						<i class="fas fa-user-tie fa-2x"></i><br>
						<small>KETUA PANGKALAN</small>
					</div>
				</div>
			</a>

			<a data-toggle="collapse" href="#pembimbing" role="button" aria-expanded="false" aria-controls="#pembimbing"> 
				<div class="card border-0">
					<div class="card-body">
						<i class="fas fa-chalkboard-teacher fa-2x"></i><br>
						<small>PEMBIMBING</small>
					</div>
				</div>
			</a>

			<a data-toggle="collapse" href="#anggota" role="button" aria-expanded="false" aria-controls="#anggota"> 
				<div class="card border-0">
					<div class="card-body">
						<i class="fas fa-users fa-2x"></i><br>
						<small>ANGGOTA</small>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="card shadow" style="border: none; margin: 1vh 10% 4vh 10%; align-items: center; background-color: #ebe9e6;">
		<div class="row mb-3">  



			<div class="col-sm-12">
				<div class="collapse multi-collapse" id="profil">
					<div class="card-body bg-light text-center">
						<h4>Informasi pangkalan</h4>
						<div class="card">
							<div class="card-body">
								<img class="text-center mg-profile mb-3" src="<?= base_url('assets/img/komisariat/'.$pangkalan['logo']) ?>" style="width: 30%;">
								<table class=" text-left">
									<tr>
										<td valign="top"> Nama Komisariat</td>
										<td width="5%" class="text-center" valign="top">:</td>
										<td valign="top"><?= $pangkalan['nama_komisariat']; ?></td>
									</tr>
									<tr>
										<td valign="top">Email</td>
										<td width="5%" class="text-center" valign="top">:</td>
										<td valign="top"><?= $pangkalan['email']; ?></td>
									</tr>
									<tr>
										<td valign="top">Kontak</td>
										<td width="5%" class="text-center" valign="top">:</td>
										<td valign="top"><?= $pangkalan['kontak']; ?></td>
									</tr>
									<tr>
										<td valign="top">Surat Komitmen</td>
										<td width="5%" class="text-center" valign="top">:</td>
										<td valign="top"><a href="<?= $pangkalan['surat_komitmen']; ?>" target="_blank">Lihat berkas surat komitmen</a></td>
									</tr>
									<tr>
										<td valign="top">Surat Tugas</td>
										<td width="5%" class="text-center" valign="top">:</td>
										<td valign="top"><a href="<?= $pangkalan['surat_tugas']; ?>" target="_blank">Lihat berkas surat tugas</a></td>
									</tr>
									<tr>
										<td valign="top">Alamat</td>
										<td width="5%" class="text-center" valign="top">:</td>
										<td valign="top"><?= $pangkalan['type'].'. '.$pangkalan['nama_kota'].', Provinsi. '.$pangkalan['nama_provinsi']; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-12">
				<div class="collapse multi-collapse" id="ketua">
					<div class="card-body bg-light text-center">
						<h4>Ketua Pangkalan</h4>
						<div class="card">
							<div class="card-body">
								<img class="img-profile " src="<?= base_url('assets/img/komisariat/ketua/'.$pangkalan['foto_ketua']); ?>" style="width: 15%;">
								
								<h5><?= $pangkalan['ketua'] ?></h5>
								
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-12">
				<div class="collapse multi-collapse" id="pembimbing">
					<div class="card-body bg-light text-center">
						<h4>Daftar Pembimbing</h4>
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered"  width="100%" cellspacing="0">
									<thead>
										<tr style="text-align: center;">
											<th style="width: 5%;">No</th>
											<th width="20%">Foto</th>
											<th>Nama Pembimbing</th>
											<th>Alamat</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										<?php foreach ($pembimbing as $pmb) { ?>
											<tr style="text-align: center;">
												<th scope="row"><?= $i+1; ?></th>
												<td width="20%">
													<img class="img-profile" src="<?= base_url('assets/img/pembimbing/'.$pmb['image']) ?>" style="width: 30%;">
												
											</td>
											<td><?= $pmb['nama'] ?></td>     
											<td scope="row">
												<a href="" name="detail" class="badge badge-info" data-toggle="modal" data-target="#detail_pembimbing_<?= $i;?>">detail</i></a>
											</td>             
										</tr>
										<?php  $i++; } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="col-sm-12">
				<div class="collapse multi-collapse" id="anggota">
					<div class="card-body bg-light text-center">
						<h4>Daftar Anggota</h4>
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr style="text-align: center;">
											<th style="width: 5%;">No</th>
											<th width="20%">Foto</th>
											<th>Nama Anggota</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										<?php foreach ($anggota as $agt) { ?>
											<tr style="text-align: center;">
												<th style="width: 5%;"><?= $i+1; ?></th>
												<td width="20%">
													<img class="img-profile" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>" style="width: 30%;">
											</td>
											<td><?= $agt['nama_lengkap'] ?></td>     
											<td scope="row">
												<a href="" name="detail" class="badge badge-info" data-toggle="modal" data-target="#detail_anggota_<?= $i;?>">detail</i></a>
											</td>             
										</tr>
										<?php  $i++; } ?>
									</tbody>
								</table>
							</div>
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
<!-- End of Main Content --->

<?php $j=0; ?>
<?php foreach ($pembimbing as $pmb) { ?>
	<div id="detail_pembimbing_<?=$j;?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile" src="<?= base_url('assets/img/pembimbing/'.$pmb['image']) ?>"  style="width: 30%;" class="mb-3">
					
					<h5><?= $pmb['nama']?></h5>

					<table class=" text-left mt-3">
						<tr>
							<td width="35%" valign="top"> Tanggal Lahir</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= substr($pmb['tgl_lahir'], 8, 2).'-'.substr($pmb['tgl_lahir'], 5, 2).'-'.substr($pmb['tgl_lahir'], 0, 4); ?></td>
						</tr>
						<tr>
							<td valign="top">Jenis Kelamin</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $pmb['jenis_kelamin']; ?></td>
						</tr>
						<tr>									<tr>
							<td valign="top">Email</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $pmb['email']; ?></td>
						</tr>
						<tr>									<tr>
							<td valign="top">No. Telp.</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $pmb['no_telp']; ?></td>
						</tr>
						<tr>
							<td valign="top">Sektor Pekerjaan</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $pmb['sektor_pekerjaan']; ?></td>
						</tr>
						<tr>
							<td valign="top">Jabatan</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $pmb['jabatan']; ?></td>
						</tr>
						<tr>
							<td valign="top">Alamat</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $pmb['alamat_rumah'].', Kec. '.$pmb['kecamatan'].', '.$pmb['type'].'. '.$pmb['nama_kota'].', Provinsi. '.$pmb['nama_provinsi']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php  $j++; } ?>




	<?php $j=0; ?>
<?php foreach ($anggota as $agt) { ?>
	<div id="detail_anggota_<?=$j;?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">
					<img class="img-profile" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>"  style="width: 30%;" class="mb-3">
					
					<h5><?= $agt['nama_lengkap']?></h5>

					<table class=" text-left mt-3">
						<tr>
							<td width="35%" valign="top"> Tanggal Lahir</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $agt['tempat_lahir'].", ".substr($agt['tgl_lahir'], 8, 2).'-'.substr($agt['tgl_lahir'], 5, 2).'-'.substr($agt['tgl_lahir'], 0, 4); ?></td>
						</tr>
						<tr>
							<td valign="top">Jenis Kelamin</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $agt['jenis_kelamin']; ?></td>
						</tr>
						<tr>									<tr>
							<td valign="top">Email</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $agt['email']; ?></td>
						</tr>
						<tr>									<tr>
							<td valign="top">No. Telp.</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $agt['no_hp']; ?></td>
						</tr>
						<tr>
							<td valign="top">Pekerjaan</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $agt['pekerjaan']; ?></td>
						</tr>
						<tr>
							<td valign="top">Pendidikan Terakhir</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $agt['pendidikan_terakhir']; ?></td>
						</tr>
						<tr>
							<td valign="top">Alamat</td>
							<td width="5%" class="text-center" valign="top">:</td>
							<td valign="top"><?= $agt['alamat_lengkap'].', Kec. '.$agt['kecamatan'].', '.$agt['type'].'. '.$agt['nama_kota'].', Provinsi. '.$agt['nama_provinsi']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php  $j++; } ?>
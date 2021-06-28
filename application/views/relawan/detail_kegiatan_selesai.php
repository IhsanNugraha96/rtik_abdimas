<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Riwayat Kegiatan</h1>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<!-- Content Row -->
	<div class="card mb-5">
		<div class="card-body">
			<p class="font-weight-bold h5 text-center"><u><?= $kegiatan['nama_event']; ?></u></p><br>
			<div class="row">
				<div class="col-sm-8">
					<p class="font-weight-bold">Pembimbing :</p> <br>
					<div class="row">
						<div class="col-sm-3">
							<img src="<?= base_url('assets/img/pembimbing/'.$kegiatan['image']) ?>" class="shadow" style="width: 100%;">
							
						</div>
						<div class="col-sm-9 text-left">
							<table>
								<tr>
									<td>Nama pembimbing</td>
									<th width="5%" class="text-center"> : </th>
									<td><?= $kegiatan['nama']; ?></td>
								</tr>
								<tr>
									<td>Alamat email</td>
									<td class="text-center"> : </td>
									<td><?= $kegiatan['email']; ?></td>
								</tr>
								<tr>
									<td>Kontak Telepon</td>
									<td class="text-center"> : </td>
									<td><?= $kegiatan['no_telp']; ?></td>
								</tr>
								<tr>
									<td>Asal komisariat</td>
									<td class="text-center"> : </td>
									<td><?= $kegiatan['nama_komisariat']; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-12 text-left justify-content-md-center text-center">
					<p class="font-weight-bold text-center">Tim <?= $kegiatan['nama_tim']; ?></p>
					<div class="row justify-content-md-center text-center">
						<div class="col-sm-2">
							<p class="font-weight-bold">Ketua Tim</p>
							<img src="<?= base_url('assets/img/relawan/image/'.$ketua_tim['image']) ?>" class="shadow " style="width: 100%;">
							
							<p><?= $ketua_tim['nama_lengkap']; ?></p>
							<p>( <?= $ketua_tim['nama_komisariat']; ?> )</p>
						</div>

						<?php $i=0; ?>
						<?php foreach ($anggota_tim as $agt) { ?>				
							<div class="col-sm-2">
								<p class="font-weight-bold">Anggota <?= $i+1;?></p>
								<img src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>" class="shadow" style="width: 100%;">
								
								<p><?= $agt['nama_lengkap']; ?></p>
								<p>( <?= $agt['nama_komisariat']; ?> )</p>
							</div>
						<?php $i++; } ?>
					</div>
				</div>
			</div>
			<div class="row">
				
			</div>

			
		</div>
	</div>
	<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
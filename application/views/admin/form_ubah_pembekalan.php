<!-- Begin Page Content  -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Formulir ubah acara pembekalan</h1>
	<div class="row justify-content-md-left mb-5">
		<div class="col-md-10 col-sm-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<!-- Content Row -->


	
	<div class="row">
		<div class="col-md-5 mb-3">
			<form class="user was-validated" method="post" action="<?= base_url('Admin/ubah_event/ubah_acara_pembekalan/'.urlencode($event['id_event']));?>" enctype="multipart/form-data">
				<div class="form-group">
					<select class="custom-select"  name="pilihan_instruktur"  id="pilihan_instruktur" required oninvalid="this.setCustomValidity('Anda belum memilih instruktur..')" oninput="setCustomValidity('')">
						<option value="">--Pilih instruktur--</option>
						<?php $i=1; foreach ($instruktur as $ist): ?>
						<option value="<?= $ist['id_instruktur']; ?>" <?php if ($ist['id_instruktur'] == $pembekalan['id_instruktur']) { echo "selected"; } ?>><?= $i.'. '.$ist['nama']; ?></option>
						<?php $i++; endforeach ?>                    
					</select>
					<!-- menampilkan notifikasi kesalahan inputan -->
					<?= form_error('pendidikan', '<small class="text-danger pl-3">','</small>'); ?>
					<div class="invalid-feedback">Pilih instruktur.</div>                
					<div class="valid-feedback text-left">Instruktur.</div>
				</div>
<!-- <?php print_r($pembekalan); ?> -->
				<div class="form-group hidden">
					<input type="text" class="form-control"  name="id_pembekalan"  id="id_pembekalan" value="<?= $pembekalan['id_pembekalan']; ?>" required hidden>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" id="link_materi" name="link_materi" placeholder="Link berkas materi pembekalan" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi link berkas materi pembekalan')" oninput="setCustomValidity('')" value="<?= $pembekalan['link_materi']; ?>">

					<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
					<div class="invalid-feedback text-left">Isi link berkas materi pembekalan.</div>
					<div class="valid-feedback text-left">Link berkas materi pembekalan.</div>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" id="link_meeting" name="link_meeting" placeholder="Link acara pembekalan" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi link acara pembekalan')" oninput="setCustomValidity('')" value="<?= $pembekalan['link']; ?>">

					<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
					<div class="invalid-feedback text-left">Isi link acara pembekalan.</div>
					<div class="valid-feedback text-left">Link acara pembekalan.</div>
				</div>

				<div class="form-group">
					<input type="date" class="form-control" id="date" name="tgl" placeholder="Tanggal acara pembekalan" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum menentukan tanggal <?= $Judul[$i]; ?>')" oninput="setCustomValidity('')" value="<?= substr($pembekalan['waktu_pelaksanaan'], 0, 10)?>">

					<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
					<div class="invalid-feedback text-left">Tentukan tanggal acara pembekalan.</div>
					<div class="valid-feedback text-left">Tanggal acara pembekalan.</div>
				</div>
				<div class="form-group">
					<input type="time" class="form-control" id="time" name="time"  min="00:00" max="23:59" required oninvalid="this.setCustomValidity('Harap tentukan waktu acara pembekalan')" oninput="setCustomValidity('')" value="<?=substr($pembekalan['waktu_pelaksanaan'], 11, 5)?>">

					<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
					<div class="invalid-feedback text-left">Tentukan waktu acara pembekalan.</div>
					<div class="valid-feedback text-left">Waktu acara pembekalan</div>
				</div>

				<hr>

				<div class="form-group">
					<textarea class="form-control" id="pengumuman" name="pengumuman" placeholder="buat pengumuman tentang acara pembekalan ini" value="" oninvalid="this.setCustomValidity('Anda belum mengisi pengumuman acara pembekalan')" oninput="setCustomValidity('')" required><?= $pembekalan['isi']; ?></textarea>

					<?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
					<div class="invalid-feedback text-left">Isi pengumuman acara pembekalan.</div>
					<div class="valid-feedback text-left">Pengumuman acara pembekalan.</div>
				</div>
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			</form>
		</div>

		<div class="col-md-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="d-sm-flex align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Tabel data Instruktur </h6>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr style="text-align: center;">
									<th style="width: 5%;">No</th>
									<th width="20%">Foto</th>
									<th>Nama Instruktur</th>
									<th>Jumlah Materi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=0; ?>
								<?php foreach ($instruktur as $ins) { ?>
									<tr style="text-align: center;">
										<th scope="row"><?= $i+1; ?></th>
										<td><img src="<?= base_url('assets/img/instruktur/').$ins['image']; ?>" style="width: 50%;"></td>
										<td><?= $ins['nama'] ?></td> 
										<td><?= $jml_materi_instruktur[$i]; ?> materi <br> <a href="" class="badge badge-info badge-sm" data-toggle="modal" data-target="#modal_detail_materi">detail materi</a></td>               
									</tr>
									<?php  $i++; } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- /Content Row -->

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content --->



<!-- modal -->
<div id="modal_detail_materi" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
	<div class="modal-dialog">
		<div class="modal-content shadow">
			<div class="modal-close-area modal-close-df">
				<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
			</div>
			<div class="modal-body">
				<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%; margin-top: -5%;">
				<p class="mb-4"><b>RTIKAbdimas</b></p>

				<b>Daftar Materi</b><hr style="margin-top: -0.5%;">
				<?php $i=0; foreach ($materi_instruktur[$i] as $mtr) { ?>
					<h6 class="">"<?= $mtr['nama_materi']; ?>"</h6>
					<a href="<?= $mtr['url_materi']; ?>" target="_blank">Lihat materi</a>
					<hr>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
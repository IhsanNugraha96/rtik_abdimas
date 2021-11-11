<!--Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Template berkas</h1>
	<div class="row">
		<div class="col-lg-10">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<!-- Content Row -->
	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-2">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-1 font-weight-bold text-primary">Tabel data template berkas </h6>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 5%;">No</th>
							<th>Nama Template</th>
							<th>Nama Berkas</th>
							<th>Terakhir diperbaharui</th>
							<th>Admin</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($template as $tmp) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td class="text-left"><?= $nama_template[$i] ?></td>  
								<td class="text-left"><?= $tmp['nama_template'] ?></td>   
								<td scope="row"><?= substr($tmp['date'], 8, 2).'-'.substr($tmp['date'], 5, 2).'-'.substr($tmp['date'], 0, 4).'  <small>('.substr($tmp['date'], 11, 8).')</small>';?></td>
								<td><?= $tmp['nama']; ?></td>  								
								<td>
									<a href="" class="badge badge-warning" data-toggle="modal" data-target="#edit_template_<?=$tmp['id_template'];?>">edit template</i></a>
								</td>  
							</tr>
							<?php  $i++; } ?>

						</tbody>
					</table>
				</div>  
			</div>
		</div>


		<!-- End of Content Row --->


	</div>
	<!-- End of container-fluid -->

</div>
<!-- End of Main Content --->


<!-- modal -->
<?php $i=0; ?>
<?php foreach ($template as $tmp) { ?>
	<div id="edit_template_<?=$tmp['id_template'];?>" class="modal modal-edu-general FullColor-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
		<div class="modal-dialog">
			<div class="modal-content shadow">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body text-left">
					<h5 class="text-center mb-5">Update Template</h5>
					<form class="user was-validated" method="post" action="<?= base_url('Admin/ubah_template/'.$tmp['id_template']);?>" enctype="multipart/form-data">

						<div class="custom-file">
						    <input type="file" class="custom-file-input" id="validatedCustomFile" id="file" name="file" accept=".doc,.docx,.pdf" oninvalid="this.setCustomValidity('Anda belum mengunggah berkas..')" oninput="setCustomValidity('')" required>
						    <label class="custom-file-label" for="validatedCustomFile">Pilih berkas...</label>


							<div class="invalid-feedback">Pilih berkas template.</div>                
							<div class="valid-feedback text-left">Berkas template.</div>
						 </div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php  $i++; } ?>
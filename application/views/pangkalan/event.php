<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Data Event</h1>
	<div class="row">
		<div class="col-lg-10">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>


	<!-- Content Row -->
	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-2">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tabel data Event </h6>
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
							<th width="15%">Event</th>
							<th>Jumlah Tim</th>
							<th>Jumlah Anggota</th>
							<th>Jumlah Pembimbing</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($event) 
						{ ?>
							<?php $i=0; ?>
							<?php foreach ($event as $ev) { ?>
								<tr style="text-align: center;">
									<th scope="row"><?= $i+1; ?></th>
									<td>
										<?= $ev['nama_event'] ?>
									</td>
									<td><?= $jml_tim[$i] ?></td>   
									<td><?= $jml_relawan[$i]; ?></td>  
									<td><?= $jml_pembimbing[$i]; ?></td>        
									<td scope="row">
										<a href="<?= base_url('pangkalan/detail_event/').$ev['id_event']; ?>" name="detail" class="badge badge-primary">detail tim</i></a><br>
										<a href="<?= base_url('pangkalan/detail_pembimbing_event/').$ev['id_event']; ?>" name="detail" class="badge badge-info">detail pembimbing</i></a><br>
										<a href="<?= base_url('pangkalan/sertifikat/').$ev['id_event']; ?>" name="reset" class="badge badge-success">sertifikat</i></a>
									</td>             
								</tr>
								<?php  $i++; 
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




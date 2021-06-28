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
				<h6 class="m-0 font-weight-bold text-primary">Tabel Detail Pembimbing </h6>
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
							<th width="15%">Image</th>
							<th>Nama Pembimbing</th>
							<th>Jumlah Tim</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($pembimbing) 
						{ ?>
							<?php $i=0; ?>
							<?php foreach ($pembimbing as $pmb) { ?>
								<tr style="text-align: center;">
									<th scope="row"><?= $i+1; ?></th>
									<td>
										<img class="" src="<?= base_url('assets/img/pembimbing/'.$pmb['image']) ?>" style="width: 40%;">
									</td>
									<td><?= $pmb['nama'] ?></td>   
									<td><?= $jml_tim[$i] ?> Tim</td>  
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




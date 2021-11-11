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



	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-2">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-1 font-weight-bold text-primary">Tabel data acara pembekalan instruktur</h6>
				
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 5%;">No</th>
							<th>Nama event</th>
							<th>Materi Pembekalan</th>
							<th>Jadwal acara</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($pembekalan as $pmb) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td><?= $pmb['nama_event'] ?></td>
								<td><a href="<?= $pmb['link_materi'] ?>" target="_blank">Link materi</a></td>    
								<td>	
									<small>
										<?= substr($pmb['waktu_pelaksanaan'], 8, 2).'-'.substr($pmb['waktu_pelaksanaan'], 5, 2).'-'.substr($pmb['waktu_pelaksanaan'], 0, 4).'</b><br> Pukul : <b class="text-danger">'.substr($pmb['waktu_pelaksanaan'], 11, 5).' WIB</b>' ?>
									</small><br>
									<small><a href="<?= $pmb['link'] ?>" target="_blank">Link acara</a></small><br>
									(<?php if ((strtotime($pmb['waktu_pelaksanaan'])+ 60*60*2) <= strtotime(date('YmdHis'))) {?>
										<small class="font-weight-bold text-secondary">Acara sudah selesai</small>
									<?php } 
									elseif (strtotime($pmb['waktu_pelaksanaan']) <= (strtotime(date('YmdHis')+ 60*60*2))) {?>
										<small class="font-weight-bold text-danger">Acara sedang berlangsung</small>
									<?php }
									elseif (strtotime($pmb['waktu_pelaksanaan']) >= strtotime(date('YmdHis'))) {?>
										<small class="font-weight-bold text-info">Acara belum dilaksanakan</small>
									<?php }?>)
								</td>

								<td scope="row">
									<a href="" name="detail" class="badge badge-warning" data-toggle="modal" data-target="#ubah_<?=$pmb['id_pembekalan'];?>">ubah</i></a>

									<?php if (strtotime($pmb['akhir_penilaian']) < strtotime(date('YmdHis'))) {?>
										<a href="<?= base_url('Instruktur/sertifikat/'.$pmb['id_pembekalan']) ?>" name="detail" class="badge badge-success">Sertifikat</i></a>
									<?php } ?>
								</td>             
							</tr>
							<?php  $i++; } ?>

						</tbody>
					</table>
				</div>  
			</div>
		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content --->



  <!-- modal ubah acara pembekalan -->
  <?php $i=0;
  foreach ($pembekalan as $pmb) {?>
	  <div id="ubah_<?=$pmb['id_pembekalan'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-close-area modal-close-df">
	          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
	        </div>
	        <div class="modal-body">
	          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
	          <h5 style="margin-top: -3%;">RTIKAbdimas</h5>
	          <!-- form -->
	             <form class="user was-validated mt-3" method="post" action="<?= base_url('Instruktur/aksi_acara_pembekalan/ubah/').$pmb['id_pembekalan'];  ?>">

	                <div class="form-group">
	                    <p for="" class="text-left mb-1 font-weight-bold">URL lokasi materi :</p>
	                    <input type="text" class="form-control is_invalid form-control-sm" id="link" name="link" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi link materi acara pembekalan..')" oninput="setCustomValidity('')" value="<?=$pmb['link_materi'];?>">
	                    <div class="invalid-feedback text-left">
	                      Harap mengisi url/link materi acara pembekalan.
	                    </div>
	                </div>

	                <div class="form-group text-left">
		                <small class="font-weight-bold text-left">Informasi :</small><br>
		                <small class="text-left">Diharapkan link berkas materi yang di dapatkan sudah diatur supaya bisa di akses oleh semua orang yang memiliki link.</small>
		            </div>


	                <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
	                    Simpan
	                </button>   
	              </form>
	          <!-- akhir form -->
	        </div>
	      </div>
	    </div>
	  </div>
	<?php $i++; } ?>

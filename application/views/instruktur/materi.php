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
				<h6 class="m-0 font-weight-bold text-primary">Tabel data materi instruktur</h6>
				<div>
					<a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"data-toggle="modal" data-target="#ModalTambahMateri">Tambah Materi</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 5%;">No</th>
							<th>Nama Materi</th>
							<th>Berkas Materi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php foreach ($materi as $mtr) { ?>
							<tr style="text-align: center;">
								<th scope="row"><?= $i+1; ?></th>
								<td><?= $mtr['nama_materi'] ?></td>   
								<td><a href="<?= $mtr['url_materi']; ?>" target="_blank">Berkas materi <?= $mtr['nama_materi'] ?></a></td>          
								<td scope="row">
									<a href="" name="detail" class="badge badge-warning" data-toggle="modal" data-target="#ubah_<?=$mtr['id_materi'];?>">ubah</i></a>
									<a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_<?=$mtr['id_materi'];?>">hapus</i></a>
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



<!-- modal -->
<div id="ModalTambahMateri" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
          <h5 style="margin-top: -3%;">RTIKAbdimas</h5>
          <!-- form -->
             <form class="user was-validated mt-3" method="post" action="<?= base_url('instruktur/aksi_materi/tambah/id');  ?>">

                <div class="form-group">
                    <p for="" class="text-left mb-1 font-weight-bold">Nama materi :</p>
                    <input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi nama materi yang akan ditambahkan..')" oninput="setCustomValidity('')">
                    <div class="invalid-feedback text-left">
                      Harap mengisi nama materi.
                    </div>
                </div>

                <div class="form-group">
                    <p for="" class="text-left mb-1 font-weight-bold">URL lokasi materi :</p>
                    <input type="text" class="form-control is_invalid form-control-sm" id="url" name="url" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi url lokasi materi yang akan ditambahkan..')" oninput="setCustomValidity('')">
                    <div class="invalid-feedback text-left">
                      Harap mengisi url lokasi materi.
                    </div>
                </div>

                <div class="form-group text-left">
	                <small class="font-weight-bold text-left">Informasi :</small><br>
	                <small class="text-left">Diharapkan link lokasi berkas yang di dapatkan sudah diatur supaya bisa di akses oleh semua orang yang memiliki link.</small>
	            </div>


                <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
                    Tambah
                </button>   
              </form>
          <!-- akhir form -->
        </div>
      </div>
    </div>
  </div>




  <!-- modal ubah materi -->
  <?php $i=0;
  foreach ($materi as $mtr) {?>
	  <div id="ubah_<?=$mtr['id_materi'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-close-area modal-close-df">
	          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
	        </div>
	        <div class="modal-body">
	          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
	          <h5 style="margin-top: -3%;">RTIKAbdimas</h5>
	          <!-- form -->
	             <form class="user was-validated mt-3" method="post" action="<?= base_url('instruktur/aksi_materi/ubah/').$mtr['id_materi'];  ?>">

	                <div class="form-group">
	                    <p for="" class="text-left mb-1 font-weight-bold">Nama materi :</p>
	                    <input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi nama materi yang akan ditambahkan..')" oninput="setCustomValidity('')" value="<?=$mtr['nama_materi'];?>">
	                    <div class="invalid-feedback text-left">
	                      Harap mengisi nama materi.
	                    </div>
	                </div>

	                <div class="form-group">
	                    <p for="" class="text-left mb-1 font-weight-bold">URL lokasi materi :</p>
	                    <input type="text" class="form-control is_invalid form-control-sm" id="url" name="url" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi url lokasi materi yang akan ditambahkan..')" oninput="setCustomValidity('')" value="<?=$mtr['url_materi'];?>">
	                    <div class="invalid-feedback text-left">
	                      Harap mengisi url lokasi materi.
	                    </div>
	                </div>

	                <div class="form-group text-left">
		                <small class="font-weight-bold text-left">Informasi :</small><br>
		                <small class="text-left">Diharapkan link lokasi berkas yang di dapatkan sudah diatur supaya bisa di akses oleh semua orang yang memiliki link.</small>
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




		<?php $i=0; ?>
		<?php foreach ($materi as $mtr) { ?>
			<div id="hapus_<?=$mtr['id_materi'];?>" class="modal modal-edu-general FullColor-popup-DangerModal fade shadow" role="dialog" style="padding: 20px;">
				<div class="modal-dialog">
					<div class="modal-content shadow">
						<div class="modal-close-area modal-close-df">
							<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
						</div>
						<div class="modal-body">
							<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
	          				<h5 style="margin-top: -3%;">RTIKAbdimas</h5>

							<h6 class="mt-5">Yakin ingin menghapus</h6>
							<h5>Materi <?= $mtr['nama_materi']; ?>?</h5>
						</div>
						<div class="modal-footer">
							<a href="<?= base_url('instruktur/aksi_materi/hapus/').$mtr['id_materi']; ?>" class="badge badge-danger badge-sm">hapus</a>
						</div>
					</div>
				</div>
			</div>
			<?php  $i++; } ?>
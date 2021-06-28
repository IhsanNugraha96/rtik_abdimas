 <!-- Begin Page Content  -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengumuman</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Content Row -->

    <?php if ($jml_pengumuman == 0 ) { ?>
    	<div class="row  justify-content-md-center">
			<div class="card text-center w-60 mt-3 border-bottom-info shadow">
			  <div class="card-body">
			    <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
			  	<img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 20%:">
			    <p class="card-text">Tidak ada pengumuman yang ditemukan.</p>
			  </div>
			</div>
		</div>
    <?php } 
    else { ?>

         <!-- DataTables Pengumuman -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tabel Pengumuman</h6>
                    <div>
                      <!-- <a href="<?= base_url('users/hapus_semuaPeserta/').$pemilihan['id_pemilihan'];?>" name="hapus" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="javascript : return confirm('Apakah Anda yakin akan menghapus semua data pemilih?')"><i class="fas fa-trash text-white-50"></i> Hapus Semua Pemilih</a>
                      <a href="<?= base_url('users/excel'); ?>" class="d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download text-white-50"></i> Download Template</a>
                      <a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTambahPemilih"><i class="far fa-file-excel text-white-50"></i> Tambah Pemilih</a> -->
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th style="width: 10%;">No</th>
                      <th>Nama Event</th>
                      <th>Nama Tim</th>
                      <th>Tahun</th>
                      <th style="width: 15%;">Aksi</th> 
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($pengumuman as $pgm) { ?>
                    <tr style="text-align: center;">
                      <th scope="row"><?= $i+1; ?></th>
                      <td><?= $kgt['nama_event']; ?></td>
                      <td><?= $kgt['nama_tim']; ?></td>
                      <td><?= $kgt['date_created']; ?></td>
                      <td>  
                        <a href="<?= base_url('relawan/event/').$kgt['id_event'];?>" name="detail" class="badge badge-success">detail event</i></a>
                        </td>
                    </tr>

                    <?php $i++; ?>
                    <?php } ?>

                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    <?php } ?>


    <!-- /Content Row -->

    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tabel data partisipan (pangkalan) </h6>
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
                      <th style="width: 5%;">No</th>
                      <th width="20%">Logo</th>
                      <th>Nama Pangkalan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    <?php foreach ($komisariat as $kms) { ?>
                        <tr style="text-align: center;">
                          <th scope="row"><?= $i; ?></th>
                          <td><img src="<?= base_url('assets/img/komisariat/').$kms['logo']; ?>" style="width: 50%;"></td>
                          <td><?= $kms['nama_komisariat'] ?></td>                
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

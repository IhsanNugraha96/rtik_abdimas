<!--Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pangkalan</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4 mt-3">
            <div class="card-header py-2">
                <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tabel data pangkalan </h6>
                    <div>
                      <a href="<?= base_url('Admin/pengajuan_komisariat'); ?>" class="d-sm-inline-block btn btn-sm btn-info shadow-sm">Pengajuan Pangkalan <?php if ($jml_pengajuan_komisariat) {?><div class="badge bg-danger text-light">  <?= $jml_pengajuan_komisariat; ?> </div> <?php } ?></a>
                     
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
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                    <?php foreach ($komisariat as $kms) { ?>
                        <tr style="text-align: center;">
                          <th scope="row"><?= $i+1; ?></th>
                          <td><img src="<?= base_url('assets/img/komisariat/').$kms['logo']; ?>" style="width: 50%;"></td>
                          <td><?= $kms['nama_komisariat'] ?></td>   
                          <th scope="row"><?= $kms['email']; ?></th>  
                          <td><?= $kms['type'].'. '.$kms['nama_kota'].',<br>Provinsi. '.$kms['nama_provinsi']; ?></td>        
                          <td scope="row">
                            <a href="<?= base_url('Admin/detailPangkalan/'.urlencode($kms['id_komisariat'])); ?>" name="detail" class="badge badge-info">detail</i></a>
                              <!-- <a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_komisariat_<?=$kms['id_komisariat'];?>">hapus</i></a> -->
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

<!-- <?php $j=0; ?>
  <?php foreach ($komisariat as $kms) { ?>
    <div id="hapus_komisariat_<?=$kms['id_komisariat'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
      <div class="modal-dialog">
        <div class="modal-content shadow">
          <div class="modal-close-area modal-close-df">
            <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
          </div>
          <div class="modal-body">
            <img src="<?= base_url('assets/img/logo/').$kms['logo']; ?>" style="width: 20%;" class="mb-3">
            <h6>Hapus pangkalan</h6>
            <h5><?= $kms['nama_komisariat']; ?>?</h5> <hr>
            <p>jika pangkalan di hapus : <br>1. semua pembimbing  semua relawan yang terdaftar di pangkalan ini akan dikembalikan </p>  
          </div>
          <div class="modal-footer" style="margin-top: -10%;">
            <a href="<?= base_url('Admin/pengajuan_pangkalan/tolak/'.urlencode($kms['id_komisariat'])); ?>" class="badge badge-primary badge-sm">Tolak</a>
          </div>
        </div>
      </div>
    </div>
    <?php  $j++; } ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pangkalan</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Content Row -->
        <div class="row mb-3">
            <div class="col-lg-9">
                <div class="card mb-3 shadow">
                    <div class="card-header font-weight-bold bg-primary text-white">
                        Informasi Komisariat
                    </div>
                    
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-sm-4" style="padding: 3%;">
                                <img src="<?= base_url('assets/img/komisariat/'.$komisariat['logo']); ?>" alt="logo komisariat" style="width: 100%;" >
                            </div>
                            <div class="col-sm-8 mt-4">
                                <h4 class="card-title font-weight-bold"><?= $komisariat['nama_komisariat']; ?></h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-responsive-xs">
                                        <tr>
                                            <th style="padding: 0px;">Email</th>
                                            <th style="padding: 0px;">:</th>
                                            <td style="padding: 0px;"><?= $komisariat['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="padding: 0px;">Kontak</th>
                                            <th style="padding: 0px;">:</th>
                                            <td style="padding: 0px;"><?= $komisariat['kontak']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="padding: 0px;">Ketua Komisariat</th>
                                            <th style="padding: 0px;">:</th>
                                            <td style="padding: 0px;"><b><?= $komisariat['ketua']; ?></b></td>
                                        </tr>
                                        <tr>
                                            <th rowspan="3"></th>
                                            <th></th>
                                            <td style="padding: 0px;">
                                                <img src="<?= base_url('assets/img/komisariat/ketua/'.$komisariat['foto_ketua']); ?>" alt="ketua komisariat" style="width: 40%;" >
                                                </td>
                                        </tr>                              
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <?php if ($relawan['is_active'] < 2) { ?>
                    <div class="col-lg-12 mb-2">
                        <div class="card shadow">
                          <div class="card-header font-weight-bold bg-warning text-white">
                            <a href="" data-toggle="modal" data-target="#lihat_status" class="text-white">Status</a>
                          </div>
                          <div class="card-body">
                            <b class="card-text text-info">Menunggu konfirmasi komisariat.</b>
                          </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card shadow">
                          <div class="card-header font-weight-bold bg-info text-white">
                             <a href="<?= base_url('Relawan/edit_profil'.'#komisariat'); ?>" class="text-white">Ubah Komisariat</a>
                          </div>
                          <div class="card-body">
                            <small class="card-text">Anda dapat mengubah komisariat selama akun anda <b>belum terkonfirmasi</b> sebagai anggota dari suatu komisariat.</small>
                          </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header font-weight-bold bg-info text-white">
                                Informasi Keanggotaan
                            </div>
                            <div class="card-body text-center">
                                <img class="rounded-circle img-thumbnail mb-3" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/relawan/image/'.$relawan['image']) ?>">
                                <br>
                                <b><?= $relawan['nama_lengkap']; ?></b><br>
                                <b>Tahun masuk : </b><?= $relawan['thn_anggota']; ?><br>
                                <b>Jabatan : </b><?= $relawan['jabatan_di_rtik']; ?><br>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    
   



    <!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --->


<!-- Modal lihat status di komisariat -->
<div id="lihat_status" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">

            <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
            <p>Akun anda belum di konfirmasi oleh pihak komisariat sebagai bagian dari anggota relawan TIK komisariat  <b><?= $komisariat['nama_komisariat']; ?></b></p>
        </div>
      </div>
    </div>
</div>
<!-- Akhir Modal lihat status di komisariat -->

<!-- Modal ubah komisariat -->
<div id="ubah_komisariat" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">

            <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
            <p>Akun anda belum di konfirmasi oleh pihak komisariat sebagai bagian dari anggota relawan komisariat  <b><?= $komisariat['nama_komisariat']; ?></b></p>
        </div>
      </div>
    </div>
</div>
<!-- Akhir Modal ubah komisariat -->
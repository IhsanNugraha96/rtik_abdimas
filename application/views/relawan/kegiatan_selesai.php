<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Riwayat Kegiatan</h1>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>
  <!-- <?php print_r($kegiatan); ?> -->
  <!-- Content Row -->

  <?php if ($this->session->userdata('id_relawan')) 
  {
   if ($jml_kegiatan_telah_diikuti == 0 ) { ?>
    <div class="row  justify-content-md-center">
      <div class="card text-center w-60 mt-3 border-bottom-warning shadow">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
          <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 13vw;">
          <p class="card-text">Belum ada event kegiatan RTIKAbdimas yang selesai anda ikuti.</p>
        </div>
      </div>
    </div>
  <?php } 
  else{ ?>

   <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tabel histori kegiatan RTIKAbdimas - <?= $relawan['nama_lengkap']; ?></h6>
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

                          <?php $i=1; ?>
                          <?php foreach ($kegiatan as $kgt) { ?>
                            <tr style="text-align: center;">
                              <th scope="row"><?= $i; ?></th>
                              <td><?= $kgt['nama_event']; ?></td>
                              <td><?= $kgt['nama_tim']; ?></td>
                              <td><?= substr($kgt['date_created'], 0, 4); ?></td>
                              <td>  
                                <a href="<?= base_url('relawan/detail_kegiatan_selesai/'.urlencode($kgt['id_tim'])); ?>" class="badge badge-info" >detail event</i></a>
                                <a href="<?= base_url('relawan/sertifikat/'.urlencode($kgt['id_event'])); ?>" class="badge badge-success" >sertifikat</i></a>
                              </td>
                            </tr>

                            <?php $i++; ?>
                          <?php } ?>


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php }?>
            <?php }

  // jika pembimbing yang masuk
            elseif ($this->session->userdata('id_pembimbing')) {
              if ($jml_kegiatan_telah_diikuti == 0 ) { ?>
                <div class="row  justify-content-md-center">
                  <div class="card text-center w-60 mt-3 border-bottom-warning shadow">
                    <div class="card-body">
                      <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
                      <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 13vw;">
                      <p class="card-text">Belum ada event kegiatan RTIKAbdimas yang selesai anda ikuti.</p>
                    </div>
                  </div>
                </div>
              <?php } 

              // jika sudah ada event diikuti
              else{ ?>
               <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel histori kegiatan RTIKAbdimas - <?= $pembimbing['nama']; ?></h6>
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
                            <th>Nama Tim Bimbingan</th>
                            <th>Tahun</th>
                            <th style="width: 15%;">Aksi</th> 
                          </tr>
                        </thead>

                        <tbody>

                          <?php $i=0; ?>
                          <?php foreach ($kegiatan as $kgt) { ?>
                            <tr style="text-align: center;">
                              <th scope="row"><?= $i+1; ?></th>
                              <td><?= $kgt['nama_event']; ?></td>
                              <td>
                                  <?php foreach ($tim_bimbingan[$i] as $tim) 
                                  {?>
                                    <a href="<?= base_url('pembimbing/tim2/').$tim['id_tim']; ?>"><?= $tim['nama_tim']?> </a><br>
                                  <?php } ?>
                              </td>
                              <td><?= substr($kgt['date_created'], 0, 4); ?></td>
                              <td>  
                                <a href="<?= base_url('pembimbing/sertifikat/'.urlencode($pembimbing['id_pembimbing']).'/'.$kegiatan[$i]['id_event']); ?>" class="badge badge-success" >Sertifikat</i></a>
                              </td>
                            </tr>

                            <?php $i++; ?>
                          <?php } ?>


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php }
            } ?>
            <!-- End of Content Row -->


          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



        <!-- Modal -->
        <?php $i=1; ?>
        <?php foreach ($kegiatan as $kgt) { ?>
          <div id="detail_event_<?= $i;?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
            <div class="modal-dialog">
              <div class="modal-content shadow">
                <div class="modal-close-area modal-close-df">
                  <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
                </div>
                <div class="modal-body">
                  <h5><?= $kgt['nama_event']; ?></h5><hr>
                  <p class="font-weight-bold">Pembimbing :</p> 
                  <div class="row">
                    <div class="col-sm-3">
                      <?php if ($kgt['image'] == 'default_image.jpg') {?> 
                        <img src="<?= base_url('assets/img/relawan/image/'.$kgt['image']) ?>" class="shadow" style="width: 100%;">
                      <?php } else{ ?>
                        <img src="data:application/octet-stream;base64,<?php echo $image['berkas']; ?>"  class="shadow" style="width: 100%;">
                      <?php } ?>
                    </div>
                    <div class="col-sm-9 text-left mb-4">
                     <p><?= $kgt['nama']; ?></p>
                     <p><?= $kgt['email']; ?></p>
                     <p><?= $kgt['no_telp']; ?></p>
                   </div>
                 </div>
                 <p class="font-weight-bold">Tim <?= $kgt['nama_tim']; ?></p>
                 <div class="col-sm-3">
                  <?php if ($kgt['image'] == 'default_image.jpg') {?> 
                    <img src="<?= base_url('assets/img/relawan/image/'.$kgt['image']) ?>" class="shadow" style="width: 100%;">
                  <?php } else{ ?>
                    <img src="data:application/octet-stream;base64,<?php echo $image['berkas']; ?>"  class="shadow" style="width: 100%;">
                  <?php } ?>
                </div>
                <div class="col-sm-9 text-left mb-4">
                 <p><?= $kgt['nama_lengkap']; ?></p>
               </div>


             </div>
           </div>
         </div>
       </div>
       <?php $i++; } ?>
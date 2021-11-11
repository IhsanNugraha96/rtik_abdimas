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
        <h6 class="m-0 font-weight-bold text-primary">Tabel data partisipan (Tim Relawan) </h6>
        
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th style="width: 10%;">No</th>
              <th>Nama Tim</th>
              <th>Ketua</th>
              <th>Jumlah anggota</th>
              <th>Komisariat</th>
              <th style="width: 15%;">Aksi</th> 
            </tr>
          </thead>
          <tbody>
            <?php for ($i=0; $i < $jml_tim; $i++) { ?>
              <tr style="text-align: center;">
                <th scope="row"><?= $i+1; ?></th>
                <td><?= $nama_tim[$i]['nama_tim']; ?></td>
                <td><?php if (!$nama_ketua[$i]) { echo '-';} else{ echo $nama_ketua[$i]['nama_lengkap'];} ?></td>
                <td><?= $jml_anggota[$i]; ?></td>
                <td><?php if (!$nama_ketua[$i]) { echo '-';} else{echo $nama_ketua[$i]['nama_komisariat'];} ?></td> 
                <td>  
                  <a href="<?= base_url('Admin/lihat_detail_tim/'.urlencode($nama_tim[$i]['id_tim'])) ?>" class="badge badge-success" >detail Tim</i></a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
   <?php if (!$nama_tim) { echo "</div></div></div></div>"; } ?> <!-- </div> -->
<!-- End of Main Content --->


<!-- modal -->
<?php for ($i=0; $i < $jml_tim; $i++) { ?>
  <div id="detail_tim_<?= $i; ?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
         <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
         <h5 class=""><?= $nama_tim[$i]['nama_tim']; ?></h5>

         <h6 class="">Ketua Tim</h6>

         <?php if (!$nama_ketua[$i] || $nama_ketua[$i]['image'] == 'default_image.jpg') {?> 
          <img src="<?= base_url('assets/img/relawan/image/default_image.jpg') ?>" class="shadow" style="width: 20%;">
        <?php } else{ ?>
          <img src="data:application/octet-stream;base64,<?php echo $nama_ketua[$i]['berkas']; ?>"  class="shadow" style="width: 20%;">
        <?php } ?>

        <p><?php if (!$nama_ketua[$i]) { echo '-';} else{ echo $nama_ketua[$i]['nama_lengkap'];} ?></p>

        <h6 class=" mt-3">Anggota Tim</h6>
        <div class="row justify-content-md-center">
          <?php foreach ($nama_anggota[$i] as $agt) {?>
            <div class="col-3">
              <?php if (!$agt || $agt == 'default_image.jpg') {?> 
                <img src="<?= base_url('assets/img/relawan/image/default_image.jpg') ?>" class="shadow" style="width: 90%;">
              <?php } else{ ?>
                <img src="data:application/octet-stream;base64,<?php echo $agt['berkas']; ?>"  class="shadow" style="width: 90%;">
              <?php } ?>

              <p><?php if (!$agt) { echo '-';} else{ echo $agt['nama_lengkap'];} ?></p>
            </div>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>
</div>
<?php } ?>
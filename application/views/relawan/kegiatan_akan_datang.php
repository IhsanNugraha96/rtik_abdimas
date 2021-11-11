
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>
  <!-- Content Row -->

  <!-- jika tidak ada kegiatan/event --> 

  <?php if (!$kegiatan_akan_datang) { ?>

   <div class="row  justify-content-md-center">
    <div class="card text-center mt-3 border-bottom-info shadow">
      <div class="card-body">
        <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
        <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 20%:">
        <p class="card-text">Pada saat ini belum ada kegiatan RTIKAbdimas yang akan dilaksanakan.</p>
      </div>
    </div>
  </div>

  <!-- jika ada event dan sebelum waktu registrasi berakhir -->

<?php } else{ ?>

    <div class="row  justify-content-md-center">
      <div class="card text-center mt-3 mb-5 border-bottom-info shadow w-60">
        <div class="card-body">


          <!-- jika waktu registrasi belum dibuka -->
          <?php if (strtotime($kegiatan_akan_datang['awal_registrasi']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
            <p class="card-text"><b class="h5">Kabar gembira untuk seluruh anggota Relawan TIK Indonesia!</b> <br><br>Pada kesempatan kali ini Relawan TIK Indonesia kembali mengadakan kegiatan pengabdian di masyarakat dengan tajug</p>
            <h3 class="card-title font-weight-bold text-info mt-4">"<?= $kegiatan_akan_datang['nama_event'] ?>"</h3>
            <p class="card-text mt-4">Proses registrasi peserta akan di buka pada.  <br> Tanggal : <b class="text-danger"><?= substr($kegiatan_akan_datang['awal_registrasi'], 8, 2).'-'.substr($kegiatan_akan_datang['awal_registrasi'], 5, 2).'-'.substr($kegiatan_akan_datang['awal_registrasi'], 0, 4).'</b><br> Pukul : <b class="text-danger">'.substr($kegiatan_akan_datang['awal_registrasi'], 11, 5).' WIB</b>' ?></p>
          </div>

          <div class="card-footer">
            <b>Registrasi : </b><b class="text-danger" id="demo"> ... </b>



            <!-- jika waktu registrasi sedang berlangsung -->
          <?php } else if (strtotime($kegiatan_akan_datang['awal_registrasi']) <= strtotime(date('Y-m-d G:i:s')) && strtotime(date('Y-m-d G:i:s')) <= strtotime($kegiatan_akan_datang['akhir_registrasi'])) { ?>

            <p class="card-text"><b class="h5">Kabar gembira untuk seluruh anggota Relawan TIK Indonesia!</b> <br><br>Pada kesempatan kali ini Relawan TIK Indonesia kembali mengadakan kegiatan pengabdian di masyarakat dengan tajug</p>
            <h3 class="card-title font-weight-bold text-info mt-4">"<?= $kegiatan_akan_datang['nama_event'] ?>"</h3>

            <p class="card-text mt-4">Proses registrasi peserta <b class="text-info">sedang berlangsung</b> sampai.  <br> Tanggal : <b class="text-danger"><?= substr($kegiatan_akan_datang['akhir_registrasi'], 8, 2).'-'.substr($kegiatan_akan_datang['akhir_registrasi'], 5, 2).'-'.substr($kegiatan_akan_datang['akhir_registrasi'], 0, 4).'</b><br> Pukul : <b class="text-danger">'.substr($kegiatan_akan_datang['akhir_registrasi'], 11, 5).' WIB</b>' ?></p>

          <?php if ($relawan['is_active'] >= 3) {?>
            <?php if ($status_kepesertaan == 0) {?>
              <a href="<?= base_url('Relawan/daftar_event/'.urlencode($kegiatan_akan_datang['id_event'])); ?>" class="btn btn-primary btn-sm mb-5">Ikuti Event</a>
            <?php } else {?>
              <a href="" class="btn btn-warning btn-sm mb-5" data-toggle="modal" data-target="#batal_ikuti_event">Batal Ikuti Event</a>
            <?php } ?>
          <?php } else { ?>
            <p class="card-text text-danger">Anda harus terdaftar sebagai anggota pada salah satu pangkalan untuk mengikuti event.</p>
          <?php } ?>
          </div>

          <div class="card-footer">
            <b>Akhir registrasi : </b><b class="text-danger" id="demo"> ... </b>



          <!-- jika fase registrasi sudah berakhir -->
          <?php }  else { ?>
            <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
            <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 20%:">
            <p class="card-text">Pada saat ini belum ada kegiatan RTIKAbdimas yang akan dilaksanakan.</p>
            
            <?php } ?>
        </div>
      </div>
</div>
  <?php } ?>

  <!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



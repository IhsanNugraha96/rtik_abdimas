<!-- Begin Page Content -->
<div class="container">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>
  <div class="row">
    <div class=" col-md-10 col-sm-6 col-xs-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>
  
  <!-- Content Row -->
  <?php if ($jml_event == 0) {?>
    <div class="row  justify-content-md-center">
     <div class="card text-center w-60 mt-3 border-bottom-info shadow">
       <div class="card-body">
         <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
         <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 20%:">
         <p class="card-text">Saat ini belum ada <i>event</i> RTIKAbdimas yang telah dibuat.</p>

         <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_event_Modal">Buat Event</a>
       </div>
     </div>
   </div>
   <?php 
 } 
 else 
  {?>
    <!-- DataTables data kegiatan RTIKAbdimas -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tabel data kegiatan RTIKAbdimas</h6>
          <div>
           <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_event_Modal"><i class="fas fa-plus text-white-50"></i> Tambah <i>Event</i></a>
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
              <th>Dibuat</th>
              <th>Pembuat</th>
              <th>Status</th>
              <th style="width: 15%;">Aksi</th> 
            </tr>
          </thead>
          <tbody>

            <?php $i=1;
            foreach ($event as $ev) { ?>
             <tr style="text-align: center;">
               <th scope="row"><?= $i; ?></th>
               <td><?= $ev['nama_event']; ?></td>
               <td><?= $ev['date_created']; ?></td>
               <td><?= $ev['nama']; ?></td>
               <td>
                <?php if ($ev['role_id'] == '2' || $ev['role_id'] == '1') 
                {
                  echo '<b class="text-danger">Event sedang berlangsung.</b>';
                } 
                elseif ($ev['awal_registrasi'] == '0000-00-00 00:00:00' && $ev['akhir_penilaian'] == '0000-00-00 00:00:00' || $ev['role_id'] == '0') 
                {
                  echo '<b class="text-warning">Jadwal event belum di atur.</b>';
                } 
                elseif ($ev['role_id'] == '3') 
                {
                  echo '<b class="text-success">Event telah selesai.</b>';
                } ?>

              </td>
              <td>  
                <a href="<?= base_url('admin/detil_event/').urlencode($ev['id_event']);?>" name="detail" class="badge badge-info">detail</i></a>
                <a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_event_<?=$ev['id_event'];?>">hapus</i></a>
              </td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php } ?>
<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<!-- modal buat event -->
<div id="tambah_event_Modal" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/buat_event_baru/'.$admin['id_admin']);  ?>">
          <div class="form-group">
            <p for="" class="text-left mb-1 font-weight-bold">Nama/tema event :</p>
            <input type="nama_event" class="form-control is_invalid form-control-sm" id="nama_event" name="nama_event" placeholder="RTIKAbdimas 20**" required oninvalid="this.setCustomValidity('Anda belum mengisi nama/tema event yang akan di selenggarakan..')" oninput="setCustomValidity('')">
            <div class="invalid-feedback text-left">
              Harap mengisi nama event/tema event.
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
            Buat <i>Event</i>
          </button>              
        </form>
        <!-- akhir form -->
      </div>
    </div>
  </div>
</div>
<!-- akhir modal buat event -->


<?php $i=0;
foreach ($event as $ev) { ?>
  <div id="hapus_event_<?=$ev['id_event'];?>" class="modal modal-edu-general FullColor-popup-DangerModal fade shadow"  role="dialog" style="padding: 20px; ">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">

          <i class="fa fa-exclamation-triangle fa-3x text-danger mt-3"></i>
          <h2 class="mt-2"><b>Peringatan!</b></h2>
          <p>Anda yakin akan menghapus event ini?<br>Semua data yang telah terekam akan ikut terhapus, kecuali berkas yang sudah di unggah ke google drive.</p>
        </div>
        <div class="modal-footer" style="margin-top: -5%;">
          <a href="<?= base_url('admin/hapus_event/').urlencode($ev['id_event']);?>"class="badge badge-danger badge-xs" type="button">Hapus event</a>
        </div>  
      </div>
    </div>
  </div>
<?php $i++; } ?>
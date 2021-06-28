 <!-- Begin Page Content  -->
 <div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pengumuman Kegiatan RTIKAbdimas</h1>
  <div class="row">
    <div class="col-lg-10">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <!-- Content Row -->

  <?php if (!$data_pengumuman) {?>
   <div class="row  justify-content-md-center">
     <div class="card text-center w-60 mt-3 border-bottom-info shadow">
       <div class="card-body">
         <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
         <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 20%:">
         <p class="card-text">Pada saat ini belum ada pengumuman yang dibuat untuk kegiatan RTIKAbdimas ini.</p>
         <a href="" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_pengumuman">Buat Pengumuman</a>
       </div>
     </div>
   </div> 
 <?php } 

 else { ?>
  <div class="card shadow mb-4 mt-3">
    <div class="card-header py-2">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tabel data Instruktur </h6>
        <div>
          <a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_pengumuman">Tambah Pengumuman</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th style="width: 5%;">No</th>
              <th>Isi pengumuman</th>
              <th style="width: 150px;">Batas waktu</th>
              <th width="">Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; ?>
            <?php foreach ($data_pengumuman as $png) { ?>
              <tr style="text-align: center;">
                <th scope="row"><?= $i+1; ?></th>
                <td class="text-justify"><?= $png['isi'] ?></td>   
                <td><?= substr($png['batas_waktu'], 8, 2).'-'.substr($png['batas_waktu'], 5, 2).'-'.substr($png['batas_waktu'], 0, 4).'<br> <small>('.substr($png['batas_waktu'], 11, 5).' WIB)</small>' ?></td>          
                <td>
                  <?php if (strtotime(date('Y-m-d G:i:s')) > strtotime($png['batas_waktu'])) { echo"<small class='text-danger font-weight-bold'>Tidak aktif</small>";}
                  else {echo"<small class='text-info font-weight-bold'>Aktif</small>";} ?><br>

                  <?php if ($pengumuman_pembekalan[$i]) {echo"<small class='text-info font-weight-bold'>(Pengumuman acara pembekalan)</small>";}?>
                </td>   
                <td scope="row">
                  <a href="" name="ubah" class="badge badge-warning" data-toggle="modal" data-target="#ubah_pengumuman_<?=$png['id_pengumuman'];?>">ubah</i></a>
                  <?php if (!$pengumuman_pembekalan[$i]) {?>
                    <a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_pengumuman_<?=$png['id_pengumuman'];?>">hapus</i></a>
                  <?php }?>                  
                </td>          
              </tr>
              <?php  $i++; } ?>

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


<!-- Modal tambah pengumuman -->
<div class="modal fade" id="tambah_pengumuman" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-center">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Buat Pengumuman Baru</h5>
        <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 5% 10% 0 10%;">
        <form class="user was-validated" method="post" action="<?= base_url('admin/tambah_pengumuman');?>" enctype="multipart/form-data">

          <div class="form-group">
            <textarea type="text" class="form-control" id="isi" name="isi" placeholder="isi pengumuman" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi pengumuman')" oninput="setCustomValidity('')"></textarea>
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Harap mengisi pengumuman.</div>
            <div class="valid-feedback text-left">Isi pengumuman</div>
          </div>

          <div class="form-group">
            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum menentukan tanggal')" oninput="setCustomValidity('')">
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Tentukan tanggal berakhirnya pengumuman.</div>
            <div class="valid-feedback text-left">Tanggal</div>
          </div>

          <div class="form-group">
            <input type="time" class="form-control" id="time" name="time"  min="00:00" max="23:59" required oninvalid="this.setCustomValidity('Harap tentukan batas waktu')" oninput="setCustomValidity('')">
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Tentukan waktu berakhirnya pengumuman.</div>
            <div class="valid-feedback text-left">Waktu</div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal tambah pengumuman -->

<!-- ubah_pengumuman -->
<?php $i=0; ?>
<?php foreach ($data_pengumuman as $png) { ?>
  <div id="ubah_pengumuman_<?=$png['id_pengumuman'];?>" class="modal modal-edu-general FullColor-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body text-left">
          <h5 class="text-center">Update Pengumuman</h5>
          <form class="user was-validated" method="post" action="<?= base_url('admin/aksi_pengumuman/edit/'.$png['id_pengumuman']);?>" enctype="multipart/form-data">

          <div class="form-group">
            <textarea type="text" class="form-control" id="isi" name="isi" placeholder="isi pengumuman" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi pengumuman')" oninput="setCustomValidity('')"><?=$png['isi']; ?></textarea>
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Harap mengisi pengumuman.</div>
            <div class="valid-feedback text-left">Isi pengumuman</div>
          </div>

          <div class="form-group">
            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal" value="<?= substr($png['batas_waktu'], 0, 10);?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum menentukan tanggal')" oninput="setCustomValidity('')">
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Tentukan tanggal berakhirnya pengumuman.</div>
            <div class="valid-feedback text-left">Tanggal</div>
          </div>

          <div class="form-group">
            <input type="time" class="form-control" id="time" name="time"  min="00:00" max="23:59" value="<?= substr($png['batas_waktu'], 11, 5)?>" required oninvalid="this.setCustomValidity('Harap tentukan batas waktu')" oninput="setCustomValidity('')">
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Tentukan waktu berakhirnya pengumuman.</div>
            <div class="valid-feedback text-left">Waktu</div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php  $i++; } ?>


  <!-- hapus pengumuman -->
  <?php $i=0; ?>
<?php foreach ($data_pengumuman as $png) { ?>
  <div id="hapus_pengumuman_<?=$png['id_pengumuman'];?>" class="modal modal-edu-general FullColor-popup-DangerModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body text-left">
          <h5 class="text-center">Yakin akan menghapus pengumuman ini?</h5>          
        </div>
        <div class="modal-footer" style="margin-top: -10%">
          <a href="<?= base_url('admin/aksi_pengumuman/hapus/'.$png['id_pengumuman']); ?>" class="badge badge-danger badge-sm">Hapus</a>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php  $i++; } ?>
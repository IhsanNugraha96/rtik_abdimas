<!--Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Keahlian Relawan</h1>
    <div class="row">
        <div class="col-lg-10">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4 mt-3">
            <div class="card-header py-2">
                <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tabel data keahlian relawan </h6>
                    <div>
                      <a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTambahKeahlian">Tambah Keahlian</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th style="width: 5%;">No</th>
                      <th>Nama Keahlian</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                    <?php foreach ($keahlian as $keah) { ?>
                        <tr style="text-align: center;">
                          <th scope="row"><?= $i+1; ?></th>
                          <td><?= $keah['nama_keahlian']; ?></td>        
                          <td scope="row">
                            <a href="" name="detail" class="badge badge-info" data-toggle="modal" data-target="#edit_keahlian_<?=$keah['id_keahlian'];?>">edit</i></a>

                            <a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_keahlian_<?=$keah['id_keahlian'];?>">hapus</i></a>
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


<!-- Modal tambah pengumuman -->
<div class="modal fade" id="ModalTambahKeahlian" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-center">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Tambah Keahlian Baru</h5>
        <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 5% 10% 0 10%;">
        <form class="user was-validated" method="post" action="<?= base_url('Admin/pengajuan_keahlian/tambah/1');?>" enctype="multipart/form-data">

          <div class="form-group">
            <input type="text" class="form-control" id="keahlian" name="keahlian" placeholder="nama keahlian" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda mengisi nama keahlian')" oninput="setCustomValidity('')">
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Masukkan nama keahlian.</div>
            <div class="valid-feedback text-left">Nama kehalian</div>
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


<?php $j=0; ?>
  <?php foreach ($keahlian as $keah) { ?>
    <div id="edit_keahlian_<?=$keah['id_keahlian'];?>" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-center">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Ubah Keahlian</h5>
        <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 5% 10% 0 10%;">
        <form class="user was-validated" method="post" action="<?= base_url('Admin/pengajuan_keahlian/ubah/'.$keah['id_keahlian']); ?>" enctype="multipart/form-data">

          <div class="form-group">
            <input type="text" class="form-control" id="keahlian" name="keahlian" placeholder="nama keahlian" value="<?= $keah['nama_keahlian'] ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda mengisi nama keahlian')" oninput="setCustomValidity('')">
            <!-- menampilkan notifikasi kesalahan inputan -->
            <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
            <div class="invalid-feedback text-left">Masukkan nama keahlian.</div>
            <div class="valid-feedback text-left">Nama kehalian</div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <?php  $j++; } ?>



<?php $j=0; ?>
  <?php foreach ($keahlian as $keah) { ?>
    <div id="hapus_keahlian_<?=$keah['id_keahlian'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
      <div class="modal-dialog">
        <div class="modal-content shadow">
          <div class="modal-close-area modal-close-df">
            <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
          </div>
          <div class="modal-body">
             <i class="fa fa-exclamation-triangle fa-3x text-warning"></i>
            
            <h6>Hapus daftar keahlian</h6>
            <h5><?= $keah['nama_keahlian']; ?>?</h5>
          </div>
          <div class="modal-footer" style="margin-top: -10%;">
            <a href="<?= base_url('Admin/pengajuan_keahlian/hapus/'.$keah['id_keahlian']); ?>" class="badge badge-danger badge-sm">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    <?php  $j++; } ?>
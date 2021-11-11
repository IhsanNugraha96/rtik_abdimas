<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Administrator</h1>
    <div class="row">
        <div class="col-lg-10">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>


    <!-- Content Row -->
    <!-- DataTables data Administrator RTIKAbdimas -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tabel data Administrator</h6>
                    <div>
                      <?php if ($admin['role_id']=='1') {?>
                       <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_admin_Modal"><i class="fas fa-plus text-white-50"></i> Tambah <i>Admin</i></a>
                      <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th style="width: 10%;">No</th>
                      <th>Nama Admin</th>
                      <th>jabatan</th>
                      <th>email</th>
                      <th>image</th>

                      <?php if ($admin['role_id']=='1') {?>
                      <th style="width: 15%;">Aksi</th> 
                      <?php } ?>

                    </tr>
                  </thead>
                  <tbody>

                    <?php $i=0;
                    foreach ($administrator as $adm) { ?>
                      <?php if ($adm['id_admin'] != 'dummy') {?>
                    	<tr style="text-align: center;">
                          	<th scope="row"><?= $i+1; ?></th>
                          	<td><?= $adm['nama']; ?></td>
                          	<td><?= $adm['jabatan']; ?></td>
                          	<td><?= $adm['email']; ?></td>
                          	<td>
                              <img src="<?= base_url('assets/img/admin/'.$adm['image']) ?>" width="50">
                             
                            <?php if ($admin['role_id']=='1') {?>
                            <td>
                                <?php if ($adm['role_id']=='0') { ?>  
                              	<a href="<?= base_url('Admin/reset_password/admin/'.urlencode($adm['email'])) ?>" name="reset" class="badge badge-info">reset password</i></a>
                              	<a href="" data-toggle="modal" data-target="#hapus_admin_Modal_<?= $adm['id_admin']; ?>" name="detail" class="badge badge-danger">hapus</i></a>
                              <?php } else { echo "Super Admin";} ?>
                            </td>
                            <?php } ?>

                        </tr>
                    <?php $i++; }} ?>

                   

                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    <!-- /Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div id="tambah_admin_Modal" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
          <!-- form -->
             <form class="user was-validated mt-3" method="post" action="<?= base_url('Admin/tambah_admin');  ?>">

                <div class="form-group">
                    <p for="" class="text-left mb-1 font-weight-bold">Email :</p>
                    <input type="email" class="form-control is_invalid form-control-sm" id="email" name="email" placeholder="rtikabdimas@gmail.com" required oninvalid="this.setCustomValidity('Anda belum mengisi email admin yang akan ditambahkan..')" oninput="setCustomValidity('')">
                    <div class="invalid-feedback text-left">
                      Harap mengisi email.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
                    Tambah
                </button>              
              </form>
          <!-- akhir form -->
        </div>
      </div>
    </div>
  </div>



  <!-- Logout Modal-->
  <?php foreach ($administrator as $adm) { ?>
  <div class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" id="hapus_admin_Modal_<?= $adm['id_admin']; ?>" tabindex="-1" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
          <i class="fa fa-exclamation-triangle fa-3x text-warning"></i>
          <h4 class="mt-2"><b>Yakin anda mau menghapus admin?</b></h4>
        <p>Pilih tombol "Hapus" di bawah jika Anda akan menghapus akun admin.</p></div>
        <div class="modal-footer warning-md" style="margin-top: -7%;">
          <a class="badge badge-danger badge-xs" href="<?= base_url('Admin/hapus_akun/admin/'.$adm['id_admin']) ?>">Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
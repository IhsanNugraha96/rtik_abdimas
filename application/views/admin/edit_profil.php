<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Admin</h1>
    <div class="row">
        <div class="col-lg-10 ">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <!-- Content Row -->
 
    <!-- update profil akun -->
    <section class="akun" id="akun">
        <h5 class="mt-3"><b>Informasi Akun</b></h5>
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <h6>Perbaharui profil akun<br>Username dan alamat email </h6> 
            </div>


            <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
                <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
                  <div class="card-body mt-3">
                    <form class="user was-validated" method="post" action="<?= base_url('Admin/update_data/akun/').$admin['id_admin']; ?>" enctype="multipart/form-data">
                     <label for="Foto"><b>Photo</b></label><br>
                     <img class="img-profile rounded-circle mb-3 shadow img-thumbnail" style="height: 110px; width: 110px;" alt="background profil" src="   <?= base_url('assets/img/admin/'.$admin['image']) ?>" class="rounded-circle"><br>
                    
                 <div class="form-group">
                    <label for="foto" class="btn btn-outline-primary btn-sm shadow">Pilih Foto Profil</label>
                    <a href="<?= base_url('Admin/update_data/hapus_foto/').$admin['id_admin']; ?>" class="btn btn-outline-primary btn-sm shadow  mb-2">Hapus Foto Profil</a><br>

                    <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" value="Pilih Foto Profil" style="visibility:hidden;" onchange="this.form.submit();">
                </div>

                <div class="form-group" style="margin-right: 30%; margin-top: -5%;" >
                    <label for="Username"><b>Username</b></label>
                    <input type="text" class="form-control is_invalid form-control-sm shadow" id="Username" name="Username" aria-describedby="Username" placeholder="<?= $admin['username']; ?>" value="<?= $admin['username']; ?>" required>
                    <div class="invalid-feedback">
                        Username harus di isi.
                    </div>            
                </div>

                <div class="form-group" style="margin-right: 30%;" >
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control is_invalid form-control-sm shadow" id="email" name="email" aria-describedby="email" placeholder="<?= $admin['email']; ?>" value="<?= $admin['email']; ?>" required>
                    <div class="invalid-feedback">
                        Email harus di isi.
                    </div>            
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm shadow" style="float: right;">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
</section> <hr>
<!-- akhir update profil akun -->

<!-- update profil biodata -->
<section class="bio" id="bio">
    <h5 class="mt-5"><b>Informasi Biodata admin</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui biodata admin<br>Serta informasi lainnya </h6>
        </div>


        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
              <div class="card-body mb-4">
                <form class="user was-validated" method="post" action="<?= base_url('Admin/update_data/biodata/').$admin['id_admin']; ?>" enctype="multipart/form-data">
        
                    <div class="form-group mt-3" style="margin-right: 30%; margin-top: -5%;" >
                        <label for="nik"><b>NIK</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nik" name="nik" aria-describedby="nik" placeholder="<?= $admin['no_induk']; ?>" value="<?= $admin['no_induk']; ?>" minlength="16" required>
                        <div class="invalid-feedback">
                            NIK harus di isi.
                        </div>            
                    </div>

                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="nama"><b>Nama Lengkap</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" aria-describedby="nama" placeholder="<?= $admin['nama']; ?>" value="<?= $admin['nama']; ?>" required>
                        <div class="invalid-feedback">
                            Nama lengkap harus di isi.
                        </div>            
                    </div>


                <div class="form-group" style="margin-right: 30%;">
                    <label for="hp"><b>Jabatan</b></label>
                    <input type="text" class="form-control form-control-sm" id="jabatan"  name="jabatan" placeholder="<?= $admin['jabatan'] ?>" value="<?= $admin['jabatan'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi jabatan anda di RTIK..')" oninput="setCustomValidity('')">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('hp', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan jabatan anda.</div>
                </div>

            </div>
            <div class="card-footer" style="margin-top: -6%;">
                <button type="submit" class="btn btn-primary btn-sm shadow" style="float: right;">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
</section>
<hr>
<!-- akhir update profil biodata -->



<!-- update password -->
<section class="password" id="password">
    <h5 class="mt-5"><b>Ubah password</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui password <br> untuk keamanan</h6>
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">

                <div class="card-body">
                    <form class="user was-validated" method="post" action="<?= base_url('Admin/update_data/ubah_password/').$admin['id_admin']; ?>">
                        <div class="form-group mt-3" style="margin-right: 30%;" >
                            <label for="passwordlama"><b>Password lama</b></label>
                            <input type="password" class="form-control form-password form-control-sm" id="passwordlama" name="passwordlama" placeholder="Password lama" required oninvalid="this.setCustomValidity('Anda belum mengisi password lama untuk akun anda..')" oninput="setCustomValidity('')" minlength="8" maxlength="50">
                            <!-- menampilkan notifikasi kesalahan inputan -->
                            <?= form_error('passwordlama', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>

                        <div class="form-group mt-3" style="margin-right: 30%;" >
                            <label for="passwordbaru"><b>Password baru</b></label>
                            <input type="password" class="form-control form-password form-control-sm" id="passwordbaru" name="passwordbaru" placeholder="Password baru" required oninvalid="this.setCustomValidity('Anda belum mengisi password baru untuk akun anda..')" oninput="setCustomValidity('')" minlength="8" maxlength="50">
                            <!-- menampilkan notifikasi kesalahan inputan -->
                            <?= form_error('passwordbaru', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>

                        <div class="form-group mt-3" style="margin-right: 30%;" >
                            <label for="passwordbaru2"><b>Ulangi password</b></label>
                            <input type="password" class="form-control form-password form-control-sm" id="passwordbaru2" name="passwordbaru2" placeholder="Password baru" required oninvalid="this.setCustomValidity('Harap mengulangi password baru anda..')" oninput="setCustomValidity('')" minlength="8" maxlength="50">
                            <!-- menampilkan notifikasi kesalahan inputan -->
                            <?= form_error('passwordbaru2', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-sm shadow"> Ubah </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- akhir update password -->

<!-- Hapus akun -->
<?php if ($admin['role_id'] != '1'): ?>   
    <hr>
    <section class="hapus_akun">
        <h5 class="mt-5"><b>Hapus Akun</b></h5>
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <h6>Hapus akun secara permanen</h6>
            </div>
            <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
                <div class="card bg-white shadow mb-5" style="max-width: 90%; align-content: right; margin-left: 5%;">

                    <div class="card-body text-center" style="padding: 5%;">
                        <i class="fas fa-exclamation-triangle fa-3x text-danger mb-4 mt-4"></i>
                        <h6>Setelah akun anda dihapus, semua data yang terhubung dengan akun anda akan ikut terhapus secara permanen. Sebelum anda menghapus akun, harap <i>backup</i>/simpan data-data penting yang tersimpan pada sistem.</h6>
                    </div>

                    <div class="card-footer">
                        <a href="" data-toggle="modal" data-target="#hapus_admin_Modal" class="btn btn-danger btn-sm shadow">Hapus Akun</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif ?>
<!-- akhir hapus akun -->


<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content-->


<!-- Modal -->
<div class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" id="hapus_admin_Modal" tabindex="-1" role="dialog" style="padding: 20px;">
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
          <a class="badge badge-danger badge-xs" href="<?= base_url('Admin/hapus_akun/admin2/'.$admin['id_admin']) ?>">Hapus</a>
        </div>
      </div>
    </div>
</div>

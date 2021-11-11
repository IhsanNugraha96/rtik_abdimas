<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
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
                <h6>Perbaharui profil akun<br>alamat email </h6> 
            </div>


            <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
                <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
                  <div class="card-body mt-3">
                    <form class="user was-validated" method="post" action="<?= base_url('Instruktur/update_data/akun/').$instruktur['id_instruktur']; ?>" enctype="multipart/form-data">
                       <label for="Foto"><b>Photo</b></label><br>
                       <img class="img-profile rounded-circle mb-3 shadow img-thumbnail" style="height: 110px; width: 110px;" alt="background profil" src="   <?= base_url('assets/img/instruktur/'.$instruktur['image']) ?>" class="rounded-circle"><br>
                       
                       <div class="form-group">
                        <label for="foto" class="btn btn-outline-primary btn-sm shadow">Pilih Foto Profil</label>
                        <a href="<?= base_url('Instruktur/update_data/hapus_foto/').$instruktur['id_instruktur']; ?>" class="btn btn-outline-primary btn-sm shadow  mb-2">Hapus Foto Profil</a><br>

                        <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" value="Pilih Foto Profil" style="visibility:hidden;" onchange="this.form.submit();">
                    </div>

                    <div class="form-group" style="margin-right: 30%; margin-top: -5%;" >
                        <label for="email"><b>Email</b></label>
                        <input type="email" class="form-control is_invalid form-control-sm shadow" id="email" name="email" aria-describedby="email" placeholder="<?= $instruktur['email']; ?>" value="<?= $instruktur['email']; ?>" required>
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
    <h5 class="mt-5"><b>Informasi Biodata instruktur</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui biodata instruktur<br>Serta informasi lainnya </h6>
        </div>


        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
              <div class="card-body mb-4">
                <form class="user was-validated" method="post" action="<?= base_url('Instruktur/update_data/biodata/').$instruktur['id_instruktur']; ?>" enctype="multipart/form-data">
                    

                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="nama"><b>Nama Lengkap</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" aria-describedby="nama" placeholder="<?= $instruktur['nama']; ?>" value="<?= $instruktur['nama']; ?>" required>
                        <div class="invalid-feedback">
                            Nama lengkap harus di isi.
                        </div>            
                    </div>


                    <div class="form-group" style="margin-right: 30%;">
                        <label for="hp"><b>Tempat lahir</b></label>
                        <input type="text" class="form-control form-control-sm" id="tempat_lahir"  name="tempat_lahir" placeholder="<?= $instruktur['tempat_lahir'] ?>" value="<?= $instruktur['tempat_lahir'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi di kota mana anda lahir..')" oninput="setCustomValidity('')" >
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <?= form_error('hp', '<small class="text-danger pl-3">','</small>'); ?>
                        <div class="invalid-feedback">Masukkan tempat lahir anda.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <label for="hp"><b>Tanggal lahir</b></label>
                        <input type="date" class="form-control form-control-sm" id="tgal_lahir" name="tgal_lahir" value="<?= $instruktur['tgal_lahir'] ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi tanggal lahir..')" oninput="setCustomValidity('')">
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <div class="invalid-feedback">Masukkan tanggal lahir anda.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input  " id="laki-laki" name="jenis_kelamin" value="0" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')" <?php if ($instruktur['jenis_kelamin'] == '0') { echo "checked";} ?> >
                          <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input form-control  " id="perempuan" name="jenis_kelamin" value="1" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')" <?php if ($instruktur['jenis_kelamin'] == '1') { echo "checked";} ?>>
                          <label class="custom-control-label" for="perempuan">Perempuan</label><br>
                      </div>
                  </div>

                  <div class="form-group" style="margin-right: 30%;">
                    <label for="hp"><b>No. Handphone</b></label>
                    <input type="number" class="form-control form-control-sm" id="no_hp"  name="no_hp" placeholder="<?= $instruktur['no_hp'] ?>" value="<?= $instruktur['no_hp'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi no. hanphone anda..')" oninput="setCustomValidity('')" minlength="11" maxlength="16">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('hp', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan no. handphone anda.</div>
                </div>

                <div class="form-group" style="margin-right: 30%;">
                    <label for="hp"><b>Profesi</b></label>
                    <input type="text" class="form-control form-control-sm" id="profesi"  name="profesi" placeholder="<?= $instruktur['profesi'] ?>" value="<?= $instruktur['profesi'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi profesi anda..')" oninput="setCustomValidity('')" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('hp', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan profesi anda.</div>
                </div>

                <div class="form-group" style="margin-right: 30%;">
                    <label for="provinsi"  ><b>Provinsi</b></label>
                    <select class="custom-select custom-select-sm" id="provinsi" name="provinsi" required oninvalid="this.setCustomValidity('Anda belum memilih provinsi..')" oninput="setCustomValidity('')">
                     
                    </select>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <div class="invalid-feedback">Pilih provinsi.</div>


                    <label for="kota" class="mt-3"><b>Kabupaten</b></label>
                    <select class="custom-select custom-select-sm" id="kota" name="kota" required oninvalid="this.setCustomValidity('Anda belum memilih di kota mana anda tinggal..')" oninput="setCustomValidity('')">
                        <?php if ($instruktur['id_provinsi'] == $distrik[0]['id_provinsi']) 
                        {
                            echo "<option value=''>--Pilih Kabupaten/Kota--</option>";
                            foreach ($distrik as $distrik) 
                            {                        
                                echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
                                if ($instruktur['id_kota'] == $distrik['id_kota']) {
                                    echo "selected";
                                } 
                                echo ">";

                                if ($distrik['type'] == 'Kabupaten') 
                                {
                                    echo "Kab".". ".$distrik['nama_kota'];
                                } 
                                else{
                                    echo $distrik['type'].". ".$distrik['nama_kota']; 
                                }
                                echo "</option>";
                            };
                        } ?>

                    </select>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <div class="invalid-feedback">Masukkan Kabupaten/Kota.</div>
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
                    <form class="user was-validated" method="post" action="<?= base_url('Instruktur/update_data/ubah_password/').$instruktur['id_instruktur']; ?>">
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
                    <a href="" data-toggle="modal" data-target="#hapus_instruktur_Modal" class="btn btn-danger btn-sm shadow">Hapus Akun</a>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- akhir hapus akun -->


<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content-->


<!-- Modal -->
<div class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" id="hapus_instruktur_Modal" tabindex="-1" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
          <i class="fa fa-exclamation-triangle fa-3x text-warning"></i>
          <h4 class="mt-2"><b>Yakin anda mau menghapus akun?</b></h4>
          <p>Pilih tombol "Hapus" di bawah jika Anda akan menghapus akun instruktur.</p></div>
          <div class="modal-footer warning-md" style="margin-top: -7%;">
              <a class="badge badge-danger badge-xs" href="<?= base_url('Instruktur/update_data/hapus_akun/'.$instruktur['id_instruktur']) ?>">Hapus</a>
          </div>
      </div>
  </div>
</div>

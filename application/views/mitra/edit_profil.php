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
                    <form class="user was-validated" method="post" action="<?= base_url('Mitra/update_data/akun/').$mitra['id_mitra']; ?>" enctype="multipart/form-data">
                       <label for="Foto"><b>Photo</b></label><br>
                        <img class="img-profile rounded-circle mb-3 shadow img-thumbnail" style="height: 110px; width: 110px;" alt="background profil" src="   <?= base_url('assets/img/mitra/'.$mitra['logo']) ?>" class="rounded-circle"><br>
                   <div class="form-group">
                    <label for="foto" class="btn btn-outline-primary btn-sm shadow">Pilih Foto Profil</label>
                    <a href="<?= base_url('Mitra/update_data/hapus_foto/').$mitra['id_mitra']; ?>" class="btn btn-outline-primary btn-sm shadow  mb-2">Hapus Foto Profil</a><br>

                    <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" value="Pilih Foto Profil" style="visibility:hidden;" onchange="this.form.submit();">
                </div>

                <div class="form-group" style="margin-right: 30%; margin-top: -5%;" >
                    <label for="email"><b>Email </b><small> (email koordinator)</small></label>
                    <input type="email" class="form-control is_invalid form-control-sm shadow" id="email" name="email" aria-describedby="email" placeholder="<?= $mitra['email_koordinator']; ?>" value="<?= $mitra['email_koordinator']; ?>" required>
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

<!-- update profil biodata pimpinan -->
<section class="pimpinan" id="pimpinan">
    <h5 class="mt-5"><b>Informasi Biodata Pimpinan dan Koordinator</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui biodata pimpinan dan koordinator <br>Serta informasi lainnya </h6>
        </div>


        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
              <div class="card-body mb-4">
                <form class="user was-validated" method="post" action="<?= base_url('Mitra/update_data/pimpinan/').$mitra['id_mitra']; ?>" enctype="multipart/form-data">


                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="nama"><b>Nama pimpinan</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" aria-describedby="nama" placeholder="<?= $mitra['pimpinan']; ?>" value="<?= $mitra['pimpinan']; ?>" required>
                        <div class="invalid-feedback">
                            Nama pimpinan harus di isi.
                        </div>            
                    </div>


                    <div class="form-group" style="margin-right: 30%;">
                        <label for="email_pimpinan"><b>Email pimpinan</b></label>
                        <input type="text" class="form-control form-control-sm" id="email_pimpinan"  name="email_pimpinan" placeholder="<?= $mitra['email_pimpinan'] ?>" value="<?= $mitra['email_pimpinan'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi email pimpinan..')" oninput="setCustomValidity('')" >
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <?= form_error('email_pimpinan', '<small class="text-danger pl-3">','</small>'); ?>
                        <div class="invalid-feedback">Masukkan email pimpinan anda.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <label for="no_hp_pimpinan"><b>No. Telp</b></label>
                        <input type="number" class="form-control form-control-sm" id="no_hp_pimpinan" name="no_hp_pimpinan" value="<?= $mitra['no_hp_pimpinan'] ?>"  placeholder="<?= $mitra['no_hp_pimpinan'] ?>" aria-describedby="inputGroupPrepend" minlength="11" required oninvalid="this.setCustomValidity('Anda belum mengisi no. telp. pimpinan')" oninput="setCustomValidity('')">
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <div class="invalid-feedback">Masukkan no. telp. pimpinan anda.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <label for="jabatan_pimpinan"><b>Jabatan pimpinan</b></label>
                        <input type="text" class="form-control form-control-sm" id="jabatan_pimpinan" name="jabatan_pimpinan" value="<?= $mitra['jabatan_pimpinan'] ?>" placeholder="<?= $mitra['jabatan_pimpinan'] ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi jabatan pimpinan..')" oninput="setCustomValidity('')">
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <div class="invalid-feedback">Masukkan jabatan pimpinan anda.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="nama_koordinator"><b>Nama koordinator</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nama_koordinator" name="nama_koordinator" aria-describedby="nama_koordinator" placeholder="<?= $mitra['koordinator']; ?>" value="<?= $mitra['koordinator']; ?>" required>
                        <div class="invalid-feedback">
                            Nama koordinator harus di isi.
                        </div>            
                    </div>


                    <div class="form-group" style="margin-right: 30%;">
                        <label for="email_koordinator"><b>Email koordinator</b></label>
                        <input type="text" class="form-control form-control-sm" id="email_koordinator"  name="email_koordinator" placeholder="<?= $mitra['email_koordinator'] ?>" value="<?= $mitra['email_koordinator'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi email koordinator..')" oninput="setCustomValidity('')" >
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <?= form_error('email_pimpinan', '<small class="text-danger pl-3">','</small>'); ?>
                        <div class="invalid-feedback">Masukkan email(email akun) koordinator.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <label for="no_hp_koordinator"><b>No. telp</b></label>
                        <input type="number" class="form-control form-control-sm" id="no_hp_koordinator" name="no_hp_koordinator" value="<?= $mitra['no_hp_koordinator'] ?>" placeholder="<?= $mitra['no_hp_koordinator'] ?>" aria-describedby="inputGroupPrepend" minlength="11" required oninvalid="this.setCustomValidity('Anda belum mengisi no. telp. koordinator..')" oninput="setCustomValidity('')">
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <div class="invalid-feedback">Masukkan no. telp. koordinator.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <label for="jabatan_koordinator"><b>Jabatan Koordinator</b></label>
                        <input type="text" class="form-control form-control-sm" id="jabatan_koordinator" name="jabatan_koordinator" value="<?= $mitra['jabatan_koordinator'] ?>" placeholder="<?= $mitra['jabatan_koordinator'] ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi jabatan koordinator..')" oninput="setCustomValidity('')">
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <div class="invalid-feedback">Masukkan jabatan koordinator.</div>
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
<!-- akhir update profil biodata pimpinan -->



<!-- update profil biodata pimpinan -->
<section class="bio" id="bio">
    <h5 class="mt-5"><b>Informasi Biodata Mitra</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui rofil mitra <br>Serta informasi lainnya </h6>
        </div>


        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
              <div class="card-body mb-4">
                <form class="user was-validated" method="post" action="<?= base_url('Mitra/update_data/biodata/').$mitra['id_mitra']; ?>" enctype="multipart/form-data">


                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="nama"><b>Nama mitra</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" aria-describedby="nama" placeholder="<?= $mitra['nama_mitra']; ?>" value="<?= $mitra['nama_mitra']; ?>" required>
                        <div class="invalid-feedback">
                            Nama mitra harus di isi.
                        </div>            
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <label for="titik_koordinat"><b>Titik koordinat</b></label>
                        <input type="text" class="form-control form-control-sm" id="titik_koordinat" name="titik_koordinat" value="<?= $mitra['titik_koordinat'] ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi titik koordinat lokasi mitra..')" oninput="setCustomValidity('')">
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <div class="invalid-feedback">Masukkan titik koordinat lokasi mitra.</div>
                    </div>

                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="situs_web"><b>Alamat situs web</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="situs_web" name="situs_web" aria-describedby="nama" placeholder="<?= $mitra['situs_web']; ?>" value="<?= $mitra['situs_web']; ?>" required>
                        <div class="invalid-feedback">
                            Alamat situs web harus di isi.
                        </div>            
                    </div>


                    <div class="form-group" style="margin-right: 30%;">
                        <label for="profil"><b>Profil ringkas</b></label>
                        <input type="text" class="form-control form-control-sm" id="profil"  name="profil" placeholder="<?= $mitra['profil_ringkas'] ?>" value="<?= $mitra['profil_ringkas'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi profil ringkas mitra..')" oninput="setCustomValidity('')" >
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <?= form_error('email_pimpinan', '<small class="text-danger pl-3">','</small>'); ?>
                        <div class="invalid-feedback">Masukkan profil ringkas mitra.</div>
                    </div>


                    <div class="form-group" style="margin-right: 30%;">
                        <label for="provinsi"  ><b>Provinsi</b></label>
                        <select class="custom-select custom-select-sm" id="provinsi" name="provinsi" required oninvalid="this.setCustomValidity('Anda belum memilih provinsi..')" oninput="setCustomValidity('')">
                    </select>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <div class="invalid-feedback">Pilih provinsi.</div>

                    <label for="kota" class="mt-3"><b>Kabupaten</b></label>
                    <select class="custom-select custom-select-sm" id="kota" name="kota" required oninvalid="this.setCustomValidity('Anda belum memilih di kota mana anda tinggal..')" oninput="setCustomValidity('')">
                        <?php if ($mitra['id_provinsi'] == $distrik[0]['id_provinsi']) {
                            echo "<option value=''>--Pilih Kabupaten/Kota--</option>";
                            foreach ($distrik as $key => $distrik) 
                            {                        
                                echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
                                if ($id_kota == $distrik['id_kota']) {
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



                    <div class="form-group" style="margin-right: 30%;">
                        <label for="kecamatan"><b>Kecamatan</b></label>
                        <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" value="<?= $mitra['kecamatan'] ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi nama kecamatan')" oninput="setCustomValidity('')">
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <div class="invalid-feedback">Masukkan nama kecamatan.</div>
                    </div>


                    <div class="form-group" style="margin-right: 30%;">
                        <label for="alamat"><b>Alamat mitra</b></label>
                        <input type="text" class="form-control form-control-sm" id="alamat"  name="alamat" placeholder="<?= $mitra['alamat'] ?>" value="<?= $mitra['alamat'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi email pimpinan..')" oninput="setCustomValidity('')" >
                        <!-- menampilkan notifikasi kesalahan inputan -->
                        <?= form_error('alamat', '<small class="text-danger pl-3">','</small>'); ?>
                        <div class="invalid-feedback">Masukkan alamat.</div>
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
<!-- akhir update profil biodata pimpinan -->



<!-- update password -->
<section class="password mb-3" id="password">
    <h5 class="mt-5"><b>Ubah password</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui password <br> untuk keamanan</h6>
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">

                <div class="card-body">
                    <form class="user was-validated" method="post" action="<?= base_url('Mitra/update_data/ubah_password/').$mitra['id_mitra']; ?>">
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


<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content-->


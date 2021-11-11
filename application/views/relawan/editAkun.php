<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Relawan</h1>
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
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
                    <form class="user was-validated" method="post" action="<?= base_url('Relawan/update_data/akun/').$relawan['id_relawan']; ?>" enctype="multipart/form-data">
                     <label for="Foto"><b>Photo</b></label><br>
                     <img class="img-profile rounded-circle mb-3 shadow img-thumbnail" style="height: 110px; width: 110px;" alt="background profil" src="   <?= base_url('assets/img/relawan/image/'.$relawan['image']) ?>" class="rounded-circle"><br>

                 <div class="form-group">
                    <label for="foto" class="btn btn-outline-primary btn-sm shadow">Pilih Foto Profil</label>
                    <a href="<?= base_url('Relawan/update_data/hapus_foto/').$relawan['id_relawan']; ?>" class="btn btn-outline-primary btn-sm shadow  mb-2">Hapus Foto Profil</a><br>

                    <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" value="Pilih Foto Profil" style="visibility:hidden;" onchange="this.form.submit();">
                </div>

                <div class="form-group" style="margin-right: 30%; margin-top: -5%;" >
                    <label for="Username"><b>Username</b></label>
                    <input type="text" class="form-control is_invalid form-control-sm shadow" id="Username" name="Username" aria-describedby="Username" placeholder="<?= $relawan['username']; ?>" value="<?= $relawan['username']; ?>" required>
                    <div class="invalid-feedback">
                        Username harus di isi.
                    </div>            
                </div>

                <div class="form-group" style="margin-right: 30%;" >
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control is_invalid form-control-sm shadow" id="email" name="email" aria-describedby="email" placeholder="<?= $relawan['email']; ?>" value="<?= $relawan['email']; ?>" required>
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
    <h5 class="mt-5"><b>Informasi Biodata Relawan</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui biodata relawan<br>Serta informasi lainnya </h6>
        </div>


        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">
              <div class="card-body">
                <form class="user was-validated" method="post" action="<?= base_url('Relawan/update_data/biodata/').$relawan['id_relawan']; ?>" enctype="multipart/form-data">
                    <div class="form-group mt-3" style="margin-right: 30%;" >
                        <label for="id_card"><b>Id Card</b></label><br>
                        <img class="img-profile  mb-3 shadow img-thumbnail" style="height: 110px; width: 210px;" alt="id card" src="   <?= base_url('assets/img/relawan/id_card/'.$relawan['id_card']) ?>" ><br>
                        
                        <div class="form-group">
                            <label for="id_card" class="btn btn-outline-primary btn-sm shadow">Pilih id card</label>
                            <a href="<?= base_url('Relawan/update_data/hapus_id_card/').$relawan['id_relawan']; ?>" class="btn btn-outline-primary btn-sm shadow  mb-2">Hapus id card</a><br>

                            <input type="file" id="id_card" name="id_card" accept=".jpg,.jpeg,.png" value="Pilih id card" style="visibility:hidden;" onchange="this.form.submit();">    
                        </div>      
                    </div>

                    <div class="form-group" style="margin-right: 30%; margin-top: -5%;" >
                        <label for="nik"><b>NIK</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nik" name="nik" aria-describedby="nik" placeholder="<?= $relawan['nik']; ?>" value="<?= $relawan['nik']; ?>" minlength="16" required>
                        <div class="invalid-feedback">
                            NIK lengkap harus di isi.
                        </div>            
                    </div>

                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="nama"><b>Nama Lengkap</b></label>
                        <input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" aria-describedby="nama" placeholder="<?= $relawan['nama_lengkap']; ?>" value="<?= $relawan['nama_lengkap']; ?>" required>
                        <div class="invalid-feedback">
                            Nama lengkap harus di isi.
                        </div>            
                    </div>

                    <div class="form-group" style="margin-right: 30%;">
                        <label for="jenis_kelamin"><b>Jenis Kelamin</b></label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input  " id="laki-laki" name="jenis_kelamin" value="Laki-laki" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')" <?php if ($relawan['jenis_kelamin'] == "Laki-laki") { echo "checked";}?>>
                          <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input form-control  " id="perempuan" name="jenis_kelamin" value="Perempuan" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')" <?php if ($relawan['jenis_kelamin'] == "Perempuan") { echo "checked";}?>>
                          <label class="custom-control-label" for="perempuan" >Perempuan</label><br>
                      </div>
                      <!-- menampilkan notifikasi kesalahan inputan -->
                      <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">','</small>'); ?>   
                  </div>

                  <div class="form-group" style="margin-right: 30%;">
                    <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                    <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" placeholder="<?= $relawan['tempat_lahir'] ?>" value="<?= $relawan['tempat_lahir'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi kota tempat lahir anda..')" oninput="setCustomValidity('')">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan tempat lahir.</div>
                </div>

                <div class="form-group" style="margin-right: 30%;">
                    <label for="tgl_lahir"><b>Tgl. Lahir</b></label>
                    <input type="date" class="form-control form-control-sm" id="tgl_lahir" name="tgl_lahir" value="<?= $relawan['tgl_lahir'] ?>" aria-describedby="inputGroupPrepend" required>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan tanggal lahir.</div>
                </div>

                <div class="form-group" style="margin-right: 30%;">
                    <label for="hp"><b>No. Handphone</b></label>
                    <input type="tel" class="form-control form-control-sm" id="hp"  name="hp" placeholder="<?= $relawan['no_hp'] ?>" value="<?= $relawan['no_hp'] ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi no. handphone anda..')" oninput="setCustomValidity('')" minlength="11" maxlength="16">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('hp', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan no. handphone.</div>
                </div>

                <div class="form-group" style="margin-right: 30%;">
                    <label for="pendidikan"><b>Pendidikan terakhir</b></label>
                    <select class="custom-select custom-select-sm" id="pendidikan" name="pendidikan" required oninvalid="this.setCustomValidity('Anda belum memilih pendidikan terakhir anda..')" oninput="setCustomValidity('')">
                        <option value="">--Pendidikan terakhir--</option>
                        <option value="SD" <?php if ($relawan['pendidikan_terakhir'] == "SD") { echo "selected"; } ?>>SD/Sederajat</option>
                        <option value="SMP" <?php if ($relawan['pendidikan_terakhir'] == "SMP") { echo "selected"; } ?>>SMP/Sederajat</option>
                        <option value="SMA" <?php if ($relawan['pendidikan_terakhir'] == "SMA") { echo "selected"; } ?>>SMA/Sederajat</option>
                        <option value="D3" <?php if ($relawan['pendidikan_terakhir'] == "D3") { echo "selected"; } ?>>D3</option>
                        <option value="S1" <?php if ($relawan['pendidikan_terakhir'] == "S1") { echo "selected"; } ?>>S1</option>
                        <option value="S2" <?php if ($relawan['pendidikan_terakhir'] == "S2") { echo "selected"; } ?>>S2</option>
                        <option value="S3" <?php if ($relawan['pendidikan_terakhir'] == "S3") { echo "selected"; } ?>>S3</option>
                    </select>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('pendidikan', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">Pilih pendidikan terakhir.</div>
                </div>


                <div class="form-group" style="margin-right: 30%;" >
                    <label for="pekerjaan"><b>Sektor Pekerjaan</b></label>
                    <select class="custom-select custom-select-sm" id="pekerjaan" name="pekerjaan" required oninvalid="this.setCustomValidity('Anda belum memilih pekerjaan anda..')" oninput="setCustomValidity('')">
                        <option value="">--Sektor Pekerjaan--</option>
                        <option value="Pemerintahan" <?php if ($relawan['pekerjaan'] == "Pemerintahan") { echo "selected"; } ?>>Pemerintahan</option>
                        <option value="Perusahaan" <?php if ($relawan['pekerjaan'] == "Perusahaan") { echo "selected"; } ?>>Perusahaan</option>
                        <option value="Pendidikan" <?php if ($relawan['pekerjaan'] == "Pendidikan") { echo "selected"; } ?>>Pendidikan</option>
                        <option value="Media" <?php if ($relawan['pekerjaan'] == "Media") { echo "selected"; } ?>>Media</option>
                        <option value="Belum Bekerja" <?php if ($relawan['pekerjaan'] == "Belum Bekerja") { echo "selected"; } ?>>Belum Bekerja</option>
                    </select>
                    <div class="invalid-feedback">
                        Sektor pekerjaan harap di isi.
                    </div>            
                </div>

                <div style="margin-right: 30%; " >
                    <label for="provinsi"  ><b>Provinsi</b></label>
                    <select class="custom-select custom-select-sm" id="provinsi" name="provinsi" required oninvalid="this.setCustomValidity('Anda belum memilih provinsi..')" oninput="setCustomValidity('')">
                    </select>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <div class="invalid-feedback">Pilih provinsi.</div>

                    <label for="kota" class="mt-3"><b>Kabupaten</b></label>
                    <select class="custom-select custom-select-sm" id="kota" name="kota" required oninvalid="this.setCustomValidity('Anda belum memilih di kota mana anda tinggal..')" oninput="setCustomValidity('')">
                        <?php if ($relawan['provinsi'] == $distrik[0]['id_provinsi']) {
                            echo "<option value=''>--Pilih Kabupaten/Kota--</option>";
                            foreach ($distrik as $key => $distrik) 
                            {                        
                                echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
                                if ($relawan['kota'] == $distrik['id_kota']) {
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
                    <div class="invalid-feedback">Pilih Kabupaten/Kota.</div>
                </div>

                <div class="form-group" style="margin-right: 30%; margin-top: 2%;" >
                    <label for="kecamatan"><b>Kecamatan</b></label>
                    <input type="text" class="form-control is_invalid form-control-sm" id="kecamatan" name="kecamatan" aria-describedby="kecamatan" placeholder="<?= $relawan['kecamatan']; ?>" value="<?= $relawan['kecamatan']; ?>" required>
                    <div class="invalid-feedback">
                        Kecamatan harus di isi.
                    </div>            
                </div>


                <div class="form-group" style="margin-right: 30%; margin-bottom: 10%;" >
                    <label for="alamat"><b>Alamat Rumah</b></label>
                    <textarea class="form-control is_invalid form-control-sm" id="alamat" name="alamat" aria-describedby="alamat" placeholder="<?= $relawan['alamat_lengkap']; ?>" value="<?= $relawan['alamat_lengkap']; ?>" required><?= $relawan['alamat_lengkap']; ?></textarea>
                    <div class="invalid-feedback">
                        Alamat lengkap harus di isi.
                    </div>            
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


<!-- update keahlian Relawan -->
<section class="keahlian" id="keahlian">
    <h5 class="mt-5"><b>Informasi Keahlian Relawan</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui keahlian bidang TIK<br>Serta keahlian lainnya </h6>
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">

              <div class="card-body mt-3">
                <form class="user was-validated" method="post" action="<?= base_url('Relawan/update_data/keahlian/').$relawan['id_relawan']; ?>">
                    <label for="keahlian"><b>Bidang Keahlian TIK</b></label><br>
                    <div class="form-row">
                        <?php $i = 0; 
                        
                        foreach ($keahlian as $keah) { ?> 

                            <div class="custom-control col-md-10" >
                              <input type="checkbox"   class="" id="customCheck<?= $i;?>" name="keahlian_tik[]" value="<?= $keah['id_keahlian']; ?>" 
                              <?php if ($data_keahlian) 
                              {
                                  if(in_array($keah['id_keahlian'],$data_keahlian)) { echo "checked"; }
                              }?> >
                              <label class="" for="customCheck<?= $i;?>"><?= $keah['nama_keahlian']; ?></label> 
                          </div>
                          <?php $i++; } ?> 
                      </div> 

                      <div class="form-group mt-3" style="margin-right: 30%;" >
                        <label for="keahlian_lain"><b>Keahlian lain</b></label>
                        <input type="text" class="form-control form-control-sm" id="keahlian_lain" name="keahlian_lain" placeholder="<?= $relawan['keahlian_lain'] ?>" value="<?= $relawan['keahlian_lain'] ?>">
                        <div class="invalid-feedback">Masukkan Bidang keahlian lain jika ada.</div> 
                    </div>

                    <div class="form-group" style="margin-right: 30%;" >
                        <label for="lvl_keahlian"><b>Level Kompetensi</b></label>
                        <select class="custom-select custom-select-sm" id="lvl_keahlian" name="lvl_keahlian" required oninvalid="this.setCustomValidity('Anda belum memilih level keahlian..')" oninput="setCustomValidity('')">
                            <option value="">--Level Kompetensi--</option>
                            <option value="1" <?php if ($keahlian_tik) {
                               if ($keahlian_tik[0]['level_kompetensi'] == "1") { echo "selected"; } } ?>>Dasar</option>
                            <option value="2" <?php if ($keahlian_tik) { if ($keahlian_tik[0]['level_kompetensi'] == "2") { echo "selected"; } } ?>>Lanjutan</option>
                            <option value="3" <?php if ($keahlian_tik) { if ($keahlian_tik[0]['level_kompetensi'] == "3") { echo "selected"; } }?>>Lainnya</option>
                        </select>
                        <div class="invalid-feedback">
                            Harap memilih level kompetensi.
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
</section>
<hr>
<!-- akhir update keahlian -->

<!-- update informasi komisariat -->
<section class="komisariat" id="komisariat">
    <h5 class="mt-5"><b>Informasi Pangkalan</b></h5>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <h6>Perbaharui informasi relawan <br> di pangkalan</h6>
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
            <div class="card bg-white shadow mb-3" style="max-width: 90%; align-content: right; margin-left: 5%;">

                <div class="card-body">
                    <form class="user was-validated" method="post" action="<?= base_url('Relawan/update_data/komisariat/').$relawan['id_relawan']; ?>">
                        <label for="keahlian_lain"><b>Pangkalan</b></label>
                        <div class="card bg-white shadow mb-3 col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group mt-3 text-center">
                                <img class="img-profile rounded-circle mb-3 shadow img-thumbnail" style="height: 110px; width: 110px;" alt="background profil" src="<?= base_url('assets/img/komisariat/'.$komisariat['logo']) ?>"><br>
                                <b><?= $komisariat['nama_komisariat'] ?></b><br>
                                <b><i><?= $komisariat['email'] ?></i></b>
                            </div>
                        </div>

                        <div class="form-group mt-3" style="margin-right: 30%;" >
                            <label for="thn_masuk" class="control-label"><b>Tahun masuk</b></label>

                            <?php $now=date('Y');?>
                            <select class="custom-select custom-select-sm" id="thn_masuk" name="thn_masuk" required oninvalid="this.setCustomValidity('Anda belum memilih tahun masuk..')" oninput="setCustomValidity('')">
                                <option value="">--Tahun masuk--</option>
                                <?php for ($a=$now;$a>=$now-50;$a--){ ?>
                                    <option value="<?= $a; ?>" <?php if ($relawan['thn_anggota'] == $a) { echo "selected"; } ?>><?= $a ?></option>
                                <?php } ?>    
                            </select>

                            <div class="invalid-feedback">Harus mengisi tahun menjadi anggota di komisariat.</div> 
                        </div>

                        <div class="form-group mt-3" style="margin-right: 30%;" >
                            <label for="jabatan" class="control-label"><b>Jabatan di Pangkalan/Komisariat</b></label>
                            <input class="form-control form-control-sm" id="jabatan" name="jabatan" type="text" placeholder="<?= $relawan['jabatan_di_rtik'] ?>" value="<?= $relawan['jabatan_di_rtik'] ?>">                 
                            <div class="invalid-feedback">Harus mengisi jabatan di komisariat.</div> 
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm shadow" style="float: right;">Simpan</button>
                        <?php if ($relawan['is_active'] <= 1) { ?>
                            <a href="" class="btn btn-warning btn-sm shadow  mx-2" data-toggle="modal" data-target="#ubah_komisariat" style="float: right;">Ubah pangkalan</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<!-- akhir informasi komisariat -->


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
                    <form class="user was-validated" method="post" action="<?= base_url('Relawan/update_data/ubah_password/').$relawan['id_relawan']; ?>">
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
<hr>
<!-- akhir update password -->

<!-- Hapus akun -->
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
                    <a href="" data-toggle="modal" data-target="#hapus_akun" class="btn btn-danger btn-sm shadow">Hapus Akun</a>

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
<div id="ubah_komisariat" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
            </div>
            <div class="modal-head text-center">
                <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top:5%;">
                <h5 class="mt-2"><b>Ubah Pangkalan</b></h5>  
            </div>
            <div class="modal-body" style="margin-top: -5%;">
                <form class="user was-validated" method="post" action="<?= base_url('Relawan/update_data/ubah_komisariat/').$relawan['id_relawan']; ?>">

                    <select class="custom-select custom-select-sm" id="pangkalan" name="pangkalan" required oninvalid="this.setCustomValidity('Silahkan pilih pangkalan..')" oninput="setCustomValidity('')">
                        <option value="">--Pilih Pangkalan--</option>
                        <?php foreach ($all_komisariat as $akm ) {?>   
                            <option value="<?= $akm['id_komisariat']; ?>" <?php if ($relawan['komisariat'] == $akm['id_komisariat']) { echo "selected"; } ?>><?= $akm['nama_komisariat'] ?></option>
                        <?php } ?>    
                    </select>
                    <div class="invalid-feedback" style="float: left;">Pilih Pangkalan.</div>
                    <div class="valid-feedback" style="float: left;">Pangkalan.</div>
                    <button type="submit" class="btn btn-primary btn-sm shadow mt-2" style="float: right;">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div> 


<!-- Modal -->
<div class="modal modal-edu-general FullColor-popup-DangerModal fade"  id="hapus_akun" tabindex="-1" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
          <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
          <h4 class="mt-2"><b>Yakin anda mau menghapus akun?</b></h4>
          <p>Pilih tombol "Hapus" di bawah jika Anda akan menghapus akun.</p></div>
          <div class="modal-footer danger-md" style="margin-top: -7%;">
            <a class="badge badge-danger badge-xs" href="<?= base_url('Relawan/update_data/hapus_akun/'.$relawan['id_relawan']); ?>">Hapus</a>
          </div>
      </div>
  </div>
</div>

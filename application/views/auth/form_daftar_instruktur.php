      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8" data-aos="fade-up">
            <div class="p-5">
              <!-- notifikasi -->
              <?= $this->session->flashdata('message'); ?>
              <!-- akhir notifikasi -->
              <!-- <?php echo form_open_multipart('auth/formulir_relawan');?> -->
              <form class="user was-validated" method="post" action="<?= base_url('auth/formulir_instruktur');?>" enctype="multipart/form-data">
                <p  class="text-right font-italic">
                  <small><a href="<?= base_url('landingPage'); ?>">Kembali ke Beranda</a></small> | 
                  <small><a href="<?= base_url('auth'); ?>">Sudah punya akun, login!</a></small><br>
                  <small><a href="<?= base_url('auth/form_daftar_relawan'); ?>">Daftar sebagai relawan</a></small> | 
                  <small><a href="<?= base_url('auth/form_daftar_pangkalan'); ?>">Daftar sebagai pangkalan</a></small>
                </p>
                <h5 class="text-gray-900 mb-4" style="margin-top: -6%;">Informasi Personal</h5>

                <div class="form-row">
                  <div class="col-md-6  mb-4  ">
                    <!-- <label for="namaDepan">Nama Depan<b style="color: red;">*</b></label> -->
                    <input type="text" class="form-control" id="namaDepan" name="namaDepan" placeholder="Nama depan" required oninvalid="this.setCustomValidity('Anda belum mengisi nama depan..')" oninput="setCustomValidity('')" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    
                    <div class="invalid-feedback">Masukkan nama depan.</div>
                    <div class="valid-feedback">Nama Depan</div>
                  </div>

                  <div class="col-md-6  mb-4 ">
                    <!-- <label for="namaBelakang">Nama Belakang<b style="color: red;">*</b></label> -->
                    <input type="text" class="form-control" id="namaBelakang" name="namaBelakang" placeholder="Nama belakang" required oninvalid="this.setCustomValidity('Anda belum mengisi nama belakang..')" oninput="setCustomValidity('')" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('namaBelakang', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan nama belakang.</div>
                    <div class="valid-feedback">Nama Belakang</div>
                  </div>
                </div>


                <div class="form-row">
                  <div class="col-md-6  mb-4  ">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input  " id="laki-laki" name="jenis_kelamin" value="0" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')" checked >
                      <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input form-control  " id="perempuan" name="jenis_kelamin" value="1" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')">
                      <label class="custom-control-label" for="perempuan">Perempuan</label><br>
                    </div>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('jenis_kelamin', '<small class="text-danger ">','</small>'); ?>
                  </div>
                </div>


                <div class="form-row">
                  <div class="col-md-6  mb-4  ">
                    <!-- <label for="tempat_lahir">Tempat Lahir<b style="color: red;">*</b></label> -->
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir" required oninvalid="this.setCustomValidity('Anda belum mengisi kota tempat lahir anda..')" oninput="setCustomValidity('')" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('tempat_lahir', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan tempat lahir.</div>
                    <div class="valid-feedback">Tempat Lahir</div>
                  </div>

                  <div class="col-md-6  mb-4  ">
                    <!-- <label for="tgl_lahir">Tanggal Lahir<b style="color: red;">*</b></label> -->
                    <div class="input-group  ">
                     <input type="date" class="form-control" id="date2" name="tgl_lahir" placeholder="Tanggal lahir" aria-describedby="inputGroupPrepend" required>
                     <!-- menampilkan notifikasi kesalahan inputan -->
                     <?= form_error('tgl_lahir', '<small class="text-danger ">','</small>'); ?>
                     <div class="invalid-feedback">Masukkan tanggal lahir sesuai akta kelahiran/ijazah.</div>
                     <div class="valid-feedback">Tanggal Lahir</div>
                   </div>
                 </div>
               </div>


               <div class="form-row">
                <div class="col-md-6  mb-4  ">
                  <select class="custom-select" id="provinsi" name="provinsi" required oninvalid="this.setCustomValidity('Anda belum memilih provinsi..')" oninput="setCustomValidity('')" >
                  </select>
                  <!-- menampilkan notifikasi kesalahan inputan -->
                  <?= form_error('provinsi', '<small class="text-danger ">','</small>'); ?>
                  <div class="invalid-feedback">Pilih provinsi.</div>
                  <div class="valid-feedback">Provinsi</div>
                </div>

                <div class="col-md-6  mb-4  ">
                  <select class="custom-select" id="kota" name="kota" required oninvalid="this.setCustomValidity('Anda belum memilih di kota mana anda tinggal..')" oninput="setCustomValidity('')" >
                  </select>
                  <!-- menampilkan notifikasi kesalahan inputan -->
                  <?= form_error('kota', '<small class="text-danger ">','</small>'); ?>
                  <div class="invalid-feedback">Masukkan Kabupaten/Kota.</div>
                  <div class="valid-feedback">Kabupaten/Kota</div>
                </div>
              </div>


              <div class="form-row">
                <div class="col-md-6  mb-4  ">
                    <!-- <label for="namaBelakang">Nama Belakang<b style="color: red;">*</b></label> -->
                    <input type="number" class="form-control" id="hp"  name="hp" placeholder="No. Handphone" required oninvalid="this.setCustomValidity('Anda belum mengisi no. handphone anda..')" oninput="setCustomValidity('')" minlength="11" maxlength="16" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    
                    <div class="invalid-feedback">Masukkan no. handphone.</div>
                    <div class="valid-feedback">No Handphone <?= form_error('hp', '<small class="text-danger ">','</small>'); ?></div>
                </div>        
                        
                <div class="col-md-6  mb-4  ">
                  <!-- <label for="pendidikan_terakhir">Pendidikan Terakhir<b style="color: red;">*</b></label> -->
                  <input type="text" class="form-control form-password" id="profesi" name="profesi" placeholder="Profesi" required oninvalid="this.setCustomValidity('Anda belum mengisi profesi anda..')" oninput="setCustomValidity('')" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('profesi', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan profesi anda.</div>
                    <div class="valid-feedback">Profesi</div>
                </div>
              </div>



                <hr style="color: grey;">
                <h5 class="text-gray-900 mb-4">Informasi Akun <small>(Wajib di isi)</small></h5>
                <div class="form-row">
                  <div class="col-md-7  mb-4  ">
                    <!-- <label for="namaDepan">Nama Depan<b style="color: red;">*</b></label> -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required oninvalid="this.setCustomValidity('Anda harus mengisi alamat email anda dengan benar..')" oninput="setCustomValidity('')">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('email', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan email.</div>
                    <div class="valid-feedback">E-mail</div>
                  </div>

                  <div class="col-md-6  mb-4  ">
                    <!-- <label for="username">Password<b style="color: red;">*</b></label> -->
                    <input type="password" class="form-control form-password" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Anda belum mengisi password untuk akun anda..')" oninput="setCustomValidity('')" minlength="8" maxlength="50" matches="password2">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('password', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan password.</div>
                    <div class="valid-feedback">Password</div>
                  </div>

                  <div class="col-md-6  mb-4  ">
                    <!-- <label for="username">Password<b style="color: red;">*</b></label> -->
                    <input type="password" class="form-control form-password" id="password2" name="password2" placeholder="Ulangi password" required oninvalid="this.setCustomValidity('Anda diminta untuk memasukkan ulang password..')" oninput="setCustomValidity('')" minlength="8" maxlength="50" matches="password" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('password2', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Ulangi password.</div>
                    <div class="valid-feedback">Ulangi password</div>
                  </div>

                </div>
                
                <div class="row form-group">
                  <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input form-check-input form-checkbox" id="customControlValidation1">
                      <label class="custom-control-label small font-italic" for="customControlValidation1">Lihat password</label>
                    </div>
                  </div>
                  
                  <div class="col-md-9">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input form-check-input" required id="setuju" name="setuju" oninvalid="this.setCustomValidity('Anda harus menyetujui pernyataan ini..')" oninput="setCustomValidity('')">
                      <label class="custom-control-label small font-italic" for="setuju">Dengan kesadaran sendiri menyatakan kesediaan untuk mengikuti kegiatan program RTIKAbdimas dan memenuhi tugas berupa memberikan pembekalan kepada calon peserta</label>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Daftar</button>
                <a class="btn btn-secondary" data-toggle="modal" data-target="#batalModal">Batal</a>
              </form>
              <hr>      
            </div>
          </div>

          <div class="col-lg-3  d-none d-lg-block" style="align-items:center;" data-aos="fade-left">
            <div class="text-center">
              <h4 class="h4 text-gray-900 mt-5">Relawan TIK <br>Abdi Masyarakat</h4>
              <br>
            </div>
            <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>" style="width: 100%;" class="mx-auto d-block" >
          </div>
          
        </div>
      </div>
    </div>

  </div>

  <!-- batal proses modal -->

  <div class="modal fade" id="batalModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan membatalkan proses ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
         <a href="<?= base_url('landingPage');  ?>" class="btn btn-primary"> Ya </a>
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak </button>

       </div>
     </div>
   </div>
 </div>

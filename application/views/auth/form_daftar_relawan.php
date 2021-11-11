      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8" data-aos="fade-up">
            <div class="p-5">
              <!-- notifikasi -->
              <?= $this->session->flashdata('message'); ?>
              <!-- akhir notifikasi -->
              <!-- <?php echo form_open_multipart('auth/formulir_relawan');?> -->
              <form class="user was-validated" method="post" action="<?= base_url('Auth/formulir_relawan');?>" enctype="multipart/form-data">
                <p  class="text-right font-italic">
                  <small><a href="<?= base_url('LandingPage'); ?>">Kembali ke Beranda</a></small> | 
                  <small><a href="<?= base_url('Auth'); ?>">Sudah punya akun, login!</a></small><br>
                  <small><a href="<?= base_url('Auth/form_daftar_instruktur'); ?>">Daftar sebagai instruktur</a></small> | 
                  <small><a href="<?= base_url('Auth/form_daftar_pangkalan'); ?>">Daftar sebagai pangkalan</a></small>
                </p>
                <h5 class="text-gray-900 mb-4" style="margin-top: -6%;">Informasi Personal</h5>

                <div class="form-row">
                  <div class="col-md-6  mb-4  ">
                    <!-- <label for="namaDepan">Nama Depan<b style="color: red;">*</b></label> -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required oninvalid="this.setCustomValidity('Anda harus mengisi alamat email anda dengan benar..')" oninput="setCustomValidity('')">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <div class="invalid-feedback">Masukkan email.</div>
                    <div class="valid-feedback">E-mail</div>
                  </div>

                  <div class="col-md-6  mb-4  ">
                    <select class="custom-select" id="pangkalan" name="pangkalan" required oninvalid="this.setCustomValidity('Anda belum memilih pangkalan..')" oninput="setCustomValidity('')">
                      <option value="">--Pilih pangkalan--</option>
                      <?php foreach ($komisariat as $kom) {?>
                        <option value="<?=$kom['id_komisariat'];?>"><?= $kom['nama_komisariat']; ?></option>
                      <?php } ?>
                    </select>
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('komisariat', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Pilih pangkalan/komisariat.</div>
                    <div class="valid-feedback">Pangkalan</div>
                  </div>

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

                  <div class="col-md-6  mb-4  ">
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="No. induk kependudukan" required oninvalid="this.setCustomValidity('Anda belum mengisi nik anda..')" oninput="setCustomValidity('')" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <div class="invalid-feedback">Masukkan nik</div>
                    <div class="valid-feedback">Nomor induk kependudukan</div>
                  </div>
                </div>


                <div class="form-row">
                  <div class="col-md-6  mb-4  ">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input  " id="laki-laki" name="jenis_kelamin" value="Laki-laki" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')" checked >
                      <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input form-control  " id="perempuan" name="jenis_kelamin" value="Perempuan" oninvalid="this.setCustomValidity('Harap memilih jenis kelamin..')" oninput="setCustomValidity('')">
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

                <div class="col-md-6  mb-4  ">
                  <input type="text" class="form-control" id="kec"  name="kec" placeholder="Kecamatan" required oninvalid="this.setCustomValidity('Anda belum mengisi kecamatan..')" oninput="setCustomValidity('')" >
                  <!-- menampilkan notifikasi kesalahan inputan -->
                  <?= form_error('kec', '<small class="text-danger ">','</small>'); ?>
                  <div class="invalid-feedback">Masukkan Kecamatan.</div>
                  <div class="valid-feedback">Kecamatan</div>
                </div>

                <div class="col-md-12  mb-4  ">
                  <!-- <label for="alamatr">Alamat<b style="color: red;">*</b></label> -->
                  <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Kp. aaaaa rt.00/rw.00, Desa/Kelurahan. bbbbb " required oninvalid="this.setCustomValidity('Anda belum mengisi alamat tempat tinggal anda..')" oninput="setCustomValidity('')" trim ></textarea>
                  <!-- menampilkan notifikasi kesalahan inputan -->
                  <?= form_error('alamat', '<small class="text-danger ">','</small>'); ?>
                  <div class="invalid-feedback">Masukkan alamat rumah.</div>
                  <div class="valid-feedback">Alamat rumah</div>
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
                  <select class="custom-select" id="pendidikan" name="pendidikan" required oninvalid="this.setCustomValidity('Anda belum memilih pendidikan terakhir anda..')" oninput="setCustomValidity('')">
                    <option value="">--Pendidikan terakhir--</option>
                    <option value="SD">SD/Sederajat</option>
                    <option value="SMP">SMP/Sederajat</option>
                    <option value="SMA">SMA/Sederajat</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                  <!-- menampilkan notifikasi kesalahan inputan -->
                  <?= form_error('pendidikan', '<small class="text-danger ">','</small>'); ?>
                  <div class="invalid-feedback">Pilih pendidikan terakhir.</div>
                  <div class="valid-feedback">Pendidikan Terakhir</div>
                </div>
              </div>


             <div class="form-row">
                <div class="col-md-6">
               <label for="keahlian">Bidang Keahlian TIK<b style="color: red;">*</b></label><br>
              
                <?php $i = 1;
                foreach ($keahlian as $keah) { ?> 
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck<?= $i;?>" name="keahlian_tik[]" value="<?= $keah['id_keahlian']; ?>">
                      <label class="custom-control-label" for="customCheck<?= $i;?>"><?= $keah['nama_keahlian']; ?></label> 
                    </div>
                  <?php $i++; } ?> 
                </div>  

                <div class="col-md-6">
                  <div class="form-row  mb-3 ">
                    <div class="col">
                      <!-- <label for="username">Password<b style="color: red;">*</b></label> -->
                      <input type="text" class="form-control" id="keahlian_lain" name="keahlian_lain" placeholder="Bidang keahlian lain">
                      <div class="invalid-feedback">Masukkan Bidang keahlian lain jika ada. </div>
                      <div class="valid-feedback">Bidang keahlian lain</div>
                    </div>
                  </div>
                  
                  <div class="form-row  mb-4 ">
                    <div class="col">
                      <!-- "level kompetensi"-->
                      <select class="custom-select" id="level_komp" name="level_komp" required oninvalid="this.setCustomValidity('Anda belum memilih level kompetensi..')" oninput="setCustomValidity('')">
                        <option value="">--Level Kompetensi--</option>
                        <option value="1">Dasar</option>
                        <option value="2">Lanjutan</option>
                        <option value="3">lainnya</option>
                      </select>
                      <!-- menampilkan notifikasi kesalahan inputan -->
                      <?= form_error('pendidikan', '<small class="text-danger ">','</small>'); ?>
                      <div class="invalid-feedback">Pilih pendidikan terakhir.</div>
                      <div class="valid-feedback">Pendidikan Terakhir</div>
                    </div>
                  </div>
                </div>
              </div> 

              <div class="form-row">
                <div class="col-md-6  mb-4  ">
                  <select class="custom-select form-control" id="pekerjaan" name="pekerjaan" required oninvalid="this.setCustomValidity('Anda belum memilih jenis sektor pekerjaan..')" oninput="setCustomValidity('')">
                    <option value="">--Sektor Pekerjaan--</option>
                    <option value="Pemerintahan">Pemerintahan</option>
                    <option value="Perusahaan">Perusahaan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Media">Media</option>
                    <option value="Belum Bekerja">Belum Bekerja</option>
                  </select>
                  <!-- menampilkan notifikasi kesalahan inputan -->
                    
                  <div class="invalid-feedback">Pilih jenis sektor pekerjaan</div>
                  <div class="valid-feedback">Sektor Pekerjaan</div>
                </div>
               
                <div class="col-md-6  mb-4  ">
                  <input type="file" class="custom-file-input form-control" id="id_card" name="id_card" accept=".jpg, .jpeg, .png" oninvalid="this.setCustomValidity('Anda belum mengunggah foto id card..')" oninput="setCustomValidity('')" required>
                  <!-- menampilkan notifikasi kesalahan inputan -->
                    
                  <label class="custom-file-label" for="id_card">unggah file</label>
                  <div class="invalid-feedback">anda belum memilih foto id card untuk di unggah</div>
                  <div class="valid-feedback">Id card</div>
                </div>
              </div>



                <hr style="color: grey;">
                <h5 class="text-gray-900 mb-4">Informasi Akun <small>(Wajib di isi)</small></h5>
                <div class="form-row">
                  <div class="col-md-7  mb-4  ">
                    <!-- <label for="username">Username<b style="color: red;">*</b></label> -->
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Anda harus menentukan username untuk akun anda..')" oninput="setCustomValidity('')">
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('username', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan username.</div>
                    <div class="valid-feedback">Username</div>
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
                      <label class="custom-control-label small font-italic" for="setuju">Dengan kesadaran sendiri menyatakan kesediaan untuk mengikuti kegiatan pembekalan dan memenuhi tugas lapangan berupa pelayanan Relawan TIK di bawah bimbingan pembimbing</label>
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
         <a href="<?= base_url('LandingPage');  ?>" class="btn btn-primary"> Ya </a>
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak </button>

       </div>
     </div>
   </div>
 </div>

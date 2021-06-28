      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8" data-aos="fade-up">
            <div class="p-5">
              <!-- notifikasi -->
              <?= $this->session->flashdata('message'); ?>
              <!-- akhir notifikasi -->
              <!-- <?php echo form_open_multipart('auth/formulir_relawan');?> -->
              <form class="user was-validated" method="post" action="<?= base_url('auth/formulir_pangkalan');?>" enctype="multipart/form-data">
                <p  class="text-right font-italic">
                  <small><a href="<?= base_url('landingPage'); ?>">Kembali ke Beranda</a></small> | 
                  <small><a href="<?= base_url('auth'); ?>">Sudah punya akun, login!</a></small><br>
                  <small><a href="<?= base_url('auth/form_daftar_relawan'); ?>">Daftar sebagai relawan</a></small> | 
                  <small><a href="<?= base_url('auth/form_daftar_instruktur'); ?>">Daftar sebagai instruktur</a></small>
                </p>
                <h5 class="text-gray-900 mb-4" style="margin-top: -6%;">Informasi Personal</h5>

                <div class="form-row">
                  <div class="col-md-6  mb-4  ">
                    <!-- <label for="namaDepan">Nama Depan<b style="color: red;">*</b></label> -->
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pangkalan" required oninvalid="this.setCustomValidity('Anda belum mengisi nama pangkalan..')" oninput="setCustomValidity('')" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    
                    <div class="invalid-feedback">Masukkan nama pangkalan.</div>
                    <div class="valid-feedback">Nama pangkalan.</div>
                  </div>

                  <div class="col-md-6  mb-4 ">
                    <!-- <label for="namaBelakang">Nama Belakang<b style="color: red;">*</b></label> -->
                    <input type="number" class="form-control" id="kontak" name="kontak" placeholder="08***" required oninvalid="this.setCustomValidity('Anda belum mengisi kontak yang bisa dihubungi..')" oninput="setCustomValidity('')"  minlength="11" maxlength="16" >
                    <!-- menampilkan notifikasi kesalahan inputan -->
                    <?= form_error('namaBelakang', '<small class="text-danger ">','</small>'); ?>
                    <div class="invalid-feedback">Masukkan kontak telepon yang bisa dihubungi.</div>
                    <div class="valid-feedback">Kontak telepon</div>
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
                   <input type="text" class="form-control" id="srt_kesediaan" name="srt_kesediaan" placeholder="Link berkas surat kesediaan" required oninvalid="this.setCustomValidity('Anda belum mengisi link berkas surat kesediaan..')" oninput="setCustomValidity('')" > 
                    <div class="invalid-feedback">masukkan link surat kesediaan.</div>
                  <div class="valid-feedback">link surat kesediaan</div>
                  
                </div>

                <div class="col-md-6  mb-4  ">
                 <input type="text" class="form-control" id="srt_tugas" name="srt_tugas" placeholder="Link berkas surat tugas" required oninvalid="this.setCustomValidity('Anda belum mengisi link berkas surat tugas..')" oninput="setCustomValidity('')" > 
                    <div class="invalid-feedback">Masukkan link surat tugas.</div>
                  <div class="valid-feedback">Link surat tugas</div>
                </div>
              </div>

              <div class="col-md-6 custom-file mb-4">
                <input type="file" class="custom-file-input" id="logo" name="logo" oninvalid="this.setCustomValidity('Anda belum memilih logo pangkalan..')" oninput="setCustomValidity('')" accept=".jpg,.jpeg,.png" required>
                <label class="custom-file-label" for="validatedCustomFile">Pilih logo...</label>
                <div class="invalid-feedback">Pilih logo pangkalan</div>
                  <div class="valid-feedback">Logo pangkalan</div>
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
                      <label class="custom-control-label small font-italic" for="setuju">Dengan penuh kesadaran, menyatakan kesediaan untuk mengikuti kegiatan program RTIKAbdimas dan memenuhi tugas yang telah di deskripsikan.</label>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Daftar</button>
                <a class="btn btn-secondary" data-toggle="modal" data-target="#batalModal">Batal</a>
              </form>
              <hr>    

              <p class="mt-3">Peran Pangkalan/co-host RTIKAbdimas :<br>
              <ol>
                <small class="text-justify">
                  <li>Mewakili instansinya bekerjasama dengan host (Sekolah Tinggi Teknologi Garut) dan Relawan TIK Indonesia dalam melaksanakan program RTIKAbdimas yang ditunjukan dengan surat tugas dari institusi tempat bernaung;</li>
                  <li>Menyampaikan materi pembekalan pra-Diklat kepada pembimbing dan personel kelompok Relawan TIK pada waktu dan dengan materi pembekalan yang ditentukan oleh host;</li>
                  <li>Menetapkan pembimbing kelompok Relawan TIK, di mana satu pembimbing bisa membimbing lebih dari satu tim;</li>
                  <li>Menetapkan kelompok Relawan TIK yang berisi 4 s.d 5 orang, dan menentukan seorang pembimbingnya;</li>
                  <li>Melaporkan daftar tim Relawan TIK dan pembimbingnya, berikut pilihan format laporan pelayanannya (artikel berita atau artikel ilmiah) kepada host;</li>
                  <li>Menjadi pemateri Diklat untuk materi pilihan terkait pelayanan kepada mitra yang kontennya disesuaikan dengan agenda pengabdian kpd masyarakat institusinya;</li>
                  <li>Menjamin kualitas penilaian pembimbing terhadap kelompok Relawan TIK; dan</li>
                  <li>Menjadi pos pendaftaran lokal untuk publikasi artikel ilmiah (hasil pelayanan kelompok Relawan TIK) pada Jurnal Pengabdian kepada Masyarakat yang ditentukan oleh host.</li>
                </small>
              </ol>
            </p>
            </div>
          </div>

          <div class="col-lg-3  d-none d-lg-block" style="align-items:center;" data-aos="fade-left">
            <div class="text-center">
              <h4 class="h4 text-gray-900 mt-5">Relawan TIK <br>Abdi Masyarakat</h4>
              <br>
            </div>
            <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>" style="width: 100%;" class="mx-auto d-block mb-3" >
            <p class="text-justify"><small>Formulir untuk mengajukan diri sebagai Pangkalan / Co-Host / Koordinator Relawan TIK Lokal. Sebelum mengisi formulir pastikan anda telah membuat <b><a href="<?= base_url('auth/unduh_template/'.$template['nama_template']); ?>">surat kesediaan</a></b> dan <b>surat tugas</b> yang telah ditandatangani dan disajikan dalam format PDF.</small></p>
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

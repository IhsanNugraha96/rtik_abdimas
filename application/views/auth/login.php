
<div class="card-body p-0">
  <!-- Nested Row within Card Body -->
  <div class="row">
    <div class="col-lg-7 d-none d-lg-block" style="align-items:center;">
      <img src="<?= base_url('assets/img/ilustrasi/login-logo.jpg'); ?>" style="width: 39vw;" class="mx-auto d-block" data-aos="fade-right">
    </div>
    <div class="col-lg-5" data-aos="fade-up">
      <div class="p-5">
        <br>
        <!-- notifikasi -->
        <div ><?= $this->session->flashdata('message'); ?></div>
        <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
        
        <?= form_error('username', '<small class="text-danger pl-3">','</small>'); ?>
        <!-- akhir notifikasi -->
        <form class="user was-validated" method="post" action="<?= base_url('auth');  ?>">

        <div class="form-group">
          <select class="custom-select" id="user" name="user" required oninvalid="this.setCustomValidity('Anda belum memilih jenis user..')" oninput="setCustomValidity('')">
            <option value="">--Pilih User--</option>
            <option value="Pangkalan">    Pangkalan</option>
            <option value="Pembimbing">   Pembimbing</option>
            <option value="Instruktur">   Instruktur</option>
            <option value="Relawan/Peserta">Relawan/Peserta</option>
            <option value="mitra">        Mitra</option>
            <option value="Administrator">Administrator</option>
          </select>
           <div class="invalid-feedback">Harap memilih jenis user.</div> 
          <div class="valid-feedback">Jenis user</div>           
        </div>

         <div class="form-group">
          <input type="text" class="form-control is_invalid form-control-user" id="username" name="username" placeholder="username/e-mail" required oninvalid="this.setCustomValidity('Anda belum mengisi username/email..')" oninput="setCustomValidity('')"> 
          <div class="invalid-feedback">Harap mengisi username/email.</div>
          <div class="valid-feedback">Username/Email.</div>
        </div>
        <div class="form-group">
          <input type="password" class="form-control is_invalid form-control-user form-password" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Anda belum mengisi password..')" oninput="setCustomValidity('')" minlength="8" maxlength="50">
          <div class="invalid-feedback">Harap mengisi password.</div> 
          <div class="valid-feedback">Password</div> 
          
          <input type="checkbox" class="form-checkbox mt-3"> <i class="small ml-2">Lihat password</i>          
        </div>

        <!-- menampilkan notifikasi kesalahan inputan -->
        <?= form_error('pendidikan', '<small class="text-danger ">','</small>'); ?>
        <div class="invalid-feedback">Pilih pendidikan terakhir.</div>
        <div class="valid-feedback">Pendidikan Terakhir</div>
        <br>
        <button type="submit" class="btn btn-user btn-dark btn-block" style="color: white;background: #2b4e84;">
          Masuk
        </button>              
      </form>
      <hr>
      <center style="margin-top: -3%;"><a href="<?= base_url('auth/form_daftar_relawan'); ?>"><i class="small ml-2">Belum Memiliki Akun?</i></a></center>
      <center><a href="<?= base_url('landingPage'); ?>"><i class="small ml-2">Kembali ke Beranda</i></a></center>
    </div>
  </div>
</div>
</div>
</div>

</div>

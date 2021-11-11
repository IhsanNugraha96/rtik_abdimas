      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-7 d-none d-lg-block" style="align-items:center;">
            <img src="<?= base_url('assets/img/ilustrasi/login-logo.jpg'); ?>" style="width: 39vw;" class="mx-auto d-block" data-aos="fade-right">
          </div>
          <div class="col-lg-5" data-aos="fade-up">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Masuk <br>(Instruktur)</h1><br>
              </div>
               <!-- notifikasi -->
                <?= $this->session->flashdata('message'); ?>
                <!-- akhir notifikasi -->
              <form class="user was-validated" method="post" action="<?= base_url('Auth');  ?>">
              	<div class="form-group">
				    <input type="username" class="form-control is_invalid form-control-user" id="username" name="username" placeholder="username/e-mail" required>
            <div class="invalid-feedback">
				      Harap mengisi username/email.
				    </div>
				</div>
                <div class="form-group">
                  <input type="password" class="form-control is_invalid form-control-user form-password" id="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">
    				      Harap mengisi password.
    				    </div>            
                  <input type="checkbox" class="form-checkbox mt-3"> <i class="small ml-2">Lihat password</i>
                </div><br>
                <button type="submit" class="btn btn-user btn-dark btn-block" style="color: white; background: #2b4e84;">
                    Masuk
                </button>              
              </form>
              <hr>
              <center style="margin-top: -3%;"><a href="<?= base_url('LandingPage'); ?>"><i class="small ml-2">Kembali ke Beranda</i></a></center>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

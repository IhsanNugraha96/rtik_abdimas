<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Penilaian personel tim</h1> 
  <div class="row">
    <div class="col-lg-10">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>


  <!-- Content Row -->
  <!-- jika relawan belum menilai anggota tim -->
  <?php if (!$status_penilaian_anggota_tim) 
  {?>

    <div class="row" style="margin: 0 5% 5vh 5%;">
      <div class="col">
        <div class="card shadow">
          <div class="card-header">
            <b class="m-0">Penilaian personel tim</b>
          </div>
          <div class="card-body">
           <p class="text-center text-danger mb-5"><small><u>( Anda hanya bisa mengirimkan data penilaian satu kali. Jika data penilaian sudah di kirim, anda tidak bisa memperbaharuinya lagi! )</u></small></p>
           <form class="user was-validated" method="post" action="<?= base_url('Relawan/penilaian_anggota/'.$data_di_tim['id_tim']);?>">
            <?php $i=0; foreach ($personel_tim as $agt) 
            { ?>
              <b><?= ($i+1).'. '. $agt['nama_lengkap']; ?></b>

              <?php foreach ($indikator_penilaian as $idk) 
              {?>
                <p class="mx-3 mt-3"><small><?= $idk['indikator']; ?></small></p>

                <div class="row justify-content-md-center">
                  <center>

                    <b><small  class="font-weight-bold text-danger mr-3">Sangat Kurang</small></b>

                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($i+1); ?>" name="<?=$agt['id_anggota']; ?>" value="20" required>
                      <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($i+1); ?>">1</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($i+2); ?>" name="<?=$agt['id_anggota']; ?>" value="40" required>
                      <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($i+2); ?>">2</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($i+3); ?>" name="<?=$agt['id_anggota']; ?>" value="60" required>
                      <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($i+3); ?>">3</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($i+4); ?>" name="<?=$agt['id_anggota']; ?>" value="80" required>
                      <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($i+4); ?>">4</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline mb-3">
                      <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($i+5); ?>" name="<?=$agt['id_anggota']; ?>" value="100" required>
                      <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($i+5); ?>">5</label>
                    </div>

                    <b><small  class="font-weight-bold text-success">Sangat Bagus</small></b>

                  </center>
                </div>
                <hr width="90%">

                <?php $i++; } ?>

              <?php } ?>

              <div class="row">
                <div class="col text-right mx-4">
                  <button type="submit" class="btn btn-sm btn-primary">Kirim</button>                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- jika sudah menilai anggota tim-->
  <?php }  
  else 
    { ?>

      <div class="row  justify-content-md-center">
        <div class="col-md-7">
          <div class="card text-center mt-3 border-bottom-info shadow">
            <div class="card-body">
              <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 10%;">
              <h6 class="card-title font-weight-bold mt-5 mb-3">Terimakasih sudah memberikan penilaian,<br> Data penilaian sudah kami rekam!</h6>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>



    <!-- End of Content Row -->


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<div class="container">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <!-- Content Row -->
  <!-- untuk relawan -->
  <?php if ($this->session->userdata('id_relawan')) 
  {?>
    <?php if ($status_kepesertaan == 0) { ?>
     <div class="row  justify-content-md-center">
      <div class="card text-center mt-3 border-bottom-info shadow">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
          <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 20%:">
          <p class="card-text">Pada saat ini tidak ada kegiatan RTIKAbdimas yang sedang anda ikuti.</p>
        </div>
      </div>
    </div>
  <?php } else { ?>

   <div class="card shadow" style="border: none; margin: 8vh 10% 4vh 10%; align-items: center;">
    <div class="row text-center m-0 mt-3 justify-content-md-center">

      <!-- <div class="col">      -->
        <?php if ($data_di_tim) { 
         if ($data_di_tim['status_pengajuan'] >=3) {?>
          <a href="<?= base_url('relawan/tim_relawan') ?>" >
          <?php }  }?>
          <div class="card border-0">
            <div class="card-body">
              <i class="fas fa-users fa-2x"></i><br>
              <small >TIM RELAWAN</small>
            </div>
          </div>
        </a> 

        <?php if ($data_di_tim) { 
         if ($data_di_tim['status_pengajuan'] >=3) {?>
          <a href="<?= base_url('relawan/pembimbing') ?>">
          <?php }  }?>
          <div class="card border-0">
            <div class="card-body">
              <i class="fas fa-user-tie fa-2x"></i><br>
              <small>PEMBIMBING</small>
            </div>
          </div>
        </a>

        <?php if (strtotime($kegiatan_berlangsung['akhir_registrasi']) <= strtotime(date('Y-m-d G:i:s'))) 
        {?>
          <?php if ($data_di_tim) { 
         if ($data_di_tim['status_pengajuan'] >=3) {?>
           <a href="<?= base_url('relawan/mitra') ?>">
             <?php }  }?>
            <div class="card border-0">
              <div class="card-body">
                <i class="fas fa-house-user fa-2x"></i><br>
                <small>MITRA</small>
              </div>
            </div>
          </a>
      <?php }?>


    </div>
    <!-- </div> -->
    <hr style="width: 80%; float: center;">


    <!-- <div class="card" style="border: none; margin: 0 10% 0 10%; align-items: center;"> -->
      <div class="row text-center m-0 mb-3 justify-content-md-center">

        <!-- <div class="col">      -->
          <?php if (strtotime($kegiatan_berlangsung['akhir_registrasi']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
            <a href="<?= base_url('relawan/registrasi_tim') ?>"> 
            <?php } ?>
            <div class="card border-0">
              <div class="card-body">
                <i class="fas fa-user-edit fa-2x"></i><br>
                <small >REGISTRASI</small>
              </div>
            </div>
          </a> 
          <!-- </div>  -->

          <!-- <div class="col"> -->
            <?php if (strtotime($kegiatan_berlangsung['awal_pembekalan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pembekalan']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
              <a href="<?= base_url('relawan/pembekalan') ?>" > <?php } ?>
              <div class="card border-0">
                <div class="card-body">
                  <i class="fas fa-chalkboard-teacher fa-2x"></i><br>
                  <small>PEMBEKALAN</small>
                </div>
              </div>
            </a>
            <!-- </div> -->

            <!-- <div class="col"> -->
              <?php if (strtotime($kegiatan_berlangsung['awal_pelayanan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pelayanan']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
                <a href="<?= base_url('relawan/pelayanan'); ?>"> <?php } ?>
                <div class="card border-0">
                  <div class="card-body">
                    <i class="fas fa-people-carry fa-2x"></i><br>
                    <small>PELAYANAN</small>
                  </div>
                </div>
              </a>
              <!-- </div> -->

              <?php if (strtotime($kegiatan_berlangsung['awal_pelaporan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pelaporan']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
                <a href="<?= base_url('relawan/pelaporan'); ?>" > <?php } ?>
                <div class="card border-0">
                  <div class="card-body">
                    <i class="far fa-copy fa-2x"></i><br>
                    <small>PELAPORAN</small>
                  </div>
                </div>
              </a>

              <?php if (strtotime($kegiatan_berlangsung['awal_penilaian']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_penilaian']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
                <a href="<?= base_url('relawan/penilaian'); ?>" > <?php } ?>
                <div class="card border-0">
                  <div class="card-body">
                    <i class="fas fa-sort-numeric-up-alt fa-2x"></i><br>
                    <small>PENILAIAN</small>
                  </div>
                </div>
              </a>
<!-- 
              <?php if (strtotime(date('Y-m-d G:i:s')) >= strtotime($kegiatan_berlangsung['akhir_penilaian'])) { ?>
                <a href="" > <?php } ?>
                <div class="card border-0">
                  <div class="card-body">
                    <i class="far fa-id-card fa-2x"></i><br>
                    <small>SERTIFIKAT</small>
                  </div>
                </div>
              </a> -->
            </div>


            <div class="row text-center m-0 mb-2">
              <small class="font-weight-bold">INFORMASI :</small>
            </div>
            <div class="row text-left m-0 mb-3 px-3 justify-content-md-center">

              <?php if (strtotime($kegiatan_berlangsung['akhir_registrasi']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
                <small>1. Pada fase registrasi, peserta harus terdaftar pada satu tim; <br>2.  Tim tersebut sudah memiliki pembimbing.</small> <br>

              </div>
              <hr style="width: 80%; float: center;">
              <div class="row text-center m-0 mb-3  px-3 justify-content-md-center">
                <b >Akhir Registrasi : </b><b class="text-danger" id="demo1">  ... </b>
              </div>    
            </div>
            <?php 
          } 

          else if (strtotime($kegiatan_berlangsung['awal_pembekalan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pembekalan']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
            <small>1. Silahkan ikuti agenda pembekalan relawan sesuai jadwal yang tertera pada menu pembekalan;</small> <br>

          </div>
     <!--  <hr style="width: 80%; float: center;">
      <div class="row text-center m-0 mb-3  px-3 justify-content-md-center">
          <b >Akhir Pembekalan : </b><b class="text-danger" id="demo">  ... </b>
        </div> -->    
      </div>
      <?php 
    }  

    else if (strtotime($kegiatan_berlangsung['awal_pelayanan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pelayanan']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
      <small>1. Pada fase pelayanan, semua tim sudah mulai melaksanakan pelayanan dengan bimbingan dari pembimbing Tim.</small> <br>
      <small>2. jadwal pelayanan dari (Tanggal : <b class="text-danger"><?= substr($kegiatan_berlangsung['awal_pelayanan'], 8, 2).'-'.substr($kegiatan_berlangsung['awal_pelayanan'], 5, 2).'-'.substr($kegiatan_berlangsung['awal_pelayanan'], 0, 4).'</b>)' ?>

      -  (Tanggal : <b class="text-danger"><?= substr($kegiatan_berlangsung['akhir_pelayanan'], 8, 2).'-'.substr($kegiatan_berlangsung['akhir_pelayanan'], 5, 2).'-'.substr($kegiatan_berlangsung['akhir_pelayanan'], 0, 4).'</b>)' ?>.</small> <br>
    </div>
      <!-- <hr style="width: 80%; float: center;">
      <div class="row text-center m-0 mb-3  px-3 justify-content-md-center">
          <b >Akhir Pelayanan : </b><b class="text-danger" id="demo">  ... </b>
        </div>  -->   
      </div>
      <?php 
    }  

    else if (strtotime($kegiatan_berlangsung['awal_pelaporan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pelaporan']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
      <small>1. Pada fase pelaporan, semua tim harus membuat artikel laporan hasil pelayanan; <br>2. Harap memperhatikan batas waktu pembuatan laporan artikel.</small> <br>
    </div>
    <hr style="width: 80%; float: center;">
    <div class="row text-center m-0 mb-3  px-3 justify-content-md-center">
      <b >Akhir Pelaporan : </b><b class="text-danger" id="demo2">  ... </b>
    </div>    
  </div>
  <?php 
}  

else if (strtotime($kegiatan_berlangsung['awal_penilaian']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_penilaian']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
  <small>1. Pada fase penilaian, ketua maupun anggota tim akan memberikan penilaian sesuai kriteria penilaian yang telah disediakan.</small> <br>       
</div>
<hr style="width: 80%; float: center;">
<div class="row text-center m-0 mb-3  px-3 justify-content-md-center">
  <b >Akhir Penilaian : </b><b class="text-danger" id="demo3">  ... </b>
</div>    
</div>
<?php 
} ?>  
<?php } 
} ?>
<!-- akhir untuk relawan -->





<!-- untuk pembimbing -->
<?php if ($this->session->userdata('id_pembimbing')) 
{?>
  <?php if ($status_pembimbing['role_id'] == 1) { ?>
   <div class="row  justify-content-md-center">
    <div class="card text-center mt-3 border-bottom-info shadow">
      <div class="card-body">
        <h5 class="card-title font-weight-bold">Tidak ditemukan!</h5>
        <img src="<?= base_url('assets/img/ilustrasi/nothing-found.png'); ?>" style="width: 20%:">
        <p class="card-text">Pada saat ini tidak ada kegiatan RTIKAbdimas yang sedang anda ikuti.</p>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="card shadow " style="border: none; margin: 8vh 10% 8vh 10%; align-items: center;">
    <div class="row text-center m-0 mt-3 justify-content-md-center">

      <!-- <div class="col">      -->
        <a href="<?= base_url('pembimbing/pengajuan_pembimbing') ?>" >
          <div class="card border-0 ">
            <div class="card-body">
              <i class="fas fa-users fa-2x"></i>
              <?php if ($kegiatan_berlangsung) 
              { 
                if ($status_pembimbing['role_id'] == '2' ) 
                  {?>
                    <div class="badge bg-danger text-light" align="top">  <?= $jml_pengajuan_pembimbing ?> </div> 
                  <?php }
                } ?><br>
                <small >PENGAJUAN PEMBIMBING</small>
              </div>
            </div>
          </a> 

          <a href="<?= base_url('pembimbing/tim_pembimbing') ?>" > 
            <div class="card border-0">
              <div class="card-body">
                <i class="fas fa-users fa-2x"></i><br>
                <small >TIM RELAWAN</small>
              </div>
            </div>
          </a> 

          <a href="<?= base_url('pembimbing/template_berkas'); ?>" >
            <div class="card border-0">
              <div class="card-body">
                <i class="far fa-copy fa-2x"></i><br>
                <small>TEMPLATE BERKAS</small>
              </div>
            </div>
          </a>

          <hr style="width: 80%; float: center;">


          <div class="row text-center m-0 mb-3 justify-content-md-center">

            <?php if (strtotime($kegiatan_berlangsung['awal_pembekalan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pembekalan']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
              <a href="<?= base_url('pembimbing/pembekalan') ?>" > <?php } ?>
              <div class="card border-0">
                <div class="card-body">
                  <i class="fas fa-chalkboard-teacher fa-2x"></i><br>
                  <small>PEMBEKALAN</small>
                </div>
              </div>
            </a>


            <?php if (strtotime($kegiatan_berlangsung['awal_penilaian']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_penilaian']) >= strtotime(date('Y-m-d G:i:s'))) { ?>
              <a href="<?= base_url('pembimbing/penilaian'); ?>" > <?php } ?>
              <div class="card border-0">
                <div class="card-body">
                  <i class="fas fa-sort-numeric-up-alt fa-2x"></i><br>
                  <small>PENILAIAN</small>
                </div>
              </div>
            </a>
          </div>

        </div>
        <div class="row text-center m-0 mb-2">
          <small class="font-weight-bold">INFORMASI :</small>
        </div>
        <div class="row text-left m-0 mb-3 px-5 justify-content-md-center">

          <?php if (strtotime($kegiatan_berlangsung['akhir_registrasi']) >= strtotime(date('Y-m-d G:i:s'))) 
          { ?>
            <small>
              1. Pada fase registrasi, Tim akan mengajukan permohonan menjadi pembimbing tim; <br>
              2. Pembimbing berhak menerima ataupun menolak pengajuan;<br>
              3. Jika selama waktu registrasi pembimbing tidak terdata sebagai pembimbing dari suatu tim, pembimbing tidak bisa melanjutkan kegiatan di event ini.
            </small>

          </div>
          <hr style="width: 80%; float: center;">
          <div class="row text-center m-0 mb-3  px-3 justify-content-md-center">
            <b >Akhir Registrasi : </b><b class="text-danger" id="demo1">  ... </b>
          </div> 
          <?php 
        } 

        else if (strtotime($kegiatan_berlangsung['awal_pembekalan']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_pembekalan']) >= strtotime(date('Y-m-d G:i:s'))) 
          { ?>
            <small>1. Silahkan ikuti agenda pembekalan relawan sesuai jadwal yang tertera pada menu pembekalan;</small><br><br>
          <?php } 



          elseif (strtotime($kegiatan_berlangsung['awal_penilaian']) <= strtotime(date('Y-m-d G:i:s')) && strtotime($kegiatan_berlangsung['akhir_penilaian']) >= strtotime(date('Y-m-d G:i:s'))) 
          { ?>
            <small>1. Pada fase penilaian, pembimbing tim memberikan penilaian kepada tim maupun anggota tim sesuai kriteria penilaian yang telah disediakan.</small>

          </div>
          <hr style="width: 80%; float: center;">
          <div class="row text-center m-0 mb-3  px-3 justify-content-md-center">
            <b >Akhir Penilaian : </b><b class="text-danger" id="demo3">  ... </b>
          </div> 
          <?php 
        } ?>


        </div>
      <?php } ?>
    <?php }?>

    <!-- akhir untuk pembimbing -->


    <!-- End of Content Row -->


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content
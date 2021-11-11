
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row">
    <!-- Earnings User Card -->
    <div class="col-xl-3 col-md-6 mb-4 animated--grow-in" >
      <a href="<?= base_url('Admin/komisariat_event'); ?>">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pangkalan</div>
              </a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $jml_komisariat; ?> Pangkalan</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-laptop-house fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> 

    <!-- Earnings Acara Card -->
    <div class="col-xl-3 col-md-6 mb-4 animated--grow-in" data-scroll-reveal="enter top move 50px over 0.9s after 0.4s">
      <a href="<?= base_url('Admin/timRelawan_event'); ?>">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Tim Relawan</div>
              </a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $jml_tim; ?> Tim</div>
            </div>
            <div class="col-auto">
              <i class="fab fa-hornbill fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 animated--grow-in" data-scroll-reveal="enter top move 50px over 0.9s after 0.4s">
      
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Peserta</div>
              
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $jml_peserta; ?> Peserta</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->

    <div class="col-xl-3 col-md-6 mb-4 animated--grow-in"  data-scroll-reveal="enter top move 50px over 0.9s after 0.4s">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Progress Kegiatan</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $progress; ?>%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:<?= $progress; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chart-line fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  
  <div class="row">

    <div class="col-lg-7">

      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
          <h6 class="m-0 font-weight-bold text-light">Diagram persentase jumlah peserta tiap komisariat</h6>
        </div>
        <div class="card-body">
          <div class="chart-area animated--grow-in">
            <canvas id="pieChartJmlPeserta"></canvas>
          </div>
          <hr>
          Data yang tersaji terkait jumlah peserta RTIKAbdimas yang mengikuti event ini yang dikelompokkan berdasarkan komisariat.
        </div>
      </div>

      <!-- Bar Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
          <h6 class="m-0 font-weight-bold text-light">Diagram persentase jenis pelayanan</h6>
        </div>
        <div class="card-body">
          <div class="chart-bar animated--grow-in">
            <canvas id="myBarChart"></canvas>
          </div>
          <hr>
          Data yang tersaji terkait persentase dari jenis pelayanan yang diberikan oleh setiap tim RTIKAbdimas.
        </div>
      </div>
    </div>

    <!-- info nilai kinerja terbaik -->
    <div class="col-lg-5">
      <div class="row">
        <div class="col-lg-12 col-sm-6">
          <div class="card mb-3 shadow" style="max-width: 540px;">
            <div class="card-header bg-info py-3">
              <h6 class="m-0 font-weight-bold text-light text-center">Nilai kinerja terbaik</h6>
            </div>
            <div class="row no-gutters mt-1  animated--grow-in">
              <div class="col-md-4 text-center">
                <b class="card-title">Skor:</b><br>
                <b class="card-text text-info" style="font-size: 3.5vw;" ><?php if ($nilai_tim) {echo $nilai_tim[0]['0'];} else{echo '0';} ?></b>
              </div>
              <div class="col-md-8 text-center mt-2">
                <b class="card-text"><?php if ($nilai_tim) {echo 'Tim '. $nilai_tim[0]['nama_tim'];} else{echo 'Nama Tim';} ?></b>
                <p class="card-text mb-2 font-weight-bold"><?php if ($nilai_tim) {echo $nilai_tim[0]['nama_komisariat'];} else{echo 'Nama Pangkalan';} ?></p>
              </div>
            </div>
          </div>
        </div>

       <!--  <div class="col-lg-12 col-sm-6">
          <div class="card mb-3 shadow" style="max-width: 540px;">
            <div class="card-header bg-info py-3">
              <h6 class="m-0 font-weight-bold text-light text-center">Nilai dampak terbaik</h6>
            </div>
            <div class="row no-gutters mt-1 animated--grow-in">
              <div class="col-md-4 text-center">
                <b class="card-title">Skor:</b><br>
                <b class="card-text text-info" style="font-size: 3.5vw;" >90.89</b>
              </div>
              <div class="col-md-8 text-center mt-2">
                <b class="card-text">Nama Tim</b>
                <p class="card-text mb-2 font-weight-bold">Nama Pangkalan</p>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  




  <!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


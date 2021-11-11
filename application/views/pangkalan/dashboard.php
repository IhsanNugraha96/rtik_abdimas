
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-10 mt-3">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <!-- Content Row -->
         <div class="row">
         	<!-- Earnings User Card -->
            <div class="col-xl-3 col-md-6 mb-4 animated--grow-in" >
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ketua</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pangkalan['ketua']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings Acara Card -->
            <div class="col-xl-3 col-md-6 mb-4 animated--grow-in" data-scroll-reveal="enter top move 50px over 0.9s after 0.4s">
              <a href="<?= base_url('Pangkalan/pembimbing'); ?>">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pembimbing</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $jml_pembimbing." Pembimbing"; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 animated--grow-in" data-scroll-reveal="enter top move 50px over 0.9s after 0.4s">
              <a href="<?= base_url('Pangkalan/anggota'); ?>">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Anggota</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $jml_anggota." Anggota"; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>


            <!-- Earnings (Monthly) Card Example -->

            <div class="col-xl-3 col-md-6 mb-4 animated--grow-in"  data-scroll-reveal="enter top move 50px over 0.9s after 0.4s">
                <a href="<?= base_url('Pangkalan/pengajuan_anggota'); ?>">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Req Akun Anggota</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $jml_pengajuan_anggota." Permintaan"; ?></div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="far fa-question-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
        </div>



        <div class="row">

            <div class="col-xl-8 col-lg-7">

              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Diagram data peserta tiap tahun</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                  Data yang tersaji terkait jumlah peserta RTIKAbdimas setiap tahun dalam kurun waktu 10 tahun terakhir.
                </div>
              </div>

              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Diagram persentase jenis pelayanan</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <hr>
                  Data yang tersaji terkait persentase dari jenis pelayanan yang diberikan oleh setiap tim RTIKAbdimas.
                </div>
              </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Diagram persentase jenis mitra</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                  Data terkait persentase dari jenis mitra penerima manfaat.
                </div>
              </div>
            </div>
          </div>

        <!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

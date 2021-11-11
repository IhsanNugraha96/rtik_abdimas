<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="padding-bottom: 0px;">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html"><img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"alt="Logo Relawan RTIK" class="img-fluid" style="<?php if ($title == 'Artikel Laporan Kegiatan'){ echo 'width: 4.5vw';} else { echo '10%';}?>;">     <span>RTIK</span>Abdimas</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
       <!-- <a href="index.html" class="logo mr-auto"><img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>" alt="Logo Relawan RTIK" class="img-fluid" style="width: 10%;"> <span>RTIK</span>Abdimas</a> -->

      <nav class="nav-menu d-none d-lg-block" style="margin-bottom: 0;">
        <ul>
          <li <?php if ($title == "Relawan TIK Abdimas") {?>
            class="active"<?php } ?>><a href="<?= base_url('LandingPage'); ?>">Beranda</a></li>

          
            <li <?php if ($title == "Tentang") {?>
              class="active"<?php } ?>><a href="<?= base_url('LandingPage/#about-us'); ?>">Tentang</a></li>

            <li <?php if ($title == "Artikel Laporan Kegiatan") {?>
              class="active"<?php } ?>><a href="<?= base_url('LandingPage/#kegiatan'); ?>">Kegiatan</a></li>
              
            <li <?php if ($title == "Statistik") {?>
              class="active"<?php } ?>><a href="<?= base_url('LandingPage/#services'); ?>">Statistik</a></li>
            
            <li class="drop-down"><a>Daftar</a>
              <ul>
                <li><a href="<?= base_url('Auth/form_daftar_relawan') ?>">Peserta/Relawan</a></li>
                <li><a href="<?= base_url('Auth/form_daftar_instruktur') ?>">Instruktur</a></li>
                <li><a href="<?= base_url('Auth/form_daftar_pangkalan') ?>">Pangkalan</a></li>
              </ul>
            </li>
            <li><a href="<?= base_url('Auth'); ?>">Masuk</a></li>

             <li <?php if ($title == "Kredit") {?>
              class="active"<?php } ?>><a href="<?= base_url('LandingPage/kredit') ?>">Kredit</a></li>
          
        </ul>
      </nav>
    </div>


          <div class="row m-0 p-0">
            <div class="p-0 m-0 mt-2 shadow" style="max-width: 10%; z-index: 2; ">
              <b href="" class="font-weight-bold bg-dark text-white p-2 px-4 shadow" style=" font-size: 11pt; margin-bottom:-4pt;"> Pengumuman </b>
            </div>
            <div class="m-0 p-0 mt-1 p-0 shadow" style="width: 90%; z-index: 1; background-color: #2B4E84; ">
              <marquee class="py-1 text-white shadow" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="7" behavior="scroll" style="font-size: 11pt; margin-bottom:-4pt;">
               -- SELAMAT DATANG di Aplikasi RTIKAbdimas --     <?php   foreach ($pengumuman as $pgm) { echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. '<sup>'.substr($pgm['date'], 8, 2).'-'.substr($pgm['date'], 5, 2).'-'.substr($pgm['date'], 0, 4).'</sup> '.$pgm['isi'].' - '; } ?>
              </marquee>
            </div>
          </div>
          
  </header><!-- End Header -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- logo rtik -->
          <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div>
              <img src="<?= base_url('assets/img/komisariat/'.$komisariat['logo']); ?>" style="width: 10%;" alt="Logo Pangkalan">
            </div>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $mitra['nama_mitra'] ?></span>
               <img class="img-profile rounded-circle" src="<?= base_url('assets/img/mitra/'.$mitra['logo']) ?>">
               
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('Mitra') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="<?= base_url('Mitra/edit_profil') ?>">
                  <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>
        </nav>
         

        <div class=" bg-white shadow mb-4" style="margin-top: -24px;">
          <div class="row">
            <div class="p-2 " style="max-width: 10%; z-index: 2;">
              <a href="" class="bg-primary text-white p-2"> Pengumuman </a>
            </div>
            <div class="my-auto mx-auto" style="width: 90%; z-index: 1;">
              <marquee class="px-2 ml-2" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="7" behavior="scroll">
               -- SELAMAT DATANG di Aplikasi RTIKAbdimas --     <?php   foreach ($pengumuman as $pgm) { echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. '<sup>'.substr($pgm['date'], 8, 2).'-'.substr($pgm['date'], 5, 2).'-'.substr($pgm['date'], 0, 4).'</sup> '.$pgm['isi'].' - '; } ?>
              </marquee>
            </div>
          </div>
          
        </div>
        <!-- End of Topbar -->
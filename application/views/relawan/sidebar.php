    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 50px;" alt="Logo Relawan RTIK">
        </div>
        <div class="sidebar-brand-text mx-3">Relawan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
       <!-- Heading -->
      <div class="sidebar-heading" style="margin-top: 15px;">
        Informasi
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php if($title == 'Komisariat') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href = "<?= base_url('Relawan/komisariat');?>">
          <i class="fas fa-university"></i>
          <span>Pangkalan</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
       <!--  <?php if($title == 'Pengumuman') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Relawan/pengumuman') ?>" style="margin-top: -20px;">
          <i class="fas fa-bullhorn"></i>
          <span>Pengumuman <?php if ($jml_pengumuman != 0) {?><div class="badge bg-danger text-light">  <?= $jml_pengumuman ?> </div> <?php } ?></span></a>
      </li> -->

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <div class="sidebar-heading">
        Kegiatan RTIKAbdimas
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php if($title == 'Kegiatan Akan Datang' || $title == 'Kegiatan Berlangsung' || $title == 'Kegiatan Selesai') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" style="margin-top: -10px;">
          <i class="fas fa-history"></i>
          <span>Event</span>
        </a>
        <div id="collapsePages" class="collapse <?php if($title == 'Kegiatan Akan Datang' || $title == 'Kegiatan Berlangsung' || $title == 'Kegiatan Selesai') {echo"show";}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kegiatan:</h6>
            <a class="collapse-item <?php if($title == 'Kegiatan Akan Datang'){echo'active';} ?>" href="<?= base_url('Relawan/kegiatan_akan_datang'); ?>">Akan Datang <?php if ($kegiatan_akan_datang) {?><div class="badge bg-danger text-light">  <?= $jml_kegiatan_akan_datang ?> </div> <?php } ?></a>

             <a class="collapse-item <?php if($title == 'Kegiatan Berlangsung'){echo'active';} ?>" href="<?= base_url('Relawan/kegiatan_berlangsung'); ?>">Sedang Berlangsung <?php if ($kegiatan_berlangsung) { 
                if ($status_kepesertaan != 0 ) {?><div class="badge bg-danger text-light">  <?= $status_kepesertaan ?> </div> <?php }} ?></a>

            <a class="collapse-item <?php if($title == 'Kegiatan Selesai'){echo'active';} ?>" href="<?= base_url('Relawan/kegiatan_selesai'); ?>">Telah Selesai <?php if ($jml_kegiatan_telah_diikuti != 0 ) {?><div class="badge bg-danger text-light">  <?= $jml_kegiatan_telah_diikuti ?> </div> <?php } ?></a>
          </div>
        </div>
      </li>
      
       <!-- Divider -->
      <hr class="sidebar-divider">
       <!-- Heading -->
      <div class="sidebar-heading">
        Profil
      </div>
      <!-- Nav Item - Charts -->
      <?php if($title == 'Profil') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link pb-0" href="<?= base_url('Relawan/profil') ?>">
          <i class="fas fa-user"></i>
          <span>Profil Relawan</span></a>
      </li>

       <?php if($title == 'Edit Profil') :?>
        <li class="nav-item active" style="">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Relawan/edit_profil') ?>">
          <i class="fas fa-user-cog"></i>
          <span>Edit Profil</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

       <!-- Nav Item - Tables -->
      <li class="nav-item" style="margin-top: -20px;">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
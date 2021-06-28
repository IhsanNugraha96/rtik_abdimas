    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="max-width: 50px;" alt="Logo admin RTIK">
        </div>
        <div class="sidebar-brand-text mx-1">mitra</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kegiatan
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->

      <?php if($title == 'Survey Program') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('mitra/survey') ?>">
          <i class="fas fa-poll"></i>
          <span>Survei Program</span></a>
      </li>

       <?php if($title == 'Sertifikat') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('mitra/sertifikat') ?>" style="margin-top: -20px;">
          <i class="far fa-id-card"></i>
          <span>Sertifikat</span></a>
      </li>
     

       <!-- Divider -->
      <hr class="sidebar-divider">
       <!-- Heading -->
      <div class="sidebar-heading">
        Profil
      </div>
      <!-- Nav Item - Charts -->
      <?php if($title == 'Profil Mitra') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link pb-0" href="<?= base_url('mitra') ?>">
          <i class="fas fa-user"></i>
          <span>Profil Mitra</span></a>
      </li>

       <?php if($title == 'Edit Profil Mitra') :?>
        <li class="nav-item active" style="">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?> 
        <a class="nav-link" href="<?= base_url('mitra/edit_profil') ?>">
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
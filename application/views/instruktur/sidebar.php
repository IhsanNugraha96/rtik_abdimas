    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="max-width: 50px;" alt="Logo admin RTIK">
        </div>
        <div class="sidebar-brand-text mx-1">instruktur</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->

      <?php if($title == 'Data Materi') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href = "<?= base_url('Instruktur/materi');?>">
        <i class="fas fa-book"></i>
        <span>Data Materi</span></a>
      </li>


      <?php if($title == 'Acara Pembekalan') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Instruktur/pembekalan') ?>" style="margin-top: -20px;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Pembekalan</span></a>
      </li>
     

       <!-- Divider -->
      <hr class="sidebar-divider">
       <!-- Heading -->
      <div class="sidebar-heading">
        Profil
      </div>
      <!-- Nav Item - Charts -->
      <?php if($title == 'Profil Instruktur') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link pb-0" href="<?= base_url('Instruktur') ?>">
          <i class="fas fa-user"></i>
          <span>Profil instruktur</span></a>
      </li>

       <?php if($title == 'Edit Profil Instruktur') :?>
        <li class="nav-item active" style="">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?> 
        <a class="nav-link" href="<?= base_url('Instruktur/edit_profil') ?>">
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
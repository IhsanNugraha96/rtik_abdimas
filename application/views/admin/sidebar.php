    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="max-width: 50px;" alt="Logo admin RTIK">
        </div>
        <div class="sidebar-brand-text mx-1">administrator</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
       <!-- Heading -->
      <div class="sidebar-heading" style="margin-top: 15px;">
        Dashboard
      </div>

      <!-- Nav Item - Dashboard -->
      <?php if($title == 'Dashboard Admin') :?>
        <li class="nav-item active ">
      <?php else : ?>
        <li class="nav-item ">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
       <?php if($title == 'Event' || $title == 'Komisariat' || $title == 'Admin') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" style="margin-top: -10px;">
          <i class="fas fa-database"></i>
          <span>Data</span>
        </a>
        <div id="collapsePages" class="collapse <?php if($title == 'Event' || $title == 'Komisariat' || $title == 'Admin' || $title == 'Instruktur') {echo"show";}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data :</h6>
            <a class="collapse-item <?php if($title == 'Event'){echo'active';} ?>" href="<?= base_url('Admin/event'); ?>">Event </a>
            <a class="collapse-item <?php if($title == 'Komisariat'){echo'active';} ?>" href="<?= base_url('Admin/komisariat'); ?>">Pangkalan </a>
            <a class="collapse-item <?php if($title == 'Instruktur'){echo'active';} ?>" href="<?= base_url('Admin/instruktur'); ?>">Instruktur</a>
            <a class="collapse-item <?php if($title == 'Admin'){echo'active';} ?>" href="<?= base_url('Admin/admin'); ?>">Admin</a>
            
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Lainnya
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->

      <?php if($title == 'Template') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href = "<?= base_url('Admin/template');?>">
        <i class="fas fa-clipboard-list"></i>
        <span>Template Berkas</span></a>
      </li>


      <?php if($title == 'Pengumuman') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Admin/pengumuman') ?>" style="margin-top: -20px;">
          <i class="fas fa-bullhorn"></i>
          <span>Pengumuman</span></a>
      </li>

      <?php if($title == 'Mitra') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Admin/mitra') ?>" style="margin-top: -20px;">
          <i class="fas fa-link"></i>
          <span>Mitra Koordinator RTIK</span></a>
      </li>

      <?php if($title == 'Keahlian') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Admin/keahlian') ?>" style="margin-top: -20px;">
          <i class="fas fa-list-ol"></i>
          <span>Daftar Keahlian Relawan</span></a>
      </li>

      <?php if($title == 'Jenis Mitra') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Admin/jenis_mitra') ?>" style="margin-top: -20px;">
          <i class="fas fa-list-ul"></i>
          <span>Kelola Jenis Mitra</span></a>
      </li>

      <?php if($title == 'Pengaturan Penilaian') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Admin/penilaian') ?>" style="margin-top: -20px;">
          <i class="fas fa-sort-numeric-up-alt"></i>
          <span>Kriteria Penilaian</span></a>
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
        <a class="nav-link pb-0" href="<?= base_url('Admin/profil') ?>">
          <i class="fas fa-user"></i>
          <span>Profil admin</span></a>
      </li>

       <?php if($title == 'Edit Profil') :?>
        <li class="nav-item active" style="">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?> 
        <a class="nav-link" href="<?= base_url('Admin/edit_profil') ?>">
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
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="max-width: 50px;" alt="Logo admin RTIK">
        </div>
        <div class="sidebar-brand-text mx-1">pangkalan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
       <!-- Heading -->
      <div class="sidebar-heading" style="margin-top: 15px;">
        Dashboard
      </div>

      <!-- Nav Item - Dashboard -->
      <?php if($title == 'Dashboard Pangkalan') :?>
        <li class="nav-item active ">
      <?php else : ?>
        <li class="nav-item ">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Pangkalan') ?>">
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
       <?php if($title == 'Pembimbing' || $title == 'Anggota') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" style="margin-top: -10px;">
          <i class="fas fa-database"></i>
          <span>Data</span>
        </a>
        <div id="collapsePages" class="collapse <?php if($title == 'Pembimbing' || $title == 'Anggota' || $title == 'Event') {echo"show";}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data :</h6>
            <a class="collapse-item <?php if($title == 'Pembimbing'){echo'active';} ?>" href="<?= base_url('Pangkalan/pembimbing'); ?>">Pembimbing </a>
            <a class="collapse-item <?php if($title == 'Anggota'){echo'active';} ?>" href="<?= base_url('Pangkalan/anggota'); ?>">Anggota </a>
            <a class="collapse-item <?php if($title == 'Event'){echo'active';} ?>" href="<?= base_url('Pangkalan/event'); ?>">Event </a>
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
        <a class="nav-link pb-0" href="<?= base_url('Pangkalan/profil') ?>">
          <i class="fas fa-user"></i>
          <span>Profil pangkalan</span></a>
      </li>

       <?php if($title == 'Edit Profil Pangkalan') :?>
        <li class="nav-item active" style="">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?> 
        <a class="nav-link" href="<?= base_url('Pangkalan/edit_profil') ?>">
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
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
        Dashboard Event
      </div>

      <!-- Nav Item - Dashboard -->
      <?php if($title == 'Detail Event') :?>
        <li class="nav-item active ">
      <?php else : ?>
        <li class="nav-item ">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('Admin/detail_Event') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Partisipan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
       <?php if($title == 'Event' || $title == 'Komisariat' || $title == 'Mitra' || $title == 'Admin') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" style="margin-top: -10px;">
          <i class="fas fa-database"></i>
          <span>Data Partisipan</span>
        </a>
        <div id="collapsePages" class="collapse <?php if($title == 'Komisariat' || $title == 'Mitra' || $title == 'Tim Relawan') {echo"show";}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data :</h6>
            <a class="collapse-item <?php if($title == 'Komisariat'){echo'active';} ?>" href="<?= base_url('Admin/komisariat_event'); ?>">Pangkalan </a>
            <a class="collapse-item <?php if($title == 'Tim Relawan'){echo'active';} ?>" href="<?= base_url('Admin/timRelawan_event'); ?>">Tim Relawan </a>
            <a class="collapse-item <?php if($title == 'Mitra'){echo'active';} ?>" href="<?= base_url('Admin/mitra_Event'); ?>">Mitra</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        lainnya
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->
       <!-- Nav Item - Pages Collapse Menu -->
     <!--   <?php if($title == 'Pengaturan' || $title == 'Pengaturan Lainnya') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages" style="margin-top: -10px;">
          <i class="fas fa-cogs"></i>
          <span>Pengaturan</span>
        </a>
        <div id="collapsePages2" class="collapse <?php if($title == 'Pengaturan' || $title == 'Pengaturan Lainnya') {echo"show";}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if($title == 'Pengaturan'){echo'active';} ?>" href="<?= base_url('Admin/pengaturan_event');?>">Jadwal Kegiatan </a>
            <a class="collapse-item <?php if($title == 'Pengaturan Lainnya'){echo'active';} ?>" href="<?= base_url('Admin/pengaturan_lainnya'); ?>">Pengaturan Lainnya </a>
          </div>
        </div>
      </li> -->


      <?php if($title == 'Pengaturan' || $title == 'Form tambah pembekalan') :?>
        <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href = "<?= base_url('Admin/pengaturan_event');?>">
        <i class="fas fa-cogs"></i>
        <span>Konfigurasi</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

       <!-- Nav Item - Tables -->
      <li class="nav-item" style="margin-top: -20px;">
        <a class="nav-link" href="<?= base_url('Logout/keluar_detail_event'); ?>">
          <i class="fas fa-backward"></i>
          <span>Kembali</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
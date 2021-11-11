    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 50px;" alt="Logo Relawan RTIK">
        </div>
        <div class="sidebar-brand-text mx-3"><?= $user; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
       <!-- Heading -->
       
      <!-- Nav Item - Dashboard -->

    <?php if ($title =='Dashboard') {?>
      <?php if($title == 'Dashboard') :?>
        <li class="nav-item active ">
      <?php else : ?>
        <li class="nav-item ">
      <?php endif;?>
        
        <a class="nav-link" href="<?= base_url('Relawan/kegiatan_Selesai') ?>">
    
          <i class="fas fa-ellipsis-h"></i>
          <span>Menu Utama</span></a>
      </li>
    <?php } ?>
       
      <li class="nav-item" >
        <?php if ($title == 'Tim Relawan' || $title == 'Registrasi' || $title == 'Mitra' ||  $title == 'Pembimbing Tim' || $title == 'Agenda Pembekalan' || $title == 'Pelayanan' || $title == 'Pelaporan' || $title == 'Penilaian Relawan') {?>
          <a class="nav-link" href="<?= base_url('Relawan/kegiatan_berlangsung') ?>">
        <?php } elseif ($title == 'Detail Tim') {?>
          <a class="nav-link" href="<?= base_url('Relawan/registrasi_tim') ?>">
        <?php } elseif ($title == 'Lihat_artikel') {?>
         <a class="nav-link" href="<?= base_url('Relawan/pelaporan') ?>">
        <?php }elseif ($title == "Kegiatan Selesai") {?>
          <a class="nav-link" href="<?= base_url('Relawan/kegiatan_selesai') ?>">
        <?php }  elseif ( $title == 'Pengajuan Komisariat'){?>
          <a class="nav-link" href="<?= base_url('Admin/komisariat') ?>">
        <?php } elseif ($title == 'Detail Pangkalan') {?>
          <a class="nav-link" href="<?= base_url('Admin/kembali_komisariat') ?>">
        <?php } elseif ($title == 'Detail Tim Relawan') {?>
          <a class="nav-link" href="<?= base_url('Logout/keluar_detail_tim'); ?>">
        <?php } elseif ($title == 'Pengajuan Instruktur') {?>
          <a class="nav-link" href="<?= base_url('Admin/instruktur'); ?>">
        <?php } elseif ($title == 'Template') {?>
          <a class="nav-link" href="<?= base_url('Admin'); ?>">
        <?php } elseif ($title == 'Pengajuan Anggota') {?>
          <a class="nav-link" href="<?= base_url('Pangkalan/anggota'); ?>">
        <?php } elseif ($title == 'Detail Event Pangkalan') {?>
          <a class="nav-link" href="<?= base_url('Pangkalan/event'); ?>">
        <?php } elseif ($title == 'Pengajuan Pembimbing Tim' || $title == 'Tim Pembimbing' || $title == 'Agenda Pembekalan Event' || $title == 'Template Berkas' || $title == 'Penilaian Pembimbing') {?>
          <a class="nav-link" href="<?= base_url('Pembimbing/kegiatan_berlangsung'); ?>">
        <?php } elseif ($title == 'Detail Tim Pembimbing' || $title == 'Artikel Berita Tim') {?>
          <a class="nav-link" href="<?= base_url('Pembimbing/tim_pembimbing'); ?>">
        <?php } elseif ($title == 'Detail Tim Pembimbing2') {?>
          <a class="nav-link" href="<?= base_url('Pembimbing/kegiatan_selesai'); ?>">
        <?php } ?>
          <i class="fas fa-backward"></i>
          <span>Kembali</span></a>
      </li>

      <?php if ($title == 'Pelaporan') {?>
      <li class="nav-item" style="margin-top: -10%;">
        <a class="nav-link" href="<?= base_url('Relawan/lihat_artikel/'.urlencode($tim['id_tim'])) ?>">
        <i class="far fa-eye"></i>
        <span>Lihat Artikel</span></a>
      </li>
      <?php } ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
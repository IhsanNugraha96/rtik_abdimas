<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 
  <div class="row">
    <div class="col-lg-10 mt-4">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row mb-5">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <div class="single-cards-item text-center shadow">
        <div class="img-fluid">
          <img src="<?= base_url('assets/img/logo/background1.jpg') ?>" style="width: 100%; height: 20%;" alt="background profil">
        </div>
        <div class="single-product-text" style="padding-bottom: 10%;">


          <a href="" data-toggle="modal" data-target="#lihat_foto"> 
           <img class="rounded-circle rounded-profil img-thumbnail mb-3 shadow" src="<?= base_url('assets/img/mitra/'.$mitra['logo']) ?>">
          </a>
             <h4><b><?= $mitra['nama_mitra']; ?></b></h4>
             <h6 class="ctn-cards">Email : <?= $mitra['email_koordinator'] ?></h6>
           </div>
         </div>
       </div>
       <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive">
         <table class="table no-border bg-white" width="100%" cellspacing="0">

           <tbody>

            <tr>
              <td colspan="3"><h5 class="font-weight-bold">Profil Pimpinan</h5></td>
            </tr>
            <tr>
             <td>Nama Pimpinan </td>
             <td> : </td>
             <td><?= $mitra['pimpinan']; ?></td>
            </tr>
            <tr>
             <td>jabatan </td>
             <td> : </td>
             <td><?= $mitra['jabatan_pimpinan']; ?></td>
           </tr>
           <tr>
             <td>No. Hp </td>
             <td> : </td>
             <td><?= $mitra['no_hp_pimpinan']; ?></td>
           </tr>
           <tr>
             <td>Email </td>
             <td> : </td>
             <td><?= $mitra['email_pimpinan']; ?></td>
           </tr>
           <tr>
              <td colspan="3"><h5 class="font-weight-bold">Profil Koordinator</h5></td>
            </tr>
           <tr>
             <td>Nama Koordinator</td>
             <td> : </td>
             <td><?= $mitra['koordinator']; ?></td>
           </tr>
           <tr>
            <td>jabatan </td>
            <td> : </td>
            <td><?= $mitra['jabatan_koordinator']; ?></td>
          </tr>
          <tr>
            <td>No. Hp </td>
            <td> : </td>
            <td><?= $mitra['no_hp_koordinator']; ?></td>
          </tr>
          <tr>
           <td>Email</td>
           <td> : </td>
           <td><?= $mitra['email_koordinator']; ?></td>
         </tr>
         <tr>
              <td colspan="3"><h5 class="font-weight-bold">Profil Mitra</h5></td>
            </tr>
         <tr>
           <td>Mitra </td>
           <td> : </td>
           <td><?= $mitra['nama_mitra']; ?></td>
         </tr>
         <tr>
           <td>Alamat</td>
           <td> : </td>
           <td><?= $mitra['alamat'].',<br> Kec. '.$mitra['kecamatan'].',<br> '.$mitra['type'].'. '.$mitra['nama_kota'].',<br> Provinsi. '.$mitra['nama_provinsi']; ?></td>
      </tr>
      <tr>
       <td>Titik Koordinat</td>
       <td> : </td>
       <td><?= $mitra['titik_koordinat']; ?></td>
     </tr>
     <tr>
       <td>Situs Web </td>
       <td> : </td>
       <td><?= $mitra['situs_web']; ?></td>
     </tr>
     <tr>
       <td>Jenis Layanan</td>
       <td> : </td>
       <td><?= $mitra['jenis_layanan']; ?></td>
   </tr>
   <tr>
     <td>Profil Ringkas</td>
     <td> : </td>
     <td><?= $mitra['profil_ringkas'] ?>
   </td>
 </tr>
</tbody>
</table>
</div>
</div>
</div>

<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div id="lihat_foto" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
  <div class="modal-dialog">
    <div class="modal-content shadow">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
       <img src="<?= base_url('assets/img/mitra/'.$mitra['logo']) ?>" style="width: 80%;">
     </div>
   </div>
 </div>
</div>
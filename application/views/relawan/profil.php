<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Relawan</h1> 
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
            <img class="rounded-circle rounded-profil img-thumbnail mb-3 shadow" src="<?= base_url('assets/img/relawan/image/'.$relawan['image']) ?>"></a>
            <h4><b><?= $relawan['nama_lengkap']; ?></b></h4>
             <h6>Username : <?= $relawan['username']; ?></h6>
             <h6 class="ctn-cards">Email : <?= $relawan['email'] ?></h6>
           </div>
         </div>
       </div>

       <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive">
         <table class="table no-border bg-white" id="dataTable" width="100%" cellspacing="0">

           <tbody>

            <tr>
             <td>ID </td>
             <td> : </td>
             <td><?= $relawan['id_relawan']; ?></td>
            </tr>
            <tr>
             <td style="width: 25%;">NIK </td>
             <td> : </td>
             <td><?= $relawan['nik']; ?></td>
           </tr>
           <tr>
             <td>Nama </td>
             <td> : </td>
             <td><?= $relawan['nama_lengkap']; ?></td>
           </tr>
           <tr>
             <td>Alamat </td>
             <td> : </td>
             <td><?= $relawan['alamat_lengkap']." Kec. ".$relawan['kecamatan'].", ".$kota['nama_kota']." - ".$provinsi['nama_provinsi']; ?></td>
           </tr>
           <tr>
             <td>Tempat/Tgl. lahir </td>
             <td> : </td>
             <td><?= $relawan['tempat_lahir'].", ".$relawan['tgl_lahir']; ?></td>
           </tr>
           <tr>
            <td>Jenis Kelamin </td>
            <td> : </td>
            <td><?= $relawan['jenis_kelamin']; ?></td>
          </tr>
          <tr>
            <td>Pendidikan Terakhir </td>
            <td> : </td>
            <td><?= $relawan['pendidikan_terakhir']; ?></td>
          </tr>
          <tr>
           <td>No. Handphone </td>
           <td> : </td>
           <td><?= $relawan['no_hp']; ?></td>
         </tr>
         <tr>
           <td>Pekerjaan </td>
           <td> : </td>
           <td><?= $relawan['pekerjaan']; ?></td>
         </tr>
         <tr>
           <td>Pangkalan </td>
           <td> : </td>
           <td><b><?= $komisariat['nama_komisariat']."</b>"; 
           if ($relawan['is_active'] < 3) { 
            echo ' - <i style="color:red;">Belum di Konfirmasi!</i>';
          }?>
        </td>
      </tr>
      <tr>
       <td>Tahun Masuk </td>
       <td> : </td>
       <td><?= $relawan['thn_anggota']; ?></td>
     </tr>
     <tr>
       <td>Jabatan di RTIK </td>
       <td> : </td>
       <td><?= $relawan['jabatan_di_rtik']; ?></td>
     </tr>
     <tr>
       <td>Keahlian TIK</td>
       <td> : </td>
       <td><?php for ($i=0; $i < $jml_keahlian; $i++) { 
         echo ($i+1).". ".($keahlian[$i]['nama_keahlian'])."<br>"; 
       }?>
     </td>
   </tr>
   <tr>
     <td>Keahlian Lainnya</td>
     <td> : </td>
     <td><?= $relawan['keahlian_lain'] ?>
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
        <img src="<?= base_url('assets/img/relawan/image/'.$relawan['image']) ?>" class="shadow" style="width: 80%;">
     </div>
   </div>
 </div>
</div>
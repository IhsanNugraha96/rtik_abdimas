<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mt-5">
        <div class="col-lg-10">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <!-- Content Row -->

<div class="row mb-5">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="single-cards-item text-center shadow mt-5" style="background-image: url('<?= base_url('assets/img/logo/background1.jpg') ?>');">
                
            <div class="single-product-text" style="padding-bottom: 10%;">
                <a href="" data-toggle="modal" data-target="#lihat_foto">
                    <img class="img-thumbnail mb-3 shadow rounded-circle rounded-profil" src="<?= base_url('assets/img/pembimbing/'.$pembimbing['image']) ?>">
                </a>
                <h5><b><?= $pembimbing['nama']; ?></b></h5>
                <h6><b>Email : <?= $pembimbing['email']; ?></b></h6><br>
            </div>
         </div>
    </div>
    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive mt-5">
            <table class="table no-border bg-white shadow" id="dataTable" width="100%" cellspacing="0">

                <tbody>
                  <tr>
                       <td>NIK </td>
                       <td> : </td>
                       <td><?= $pembimbing['nik']; ?></td>
                   </tr>
                   <tr>
                       <td>Nama </td>
                       <td> : </td>
                       <td><?= $pembimbing['nama']; ?></td>
                   </tr>
                   <tr>
                       <td>Email </td>
                       <td> : </td>
                       <td><?= $pembimbing['email']; ?></td>
                   </tr>
                   <tr>
                       <td>Tanggal Lahir </td>
                       <td> : </td>
                       <td><?= substr($pembimbing['tgl_lahir'], 8, 2).'-'.substr($pembimbing['tgl_lahir'], 5, 2).'-'.substr($pembimbing['tgl_lahir'], 0, 4);?></td>
                   </tr>
                   <tr>
                       <td>Jenis Kelamin </td>
                       <td> : </td>
                       <td><?= $pembimbing['jenis_kelamin']; ?></td>
                   </tr>
                   <tr>
                       <td>No. Handphone </td>
                       <td> : </td>
                       <td><?= $pembimbing['no_telp']; ?></td>
                   </tr>
                   <tr>
                       <td>Sektor Pekerjaan </td>
                       <td> : </td>
                       <td><?= $pembimbing['sektor_pekerjaan']; ?></td>
                   </tr>
                   <tr>
                       <td>Jabatan </td>
                       <td> : </td>
                       <td><?= $pembimbing['jabatan']; ?></td>
                   </tr>
                   <tr>
                       <td>Alamat </td>
                       <td> : </td>
                       <td><?php if ($alamat_pembimbing) 
                            {
                              echo $pembimbing['alamat_rumah'].', Kec. '.$pembimbing['kecamatan'].' '.$alamat_pembimbing['type'].'. '.$alamat_pembimbing['nama_kota'].'<br> Provinsi. '.$alamat_pembimbing['nama_provinsi']; 
                            }
                          else
                            {
                              echo $pembimbing['alamat_rumah'].', Kec. '.$pembimbing['kecamatan'];
                            } ?>
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
               <img class="shadow" src="<?= base_url('assets/img/pembimbing/'.$pembimbing['image']) ?>" style="width: 60%;">
               
                <h4 class="font-weight-bold"><?= $pembimbing['nama']; ?></h4>
            </div>
        </div>
    </div>
</div>
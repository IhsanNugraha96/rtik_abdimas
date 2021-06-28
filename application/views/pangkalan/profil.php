<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Pangkalan</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <!-- Content Row -->

<div class="row mb-5">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="single-cards-item text-center shadow mt-5" style="background-image: url('<?= base_url('assets/img/logo/background1.jpg') ?>');">
                
            <div class="single-product-text" style="padding-bottom: 10%;">
                <a href="" data-toggle="modal" data-target="#lihat_foto">
                    <img class="img-thumbnail mb-3 shadow rounded-circle rounded-profil" src="<?= base_url('assets/img/komisariat/'.$pangkalan['logo']) ?>">
                    
                </a>
                <h6><b><?= $pangkalan['nama_komisariat']; ?></b></h6>
                <h6><b>Email : <?= $pangkalan['email']; ?></b></h6><br>
            </div>
         </div>
    </div>
    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive mt-5">
            <table class="table no-border bg-white shadow" id="dataTable" width="100%" cellspacing="0">

                <tbody>
                   <tr>
                       <td>Nama Pangkalan </td>
                       <td> : </td>
                       <td><?= $pangkalan['nama_komisariat']; ?></td>
                   </tr>
                   <tr>
                       <td>Email </td>
                       <td> : </td>
                       <td><?= $pangkalan['email']; ?></td>
                   </tr>
                   <tr>
                       <td>Kontak </td>
                       <td> : </td>
                       <td><?= $pangkalan['kontak'];?></td>
                   </tr>
                   <tr>
                       <td>Surat Komitmen </td>
                       <td> : </td>
                       <td><a href="<?= $pangkalan['surat_komitmen'];?>" target="_blank">Link Surat Komitmen</a></td>
                   </tr>
                   <tr>
                       <td>Surat Tugas </td>
                       <td> : </td>
                       <td><a href="<?= $pangkalan['surat_tugas'];?>" target="_blank">Link Surat Tugas</a></td>
                   </tr>
                   <tr>
                     <td>
                       Ketua Pangkalan
                     </td>
                      <td> : </td>
                      <td class="text-center">
                       <img class="img-thumbnail shadow" src="<?= base_url('assets/img/komisariat/ketua/'.$pangkalan['foto_ketua']) ?>" style ="width: 30%;">
                       <br>
                        <b><?= $pangkalan['ketua'];?></b>
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
               <img class="" src="<?= base_url('assets/img/komisariat/'.$pangkalan['logo']) ?>" style="width: 60%;">
                
                <h4 class="font-weight-bold mt-2"><?= $pangkalan['nama_komisariat']; ?></h4>
            </div>
        </div>
    </div>
</div>
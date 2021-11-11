<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mitra RTIKAbdimas</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>


    <!-- Content Row -->

    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Mitra Koordinator RTIKAbdimas</h6>
                      <div>
                      <a href="" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#ubah_image_<?=$image['id_template'];?>"><i class="fas fa-edit text-white-50"></i> Ubah</a>
                      <!-- <a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTambahPemilih"><i class="far fa-file-excel text-white-50"></i> Tambah Pemilih</a> -->
                    </div>
                </div>
            </div>
            <div class="card-body text-center">

                     <img src="<?= base_url('assets/img/mitra/'.$image['nama_template']);  ?>"  style="width: 70%; max-height: 90vh;">



            </div>
          </div>




    <!-- /Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div id="ubah_image_<?=$image['id_template'];?>" class="modal modal-edu-general FullColor-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body text-left">
          <h5 class="text-center mb-5">Ubah Logo Mitra Koordinator</h5>
          <form class="user was-validated" method="post" action="<?= base_url('Admin/ubah_mitra/'.$image['id_template']);?>" enctype="multipart/form-data">

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" id="file" name="file" accept=".jpg,.jpeg,.png" oninvalid="this.setCustomValidity('Anda belum mengunggah gambar..')" oninput="setCustomValidity('')" required>
                <label class="custom-file-label" for="validatedCustomFile">Pilih gambar...</label>


              <div class="invalid-feedback">Pilih gambar.</div>                
              <div class="valid-feedback text-left">Gambar mitra.</div>
             </div>
          

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
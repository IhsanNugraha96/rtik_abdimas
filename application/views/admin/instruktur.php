<!--Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Instruktur</h1>
  <div class="row">
    <div class="col-lg-10">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4 mt-3">
    <div class="card-header py-2">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tabel data Instruktur </h6>
        <div>
          <a href="<?= base_url('admin/pengajuan_instruktur'); ?>" class="d-sm-inline-block btn btn-sm btn-info shadow-sm">Pengajuan Instruktur <?php if ($jml_pengajuan_instruktur) {?><div class="badge bg-danger text-light">  <?= $jml_pengajuan_instruktur; ?> </div> <?php } ?></a>
                     <!--  <a href="<?= base_url('users/excel'); ?>" class="d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download text-white-50"></i> Download Template</a>
                      <a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTambahPemilih"><i class="far fa-file-excel text-white-50"></i> Tambah Pemilih</a> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr style="text-align: center;">
                          <th style="width: 5%;">No</th>
                          <th width="15%">Image</th>
                          <th>Nama Instruktur</th>
                          <th>Kontak</th>
                          <th>Profesi</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        <?php foreach ($instruktur as $ins) { ?>
                          <tr style="text-align: center;">
                            <th scope="row"><?= $i+1; ?></th>
                            <td>
                             <img class="img-profile" src="<?= base_url('assets/img/instruktur/'.$ins['image']) ?>" style="width: 50%;">
                             
                            </td>
                            <td><?= $ins['nama'] ?></td>   
                            <td scope="row">Email (<?= $ins['email']; ?>) <br> Handphone (<?= $ins['no_hp']; ?>)</td>
                            <td><?= $ins['profesi']; ?></td>  
                            <td><?= $ins['type'].'. '.$ins['nama_kota'].',<br>Provinsi. '.$ins['nama_provinsi']; ?></td>        
                            <td scope="row">
                              <a href="" name="detail" class="badge badge-info" data-toggle="modal" data-target="#detail_instruktur_<?=$ins['id_instruktur'];?>">detail</i></a>
                              <a href="" name="detail" class="badge badge-danger" data-toggle="modal" data-target="#hapus_instruktur_<?=$ins['id_instruktur'];?>">hapus</i></a>
                            </td>             
                          </tr>
                          <?php  $i++; } ?>

                        </tbody>
                      </table>
                    </div>  
                  </div>
                </div>


              </div>
              <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content --->



            <!-- modal -->
            <?php $i=0; ?>
            <?php foreach ($instruktur as $ins) { ?>
              <div id="detail_instruktur_<?=$ins['id_instruktur'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
                <div class="modal-dialog">
                  <div class="modal-content shadow">
                    <div class="modal-close-area modal-close-df">
                      <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="modal-body">
                     <img class="img-profile mb-3" src="<?= base_url('assets/img/instruktur/'.$ins['image']) ?>" style="width: 30%;">
                      
                      <h5><?= $ins['nama']; ?></h5><hr>

                      <table class="text-left mb-3">                    
                        <tr>
                          <td valign=top>TTL</td>
                          <td width="5%" valign=top>:</td>
                          <td valign='top'><?= $ins['tempat_lahir'].", ".$ins['tgal_lahir']; ?></td>
                        </tr>
                        <tr>
                          <td valign=top>Jenis Kelamin</td>
                          <td width="5%" valign=top>:</td>
                          <td valign='top'>
                            <?php if ($ins['jenis_kelamin'] == '0') { echo "Laki-laki";}
                            else{ echo "Perempuan";}?>
                          </td>
                        </tr>
                        <tr>
                          <td valign=top>Email</td>
                          <td width="5%" valign=top>:</td>
                          <td valign='top'><?= $ins['email']; ?></td>
                        </tr>
                        <tr>
                          <td valign='top'>Kontak</td>
                          <td width="5%" valign='top'>:</td>
                          <td valign='top'><?= $ins['no_hp']; ?></td>
                        </tr>
                        <tr>
                          <td valign='top'>Profesi</td>
                          <td width="5%" valign='top'>:</td>
                          <td valign='top'><?= $ins['profesi']; ?></td>
                        </tr>
                        <tr>
                          <td valign='top'>Alamat</td>
                          <td width="5%" valign='top'>:</td>
                          <td valign='top'><?= $ins['type'].'. '.$ins['nama_kota'].',<br>Provinsi. '.$ins['nama_provinsi']; ?></td>
                        </tr>
                      </table>

                      <h5>Materi</h5><hr>
                      <table class="text-left">   

                        <?php $j=0; 
                        foreach ($materi_instruktur[$i] as $materi) { ?>                
                          <tr>
                            <td valign='top'>Materi <?= $j+1; ?></td>
                            <td width="5%" valign='top'>:</td>
                            <td valign='top'><a href="<?= $materi['url_materi']; ?>" target="_blank"><?= $materi['nama_materi']; ?></a></td>
                          </tr>

                          <?php $j++; } ?>                 

                        </table>

                      </div>
                    </div>
                  </div>
                </div>
                <?php  $i++; } ?>



                <?php $i=0; ?>
                <?php foreach ($instruktur as $ins) { ?>
                  <div id="hapus_instruktur_<?=$ins['id_instruktur'];?>" class="modal modal-edu-general FullColor-popup-DangerModal fade shadow" role="dialog" style="padding: 20px;">
                    <div class="modal-dialog">
                      <div class="modal-content shadow">
                        <div class="modal-close-area modal-close-df">
                          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="modal-body">
                          <img class="img-profile mb-2" src="<?= base_url('assets/img/instruktur/'.$ins['image']) ?>" style="width: 20%;">
                          <h5><?= $ins['nama']; ?></h5>
                          <h6>Hapus instruktur dari daftar instruktur?</h6>
                        </div>
                        <div class="modal-footer">
                          <a href="<?= base_url('admin/aksi_pengajuan_instruktur/hapus/'.urlencode($ins['email']).'/'.urlencode($ins['id_instruktur'])); ?>" class="badge badge-danger badge-sm">hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php  $i++; } ?>
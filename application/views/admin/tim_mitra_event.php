<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tabel data mitra penerima manfaat </h6>
                    <div>
                     
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th style="width: 5%;">No</th>
                      <th>Nama Mitra</th>
                      <th>Jenis Mitra</th>
                      <th>Alamat</th>
                      <th style="width: 10%;">Aksi</th> 
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i = 0; ?>
                    <?php foreach ($mitra as $mtr) { ?>
                        <tr style="text-align: center;">
                          <td scope="row"><?= $i+1; ?></td>
                          <td><?= $mtr['nama_mitra'] ?></td>
                          <td><?= $mtr['nama_cluster']; ?></td>
                          <td><?= $mtr['alamat'].', '.$mtr['type'].'. '.$mtr['nama_kota'].', - '.$mtr['nama_provinsi']; ?></td> 
                          <td>  
                            <a href="" name="detail" class="badge badge-success" data-toggle="modal" data-target="#detail_mitra_<?= $i; ?>">detail Mitra</i></a>
                            </td>
                        </tr>
                    <?php $i++; } ?>
                   
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
          <?php $i=0; 
          foreach ($mitra as $mtr) { ?>
            <div id="detail_mitra_<?= $i; ?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
              <div class="modal-dialog">
                <div class="modal-content shadow">
                  <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
                  </div>
                  <div class="modal-body">
                    <img src="<?= base_url('assets/img/mitra/default_logo.png') ?>" class="" style="width: 20%;">

                    <h5 class="mt-2"><?= $mtr['nama_mitra']; ?></h5>
                     
                    <div class="text-left">
                      <h6 class="font-weight-bold">Pimpinan</h6>
                      <table>
                      <tr>
                          <td valign="top">Nama</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mtr['pimpinan']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">E-mail</td>
                          <td valign="top">:</td>
                          <td valign="top" align="justify"><?= $mtr['email_pimpinan']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Kontak</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mtr['no_hp_pimpinan']; ?></td>
                        </tr>
                      </table> 
                      <h6 class=" mt-3 font-weight-bold">Profil Mitra</h6>
                      <table>
                        <tr>
                          <td valign="top">Jenis mitra</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mtr['nama_cluster']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Alamat</td>
                          <td valign="top">:</td>
                          <td valign="top" align="justify"><?= $mtr['alamat'].', '.$mtr['type'].'. '.$mtr['nama_kota'].', - '.$mtr['nama_provinsi']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Situs web</td>
                          <td valign="top">:</td>
                          <td valign="top"><a href="<?= $mtr['situs_web']; ?>" target="_blank">Kunjungi Web</a></td>
                        </tr>
                        <tr>
                          <td valign="top">Titik koordinat</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mtr['titik_koordinat']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Profil ringkas</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mtr['profil_ringkas']; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; } ?>
 
<!-- Begin Page Content  -->
<div class="container">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pengaturan event</h1>
  <div class="row justify-content-md-left">
    <div class="col-md-10 col-sm-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <!-- Content Row -->
  <div class="card shadow" style="border: none; margin: 8vh 10% 0vh 10%; align-items: center;">

    <div class="row text-center m-0 justify-content-md-center">
      <a data-toggle="collapse" href="#nama_event" role="button" aria-expanded="false" aria-controls="#nama_event"> 
        <div class="card border-0">
          <div class="card-body">
            <i class="fas fa-edit fa-2x d-none d-sm-block"></i><br>
            <small class="d-none d-sm-block" style="margin-top:-20%;">NAMA EVENT</small>

            <i class="fas fa-edit d-block d-sm-none"></i><br>
            <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">NAMA EVENT</small>
          </div>
        </div>
      </a>

      <a data-toggle="collapse" href="#penyimpanan" role="button" aria-expanded="false" aria-controls="#penyimpanan"> 
        <div class="card border-0">
          <div class="card-body">
            <i class="fab fa-google-drive fa-2x d-none d-sm-block"></i><br>
            <small class="d-none d-sm-block" style="margin-top:-20%;">PENYIMPANAN</small>

            <i class="fab fa-google-drive d-block d-sm-none"></i><br>
            <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">PENYIMPANAN</small>
          </div>
        </div>
      </a>

      <a data-toggle="collapse" href="#acara_pembekalan" role="button" aria-expanded="false" aria-controls="#acara_pembekalan"> 
        <div class="card border-0">
          <div class="card-body">
           <i class="fas fa-chalkboard-teacher fa-2x d-none d-sm-block"></i><br>
           <small class="d-none d-sm-block" style="margin-top:-20%;">PEMBEKALAN</small>


           <i class="fas fa-chalkboard-teacher d-block d-sm-none"></i><br>
           <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">PEMBEKALAN</small>
         </div>
       </div>
     </a>

     <a data-toggle="collapse" href="#sertifikat" role="button" aria-expanded="false" aria-controls="#sertifikat"> 
      <div class="card border-0">
        <div class="card-body">
          <i class="fas fa-certificate fa-2x d-none d-sm-block"></i><br>
          <small class="d-none d-sm-block" style="margin-top:-20%;">SERTIFIKAT</small>

          <i class="fas fa-certificate d-block d-sm-none"></i><br>
          <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">SERTIFIKAT</small>
        </div>
      </div>
    </a>

  </div>

  <hr style="width: 80%; float: center;">

  <div class="row text-center m-0 mt-2 justify-content-md-center">
    <h5>Waktu Kegiatan</h5>
  </div>

  <div class="row text-center m-0 justify-content-md-center">
    <a data-toggle="collapse" href="#registrasi" role="button" aria-expanded="false" aria-controls="#registrasi"> 
      <div class="card border-0">
        <div class="card-body">
          <i class="fas fa-user-edit fa-2x d-none d-sm-block"></i><br>
          <small  class="d-none d-sm-block" style="margin-top:-20%;">REGISTRASI</small>

          <i class="fas fa-user-edit  d-block d-sm-none"></i><br>
          <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">REGISTRASI</small>
        </div>
      </div>
    </a> 

    <a data-toggle="collapse" href="#pembekalan" role="button" aria-expanded="false" aria-controls="#pembekalan" > 
      <div class="card border-0">
        <div class="card-body">
          <i class="fas fa-chalkboard-teacher fa-2x d-none d-sm-block"></i><br>
          <small class="d-none d-sm-block" style="margin-top:-20%;">PEMBEKALAN</small>

          <i class="fas fa-chalkboard-teacher  d-block d-sm-none"></i><br>
          <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">PEMBEKALAN</small>
        </div>
      </div>
    </a>

    <a data-toggle="collapse" href="#pelayanan" role="button" aria-expanded="false" aria-controls="#pelayanan"> 
      <div class="card border-0">
        <div class="card-body">
          <i class="fas fa-people-carry fa-2x d-none d-sm-block"></i><br>
          <small class="d-none d-sm-block" style="margin-top:-20%;">PELAYANAN</small>

          <i class="fas fa-people-carry  d-block d-sm-none"></i><br>
          <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">PELAYANAN</small>
        </div>
      </div>
    </a>

    <a data-toggle="collapse" href="#pelaporan" role="button" aria-expanded="false" aria-controls="#pelaporan" > 
      <div class="card border-0">
        <div class="card-body">
          <i class="far fa-copy fa-2x d-none d-sm-block"></i><br>
          <small class="d-none d-sm-block" style="margin-top:-20%;">PELAPORAN</small>

          <i class="far fa-copy  d-block d-sm-none"></i><br>
          <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">PELAPORAN</small>
        </div>
      </div>
    </a>

    <a data-toggle="collapse" href="#penilaian" role="button" aria-expanded="false" aria-controls="#penilaian" >
      <div class="card border-0">
        <div class="card-body">
          <i class="fas fa-sort-numeric-up-alt fa-2x d-none d-sm-block"></i><br>
          <small class="d-none d-sm-block" style="margin-top:-20%;">PENILAIAN</small>

          <i class="fas fa-sort-numeric-up-alt d-block d-sm-none"></i><br>
          <small class="d-none d-block d-sm-none" style="font-size:0.6em; margin-top:-20%;">PENILAIAN</small>
        </div> 
      </div>
    </a>
  </div>
</div>

<div class="card shadow bg-light" style="border: none; margin: 1vh 10% 4vh 10%;">
  <div class="row mb-3">  
    <div class="col-sm-12">
      <div class="collapse multi-collapse" id="nama_event">
        <div class="card-body  text-center">
          <h3 class="text-center text-info font-weight-bold m-3 d-none d-sm-block">"<?= $event['nama_event']; ?>"</h3>
          <h3 class="text-center text-info font-weight-bold m-3 d-none d-block d-sm-none"style="font-size:0.8em;">"<?= $event['nama_event']; ?>"</h3>
          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_nama_event">Ubah</a>
        </div>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="collapse multi-collapse" id="penyimpanan"><hr width="90%">
        <div class="card-body  text-center">
          <p class="text-center text-info m-3 d-none d-sm-block">"<?= $event['link_gdrive_default']; ?>"</p>

          <p class="text-center text-info m-3 d-none d-block d-sm-none"style="font-size:0.8em;">"<?= $event['link_gdrive_default']; ?>"</p>
          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_link">Ubah link penyimpanan</a>
        </div>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="collapse multi-collapse" id="acara_pembekalan"><hr width="90%">
        <a href="<?= base_url('Admin/tambah_acara_pembekalan/'.urlencode($event['id_event'])) ?>" class="btn btn-primary btn-sm text-right ml-3">Tambah acara</a>
        <div class="card-body no-border">
          <div class="row">
            <?php $i=0; foreach ($pembekalan as $pmb) {?>
              <div class="col-sm-12">
                <div class="card text-center shadow border-bottom-info mb-2">
                  <div class="card-header text-info font-weight-bold ">
                    Acara pembekalan <?= $i+1; ?> 

                  </div>
                  <div class="card-body">
                    <small>
                      <div class="row">
                        <div class="col-md-3">
                          <p class="card-text font-weight-bold">Instruktur</p>
                          <img class="img-profile" src="<?= base_url('assets/img/instruktur/'.$pmb['image']) ?>" style="width: 60%;">
                          <p class="card-text"><?= $pmb['nama'] ?></p>                         
                        </div>

                        <div class="col-md-9 text-left">
                          <p class="font-weight-bold">Informasi Acara :</p>
                          <table>
                            <tr>
                              <td>Tanggal pelaksanaan</td>
                              <td width="5%" align="center">:</td>
                              <td><?= substr($pmb['waktu_pelaksanaan'], 8, 2).'-'.substr($pmb['waktu_pelaksanaan'], 5, 2).'-'.substr($pmb['waktu_pelaksanaan'], 0, 4); ?></td>
                            </tr>
                            <tr>
                              <td>Waktu pelaksanaan</td>
                              <td align="center">:</td>
                              <td><?= substr($pmb['waktu_pelaksanaan'], 11, 5); ?></td>
                            </tr>
                            <tr>
                              <td>Link Materi</td>
                              <td align="center">:</td>
                              <td><a href="<?= $pmb['link_materi']?>" target="_blank">Link materi</a></td>
                            </tr>
                            <tr>
                              <td>Link Meeting</td>
                              <td align="center">:</td>
                              <td><a href="<?= $pmb['link']?>" target="_blank">Link acara</a></td>
                            </tr>
                            <tr>
                              <td>Status</td>
                              <td align="center">:</td>
                              <td>
                                <?php if ((strtotime($pmb['waktu_pelaksanaan'])+ 60*60*2) < strtotime(date('YmdHis'))) {?>
                                  <b class="font-weight-bold text-secondary">Acara sudah selesai</b>
                                <?php } 
                                elseif (strtotime($pmb['waktu_pelaksanaan']) < (strtotime(date('YmdHis')+ 60*60*2))) {?>
                                  <b class="font-weight-bold text-danger">Acara sedang berlangsung</b>
                                <?php }
                                elseif (strtotime($pmb['waktu_pelaksanaan']) > strtotime(date('YmdHis'))) {?>
                                  <b class="font-weight-bold text-info">Acara belum dilaksanakan</b>
                                <?php }?>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <?php if ((strtotime($pmb['waktu_pelaksanaan'])+ 60*60*24 ) > strtotime(date('Y-m-d G:i:s'))) { ?>
                        <a href="<?= base_url('Admin/ubah_pembekalan/'.$pmb['id_pembekalan']);?>" class="btn btn-warning btn-sm mr-2">Ubah</a>
                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#WarningModalalert">Hapus</a>
                      <?php } ?>
                    </small>
                  </div>
                </div>
              </div>
              <?php $i++; } ?>

            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="collapse multi-collapse" id="sertifikat"><hr width="90%">
         <a href="" class="btn btn-primary btn-sm text-right ml-3" data-toggle="modal" data-target="#modal_ubah_template_Sertifikat">Atur template</a>
         <div class="card-body no-border">
          <div>
            <div class="card shadow">
              <div class="card-header text-info font-weight-bold text-center">
               Pengaturan Sertifikat
             </div> 
             <div class="card-body"  style="font-size:0.9em; margin-left: -2vw;">
              <!-- <small> -->
                <ol>
                  <li><b>Kota tempat dikeluarkan sertifikat :</b><br>

                    <?php if ($template_sertifikat) { echo $template_sertifikat['tempat_dikeluarkan']; } else{ echo 'Belum diatur';} ?><br><br>
                  </li>

                  <li>
                    <b>Tanggal dikeluarkan sertifikat :</b><br>

                    <?php if ($template_sertifikat) { echo $template_sertifikat['tgal_dikeluarkan']; } else{ echo 'Belum diatur';} ?><br><br>

                    <hr>
                  </li>

                  <li>
                   <b>Nama pemberi tanda tangan 1 (kiri) :</b><br>
                   <?php if ($template_sertifikat) { echo $template_sertifikat['nama_1']; } else{ echo 'Belum diatur';} ?><br><br>

                 </li>

                 <li>
                   <b>Jabatan pemberi tanda tangan 1 :</b><br>
                   <?php if ($template_sertifikat) { echo $template_sertifikat['jabatan_1']; } else{ echo 'Belum diatur';} ?><br><br>
                 </li>


                 <li>
                   <b>Tanda tangan 1 :</b><br>
                   <?php if ($template_sertifikat) { ?>
                    <img src="<?= base_url('assets/img/sertifikat/tanda_tangan/'.$template_sertifikat['ttd_1']); ?>" width="100vw"> <?php } 
                    else{ echo 'Belum diatur'; } ?><br><br>
                  </li>

                  <li>
                   <b>Stempel 1 :</b><br>
                   <?php if ($template_sertifikat) { ?>
                    <img src="<?= base_url('assets/img/sertifikat/stempel/'.$template_sertifikat['stempel_1']); ?>" width="100vw"> <?php } 
                    else{  echo 'Belum diatur'; } ?><br><br>



                    <hr>
                  </li>

                  <li>  
                    <b>Nama pemberi tanda tangan 2 (kanan) :</b><br>
                    <?php if ($template_sertifikat) { echo $template_sertifikat['nama_2']; } else{ echo 'Belum diatur';} ?><br><br>

                  </li>

                  <li>    
                    <b>Jabatan pemberi tanda tangan 2 :</b><br>
                    <?php if ($template_sertifikat) { echo $template_sertifikat['jabatan_2']; } else{ echo 'Belum diatur';} ?><br><br>
                  </li>

                  <li>
                    <b>Tanda tangan 2 :</b><br>
                    <?php if ($template_sertifikat) { ?>
                      <img src="<?= base_url('assets/img/sertifikat/tanda_tangan/'.$template_sertifikat['ttd_2']); ?>" width="100vw"> <?php } 
                      else{ echo 'Belum diatur';} ?><br><br>
                    </li>

                    <li>
                      <b>Stempel 2 :</b><br>
                      <?php if ($template_sertifikat) { ?>
                        <img src="<?= base_url('assets/img/sertifikat/stempel/'.$template_sertifikat['stempel_2']); ?>" width="100vw"> <?php } 
                        else{ echo 'Belum diatur';} ?><br><br>
                      </li>
                    </ol> 
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <div class="collapse multi-collapse" id="registrasi"><hr width="90%">
            <div class="card-body no-border">
              <small>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Awal Registrasi
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['awal_registrasi'], 8, 2).'-'.substr($event['awal_registrasi'], 5, 2).'-'.substr($event['awal_registrasi'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['awal_registrasi'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah1">Ubah</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Akhir Registrasi
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['akhir_registrasi'], 8, 2).'-'.substr($event['akhir_registrasi'], 5, 2).'-'.substr($event['akhir_registrasi'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['akhir_registrasi'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah2">Ubah</a>
                      </div>
                    </div>
                  </div>
                </div>
              </small>
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <div class="collapse multi-collapse" id="pembekalan"><hr width="90%">
            <div class="card-body no-border">            
              <small>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Awal Pembekalan
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['awal_pembekalan'], 8, 2).'-'.substr($event['awal_pembekalan'], 5, 2).'-'.substr($event['awal_pembekalan'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['awal_pembekalan'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah3">Ubah</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Akhir Pembekalan
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['akhir_pembekalan'], 8, 2).'-'.substr($event['akhir_pembekalan'], 5, 2).'-'.substr($event['akhir_pembekalan'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['akhir_pembekalan'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah4">Ubah</a>
                      </div>
                    </div>
                  </div>
                </div>
              </small>
            </div>
          </div>
        </div>


        <div class="col-sm-12">
          <div class="collapse multi-collapse" id="pelayanan"><hr width="90%">
            <div class="card-body no-border">
              <small>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Awal Pelayanan
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['awal_pelayanan'], 8, 2).'-'.substr($event['awal_pelayanan'], 5, 2).'-'.substr($event['awal_pelayanan'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['awal_pelayanan'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah5">Ubah</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Akhir Pelayanan
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['akhir_pelayanan'], 8, 2).'-'.substr($event['akhir_pelayanan'], 5, 2).'-'.substr($event['akhir_pelayanan'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['akhir_pelayanan'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah6">Ubah</a>
                      </div>
                    </div>
                  </div>
                </div>
              </small>
            </div>
          </div>   
        </div> 

        <div class="col-sm-12">
          <div class="collapse multi-collapse" id="pelaporan"><hr width="90%">
            <div class="card-body no-border">
              <small>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Awal Pelaporan
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['awal_pelaporan'], 8, 2).'-'.substr($event['awal_pelaporan'], 5, 2).'-'.substr($event['awal_pelaporan'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['awal_pelaporan'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah7">Ubah</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Akhir Pelaporan
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['akhir_pelaporan'], 8, 2).'-'.substr($event['akhir_pelaporan'], 5, 2).'-'.substr($event['akhir_pelaporan'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['akhir_pelaporan'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah8">Ubah</a>
                      </div>
                    </div>
                  </div>
                </div>
              </small>
            </div>
          </div> 
        </div>

        <div class="col-sm-12">
          <div class="collapse multi-collapse" id="penilaian"><hr width="90%">
            <div class="card-body no-border">
              <small>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Awal Penilaian
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['awal_penilaian'], 8, 2).'-'.substr($event['awal_penilaian'], 5, 2).'-'.substr($event['awal_penilaian'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['awal_penilaian'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah9">Ubah</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card text-center shadow border-bottom-info mb-2">
                      <div class="card-header text-info font-weight-bold">
                        Akhir Penilaian
                      </div>
                      <div class="card-body">
                        <b class="card-text">Tanggal. <?= substr($event['akhir_penilaian'], 8, 2).'-'.substr($event['akhir_penilaian'], 5, 2).'-'.substr($event['akhir_penilaian'], 0, 4); ?></b>
                        <p class="card-text">Pukul. <?= substr($event['akhir_penilaian'], 11, 5); ?></p>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah10">Ubah</a>
                      </div>
                    </div>
                  </div>
                </div>
              </small>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->

      <!-- /Content Row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content --->

  <!-- Modal Ubah nama event -->
  <?php for ($i=1; $i <= 10 ; $i++) { ?>
    <div class="modal fade" id="modal_ubah_nama_event" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content text-center">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-light" id="staticBackdropLabel">Ubah nama event</h5>
            <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 5% 10% 0 10%;">
            <form class="user was-validated" method="post" action="<?= base_url('Admin/ubah_event/nama_event/'.urlencode($event['id_event']));?>" enctype="multipart/form-data">

              <input type="text" class="form-control" id="nama" name="nama" placeholder="<?= $event['nama_event']; ?>" value="<?= $event['nama_event']; ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi nama event')" oninput="setCustomValidity('')">

              <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Tentukan nama event.</div>
              <div class="valid-feedback text-left">Nama event.</div><br>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>


  <!-- Modal Ubah link google drive -->
  <?php for ($i=1; $i <= 10 ; $i++) { ?>
    <div class="modal fade" id="modal_ubah_link" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content text-center">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-light" id="staticBackdropLabel">Ubah link penyimpanan default</h5>
            <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 5% 10% 0 10%;">
            <form class="user was-validated" method="post" action="<?= base_url('Admin/ubah_event/link_event/'.urlencode($event['id_event']));?>" enctype="multipart/form-data">

              <input type="text" class="form-control" id="link" name="link" placeholder="<?= $event['link_gdrive_default']; ?>" value="<?= $event['link_gdrive_default']; ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi link default penyimpanan berkas')" oninput="setCustomValidity('')">

              <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Tentukan link penyimpanan default untuk unggahan berkas pada event ini.</div>
              <div class="valid-feedback text-left">Link penyimpanan default.</div>


            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>


  <!-- Modal tambah acara -->
  <?php for ($i=1; $i <= 10 ; $i++) { ?>
    <div class="modal fade" id="modal_tambah_acara_pembekalan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content text-center">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-light" id="staticBackdropLabel">Tambah Acara Pembekalan</h5>
            <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 5% 10% 0 10%;">
            <form class="user was-validated" method="post" action="<?= base_url('Admin/ubah_event/tambah_acara_pembekalan/'.urlencode($event['id_event']));?>" enctype="multipart/form-data">

              <input type="text" class="form-control" id="link" name="link" placeholder="<?= $event['link_gdrive_default']; ?>" value="<?= $event['link_gdrive_default']; ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi link default penyimpanan berkas')" oninput="setCustomValidity('')">

              <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Tentukan link penyimpanan default untuk unggahan berkas pada event ini.</div>
              <div class="valid-feedback text-left">Link penyimpanan default.</div>


            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- Modal Ubah tanggal -->
  <?php for ($i=1; $i <= 10 ; $i++) { ?>
    <div class="modal fade" id="modal_ubah<?=$i;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content text-center">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-light" id="staticBackdropLabel">Ubah <?= $Judul[$i]; ?></h5>
            <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 5% 10% 0 10%;">
            <form class="user was-validated" method="post" action="<?= base_url('Admin/ubah_event/'.$Judul[$i]."/".urlencode($event['id_event']));?>" enctype="multipart/form-data">
              <div class="form-group">
                <input type="date" class="form-control" id="date" name="tgl" placeholder="Tanggal" value="<?= substr($event[$nama_atribut[$i]], 0, 10); ?>" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum menentukan tanggal <?= $Judul[$i]; ?>')" oninput="setCustomValidity('')">

                <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
                <div class="invalid-feedback text-left">Tentukan tanggal <?=$Judul[$i]; ?>.</div>
                <div class="valid-feedback text-left">Tanggal <?=$Judul[$i]; ?></div>
              </div>
              <div class="form-group">
                <input type="time" class="form-control" id="time" name="time"  min="00:00" max="23:59" value="<?= substr($event[$nama_atribut[$i]], 11, 5); ?>" required oninvalid="this.setCustomValidity('Harap tentukan batas waktu <?= $Judul[$i]; ?>')" oninput="setCustomValidity('')">

                <?= form_error('date', '<small class="text-danger pl-3">','</small>'); ?>
                <div class="invalid-feedback text-left">Tentukan waktu <?=$Judul[$i]; ?>.</div>
                <div class="valid-feedback text-left">Waktu <?=$Judul[$i]; ?></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>

  <div id="WarningModalalert" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">

          <i class="fa fa-exclamation-triangle fa-3x text-warning"></i>
          <h2 class="mt-2"><b>Peringatan!</b></h2>
          <p>Anda yakin akan menghapus acara pembekalan ini?</p>
        </div>
        <div class="modal-footer warning-md" style="margin-top: -7%;">
          <a href="<?= base_url('Admin/ubah_event/hapus_acara_pembekalan/'.urlencode($pmb['id_pembekalan']));?>"class="badge badge-danger badge-xs" type="button">Hapus acara</a>
          <!-- <a href="" class="badge badge-warning badge-xs " type="button" data-dismiss="modal">Keluar</a> -->
        </div>
      </div>
    </div>
  </div>





  <!-- modal ubah sertifikat -->
  <div id="modal_ubah_template_Sertifikat" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content text-center">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-light" id="staticBackdropLabel">Pengaturan Sertifikat</h5>
            <button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body m-0">
          
          <form class="user was-validated mt-4" method="post" action="<?= base_url('Admin/ubah_template_sertifikat/'.$event['id_event']);?>" enctype="multipart/form-data">


            <div class="form-group">
              <input type="text" class="form-control" id="kota" name="kota" placeholder="Nama kota diterbitkan sertifikat" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi nama kota diterbitkan sertifikat')" oninput="setCustomValidity('')" value="<?php if ($template_sertifikat) { echo $template_sertifikat['tempat_dikeluarkan']; }else{echo'';} ?>">

              <?= form_error('kota', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Isi nama kota diterbitkan sertifikat.</div>
              <div class="valid-feedback text-left">Nama kota diterbitkan sertifikat.</div>
            </div>

            <div class="form-group">
              <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal diterbitkan sertifikat" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi tanggal diterbitkan sertifikat')" oninput="setCustomValidity('')" value="<?php if ($template_sertifikat) { echo $template_sertifikat['tgal_dikeluarkan']; }else{echo'';} ?>">

              <?= form_error('tanggal', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Isi tanggal diterbitkan sertifikat.</div>
              <div class="valid-feedback text-left">Tanggal diterbitkan sertifikat.</div>
            </div>
            <hr><b class="mb-4">Ttd ke-1</b>

            <div class="form-group">
              <input type="text" class="form-control" id="nama_1" name="nama_1" placeholder="Nama yang menandatangani sertifikat" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi nama orang yang menandatangani sertifikat')" oninput="setCustomValidity('')" value="<?php if ($template_sertifikat) { echo $template_sertifikat['nama_1']; }else{echo'';} ?>">

              <?= form_error('nama_1', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Isi nama orang yang menandatangani sertifikat (kiri).</div>
              <div class="valid-feedback text-left">Nama orang yang menandatangani sertifikat (kiri).</div>
            </div>   

            <div class="form-group">
              <input type="text" class="form-control" id="jabatan_1" name="jabatan_1" placeholder="Jabatan yang menandatangani sertifikat" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi jabatan yang menandatangani sertifikat')" oninput="setCustomValidity('')" value="<?php if ($template_sertifikat) { echo $template_sertifikat['jabatan_1']; }else{echo'';} ?>">

              <?= form_error('jabatan_1', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Isi jabatan yang menandatangani sertifikat (kiri).</div>
              <div class="valid-feedback text-left">Jabatan yang menandatangani sertifikat (kiri).</div>
            </div>    

            <div class="col  mb-4  ">
              <input type="file" class="custom-file-input form-control" id="ttd_1" name="ttd_1" accept=".png" oninvalid="this.setCustomValidity('Anda belum mengunggah ttd..')" oninput="setCustomValidity('')">
              <!-- menampilkan notifikasi kesalahan inputan -->

              <label class="custom-file-label text-left" for="ttd_1">unggah image</label>
              <div class="invalid-feedback text-left">Anda belum memilih image tanda tangan untuk di unggah</div>
              <div class="valid-feedback text-left">Tanda tangan 1</div>
            </div> 

            <div class="col mb-4  ">
              <input type="file" class="custom-file-input form-control" id="cap_1" name="cap_1" accept=".png" oninvalid="this.setCustomValidity('Anda belum mengunggah ttd..')" oninput="setCustomValidity('')" >
              <!-- menampilkan notifikasi kesalahan inputan -->

              <label class="custom-file-label text-left" for="cap_1">unggah image</label>
              <div class="invalid-feedback text-left">Anda belum memilih image stempel untuk di unggah</div>
              <div class="valid-feedback text-left">Stempel 1</div>
            </div>    


            <hr>
            <b class="mb-4">Ttd ke-2</b>
            <div class="form-group">
              <input type="text" class="form-control" id="nama_2" name="nama_2" placeholder="Nama yang menandatangani sertifikat" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi nama orang yang menandatangani sertifikat')" oninput="setCustomValidity('')" value="<?php if ($template_sertifikat) { echo $template_sertifikat['nama_2']; }else{echo'';} ?>">

              <?= form_error('nama_2', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Isi nama orang yang menandatangani sertifikat (kanan).</div>
              <div class="valid-feedback text-left">Nama orang yang menandatangani sertifikat (kanan).</div>
            </div>   

            <div class="form-group">
              <input type="text" class="form-control" id="jabatan_2" name="jabatan_2" placeholder="Jabatan yang menandatangani sertifikat" aria-describedby="inputGroupPrepend" required oninvalid="this.setCustomValidity('Anda belum mengisi jabatan yang menandatangani sertifikat')" oninput="setCustomValidity('')" value="<?php if ($template_sertifikat) { echo $template_sertifikat['jabatan_2']; }else{echo'';} ?>">

              <?= form_error('jabatan_2', '<small class="text-danger pl-3">','</small>'); ?>
              <div class="invalid-feedback text-left">Isi jabatan yang menandatangani sertifikat (kanan).</div>
              <div class="valid-feedback text-left">Jabatan yang menandatangani sertifikat (kanan).</div>
            </div>    

            <div class="col  mb-4  ">
              <input type="file" class="custom-file-input form-control" id="ttd_2" name="ttd_2" accept=".png" oninvalid="this.setCustomValidity('Anda belum mengunggah ttd..')" oninput="setCustomValidity('')" >
              <!-- menampilkan notifikasi kesalahan inputan -->

              <label class="custom-file-label text-left" for="ttd_2">unggah image</label>
              <div class="invalid-feedback text-left">Anda belum memilih image tanda tangan untuk di unggah</div>
              <div class="valid-feedback text-left">Tanda tangan 2</div>
            </div> 

            <div class="col mb-4  ">
              <input type="file" class="custom-file-input form-control" id="cap_2" name="cap_2" accept=".png" oninvalid="this.setCustomValidity('Anda belum mengunggah ttd..')" oninput="setCustomValidity('')">
              <!-- menampilkan notifikasi kesalahan inputan -->

              <label class="custom-file-label text-left" for="cap_2">unggah image</label>
              <div class="invalid-feedback text-left">Anda belum memilih image stempel untuk di unggah</div>
              <div class="valid-feedback text-left">Stempel 2</div>
            </div>    

            <hr>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
          </form>



        </div>
      </div>
    </div>
  </div>






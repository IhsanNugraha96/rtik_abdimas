<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Indikator Penilaian</h1>
  <div class="row">
    <div class="col-lg-10 ">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>
  <!-- Content Row -->



  <div class="row mt-4">
    <div class="col-lg-2">
      <a data-toggle="collapse" href="#persentase" role="button" aria-expanded="false" aria-controls="#persentase"> 
      <div class="card shadow">
        <div class="row text-center m-0">
          <div class="col">
            <div class="card border-0">
              <div class="card-body">
                <i class="fas fa-percent fa-2x  text-primary"></i><br>
                <small class="font-weight-bold">Persentase Penilaian</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
    </div>

    <div class="col-lg-10">
      <div class="card shadow">
    <div class="collapse multi-collapse" id="persentase">
        <div class="row mb-2">  
          <div class="col-sm-12">
            <div class="card-body  text-center">
              <div class="row">

                <div class="col-lg-3">
                  <div class="row text-left text-secondary m-0">
                    <a href="" role="button"> 
                      <small class="font-weight-bold">Kinerja Tim</small>             
                    </a>
                  </div>
                </div>


                <div class="col-lg-9">
                  <div class="card shadow">
                    <div class="row mb-3">
                     <div class="col-sm-12">
                      <div class="card-body  text-left">
                        <small class="text-center text-info font-weight-bold"><p>Rumus : "KT = <?php $i=0; 
                        foreach ($kinerja_tim as $kt) 
                          {echo $kt['kd_penilaian'].'*'.$kt['persentase'].'%'; if ($i != (count($kinerja_tim)-1)) { echo' + '; } $i++;} ?>"</p></small>
                        <?php foreach ($kinerja_tim as $kt) 
                        {?>
                          <small class="text-left mb-1 font-weight-bold"><?php if ($kt['kd_penilaian'] == 'dok') { echo 'Dokumen';} elseif ($kt['kd_penilaian'] == 'mtr') { echo 'Mitra';} elseif ($kt['kd_penilaian'] == 'lpr') { echo 'Laporan';} ?></small>
                          <input type="text" class="form-control is_invalid form-control-sm" rows="4" id="nama" name="nama" readonly  placeholder="<?= $kt['persentase'].'%';?>" required oninvalid="this.setCustomValidity('Anda belum mengisi indikator penilaian')" oninput="setCustomValidity('')">
                        <?php } ?>
                        
                        <a href="#" class="btn btn-info btn-sm mt-3" data-toggle="modal" data-target="#modal_ubah_persentase_kinerja_tim"><small class="font-weight-bold">Ubah persentase</small></a>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>



            </div>
            </div> 
          </div>
        </div>
      <hr width="90%">

      <div class="row mb-2">  
        <div class="col-sm-12">
          <div class="card-body  text-center">
            <div class="row">
              <div class="col-lg-3">
                <div class="row text-left text-secondary m-0">
                 <a href="" role="button"> 
                      <small class="font-weight-bold">Nilai Individu</small>             
                    </a>
                </div>
              </div>


              <div class="col-lg-9">
                <div class="card shadow">
                  <div class="row mb-3">
                   <div class="col-sm-12">
                    <div class="card-body  text-left">
                       <small class="text-center text-info font-weight-bold"><p>Rumus : "NI = <?php $i=0; 
                        foreach ($nilai_individu as $ni) 
                          {if( $ni['persentase'] != '100'){echo $ni['kd_penilaian'].'*'.$ni['persentase'].'%';} else{echo 'AVERAGE';} $i++;} ?>"</p></small>
                        <?php foreach ($nilai_individu as $ni) 
                        {?>
                          <small class="text-left mb-1 font-weight-bold"></small>
                          <Input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" readonly placeholder="<?php if( $ni['persentase'] != '100'){echo $ni['persentase'].'%';} else{echo 'AVERAGE';} ?>" required oninvalid="this.setCustomValidity('Anda belum mengisi indikator penilaian')" oninput="setCustomValidity('')">
                        <?php } ?>
                        
                        <a href="#" class="btn btn-info btn-sm mt-3" data-toggle="modal" data-target="#modal_ubah_persentase_nilai_individu"><small class="font-weight-bold">Ubah persentase</small></a>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div> 
        </div>
      </div>
    </div>

      <hr width="90%">



    <div class="row mb-2">  
      <div class="col-sm-12">
        <div class="card-body  text-center">
          <div class="row">
            <div class="col-lg-3">
              <div class="row text-left text-secondary m-0">
                <a href="" role="button"> 
                  <small class="font-weight-bold">Kinerja Relawan</small>             
                </a>
              </div>
            </div>

            <div class="col-lg-9">
              <div class="card shadow">
                <div class="row mb-3">
                  <div class="col-sm-12">
                   <div class="card-body  text-left">
                      <small class="text-center text-info font-weight-bold"><p>Rumus : "KR = <?php $i=0; 
                        foreach ($kinerja_relawan as $kr) 
                          {echo $kr['kd_penilaian'].'*'.$kr['persentase'].'%'; if ($i != (count($kinerja_relawan)-1)) { echo' + '; } $i++;} ?>"</p></small>
                        <?php foreach ($kinerja_relawan as $kr) 
                        {?>
                           <small class="text-left mb-1 font-weight-bold"><?php if ($kr['kd_penilaian'] == 'KT') { echo 'Kriteria Tim';} elseif ($kr['kd_penilaian'] == 'NI') { echo 'Nilai Individu';}?></small>
                          <Input type="text" class="form-control is_invalid form-control-sm" id="nama" name="nama" readonly  placeholder="<?= $kr['persentase'].'%';?>" >
                        <?php } ?>
                        
                        <a href="#" class="btn btn-info btn-sm mt-3" data-toggle="modal" data-target="#modal_ubah_persentase_kinerja_relawan"><small class="font-weight-bold">Ubah persentase</small></a>
                  </div>
                </div>
              </div>
            </div> 
          </div>

        </div> 
      </div>
    </div>
  </div>

      </div>


</div> 
</div>
</div> 





<div class="row mt-1 mb-4">
  <div class="col-md-2">
    <div class="card shadow">
      <div class="row text-center m-0">
        <div class="col text-center mt-3">
          <u><small class="font-weight-bold">Indikator Penilaian</small></u>
        </div>
        
        <div class="col">
          <a data-toggle="collapse" href="#kinerja_tim" role="button" aria-expanded="false" aria-controls="#kinerja_tim"> 
            <div class="card border-0">
              <div class="card-body">
                <i class="fas fa-people-carry fa-2x"></i><br>
                <small>Kinerja Tim</small>
              </div>
            </div>
          </a>
        </div>


        <div class="col">
          <a data-toggle="collapse" href="#individu" role="button" aria-expanded="false" aria-controls="#individu"> 
            <div class="card border-0">
              <div class="card-body">
                <i class="fas fa-child fa-2x"></i><br>
                <small>Nilai Individu</small>
              </div>
            </div>
          </a>
        </div>

       <!--  <div class="col">
          <a data-toggle="collapse" href="#mitra" role="button" aria-expanded="false" aria-controls="#mitra"> 
            <div class="card border-0">
              <div class="card-body">
               <i class="fas fa-chalkboard-teacher fa-2x"></i><br>
               <small>Mitra</small>
             </div>
           </div>
         </a>
       </div>

       <div class="col">
        <a data-toggle="collapse" href="#pembimbing" role="button" aria-expanded="false" aria-controls="#pembimbing"> 
          <div class="card border-0">
            <div class="card-body">
              <i class="fas fa-chalkboard-teacher fa-2x"></i><br>
              <small>Pembimbing</small>
            </div>
          </div>
        </a>
      </div> -->


    </div>
  </div>
</div>




<div class="col-md-10">
  <div class="card shadow">
    <div class="row mb-3">  
      

      <div class="col-sm-12">
        <div class="collapse multi-collapse" id="kinerja_tim">
          <div class="card-body  text-center">
            <h5>Indikator Penilaian Laporan Akhir</h5>
            <div class="card shadow mt-3">
              <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel indikator penilaian laporan akhir oleh pembimbing</h6>
                  <div>
                   <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_indikator_penilaian_laporan"><i class="fas fa-plus text-white"></i> Tambah indikator</a>
                 </div>
               </div>
             </div>
             <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <th>No.</th>
                    <th>Indikator Penilaian</th>
                    <th>Aksi</th>
                  </thead>
                  <?php $i=0; foreach ($indikator_report as $indikator) 
                  {?>
                    <tbody>
                      <td><small><?= $i+1;?></small></td>
                      <td align="left"><small><?= $indikator['indikator']; ?></small></td>
                      <td>
                        <a href="" name="edit" class="badge badge-warning" data-toggle="modal" data-target="#ubah_indikator_<?=$indikator['id_indikator'];?>">edit</i></a>
                        <a href="" name="hapus" class="badge badge-danger" data-toggle="modal" data-target="#hapus_indikator_<?=$indikator['id_indikator'];?>">hapus</i></a>
                      </td>
                    </tbody>
                    <?php $i++; } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-12">
        <div class="collapse multi-collapse" id="kinerja_tim"><hr width="90%">
          <div class="card-body  text-center">
            <h5>Indikator Penilaian Survei Program</h5>
            <div class="card shadow mt-3">
              <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel indikator penilaian survei program oleh mitra</h6>
                  <div>
                   <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_indikator_mitra"><i class="fas fa-plus text-white"></i> Tambah indikator</a>
                 </div>
               </div>
             </div>
             <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <th>No.</th>
                    <th>Indikator Penilaian</th>
                    <th>Aksi</th>
                  </thead>
                  <?php $i=0; foreach ($indikator_survei_program as $indikator) 
                  {?>
                    <tbody>
                      <td><small><?= $i+1;?></small></td>
                      <td align="left"><small><?= $indikator['indikator']; ?></small></td>
                      <td>
                        <a href="" name="edit" class="badge badge-warning" data-toggle="modal" data-target="#ubah_indikator_<?=$indikator['id_indikator'];?>">edit</i></a>
                        <a href="" name="hapus" class="badge badge-danger" data-toggle="modal" data-target="#hapus_indikator_<?=$indikator['id_indikator'];?>">hapus</i></a>
                      </td>
                    </tbody>
                    <?php $i++; } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="collapse multi-collapse" id="kinerja_tim"><hr width="90%">
          <div class="card-body  text-center">
            <h5>Indikator Performa</h5>
            <div class="card shadow mt-3">
              <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel indikator penilaian performa tim oleh pembimbing</h6>
                  <div>
                   <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_indikator_performa"><i class="fas fa-plus text-white"></i> Tambah indikator</a>
                 </div>
               </div>
             </div>
             <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <th>No.</th>
                    <th>Indikator Penilaian</th>
                    <th>Aksi</th>
                  </thead>
                  <?php $i=0; foreach ($indikator_performa as $indikator) 
                  {?>
                    <tbody>
                      <td><small><?= $i+1;?></small></td>
                      <td align="left"><small><?= $indikator['indikator']; ?></small></td>
                      <td>
                        <a href="" name="edit" class="badge badge-warning" data-toggle="modal" data-target="#ubah_indikator_<?=$indikator['id_indikator'];?>">edit</i></a>
                        <a href="" name="hapus" class="badge badge-danger" data-toggle="modal" data-target="#hapus_indikator_<?=$indikator['id_indikator'];?>">hapus</i></a>
                      </td>
                    </tbody>
                    <?php $i++; } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="col-sm-12">
        <div class="collapse multi-collapse" id="individu">
          <div class="card-body text-center mt-3">
            <h5>Indikator Penilaian Personel Kelompok</h5>
            <div class="card shadow mt-3">
              <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel indikator penilaian personel kelompok oleh personel kelompok dan pembimbing</h6>
                  <div>
                   <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_indikator_collaborative"><i class="fas fa-plus text-white"></i> Tambah indikator</a>
                 </div>
               </div>
             </div>
             <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <th>No.</th>
                    <th>Indikator Penilaian</th>
                    <th>Aksi</th>
                  </thead>
                  <?php $i=0; foreach ($indikator_penilaian_sejawat as $indikator) 
                  {?>
                    <tbody>
                      <td  width="10%"><small><?= $i+1;?></small></td>
                      <td class="text-left"><small><?= $indikator['indikator']; ?></small></td>
                      <td  width="20%">
                        <a href="" name="edit" class="badge badge-warning"  data-toggle="modal" data-target="#ubah_indikator_<?=$indikator['id_indikator'];?>">edit</i></a>
                      </td>
                    </tbody>
                    <?php $i++; } ?>
                  </table>
                </div>
                <small>Note : Masukan satu indikator penilaian secara umum, dikarenakan nanti akan disesuaikan dengan jumlah personel setiap tim.</small>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
</div>





<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content-->




<!-- ubah persentase kinerja Tim -->
<div id="modal_ubah_persentase_kinerja_tim" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/ubah_persentase_kinerja_tim')  ?>">
          
          <?php foreach ($kinerja_tim as $kt) 
           {?>
            <div class="form-group text-left">
            <small class="text-left mb-1 font-weight-bold"><?php if ($kt['kd_penilaian'] == 'dok') { echo 'Dokumen';} elseif ($kt['kd_penilaian'] == 'mtr') { echo 'Mitra';} elseif ($kt['kd_penilaian'] == 'lpr') { echo 'Laporan';} ?></small>

            <Input type="number" class="form-control is_invalid form-control-sm" id="<?=$kt['kd_penilaian'] ?>" name="<?=$kt['kd_penilaian'] ?>" value="<?= $kt['persentase'];?>" required oninvalid="this.setCustomValidity('Anda belum mengisi persentase penilaian')" oninput="setCustomValidity('')">
         
          <div class="invalid-feedback text-left"> 
            Harap mengisi persentase penilaian.
          </div>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
          simpan
        </button>              
      </form>
      <!-- akhir form -->
    </div>
  </div>
</div>
</div>


<!-- ubah persentase kinerja Tim -->
<div id="modal_ubah_persentase_nilai_individu" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/ubah_persentase_nilai_individu')  ?>">
          
          <?php foreach ($nilai_individu as $ni) 
           {?>
            <div class="form-group text-left">
            <small class="text-left mb-1 font-weight-bold"><?php if ($ni['kd_penilaian'] == 'dok') { echo 'Dokumen';} elseif ($ni['kd_penilaian'] == 'mtr') { echo 'Mitra';} elseif ($ni['kd_penilaian'] == 'lpr') { echo 'Laporan';} ?></small>

            <Input type="number" class="form-control is_invalid form-control-sm" id="<?=$ni['kd_penilaian'] ?>" name="<?=$ni['kd_penilaian'] ?>" value="<?= $ni['persentase'];?>" required oninvalid="this.setCustomValidity('Anda belum mengisi persentase penilaian')" oninput="setCustomValidity('')">
         
          <div class="invalid-feedback text-left"> 
            Harap mengisi pesentase penilaian.
          </div>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
          simpan
        </button>              
      </form>
      <!-- akhir form -->
    </div>
  </div>
</div>
</div>




<!-- ubah persentase kriteria relawan -->
<div id="modal_ubah_persentase_kinerja_relawan" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/ubah_persentase_kinerja_relawan')  ?>">
          
          <?php foreach ($kinerja_relawan as $kr) 
           {?>
            <div class="form-group text-left">
            <small class="text-left mb-1 font-weight-bold"><?php if ($kr['kd_penilaian'] == 'NI') { echo 'Nilai Individu';} elseif ($kr['kd_penilaian'] == 'KT') { echo 'Kinerja Tim';}?></small>

            <Input type="number" class="form-control is_invalid form-control-sm" id="<?=$kr['kd_penilaian'] ?>" name="<?=$kr['kd_penilaian'] ?>" value="<?= $kr['persentase'];?>" required oninvalid="this.setCustomValidity('Anda belum mengisi persentase penilaian')" oninput="setCustomValidity('')">
         
          <div class="invalid-feedback text-left"> 
            Harap mengisi pesentase penilaian.
          </div>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
          simpan
        </button>              
      </form>
      <!-- akhir form -->
    </div>
  </div>
</div>
</div>



<!-- tambah_indikator_survei_mitra -->
<div id="tambah_indikator_collaborative" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/aksi_kriteria_penilaian/tambah_indikator_collaborative/0')  ?>">
          <div class="form-group">
            <p for="" class="text-left mb-1 font-weight-bold">Indikator penilaian :</p>
            <textarea class="form-control is_invalid form-control-sm" rows="4"  id="nama" name="nama" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi indikator penilaian..')" oninput="setCustomValidity('')"></textarea>
            <div class="invalid-feedback text-left"> 
              Harap mengisi indikator penilaian.
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
            simpan
          </button>              
        </form>
        <!-- akhir form -->
      </div>
    </div>
  </div>
</div>



<!-- tambah_indikator_survei_mitra -->
<div id="tambah_indikator_mitra" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/aksi_kriteria_penilaian/tambah_indikator_mitra/0')  ?>">
          <div class="form-group">
            <p for="" class="text-left mb-1 font-weight-bold">Indikator penilaian :</p>
            <textarea class="form-control is_invalid form-control-sm" rows="4"  id="nama" name="nama" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi indikator penilaian..')" oninput="setCustomValidity('')"></textarea>
            <div class="invalid-feedback text-left"> 
              Harap mengisi indikator penilaian.
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
            simpan
          </button>              
        </form>
        <!-- akhir form -->
      </div>
    </div>
  </div>
</div>


<!-- tambah_indikator_performa -->
<div id="tambah_indikator_performa" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/aksi_kriteria_penilaian/tambah_indikator_performa/0')  ?>">
          <div class="form-group">
            <p for="" class="text-left mb-1 font-weight-bold">Indikator penilaian :</p>
            <textarea class="form-control is_invalid form-control-sm" rows="4"  id="nama" name="nama" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi indikator penilaian..')" oninput="setCustomValidity('')"></textarea>
            <div class="invalid-feedback text-left"> 
              Harap mengisi indikator penilaian.
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
            simpan
          </button>              
        </form>
        <!-- akhir form -->
      </div>
    </div>
  </div>
</div>


<!-- modal ubah indikator -->
<?php foreach ($all_indikator as $indikator) {?>
  <div id="ubah_indikator_<?=$indikator['id_indikator'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
          <!-- form -->
          <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/aksi_kriteria_penilaian/ubah_indikator/'.$indikator['id_indikator']);  ?>">
            <div class="form-group">
              <p for="" class="text-left mb-1 font-weight-bold">Indikator penilaian :</p>
              <textarea class="form-control is_invalid form-control-sm" rows="4" id="nama" name="nama" value="<?= $indikator['indikator'];?>" required oninvalid="this.setCustomValidity('Anda belum mengisi indikator penilaian')" oninput="setCustomValidity('')"><?= $indikator['indikator'];?> </textarea>
              <div class="invalid-feedback text-left">
                Harap mengisi indikator penilaian.
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
              simpan
            </button>              
          </form>
          <!-- akhir form -->
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- akhir modal ubah indikator -->


<!-- modal hapus indikator -->
<?php foreach ($all_indikator as $indikator) {?>
  <div id="hapus_indikator_<?=$indikator['id_indikator'];?>" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" style="padding: 20px; ">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
          <h5>Yakin akan menghapus indikator penilaian?</h5>
        </div>
        <div class="modal-footer danger-md">
          <a href="<?= base_url('admin/aksi_kriteria_penilaian/hapus_indikator/'.$indikator['id_indikator'])  ?>" class="badge badge-danger badge-sm"> Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- akhir modal hapus indikator -->






<!-- tambah_indikator_penilaian laporan -->
<div id="tambah_indikator_penilaian_laporan" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
        <!-- form -->
        <form class="user was-validated mt-3" method="post" action="<?= base_url('admin/aksi_kriteria_penilaian/tambah_indikator_laporan/0')  ?>">
          <div class="form-group">
            <p for="" class="text-left mb-1 font-weight-bold">Indikator penilaian :</p>
            <textarea class="form-control is_invalid form-control-sm" rows="4"  id="nama" name="nama" placeholder="..." required oninvalid="this.setCustomValidity('Anda belum mengisi indikator penilaian..')" oninput="setCustomValidity('')"></textarea>
            <div class="invalid-feedback text-left"> 
              Harap mengisi indikator penilaian.
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
            simpan
          </button>              
        </form>
        <!-- akhir form -->
      </div>
    </div>
  </div>
</div>


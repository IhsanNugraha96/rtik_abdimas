<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 
  <div class="row">
    <div class="col-lg-10">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>


  <!-- Content Row -->

  <div class="card shadow mb-4 mt-3">
          <div class="card-header py-2">
            <div class="d-sm-flex align-items-center justify-content-between">
              <h6 class="m-1 font-weight-bold text-primary">Tabel data tim </h6>
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
                    <th>Nama Tim</th>
                    <th>Ketua Tim</th>
                    <th>Asal Pangkalan</th>
                    <th>Penilaian</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; ?>
                  <?php foreach ($tim_pembimbing as $tim) { ?>
                    <tr style="text-align: center;">
                      <th scope="row"><?= $i+1; ?></th>
                      <td><?= $tim['nama_tim'] ?></td> 
                      <td><?= $tim['nama_lengkap'] ?></td>   
                      <td><?= $tim['nama_komisariat']; ?></td>  

                      <td scope="row">

                       <a href="" name="detail" class="badge badge-primary" data-toggle="modal" data-target="#penilaian_anggota_tim_<?= $tim['id_tim'] ?>" >Individu</i></a>


                       <a href="" class="badge badge-info" data-toggle="modal" data-target="#penilaian_tim_<?= $tim['id_tim']?>">Laporan Tim</a>
                       <a href="" class="badge badge-success" data-toggle="modal" data-target="#penilaian_berkas_tim_<?= $tim['id_tim']?>">Berkas Tim</a>
                     </td>             
                   </tr>
                   <?php  $i++; 
                 } ?>

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

 <!-- model penilaian untuk pembimbing -->

 <!-- penilaian anggota tim -->
  <?php $i = 0; foreach ($tim_pembimbing as $tim): ?>
  <div id="penilaian_anggota_tim_<?=$tim['id_tim'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body m-2 p-2 text-left">

          <center>
            <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 17%;">
            <h6 class="font-weight-bold">Penilaian Individu Personel Tim <?=$tim['nama_tim'];?></h6>
          </center>


          <?php if (!$status_penilaian_anggota_tim[$i]) { ?>
            <p class="text-center text-danger mb-5">( Anda hanya bisa satu kali memberikan penilaian! )</p>
            <form class="user was-validated" method="post" action="<?= base_url('pembimbing/penilaian_anggota/'.$tim['id_tim']);?>">
              <?php $j=0; foreach ($anggota_tim[$i] as $agt) 
              { ?>
                <b><?= ($j+1).'. '. $agt['nama_lengkap']; ?></b>

                <?php foreach ($indikator_penilaian as $idk) 
                {?>
                  <p class=" mt-1 mb-2"><?= $idk['indikator']; ?></p>

                  <div class="row justify-content-md-center">
                    <center>

                      <b><small  class="font-weight-bold text-danger mr-3">Sangat Kurang</small></b>
                      <small>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($j+1); ?>" name="<?=$agt['id_anggota']; ?>" value="20" required>
                          <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($j+1); ?>">1</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($j+2); ?>" name="<?=$agt['id_anggota']; ?>" value="40" required>
                          <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($j+2); ?>">2</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($j+3); ?>" name="<?=$agt['id_anggota']; ?>" value="60" required>
                          <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($j+3); ?>">3</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($j+4); ?>" name="<?=$agt['id_anggota']; ?>" value="80" required>
                          <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($j+4); ?>">4</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline mb-3">
                          <input type="radio" class="custom-control-input" id="<?=$agt['id_anggota'].'_'.($j+5); ?>" name="<?=$agt['id_anggota']; ?>" value="100" required>
                          <label class="custom-control-label" for="<?=$agt['id_anggota'].'_'.($j+5); ?>">5</label>
                        </div>
                      </small>
                      <b><small  class="font-weight-bold text-success">Sangat Bagus</small></b>

                    </center>
                  </div>
                  <hr width="90%">

                  <?php $j++; } ?>

                <?php } ?>

                <div class="row">
                  <div class="col text-right">
                    <button type="submit" class="btn btn-sm btn-primary">Kirim</button>                  
                  </div>
                </div>
              </form>
            <?php }
            else { ?>

              <h5 class="text-center mb-4 font-weight-bold mt-5">Anda sudah memberikan penilaian!</h5>

            <?php } ?>




          </div>
        </div>
      </div>
    </div>
    <?php $i++; endforeach ?>
  <!-- akhir penilaian anggota tim -->



  <!-- penilaian laporan tim -->
    <?php $i = 0; ?>
      <?php foreach ($tim_pembimbing as $tim){ ?>
    <div id="penilaian_tim_<?=$tim['id_tim'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
      <div class="modal-dialog">
        <div class="modal-content shadow">
          <div class="modal-close-area modal-close-df">
            <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
          </div>
          <div class="modal-body m-2 p-2 text-left">

            <center>
              <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 17%;">
              <h6 class="font-weight-bold">Penilaian Tim <?=$tim['nama_tim'];?></h6>
            </center>


    <?php if (!$status_penilaian_tim[$i] || $status_penilaian_tim[$i]['nilai_laporan'] == '0') {?>
            <p class="text-center text-danger mb-5">( Anda hanya bisa satu kali memberikan penilaian! )</p>
            <form class="user was-validated" method="post" action="<?= base_url('pembimbing/penilaian_tim/'.$tim['id_tim']);?>">

              <?php $j=0;?>
               <?php foreach ($indikator_laporan as $idk) 
                {?>
                  <p class="text-justify mt-1 mb-2 px-2"><?= $idk['indikator']; ?></p>

                  <div class="row justify-content-md-center">
                    <center>

                      <b><small  class="font-weight-bold text-danger mr-3">Sangat Kurang</small></b>
                      <small>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$i.$idk['id_indikator'].'_'.($j+1); ?>" name="<?=$idk['id_indikator']; ?>" value="20" required>
                          <label class="custom-control-label" for="<?=$i.$idk['id_indikator'].'_'.($j+1); ?>">1</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$i.$idk['id_indikator'].'_'.($j+2); ?>" name="<?=$idk['id_indikator']; ?>" value="40" required>
                          <label class="custom-control-label" for="<?=$i.$idk['id_indikator'].'_'.($j+2); ?>">2</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$i.$idk['id_indikator'].'_'.($j+3); ?>" name="<?=$idk['id_indikator']; ?>" value="60" required>
                          <label class="custom-control-label" for="<?=$i.$idk['id_indikator'].'_'.($j+3); ?>">3</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$i.$idk['id_indikator'].'_'.($j+4); ?>" name="<?=$idk['id_indikator']; ?>" value="80" required>
                          <label class="custom-control-label" for="<?=$i.$idk['id_indikator'].'_'.($j+4); ?>">4</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline mb-3">
                          <input type="radio" class="custom-control-input" id="<?=$i.$idk['id_indikator'].'_'.($j+5); ?>" name="<?=$idk['id_indikator']; ?>" value="100" required>
                          <label class="custom-control-label" for="<?=$i.$idk['id_indikator'].'_'.($j+5); ?>">5</label>
                        </div>
                      </small>
                      <b><small  class="font-weight-bold text-success">Sangat Bagus</small></b>

                    </center>
                  </div>
                  <hr width="90%">

                  <?php $j++; } ?>

              <div class="row">
                <div class="col text-right">
                  <button type="submit" class="btn btn-sm btn-primary">Kirim</button>                  
                </div>
              </div>
            </form>
          <?php }
          else{?>
              <h5 class="text-center mb-4 font-weight-bold mt-5">Anda sudah memberikan penilaian!</h5>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php $i++; }?>
  <!-- akhir penilaian laporan tim -->



   <!-- penilaian berkas tim -->
    <?php $i = 0; ?>
      <?php foreach ($tim_pembimbing as $tim){ ?>
    <div id="penilaian_berkas_tim_<?=$tim['id_tim'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
      <div class="modal-dialog">
        <div class="modal-content shadow">
          <div class="modal-close-area modal-close-df">
            <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
          </div>
          <div class="modal-body m-2 p-2 text-left">

            <center>
              <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 17%;">
              <h6 class="font-weight-bold">Penilaian Tim <?=$tim['nama_tim'];?></h6>
            </center>


    <?php if (!$status_penilaian_tim[$i] || $status_penilaian_tim[$i]['nilai_dokumen'] == '0') {?>
            <p class="text-center text-danger mb-5">( Anda hanya bisa satu kali memberikan penilaian! )</p>
            <form class="user was-validated" method="post" action="<?= base_url('pembimbing/penilaian_dokumen_tim/'.$tim['id_tim']);?>">

              <?php $j=0;?>
               <?php foreach ($indikator_penilaian_dokumen as $idk) 
                {?>
                  <p class="text-justify mt-1 mb-2 px-2"><?= $idk['indikator']; ?></p>

                  <div class="row justify-content-md-center">
                    <center>

                      <b><small  class="font-weight-bold text-danger mr-3">Tidak Valid</small></b>
                      <small>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="<?=$i.$idk['id_indikator'].'_'.($j+1); ?>" name="<?=$idk['id_indikator']; ?>" value="0" required>
                          <label class="custom-control-label" for="<?=$i.$idk['id_indikator'].'_'.($j+1); ?>"></label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline mb-3">
                          <input type="radio" class="custom-control-input" id="<?=$i.$idk['id_indikator'].'_'.($j+5); ?>" name="<?=$idk['id_indikator']; ?>" value="100" required>
                          <label class="custom-control-label" for="<?=$i.$idk['id_indikator'].'_'.($j+5); ?>"></label>
                        </div>
                      </small>
                      <b><small  class="font-weight-bold text-success">Valid</small></b>

                    </center>
                  </div>
                  <hr width="90%">

                  <?php $j++; } ?>

              <div class="row">
                <div class="col text-right">
                  <button type="submit" class="btn btn-sm btn-primary">Kirim</button>                  
                </div>
              </div>
            </form>
          <?php }
          else{?>
              <h5 class="text-center mb-4 font-weight-bold mt-5">Anda sudah memberikan penilaian!</h5>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php $i++; }?>
  <!-- akhir penilaian berkas tim -->


<!-- akhir model untuk penilaian pembimbing
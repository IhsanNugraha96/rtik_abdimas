<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Personel Tim</h1>
    <div class="row">
        <div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <!-- Content Row -->
    <div class="card shadow mb-5" style="margin:  0 7% 0 7%;">
        <div class="card-header font-weight-bold text-center bg-primary text-light">
            Data Personel Tim <?= $ketua_tim['nama_tim'] ?>
        </div>
        <div class="card_body text-center mt-2 mb-2">
            <b class="card-title">KETUA TIM</b><br>
            <img class="rounded-circle img-thumbnail mb-2" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/relawan/image/'.$ketua_tim['image']) ?>">
           
            <br>
            <b class="card-text"><?= $ketua_tim['nama_lengkap']; ?></b><br> 
            <i class="card-text"><?= $ketua_tim['nama_komisariat']; ?></i><br>
            <?php if ($this->session->userdata('id_pembimbing')) 
            {?>
                <b class="card-text"><a href="" data-toggle="modal" data-target="#detail_ketua_<?= $ketua_tim['id_anggota']?>">(lihat detail)</a></b><br>
            <?php } ?>

            <hr style="width: 90%;">
            <b class="card-title">ANGGOTA TIM</b><br>
            <div class="row mt-3">
              <?php $i = 0; foreach ($anggota_tim as $agt): ?>
              <div class="col-lg-3 col-md-4 text-center  mb-3">
                 <b class="card-text">Anggota <?= $i+1; ?></b><br>
                 <img class="rounded-circle img-thumbnail mb-2" style="width: 110px; height: 110px;" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>">
                
                <br>
                <b class="card-text"><?= $agt['nama_lengkap']; ?></b><br>
                <i class="card-text"><?= $agt['nama_komisariat']; ?></i><br>
                <?php if ($this->session->userdata('id_pembimbing')) 
                {?>
                    <b class="card-text"><a href="" data-toggle="modal" data-target="#detail_anggota_<?= $agt['id_anggota']?>">(lihat detail)</a></b><br>
                <?php } ?>
            </div>
            <?php $i++; endforeach ?>
        </div>
    </div>
</div>



<!-- End of Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal lihat status di komisariat -->
<div id="detail_ketua_<?=$ketua_tim['id_anggota'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
        <div class="modal-dialog">
          <div class="modal-content shadow">
            <div class="modal-close-area modal-close-df">
              <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
          </div>
          <div class="modal-body">

            <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
            <h5 class="font-weight-bold mb-5">Profil Anggota</h5>
            <table class="text-left table no-border bg-white" width="100%" cellspacing="0" > 
                    <tr valign="top">
                        <td>Nama </td>
                        <td> : </td>
                        <td><?= $ketua_tim['nama_lengkap']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Alamat </td>
                        <td> : </td>
                        <td><?= $ketua_tim['alamat_lengkap'].", Kec. ".$ketua_tim['kecamatan'].", ".$ketua_tim['type'].". ".$ketua_tim['nama_kota']." - ".$ketua_tim['nama_provinsi']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>TTL </td>
                        <td> : </td>
                        <td><?= $ketua_tim['tempat_lahir'].', '.$ketua_tim['tgl_lahir']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Jenis Kelamin </td>
                        <td> : </td>
                        <td><?= $ketua_tim['jenis_kelamin']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>No. Hp </td>
                        <td> : </td>
                        <td><?= $ketua_tim['no_hp']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Email </td>
                        <td> : </td>
                        <td><?= $ketua_tim['email']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Pend. terakhir </td>
                        <td> : </td>
                        <td><?= $ketua_tim['pendidikan_terakhir']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Pekerjaan </td>
                        <td> : </td>
                        <td><?= $ketua_tim['pekerjaan']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Pangkalan </td>
                        <td> : </td>
                        <td><?= $ketua_tim['nama_komisariat']; ?></td>
                    </tr>
                </table>
                <hr>
                <h5 class="font-weight-bold">Surat izin orang tua</h5>
                <a href=<?php if($ketua_tim['file_surat_izin_ortu'] != '0')
                    { echo '"'.$ketua_tim['file_surat_izin_ortu'].'" target="_blank"';} 
                    else{ echo '"'.base_url('Pembimbing/lihat_berkas/surat_izin_ortu/'.$ketua_tim['id_tim']).'"';} ?> > Lihat surat izin orang tua
                </a>
        </div>
    </div>
</div>
</div>


<?php $i = 0; foreach ($anggota_tim as $agt): ?>
<div id="detail_anggota_<?=$agt['id_anggota'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
        <div class="modal-dialog">
          <div class="modal-content shadow">
            <div class="modal-close-area modal-close-df">
              <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
          </div>
          <div class="modal-body">

            <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
            <h5 class="font-weight-bold mb-5">Profil Anggota</h5>
           
            <table class="text-left table no-border bg-white" width="100%" cellspacing="0" > 
                    <tr valign="top">
                        <td>Nama </td>
                        <td> : </td>
                        <td><?= $agt['nama_lengkap']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Alamat </td>
                        <td> : </td>
                        <td><?= $agt['alamat_lengkap'].", Kec. ".$agt['kecamatan'].", ".$agt['type'].". ".$agt['nama_kota']." - ".$agt['nama_provinsi']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>TTL </td>
                        <td> : </td>
                        <td><?= $agt['tempat_lahir'].', '.$agt['tgl_lahir']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Jenis Kelamin </td>
                        <td> : </td>
                        <td><?= $agt['jenis_kelamin']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>No. Hp </td>
                        <td> : </td>
                        <td><?= $agt['no_hp']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Email </td>
                        <td> : </td>
                        <td><?= $agt['email']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Pend. terakhir </td>
                        <td> : </td>
                        <td><?= $agt['pendidikan_terakhir']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Pekerjaan </td>
                        <td> : </td>
                        <td><?= $agt['pekerjaan']; ?></td>
                    </tr>
                    <tr valign="top">
                        <td>Pangkalan </td>
                        <td> : </td>
                        <td><?= $agt['nama_komisariat']; ?></td>
                    </tr>
                </table>
                 <hr>
                <h5 class="font-weight-bold">Surat izin orang tua</h5>
                <a href=<?php if($agt['file_surat_izin_ortu'] != '0')
                    { echo '"'.$agt['file_surat_izin_ortu'].'" target="_blank"';} 
                    else{ echo '"'.base_url('Pembimbing/lihat_berkas/surat_izin_ortu/'.$agt['id_tim']).'"';} ?> > Lihat surat izin orang tua
                </a>
        </div>
    </div>
</div>
</div>
<?php $i++; endforeach ?>
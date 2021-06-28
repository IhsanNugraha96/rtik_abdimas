<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pembimbing Tim</h1>
    <div class="row">
        <div class="col-lg-10 col-md-6 col-sm-10 col-xs-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <!-- Content Row -->
    <?php if ($data_di_tim['status_pembimbing'] >= '0') {?>
    <div class="row mb-5">
        <div class="col-lg-4 col-md-6 col-sm-8 ">
            <div class="single-cards-item text-center shadow">
                <div class="img-fluid">
                    <img src="<?= base_url('assets/img/logo/background1.jpg') ?>" style="width: 100%; height: 20%;" alt="background profil">
                </div>
                <div class="single-product-text" style="padding-bottom: 10%;">
                    <a href="" data-toggle="modal" data-target="#lihat_foto"> 
                        <img class="rounded-profil img-thumbnail mb-3" src="<?= base_url('assets/img/pembimbing/'.$pembimbing['image']) ?>">
                        </a>
                            <h4><b><?= $pembimbing['nama']; ?></b></h4>
                            <h6><b>Email : <?= $pembimbing['email']; ?></b></h6><br>

                            <h6>Status pengajuan :</h6>
                            <?php if ($data_di_tim['status_pembimbing'] == '0') {
                                echo '<button class="btn btn-outline-warning font-weight-bold shadow"> Menunggu konfirmasi pembimbing </button>';
                            } elseif ($data_di_tim['status_pembimbing'] == '1') {
                                echo '<button class="btn btn-outline-danger font-weight-bold shadow"> Pengajuan pembimbing ditolak </button>';
                            } elseif ($data_di_tim['status_pembimbing'] == '2') {
                                echo '<button class="btn btn-outline-primary font-weight-bold shadow"> Sudah di acc </button>';
                            }?>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8 ">

                    <div class="table-responsive shadow">
                        <table class="table no-border bg-white" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">NIK </td>
                                    <td> : </td>
                                    <td><?= $pembimbing['nik']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama </td>
                                    <td> : </td>
                                    <td><?= $pembimbing['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat </td>
                                    <td> : </td>
                                    <td><?= $pembimbing['alamat_rumah'].", Kec. ".$pembimbing['kecamatan'].", ".$pembimbing['type'].". ".$pembimbing['nama_kota']." - ".$pembimbing['nama_provinsi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat/Tgl. lahir </td>
                                    <td> : </td>
                                    <td><?= $pembimbing['tgl_lahir']; ?></td>
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
                                    <td>Asal Pangkalan </td>
                                    <td> : </td>
                                    <td><?= $pembimbing['nama_komisariat']; ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row mb-5">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-cards-item text-center shadow">
                            <div class="img-fluid">
                                <img src="<?= base_url('assets/img/logo/background1.jpg') ?>" style="width: 100%; height: 20%;" alt="background profil">
                            </div>
                            <div class="single-product-text" style="padding-bottom: 10%;">
                                <a href="" data-toggle="modal" data-target="#lihat_foto"> 
                                    <img class="rounded-profil img-thumbnail mb-3" src="<?= base_url('assets/img/relawan/image/default_image.jpg') ?>">
                                </a>

                                <h6 class="mt-4"><b>Status pengajuan pembimbing :</b></h6>
                                <button class="btn btn-outline-danger font-weight-bold shadow small"> Ketua tim belum mengajukan</button>       
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

                <!-- End of Content Row -->


            </div>
            <!-- /.container-fluid -->

        </div>
<!-- End of Main Content -->
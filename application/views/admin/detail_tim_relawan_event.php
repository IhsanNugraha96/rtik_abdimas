 <!-- Begin Page Content  -->
 <div class="container-fluid">

 	<!-- Page Heading -->
 	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 	<div class="row">
 		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 			<?= $this->session->flashdata('message'); ?>
 		</div>
 	</div>

 	<!-- Content Row -->
 	<div class="row">
 		<div class="card text-center shadow">
 			<div class="card-header bg-primary" style="opacity: 0.8; height: 20vh;">
 			</div>

 			<div class="card-body" style="margin: 0 6% 0 6%;">
 				<div class="row" style="margin-top: -9%;">
 					<div class="col-lg-4 mb-3">
 						<div class="card shadow border-bottom-info">
 							<div class="card-body">
 								<h5 class="card-title font-weight-bold text-secondary">Profil Personel</h5>
 								<a data-toggle="collapse" href="#personel" role="button" aria-expanded="false" aria-controls="#personel">
 									<i class="fas fa-users fa-5x mt-3 text-secondary"></i>
 									<p class="card-text text-secondary">Informasi mengenai data profil personel tim</p>
 								</a> 
 							</div>
 						</div>
 					</div>

 					<div class="col-lg-4 mb-3">
 						<div class="card shadow border-bottom-info">
 							<div class="card-body">
 								<h5 class="card-title font-weight-bold">Berkas Pelayanan</h5>
 								<a data-toggle="collapse" href="#berkas" role="button" aria-expanded="false" aria-controls="#berkas">
 									<i class="far fa-file-alt fa-5x mt-3 text-secondary"></i>
 									<p class="card-text text-secondary">Informasi mengenai berkas hasil pelayanan</p>
 								</a>
 							</div>
 						</div>
 					</div>

 					<div class="col-lg-4 mb-3">
 						<div class="card shadow border-bottom-info">
 							<div class="card-body">
 								<h5 class="card-title font-weight-bold text-secondary">Artikel Laporan</h5>
 									<a data-toggle="collapse" href="#artikel" role="button" aria-expanded="false" aria-controls="#artikel">
 										<i class="fas fa-newspaper fa-5x mt-3 text-secondary"></i>
 										<p class="card-text text-secondary">Informasi mengenai artikel hasil pelayanan</p>
 									</a>
 								</div>
 							</div>
 						</div>
 					</div>

 				</div>
 			</div>
 		</div>

 		<div class="card shadow" style="border: none; margin: 1vh 10% 4vh 10%; align-items: center; background-color: #ebe9e6;">
 			<div class="row mb-3">  
 				<div class="col-sm-12">
 					<div class="collapse multi-collapse" id="personel">
 						<div class="card-body bg-light text-center">

 							<h5>Personel Tim</h5>
 							<div class="card">
 								<div class="card-body">


 									<div class="row">
 										<div class="col-md-6">
 											<div class="card shadow mb-4  border-left-info">
 												<!-- Card Header - Accordion -->

 												<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">                
 													<div class=" card-title m-0 font-weight-bold text-primary">Ketua Tim</div>
 												</a>
 												<!-- Card Content - Collapse -->
 												<div class="collapse " id="collapseCardExample">
 													<div class="card-body text-left">
 														<div class="card-image text-center mb-3">
 															<img class="img-profile rounded-circle" src="<?= base_url('assets/img/relawan/image/'.$ketua['image']) ?>" style=" width: 60%; max-height: 25vh;">
 															
 														</div>

 														<div class="table-responsive">
 															<table class="table" id="dataTable" style="font-size: 14px; ">
 																<tr>
 																	<td style="width: 20%;">Nama</td>
 																	<td style="width: 5%;"> : </td>
 																	<td style="width: 75%;"><p class="card-text"><?= $ketua['nama_lengkap']; ?></p></td>
 																</tr>
 																<tr>
 																	<td style="width: 20%;">TTL</td>
 																	<td style="width: 5%;"> : </td>
 																	<td style="width: 75%;"><p class="card-text"><?= $ketua['tempat_lahir'].', '.substr($ketua['tgl_lahir'], 8, 2).'-'.substr($ketua['tgl_lahir'], 5, 2).'-'.substr($ketua['tgl_lahir'], 0, 4); ?></p></td>
 																</tr>
 																<tr>
 																	<td style="width: 20%;">email</td>
 																	<td style="width: 5%;"> : </td>
 																	<td style="width: 75%;"><p class="card-text"><?= $ketua['email'] ?></p></td>
 																</tr>
 																<tr>
 																	<td style="width: 20%;">No Hp</td>
 																	<td style="width: 5%;"> : </td>
 																	<td style="width: 75%;"><p class="card-text"><?= $ketua['no_hp'] ?></p></td>
 																</tr>
 																<tr>
 																	<td style="width: 20%;">Alamat</td>
 																	<td style="width: 5%;"> : </td>
 																	<td style="width: 75%;"><p class="card-text"><?= $ketua['alamat_lengkap'].', Kec. '.$ketua['kecamatan'].', '.$ketua['type'].'. '.$ketua['nama_kota'].', Prov. '.$ketua['nama_provinsi'] ?></p></td>
 																</tr>

 															</table>
 														</div>
 													</div>
 												</div>
 											</div>
 										</div>	


 										<?php $i=0; foreach ($anggota as $agt) { ?>
 											<div class="col-md-6">
 												<div class="card shadow mb-4  border-left-info">
 													<!-- Card Header - Accordion -->

 													<a href="#collapseCardExample<?= $i;?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">                
 														<div class=" card-title m-0 font-weight-bold text-primary">Personel Tim <?= $i+1; ?></div>
 													</a>
 													<!-- Card Content - Collapse -->
 													<div class="collapse " id="collapseCardExample<?= $i;?>">
 														<div class="card-body text-left">
 															<div class="card-image text-center mb-3">
 																<img class="img-profile rounded-circle" src="<?= base_url('assets/img/relawan/image/'.$agt['image']) ?>" style=" width: 60%; max-height: 25vh;">
 															</div>

 															<div class="table-responsive">
 																<table class="table" id="dataTable" style="font-size: 14px; ">
 																	<tr>
 																		<td style="width: 20%;">Nama</td>
 																		<td style="width: 5%;"> : </td>
 																		<td style="width: 75%;"><p class="card-text"><?= $agt['nama_lengkap']; ?></p></td>
 																	</tr>
 																	<tr>
 																		<td style="width: 20%;">TTL</td>
 																		<td style="width: 5%;"> : </td>
 																		<td style="width: 75%;"><p class="card-text"><?= $agt['tempat_lahir'].', '.substr($agt['tgl_lahir'], 8, 2).'-'.substr($agt['tgl_lahir'], 5, 2).'-'.substr($agt['tgl_lahir'], 0, 4); ?></p></td>
 																	</tr>
 																	<tr>
 																		<td style="width: 20%;">email</td>
 																		<td style="width: 5%;"> : </td>
 																		<td style="width: 75%;"><p class="card-text"><?= $agt['email'] ?></p></td>
 																	</tr>
 																	<tr>
 																		<td style="width: 20%;">No Hp</td>
 																		<td style="width: 5%;"> : </td>
 																		<td style="width: 75%;"><p class="card-text"><?= $agt['no_hp'] ?></p></td>
 																	</tr>
 																	<tr>
 																		<td style="width: 20%;">Alamat</td>
 																		<td style="width: 5%;"> : </td>
 																		<td style="width: 75%;"><p class="card-text"><?= $agt['alamat_lengkap'].', Kec. '.$agt['kecamatan'].', '.$agt['type'].'. '.$agt['nama_kota'].', Prov. '.$agt['nama_provinsi'] ?></p></td>
 																	</tr>

 																</table>
 															</div>
 														</div>
 													</div>
 												</div>
 											</div>
 											<?php $i++; } ?>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>



 					<div class="col-sm-12">
 						<div class="collapse multi-collapse" id="berkas">
 							<div class="card-body bg-light text-center">
 								<div class="card">

 									<h5 class="mt-4">Berkas Pelayanan</h5>
 									<div class="card-body">
 										<div class="row text-center m-0  justify-content-md-center">
 											<div class="col-sm-4">     

 												<a href="<?php if ($berkas['surat_pengantar'] != '-') 
                                                    {echo $berkas['surat_pengantar']. '" target="_blank';}
                                                    else 
                                                    { echo '" data-toggle="modal" data-target="#tidak_ada_berkas'; } ?>"
                                                >
 													<div class="card border-0">
 														<div class="card-body">
 															<i class="far fa-paper-plane fa-2x"></i><br>
 															<small >SURAT PENGANTAR</small>
 														</div>
 													</div>
 												</a> 
 											</div>
 											<div class="col-sm-4">   
                                                <a href="<?php if ($berkas['survey_permintaan'] != '-') 
                                                    {echo $berkas['survey_permintaan']. '" target="_blank';}
                                                    else 
                                                    { echo '" data-toggle="modal" data-target="#tidak_ada_berkas'; } ?>"
                                                > 
 													<div class="card border-0">
 														<div class="card-body">
 															<i class="fas fa-praying-hands fa-2x"></i><br>
 															<small>SURVEY PERMINTAAN</small>
 														</div>
 													</div>
 												</a>
 											</div>
 											<div class="col-sm-4">  
                                                <a href="<?php if ($berkas['surat_konfirmasi'] != '-') 
                                                    {echo $berkas['surat_konfirmasi']. '" target="_blank';}
                                                    else 
                                                    { echo '" data-toggle="modal" data-target="#tidak_ada_berkas'; } ?>"
                                                >
 													<div class="card border-0">
 														<div class="card-body">
 															<i class="far fa-thumbs-up fa-2x"></i><br>
 															<small>SURAT KONFIRMASI</small>
 														</div>
 													</div>
 												</a>
 											</div> 
 											<div class="col-sm-4">  
                                                <a href="<?php if ($berkas['artikel_miftek'] != '-') 
                                                    {echo $berkas['artikel_miftek']. '" target="_blank';}
                                                    else 
                                                    { echo '" data-toggle="modal" data-target="#tidak_ada_berkas'; } ?>"
                                                >
 													<div class="card border-0">
 														<div class="card-body">
 															<i class="fas fa-book fa-2x"></i><br>
 															<small>ARTIKEL MIFTEK</small>
 														</div>
 													</div>
 												</a>
 											</div> 
 											<div class="col-sm-4">  
                                                <a href="<?php if ($berkas['presensi_pelayanan'] != '-') 
                                                    {echo $berkas['presensi_pelayanan']. '" target="_blank';}
                                                    else 
                                                    { echo '" data-toggle="modal" data-target="#tidak_ada_berkas'; } ?>"
                                                >
 													<div class="card border-0">
 														<div class="card-body">
 															<i class="fas fa-list-ol fa-2x"></i><br>
 															<small>PRESENSI PELAYANAN</small>
 														</div>
 													</div>
 												</a>
 											</div> 
 											<div class="col-sm-4">  
                                                <a href="<?php if ($berkas['berita_acara'] != '-') 
                                                    {echo $berkas['berita_acara']. '" target="_blank';}
                                                    else 
                                                    { echo '" data-toggle="modal" data-target="#tidak_ada_berkas'; } ?>"
                                                >
 													<div class="card border-0">
 														<div class="card-body">
 															<i class="fas fa-clipboard-list fa-2x"></i><br>
 															<small>BERITA ACARA</small>
 														</div>
 													</div>
 												</a>
 											</div> 

 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>




 					<div class="col-sm-12">
 						<div class="collapse multi-collapse" id="artikel">
 							<div class="card-body bg-light shadow">
 								<div class="card shadow">

 									<h4 class="mt-4 font-weight-bold text-center"><u><?php echo $artikel['judul_laporan']; ?></u></h4>
 									<div class="card-body" style="padding:0 5% 0 5%;">
 										<div class="row m-0">
 											<div class="col-sm-12 ">     
 												<?php echo $artikel['laporan']; ?>
 												
 											</div> 

 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>

 				</div>
 			</div>
 			<!-- /Content Row -->

 		</div>
 		<!-- /.container-fluid -->

 	</div>
<!-- End of Main Content -->


<div class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" id="tidak_ada_berkas" tabindex="-1" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
        <div class="modal-content shadow">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-triangle fa-3x text-warning"></i>
                <h5 class="mt-2"><b>Tidak ditemukan berkas yang di unggah!</b></h5></div>
                
            </div>
        </div>
    </div>
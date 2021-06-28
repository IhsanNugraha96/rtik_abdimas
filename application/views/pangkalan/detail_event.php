<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Data Event</h1>
	<div class="row">
		<div class="col-lg-10">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>


	<!-- Content Row -->
	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-2">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tabel Detail Event </h6>
				<div>
					<!-- <a href="" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#tambah_pembimbing">Tambah Pembimbing</a> -->
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 5%;">No</th>
							<th width="15%">Nama Tim</th>
							<th>Ketua</th>
							<th>Anggota</th>
							<th>Mitra</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($tim) 
						{ ?>
							<?php $i=0; ?>
							<?php foreach ($tim as $tm) { ?>
								<tr style="text-align: center;">
									<th scope="row"><?= $i+1; ?></th>
									<td>
										<?= $tm['nama_tim'] ?>
									</td>
									<td><?= $ketua_tim[$i][0]['nama_lengkap'].' ('.$ketua_tim[$i][0]['nama_komisariat'].')' ?></td>   
									<td align="left"><?php $j=0;
									foreach ($anggota_tim[$i] as $agt) 
									{
										echo ($j+1).'. '.$agt['nama_lengkap'].' ('.$agt['nama_komisariat'].')<br>';
										$j++;
									} ?>	
								</td>  
								<td>
									<?php if ($mitra[$i]) 
									{?>
										<a href=""  data-toggle="modal" data-target="#detail_mitra_<?= $mitra[$i]['id_mitra'];?>"><?= $mitra[$i]['nama_mitra'];?></a>
									<?php }
									else 
									{
										echo "-";
									} ?>

								</td>        

							</tr>
							<?php  $i++; 
						} ?>
					<?php } ?>
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



<?php $i=0; 
foreach ($tim as $tm) 
{ 
	if ($mitra[$i]) 
		{?>
			<div id="detail_mitra_<?= $mitra[$i]['id_mitra'];?>" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
				<div class="modal-dialog">
					<div class="modal-content shadow">
						<div class="modal-close-area modal-close-df">
							<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
						</div>
						<div class="modal-body">
							<img class="" src="<?= base_url('assets/img/mitra/'.$mitra[$i]['logo']) ?>" style="width: 40%;">
							<h4 class="font-weight-bold mt-2"><?= $mitra[$i]['nama_mitra']; ?></h4>
							<div class="text-left">
                      <h6 class="font-weight-bold">Pimpinan</h6>
                      <table>
                      <tr>
                          <td valign="top">Nama</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mitra[$i]['pimpinan']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">E-mail</td>
                          <td valign="top">:</td>
                          <td valign="top" align="justify"><?= $mitra[$i]['email_pimpinan']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Kontak</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mitra[$i]['no_hp_pimpinan']; ?></td>
                        </tr>
                      </table> 
                      <h6 class=" mt-3 font-weight-bold">Profil Mitra</h6>
                      <table>
                        <tr>
                          <td valign="top">Jenis mitra</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mitra[$i]['nama_cluster']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Alamat</td>
                          <td valign="top">:</td>
                          <td valign="top" align="justify"><?= $mitra[$i]['alamat'].', '.$mitra[$i]['type'].'. '.$mitra[$i]['nama_kota'].', - '.$mitra[$i]['nama_provinsi']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Situs web</td>
                          <td valign="top">:</td>
                          <td valign="top"><a href="<?= $mitra[$i]['situs_web']; ?>" target="_blank">Kunjungi Web</a></td>
                        </tr>
                        <tr>
                          <td valign="top">Titik koordinat</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mitra[$i]['titik_koordinat']; ?></td>
                        </tr>
                        <tr>
                          <td valign="top">Profil ringkas</td>
                          <td valign="top">:</td>
                          <td valign="top"><?= $mitra[$i]['profil_ringkas']; ?></td>
                        </tr>
                      </table>
                    </div>
						</div>
					</div>
				</div>
			</div>
		<?php }
		$i++;
	}?>
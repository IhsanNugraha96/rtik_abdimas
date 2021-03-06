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
										<?= $tm['nama_tim'] ?><br><small><a href="" data-toggle="modal" data-target="#berkas_tim_<?= $tm['id_tim']?>">lihat berkas</a></small>
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



	<?php $i = 0; foreach ($berkas_tim as $tm): ?>
<div id="berkas_tim_<?=$tm['id_tim'];?>" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
	<div class="modal-dialog">
		<div class="modal-content shadow">
			<div class="modal-close-area modal-close-df">
				<a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
			</div>
			<div class="modal-body">

				<img src="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" style="width: 20%;">
				<h5 class="font-weight-bold mb-5">Berkas Tim <?=$tm['nama_tim'];?></h5>

				<table class="text-left table no-border bg-white" width="100%" cellspacing="0" > 
					<tr valign="top">
						<td>Surat Pengantar </td>
						<td> : </td>
						<td>
							<a href=<?php if($tm['surat_pengantar'] != '-')
								{ echo '"'.$tm['surat_pengantar'].'" target="_blank"';} 
								else{ echo '"'.base_url('Pangkalan/tidak_ada_berkas/'.$id_event).'"';} ?> > Lihat berkas surat pengantar
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Survey Permintaan </td>
						<td> : </td>
						<td>
							<a href=<?php if($tm['survey_permintaan'] != '-')
								{ echo '"'.$tm['survey_permintaan'].'" target="_blank"';} 
								else{ echo '"'.base_url('Pangkalan/tidak_ada_berkas/'.$id_event).'"';} ?> > Lihat berkas survey permintaan
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Surat Konfirmasi </td>
						<td> : </td>
						<td>
							<a href=<?php if($tm['surat_konfirmasi'] != '-')
								{ echo '"'.$tm['surat_konfirmasi'].'" target="_blank"';} 
								else{ echo '"'.base_url('Pangkalan/tidak_ada_berkas/'.$id_event).'"';} ?> > Lihat berkas surat konfirmasi
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Presensi Pelayanan </td>
						<td> : </td>
						<td>
							<a href=<?php if($tm['presensi_pelayanan'] != '-')
								{ echo '"'.$tm['presensi_pelayanan'].'" target="_blank"';} 
								else{ echo '"'.base_url('Pangkalan/tidak_ada_berkas/'.$id_event).'"';} ?> > Lihat berkas presensi pelayanan
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Berita Acara </td>
						<td> : </td>
						<td>
							<a href=<?php if($tm['berita_Acara'] != '-')
								{ echo '"'.$tm['berita_Acara'].'" target="_blank"';} 
								else{ echo '"'.base_url('Pangkalan/tidak_ada_berkas/'.$id_event).'"';} ?> > Lihat berkas berita acara
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Artikel Berita </td>
						<td> : </td>
						<td><a href="<?= base_url('Pangkalan/lihat_artikel/'.$tm['id_tim'].'/'.$id_event);?>"> Lihat artikel berita
							</a>
						</td>
					</tr>
					<tr valign="top">
						<td>Artikel MIFTEK </td>
						<td> : </td>
						<td><a href=<?php if($tm['artikel_miftek'] != '-')
								{ echo '"'.$tm['artikel_miftek'].'" target="_blank"';} 
								else{ echo '"'.base_url('Pangkalan/tidak_ada_berkas/'.$id_event).'"';} ?> > Lihat berkas artikel MIFTEK
							</a>
						</td>
					</tr>
				</table>
				<hr>
			</div>
		</div>
	</div>
</div>
<?php $i++; endforeach ?>
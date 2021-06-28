<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> RTIKAbdimas - Piagam Penghargaan Pangkalan</title>

	<!-- Custom fonts for this page-->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this page-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<!-- Custom styles for tables -->
	<link href="<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.min.css"); ?>" rel="stylesheet">

</head><body style="color: black;">

	<!-- Begin Page Content -->
	<img src="<?= base_url('assets/img/sertifikat/bg-sertifikat.png'); ?>"  style="width:100%; position: relative;
	z-index: 1;">
	<div  style="z-index: 2; position: absolute; margin-top: -110%;" >
		<table  style="margin-top: 2%;">
			<tr class="text-center justify-content-md-center">
				<td>
					<img src="<?= base_url('assets/img/logo/Kemkominfo.png'); ?>" style="width: 12%;" alt="Logo Kominfo">

					<!-- <img src="<?= base_url('assets/img/komisariat/'.$komisariat['logo']); ?>" style="width: 12%;" alt="Logo Komisariat" class="mr-4 ml-3"> -->

					<img src="<?= base_url('assets/img/logo/logo rtik.png'); ?>" style="width: 10%;" alt="Logo RTIK">
				</td>
			</tr>
			<tr class="text-center" height="6%">
				<td>
					<h1 style="font-size: 6vw; margin-top: 3%;" class="font-weight-bold text-black">PIAGAM PENGHARGAAN</h1>
				</td>
			</tr>
			<tr class="text-center">
				<td>
					<h5 style="font-size: 3vw; margin-top: 3%;">diberikan kepada</h5>
				</td>
			</tr>
			<tr class="text-center">
				<td>
					<h1 style="font-size: 5vw; margin-top: 3%;" class="font-weight-bold text-black"><?= $pangkalan['nama_komisariat']; ?></h1>
				</td>
			</tr>
			<tr class="text-center">
				<td style="padding: 0 5% 0 5%;">
					<h5 style="font-size: 3vw;">Atas partisipasinya sebagai pangkalan <br>dalam mengikuti program <b>Relawan TIK Abdi Mayarakat Tahun <?= substr($event['date_created'], 0, 4); ?></b>, dengan jumlah peserta relawan <b><?= $jumlah_peserta; ?> orang</b>, serta pembimbing <b><?= $jumlah_pembimbing; ?>  orang</b>.</h5>
				</td>
			</tr>
		</table>

		<div class="justify-content-md-center" style="margin-top: 3%;">
			<table style="margin-top: 10%;"  align="center">
				<tr>
					<td>
						<h5 style="font-size: 3vw;">
							<?= $template_sertifikat['tempat_dikeluarkan'] ?>,
							<?= substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) ?>
							<?php if(substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '01'){echo 'Januari';}
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '02') {echo 'Februari';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '03') {echo 'Maret';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '04') {echo 'April';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '05') {echo 'Mei';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '06') {echo 'Juni';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '07') {echo 'Juli';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '08') {echo 'Agustus';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '09') {echo 'September';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '10') {echo 'Oktober';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '11') {echo 'November';} 
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '12') {echo 'Desember';}
							elseif (substr($template_sertifikat['tgal_dikeluarkan'], 5, 2) == '00') {echo '00';} 
							?> <?= substr($template_sertifikat['tgal_dikeluarkan'], 0, 4);?> 
						</h5>
					</td>
				</tr>
			</table>
		</div>


		<div class="row text-center"  style="margin-top: 3%;">
			<div class="col-6 px-4 pl-3">
				<table class="text-center p-0 m-0">
					<tr>
						<td><h5 style="font-size: 3vw;"><?= $template_sertifikat['jabatan_1']; ?></h5></td>
					</tr>
					<tr>
						<td>
							<img src="<?= base_url('assets/img/sertifikat/tanda_tangan/').$template_sertifikat['ttd_1']; ?>" style="width: 35vw; margin-right: -3%" alt="Tanda tangan">
							<img src="<?= base_url('assets/img/sertifikat/stempel/').$template_sertifikat['stempel_1']; ?>" style="width: 20vw; position: absolute; margin-left:-40vw;  margin-top: -2%;" alt="Stempel" align="left">

						</td>
					</tr>
					<tr>
						<td><h5 style="font-size: 3vw; margin-top: 3%;"><u><?= $template_sertifikat['nama_1']; ?></u></h5></td>
					</tr>
				</table>
			</div>


			<div class="col-6 px-4">
				<table class="text-center p-0 m-0">
					<tr>
						<td><h5 style="font-size: 3vw;"><?= $template_sertifikat['jabatan_2']; ?></h5></td>
					</tr>
					<tr>
						<td>
							<img src="<?= base_url('assets/img/sertifikat/tanda_tangan/').$template_sertifikat['ttd_2']; ?>" style="width: 35vw; margin-right: -3%;" alt="Tanda tangan">
							<img src="<?= base_url('assets/img/sertifikat/stempel/').$template_sertifikat['stempel_2']; ?>" style="width: 20vw; position: absolute; margin-left:-40vw; margin-top: -2%;" alt="Stempel" align="left">

						</td>
					</tr>
					<tr>
						<td><h5 style="font-size: 3vw; margin-top: 3%;"><u><?= $template_sertifikat['nama_2'] ?></u></h5></td>
					</tr>
				</table>
			</div>
		</div>

	</div>



	<script type="text/javascript">
		window.print();
	</script>
	<!-- /.container-fluid -->

</div>
</body></html>
<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> RTIKAbdimas - Piagam Penghargaan Mitra</title>

	<!-- Custom fonts for this page-->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this page-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<!-- Custom styles for tables -->
	<link href="<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.min.css"); ?>" rel="stylesheet">
	
	<style type="text/css" media="print">
	@page { size: landscape; }
</style>

</head><body style="color: black;   size: 210mm 297mm;">

	<!-- Begin Page Content -->
	<img src="<?= base_url('assets/img/sertifikat/bg-sertifikat2.png'); ?>"  style="width:100%; height: 208mm; position: relative;
	z-index: 1;">
	<div  style="z-index: 2; position: absolute; margin-top: -75%;" >
		<table  style="margin-top: 2%;">
			<tr class="text-left">
				<td>
					<img src="<?= base_url('assets/img/logo/Kemkominfo.png'); ?>" style="width: 10%; margin-left: 4%;" alt="Logo Kominfo">

					<!-- <img src="<?= base_url('assets/img/komisariat/'.$komisariat['logo']); ?>" style="width: 12%;" alt="Logo Komisariat" class="mr-4 ml-3"> -->

					<img src="<?= base_url('assets/img/logo/logo rtik.png'); ?>" style="width: 8%;" alt="Logo RTIK">
				</td>
			</tr>
			<tr class="text-center" height="6%">
				<td>
					<h1 style="font-size: 5vw; margin-top: 6%;" class="font-weight-bold text-black">PIAGAM PENGHARGAAN</h1>
				</td>
			</tr>
			<tr class="text-center">
				<td>
					<h5 style="font-size: 2vw; margin-top: 1%; ">diberikan kepada</h5>
				</td>
			</tr>
			<tr class="text-center">
				<td>
					<h1 style="font-size: 6vw;" class="font-weight-bold text-black"><?= $mitra['nama_mitra']; ?></h1>
				</td>
			</tr>
			<tr class="text-center">
				<td style="padding: 0 5% 0 5%;">
					<h5 style="font-size: 2vw;">Atas partisipasinya sebagai mitra penerima manfaat dalam program <b>Relawan TIK Abdi Masyarakat Tahun <?= substr($event['date_created'], 0, 4); ?></b>.</h5>
				</td>
			</tr>
		</table>

		<div class="justify-content-md-center">
			<table style="margin-top: 4%;"  align="center">
				<tr>
					<td>
						<h5 style="font-size: 2vw;">
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


		<div class="row text-center" >
			<div class="col-6 pl-3" style="padding:0 10% 0 10%;">
				<table class="text-center p-0 m-0">
					<tr>
						<td><h5 style="font-size: 2vw; padding:0 2% 0 4%;"><?= $template_sertifikat['jabatan_1']; ?></h5></td>
					</tr>
					<tr>
						<td>
							<img src="<?= base_url('assets/img/sertifikat/tanda_tangan/').$template_sertifikat['ttd_1']; ?>" style="width: 25vw; margin-right: -3%" alt="Tanda tangan">
							<img src="<?= base_url('assets/img/sertifikat/stempel/').$template_sertifikat['stempel_1']; ?>" style="width: 15vw; position: absolute; margin-left:-30vw;  margin-top: -2%;" alt="Stempel" align="left">

						</td>
					</tr>
					<tr>
						<td><h5 style="font-size: 2vw; margin-top: 3%;"><u><?= $template_sertifikat['nama_1']; ?></u></h5></td>
					</tr>
				</table>
			</div>


			<div class="col-6"  style="padding:0 10% 0 10%;">
				<table class="text-center p-0 m-0">
					<tr>
						<td><h5 style="font-size: 2vw; padding:0 4% 0 4%;"><?= $template_sertifikat['jabatan_2']; ?></h5></td>
					</tr>
					<tr>
						<td>
							<img src="<?= base_url('assets/img/sertifikat/tanda_tangan/').$template_sertifikat['ttd_2']; ?>" style="width: 25vw; margin-right: -3%;" alt="Tanda tangan">
							<img src="<?= base_url('assets/img/sertifikat/stempel/').$template_sertifikat['stempel_2']; ?>" style="width: 15vw; position: absolute; margin-left:-30vw; margin-top: -2%;" alt="Stempel" align="left">

						</td>
					</tr>
					<tr>
						<td><h5 style="font-size: 2vw; margin-top: 3%;"><u><?= $template_sertifikat['nama_2'] ?></u></h5></td>
					</tr>
				</table>
			</div>
		</div>

	</div>



	<script type="text/javascript">
		var css = '@page { size: landscape; margin: 5mm 5mm 5mm 5mm;}',
		head = document.head || document.getElementsByTagName('head')[0],
		style = document.createElement('style');

		style.type = 'text/css';
		style.media = 'print';

		if (style.styleSheet){
			style.styleSheet.cssText = css;
		} else {
			style.appendChild(document.createTextNode(css));
		}

		head.appendChild(style);

		window.print();
	</script>
	<!-- /.container-fluid -->

</div>
</body></html>
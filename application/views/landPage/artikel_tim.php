<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= "RTIKAbdimas - ".$title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" rel="icon">
  <!-- <link href="<?= base_url('assets/img/logo/logo-rtik.png');?>" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/'); ?>landingPage2/assets/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" rel="icon">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/alert.css" rel="stylesheet">  
  <link href="<?= base_url('assets/css/modal.css');?>" rel="stylesheet">

</head>
<body>

  <div class="card px-1" border="0">
    <div class="card-body">
     <div class="content">
      <h2><?= $artikel['judul_laporan'] ?></h2>
      <h6><?= $artikel['nama_tim'].' ('.$artikel['nama_event'].')'; ?></h6>
      <hr>
      <p>
        <?= $artikel['laporan'] ?>
      </p> 
    </div>
  </div>
</div>  





<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>


<!-- Template Main JS File -->
<script src="<?= base_url('assets/landingPage2/assets/js/main.js');?>"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=  "RTIKAbdimas - ".$title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons --> <link href="<?= base_url('assets/img/logo/logoRTIKAbdimas2.png'); ?>" rel="icon">

  <!-- <link href="<?= base_url('assets/img/logo/logo-rtik.png');?>" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="<?= base_url('assets/landingPage2/assets/vendor/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
  <!-- <link href="<?= base_url('assets/landingPage2/assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet"> -->
  <link href="<?= base_url('assets/landingPage2/assets/vendor/icofont/icofont.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/landingPage2/assets/vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/landingPage2/assets/vendor/animate.css/animate.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/landingPage2/assets/vendor/venobox/venobox.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/landingPage2/assets/vendor/owl.carousel/assets/owl.carousel.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/landingPage2/assets/vendor/aos/aos.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/landingPage2/assets/vendor/remixicon/remixicon.css');?>" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/datepicker/jquery.datetimepicker.min.css'); ?>">  -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/landingPage2/assets/vendor/fontawesome/css/all.min.css'); ?>">

  <!-- Load file library jQuery melalui CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <!-- <link href="<?= base_url('assets/landingPage2/assets/css/style.css');?>" rel="stylesheet"> -->

  <!-- =======================================================
  * Template Name: Company - v2.2.1
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-4 rounded-bottom">
      <div class="card-header rounded-top" style="background: #0865c9;">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/img/logo/logo rtik.png') ?>" width="50" height="50" alt="logo rtik">
            <img src="<?= base_url('assets/img/logo/sttg.png') ?>" width="50" height="50" alt="logo sttg" loading="lazy">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
              <li class="nav-item active font-weight-bold">
                <?php if ($title == 'Form Pendaftaran (Relawan)') {?>
                  <a class="nav-link" href="<?= base_url('auth'); ?>" style="font-size: 15pt;">Formulir Pendaftaran (Relawan TIK) <span class="sr-only">(current)</span></a>
                <?php } else if ($title == 'Form Pendaftaran (Instruktur)') { ?>
                  <a class="nav-link" href="<?= base_url('auth'); ?>" style="font-size: 15pt;">Formulir Pendaftaran (Instruktur) <span class="sr-only">(current)</span></a>
                <?php } else if ($title == 'Form Pendaftaran (Pangkalan)') { ?>
                  <a class="nav-link" href="<?= base_url('auth'); ?>" style="font-size: 15pt;">Formulir Pendaftaran (Pangkalan) <span class="sr-only">(current)</span></a>
                <?php } ?>
              </li>
            </ul>
          </div>
        </nav>
      </div>
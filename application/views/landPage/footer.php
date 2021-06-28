  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top shadow" >
      <div class="container">
        <div class="row">

          <div class="col-sm-10">
            <div class="row">
              <div class="col-lg-5 col-md-5 col-sm-5 footer-contact">
                <img src="<?= base_url('assets/img/logo/logo-rtik.png'); ?>" alt="Logo Relawan RTIK" class="img-fluid" style="width: 50%; margin-left: -3%;">
                <p>
                  A108 Adam Street <br>
                  New York, NY 535022<br>
                  United States <br><br>
                  <strong>Phone:</strong> 0818461051<br>
                  <strong>Email:</strong> sekjen@relawantik.or.id<br>
                </p>
              </div>

              <div class="col-lg-5 col-md-5 col-sm-5 footer-contact" style="margin-right:-10%;">
                <img src="<?= base_url('assets/img/logo/sttg.png'); ?>" alt="Logo Relawan RTIK" class="img-fluid" style="width: 17%; margin-left: -3%;">
                <p>
                  Sekolah Tinggi Teknologi Garut<br>
                  Jl. Mayor Syamsu No.1 Garut 44151<br>
                  jawa Barat <br><br>
                  <strong>Phone:</strong> 0262-232773/4892180<br>
                  <strong>Email:</strong> info@sttgarut.ac.id<br>
                </p>
              </div>
            </div>

          </div>


          <div class="col-lg-2 col-md-2 col-sm-2 footer-links d-lg-block">
            <h4>Temukan Kami</h4>
            <ul>
              <li><i class="icofont-facebook mr-2"></i><a href="https://web.facebook.com/groups/RelawanTIKIndonesia" target="_blank"> Facebook</a></li>
              <li><i class="icofont-twitter  mr-2"></i> <a href="https://twitter.com/RelawanTIK" target="_blank">Twitter</a></li>
              <li><i class="icofont-brand-youtube mr-2"></i> <a href="https://www.youtube.com/channel/UCGVmghIL6HVzx1o9kdWBtDg">Youtube</a></li>
            </ul>
          </div>



        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <?= date('Y');?> <strong><span>Sekolah Tinggi Teknologi Garut</span></strong>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <div class="copyright">
          Dikembangkan Oleh: <strong><br><span>Ihsan Nugraha</span></strong>
        </div>

      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/php-email-form/validate.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/jquery-sticky/jquery.sticky.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/isotope-layout/isotope.pkgd.min.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/venobox/venobox.min.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/waypoints/jquery.waypoints.min.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/owl.carousel/owl.carousel.min.js');?>"></script>
  <script src="<?= base_url('assets/landingPage2/assets/vendor/aos/aos.js');?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/landingPage2/assets/js/main.js');?>"></script>

<!-- <iframe src="<?= base_url('landingPage/artikel_tim/'.$artikel['id_tim'])?>" class=" p-0 m-0 responsive-iframe"  frameborder="0"></iframe> -->

<?php if ($title == 'Artikel Laporan Kegiatan') {?> 
         <?php $i=0; foreach ($tahun as $thn) { ?>
   <script type="text/javascript">
    document.getElementById("tombol_pilihan_<?= $i; ?>").
    addEventListener("click", tampilkan_nilai_p);
 

      function tampilkan_nilai_p() 
      {
        var tahun=document.getElementById("tahun_<?= $i; ?>").innerHTML;         

        var pertama='<iframe src="<';
        var kedua="?= base_url('landingPage/";
        var ketiga="artikel_tahun/'.";
        var keempat='); ?>"'; 
        var kelima=' class="p-0 m-0 responsive-iframe" frameborder="0"></iframe>';
        var hasil = pertama + kedua + ketiga + tahun + keempat + kelima;
        var url = encodeURI(hasil);
        document.getElementById("demo").innerHTML=hasil;
        alert(hasil);      
      }
    </script>
      <?php $i++; } ?>

  <?php } ?>

</body>

</html>

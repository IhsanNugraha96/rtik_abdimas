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

  <!-- script see-hide password -->
  <script type="text/javascript">
    $(document).ready(function(){   
      $('.form-checkbox').click(function(){
        if($(this).is(':checked')){
          $('.form-password').attr('type','text');
        }else{
          $('.form-password').attr('type','password');
        }
      });
    });
  </script>
  <!-- akhir see-hide password -->

  <!-- script untuk menampilkan nama file pada saat mengubah foto -->
<script>
  $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){   
    $('.form-checkbox1').click(function(){
      if($(this).is(':checked')){
        $('.form-password1').attr('type','text');
      }else{
        $('.form-password1').attr('type','password');
      }
    });
  });
</script>
<!-- akhir tampil nama file -->

<!-- script date time picker -->
<!-- <script type="text/javascript" src="<?= base_url('assets/js/datepicker/jquery.datetimepicker.full.js'); ?>"></script>
<script type="text/javascript">
  $("#datetime").datetimepicker({
    step: 10,
    orientation: "bottom left"
  });

   $("#datetime2").datetimepicker({
    step: 10,
    orientation: "bottom left"
  });
   $("#date1").datetimepicker({
    timepicker: false,
    datepicker:true,
    format:'Y/m/d',
    weeks: true
  });
   $("#date2").datetimepicker({
    timepicker: false,
    datepicker:true,
    format:'Y/m/d',
    weeks: true
  });
</script> -->
<!-- Akhir Date time picker -->

  <!-- script form bertingkat untuk load data provinsi dari json-->
  <script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        type:'post',
        url:'<?= base_url('auth/get_provinsi'); ?>',
        success:function(hasil_provinsi)
        {
          $("select[name=provinsi]").html(hasil_provinsi);
        }
      });
 
      $("select[name=provinsi]").on("change",function(){
        // ambil id_provinsi dari atribut pribadi yang di pilih
        var id_provinsi_terpilih = $("option:selected",this).attr('id_provinsi');
        $.ajax({
          type:'post',
          url:'<?= base_url('auth/get_kota'); ?>',
          data:'id_provinsi='+id_provinsi_terpilih,
          success:function(hasil_distrik)
          {
            $("select[name=kota]").html(hasil_distrik);
          }
        })
      })
    });
  </script>
  
  

</body>

</html>
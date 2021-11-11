      
      <!-- Footer -->
      <footer class="sticky-footer bg-white shadow">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            &copy; Copyright <?= date('Y');?> <strong><span>Institut Teknologi Garut</span></strong>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modal -->
  <div id="lihat_logo" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 100%;">
        </div>
      </div>
    </div>
  </div>

  <!-- ModalBelumIsiBiodata-->
  <div id="WarningModalalert" class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">

          <i class="fa fa-exclamation-triangle fa-3x text-warning"></i>
          <h2 class="mt-2"><b>Peringatan!</b></h2>
          <p>Anda tidak bisa mengakses menu ini. <br> Harap melengkapi biodata terlebih dahulu!</p>
        </div>
        <div class="modal-footer warning-md" style="margin-top: -7%;">
          <a href="<?= base_url('Relawan/edit_profil') ?>"class="badge badge-primary badge-xs" type="button">Lengkapi Sekarang</a>
          <!-- <a href="" class="badge badge-warning badge-xs " type="button" data-dismiss="modal">Keluar</a> -->
        </div>
      </div> 
    </div>
  </div>
  <!-- Logout Modal-->
  <div class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" id="logoutModal" tabindex="-1" role="dialog" style="padding: 20px;">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
          <i class="far fa-frown fa-3x text-warning"></i>
          <h4 class="mt-2"><b>Yakin anda mau keluar?</b></h4>
          <p>Pilih tombol "Keluar" di bawah jika Anda siap mengakhiri sesi Anda saat ini.</p></div>
          <div class="modal-footer warning-md" style="margin-top: -7%;">
            <a class="badge badge-warning badge-xs" href="<?= base_url('Logout') ?>">Keluar</a>
          </div>
        </div>
      </div>
    </div>

    <?php if ($this->session->userdata('id_relawan')) { ?>
      <!-- modal hapus akun -->
      <div id="hapus_akun" class="modal modal-edu-general FullColor-popup-DangerModal fade" tabindex="-1" role="dialog" style="padding: 20px;">
        <div class="modal-dialog">
          <div class="modal-content shadow">
            <div class="modal-close-area modal-close-df">
              <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
            </div>
            <div class="modal-body">

              <i class="fas fa-exclamation-triangle fa-4x text-danger mb-2 mt-3"></i>
              <h4 class="mt-2"><b>Yakin anda mau menghapus akun ini?</b></h4>
              <p>Pilih tombol "Hapus Akun" di bawah jika Anda yakin untuk menghapus akun.</p></div>
              <div class="modal-footer warning-md" style="margin-top: -7%;">
                <a class="badge badge-danger badge-xs" href="<?= base_url('Relawan/update_data/hapus_akun/'.$relawan['id_relawan']); ?>">Hapus Akun</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>

    <!-- modal batal ikuti event -->
    <?php if ($title == 'Kegiatan Akan Datang') { ?>
      <div class="modal modal-edu-general Customwidth-popup-WarningModal fade shadow" id="batal_ikuti_event" tabindex="-1" role="dialog" style="padding: 20px;">
        <div class="modal-dialog">
          <div class="modal-content shadow">
            <div class="modal-close-area modal-close-df">
              <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
            </div>
            <div class="modal-body">
              <i class="far fa-frown fa-3x text-warning"></i>
              <h4 class="mt-2"><b>Yakin anda akan keluar dari event ini?</b></h4>
              <p>Semua data yang sudah terekam pada event ini akan ikut terhapus <br> Pilih tombol "Ya" di bawah jika Anda yakin.</p>
            </div>
            <div class="modal-footer warning-md" style="margin-top: -7%;">
              <?php if ($this->session->userdata('id_pembimbing')) 
              {?>
                <a class="badge badge-warning badge-xs" href="<?= base_url('Pembimbing/aksi_event/batal_ikuti_event'); ?>">Ya</a>
              <?php } 
              elseif ($this->session->userdata('id_relawan')) 
                {?>
                  <a class="badge badge-warning badge-xs" href="<?= base_url('Relawan/batal_event/'.urlencode($kegiatan_akan_datang['id_event'])); ?>">Ya</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?> 


      <!-- modal buat event -->
      <div id="tambah_event_Modal" class="modal modal-edu-general Customwidth-popup-PrimaryModal fade shadow" role="dialog" style="padding: 20px; ">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-close-area modal-close-df">
              <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
            </div>
            <div class="modal-body">
              <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png'); ?>"style="width: 20%; margin-top: -5%; margin-bottom: 5%;">
              <!-- form -->
              <form class="user was-validated mt-3" method="post" action="<?= base_url('Admin/buat_event_baru/'.$admin['id_admin']);  ?>">
                <div class="form-group">
                  <p for="" class="text-left mb-1 font-weight-bold">Nama/tema event :</p>
                  <input type="nama_event" class="form-control is_invalid form-control-sm" id="nama_event" name="nama_event" placeholder="RTIKAbdimas 20**" required oninvalid="this.setCustomValidity('Anda belum mengisi nama/tema event yang akan di selenggarakan..')" oninput="setCustomValidity('')">
                  <div class="invalid-feedback text-left">
                    Harap mengisi nama event/tema event.
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="color: white; float: right;">
                  Buat <i>Event</i>
                </button>              
              </form>
              <!-- akhir form -->
            </div>
          </div>
        </div>
      </div>
      <!-- akhir modal buat event -->


      <!-- Bootstrap core JavaScript-->
      <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
      <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
      <script src="<?= base_url('assets/landingPage2/assets/vendor/php-email-form/validate.js');?>"></script>
      <script src="<?= base_url('assets/landingPage2/assets/vendor/jquery-sticky/jquery.sticky.js');?>"></script>
      <script src="<?= base_url('assets/landingPage2/assets/vendor/isotope-layout/isotope.pkgd.min.js');?>"></script>
      <script src="<?= base_url('assets/landingPage2/assets/vendor/venobox/venobox.min.js');?>"></script>
      <script src="<?= base_url('assets/landingPage2/assets/vendor/waypoints/jquery.waypoints.min.js');?>"></script>
      <script src="<?= base_url('assets/landingPage2/assets/vendor/owl.carousel/owl.carousel.min.js');?>"></script>
      <script src="<?= base_url('assets/landingPage2/assets/vendor/aos/aos.js');?>"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

      <!-- script untuk menampilkan nama file pada saat mengubah foto -->
      <script>
        $('.custom-file-input').on('change', function(){
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
      </script>

      <!-- script form bertingkat untuk load data provinsi dari json-->
      <?php if ($title == "Edit Profil" || $title == "Mitra") { ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $.ajax({
              type:'post',
              <?php if ($title == 'edit_profil') {?>
                url:'<?= base_url('Relawan/get_provinsi'); ?>',
              <?php } elseif ($title == 'Mitra') {?>
                url:'<?= base_url('Relawan/get_provinsi2'); ?>',
              <?php } ?>
              success:function(hasil_provinsi)
              {
            // alert("oke");
            // console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
          }
        });

            $("select[name=provinsi]").on("change",function(){
          // ambil id_provinsi dari atribut pribadi yang di pilih
          var id_provinsi_terpilih = $("option:selected",this).attr('id_provinsi');
          $.ajax({
            type:'post',
            <?php if ($title == 'edit_profil') {?>
              url:'<?= base_url('Relawan/get_kota'); ?>',
            <?php } elseif ($title == 'Mitra') {?>
              url:'<?= base_url('Relawan/get_kota2'); ?>',
            <?php } ?>
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              // alert("oke");
              $("select[name=kota]").html(hasil_distrik);
            }
          })
        })
          });
        </script>
      <?php } ?>

      <?php if ($title == "Edit Profil Instruktur") { ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $.ajax({
              type:'post',
              url:'<?= base_url('Instruktur/get_provinsi'); ?>',
              success:function(hasil_provinsi)
              {
            // alert("oke");
            // console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
          }
        });

            $("select[name=provinsi]").on("change",function(){
          // ambil id_provinsi dari atribut pribadi yang di pilih
          var id_provinsi_terpilih = $("option:selected",this).attr('id_provinsi');
          $.ajax({
            type:'post',
            url:'<?= base_url('Instruktur/get_kota'); ?>',
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              // alert("oke");
              $("select[name=kota]").html(hasil_distrik);
            }
          })
        })
          });
        </script>
      <?php } ?>  

      <?php if ($title == "Edit Profil Pangkalan" ) { ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $.ajax({
              type:'post',
              url:'<?= base_url('Pangkalan/get_provinsi'); ?>',
              success:function(hasil_provinsi)
              {
            // alert("oke");
            // console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
          }
        });

            $("select[name=provinsi]").on("change",function(){
          // ambil id_provinsi dari atribut pribadi yang di pilih
          var id_provinsi_terpilih = $("option:selected",this).attr('id_provinsi');
          $.ajax({
            type:'post',
            url:'<?= base_url('Pangkalan/get_kota'); ?>',
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              // alert("oke");
              $("select[name=kota]").html(hasil_distrik);
            }
          })
        })
          });
        </script>
      <?php } ?>   

      <?php if ($title == "Edit Profil Pembimbing") { ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $.ajax({
              type:'post',
              url:'<?= base_url('Pembimbing/get_provinsi'); ?>',
              success:function(hasil_provinsi)
              {
            // alert("oke");
            // console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
          }
        });

            $("select[name=provinsi]").on("change",function(){
          // ambil id_provinsi dari atribut pribadi yang di pilih
          var id_provinsi_terpilih = $("option:selected",this).attr('id_provinsi');
          $.ajax({
            type:'post',
            url:'<?= base_url('Pembimbing/get_kota'); ?>',
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              alert("oke");
              $("select[name=kota]").html(hasil_distrik);
            }
          })
        })
          });
        </script>
      <?php } ?>   


      <?php if ($title == "Edit Profil Mitra") { ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $.ajax({
              type:'post',
              url:'<?= base_url('Mitra/get_provinsi'); ?>',
              success:function(hasil_provinsi)
              {
            // alert("oke");
            // console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
          }
        });

            $("select[name=provinsi]").on("change",function(){
          // ambil id_provinsi dari atribut pribadi yang di pilih
          var id_provinsi_terpilih = $("option:selected",this).attr('id_provinsi');
          $.ajax({
            type:'post',
            url:'<?= base_url('Mitra/get_kota'); ?>',
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              // alert("oke");console.log(hasil_distrik);
              $("select[name=kota]").html(hasil_distrik);
            }
          })
        })
          });
        </script>
      <?php } ?>   



      <?php if ($this->session->userdata('id_relawan')) 
      {
       if ($title == "Edit Profil") { ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $.ajax({
              type:'post',
              url:'<?= base_url('Relawan/get_provinsi'); ?>',
              success:function(hasil_provinsi)
              {
            // alert("oke");
            // console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
          }
        });

            $("select[name=provinsi]").on("change",function(){
          // ambil id_provinsi dari atribut pribadi yang di pilih
          var id_provinsi_terpilih = $("option:selected",this).attr('id_provinsi');
          $.ajax({
            type:'post',
            url:'<?= base_url('Relawan/get_kota'); ?>',
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              // alert("oke");console.log(hasil_distrik);
              $("select[name=kota]").html(hasil_distrik);
            }
          })
        })
          });
        </script>
      <?php }
    } ?>


    <!-- counter time -->
    <?php if ($title == 'Kegiatan Akan Datang' || $title == 'Kegiatan Berlangsung') { ?>

      <?php if ($title == 'Kegiatan Akan Datang'){ ?>
        <script src="<?= base_url('assets/vendor/counterup/counterup.min.js');?>"></script>
        <script>
        // Set the date we're counting down to
        <?php if (strtotime(date('Y-m-d G:i:s')) <= strtotime($kegiatan_akan_datang['awal_registrasi'])) { ?>
          var countDownDate = new Date("<?=$kegiatan_akan_datang['awal_registrasi']; ?>").getTime();
        <?php } elseif (strtotime(date('Y-m-d G:i:s')) >= strtotime($kegiatan_akan_datang['awal_registrasi'])) {?>  
          var countDownDate = new Date("<?=$kegiatan_akan_datang['akhir_registrasi']; ?>").getTime();
        <?php } ?>
            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();
            
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + " Hari " + hours + " Jam "
            + minutes + " Menit " + seconds + " Detik ";
            
            // If the count down is over, write some text 
            if (distance < 0) {
              clearInterval(x);
              <?php if ($title == 'Kegiatan Akan Datang'){ ?>
                document.getElementById("demo").innerHTML = "Silahkan refresh halaman!";
              <?php } ?>
            }
          }, 1000); 
        </script>
      <?php } ?>

      <?php if ($kegiatan_berlangsung) {?>

        <?php if ($title == 'Kegiatan Berlangsung')
        { ?>
          <?php if (strtotime($kegiatan_berlangsung['akhir_registrasi']) > strtotime(date('YmdGis')) )
          { ?>
            <script src="<?= base_url('assets/vendor/counterup/counterup.min.js');?>"></script>
            <script>
            // Set the date we're counting down to
            <?php if (strtotime(date('Y-m-d G:i:s')) <= strtotime($kegiatan_akan_datang['awal_registrasi'])) { ?>
              var countDownDate = new Date("<?=$kegiatan_akan_datang['awal_registrasi']; ?>").getTime();
            <?php } elseif (strtotime(date('Y-m-d G:i:s')) >= strtotime($kegiatan_akan_datang['awal_registrasi'])) {?>  
              var countDownDate = new Date("<?=$kegiatan_akan_datang['akhir_registrasi']; ?>").getTime();
            <?php } ?>
                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();
                
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                // Output the result in an element with id="demo"
                document.getElementById("demo1").innerHTML = days + " Hari " + hours + " Jam "
                + minutes + " Menit " + seconds + " Detik ";
                
                // If the count down is over, write some text 
                if (distance < 0) {
                  clearInterval(x);
                  <?php if ($title == 'Kegiatan Akan Datang'){ ?>
                    document.getElementById("demo1").innerHTML = "Silahkan refresh halaman!";
                  <?php } ?>
                }
              }, 1000); 
            </script>
          <?php } 

          elseif (strtotime($kegiatan_berlangsung['akhir_registrasi']) < strtotime(date('YmdGis')) && strtotime($kegiatan_berlangsung['akhir_pelaporan']) > strtotime(date('YmdGis'))) 
            { ?>
              <script src="<?= base_url('assets/vendor/counterup/counterup.min.js');?>"></script>
              <script>
            // Set the date we're counting down to
            <?php if (strtotime(date('Y-m-d G:i:s')) <= strtotime($kegiatan_berlangsung['awal_pelaporan'])) { ?>
              var countDownDate = new Date("<?=$kegiatan_berlangsung['awal_pelaporan']; ?>").getTime();
            <?php } elseif (strtotime(date('Y-m-d G:i:s')) >= strtotime($kegiatan_berlangsung['awal_pelaporan'])) {?>  
              var countDownDate = new Date("<?=$kegiatan_berlangsung['akhir_pelaporan']; ?>").getTime();
            <?php } ?>
                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();
                
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                // Output the result in an element with id="demo"
                document.getElementById("demo2").innerHTML = days + " Hari " + hours + " Jam "
                + minutes + " Menit " + seconds + " Detik ";
                
                // If the count down is over, write some text 
                if (distance < 0) 
                {
                  clearInterval(x);
                  <?php if ($title == 'Kegiatan Berlangsung'){ ?>
                    document.getElementById("demo2").innerHTML = "Silahkan refresh halaman!";
                  <?php } ?>
                }
              }, 1000); 
            </script>

          <?php } 



          elseif (strtotime($kegiatan_berlangsung['akhir_pelaporan']) < strtotime(date('YmdGis')) && $kegiatan_berlangsung['role_id'] != '3') 
            { ?>
              <script src="<?= base_url('assets/vendor/counterup/counterup.min.js');?>"></script>
              <script>
            // Set the date we're counting down to
            var countDownDate = new Date("<?=$kegiatan_berlangsung['akhir_penilaian']; ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();
                
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                // Output the result in an element with id="demo"
                document.getElementById("demo3").innerHTML = days + " Hari " + hours + " Jam "
                + minutes + " Menit " + seconds + " Detik ";
                
                // If the count down is over, write some text 
                if (distance < 0) 
                {
                  clearInterval(x);
                  <?php if ($title == 'Kegiatan Berlangsung'){ ?>
                    document.getElementById("demo3").innerHTML = "Kegiatan telah selesai!";
                  <?php } ?>
                }
              }, 1000); 
            </script>
          <?php } ?>  

        <?php } }?>

      <?php } ?>







      <?php if ($this->session->userdata('id_mitra')) 
      {
        if ($title == 'Survey Program')
        {
          if (strtotime($kegiatan_berlangsung['awal_penilaian']) >= strtotime(date('YmdGis'))) 
          { ?>
            <script src="<?= base_url('assets/vendor/counterup/counterup.min.js');?>"></script>
            <script>
            // Set the date we're counting down to
            var countDownDate = new Date("<?=$kegiatan_berlangsung['awal_penilaian']; ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();
                
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                // Output the result in an element with id="demo"
                document.getElementById("demo6").innerHTML = days + " Hari " + hours + " Jam "
                + minutes + " Menit " + seconds + " Detik ";
                
                // If the count down is over, write some text 
                if (distance < 0) 
                {
                  clearInterval(x);
                  <?php if ($title == 'Survey Program'){ ?>
                    document.getElementById("demo6").innerHTML = "Silahkan refresh halaman!";
                  <?php } ?>
                }
              }, 1000); 
            </script>

          <?php }
           elseif (strtotime($kegiatan_berlangsung['awal_penilaian']) < strtotime(date('YmdGis'))) 
          { ?>
            <script src="<?= base_url('assets/vendor/counterup/counterup.min.js');?>"></script>
            <script>
            // Set the date we're counting down to
            var countDownDate = new Date("<?=$kegiatan_berlangsung['akhir_penilaian']; ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();
                
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                // Output the result in an element with id="demo"
                document.getElementById("demo7").innerHTML = days + " Hari " + hours + " Jam "
                + minutes + " Menit " + seconds + " Detik ";
                
                // If the count down is over, write some text 
                if (distance < 0) 
                {
                  clearInterval(x);
                  <?php if ($title == 'Survey Program'){ ?>
                    document.getElementById("demo7").innerHTML = "Silahkan refresh halaman!";
                  <?php } ?>
                }
              }, 1000); 
            </script>
          <?php }  
        }
      } ?>
      <!-- akhir counter time -->


      <?php if ($title != 'Dashboard Admin' || $title != 'Detail Event') { ?>
      </body>

      </html>
    <?php } else {
  // tidak ditampilkan penutup html
    } ?>

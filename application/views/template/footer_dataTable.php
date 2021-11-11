
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
          <img src="<?= base_url('assets/img/logo/logoRTIKAbdimas.png') ?>"style="width: 100%;">
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
          <a class="badge badge-primary badge-xs" href="<?= base_url('Logout') ?>">Keluar</a>
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
  <div id="hapus_akun" class="modal modal-edu-general Customwidth-popup-DangerModal fade shadow" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">

          <img src="<?= base_url('assets/img/relawan/image/'.$relawan['image']) ?>" class="shadow">
        </div>
      </div>
    </div>
  </div>
<?php } ?>

 <!-- Bootstrap core JavaScript-->
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

<!-- script untuk menampilkan nama file pada saat mengubah foto -->
<script>
  $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>
<!-- akhir tampil nama file -->

  <!-- jika title pelaporan -->
  <?php if ($title == 'Pelaporan') {?>
    <script type="text/javascript" src="<?php echo base_url().'assets/vendor/summernote/summernote-bs4.js';?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#summernote').summernote({
          height: "90%",
          callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete : function(target) {
                    deleteImage(target[0].src);
                }
          }

        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo base_url('Relawan/upload_image')?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
              $('#summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {src : src},
                type: "POST",
                url: "<?php echo base_url('Relawan/delete_image')?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }


      });

      $('.summernote').summernote({
          toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic','clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']]
              ]
        });
      
    </script>
  <?php } ?>


   <?php if ($title == "Pembimbing Pangkalan") { ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $.ajax({
            type:'post',
            url:'<?= base_url('Pangkalan/get_provinsi2'); ?>',
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
            url:'<?= base_url('Pangkalan/get_kota2'); ?>',
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
</body>

</html>
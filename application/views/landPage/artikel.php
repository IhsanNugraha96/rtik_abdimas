<style type="text/css">
.responsive-container {
  position: relative;
  overflow: hidden;
  padding-top: 56.25%;
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
</style>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container ">
    </div>
  </section><!-- End Breadcrumbs -->

  <section id="about-us" class="artikel  section-bg">
    <div class="row">
      <div class="col-lg-9 col-md-8 col-sm-7" style="padding: 0 0 0 3%">
        <div class="responsive-container" data-aos="fade-up">

          <!-- <div class="content"> -->
          <!--  <h2><?= $artikel[0]['judul_laporan'] ?></h2>
              <h6><?= $artikel[0]['nama_tim'].' ('.$artikel[0]['nama_event'].')'; ?></h6>
              <hr>
            <p>
                <?= $artikel[0]['laporan'] ?>
              </p> -->


              <span id="demo">
                <iframe src="<?= base_url('landingPage/artikel_tim/'.$artikel['id_tim'])?>" class=" p-0 m-0 responsive-iframe"  frameborder="0"></iframe>
                </span>
              <!-- </div> -->

            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-sm-5"  style="padding-right:3%;">
            <div class="card shadow" data-aos="fade-left">
              <div class="card-header bg-secondary text-white">
                Lihat Artikel
              </div>
              <div class="card-body text-center">
                <!-- <ul> -->
                  <?php $i=0; foreach ($tahun as $thn) { ?>
                    <!-- <span id="tahun" hidden><?= $thn; ?></span> -->
                    <button class="btn btn-sm btn-secondary" id="tombol_pilihan_<?= $i; ?>"><span id="tahun_<?= $i; ?>"><?= $thn; ?></span></button>
                  <?php $i++; } ?>
                <!-- </ul> -->
              </div>
            </div>
          </div>
        </div>

      </section>



    </main><!-- End #main -->

    
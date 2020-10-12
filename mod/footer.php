<?php
if (!defined('_VALID_ACCESS')) {
  header("location: index.php");
  die;
}

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM " . _TBPROFIL . " ORDER BY id_pf DESC LIMIT 0,1");
?>
<footer style="background-color: #1b365d;">
  <div class="container">
    <div class="row">
      <div class="col-md-12" data-aos="fade-up">
        <img class="img-fluid" style="position: relative;top: -20px; width: 49%;" src="<?php echo _URLWEB; ?>cssMediatama/banner/logo.gif" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-12" data-aos="fade-up">
        <p class="text-white text-justify">
          TVRI Stasiun Sumatra Barat terletak di Jalan Raya By pass KM 16 Koto Panjang, Padang. TVRI Stasiun Sumatera
          Barat
          Diresmikan pada 19 April 1997. TVRI Sumatera Barat mengudara secara konsisten selama 4 jam setiap harinya.
        </p>
        <div class="row">
          <div class="col-md-12">
            <a class="text-white" href="https://www.instagram.com/tvrisumbar/"><span class="icon-instagram mr-4"></span></a>
            <a class="text-white" href="https://www.facebook.com/tvrisumatrabarat/"><span class="icon-facebook mr-4"></span></a>
            <a class="text-white" href="https://www.youtube.com/channel/UCO_Ga01t2fUtIzJZGIfSKeg"><span class="icon-youtube mr-4"></span></a>
            <a class="text-white" href="https://twitter.com/tvrisumbar"><span class="icon-twitter mr-4"></span></a>
            <a class="text-white" href="mailto:humas@tvrisumbar.co.id"><span class="icon-google mr-4"></span></a>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-12" data-aos="fade-down">
        <h4 class="topicof text-white" style="font-size: 20px;margin-left: 1em;background: url('img/icopadf.png') no-repeat left;"> &nbsp; &nbsp; TVRI Sumbar</h4>
        <ul class="site-menu main-menu js-clone-nav mr-auto d-lg-block">
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="<?php echo _URLWEB; ?>tentang#sejarah" class="text-white">Sejarah TVRI Sumbar</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="<?php echo _URLWEB; ?>tentang#visi" class="text-white">Visi, Misi & Slogan</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="<?php echo _URLWEB; ?>tentang#struktur" class="text-white">Struktur Organisasi</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="<?php echo _URLWEB; ?>agenda" class="text-white">Agenda Kegiatan</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="<?php echo _URLWEB; ?>saran" class="text-white">Kritik & Saran</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="<?php echo _URLWEB; ?>hubungi" class="text-white">Hubungi Kami</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="<?php echo _URLWEB; ?>stream" class="text-white">Live Streaming</a></li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-12" data-aos="fade-down">
        <h4 class="text-white topicof" style="margin-left: 1em;font-size: 20px;background: url('img/icopadf.png') no-repeat left;"> &nbsp; &nbsp; Link Lainnya</h4>
        <ul class="site-menu main-menu js-clone-nav mr-auto d-lg-block">
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="http://tvri.go.id" target="_blank" class="text-white">Televisi Republik Indonesia</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="http://kominfo.go.id" target="_blank" class="text-white">Kementerian Komunikasi dan Informatika</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="http://sumbarprov.go.id" target="_blank" class="text-white">Pemerintah Provinsi Sumatera Barat</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="http://padang.go.id" target="_blank" class="text-white">Pemerintah Kota Padang</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="http://agamkab.go.id" target="_blank" class="text-white">Pemerintah Kabupaten Agam</a></li>
          <li style="font-size: 13px;padding-top: 0px;padding-bottom: 0px;"><a href="http://sijunjung.go.id" target="_blank" class="text-white">Pemerintah Kabupaten Sijunjung</a></li>
        </ul>
        <p align="right"><a class="text-white" style="margin-top: 5px;" href="<?php echo _URLWEB; ?>link">» Link Lainnya</a></p>
      </div>

    </div>
    <div class="row text-center">
      <div class="col-md-12">
        <div class="border-top ">
          <p class="text-white copyright"><small>
              COPYRIGHT © 2015
              <script>
                document.write(new Date().getFullYear());
              </script>
              TELEVISI REPUBLIK INDONESIA STASIUN SUMATERA BARAT
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

        </div>
      </div>

    </div>
</footer>

<!-- JavaScript -->
<script>
  var elem = document.querySelector('.main-carousel');
  var flkty = new Flickity(elem, {
    // options
    cellAlign: 'left',
    contain: true,

  });

  // element argument can be a selector string
  //   for an individual element
  var flkty = new Flickity('.main-carousel', {
    // options
  });
</script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!-- End Footer -->
<script src="<?php echo _URLWEB; ?>cssMediatama/js/owl.carousel.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/jquery-ui.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/popper.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/bootstrap.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/owl.carousel.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/jquery.countdown.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/jquery.easing.1.3.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/aos.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/jquery.fancybox.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/jquery.sticky.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/isotope.pkgd.min.js"></script>
<script src="<?php echo _URLWEB; ?>cssMediatama/js/main.js"></script>

<script>
  const $owlCarousel = $("#owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    nav: false,
    autoplay: true,
    navText: [
      '<svg width="100" height="100" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>',
      '<svg width="100" height="100" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>'
    ]
  });

  $($owlCarousel).on("changed.owl.carousel", e => {
    $(".owl-slide-animated").removeClass("is-transitioned");
    const $currentOwlItem = $(".owl-item").eq(e.item.index);
    $currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");
  });

  /*you have to bind initialized event before owl's initialization (see demo) */
  $(".owl-carousel").on("initialized.owl.carousel", () => {
    setTimeout(() => {
      $(".owl-item.active .owl-slide-animated").addClass("is-transitioned");
    }, 200);
  });
</script>
</body>

</html>
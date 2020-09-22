<?php
// // if (!defined('_VALID_ACCESS')) {
// //   header("location: index.php");
// //   die;
// }

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM " . _TBPROFIL . " ORDER BY id_pf DESC LIMIT 0,1");
?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <img style="width: 170px;height: 100px;" class="img-fluid" src="<?php echo _URLWEB; ?>cssMediatama/images/logobaru.jpg" alt="">
      </div>
      <div class="col-md-5">

        <p class="text-justify">
          TVRI Stasiun Sumatra Barat terletak di Jalan Raya By pass KM 16 Koto Panjang, Padang. TVRI Stasiun Sumatera
          Barat
          Diresmikan pada 19 April 1997. TVRI Sumatera Barat mengudara secara konsisten selama 4 jam setiap harinya.
        </p>
        <div class="row">
          <div class="col-md-12">
            <span class="fa fa-instagram mr-4"></span>
            <span class="fa fa-facebook mr-4"></span>
            <span class="fa fa-youtube mr-4"></span>
            <span class="fa fa-tumblr mr-4"></span>
            <span class="fa fa-google mr-4"></span>
            <span class="fa fa-telegram mr-4"></span>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <a style="font-family: 'Font TVRI' !important; letter-spacing: 1px; font-weight: bolder;" class="h4 text-primary mr-3">Program</a>
        <a style="font-family: 'Font TVRI' !important; letter-spacing: 1px; font-weight: bolder;" class="h4 text-primary mr-3">Jadwal TV</a>
        <a style="font-family: 'Font TVRI' !important; letter-spacing: 1px; font-weight: bolder;" class="h4 text-primary mr-3">Kontak Kami</a>
        <a style="font-family: 'Font TVRI' !important; letter-spacing: 1px; font-weight: bolder;" class="h4 text-primary mr-3"><img style="width: 150px;" src="banner/live.gif" alt=""></a>
      </div>
    </div>

    <div class="row  text-center">
      <div class="col-md-12">
        <div class="border-top ">
          <p class="copyright"><small>
              Copyright © 2015
              <script>
                document.write(new Date().getFullYear());
              </script>
              TELEVISI REPUBLIK INDONESIA STASIUN SUMATERA BARAT
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

        </div>
      </div>

    </div>
  </div>
</footer>

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
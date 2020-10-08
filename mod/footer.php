<?php
if (!defined('_VALID_ACCESS')) {
  header("location: index.php");
  die;
}

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM " . _TBPROFIL . " ORDER BY id_pf DESC LIMIT 0,1");
?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12" data-aos="fade-up">
        <img style="width: 170px;height: 100px;" class="img-fluid" src="<?php echo _URLWEB; ?>cssMediatama/images/logobaru.jpg" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 col-sm-12" data-aos="fade-up">
        <p class="text-justify">
          TVRI Stasiun Sumatra Barat terletak di Jalan Raya By pass KM 16 Koto Panjang, Padang. TVRI Stasiun Sumatera
          Barat
          Diresmikan pada 19 April 1997. TVRI Sumatera Barat mengudara secara konsisten selama 4 jam setiap harinya.
        </p>
        <div class="row">
          <div class="col-md-12">
            <a href="https://www.instagram.com/tvrisumbar/"><span class="icon-instagram mr-4"></span></a>
            <a href="https://www.facebook.com/tvrisumatrabarat/"><span class="icon-facebook mr-4"></span></a>
            <a href="https://www.youtube.com/channel/UCO_Ga01t2fUtIzJZGIfSKeg"><span class="icon-youtube mr-4"></span></a>
            <a href="https://twitter.com/tvrisumbar"><span class="icon-twitter mr-4"></span></a>
            <a href="mailto:humas@tvrisumbar.co.id"><span class="icon-google mr-4"></span></a>
          </div>
        </div>
      </div>

      <div class="col-md-7 col-sm-12" data-aos="fade-down">

        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
          <div style="display: inline-block;font-size: 15px;" class="dropdown nav-link  text-primary">
            <a href="javascript:void(0)" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Program
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" style="color: #521b6c" href="<?php echo _URLWEB; ?>program/entertainment">Entertaiment</a>
              <a class="dropdown-item" style="color: #0e55a5" href="<?php echo _URLWEB; ?>program/news">News</a>
              <a class="dropdown-item" style="color: #05683a" href="<?php echo _URLWEB; ?>program/cultureandlife">Culture & Life</a>
              <a class="dropdown-item" style="color: #d2571c" href="<?php echo _URLWEB; ?>program/kid">Kid</a>
              <a class="dropdown-item" style="color: #9e0b11" href="<?php echo _URLWEB; ?>program/sport">Sport</a>
            </div>
          </div>
          <div style="display: inline-block;font-size: 15px;"><a href="<?php echo _URLWEB; ?>home#jadwal" class="nav-link">Jadwal TV</a></div>
          <div style="display: inline-block;font-size: 15px;"><a href="<?php echo _URLWEB; ?>tentang" class="nav-link">Tentang Kami</a></div>
          <div style="display: inline-block;font-size: 15px;" class="dropdown nav-link  text-primary">
            <a href="javascript:void(0)" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Rate Card
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" style="color: #9e0b11" href="<?php echo _URLWEB; ?>rate/program">Rate Penyiaran</a>
              <a class="dropdown-item" style="color: #05683a" href="<?php echo _URLWEB; ?>rate/iklan">Rate Produksi</a>
            </div>
          </div>
          <div style="display: inline-block;font-size: 15px;"><a href="<?php echo _URLWEB; ?>foto" class="nav-link">Gallery</a></div>

          <div style="display: inline-block;font-size: 15px;"><a href="<?php echo _URLWEB; ?>stream" class="nav-link"><img style="width: 150px;" src="<?php echo _URLWEB; ?>cssMediatama/banner/live.gif" alt=""></a></div>
        </ul>
        </nav>
      </div>
      <div class="row text-center">
        <div class="col-md-12">
          <div class="border-top ">
            <p class="copyright"><small>
                COPYRIGHT © 2015
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
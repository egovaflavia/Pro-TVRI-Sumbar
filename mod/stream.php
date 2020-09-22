<?php
if (!defined('_VALID_ACCESS')) {
  header("location: index.php");
  die;
}

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM " . _TBPROFIL . " ORDER BY id_pf DESC LIMIT 0,1");
$tanggal = new tanggal;

$atas = 'mod/header.php';
if (file_exists($atas)) {
  include_once "$atas";
} else {
  echo "<center><div style=\"background-color: #eaeaea; margin-top: 80px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 14px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal mengakses modul <b>HEADER</b></div></center>";
  die;
}

?>
<?php
$program = $akdb->dbquery("SELECT * FROM programtb");
$slider = $akdb->dbquery("SELECT * FROM utamatb WHERE status = '1'");

?>

<?php include 'mod/header.php' ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">

  <!-- Loading -->
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- End Loading -->

  <div class="site-wrap">

    <!-- Mobile -->
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <!-- End Mobile -->

    <div class="sticky-wrapper is-sticky">
      <header class="site-navbar js-sticky-header shrink site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-xl-2">
              <h1 class="mb-0 site-logo"><a href="<?php echo _URLWEB; ?>home" class="h2 mb-0 text-white"><img class="img-fluid" style="max-width: 200%;" src="<?php echo _URLWEB; ?>cssMediatama/banner/logo.gif" alt="">
                </a></h1>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
              <nav class="site-navigation position-relative text-right" role="navigation">

                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li class="dropdown nav-link">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Program
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" style="color: #521b6c" href="<?php echo _URLWEB; ?>program/entertainment">Entertaiment</a>
                      <a class="dropdown-item" style="color: #0e55a5" href="<?php echo _URLWEB; ?>program/news">News</a>
                      <a class="dropdown-item" style="color: #05683a" href="<?php echo _URLWEB; ?>program/culture">Culture</a>
                      <a class="dropdown-item" style="color: #d2571c" href="<?php echo _URLWEB; ?>program/kid">Kid</a>
                      <a class="dropdown-item" style="color: #9e0b11" href="<?php echo _URLWEB; ?>program/sport">Sport</a>
                      <a class="dropdown-item" style="color: #05683a" href="<?php echo _URLWEB; ?>program/life">Life</a>
                    </div>
                  </li>
                  <li><a href="<?php echo _URLWEB; ?>home#jadwal" class="nav-link">Jadwal TV</a></li>
                  <li><a href="" class="nav-link">Kontak Kami</a></li>
                  <li><a href="stream" class="nav-link"><img style="width: 150px;" src="<?php echo _URLWEB; ?>cssMediatama/banner/live.gif" alt=""></a></li>
                </ul>
              </nav>
            </div>

            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>
    </div>


    <br>
    <br>

    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-3">
            <h2 class="text-black mb-2">LIVE STREAMING </h2>
            <p>Televisi Nasional, ‎Media Pemersatu Bangsa</p>
          </div>
        </div>

        <div class="row hover-1-wrap mb-lg-0">
          <div class="col-12">

            <section class="site-blocks-cover overflow-hidden bg-light">
              <div id="main">
                <div id="playerElement" style="width:100%; height:500px; padding:0"></div>
              </div>

              <script type="text/javascript">
                WowzaPlayer.create('playerElement', {
                  "license": "PLAY1-cNX7a-MhVP9-wnkb7-QmteJ-9NMHV",
                  "title": "Silahkan klik tombol play untuk memulai streaming",
                  "description": "",
                  "sourceURL": "http://wowza58.indostreamserver.com:1935/tvrisumbar/live2/playlist.m3u8",
                  "autoPlay": true,
                  "volume": "100",
                  "mute": false,
                  "loop": false,
                  "audioOnly": false,
                  "uiShowQuickRewind": true,
                  "posterFrameURL": "http://tvrisumbar.co.id/img/online-streaming.jpg",
                  "endPosterFrameURL": "http://tvrisumbar.co.id/img/online-streaming.jpg",
                  "uiPosterFrameFillMode": "fill",
                  "uiQuickRewindSeconds": "30"
                });
              </script>

          </div>
        </div>
      </div>
    </section>

    <!-- Program Slide -->
    <section class="site-section block-13" id="testimonials-section" data-aos="fade">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            <h2 class="text-black mb-2">PROGRAM ACARA</h2>
            <p>Televisi Nasional, ‎Media Pemersatu Bangsa</p>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-delay="200">
          <div class="owl-carousel nonloop-block-13">

            <?php while ($pecahProgram = mysql_fetch_assoc($program)) : ?>
              <div class="" style="margin-right: 2px;">
                <div class="" data-aos="fade-up" data-aos-delay="">
                  <div class="trainer">
                    <figure>
                      <img src="<?php echo _URLWEB; ?>up/program/<?= $pecahProgram['foto'] ?>" alt="Image" class="img-fluid">
                    </figure>
                    <div class="px-md-3">
                      <h3><?= $pecahProgram['nama'] ?></h3>
                      <h5 style="font-size: 12px;"><?= $pecahProgram['kat'] ?></h5>
                      <p><?= substr($pecahProgram['isi'], 0, 100) ?>...</p>
                      <p><?= $pecahProgram['jadwal'] ?></p>
                      <p><a href="#" class="">Read More..</a></p>
                      <ul class="ul-social-circle">
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile ?>

          </div>
        </div>
      </div>
    </section>
    <!-- Program Slide -->

    <!-- Map -->
    <section class="site-section">
      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-lg-6 text-center heading-section mb-3">
          <h2 class="text-black">Lokasi Kami</h2>
          <p>TVRI Sumatera Barat</p>
        </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.453470040351!2d100.3763871!3d-0.8652635!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a485651e4ae9c99!2sTVRI%20Sumbar!5e0!3m2!1sid!2sid!4v1599461339593!5m2!1sid!2sid" width="100%" height="600"></iframe>
    </section>
    <!-- End Map -->

  </div>
  <!-- .site-wrap -->

  <?php include 'mod/footer.php' ?>
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

  <?php include 'mod/menudkk.php' ?>

  <section style="width: 100%;height: auto; background-repeat: no-repeat; background-size:100% 100%;background-image: url('<?php echo _URLWEB; ?>cssMediatama/images/frame3.png');" class="site-section block-13" class="site-section">
    <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= _URLWEB ?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Stream</li>
        </ol>
      </nav>

      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-lg-6 text-center heading-section mb-3">
          <h2 class="text-black mb-2">LIVE STREAMING </h2>
          <p>Televisi Nasional, ‎Media Pemersatu Bangsa</p>
        </div>
      </div>

      <div class="row hover-1-wrap mb-lg-0">
        <div class="col-12">

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

  <!-- News -->
  <section style="width: 100%;height: auto; background-repeat: no-repeat; background-size:100% 100%;background-image: url('<?php echo _URLWEB; ?>cssMediatama/images/frame4.png');" class="site-section block-13" id="testimonials-section" data-aos="fade">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-lg-6 text-center heading-section mb-5">
          <h2 class="text-black mb-2">News</h2>
          <p>Berita Terkini Seputar Sumatera Barat</p>
        </div>
      </div>

      <div data-aos="fade-up" data-aos-delay="200">
        <div class="owl-carousel nonloop-block-13">

          <?php
          $mohe = 'mod/mohe.php';
          if (file_exists($mohe)) {
            include_once "$mohe";
          } else {
            echo "";
          }
          ?>

          <?php
          $cekterkini = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBBERITA . "");

          if ($cekterkini->num <= 0) {

            echo "";
          } else {

            $sqlterkini = $akdb->dbquery("SELECT * FROM " . _TBBERITA . " ORDER BY id_br   DESC LIMIT 10");

            while ($rowterkini = mysql_fetch_object($sqlterkini)) {
              // var_dump($rowterkini->foto);
              $judul4 = str_replace(" ", "-", $rowterkini->judul);
              $judul41 = str_replace("/", "-", $judul4);
              $judul41 = str_replace("?", "-", $judul41);

              $kanaltkn = $akdb->dbobject("SELECT nama FROM " . _TBKANAL . " WHERE id_kn = '$rowterkini->id_kn' ORDER BY id_kn DESC LIMIT 1");

              if ($rowterkini->foto <> '') {
                $imgtkn = _URLWEB . "up/berita/" . $rowterkini->cfoto;
              } else {
                $imgtkn = _URLWEB . "img/thumb_no-img-berita-bs.jpg";
              }

          ?>
              <div class="card m-2">
                <a href="<?php echo _URLWEB . "berita/detil/$rowterkini->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>">
                  <img style="height: 12em;" class="card-img-top" src="<?= _URLWEB . 'up/berita/' . $rowterkini->foto ?>" alt="No Image">
                </a>

                <div class="card-body">
                  <a href="<?php echo _URLWEB . "berita/detil/$rowterkini->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>">
                    <h5 class="card-title text-black"><?= $rowterkini->judul ?></h5>
                  </a>
                  <p class="card-text"><span class="post-meta mb-3 d-block"><?php $tanggal->contanggalx(substr($rowterkini->tgl_jam, 8, 2), substr($rowterkini->tgl_jam, 5, 2), substr($rowterkini->tgl_jam, 0, 4));
                                                                            echo " " . substr($rowterkini->tgl_jam, 11, 5) . " WIB"; ?></span>
                    <p></p>
                    <a href="<?php echo _URLWEB . "berita/detil/$rowterkini->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>" class="btn btn-primary">&mdash; Selengkapnya</a>
                </div>
              </div>
            <?php
            }
            ?>
            <!-- <div align="right"><a class="btn" href="<?php echo _URLWEB; ?>berita" />Berita Lainnya</a></div> -->
          <?php
          }
          ?>

        </div>
      </div>
    </div>
  </section>
  <!-- News -->

  <!-- Map -->
  <section style="width: 100%;height: auto; background-repeat: no-repeat; background-size:100% 100%;background-image: url('<?php echo _URLWEB; ?>cssMediatama/images/frame6.png');" class="site-section">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-6 text-center heading-section mb-3">
        <h2 class="text-black">Lokasi Kami</h2>
        <p>TVRI Sumatera Barat</p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6" data-aos="fade-right">
          <img class="img-fluid" src="<?php echo _URLWEB; ?>cssMediatama/images/location.svg" alt="">
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.155490358497!2d100.367012!3d-0.9334207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c7172f462755%3A0x3a485651e4ae9c99!2sTVRI%20Sumbar!5e0!3m2!1sid!2sid!4v1601259938814!5m2!1sid!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </section>
  <!-- End Map -->

  </div>
  <!-- .site-wrap -->

  <?php include 'mod/footer.php' ?>
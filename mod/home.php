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
		border: #dadada 10px solid; width: 280px;
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 14px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal mengakses modul <b>HEADER</b></div></center>";
  die;
}

?>
<?php
$program = $akdb->dbquery("SELECT * FROM programtb");
$slider = $akdb->dbquery("SELECT * FROM utamatb WHERE status = '1'");
$dataWarna = "";
$dataWarna = array(
  'jadwaltv' => mysql_fetch_assoc($akdb->dbquery("SELECT * FROM `customtb` WHERE `custom_id` = '1'")),
  'program' => mysql_fetch_assoc($akdb->dbquery("SELECT * FROM `customtb` WHERE `custom_id` = '2'")),
  'news' => mysql_fetch_assoc($akdb->dbquery("SELECT * FROM `customtb` WHERE `custom_id` = '3'")),
  'follow' => mysql_fetch_assoc($akdb->dbquery("SELECT * FROM `customtb` WHERE `custom_id` = '4'")),
  'lokasi' => mysql_fetch_assoc($akdb->dbquery("SELECT * FROM `customtb` WHERE `custom_id` = '5'")),
);

// var_dump($dataWarna);
// exit;

?>

<?php include 'mod/header.php' ?>

<body>
  <?php include 'mod/menudkk.php' ?>

  <section>
    <div class="main-carousel" data-flickity='{ "autoPlay": 2000,"wrapAround": true }'>
      <?php while ($pecahSlider = mysql_fetch_assoc($slider)) : ?>
        <div class="carousel-cell">
          <img class="img-class" src="<?php echo _URLWEB; ?>up/slider/<?= $pecahSlider['foto'] ?>" alt="">
          <div class="card" style="opacity: 0.6;">
            <div class="card-body container">
              <h2 class="text-black"><?= $pecahSlider['judul'] ?></h2>
              <?= $pecahSlider['subjudul'] ?>
            </div>
          </div>
        </div>
      <?php endwhile ?>
    </div>
  </section>

  <!-- End Slider -->

  <!-- Jadwal TV -->
  <section id="jadwal" style="background-color: <?= $dataWarna['jadwaltv']['custom_kode'] ?>;" class="site-section">
    <div class="container">
      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-lg-6 text-center heading-section mb-5">
          <h2 class="text-black mb-2">Jadwal TV</h2>
          <p>Televisi Nasional, ‎Media Pemersatu Bangsa</p>
        </div>
      </div>

      <div class="row hover-1-wrap mb-5 mb-lg-0">
        <div class="col-12">
          <div class="row">

            <?php
            $tgkini = date("Y-m-d");
            $cekac = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBACARA . " WHERE tgl='" . $tgkini . "'");
            if ($cekac->num <= 0) :
            ?>
              <div class="mb-12 mb-lg-0 col-lg-12 order-lg-2" data-aos="fade-right">
                <p align="center">Belum Dipublikasikan </p>
              </div>
            <?php else : ?>
              <div class="col-md-6 col-sm-12">
                <h2 style="color: #1b365d;">Susunan Acara Hari Ini </h2>
                <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th>Hari Ini</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $dataAcara = $akdb->dbquery("SELECT * FROM " . _TBACARA . " WHERE tgl='" . $tgkini . "'");
                    while ($pecahAcara = mysql_fetch_assoc($dataAcara)) :
                    ?>
                      <?php if ($pecahAcara['jam1'] != '' && $pecahAcara['ac1'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam1'] ?> &mdash; <?= $pecahAcara['ac1'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam2'] != '' && $pecahAcara['ac2'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam2'] ?> &mdash; <?= $pecahAcara['ac2'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam3'] != '' && $pecahAcara['ac3'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam3'] ?> &mdash; <?= $pecahAcara['ac3'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam4'] != '' && $pecahAcara['ac4'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam4'] ?> &mdash; <?= $pecahAcara['ac4'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam5'] != '' && $pecahAcara['ac5'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam5'] ?> &mdash; <?= $pecahAcara['ac5'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam6'] != '' && $pecahAcara['ac6'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam6'] ?> &mdash; <?= $pecahAcara['ac6'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam7'] != '' && $pecahAcara['ac7'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam7'] ?> &mdash; <?= $pecahAcara['ac7'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam8'] != '' && $pecahAcara['ac8'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam8'] ?> &mdash; <?= $pecahAcara['ac8'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam9'] != '' && $pecahAcara['ac9'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam9'] ?> &mdash; <?= $pecahAcara['ac9'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam10'] != '' && $pecahAcara['ac10'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam10'] ?> &mdash; <?= $pecahAcara['ac10'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam11'] != '' && $pecahAcara['ac11'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam11'] ?> &mdash; <?= $pecahAcara['ac11'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam12'] != '' && $pecahAcara['ac12'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam12'] ?> &mdash; <?= $pecahAcara['ac12'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam13'] != '' && $pecahAcara['ac13'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam13'] ?> &mdash; <?= $pecahAcara['ac13'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam14'] != '' && $pecahAcara['ac14'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam14'] ?> &mdash; <?= $pecahAcara['ac14'] ?></td>
                        </tr>
                      <?php endif ?>
                      <?php if ($pecahAcara['jam15'] != '' && $pecahAcara['ac15'] != '') : ?>
                        <tr>
                          <td><?= $pecahAcara['jam15'] ?> &mdash; <?= $pecahAcara['ac15'] ?></td>
                        </tr>
                      <?php endif ?>
                    <?php endwhile ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6 col-sm-12">
                <h2 style="color: #1b365d;">Streaming TVRI Sumatera Barat </h2>
                <div id="playerElement" style="width:100%; height:400px; padding:0"></div>
                <script type="text/javascript">
                  WowzaPlayer.create('playerElement', {
                    "license": "PLAY1-cNX7a-MhVP9-wnkb7-QmteJ-9NMHV",
                    "title": "Play",
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
            <?php endif ?>


          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Jadwal TV -->

  <!-- Program Slide -->
  <section id="program" style="background-color: <?= $dataWarna['program']['custom_kode'] ?>;" class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-lg-6 text-center heading-section mb-5">
          <h2 class="text-black mb-2">Program Acara</h2>
          <p>TVRI Sumatera Barat</p>
        </div>
      </div>

      <div data-aos="fade-up" data-aos-delay="200">
        <div class="owl-carousel nonloop-block-13">

          <?php while ($pecahProgram = mysql_fetch_assoc($program)) : ?>
            <?php
            if (strtolower($pecahProgram['kat']) == 'entertainment') {
              $warna = '521b6c';
            } elseif (strtolower($pecahProgram['kat']) == 'kid') {
              $warna = 'd2571c';
            } elseif (strtolower($pecahProgram['kat']) == 'news') {
              $warna = '0e55a5';
            } elseif (strtolower($pecahProgram['kat']) == 'culture') {
              $warna = '05683a';
            } elseif (strtolower($pecahProgram['kat']) == 'sport') {
              $warna = '9e0b11';
            } elseif (strtolower($pecahProgram['kat']) == 'life') {
              $warna = '05683a';
            }
            ?>

            <div class="card m-2">
              <a href="<?= _URLWEB . "program/detil/" . $pecahProgram['id_pg'] . '/' . strtolower(str_replace(' ', '-', $pecahProgram['nama'])) . '.html' ?>">
                <img class="card-img-top" src="<?= _URLWEB; ?><?= ($pecahProgram['foto'] != '') ? 'up/program/' . $pecahProgram['foto'] : 'cssMediatama/images/noimage.png' ?>" alt="No Image">
              </a>
              <div class="card-body">
                <h5 class="card-title" style="color: #<?= $warna ?>; font-weight: bold;">
                  <a href="<?= _URLWEB . "program/detil/" . $pecahProgram['id_pg'] . '/' . strtolower(str_replace(' ', '-', $pecahProgram['nama'])) . '.html' ?>">
                    <?= $pecahProgram['nama'] ?>
                  </a>
                </h5>
                <p class="card-text" style="font-size: 15px; color: #<?= $warna ?>; margin-top:5px font-weight: bold;"><?= $pecahProgram['kat'] ?></p>
                <a href="<?= _URLWEB . "program/detil/" . $pecahProgram['id_pg'] . '/' . strtolower(str_replace(' ', '-', $pecahProgram['nama'])) . '.html' ?>" class="btn btn-primary">
                  Selengkapnya</a>
              </div>
            </div>

          <?php endwhile ?>

        </div>
      </div>

    </div>
  </section>
  <!-- Program Slide -->

  <!-- News -->
  <section id="news" style="background-color: <?= $dataWarna['news']['custom_kode'] ?>;" class="bg-white site-section block-13" id="testimonials-section" data-aos="fade">
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
                    <a href="<?php echo _URLWEB . "berita/detil/$rowterkini->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>" class="btn btn-primary">Selengkapnya</a>
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

  <!-- Instagram -->
  <section id="follow" style="background-color: <?= $dataWarna['follow']['custom_kode'] ?>;width: 100%;height: auto; background-repeat: no-repeat; background-size:100% 100%;background-image: url('<?php echo _URLWEB; ?>cssMediatama/images/instagramBg.png');" class="site-section">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-6 text-center heading-section mb-5">
        <h2 class="text-black mb-2">Follow Instagram Kami</h2>
        <p><a href="https://www.instagram.com/tvrisumbar/">@tvrisumbar</a></p>
      </div>
    </div>
    <!-- LightWidget WIDGET -->
    <div class="container">
      <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/f9a1f69d0a195039b5f812ca100e0c31.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    </div>
  </section>
  <!-- Instagram -->

  <!-- Map -->
  <section id="lokasi" style="background-color: <?= $dataWarna['lokasi']['custom_kode'] ?>;" class="site-section">
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
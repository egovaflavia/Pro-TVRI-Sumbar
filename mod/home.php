<?php
// if (!defined('_VALID_ACCESS')) {
//   header("location: index.php");
//   die;
// }

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM " . _TBPROFIL . " ORDER BY id_pf DESC LIMIT 0,1");
var_dump($profil);
// exit;
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

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">

  <!-- Loading -->
  <!-- <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div> -->
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
              <h1 class="mb-0 site-logo"><a href="index.html" class="h2 mb-0 text-white"><img class="img-fluid" style="max-width: 200%;" src="<?php echo _URLWEB; ?>cssMediatama/banner/logo.gif" alt="">
                </a></h1>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
              <nav class="site-navigation position-relative text-right" role="navigation">

                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li><a href="" class="nav-link">Program</a></li>
                  <li><a href="" class="nav-link">Jadwal TV</a></li>
                  <li><a href="" class="nav-link">Kontak Kami</a></li>
                  <li><a href="" class="nav-link"><img style="width: 150px;" src="<?php echo _URLWEB; ?>cssMediatama/banner/live.gif" alt=""></a></li>
                </ul>
              </nav>
            </div>

            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>
    </div>

    <!-- Slider -->
    <section class="site-blocks-cover overflow-hidden bg-light">
      <div class="owl-carousel owl-theme">
        <div class="owl-slide d-flex align-items-center cover" style="background-image: url(cssMediatama/banner/bannerTVRI1.jpg);">
          <div class="container">
            <div class="row justify-content-center justify-content-md-start">
              <div class="col-6 col-md-6 offset-md-6 offset-6 ">
                <div class="owl-slide-text">
                  <div class="card owl-slide-animated owl-slide-cta" style="opacity: 0.7;">
                    <div class="card-body">
                      <h5 class="card-title">Sumatera Barat Hari Ini</h5>
                      <p class="card-text">Setiap Hari, Pukul 16.00 WIB</p>
                      <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
                </div><!-- /owl-slide-text -->
              </div>
            </div>
          </div>
        </div><!-- /slide1 -->
        <div class="owl-slide d-flex align-items-center cover" style="background-image: url(cssMediatama/banner/bannerTVRI2.jpg);">
          <div class="container">
            <div class="row justify-content-center justify-content-md-start">
              <div class="col-6 col-md-6 offset-md-6 offset-6 ">
                <div class="owl-slide-text">
                  <div class="card owl-slide-animated owl-slide-cta" style="opacity: 0.7;">
                    <div class="card-body">
                      <h5 class="card-title">Lensa Olahraga</h5>
                      <p class="card-text">Setiap Minggu, Pukul 08.00 WIB</p>
                      <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
                </div><!-- /owl-slide-text -->
              </div>
            </div>
          </div>
        </div><!-- /slide2 -->

        <!-- two more slides here -->
      </div>
      <!-- other sections here -->
    </section>
    <!-- End Slider -->

    <!-- Jadwal TV -->
    <section class="site-section">
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
              <div class="mb-4 mb-lg-0 col-lg-6 order-lg-2" data-aos="fade-right">
                <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th>Hari ini</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>00.00 &mdash; Lensa Olahraga</td>
                    </tr>
                    <tr>
                      <td>02.00 &mdash; Sumatera Barat Hari Ini</td>
                    </tr>
                    <tr>
                      <td>04.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                    <tr>
                      <td>05.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                    <tr>
                      <td>06.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                    <tr>
                      <td>07.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                    <tr>
                      <td>07.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                    <tr>
                      <td>07.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                    <tr>
                      <td>07.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                    <tr>
                      <td>07.00 &mdash; Lorem ipsum dolor sit amet consec</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-lg-5 mr-auto text-lg-right align-self-center order-lg-1" data-aos="fade-left">
                <h2 class="text-black">Lensa Olahraga <br> <span class="icon-clock-o"></span> 00.00 &mdash; 02.00</h2>
                <img class="img-fluid" style="width: 300px;" src="<?php echo _URLWEB; ?>cssMediatama/images/person_2.jpg" alt="No Image">

                <p class="mb-4">
                  Cerita unik dan menarik yang dikemas dalam cerita komedi romantis yang fresh dan menarik untuk
                  diikuti. Dibintangi oleh artis-artis ternama Indonesia.
                </p>
                <p><a href="#" class="btn btn-primary">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Jadwal TV -->

    <!-- Program Acara -->
    <section class="site-section trainers" id="trainers-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-7 text-center heading-section mb-5">
            <h2 class="mb-2 text-black heading">Program Acara</h2>
            <p>Televisi Nasional, ‎Media Pemersatu Bangsa</p>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="trainer">
              <figure>
                <img src="<?php echo _URLWEB; ?>cssMediatama/images/program1.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="px-md-3">
                <h3>Jessica White</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                  the blind texts.</p>
                <ul class="ul-social-circle">
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="trainer">
              <figure>
                <img src="<?php echo _URLWEB; ?>cssMediatama/images/program2.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="px-md-3">
                <h3>Valerie Elash</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                  the blind texts.</p>
                <ul class="ul-social-circle">
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="trainer">
              <figure>
                <img src="<?php echo _URLWEB; ?>cssMediatama/images/program3.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="px-md-3">
                <h3>Alicia Jones</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                  the blind texts.</p>
                <ul class="ul-social-circle">
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- Program Acara -->

    <!-- Berita -->
    <section class="site-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            <h2 class="text-black mb-2">News</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="d-lg-flex blog-entry">
              <div class="row">
                <div class="col-md-12">
                  <figure class="mr-4">
                    <a href="single.html"><img style="width: 100%; height: 200px;" src="<?php echo _URLWEB; ?>cssMediatama/images/slider1.jpg" alt="Image" class="img-fluid"></a>
                  </figure>
                </div>
                <div class="col-md-12">
                  <div class="blog-entry-text">
                    <h3><a href="single.html">5 Things You Need To Know About Dog Massage</a></h3>
                    <span class="post-meta mb-3 d-block">April 17, 2019</span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                      live
                      the blind texts.</p>
                    <p><a href="#" class="">Read More..</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="d-lg-flex blog-entry">
              <div class="row">
                <div class="col-md-12">
                  <figure class="mr-4">
                    <a href="single.html"><img style="width: 100%; height: 200px;" src="<?php echo _URLWEB; ?>cssMediatama/images/slider2.jpg" alt="Image" class="img-fluid"></a>
                  </figure>
                </div>
                <div class="col-md-12">
                  <div class="blog-entry-text">
                    <h3><a href="single.html">5 Things You Need To Know About Dog Massage</a></h3>
                    <span class="post-meta mb-3 d-block">April 17, 2019</span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                      live
                      the blind texts.</p>
                    <p><a href="#" class="">Read More..</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="d-lg-flex blog-entry">
              <div class="row">
                <div class="col-md-12">
                  <figure class="mr-4">
                    <a href="single.html"><img style="width: 100%; height: 200px;" src="<?php echo _URLWEB; ?>cssMediatama/images/slider3.jpg" alt="Image" class="img-fluid"></a>
                  </figure>
                </div>
                <div class="col-md-12">
                  <div class="blog-entry-text">
                    <h3><a href="single.html">5 Things You Need To Know About Dog Massage</a></h3>
                    <span class="post-meta mb-3 d-block">April 17, 2019</span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                      live
                      the blind texts.</p>
                    <p><a href="#" class="">Read More..</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Berita -->

    <!-- Instagram -->
    <section class="site-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            <h2 class="text-black mb-2">Instagram</h2>
            <p>Berita seputar Sumatera Barat</p>
          </div>
        </div>
        <div class="row">
        </div>
        <div class="row">
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="d-lg-flex blog-entry">
              <div class="row">
                <div class="col-md-12">
                  <figure class="mr-4">
                    <a href="single.html"><img style="width: 100%;height: 200px;" src="<?php echo _URLWEB; ?>cssMediatama/images/slider1.jpg" alt="Image" class="img-fluid"></a>
                  </figure>
                  <div class="col-md-12">
                    <div class="blog-entry-text">
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live
                        the blind texts.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="d-lg-flex blog-entry">
              <div class="row">
                <div class="col-md-12">
                  <figure class="mr-4">
                    <a href="single.html"><img style="width: 100%;height: 200px;" src="<?php echo _URLWEB; ?>cssMediatama/images/slider2.jpg" alt="Image" class="img-fluid"></a>
                  </figure>
                  <div class="col-md-12">
                    <div class="blog-entry-text">
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live
                        the blind texts.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="d-lg-flex blog-entry">
              <div class="row">
                <div class="col-md-12">
                  <figure class="mr-4">
                    <a href="single.html"><img style="width: 100%;height: 200px;" src="<?php echo _URLWEB; ?>cssMediatama/images/slider3.jpg" alt="Image" class="img-fluid"></a>
                  </figure>
                  <div class="col-md-12">
                    <div class="blog-entry-text">
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live
                        the blind texts.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>

        </div>
      </div>
    </section>
    <!-- End Instagram -->

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
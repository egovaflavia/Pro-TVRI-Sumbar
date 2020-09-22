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

		<section class="site-section" id="blog-section">
			<div class="container">
				<div class="row justify-content-center" data-aos="fade-up">
					<div class="col-lg-6 text-center heading-section mb-5">
						<h2 class="text-black mb-2">Program Acara</h2>
						<?php
						if (strtolower($_GET['se']) == 'entertainment') {
							$warna = '521b6c';
						} elseif (strtolower($_GET['se']) == 'kid') {
							$warna = 'd2571c';
						} elseif (strtolower($_GET['se']) == 'news') {
							$warna = '0e55a5';
						} elseif (strtolower($_GET['se']) == 'culture') {
							$warna = '05683a';
						} elseif (strtolower($_GET['se']) == 'sport') {
							$warna = '9e0b11';
						} elseif (strtolower($_GET['se']) == 'life') {
							$warna = '05683a';
						}
						?>
						<p style="font-size: 15px; color: #<?= $warna ?>; font-weight: bold;"><?php echo ($_GET['se']); ?></p>
					</div>
				</div>
				<div class="row">

					<?php
					if (isset($_GET["se"])) $se = $_GET['se'];
					else $se = "";
					if ($se == 'detil') {

						if (isset($_GET['id'])) {
							$id = $_GET['id'];

							$cekid = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBPROGRAM . " WHERE id_pg='$id'");

							if ($cekid->num <= 0) {

								echo "";
							} else {

								$sqldetil = $akdb->dbobject("SELECT * FROM " . _TBPROGRAM . " WHERE id_pg ='$id' ORDER BY id_pg DESC LIMIT 1");
								$lasthit = $sqldetil->hit;
								$newhit = $lasthit + 1;
								$hitdbx = $akdb->dbquery("UPDATE " . _TBPROGRAM . " SET hit='$newhit' WHERE id_pg='$id' LIMIT 1");

								if ($sqldetil->foto <> '') {
									$imgdetil = "<div id=\"foto-detil\" align=\"center\"><img src=\"" . _URLWEB . "up/program/" . $sqldetil->foto . "\" class=\"img-konten\" alt=\"$sqldetil->nama\"></div>";
								} else {
									$imgdetil = "";
								}

								$nama4 = str_replace(" ", "-", $sqldetil->nama);
								$nama41 = str_replace("/", "-", $nama4);
								$nama41 = str_replace("?", "-", $nama41);
					?>

								<!-- box detil -->
								<div id="box-home-b">
									<div class="judul-big-content"><span class="judul-mod bg-blue">Program Detil</span></div>

									<div class="mp-detil"><a href="<?= _URLWEB; ?>"><img src="<?= _URLWEB; ?>img/home-16.png" width="16" height="16" style="float:left;padding-right:10px;"></a> <a href="<?php echo _URLWEB; ?>program">Program Acara</a> > <a href="<?= _URLWEB; ?>program/<?= strtolower($sqldetil->kat); ?>">Program <?= ucwords($sqldetil->kat); ?></a></div>
									<div class="tgl-detil"><img src="<?php echo _URLWEB; ?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 0px;" /><?php echo $sqldetil->jadwal; ?></div>
									<div class="judul-detil"><?= $sqldetil->nama; ?></div>
									<?php if ($sqldetil->video <> '') {
										echo "<div style=\"margin-bottom: 15px;\"><iframe width=\"610\" height=\"480\" src=\"http://www.youtube.com/embed/" . $sqldetil->video . "\" frameborder=\"0\" allowfullscreen=\"false\"></iframe></div>";
									} else {
										echo $imgdetil;
									} ?>
									<div style="float:left;width:75%;">
										<p class="ed-detil">Update : <?php $tanggal->contanggalx(substr($sqldetil->tgl_jam, 8, 2), substr($sqldetil->tgl_jam, 5, 2), substr($sqldetil->tgl_jam, 0, 4)); ?></p>
									</div>
									<div style="float:right; width:25%;" align="right">
										<a href="#" class="increaseFont">A+</a><a href="#" class="resetFont">AA</a><a href="#" class="decreaseFont">A-</a>
									</div>
									<div class="clear">&nbsp;</div>

									<div class="isi-detil"><?php echo $sqldetil->isi; ?></div>

									<div style="float:left; width:50%;">
										<?php
										$bas = 'mod/bas.php';
										if (file_exists($bas)) {
											include_once "$bas";
										} else {
											echo "";
										}
										?>
									</div>
									<div style="float:right; width:50%;" align="right">
										<a class="button" style="margin-top: -5px;" href="<?php echo _URLWEB; ?>program" /><span>Program Lainnya</span></a>
									</div>
									<div class="clear"></div>

								</div>
								<!-- box detil -->

						<?php
							}
						}
					} elseif ($se == 'entertainment' or $se == 'news' or $se == 'culture' or $se == 'life' or $se == 'kid' or $se == 'sport') {

						?>

						<!-- box detil -->
						<?php
						$sqlse = $akdb->dbquery("SELECT * FROM " . _TBPROGRAM . " WHERE kat='" . ucwords($se) . "' ORDER BY id_pg DESC");

						while ($rowse = mysql_fetch_object($sqlse)) {

							$namase4 = str_replace(" ", "-", $rowse->nama);
							$namase41 = str_replace("/", "-", $namase4);
							$namase41 = str_replace("?", "-", $namase41);

							if ($rowse->foto <> '') {
								$imgse = _URLWEB . "up/program/" . $rowse->cfoto;
							} else {
								$imgse = _URLWEB . "img/thumb_no-img-program.jpg";
							}
						?>

							<!-- Awal Perulangan -->
							<div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="">
								<div class="d-lg-flex blog-entry">
									<figure class="mr-4">
										<a href="<?php echo _URLWEB . "program/detil/$rowse->id_pg/" . strtolower(str_replace(" ", "-", $namase41)) . ".html"; ?>	"><img src="<?= $imgse; ?>" alt="Image" class="img-fluid"></a>
									</figure>
									<div class="blog-entry-text">
										<h3><a href="<?php echo _URLWEB . "program/detil/$rowse->id_pg/" . strtolower(str_replace(" ", "-", $namase41)) . ".html"; ?>"><?= substr($rowse->nama, 0, 45); ?></a></h3>
										<span class="post-meta mb-3 d-block"><?= $rowse->jadwal ?></span>
										<p><?= substr($rowse->isi, 0, 70); ?>...</p>

										<p><a href="#" class="">Read More</a></p>
									</div>
								</div>
							</div>
							<!-- Akhir Perulangan -->

						<?php
						}
						?>

				</div>
				<!-- box detil -->

			<?php

					} else

			?>


			</div>
	</div>
	</section>


	<?php
include 'footer.php'
	?>
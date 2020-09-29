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

?>

<?php include 'mod/header.php' ?>


<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">

	<?php include 'mod/menudkk.php' ?>

	<br>

	<!-- News Slide -->
	<section style="background-image: url('<?php echo _URLWEB; ?>cssMediatama/images/frame8.png" class="site-section block-13" id="testimonials-section" data-aos="fade">
		<div class="container">

			<div class="row justify-content-center" data-aos="fade-up">
				<div class="col-lg-6 text-center heading-section mb-5">
					<h2 class="text-black mb-2">NEWS</h2>
					<p>Televisi Nasional, ‎Media Pemersatu Bangsa</p>
				</div>
			</div>
			<div data-aos="fade-up" data-aos-delay="200">

				<?php
				if (isset($_GET["se"])) $se = $_GET['se'];
				else $se = "";
				if ($se == 'detil') {

					if (isset($_GET['id'])) {
						$id = $_GET['id'];

						$cekid = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBBERITA . " WHERE id_br='$id'");

						if ($cekid->num <= 0) {

							echo "";
						} else {

							$sqldetil = $akdb->dbobject("SELECT * FROM " . _TBBERITA . " WHERE id_br ='$id' ORDER BY id_br DESC LIMIT 1");
							$lasthit = $sqldetil->hit;
							$newhit = $lasthit + 1;
							$hitdbx = $akdb->dbquery("UPDATE " . _TBBERITA . " SET hit='$newhit' WHERE id_br='$id' LIMIT 1");

							if ($sqldetil->foto <> '') {
								$imgdetil = "<div id=\"foto-detil\" align=\"center\"><img src=\"" . _URLWEB . "up/berita/" . $sqldetil->foto . "\" class=\"img-fluid\" alt=\"$sqldetil->judul\"></div>";
							} else {
								$imgdetil = "";
							}

							$kanaldetil = $akdb->dbobject("SELECT nama FROM " . _TBKANAL . " WHERE id_kn = '$sqldetil->id_kn' ORDER BY id_kn DESC LIMIT 1");

							$admdetil = $akdb->dbobject("SELECT nama FROM " . _TBADMIN . " WHERE id_ad = '$sqldetil->id_ad' ORDER BY id_ad DESC LIMIT 1");

							$mediadetil = $akdb->dbobject("SELECT nama FROM " . _TBMEDIA . " WHERE id_md = '$sqldetil->id_md' ORDER BY id_md DESC LIMIT 1");

							$wldetil = $akdb->dbobject("SELECT nama FROM " . _TBWILAYAH . " WHERE id_wl = '$sqldetil->id_wl' ORDER BY id_wl DESC LIMIT 1");

							$judul4 = str_replace(" ", "-", $sqldetil->judul);
							$judul41 = str_replace("/", "-", $judul4);
							$judul41 = str_replace("?", "-", $judul41);

				?>

							<div id="">
								<?php
								$mohe = 'mod/mohe.php';
								if (file_exists($mohe)) {
									include_once "$mohe";
								} else {
									echo "";
								}
								?>

								<div class="row">
									<div class="col-md-8">
										<div class="card">
											<div class="card-body">
												<h2 class="text-black mb-2"><?= $sqldetil->judul; ?></h2>
												<p><?= $mediadetil->nama; ?> &bull; <?= $wldetil->nama; ?><img src="<?php echo _URLWEB; ?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 10px;" /><?php $tanggal->contanggalx(substr($sqldetil->tgl_jam, 8, 2), substr($sqldetil->tgl_jam, 5, 2), substr($sqldetil->tgl_jam, 0, 4));
																																																										echo " - " . substr($sqldetil->tgl_jam, 11, 5) . " WIB"; ?>
												</p>
												<?php if ($sqldetil->subjudul <> '') {
													echo "<div class=\"judul-sub\">$sqldetil->subjudul</div>";
												} ?>

												<?= $imgdetil; ?>
												<br>
												<div style="float:left;width:75%;">
													<p class="ed-detil">Reporter : <?= $sqldetil->wartawan; ?> &bull; Editor : <?= $admdetil->nama; ?></p>
												</div>
												<div style="float:right; width:25%;" align="right">
													<a href="" class="increaseFont">A+</a><a href="" class="resetFont">AA</a><a href="" class="decreaseFont">A-</a>
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
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											<div class="card-body">
												<?php
												$moki = 'mod/moki.php';
												if (file_exists($moki)) {
													include_once "$moki";
												} else {
													echo "";
												}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
				<?php
						}
					}
				}
				?>

			</div>
		</div>
		</div>
	</section>
	<!-- Program Slide -->

	<!-- News -->
	<section class="site-section block-13" id="testimonials-section" data-aos="fade">
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
									<img style="height: 12em;" class="card-img-top" src="<?= _URLWEB . 'up/berita/' . $rowterkini->foto ?>" alt="No Image"></a>
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


	<?php
	include 'footer.php'
	?>
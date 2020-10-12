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



	<!-- Hubungi Kami -->
	<section class="site-section block-13 bg-light" data-aos="fade">
		<div class="container">

			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= _URLWEB ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
				</ol>
			</nav>

			<div id="sejarah" class="row justify-content-center" data-aos="fade-up">
				<div class="col-lg-6 text-center heading-section mb-5">
					<h2 class="text-black mb-2">Hubungi Kami</h2>
					<p>TVRI Sumatera Barat</p>
				</div>
			</div>
			<div data-aos="fade-up" data-aos-delay="200">
				<!-- box detil -->
				<div class="row">
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">

									<div class="hubungi">
										<p class=""><b>Alamat Kontak :</b></p>
										<p class="text-black"><?= $profil->alamat; ?></p>
										<p class="text-black">Telp: <?= $profil->telp; ?> - Fax: <?= $profil->fax; ?></p>
										<p class="text-black">Email: <?= $profil->email; ?></p>
									</div>

									<div class="hubungi-peta">

										<div class="judul-mod-content"><span class="judul-mod bg-blue">LOKASI TVRI SUMATERA BARAT</span></div>
										<!-- google maps -->
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3633675107512!2d100.37419841532872!3d-0.8652634993687829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c7172f462755%3A0x3a485651e4ae9c99!2sTVRI%20Sumbar!5e0!3m2!1sid!2sid!4v1591374074745!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

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
					<!-- box detil -->
				</div>
			</div>
	</section>
	<!-- Hubungi Kami -->


	<?php
	include 'footer.php'
	?>
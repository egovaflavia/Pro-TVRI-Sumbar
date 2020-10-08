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

<body>

	<?php include 'mod/menudkk.php' ?>

	<section class="site-section bg-light">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= _URLWEB ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Program Acara</li>
				</ol>
			</nav>
			<div class="row justify-content-center" data-aos="fade-up">
				<div class="col-lg-6 text-center heading-section mb-5">
					<h2 class="text-black mb-2">Program Acara</h2>
					<?php
					if (strtolower($_GET['se']) == 'entertainment') {
						$warna = '521b6c';
						$text = 'Entertainment';
					} elseif (strtolower($_GET['se']) == 'kid') {
						$warna = 'd2571c';
						$text = 'Kid';
					} elseif (strtolower($_GET['se']) == 'news') {
						$warna = '0e55a5';
						$text = 'News';
					} elseif (strtolower($_GET['se']) == 'culture') {
						$warna = '05683a';
						$text = 'Culture';
					} elseif (strtolower($_GET['se']) == 'sport') {
						$warna = '9e0b11';
						$text = 'Sport';
					} elseif (strtolower($_GET['se']) == 'life') {
						$warna = '05683a';
						$text = 'Life';
					} else {
						$text = 'Detail Program Acara';
					}
					?>
					<p style="font-size: 15px; color: #<?= $warna ?>; font-weight: bold;"><?php echo $text ?></p>
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
							echo "Belum di Publikasikan";
						} else {

							$sqldetil = $akdb->dbobject("SELECT * FROM " . _TBPROGRAM . " WHERE id_pg ='$id' ORDER BY id_pg DESC LIMIT 1");
							$lasthit = $sqldetil->hit;
							$newhit = $lasthit + 1;
							$hitdbx = $akdb->dbquery("UPDATE " . _TBPROGRAM . " SET hit='$newhit' WHERE id_pg='$id' LIMIT 1");

							if ($sqldetil->foto <> '') {
								$imgdetil = "<div id=\"foto-detil\" align=\"center\"><img src=\"" . _URLWEB . "up/program/" . $sqldetil->foto . "\" class=\"img-fluid\" alt=\"$sqldetil->nama\"></div>";
							} else {
								$imgdetil = "";
							}

							$nama4 = str_replace(" ", "-", $sqldetil->nama);
							$nama41 = str_replace("/", "-", $nama4);
							$nama41 = str_replace("?", "-", $nama41);
				?>

							<!-- box detil -->
							<div class="row">
								<div class="col-md-8">
									<div class="card">
										<div class="card-body">
											<h2 class="text-black mb-2"><?= $sqldetil->nama; ?></h2>
											<p>
												<?= $sqldetil->jadwal ?>
											</p>
											<?php if ($sqldetil->subjudul <> '') {
												echo "<div class=\"judul-sub\">$sqldetil->subjudul</div>";
											} ?>

											<?= $imgdetil; ?>
											<br>
											<div style="float:left;width:75%;">
												<p class="ed-detil"> </p>
											</div>
											<div style="float:right; width:25%;" align="right">
												<a href="" class="increaseFont">A+</a><a href="" class="resetFont">AA</a><a href="" class="decreaseFont">A-</a>
											</div>
											<div class="clear">&nbsp;</div>

											<div class="isi-detil"><?php echo $sqldetil->isi; ?></div>

											<div class="card" style="float:left; width:50%;">
												<?php
												$bas = 'mod/bas.php';
												if (file_exists($bas)) {
													include_once "$bas";
												} else {
													echo "Belum di Publikasikan";
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
												echo "Belum di Publikasikan";
											}
											?>
										</div>
									</div>
								</div>
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
							<div class="card">
								<div class="card-body">
									<div class="d-lg-flex blog-entry">
										<figure class="mr-4">
											<a href="<?php echo _URLWEB . "program/detil/$rowse->id_pg/" . strtolower(str_replace(" ", "-", $namase41)) . ".html"; ?>"><img src="<?= $imgse; ?>" alt="Image" class="img-fluid"></a>
										</figure>
										<div class="blog-entry-text">
											<h3><a href="<?php echo _URLWEB . "program/detil/$rowse->id_pg/" . strtolower(str_replace(" ", "-", $namase41)) . ".html"; ?>"><?= substr($rowse->nama, 0, 45); ?></a></h3>

											<a href="<?php echo _URLWEB . "program/detil/$rowse->id_pg/" . strtolower(str_replace(" ", "-", $namase41)) . ".html"; ?>">
												<p class="text-black mb-3 d-block"><?= $rowse->jadwal ?></p>
											</a>
											<a href="<?php echo _URLWEB . "program/detil/$rowse->id_pg/" . strtolower(str_replace(" ", "-", $namase41)) . ".html"; ?>">
												<p><?= ($rowse->isi == '') ? 'Data tidak di temukan' : substr($rowse->isi, 0, 50) . '...' ?></p>
											</a>

											<p><a href="<?php echo _URLWEB . "program/detil/$rowse->id_pg/" . strtolower(str_replace(" ", "-", $namase41)) . ".html"; ?>" class="">Read More</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Akhir Perulangan -->

					<?php
					}
					?>

				<?php } ?>
			</div>

		</div>
		</div>
	</section>


	<?php
	include 'footer.php'
	?>
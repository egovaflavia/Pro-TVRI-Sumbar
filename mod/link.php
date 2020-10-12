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

	<!-- Isinya -->
	<section class="site-section bg-light">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= _URLWEB ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Link Lainya</li>
				</ol>
			</nav>

			<div class="row justify-content-center" data-aos="fade-up">

				<div class="col-lg-6 text-center heading-section mb-5">
					<h2 class="text-black mb-2">Link Lainnya</h2>
					<p style="font-size: 15px; color: #1b3699; font-weight: bold;">TVRI Sumatera Barat</p>
				</div>
			</div>
			<div class="row">
				<div class="row">
					<div class="col-md-8">
						<?php
						$adjacents = 2;
						$query = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBLINK . "");
						$total_pages = $query->num;
						$targetpage = "" . _URLWEB . "link";
						$limit = 12;
						if (isset($_GET["page"])) $page = $_GET["page"];
						else $page = "";
						if ($page)
							$start = ($page - 1) * $limit;
						else
							$start = 0;
						/* Get data. */
						$sql = $akdb->dbquery("SELECT urlweb,nama FROM " . _TBLINK . " ORDER BY id_lk ASC LIMIT $start, $limit");
						//panggil pagination
						require_once "inc/pagination.php";
						?>
						<table class="table table-bordered">
							<?php
							while ($rowqb = mysql_fetch_object($sql)) {

							?>
								<tr>
									<th>
										<a href="<?php echo $rowqb->urlweb; ?>" target="_blank"><?php echo $rowqb->nama; ?></a>
									</th>
									<td>
										<a href="<?php echo $rowqb->urlweb; ?>" target="_blank"><?php echo $rowqb->urlweb; ?></a>
									</td>
								</tr>
							<?php
							}
							?>
						</table>
						<?php
						echo "<div class=\"jarak\"></div>";
						echo "<div align=\"center\">$pagination</div>";
						echo "<div class=\"jarak\"></div>";
						?>
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
			</div>
		</div>
	</section>
	<!-- Isinya -->

	<?php
	include 'footer.php'
	?>
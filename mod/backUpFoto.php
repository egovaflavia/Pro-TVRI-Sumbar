<?php if (!defined('_VALID_ACCESS')) {
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

<!-- begin main area -->
<div id="mainarea" align="center">

	<div id="mainareacontent">

		<div class="jarak">&nbsp;</div>

		<div id="main-a">

			<?php
			$moki = 'mod/moki.php';
			if (file_exists($moki)) {
				include_once "$moki";
			} else {
				echo "";
			}
			?>

		</div>
		<div id="main-b">

			<!-- box detil -->
			<?php
			if (isset($_GET["se"])) $se = $_GET['se'];
			else $se = "";
			if ($se == 'detil') {
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					echo "<div id=\"box-home-b\">";
					echo "<div class=\"judul-big-content\"><span class=\"judul-mod bg-blue\">Foto Detil</span></div>";

					$sqldetilfoto = $akdb->dbobject("SELECT * FROM " . _TBFOTO . " WHERE id_ft ='$id' ORDER BY id_ft DESC LIMIT 1");
					$lasthit = $sqldetilfoto->hit;
					$newhit = $lasthit + 1;
					$hitdbx = $akdb->dbquery("UPDATE " . _TBFOTO . " SET hit='$newhit' WHERE id_ft='$id' LIMIT 1");

					if ($sqldetilfoto->foto <> '') {
						$imgdetil = "<div id=\"foto-detil\" align=\"center\"><img src=\"" . _URLWEB . "up/foto/" . $sqldetilfoto->foto . "\" class=\"img-konten\" alt=\"$sqldetilfoto->judul\"></div>";
					} else {
						$imgdetil = "";
					}

			?>
					<div class="mp-detil"><a href="<?= _URLWEB; ?>"><img src="<?= _URLWEB; ?>img/home-16.png" width="16" height="16" style="float:left;padding-right:10px;"></a> <a href="<?= _URLWEB; ?>foto">Galeri Foto</a> > <a href="<?= _URLWEB; ?>foto"><?= ucwords($sqldetilfoto->kat); ?></a></div>
					<div class="tgl-detil"><img src="<?php echo _URLWEB; ?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 0px;" /><?php $tanggal->contanggal(substr($sqldetilfoto->tgl_jam, 8, 2), substr($sqldetilfoto->tgl_jam, 5, 2), substr($sqldetilfoto->tgl_jam, 0, 4)); ?></div>
					<div class="judul-detil"><?= $sqldetilfoto->judul; ?></div>

					<?= $imgdetil; ?>

					<div style="float:left;width:75%;">
						<p class="ed-detil">Oleh : <?= $sqldetilfoto->oleh; ?></p>
					</div>
					<div style="float:right; width:25%;" align="right">
						<a href="#" class="increaseFont">A+</a><a href="#" class="resetFont">AA</a><a href="#" class="decreaseFont">A-</a>
					</div>
					<div class="clear">&nbsp;</div>

					<div class="isi-detil"><?php echo nl2br($sqldetilfoto->info); ?></div>

					<div style="margin-top: 30px;">
						<div style="float:left; width:50%; text-align:left;">
							<?php
							//foto sebelumnya
							$sqlbdsblm = $akdb->dbobject("select id_ft,judul from " . _TBFOTO . " where foto != '' and id_ft < '$sqldetilfoto->id_ft' order by id_ft desc limit 1");
							if (isset($sqlbdsblm->id_ft)) $seb = $sqlbdsblm->id_ft;
							else $seb = "";
							if ($seb <> '') {

								$judul1 = str_replace(" ", "-", $sqlbdsblm->judul);
								$judul11 = str_replace("/", "-", $judul1);
								$judul11 = str_replace("?", "-", $judul11);
								echo "<a href=\"" . _URLWEB . "foto/detil/$sqlbdsblm->id_ft/" . strtolower(str_replace(" ", "-", $judul11)) . ".html\"><< sebelumnya</a>";
							}
							?>
						</div>
						<div style="float:right; width:50%; text-align:right;">
							<?php
							//foto sesudahnya
							$sqlbdsdh = $akdb->dbobject("select id_ft,judul from " . _TBFOTO . " where foto != '' and id_ft > '$sqldetilfoto->id_ft' order by id_ft asc limit 1");
							if (isset($sqlbdsdh->id_ft)) $ses = $sqlbdsdh->id_ft;
							else $ses = "";
							if ($ses <> '') {
								$judul2 = str_replace(" ", "-", $sqlbdsdh->judul);
								$judul21 = str_replace("/", "-", $judul2);
								$judul21 = str_replace("?", "-", $judul21);
								echo "<a href=\"" . _URLWEB . "foto/detil/$sqlbdsdh->id_ft/" . strtolower(str_replace(" ", "-", $judul21)) . ".html\">sesudahnya >></a>";
							} ?>
						</div>
						<div class="clear"></div>
					</div>

					<div class="jarak"></div>

					<div style="float:left; width: 50%;" align="left">
						<?php
						$bas = 'mod/bas.php';
						if (file_exists($bas)) {
							include_once "$bas";
						} else {
							echo "";
						}
						?>
					</div>
					<div style="float: right; width: 50%" align="right">
						<a class="button" href="<?= _URLWEB; ?>foto" /><span>Ke Galeri Foto</span></a>&nbsp;&nbsp;
						<a class="button" href="<?= _URLWEB; ?>" /><span>Ke Beranda</span></a>
					</div>
					<div class="clear"></div>

			<?php
					echo "</div>";
				}
			} else {
				echo "<div id=\"box-home-b\" style=\"height:1180px;\">";
				echo "<div class=\"judul-big-content\"><span class=\"judul-mod bg-blue\">Galeri Foto</span></div>";
				$adjacents = 2;
				$query = $akdb->dbobject("SELECT COUNT(*) AS num FROM " . _TBFOTO . " WHERE foto != ''");
				$total_pages = $query->num;
				$targetpage = "" . _URLWEB . "foto";
				$limit = 15;
				if (isset($_GET["page"])) $page = $_GET["page"];
				else $page = "";
				if ($page)
					$start = ($page - 1) * $limit;
				else
					$start = 0;
				/* Get data. */
				$sql = $akdb->dbquery("SELECT * FROM " . _TBFOTO . " WHERE foto != '' ORDER BY id_ft DESC LIMIT $start, $limit");
				//panggil pagination
				require_once "inc/pagination.php";

				echo "<center><div id=\"dboxfoto\">";

				echo "<ul id=\"boxfoto\">";

				while ($rowqb = mysql_fetch_object($sql)) {

					$judul4 = str_replace(" ", "-", $rowqb->judul);
					$judul41 = str_replace("/", "-", $judul4);
					$judul41 = str_replace("?", "-", $judul41);

					echo "<li><div class=\"isi-li-box-foto\"><center>";
					echo "<a href=\"" . _URLWEB . "foto/detil/$rowqb->id_ft/" . strtolower(str_replace(" ", "-", $judul41)) . ".html\"><img src=" . _URLWEB . "up/foto/" . $rowqb->cfoto . " width=\"140\" height=\"140\" alt=\"\" class=img-foto-kat style=\"cursor: pointer;\" /></a><br>";
					echo substr($rowqb->judul, 0, 50) . "..<br>";
					echo "</center></div></li>";
				}

				echo "</ul>";
				echo "</div></center>";

				echo "<br /><div align=\"center\">$pagination</div>";
				echo "<div align=\"right\"><a href=\"" . _URLWEB . "\" class=\"button\"><span>Ke Beranda</span></a></div>";
				echo "</div>";
			}
			?>

			<!-- box detil -->

		</div>
		<div class="clear"></div>

	</div>
</div>
<!-- end main area -->

<?php
$bawah = 'mod/footer.php';
if (file_exists($bawah)) {
	include_once "$bawah";
} else {
	echo "<center><div style=\"background-color: #eaeaea; margin-top: 80px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 14px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal mengakses modul <b>FOOTER</b></div></center>";
	die;
}
?>
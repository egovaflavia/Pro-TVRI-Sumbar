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
							$imgdetil = "<div id=\"foto-detil\" align=\"center\"><img src=\"" . _URLWEB . "up/berita/" . $sqldetil->foto . "\" class=\"img-konten\" alt=\"$sqldetil->judul\"></div>";
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

						<!-- box detil -->
						<div id="box-home-b">
							<div class="judul-big-content"><span class="judul-mod bg-blue">Berita Detil</span></div>

							<?php
							$mohe = 'mod/mohe.php';
							if (file_exists($mohe)) {
								include_once "$mohe";
							} else {
								echo "";
							}
							?>

							<div class="mp-detil"><a href="<?= _URLWEB; ?>"><img src="<?= _URLWEB; ?>img/home-16.png" width="16" height="16" style="float:left;padding-right:10px;"></a> <a href="<?= _URLWEB; ?>berita">Berita</a> > <a href="<?= _URLWEB; ?>berita"><?= ucwords($kanaldetil->nama); ?></a></div>
							<div class="tgl-detil"><?= $mediadetil->nama; ?> &bull; <?= $wldetil->nama; ?><img src="<?php echo _URLWEB; ?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 10px;" /><?php $tanggal->contanggalx(substr($sqldetil->tgl_jam, 8, 2), substr($sqldetil->tgl_jam, 5, 2), substr($sqldetil->tgl_jam, 0, 4));
																																																										echo " - " . substr($sqldetil->tgl_jam, 11, 5) . " WIB"; ?></div>
							<div class="judul-detil"><?= $sqldetil->judul; ?></div>
							<?php if ($sqldetil->subjudul <> '') {
								echo "<div class=\"judul-sub\">$sqldetil->subjudul</div>";
							} ?>

							<?= $imgdetil; ?>

							<div style="float:left;width:75%;">
								<p class="ed-detil">Reporter : <?= $sqldetil->wartawan; ?> &bull; Editor : <?= $admdetil->nama; ?></p>
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
								<a class="btn" href="<?php echo _URLWEB; ?>berita" />Berita Lainnya</a>
							</div>
							<div class="clear"></div>

						</div>
						<!-- box detil -->

						<?php
						$hatsqldetil = $akdb->dbobject("SELECT COUNT(*) AS hbeda FROM " . _TBBERITA . " WHERE tag LIKE '%$sqldetil->tag%' AND id_br <> '$sqldetil->id_br'");
						if ($hatsqldetil->hbeda >= 1) {
							$tsqldetil = $akdb->dbquery("SELECT * FROM " . _TBBERITA . " WHERE tag LIKE '%$sqldetil->tag%' AND id_br <> '$sqldetil->id_br' ORDER BY id_br DESC LIMIT 0,6");

						?>
							<div class="jarak">&nbsp;</div>

							<div id="box-home-b">
								<div class="judul-mod-content"><span class="judul-mod bg-blue">Berita Terkait</span></div>
								<div id="box-ko-sub">
									<ul>

										<?php

										while ($rowt = mysql_fetch_object($tsqldetil)) {

											$judult = str_replace(" ", "-", $rowt->judul);
											$judult1 = str_replace("/", "-", $judult);
											$judult1 = str_replace("?", "-", $judult1);

											if ($rowt->foto <> '') {
												$imgt = _URLWEB . "up/berita/thumb_" . $rowt->foto;
											} else {
												$imgt = _URLWEB . "img/thumb_no-img-berita-pps.jpg";
											}

										?>


											<li>
												<div class="kot-sub"><img src="<?= $imgt; ?>" width="192" height="120">
													<p style="padding: 0px 8px 8px 8px;" align="center"><a href="<?php echo _URLWEB . "berita/detil/$rowt->id_br/" . strtolower(str_replace(" ", "-", $judult1)) . ".html"; ?>"><?= substr($rowt->judul, 0, 45); ?>..</a></p>
												</div>
											</li>

										<?php
										}

										?>
									</ul>
								</div>
							</div>
						<?php

						}
						?>

						<?php if ($sqldetil->komentar == 1) { ?>

							<div class="jarak">&nbsp;</div>

							<!-- begin box komentar -->
							<div id="box-home-b">
								<div class="judul-mod-content"><span class="judul-mod bg-blue">Komentar Anda</span></div>
								<div class="fb-comments" data-href="<? $urlu = new urlku; echo $urlu->curPageURL(); ?>" data-width="610" data-num-posts="10"></div>
							</div>
							<!-- end box komentar -->

						<?php } else {
							echo "";
						} ?>

				<?php
					}
				}
			} elseif ($se == 'cari') {
				?>
				<!-- box detil -->
				<div id="box-home-b">
					<div class="judul-big-content"><span class="judul-mod bg-blue">Cari Berita</span></div>

					<?php
					$mohe = 'mod/mohe.php';
					if (file_exists($mohe)) {
						include_once "$mohe";
					} else {
						echo "";
					}
					?>

					<?php
					if (isset($_POST['cari']) or isset($_GET['cari'])) {
						if (isset($_POST['cari'])) {
							$katacari = $_POST['cari'];
						}
						if (isset($_GET['cari'])) {
							$katacari = $_GET['cari'];
						}
						if ($katacari == '' or $katacari == 'cari berita...') {
					?>

							<?php
							echo "<div>";
							echo "<p style=\"margin-bottom: 20px; padding-top: 10px; color: #bababa; font-weight: bold; font-size: 18px;\"><img src=\"" . _URLWEB . "img/warning.png\" width=\"16\" height=\"16\" border=\"0\" alt=\"\" align=\"absmiddle\" style=\"padding-top:2px;\"/>&nbsp;Masukkan kata pencarian terkait judul atau isi !!</p>";
							?>
							<div style="margin-bottom: 30px;">
								<div class="box-search">
									<form method="post" id="search" action="<?php echo _URLWEB; ?>berita/cari">
										<input type="text" class="search" value="cari berita..." onblur="if(this.value == '') { this.value = 'cari berita...'; }" onfocus="if(this.value == 'cari berita...') { this.value = ''; }" name="cari">
										<button type="submit">Cari</button>
									</form>
								</div>
							</div>
						<?php
							echo "</div>";
						} else {
							if ($katacari == 'maaf') {
								echo "<script type=\"text/javascript\">
		<!--
   		alert(\"Anda mendapatkan beribu maaf dari kami, maafkan kami juga ya :)\");
		//-->
		</script>";
							}

						?>

							<?php
							$adjacents = 2;
							$query = $akdb->dbobject("SELECT COUNT(*) as num from " . _TBBERITA . " WHERE (judul like '%$katacari%' or ringkasan like '%$katacari%' or isi like '%$katacari%')");
							$total_pages = $query->num;
							$targetpage = "" . _URLWEB . "berita/cari/" . strtolower($katacari) . "";
							$limit = 5;
							if (isset($_GET["page"])) $page = $_GET["page"];
							else $page = "";
							if ($page)
								$start = ($page - 1) * $limit;
							else
								$start = 0;
							echo "<p style=\"margin-bottom: 20px; padding-top: 10px; color: #bababa; font-size: 18px;\"><img src=\"" . _URLWEB . "img/ceklist.png\" width=\"16\" height=\"16\" border=\"0\" alt=\"\" align=\"absmiddle\" style=\"padding-top:2px;\"/>&nbsp;Ditemukan <b>$total_pages</b> berita dengan kata cari <font style='background-color:yellow'><b>$katacari</b></font> :</p>";
							/* Get data. */
							$sql = $akdb->dbquery("SELECT * FROM " . _TBBERITA . " WHERE (judul like '%$katacari%' or ringkasan like '%$katacari%' or isi like '%$katacari%') ORDER BY tgl_jam DESC LIMIT $start, $limit");
							//panggil pagination
							require_once "inc/pagination.php";
							while ($rowqb = mysql_fetch_object($sql)) {

								$judul4 = str_replace(" ", "-", $rowqb->judul);
								$judul41 = str_replace("/", "-", $judul4);
								$judul41 = str_replace("?", "-", $judul41);

								$kanalqb = $akdb->dbobject("SELECT nama FROM " . _TBKANAL . " WHERE id_kn = '$rowqb->id_kn' ORDER BY id_kn DESC LIMIT 1");

								if ($rowqb->foto <> '') {
									$imgqb = _URLWEB . "up/berita/" . $rowqb->cfoto;
								} else {
									$imgqb = _URLWEB . "img/thumb_no-img-berita-bs.jpg";
								}

							?>

								<div class="berita-home">
									<div class="berita-home-a">
										<a href="<?php echo _URLWEB . "berita/detil/$rowqb->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>"><img src="<?= $imgqb; ?>" width="140" height="140" alt="" border="0" /></a>
									</div>
									<div class="berita-home-b">
										<p class="tgl-berita-home"><a href="<?php echo _URLWEB; ?>berita"><b><?= $kanalqb->nama; ?></b></a><img src="<?php echo _URLWEB; ?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 10px;" /><?php $tanggal->contanggalx(substr($rowqb->tgl_jam, 8, 2), substr($rowqb->tgl_jam, 5, 2), substr($rowqb->tgl_jam, 0, 4));
																																																																		echo " " . substr($rowqb->tgl_jam, 11, 5) . " WIB"; ?></p>
										<p class="judul-berita-home"><a href="<?php echo _URLWEB . "berita/detil/$rowqb->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>"><?= $rowqb->judul; ?></a></p>
										<p class="konten-berita-home"><?= $rowqb->ringkasan; ?></p>
									</div>
									<div class="clear"></div>
								</div>

						<?php

							}
							echo "<div class=\"jarak3\"></div>";
							echo "<div align=\"center\">$pagination</div>";
							echo "<div class=\"jarak\"></div>";
						}
					} else {

						echo "<p style=\"margin-bottom: 20px; padding-top: 10px; color: #bababa; font-weight: bold; font-size: 18px;\"><img src=\"" . _URLWEB . "img/warning.png\" width=\"16\" height=\"16\" border=\"0\" alt=\"\" align=\"absmiddle\" style=\"padding-top:2px;\"/>&nbsp;Masukkan kata pencarian terkait judul atau isi !!</p>";
						?>
						<div style="margin-bottom: 30px;">
							<div class="box-search">
								<form method="post" id="search" action="<?php echo _URLWEB; ?>berita/cari">
									<input type="text" class="search" value="cari berita..." onblur="if(this.value == '') { this.value = 'cari berita...'; }" onfocus="if(this.value == 'cari berita...') { this.value = ''; }" name="cari">
									<button type="submit">Cari</button>
								</form>
							</div>
						</div>
					<?php

					}
					?>
					<div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>

				</div>
				<!-- box detil -->

			<?php
			} else {

			?>

				<!-- box detil -->
				<div id="box-home-b">
					<div class="judul-big-content"><span class="judul-mod bg-blue">Berita</span></div>

					<?php
					$mohe = 'mod/mohe.php';
					if (file_exists($mohe)) {
						include_once "$mohe";
					} else {
						echo "";
					}
					?>

					<?php
					$adjacents = 2;
					$query = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBBERITA . "");
					$total_pages = $query->num;
					$targetpage = "" . _URLWEB . "berita";
					$limit = 10;
					if (isset($_GET["page"])) $page = $_GET["page"];
					else $page = "";
					if ($page)
						$start = ($page - 1) * $limit;
					else
						$start = 0;
					/* Get data. */
					$sql = $akdb->dbquery("SELECT * FROM " . _TBBERITA . " ORDER BY tgl_jam DESC LIMIT $start, $limit");
					//panggil pagination
					require_once "inc/pagination.php";
					while ($rowqb = mysql_fetch_object($sql)) {

						$judul4 = str_replace(" ", "-", $rowqb->judul);
						$judul41 = str_replace("/", "-", $judul4);
						$judul41 = str_replace("?", "-", $judul41);

						$kanalqb = $akdb->dbobject("SELECT nama FROM " . _TBKANAL . " WHERE id_kn = '$rowqb->id_kn' ORDER BY id_kn DESC LIMIT 1");

						if ($rowqb->foto <> '') {
							$imgqb = _URLWEB . "up/berita/" . $rowqb->cfoto;
						} else {
							$imgqb = _URLWEB . "img/thumb_no-img-berita-bs.jpg";
						}

					?>

						<div class="berita-home">
							<div class="berita-home-a">
								<a href="<?php echo _URLWEB . "berita/detil/$rowqb->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>"><img src="<?= $imgqb; ?>" width="140" height="140" alt="" border="0" /></a>
							</div>
							<div class="berita-home-b">
								<p class="tgl-berita-home"><a href="<?php echo _URLWEB; ?>berita"><b><?= $kanalqb->nama; ?></b></a><img src="<?php echo _URLWEB; ?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 10px;" /><?php $tanggal->contanggalx(substr($rowqb->tgl_jam, 8, 2), substr($rowqb->tgl_jam, 5, 2), substr($rowqb->tgl_jam, 0, 4));
																																																																echo " " . substr($rowqb->tgl_jam, 11, 5) . " WIB"; ?></p>
								<p class="judul-berita-home"><a href="<?php echo _URLWEB . "berita/detil/$rowqb->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>"><?= $rowqb->judul; ?></a></p>
								<p class="konten-berita-home"><?= $rowqb->ringkasan; ?></p>
							</div>
							<div class="clear"></div>
						</div>

					<?php

					}
					echo "<div class=\"jarak3\"></div>";
					echo "<div align=\"center\">$pagination</div>";
					echo "<div class=\"jarak\"></div>";
					?>
					<div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>

				</div>
				<!-- box detil -->

			<?php
			}
			?>

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
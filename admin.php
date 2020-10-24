<?php
//admin.php
define('_VALID_ACCESS',	true);
require_once "inc/app.config.php";
require_once "inc/app.core.php";
require_once "mod/mod.visit.php";
if ($_SERVER['QUERY_STRING']) {
	$admin = "login";
	if (isset($_GET['admin'])) {
		$atgl = date("Y-m-d");

		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$qadmin = $akdb->dbobject("SELECT COUNT(*) as talog FROM " . _TBLOG . " WHERE ip='" . _SETIP . "' AND tgl_jam like'" . date("Y-m-d") . "%' AND no='0'");

		if ($qadmin->talog <= 100) {
			$admin = $_GET['admin'];
			if (file_exists("admin/" . $admin . ".php")) {
				include("admin/" . $admin . ".php");
			} else {
				$upadmin = strtoupper($admin);
				echo "<center><div style=\"background-color: #dadada; margin-top: 180px; color:#515151; 
		width: 340px; font-family: Verdana, Arial, Helvetica, sans-serif; text-shadow: 1px 1px #fff; 
		border-bottom: 8px solid #919191; font-size: 12px; padding: 20px;\">Sistem Gagal mengakses modul <b>" . $upadmin . "</b>
		<br><br>Silahkan coba lagi dilain waktu, dan<br><b>Terima kasih untuk akses anda.</b><p>&nbsp;</p>
		<p align=\"center\"><a href=\"javascript:history.back();\">
		<img src=\"" . _URLWEB . "img/tb_kembali.png\" width=\"71\" height=\"19\" alt=\"[ Kembali ]\" border=\"0\"></a></p>
		</div></center>";
			}
		} else {
			header("Location:index.php");
		}
	}
} else
	header("Location:admin.php?admin=login");
die;

<?php
//file utama index.php
define('_VALID_ACCESS',	true);
require_once "inc/app.config.php";
require_once "inc/app.core.php";
// ini_set('display_errors', '0');
// error_reportineg(E_ALL);
$link = mysql_connect(_DBSERVER, _DBUSER, _DBPASS);
if (mysql_errno() == 1040 or mysql_errno() == 1203 or mysql_errno() == 2003) {
	// 1203 == ER_TOO_MANY_USER_CONNECTIONS (mysqld_error.h)
	header("Location: " . _URLWEB . "error.php");
	exit;
}
require_once "mod/mod.visit.php";
if ($_SERVER['QUERY_STRING']) {
	$mod = "home";
	if (isset($_GET['mod'])) {
		$mod = $_GET['mod'];
		if (file_exists("mod/$mod.php")) {
			include("mod/$mod.php");
		} else {
			include("mod/404.php");
		}
	}
} else {
	if (file_exists("mod/home.php")) {
		include_once("mod/home.php");
	} else {
		echo "<center><div style=\"background-color: #dadada; margin-top: 180px; color:#515151; 
		width: 340px; font-family: Verdana, Arial, Helvetica, sans-serif; text-shadow: 1px 1px #fff; 
		border-bottom: 8px solid #919191; font-size: 12px; padding: 20px;\">Sistem gagal mengakses modul <b>HOME</b>
		<br><br>Silahkan coba lagi dilain waktu, dan<br><b>Terima kasih untuk akses anda.</b><p>&nbsp;</p>
		<p align=\"center\"><a href=\"javascript:history.back();\">
		<img src=\"" . _URLWEB . "img/tb_kembali.png\" width=\"71\" height=\"19\" alt=\"[ Kembali ]\" border=\"0\"></a></p>
		</div></center>";
	}
}

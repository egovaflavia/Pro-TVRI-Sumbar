<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; } 

session_start();
if ((ISSET($_SESSION['uname'])) AND ($_SESSION['typea']) AND ($_SESSION['pword']) AND ($_SESSION['id_ada']))
{
$ida = $_SESSION['id_ada'];
$typeuser = base64_decode($_SESSION['typea']);
$loginname = $_SESSION['uname'];

if(isset($_GET['mod'])) { $menu = $_GET['mod']; } else { $menu = "home"; }

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$sqlaccount = $akdb->dbobject("SELECT * FROM "._TBADMIN." WHERE id_ad = '".$ida."' AND type = '".base64_encode($typeuser)."' ORDER BY id_ad DESC LIMIT 0,1");

$adnama = $sqlaccount->nama;

switch (base64_decode($sqlaccount->type)) {
 case "operator" :
 $jnama = "Operator";
 break;
 case "admin" :
 $jnama = "Administrator";
 break;
}

$atas = 'admin/header.php';
if (file_exists($atas)) {
    include_once "$atas";
} else {
	echo "<center><div style=\"background-color: #eaeaea; margin-top: 80px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 12px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal mengakses modul <b>HEADER</b><p align=\"center\">
		<a style=\"text-decoration:none;\" href=\"admin/logout.php\">[ LOGOUT ]</a></p></div></center>";
	die;
}

if (isset($_GET['mod'])) {
	$mod=$_GET['mod'];
	if (file_exists("admin/$mod.php")) {
		include("admin/$mod.php");
	} 
	else {
	echo "<center><div style=\"background-color: #eaeaea; margin-top: 200px; margin-bottom: 200px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 12px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal Mengakses Modul <b>".strtoupper($mod)."</b>
		<p>&nbsp;</p><p align=\"center\"><a href=\"javascript:history.back();\">
		<img src=\""._URLWEB."img/tb_kembali.png\" width=\"71\" height=\"19\" alt=\"[ Kembali ]\" border=\"0\"></a>
		</p></div></center>";
	} 
} 
else {
	if (file_exists("admin/home.php")) {
		include_once("admin/home.php");
	} 
	else {
		echo "<center><div style=\"background-color: #eaeaea; margin-top: 200px; margin-bottom: 200px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 12px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal Mengakses Modul <b>HOME</b>
		<p>&nbsp;</p><p align=\"center\"><a href=\"javascript:history.back();\">
		<img src=\""._URLWEB."img/tb_kembali.png\" width=\"71\" height=\"19\" alt=\"[ Kembali ]\" border=\"0\"></a></p>
		</div></center>";
	} 
}

$bawah = 'admin/footer.php';
if (file_exists($bawah)) {
    include_once "$bawah";
} else {
	echo "<center><div style=\"background-color: #eaeaea; margin-top: 80px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 12px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal mengakses modul <b>FOOTER</b><p align=\"center\">
		<a style=\"text-decoration:none;\" href=\"admin/logout.php\">[ LOGOUT ]</a></p></div></center>";
	die;
}
}
else
header("location:admin.php?admin=login&x=");
die;
?>
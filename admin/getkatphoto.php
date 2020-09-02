<?php
define('_VALID_ACCESS',	true);
include_once"../inc/app.config.php"; include_once"../inc/app.core.php";

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$q = strtolower($_GET["q"]);
if (!$q) return;

$query = $akdb->dbquery("SELECT DISTINCT kat AS kat_name FROM "._TBFOTO." WHERE kat LIKE '%$q%'");

while($rs = mysql_fetch_object($query)) {
	$katname = ucwords($rs->kat_name);
	echo "$katname\n";
}
?>
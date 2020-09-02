<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; } 

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");

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
$moki = 'mod/mokis.php';
if (file_exists($moki)) {
    include_once "$moki";
} else {
  echo "";
}
?>

</div>
<div id="main-b">

<!-- box detil -->
<div id="box-home-b">
<div class="judul-big-content"><span class="judul-mod bg-blue">Informasi</span></div>

<?php
$mohe = 'mod/mohe.php';
if (file_exists($mohe)) {
    include_once "$mohe";
} else {
  echo "";
}
?>

<!-- box detil informasi -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1></h1>
	<img src="http://tvrisumbar.co.id/img/informasi/info.jpg" height="100%" width="100%;">
</style>

</html>
</div>
<html>
        &ensp;
        <figcaption></figcaption>
        <figcaption></figcaption>
        <a href="http://tvrisumbar.co.id/img/informasi/info.jpg" target="_blank"><b> * Klik disini untuk memperbesar gambar </b></a>

</html>

</div>


<!-- box detil informasi -->

</div>
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
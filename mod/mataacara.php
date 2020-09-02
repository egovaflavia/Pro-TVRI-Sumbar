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
$cekma = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBMATACARA." WHERE foto!=''");

if($cekma->num <= 0) {

?>

<!-- box detil -->
<div id="box-home-b">
<div class="judul-big-content"><span class="judul-mod bg-blue">Mata Acara</span></div>

<p class="no-data">data ini belum tersedia...</p>

<div align="right"><a href="<?=_URLWEB;?>" class="button"><span>Ke Beranda</span></a></div>
</div>
<!-- box detil -->

<?php
} else {

$sqlma = $akdb->dbobject("SELECT * FROM "._TBMATACARA." WHERE foto!='' ORDER BY id_ma DESC LIMIT 0,1");
$lasthit = $sqlma->hit;
$newhit = $lasthit+1;
$hitdbx = $akdb->dbquery("UPDATE "._TBMATACARA." SET hit='$newhit' WHERE id_ma='$sqlma->id_ma' LIMIT 1");
?>

<!-- box detil -->
<div id="box-home-b">
<div class="judul-big-content"><span class="judul-mod bg-blue">Mata Acara <?=$sqlma->tahun;?></span></div>

<?php
    if($sqlma->foto <> '') {
        echo "<div class=\"foto-konten\" align=\"center\">";
        echo "<img src=\""._URLWEB."up/matacara/".$sqlma->foto."\" class=\"img-konten\" alt=\"\"/>";
        echo "</div>";
    }
?>

<div align="right"><a href="<?=_URLWEB;?>" class="button"><span>Ke Beranda</span></a></div>
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
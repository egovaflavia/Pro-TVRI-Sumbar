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

<!-- box detil -->
<div id="box-home-b">
<div class="judul-big-content"><span class="judul-mod bg-blue">Link</span></div>

<?php
		$adjacents = 2;
		$query = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBLINK."");
		$total_pages = $query->num;
		$targetpage = ""._URLWEB."link"; 	
		$limit = 12; 								
		if (isset($_GET["page"])) $page = $_GET["page"]; else $page = "";
		if($page) 
			$start = ($page - 1) * $limit; 
		else
			$start = 0;
		/* Get data. */
		$sql = $akdb->dbquery("SELECT urlweb,nama FROM "._TBLINK." ORDER BY id_lk ASC LIMIT $start, $limit");
		//panggil pagination
		require_once "inc/pagination.php";
		while($rowqb=mysql_fetch_object($sql)) {
		
        ?>

        <div class="box-link">
        	<div class="box-link-nama"><a href="<?php echo $rowqb->urlweb;?>" target="_blank"><?php echo $rowqb->nama;?></a></div>
        	<div class="box-link-urlweb"><?php echo strtolower($rowqb->urlweb);?></div>
        </div>

		<?php

		}
		echo "<div class=\"jarak\"></div>";
		echo "<div align=\"center\">$pagination</div>";
		echo "<div class=\"jarak\"></div>";
?>
<div align="right"><a href="<?=_URLWEB;?>" class="button"><span>Ke Beranda</span></a></div>
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
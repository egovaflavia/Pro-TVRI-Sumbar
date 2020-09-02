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
<div class="judul-big-content"><span class="judul-mod bg-blue">Hubungi Kami</span></div>

<div class="hubungi">
<p class="hubungi-nama"><?=$profil->nama;?></p>
<div id="isi-konten"><?=$profil->info;?></div>
<p class="hubungi-teks"><b>Alamat Kontak :</b></p>
<p class="hubungi-teks"><?=$profil->alamat;?></p>
<p class="hubungi-teks">Telp: <?=$profil->telp;?> - Fax: <?=$profil->fax;?></p>
<p class="hubungi-teks">Email: <?=$profil->email;?></p>
</div>

<div id="dboxsm">
<div class="dboxsm-a">
<div class="dms">Media Sosial :</div>
</div>
<div class="dboxsm-b">
<ul id="boxsm">
<li><a href="<?=$profil->linkfb;?>" target="_blank"><img src="<?=_URLWEB;?>img/icon-fb.png" width="32" height="32"></a></li>
<li><a href="<?=$profil->linktw;?>" target="_blank"><img src="<?=_URLWEB;?>img/icon-tw.png" width="32" height="32"></a></li>
<li><a href="<?=$profil->linkyt;?>" target="_blank"><img src="<?=_URLWEB;?>img/icon-yt.png" width="32" height="32"></a></li>
<li><a href="<?=$profil->linkgp;?>" target="_blank"><img src="<?=_URLWEB;?>img/icon-twit.png" width="32" height="32"></a></li>
</ul>
</div>
<div class="clear">&nbsp;</div>
</div>

<div class="hubungi-peta">

<!-- google maps -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3633675107512!2d100.37419841532872!3d-0.8652634993687829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c7172f462755%3A0x3a485651e4ae9c99!2sTVRI%20Sumbar!5e0!3m2!1sid!2sid!4v1591374074745!5m2!1sid!2sid" width="550" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>

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
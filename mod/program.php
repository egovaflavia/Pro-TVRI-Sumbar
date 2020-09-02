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
if (isset($_GET["se"])) $se = $_GET['se']; else $se = "";
if($se == 'detil') {

 if(ISSET($_GET['id'])) {
 $id = $_GET['id'];

 $cekid = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBPROGRAM." WHERE id_pg='$id'");

 if($cekid->num <= 0) {

 echo "";

 } else {

  $sqldetil = $akdb->dbobject("SELECT * FROM "._TBPROGRAM." WHERE id_pg ='$id' ORDER BY id_pg DESC LIMIT 1");
  $lasthit = $sqldetil->hit;
  $newhit = $lasthit+1;
  $hitdbx = $akdb->dbquery("UPDATE "._TBPROGRAM." SET hit='$newhit' WHERE id_pg='$id' LIMIT 1");

  if($sqldetil->foto <> '') { $imgdetil = "<div id=\"foto-detil\" align=\"center\"><img src=\""._URLWEB."up/program/".$sqldetil->foto."\" class=\"img-konten\" alt=\"$sqldetil->nama\"></div>"; } else { $imgdetil = ""; }

  $nama4 = str_replace(" ","-",$sqldetil->nama);
  $nama41 = str_replace("/","-",$nama4);
  $nama41 = str_replace("?","-",$nama41);
?>

<!-- box detil -->
<div id="box-home-b">
<div class="judul-big-content"><span class="judul-mod bg-blue">Program Detil</span></div>

<div class="mp-detil"><a href="<?=_URLWEB;?>"><img src="<?=_URLWEB;?>img/home-16.png" width="16" height="16" style="float:left;padding-right:10px;"></a> <a href="<?php echo _URLWEB;?>program">Program Acara</a> > <a href="<?=_URLWEB;?>program/<?=strtolower($sqldetil->kat);?>">Program <?=ucwords($sqldetil->kat);?></a></div>
<div class="tgl-detil"><img src="<?php echo _URLWEB;?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 0px;" /><?php echo $sqldetil->jadwal;?></div>
<div class="judul-detil"><?=$sqldetil->nama;?></div>
<?php if($sqldetil->video <> '') { echo "<div style=\"margin-bottom: 15px;\"><iframe width=\"610\" height=\"480\" src=\"http://www.youtube.com/embed/".$sqldetil->video."\" frameborder=\"0\" allowfullscreen=\"false\"></iframe></div>"; } else { echo $imgdetil; } ?>
<div style="float:left;width:75%;">
<p class="ed-detil">Update : <?php $tanggal->contanggalx(substr($sqldetil->tgl_jam,8,2),substr($sqldetil->tgl_jam,5,2),substr($sqldetil->tgl_jam,0,4)); ?></p>
</div>
<div style="float:right; width:25%;" align="right">
<a href="#" class="increaseFont">A+</a><a href="#" class="resetFont">AA</a><a href="#" class="decreaseFont">A-</a>
</div>
<div class="clear">&nbsp;</div>

<div class="isi-detil"><?php echo $sqldetil->isi;?></div>

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
<a class="button" style="margin-top: -5px;" href="<?php echo _URLWEB;?>program"/><span>Program Lainnya</span></a>
</div>
<div class="clear"></div>

</div>
<!-- box detil -->

<?php
}

}

}

elseif($se == 'entertainment' OR $se == 'news' OR $se == 'culture' OR $se == 'life' OR $se == 'kid' OR $se == 'sport') {

?>

<!-- box detil -->
<div id="box-home-b" style="height:1120px;">
<div class="judul-big-content"><span class="judul-mod bg-blue">Kategori <?=ucwords($se);?></span></div>

<?php
		$sqlse = $akdb->dbquery("SELECT * FROM "._TBPROGRAM." WHERE kat='".ucwords($se)."' ORDER BY id_pg DESC");
		
		echo "<div id=\"box-ko-sub-px\">";
        echo "<ul>";

		while($rowse=mysql_fetch_object($sqlse)) {
		
		  $namase4 = str_replace(" ","-",$rowse->nama);
          $namase41 = str_replace("/","-",$namase4);
          $namase41 = str_replace("?","-",$namase41);

          if($rowse->foto <> '') { $imgse = _URLWEB."up/program/".$rowse->cfoto; } else { $imgse = _URLWEB."img/thumb_no-img-program.jpg"; }
        
        ?>

        <li><div class="kot-sub-px"><a href="<?php echo _URLWEB."program/detil/$rowse->id_pg/".strtolower(str_replace(" ","-",$namase41)).".html";?>"><img src="<?=$imgse;?>" width="192" height="192"></a><p style="padding: 0px 8px 8px 8px;" class="judul-program-home" align="center"><a href="<?php echo _URLWEB."program/detil/$rowse->id_pg/".strtolower(str_replace(" ","-",$namase41)).".html";?>"><?=substr($rowse->nama,0,45);?></a></p></div></li>

        <?php

		}
		echo "</ul>";
        echo "</div>";
		
		echo "<div class=\"jarak\"></div>";
?>

<div align="right"><a href="<?=_URLWEB;?>program" class="button"><span>Ke Program Lainnya</span></a>&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>" class="button"><span>Ke Beranda</span></a></div>
</div>
<!-- box detil -->

<?php

}

else {

?>

<!-- box detil -->
<div id="box-home-b" style="height:1350px;">
<div class="judul-big-content"><span class="judul-mod bg-blue">Program Acara</span></div>

<?php
		$adjacents = 2;
		$query = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBPROGRAM."");
		$total_pages = $query->num;
		$targetpage = ""._URLWEB."program"; 	
		$limit = 12; 								
		if (isset($_GET["page"])) $page = $_GET["page"]; else $page = "";
		if($page) 
			$start = ($page - 1) * $limit; 
		else
			$start = 0;
		/* Get data. */
		$sql = $akdb->dbquery("SELECT * FROM "._TBPROGRAM." ORDER BY id_pg DESC LIMIT $start, $limit");
		//panggil pagination
		require_once "inc/pagination.php";
		
		echo "<div id=\"box-ko-sub-p\">";
        echo "<ul>";

		while($rowqb=mysql_fetch_object($sql)) {
		
		  $nama4 = str_replace(" ","-",$rowqb->nama);
          $nama41 = str_replace("/","-",$nama4);
          $nama41 = str_replace("?","-",$nama41);

          if($rowqb->foto <> '') { $imgqb = _URLWEB."up/program/".$rowqb->cfoto; } else { $imgqb = _URLWEB."img/thumb_no-img-program.jpg"; }
        
        ?>

        <li><div class="kot-sub-p"><p style="padding: 8px 8px 0px 8px; font-size:12px; font-weight:bold;"><a href="<?php echo _URLWEB."program/".strtolower($rowqb->kat);?>">Program <?=ucwords($rowqb->kat);?> &raquo;</a></p><a href="<?php echo _URLWEB."program/detil/$rowqb->id_pg/".strtolower(str_replace(" ","-",$nama41)).".html";?>"><img src="<?=$imgqb;?>" width="192" height="192"></a><p style="padding: 0px 8px 8px 8px;" class="judul-program-home" align="center"><a href="<?php echo _URLWEB."program/detil/$rowqb->id_pg/".strtolower(str_replace(" ","-",$nama41)).".html";?>"><?=substr($rowqb->nama,0,45);?></a></p></div></li>

        <?php

		}
		echo "</ul>";
        echo "</div>";
		echo "<div class=\"jarak3\"></div>";
		echo "<div align=\"center\">$pagination</div>";
		echo "<div class=\"jarak\"></div>";
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
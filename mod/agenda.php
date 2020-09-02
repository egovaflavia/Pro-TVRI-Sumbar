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
<div class="judul-big-content"><span class="judul-mod bg-blue">Informasi</span></div>

<?php
if(isset($_GET['se'])) { 
if(($_POST['abulan'] <> '') and ($_POST['atahun'] <> '')) {
$bulanagenda = $_POST['abulan']; $tahunagenda = $_POST['atahun'];
}} else { $bulanagenda = date("m"); $tahunagenda = date("Y"); }

echo "<div id=\"top-detil\"><img src=\""._URLWEB."img/folder.png\" width=\"16\" height=\"16\" border=\"0\" alt=\"\" align=\"absmiddle\" style=\"padding-top:2px;\"/> Informasi : "; $tanggal->pilbulan($bulanagenda); echo "&nbsp;".$tahunagenda."</div>";
echo "<div>";

$hsqlagenda = $akdb->dbobject("select count(*) as totagenda from "._TBAGENDA." where date_format(tgl,'%Y-%m')='$tahunagenda-$bulanagenda'");

if($hsqlagenda->totagenda >=1) {

$sqlkagenda = $akdb->dbquery("select distinct(tgl) from "._TBAGENDA." where date_format(tgl,'%Y-%m')='$tahunagenda-$bulanagenda' order by tgl asc");

while($rowska=mysql_fetch_object($sqlkagenda)) {

echo "<div id=\"detil-agenda-a\">";
echo "<p class=\"judul-agenda-a\"><img src=\""._URLWEB."img/icon-agenda.png\" width=\"16\" height=\"16\" border=\"0\" alt=\"\" style=\"padding:0px 4px 0px 0px;\"/> "; $tanggal->contanggal(substr($rowska->tgl,8,2),substr($rowska->tgl,5,2),substr($rowska->tgl,0,4)); echo"</p>";

$sqlkagendas = $akdb->dbquery("select * from "._TBAGENDA." where tgl='$rowska->tgl' order by id_ag asc");

while($rowskas=mysql_fetch_object($sqlkagendas)) {

echo "<div style=\"margin-bottom:12px; padding-bottom: 5px; border-bottom: 1px dotted #eaeaea;\">";
echo "<div style=\"padding-left: 24px;\">";

if($rowskas->cfoto <> '') {
echo "<div style=\"float:left; width: 17%;\">";
echo"<img src="._URLWEB."up/agenda/".$rowskas->cfoto." width=\"80\" height=\"80\" alt=\"$rowskas->nama\" style=\"border:2px solid #dadada; padding:1px; background-color: #fafafa; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; cursor: pointer;\" title=\"klik untuk memperbesar foto\" id=\"".$rowskas->id_ag."\" onclick=\"enlarge(this);\" longdesc=\""._URLWEB."up/agenda/$rowskas->foto\" />";
echo "</div>";
echo "<div style=\"float:right; width: 83%;\">";
echo "<p style=\"font-weight: bold;font-size: 18px; color:#004B8F;\">".$rowskas->nama."</p>";
echo "<div style=\"float: left; width: 15%; font-size: 12px; color: #616161;\">Tempat</div><div style=\"float: right; width: 85%; font-size: 12px; color: #616161;\">:&nbsp;".$rowskas->tempat."</div><div class=\"clear\"></div>";
if($rowskas->ket <> '') {
echo "<div style=\"float: left; width: 15%; font-size: 12px; color: #616161;\">Keterangan</div><div style=\"float: right; width: 85%; font-size: 12px; color: #616161;\">:&nbsp;".$rowskas->ket."</div><div class=\"clear\"></div>";
}
echo "</div><div class=\"clear\"></div>";
} else {
echo "<p style=\"font-weight: bold;font-size: 18px; color:#004B8F;\">".$rowskas->nama."</p>";
echo "<div style=\"float: left; width: 15%; font-size: 12px; color: #616161;\">Tempat</div><div style=\"float: right; width: 85%; font-size: 12px; color: #616161;\">:&nbsp;".$rowskas->tempat."</div><div class=\"clear\"></div>";
if($rowskas->ket <> '') {
echo "<div style=\"float: left; width: 15%; font-size: 12px; color: #616161;\">Keterangan</div><div style=\"float: right; width: 85%; font-size: 12px; color: #616161;\">:&nbsp;".$rowskas->ket."</div><div class=\"clear\"></div>";
}	
}

echo "</div>";
echo "</div>";
}

echo "</div>";
}
echo "<div style=\"margin-top:10px; border-top: 2px solid #FFD65F; padding-bottom: 2px; font-size: 10px; color: #515151\">* Informasi ini sewaktu-waktu dapat berubah jika terdapat hal-hal yang dipandang perlu.<br>* Klik foto Informasi untuk memperbesar ukuran foto.<br>* Untuk Informasi lebih lanjut Melalui Email : humas@tvrisumbar.co.id.</div>";
}
else {
echo "<div align=center style=padding:50px 0px 50px 0px;><p class=\"tgl-agenda-home\">Belum Ada / Belum di Publikasikan !!</p>";
echo"<p style=\"font-size:11px; color:#919191; margin-top: 7px;\">Untuk Sementara Waktu, Informasi Pada "; $tanggal->pilbulan($bulanagenda); echo" $tahunagenda Belum Ada atau Belum di Publikasikan. Terima Kasih.</p></div>"; 
}
echo "<div style=\"margin-top:30px; border-top: 2px solid #cacaca; border-bottom: 1px solid #cacaca; background-color: #eaeaea; padding: 3px; color:#515151; font-weight: bold; font-size: 12px;\" align=\"center\">";
echo "<div style=\"float:left; width: 45%; margin-top: 1px; padding-top: 3px;\" align=right>";
echo "Lihat Agenda&nbsp;&nbsp;&nbsp;"; $bulankini = date("m"); $tahunkini = date("Y");
echo" </div><div style=\"float:right; width: 55%; margin-top: 1px;\" align=left>";
?>
<form name="formagenda" method="post" action="<?php echo _URLWEB;?>agenda/jadwal">
	<select name="abulan">
		<option value="01" <?php if ($bulankini=="01") { echo"selected=selected"; } ?>>Januari</option>
		<option value="02" <?php if ($bulankini=="02") { echo"selected=selected"; } ?>>Februari</option>
		<option value="03" <?php if ($bulankini=="03") { echo"selected=selected"; } ?>>Maret</option>
		<option value="04" <?php if ($bulankini=="04") { echo"selected=selected"; } ?>>April</option>
                <option value="05" <?php if ($bulankini=="05") { echo"selected=selected"; } ?>>Mei</option>
		<option value="06" <?php if ($bulankini=="06") { echo"selected=selected"; } ?>>Juni</option>
		<option value="07" <?php if ($bulankini=="07") { echo"selected=selected"; } ?>>Juli</option>
		<option value="08" <?php if ($bulankini=="08") { echo"selected=selected"; } ?>>Agustus</option>
                <option value="09" <?php if ($bulankini=="09") { echo"selected=selected"; } ?>>September</option>
		<option value="10" <?php if ($bulankini=="10") { echo"selected=selected"; } ?>>Oktober</option>
		<option value="11" <?php if ($bulankini=="11") { echo"selected=selected"; } ?>>November</option>
		<option value="12" <?php if ($bulankini=="12") { echo"selected=selected"; } ?>>Desember</option>
	</select>
<?php
$sqlthnag=$akdb->dbquery("select distinct date_format(tgl,'%Y') as thnag from "._TBAGENDA." order by tgl asc");
?>
<select name="atahun">
<?php while($rowthnag=mysql_fetch_object($sqlthnag)) { ?>
<option value="<?=$rowthnag->thnag;?>" <?php if ($tahunkini==$rowthnag->thnag) { echo"selected=selected"; } ?>><?=$rowthnag->thnag;?></option>
<? } ?>				
</select>
&nbsp;<input name="submit" type="submit" value=" Lihat">
</form>
<?php
echo "</div><div class=\"clear\"></div>";
echo "</div>";
echo"<br /><br />";
echo "<div align=\"right\"><a href=\""._URLWEB."\" class=\"button\"><span>Ke Beranda</span></a></div>";
echo "</div>";
?>

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
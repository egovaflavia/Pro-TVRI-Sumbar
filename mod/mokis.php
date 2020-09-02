<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; }  ?>

<!-- box home acara -->
<div id="box-home-a">
<div class="judul-mod-content"><span class="judul-mod bg-blue">TINJAUAN ACARA</span></div>
<p class="tgl-acara"><? $tanggal = new tanggal; $tanggal->tanggalkini(); ?></p>

<?php
$tgkini = date("Y-m-d");

$cekac = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBACARA." WHERE tgl='".$tgkini."'");

if($cekac->num <= 0) { 

  echo "<p align=\"center\" style=\"padding:20px 0px 20px 0px; color: #aaa; font-size:11px;\">Rangkaian acara pada hari "; $tanggal = new tanggal; $tanggal->tanggalkini(); echo" belum dipublikasikan...</p>";

} else {

$sqlac = $akdb->dbobject("SELECT * FROM "._TBACARA." WHERE tgl='".$tgkini."' ORDER BY id_ac DESC LIMIT 0,1");

echo "<table class=\"table-acara\">";
echo "<tbody>";
echo "<tr>";
echo "<td width=\"20%\">".$sqlac->jam1."</td>";
echo "<td width=\"80%\">".$sqlac->ac1."</td>";
echo "</tr>";
if($sqlac->jam2 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam2."</td>";
echo "<td>".$sqlac->ac2."</td>";
echo "</tr>";
}
if($sqlac->jam3 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam3."</td>";
echo "<td>".$sqlac->ac3."</td>";
echo "</tr>";
}
if($sqlac->jam4 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam4."</td>";
echo "<td>".$sqlac->ac4."</td>";
echo "</tr>";
}
if($sqlac->jam5 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam5."</td>";
echo "<td>".$sqlac->ac5."</td>";
echo "</tr>";
}
if($sqlac->jam6 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam6."</td>";
echo "<td>".$sqlac->ac6."</td>";
echo "</tr>";
}
if($sqlac->jam7 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam7."</td>";
echo "<td>".$sqlac->ac7."</td>";
echo "</tr>";
}
if($sqlac->jam8 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam8."</td>";
echo "<td>".$sqlac->ac8."</td>";
echo "</tr>";
}
if($sqlac->jam9 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam9."</td>";
echo "<td>".$sqlac->ac9."</td>";
echo "</tr>";
}
if($sqlac->jam10 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam10."</td>";
echo "<td>".$sqlac->ac10."</td>";
echo "</tr>";
}
if($sqlac->jam11 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam11."</td>";
echo "<td>".$sqlac->ac11."</td>";
echo "</tr>";
}
if($sqlac->jam12 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam12."</td>";
echo "<td>".$sqlac->ac12."</td>";
echo "</tr>";
}
if($sqlac->jam13 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam13."</td>";
echo "<td>".$sqlac->ac13."</td>";
echo "</tr>";
}
if($sqlac->jam14 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam14."</td>";
echo "<td>".$sqlac->ac14."</td>";
echo "</tr>";
}
if($sqlac->jam15 <> '') {
echo "<tr>";
echo "<td>".$sqlac->jam15."</td>";
echo "<td>".$sqlac->ac15."</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";


}
?>

</div>
<!-- box home acara -->

<div class="jarak">&nbsp;</div>



<!-- box home gempa -->
<div id="box-home-a"><div class="judul-mod-content"><span class="judul-mod bg-blue">INFO COVID-19</span></div>
<div class=""><span class=""></span></div>
<?php include_once"bmkg/covid.php"; ?>
</div>
<div class="jarak">&nbsp;</div
</div>


<!-- box home gempa -->
<div id="box-home-a">
<div class=""><span class=""></span></div>
<?php include_once"bmkg/pu.php"; ?>
</div>
<div class="jarak">&nbsp;</div
</div>


<!-- box home gempa -->

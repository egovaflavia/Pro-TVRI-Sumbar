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
<div class="judul-big-content"><span class="judul-mod bg-blue">Live Streaming</span></div>

<?php
$mohe = 'mod/mohe.php';
if (file_exists($mohe)) {
    include_once "$mohe";
} else {
  echo "";
}
?>

<!-- box detil live streaming -->

<script type='text/javascript' src='https://jwplayer.indostreamserver.com/jwplayer.js'></script>
<script type='text/javascript'>jwplayer.key='4vA+d23J1OvUQaEnWIYaBosKKUebYLJix2Bk1w==';</script>

<div id="MediaPlayer">Loading Player...</div>

<script type="text/javascript">
  jwplayer('MediaPlayer').setup({
   sources: [{
         file: "rtmps://5bb648ab35ae7.streamlock.net/tvrisumbar/live"
      },{
         file: "https://5bb648ab35ae7.streamlock.net/tvrisumbar/live/playlist.m3u8"
      }],
   rtmp: {
      bufferlength: 0,
   },
   primary: 'flash',
   autostart: 'true',
   image: 'https://indostreamserver.com/images/online-streaming.jpg',
   width: '100%',
   aspectratio: '16:9',
   androidhls: 'true'
 });
</script>


                                               


<!-- box detil live streaming -->

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
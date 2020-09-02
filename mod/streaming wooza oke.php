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

<!doctype html>
 <html lang="en">
  <head>
   <meta charset="UTF-8">
   <title> LIVE STREAMING TVRI SUMATERA BARAT </title>

   <style>
    * {margin:0; padding:0;}
    #main {width:1024px; margin:0 auto; padding-top:1px; position:relative;} 
    body {font-family:"tahoma"; font-size:10pt; text-decoration:none; background:#ffffff}
   </style>

   <script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>

  </head>

  <body>
    <div id="main">
        <div id="playerElement" style="width:610px; height:488px; padding:0"></div>
    </div>

    <script type="text/javascript">
    WowzaPlayer.create('playerElement',
        {
        "license":"PLAY1-cNX7a-MhVP9-wnkb7-QmteJ-9NMHV",
        "title":"",
        "description":"",
        "sourceURL":"http://wowza58.indostreamserver.com:1935/tvrisumbar/live/playlist.m3u8",
        "autoPlay":true,
        "volume":"75",
        "mute":false,
        "loop":false,
        "audioOnly":false,
        "uiShowQuickRewind":true,
        "posterFrameURL":"http://tvrisumbar.co.id/img/online-streaming.jpg",
        "endPosterFrameURL":"http://tvrisumbar.co.id/img/online-streaming.jpg",
        "uiPosterFrameFillMode":"fill",
        "uiQuickRewindSeconds":"30"
        }
    );
    </script>

  </body>
</html>


</div>


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
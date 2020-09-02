<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; } 

if (isset($_GET["id"])) $idh = $_GET['id']; else $idh = "";
if (isset($_GET["se"])) $seh = $_GET['se']; else $seh = "";
if (isset($_GET["mod"])) $moh = $_GET['mod']; else $moh = "";

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if($profil->gv <> '') { echo "<meta name=\"google-site-verification\" content=\"$profil->gv\" />"; } ?>
<meta http-equiv="Content-language" content="id" />
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<meta name="keywords" content="<?=$profil->appk;?>">
<?php if($profil->mv <> '') { echo "<meta name=\"msvalidate.01\" content=\"$profil->mv\" />"; } ?>
<meta name="copyright" content="<?=$profil->nama;?>" />
<meta name="language" content="Indonesian" />
<meta name="distribution" content="Global" />
<meta name="rating" content="General" />
<meta name="robots" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<meta name="revisit-after" content="1 days" />
<meta name="expires" content="never" />
<meta name="dc.title" content="<?=$profil->appt;?>" />
<meta name="dc.creator.e-mail" content="<?=$profil->email;?>" />
<meta name="dc.creator.name" content="<?=$profil->singkatan;?>" />
<meta name="dc.creator.website" content="<?=$profil->weburl;?>" />
<meta name="tgn.name" content="<?=$profil->nama;?>" />
<meta name="tgn.nation" content="Indonesia" />
<?php if($profil->fbid <> '') { echo "<meta property=\"fb:app_id\" content=\"$profil->fbid\" />"; } ?>

  <?php
    if($moh <> '' && $seh == 'detil' && $idh <> '') {
    if ($moh == 'berita') {
    $mosql = $akdb->dbobject("SELECT judul,wartawan,ringkasan FROM "._TBBERITA." where id_br = '$idh' limit 1");
    echo "<meta name=\"description\" content=\"".$mosql->ringkasan."\">";
    echo "<meta name=\"author\" content=\"".$mosql->wartawan."\">";
    echo "<title>".$mosql->judul." - Berita ".$profil->appt."</title>";
    }
    elseif ($moh == 'program') {
    $mosql = $akdb->dbobject("SELECT nama,id_ad,jadwal FROM "._TBPROGRAM." where id_pg = '$idh' limit 1");
    $moadm = $akdb->dbobject("SELECT nama FROM "._TBADMIN." WHERE id_ad=$mosql->id_ad ORDER BY id_ad DESC LIMIT 0,1");
    echo "<meta name=\"description\" content=\"".$mosql->nama." ".$mosql->jadwal."\">";
    echo "<meta name=\"author\" content=\"".$moadm->nama."\">";
    echo "<title>".$mosql->nama." - Program Acara ".$profil->appt."</title>";
    }
    elseif ($moh == 'foto') {
    $mosql = $akdb->dbobject("SELECT judul,oleh,info FROM "._TBFOTO." where id_ft = '$idh' limit 1");
    echo "<meta name=\"description\" content=\"".$mosql->info."\">";
    echo "<meta name=\"author\" content=\"".$mosql->oleh."\">";
    echo "<title>".$mosql->judul." - Foto ".$profil->appt."</title>";
    }
    }
    else {
    echo "<meta name=\"description\" content=\"".$profil->appd."\">";
    echo "<meta name=\"author\" content=\"".$profil->singkatan."\">";
    echo "<title>".$profil->appt."</title>";
    }
  ?>

<link rel="stylesheet" type="text/css" href="<?php echo _URLWEB;?>css/style-tvri.css" />
<link rel="icon" href="<?php echo _URLWEB;?>img/favicon.ico" type="image/x-icon" />

<script language=JavaScript>
function DateHour(){
  if (!document.all&&!document.getElementById)
    return;
  thelement=document.getElementById? document.getElementById("datehour"): document.all.datehour;
  var date = new Date();
  var hour=date.getHours();
  var minute=date.getMinutes();
  var seconds=date.getSeconds();
  if (minute<10)
    minute="0"+minute;
  if (seconds<10)
    seconds="0"+seconds;
  var TT="<? $tanggal = new tanggal; $tanggal->tanggalkini(); echo" - Jam "; ?>"+ " "+hour+":"+minute+":"+seconds+" WIB";
  thelement.innerHTML=""+TT+"";
  setTimeout("DateHour()",1000);
}

window.onload=DateHour
</script>

<?php if($moh=="hubungi") { ?>
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script>
    function initialize() {
      var mapCanvas = document.getElementById('map-canvas');
      var mapOptions = {
      center: new google.maps.LatLng(<?=$profil->peta_lat;?>, <?=$profil->peta_lng;?>),
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
  </script>
<?php } ?>

<!--[if lt IE 7]>
<script type="text/javascript" src="<?=_URLWEB;?>js/ie-png.js"></script>
<script type="text/javascript" src="<?=_URLWEB;?>js/supersleight-min.js"></script>
<![endif]-->
<!--[if lt IE 7]>
 <style type="text/css">
 img { behavior: url(<?=_URLWEB;?>css/iepngfix.htc) }
 </style>
<![endif]-->
<!-- PNG FIX for IE6 -->
<!--[if lte IE 6]>
<script type="text/javascript" src="<?=_URLWEB;?>js/supersleight-min.js"></script>
<![endif]-->

<?php if($profil->warna <> '') { ?>
<style type="text/css">
  body { background-color: <?=$profil->warna;?>; }
</style>
<?php } ?>



<!-- edited by prihandono from here-->

<link rel="stylesheet" href="//releases.flowplayer.org/6.0.5/skin/functional.css">

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//releases.flowplayer.org/6.0.5/flowplayer.min.js"></script>
<style>
  .flowplayer {
    background: black;
    margin-bottom: 20px;
  }

  .flowplayer.is-error .fp-message p {
    font-size: 200%;
    font-weight: bold;
    color: #f00;
  }
  </style>

<!-- edited by prihandono to here-->




</head>

<body>
<?php
if($moh == 'berita' && $seh == 'detil') {
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>
<!-- begin top bar -->
<div id="webbar" align="center">
<div id="barcontent">

<div id="webbar-a" align="left">
<div class="tanggal"><img src="<?php echo _URLWEB;?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding-right:5px;" /> <span id="datehour"></span></div>
</div>
<div id="webbar-b">

<div id="menubar">
  <ul>
    <li><a href="<?=_URLWEB;?>saran">Kritik &amp; Saran</a></li>
    <li><a href="<?=_URLWEB;?>hubungi">Hubungi Kami</a></li>                
  </ul>
</div>

</div>
<div class="clear"></div>

</div>
</div>
<!-- end top bar -->

<!-- begin header -->
<div id="header" align="center">
<div id="headercontent">

<div id="header-a">

  <div class="weblogo">
    <a href="<?php echo _URLWEB;?>"><?php if($profil->logo <> '') { echo "<img src=\""._URLWEB."up/web/".$profil->logo."\" width=\"430\" height=\"70\" alt=\"\" border=\"0\" />"; } else { echo "<img src=\""._URLWEB."img/web-logo.png\" width=\"430\" height=\"70\" alt=\"\" border=\"0\" />"; } ?></a>
  </div>

</div>
<div id="header-b">

<div id="header-ba">
  <a href="<?php echo _URLWEB;?>streaming"><img src="<?php echo _URLWEB;?>img/bt_ls.png" width="153" height="40" alt="" border="0" /></a>
</div>
<div id="header-bb">

<!-- begin web search -->
  <div class="box-search">
    <form method="post" id="search" action="<?php echo _URLWEB;?>berita/cari">
      <input type="text" class="search" value="cari berita..." onblur="if(this.value == '') { this.value = 'cari berita...'; }" onfocus="if(this.value == 'cari berita...') { this.value = ''; }" name="cari">
      <button type="submit">Cari</button>
    </form>
  </div>
  <!-- end web search -->

</div>
<div class="clear"></div>

</div>
<div class="clear"></div>

</div>

<!-- begin menu header -->
<div id="menuheader" class="box-shadow">

<div id="navheader">

      <ul id="menu" class="clearfix">
         <li><a href="<?php echo _URLWEB;?>"><img src="<?php echo _URLWEB;?>img/home.png" alt="" border="0" width="16" height="16" style="margin:4px 0px -2px 0px;" /></a></li>
         <li><a href="#">Profil</a>
            <ul>
               <li><a href="<?php echo _URLWEB;?>profil/sejarah">Sejarah TVRI Sumbar</a></li>
               <li><a href="<?php echo _URLWEB;?>profil/visimisi">Visi, Misi &amp; Slogan</a></li>         
               <li><a href="<?php echo _URLWEB;?>profil/organisasi">Struktur Organisasi</a></li>
               <li><a href="<?php echo _URLWEB;?>profil/sdm">Sumber Daya Manusia</a></li>
            </ul>
         </li>
         <li><a href="<?php echo _URLWEB;?>mataacara">Mata Acara</a></li>
         <li><a href="<?php echo _URLWEB;?>program">Program Acara</a>
            <ul>
               <li><a href="<?php echo _URLWEB;?>program/entertainment">Kategori Entertainment</a></li>
               <li><a href="<?php echo _URLWEB;?>program/news">Kategori News</a></li>
               <li><a href="<?php echo _URLWEB;?>program/culture">Kategori Culture</a></li>
               <li><a href="<?php echo _URLWEB;?>program/life">Kategori Life</a></li>  
               <li><a href="<?php echo _URLWEB;?>program/kid">Kategori Kid</a></li>
               <li><a href="<?php echo _URLWEB;?>program/sport">Kategori Sport</a></li>
            </ul>
         </li>   
         <li><a href="<?php echo _URLWEB;?>rate/program">Rate Card</a></li>
         <li><a href="<?php echo _URLWEB;?>informasi">Informasi</a></li>
         <li><a href="<?php echo _URLWEB;?>berita">Berita</a></li>
         <li><a href="<?php echo _URLWEB;?>foto">Galeri</a></li>
      </ul>

</div>

</div>
<!-- end menu header -->

</div>
<!-- end header -->
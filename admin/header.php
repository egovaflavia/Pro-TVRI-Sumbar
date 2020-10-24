<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; } 

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");

if (isset($_GET['mod'])) {
	$mod=$_GET['mod'];
} else { $mod=""; }

if (isset($_GET['act'])) {
  $act=$_GET['act'];
} else { $act=""; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title><?=_ADMINNAME;?> <?=$profil->singkatan;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="icon" type="image/x-icon" href="<?=_URLWEB;?>img/favicon.ico" />   
<link href="<?=_URLWEB;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?=_URLWEB;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="<?=_URLWEB;?>css/font-awesome.css" rel="stylesheet">
<link href="<?=_URLWEB;?>css/style.css" rel="stylesheet">
<link href="<?=_URLWEB;?>css/pages/dashboard.css" rel="stylesheet">
<link href="<?=_URLWEB;?>css/jquery.tagsinput.css" rel="stylesheet">
<link href="<?=_URLWEB;?>css/datepicker.css" rel="stylesheet" />
<link href="<?=_URLWEB;?>css/bootstrap-colorpicker.min.css" rel="stylesheet" />

<script src="<?=_URLWEB;?>js/jquery-1.7.2.min.js"></script> 
<script src="<?=_URLWEB;?>js/excanvas.min.js"></script> 
<script src="<?=_URLWEB;?>js/chart.min.js" type="text/javascript"></script> 
<script src="<?=_URLWEB;?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?=_URLWEB;?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=_URLWEB;?>js/bootstrap-colorpicker.min.js"></script>
<script language="javascript" type="text/javascript" src="<?=_URLWEB;?>js/jquery.autocomplete.js"></script>
<script src="<?=_URLWEB;?>js/base.js"></script> 

    <script type="text/javascript">
        $(document).ready(function () {

          $('#tgl').datepicker({
            format: "dd/mm/yyyy"
          });

          $('#mulai').datepicker({
            format: "dd/mm/yyyy"
          });

          $('#selesai').datepicker({
            format: "dd/mm/yyyy"
          });

        });
    </script>

<script src="<?=_URLWEB;?>js/jquery.tagsinput.min.js"></script> 
  <script type="text/javascript">

    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }
    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input,tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {

      $('#tag').tagsInput({width:'auto'});

    });

  </script>

<?php
if($mod == "program" && ($act == "" || $act == "update" || $act == "simpan")) {
?>
<script language="javascript" type="text/javascript" src="<?=_URLWEB;?>js/bootstrap.youtubepopup.min.js"></script>
<script type="text/javascript">
  $(function () {
    $(".youtube").YouTubeModal({autoplay:0, width:550, height:360});
  });
</script>

<? } else { ?>

<!-- Upload Modal --> 
<script language="javascript" type="text/javascript" src="<?=_URLWEB;?>js/jquery.simplemodal.js"></script>
<script language="javascript" type="text/javascript" src="<?=_URLWEB;?>js/mgupload.js"></script>
<script language="javascript" type="text/javascript" src="<?=_URLWEB;?>js/jquery.iframe-post-form.js"></script>

<?php } ?>

<script src="<?=_URLWEB;?>js/ckeditor/ckeditor.js"></script> 

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="#"> <img src="<?=_URLWEB;?>img/tvri_logo_22.png" style="margin-top:-10px;" alt="" border="0">  SUMATERA BARAT</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <?php if($typeuser == "admin") { ?>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Sistem <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=config">Data Stasiun TVRI</a></li>
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=content">Data Konten</a></li>
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=users">Data Operator</a></li>
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=media">Data Sumber Media</a></li>
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=region">Data Wilayah</a></li>
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=channel">Data Kanal</a></li>
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=log">Laporan Login</a></li>
            </ul>
          </li>
          <? } else echo""; ?>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?=$adnama;?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=account">Akun Ku</a></li>
              <li><a onclick="return confirm('Keluar Dari <?=_ADMINNAME;?> <?=$profil->singkatan;?>');" href="<?=_URLWEB;?>admin/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($mod <> "news" && $mod <> "photo" && $mod <> "agenda" && $mod <> "message") { echo"class=active"; } ?>><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=home"><i class="icon-home"></i><span>Dashboard</span> </a> </li>
        <li <?php if($mod == "news") { echo"class=active"; } ?>><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=news"><i class="icon-list-alt"></i><span>Berita</span> </a> </li>
        <li <?php if($mod == "photo") { echo"class=active"; } ?>><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=photo"><i class="icon-picture"></i><span>Galeri Foto</span> </a></li>
        <li <?php if($mod == "informasi") { echo"class=active"; } ?>><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=agenda"><i class="icon-table"></i><span>Agenda Kegiatan</span> </a> </li>
        <li <?php if($mod == "message") { echo"class=active"; } ?>><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=message"><i class="icon-envelope"></i><span>Kritik &amp; Saran</span> </a> </li>
        <li <?php if($mod == "custom") { echo"class=active"; } ?>><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=custom"><i class="icon-puzzle-piece"></i><span>Custom</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
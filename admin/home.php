<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; }
if ((ISSET($_SESSION['uname'])) AND ($_SESSION['typea']) AND ($_SESSION['pword']) AND ($_SESSION['id_ada']))
{

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");

$tanggal = new tanggal;

$cekpesan = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBPESAN." WHERE status='0'");

?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-calendar"></i>
              <h3> <?php $tanggal->tanggalkini(); ?></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats">Kunjungan Online Streaming <?=$profil->singkatan;?></h6>
                  <div id="big_stats" class="cf">
                    <div class="stat"> <i class="icon-globe" title="<?=$alls;?> Total Pengunjung"></i> <span class="value"><?=$alls;?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-bar-chart" title="<?=$hitnow;?> Total Hits"></i> <span class="value"><?=$hitnow;?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-group" title="<?=$online;?> Pengunjung Online"></i> <span class="value"><?=$online;?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-envelope-alt" title="<?=$cekpesan->num;?> Kritik &amp; Saran Belum Di Proses"></i> <span class="value"><?=$cekpesan->num;?></span> </div>
                    <!-- .stat --> 
                  </div>
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <!-- /widget -->
          
          <div class="widget">
            <div class="widget-header"> <i class="icon-cogs"></i>
              <h3>Modul - Modul</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=news" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Berita</span> </a>
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=photo" class="shortcut"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">Galeri Foto</span> </a>
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=main" class="shortcut"> <i class="shortcut-icon icon-star-empty"></i><span class="shortcut-label">Banner Utama</span> </a>
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=series" class="shortcut"><i class="shortcut-icon icon-road"></i><span class="shortcut-label">Rangkaian Acara</span> </a>
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=event" class="shortcut"><i class="shortcut-icon icon-tasks"></i><span class="shortcut-label">Mata Acara</span> </a>
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=program" class="shortcut"><i class="shortcut-icon icon-screenshot"></i> <span class="shortcut-label">Program Acara</span> </a>
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=rate" class="shortcut"> <i class="shortcut-icon icon-briefcase"></i><span class="shortcut-label">Rate Card</span> </a>
              <a href="<?=_URLWEB;?>admin.php?admin=apps&mod=link" class="shortcut"><i class="shortcut-icon icon-link"></i><span class="shortcut-label">Link</span> </a>
              </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          
        </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<?php
} else { header("location:admin.php?admin=login&x="); die; }
?>
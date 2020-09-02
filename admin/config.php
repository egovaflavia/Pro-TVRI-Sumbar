<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; }
if ((ISSET($_SESSION['uname'])) AND ($_SESSION['typea']) AND ($_SESSION['pword']) AND ($_SESSION['id_ada']))
{

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

if (isset($_GET["act"]))
      $act = $_GET["act"];
else    
      $act = "";

$tanggal = new tanggal;

$sqledit = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");

?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <?php
          if($typeuser == "admin") {

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Konfigurasi Data Stasiun TVRI</h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <?php
          if($act == 'update') {

            $nama=$_POST['nama']; 
            $singkatan=$_POST['singkatan']; 
            $alamat=$_POST['alamat']; 
            $telp=$_POST['telp'];
            $fax=$_POST['fax'];
            $email=$_POST['email'];
            $weburl=$_POST['weburl'];
            $rtmpt=$_POST['rtmpt'];
            $info=$_POST['info'];
            $peta_lat=$_POST['peta_lat'];
            $peta_lng=$_POST['peta_lng'];
            $warna=$_POST['warna'];
            $linkfb=$_POST['linkfb'];
            $linktw=$_POST['linktw'];
            $linkgp=$_POST['linkgp'];
            $linkyt=$_POST['linkyt'];
            $appt=$_POST['appt'];
            $appd=$_POST['appd'];
            $appk=$_POST['appk'];
            $ga=$_POST['ga'];
            $gv=$_POST['gv'];
            $mv=$_POST['mv'];
            $fbid=$_POST['fbid'];
            $semail=strtolower($email);
            $cid_pf=$_POST['cid_pf'];
            $cid_ad=$_POST['cid_ad'];


            if (trim($_POST['nama']) == '') {
              $error[] = '- Nama Lengkap Masih Kosong';
            }
            if (trim($_POST['singkatan']) == '') {
              $error[] = '- Singkatan Nama Masih Kosong';
            }
            if (trim($_POST['alamat']) == '') {
              $error[] = '- Alamat Masih Kosong';
            }
            if (trim($_POST['peta_lat']) == '') {
              $error[] = '- Map Latitude Masih Kosong';
            }
            if (trim($_POST['peta_lng']) == '') {
              $error[] = '- Map Longitude Masih Kosong';
            }
            if (trim($_POST['warna']) == '') {
              $error[] = '- Warna Background Masih Kosong';
            }
            if (trim($_POST['telp']) == '') {
              $error[] = '- No.Telpon Masih Kosong';
            }
            if (trim($_POST['fax']) == '') {
              $error[] = '- Fax Masih Kosong';
            }
            if (trim($_POST['email']) == '') {
              $error[] = '- Alamat Email Masih Kosong';
            }
            if (!preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i', $semail)) {
              $error[] = '- Penulisan Alamat Email Belum Benar.';
            }
            if (trim($_POST['info']) == '') {
              $error[] = '- Info Stasiun TVRI Masih Kosong';
            }
            if (trim($_POST['weburl']) == '') {
              $error[] = '- Web URL Masih Kosong';
            }
            if (trim($_POST['rtmpt']) == '') {
              $error[] = '- Streamer Masih Kosong';
            }
            if (trim($_POST['linkfb']) == '') {
              $error[] = '- Alamat Facebook Masih Kosong';
            }
            if (trim($_POST['linktw']) == '') {
              $error[] = '- Alamat Twitter Masih Kosong';
            }
            if (trim($_POST['linkgp']) == '') {
              $error[] = '- Alamat Google+ Masih Kosong';
            }
            if (trim($_POST['linkyt']) == '') {
              $error[] = '- Alamat Youtube Masih Kosong';
            }
            if (trim($_POST['appt']) == '') {
              $error[] = '- Title Standard Masih Kosong';
            }
            if (trim($_POST['appd']) == '') {
              $error[] = '- Deskripsi Standard Masih Kosong';
            }
            if (trim($_POST['appk']) == '') {
              $error[] = '- Keyword Standard Masih Kosong';
            }

            if (isset($error)) { $error = $error; } else { $error = ""; }
            if ($error <> '') {
            echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><br><a href=\""._URLWEB."admin.php?admin=apps&mod=config\" class=\"btn btn-warning\">Ulangi Lagi</a>";
            } else {
            
              $sqlupdate = $akdb->dbquery("UPDATE "._TBPROFIL." SET `nama`='$nama',`singkatan`='$singkatan',`alamat`='$alamat',`telp`='$telp',`fax`='$fax',`email`='$semail',`weburl`='$weburl',`rtmpt`='$rtmpt',`info`='$info',`peta_lat`='$peta_lat',`peta_lng`='$peta_lng',`linkfb`='$linkfb',`linktw`='$linktw',`linkgp`='$linkgp',`linkyt`='$linkyt',`appt`='$appt',`appd`='$appd',`appk`='$appk',`ga`='$ga',`gv`='$gv',`mv`='$mv',`fbid`='$fbid',`warna`='$warna',`id_ad`='$cid_ad',`log`='"._DLOG."' WHERE id_pf=$cid_pf");
              if($sqlupdate){
              echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Konfigurasi Data Stasiun TVRI (<b>".$_POST['nama']."</b>) Berhasil Dilakukan.</div><br><br><a href=\""._URLWEB."admin.php?admin=apps&mod=config\" class=\"btn btn-success\">Ke Data Stasiun TVRI</a>";
              }
            }


          } else {
          ?>

          <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=config&act=update" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Lengkap</label>
                      <div class="controls">
                        <input type="text" class="span8" id="nama" name="nama" value="<?=$sqledit->nama;?>" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label" for="singkatan">Singkatan Nama</label>
                      <div class="controls">
                        <input type="text" class="span4" id="singkatan" name="singkatan" value="<?=$sqledit->singkatan;?>" maxlength="80" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="alamat">Alamat</label>
                      <div class="controls">
                        <input type="text" class="span8" id="alamat" name="alamat" value="<?=$sqledit->alamat;?>" maxlength="100" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="peta_lat">Map Latitude</label>
                      <div class="controls">
                        <input type="text" class="span2" id="peta_lat" name="peta_lat" value="<?=$sqledit->peta_lat;?>" maxlength="10" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label" for="peta_lng">Map Longitude</label>
                      <div class="controls">
                        <input type="text" class="span2" id="peta_lng" name="peta_lng" value="<?=$sqledit->peta_lng;?>" maxlength="10" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="warna">Warna Background</label>
                      <div class="controls">
                        <input type="text" class="span2" id="warna" name="warna" value="<?=$sqledit->warna;?>" maxlength="30" required="required">
                      </div> <!-- /controls -->
                      	<script>
						    $(function(){
						        $('#warna').colorpicker({
						            customClass: 'colorpicker-2x',
						            sliders: {
						                saturation: {
						                    maxLeft: 200,
						                    maxTop: 200
						                },
						                hue: {
						                    maxTop: 200
						                },
						                alpha: {
						                    maxTop: 200
						                }
						            }
						        });
						    });
						</script>       
                    </div> <!-- /control-group -->

                    <br />

                    <div class="control-group">                     
                      <label class="control-label" for="kontak"><b>Kontak Stasiun TVRI</b></label>
                      <div class="controls">
                        &nbsp;
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="telp">No. Telpon</label>
                      <div class="controls">
                        <input type="text" class="span2" id="telp" name="telp" value="<?=$sqledit->telp;?>" maxlength="30" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->   

                    <div class="control-group">                     
                      <label class="control-label" for="fax">Fax</label>
                      <div class="controls">
                        <input type="text" class="span2" id="fax" name="fax" value="<?=$sqledit->fax;?>" maxlength="30" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                  
                    
                    <div class="control-group">                     
                      <label class="control-label" for="email">Alamat Email</label>
                      <div class="controls">
                        <input type="text" class="span4" id="email" name="email" value="<?=$sqledit->email;?>" maxlength="40" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    

                     <br />

                     <div class="control-group">                     
                      <label class="control-label" for="sekilas"><b>Sekilas Stasiun TVRI</b></label>
                      <div class="controls">
                        &nbsp;
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="info">Info Stasiun TVRI</label>
                      <div class="controls">
                        <textarea name="info" id="info" rows="6" cols="50" class="span8" required="required"><?=$sqledit->info;?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                      
                     <br />

                     <div class="control-group">                     
                      <label class="control-label" for="online"><b>Alamat Online</b></label>
                      <div class="controls">
                        &nbsp;
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="weburl">whatsapp</label>
                      <div class="controls">
                        <input type="text" class="span4" id="weburl" name="weburl" value="<?=$sqledit->weburl;?>" maxlength="60" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="rtmpt">Streamer</label>
                      <div class="controls">
                        <input type="text" class="span4" id="rtmpt" name="rtmpt" value="<?=$sqledit->rtmpt;?>" maxlength="75" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="linkfb">Alamat Facebook</label>
                      <div class="controls">
                        <input type="text" class="span4" id="linkfb" name="linkfb" value="<?=$sqledit->linkfb;?>" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="linktw">Alamat Instagram</label>
                      <div class="controls">
                        <input type="text" class="span4" id="linktw" name="linktw" value="<?=$sqledit->linktw;?>" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="linkgp">Alamat Twitter</label>
                      <div class="controls">
                        <input type="text" class="span4" id="linkgp" name="linkgp" value="<?=$sqledit->linkgp;?>" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="linkyt">Alamat Youtube</label>
                      <div class="controls">
                        <input type="text" class="span4" id="linkyt" name="linkyt" value="<?=$sqledit->linkyt;?>" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                     <br />

                    <div class="control-group">                     
                      <label class="control-label" for="meta"><b>Meta &amp; Script</b></label>
                      <div class="controls">
                        &nbsp;
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="appt">Title Standard</label>
                      <div class="controls">
                        <input type="text" class="span9" id="appt" name="appt" value="<?=$sqledit->appt;?>" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="appd">Deskripsi Standard</label>
                      <div class="controls">
                        <input type="text" class="span9" id="appd" name="appd" value="<?=$sqledit->appd;?>" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="appk">Keyword Standard</label>
                      <div class="controls">
                        <input type="text" class="span9" id="appk" name="appk" value="<?=$sqledit->appk;?>" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ga">Kode Google Analytics</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ga" name="ga" value="<?=$sqledit->ga;?>" maxlength="50">
                        <p class="help-block">Harap <b>di kosongkan saja</b> kalau belum tau Kode Google Analytics nya.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="gv">Kode Verifikasi Google</label>
                      <div class="controls">
                        <input type="text" class="span4" id="gv" name="gv" value="<?=$sqledit->gv;?>" maxlength="150">
                        <p class="help-block">Harap <b>di kosongkan saja</b> kalau belum tau Kode Verifikasi Google nya.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="mv">Kode Validasi Bing</label>
                      <div class="controls">
                        <input type="text" class="span4" id="mv" name="mv" value="<?=$sqledit->mv;?>" maxlength="150">
                        <p class="help-block">Harap <b>di kosongkan saja</b> kalau belum tau Kode Validasi Bing nya.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="fbid">ID Aplikasi Facebook</label>
                      <div class="controls">
                        <input type="text" class="span4" id="fbid" name="fbid" value="<?=$sqledit->fbid;?>" maxlength="50">
                        <p class="help-block">Harap <b>di kosongkan saja</b> kalau belum tau ID Aplikasi Facebook nya.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                     <br>                    
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=config" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->                    

                  </fieldset>
                  <input type="hidden" name="cid_pf" value="<?=$sqledit->id_pf;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

                <form id="form-upload" class="form-horizontal" action="<?=_URLWEB;?>admin/proseslogo.php" method="post" enctype="multipart/form-data" name="form-upload">
                      <fieldset>
                      
                      <div class="control-group">                     
                      <label class="control-label" for="logokini">Logo Web Lama :</label>
                      <div class="controls">
                      <?php if($sqledit->logo <> '') { echo"<img src="._URLWEB."up/web/".$sqledit->logo." alt=logo>"; } else { echo"<img src="._URLWEB."img/web-logo.png width=430 height=70 border=0 alt=logo>"; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="upload">Upload Logo Baru :</label>
                      <div class="controls">
                        <input type="file" class="span4" id="fupload" name="fupload">
                        <p class="help-block"><b>Logo web otomatis di upload setelah dipilih.</b> Hanya file logo web ber extensi *gif, *jpg, *png atau *jpeg, ukuran lebar logo <b>430px</b> dan tinggi <b>70px</b>, maksimal 2MB.</p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="message">Message Box :</label>
                      <div class="controls">
                        <p id="up-result"><font color="#ad0000">Logo Web Baru Belum di Upload...</font></p>
                        <p id="uploading"><img src="<?=_URLWEB;?>img/loadingAnimation.gif" alt="uploading" width="208" height="13" /></p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->
                      <input type="hidden" name="cid_pf" value="<?=$sqledit->id_pf;?>" />                    

                      </fieldset>
                
                </form>

                <?php } ?>

                </div>

              </div>

          <?php
          
          } else { echo"<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Peringatan!</strong><br>Akun anda tidak memiliki akses ke halaman ini.</div>"; }
          ?>
          
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
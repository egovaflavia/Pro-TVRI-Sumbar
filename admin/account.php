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

?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Akun Ku</h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content">

          <?php
          if($act == 'update') {

            $pass0=$_POST['pass0']; 
            $pass1=$_POST['pass1']; 
            $pass2=$_POST['pass2']; 
            $nama=$_POST['nama'];
            $bidang=$_POST['bidang'];
            $alamat=$_POST['alamat'];
            $telp=$_POST['telp'];
            $imel=$_POST['imel']; 
            $info=$_POST['info']; 
            $simel=strtolower($imel);
            $cid_ad=$_POST['cid_ad'];

            $cekpass0 = $akdb->dbobject("SELECT pword FROM "._TBADMIN." WHERE id_ad = '".$cid_ad."' ORDER BY id_ad DESC LIMIT 0,1");

            if (trim($_POST['pass0']) == '') {
              $error[] = '- Password Lama Belum Diisi';
            }
            if (md5($pass0) <> $cekpass0->pword) {
              $error[] = '- Password Lama Salah';
            }
            if (trim($_POST['pass1']) == '') {
              $error[] = '- Password Baru Belum Diisi';
            }
            if (trim($_POST['pass2']) == '') {
              $error[] = '- Password Baru (Ulangi) Belum Diisi';
            }
            if ($pass1 <> $pass2) {
              $error[] = '- Password Baru dan Ulangi Password Tidak Sama';
            }
            if (trim($_POST['nama']) == '') {
              $error[] = '- Nama Lengkap Masih Kosong';
            }
            if (trim($_POST['bidang']) == '') {
              $error[] = '- Bidang Masih Kosong';
            }
            if (trim($_POST['alamat']) == '') {
              $error[] = '- Alamat Masih Kosong';
            }
            if (trim($_POST['telp']) == '') {
              $error[] = '- No. Telpon/HP Masih Kosong';
            }
            if (trim($_POST['imel']) == '') {
              $error[] = '- Alamat Email Masih Kosong';
            }
            if (trim($_POST['info']) == '') {
              $error[] = '- Info Tentang Saya Masih Kosong';
            }
            if (!preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i', $simel)) {
              $error[] = '- Penulisan Alamat Email belum benar.';
            }

            if (isset($error)) { $error = $error; } else { $error = ""; }
            if ($error <> '') {
            echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><br><a href=\""._URLWEB."admin.php?admin=apps&mod=account\" class=\"btn btn-warning\">Ulangi Lagi</a>";
            } else {
            
              $sqlupdate = $akdb->dbquery("UPDATE "._TBADMIN." SET `pword`='".md5($pass1)."',`nama`='$nama',`bidang`='$bidang',`alamat`='$alamat',`telp`='$telp',`info`='$info',`imel`='$simel',`log`='"._DLOG."' WHERE id_ad=$cid_ad");
              if($sqlupdate){
              echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Akun <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div><br><br><a href=\""._URLWEB."admin.php?admin=apps&mod=account\" class=\"btn btn-success\">Ke Akun Ku</a>";
              }
            }

          } else {
          ?>

              <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=account&act=update" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="username">Username</label>
                      <div class="controls">
                        <input type="text" class="span6 disabled" id="uname" value="<?=$sqlaccount->uname;?>" disabled>
                        <p class="help-block">Username <b><?=$sqlaccount->uname;?></b> digunakan untuk login, tidak dapat diubah.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label" for="name">Nama Lengkap</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" value="<?=$sqlaccount->nama;?>" maxlength="180" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="bidangon">Bidang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="bidang" name="bidang" value="<?=$sqlaccount->bidang;?>" maxlength="90" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="address">Alamat Lengkap</label>
                      <div class="controls">
                        <textarea name="alamat" id="alamat" rows="2" cols="50" class="span6" required="required"><?=$sqlaccount->alamat;?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="email">Alamat Email</label>
                      <div class="controls">
                        <input type="text" class="span4" id="imel" name="imel" value="<?=$sqlaccount->imel;?>" maxlength="60" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="telp">No. Telp/HP</label>
                      <div class="controls">
                        <input type="text" class="span4" id="telp" name="telp" value="<?=$sqlaccount->telp;?>" maxlength="16" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="info">Info Tentang Saya</label>
                      <div class="controls">
                        <textarea name="info" id="info" rows="3" cols="50" class="span8" required="required"><?=$sqlaccount->info;?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    
                    <br /><br />
                    
                    <div class="control-group">                     
                      <label class="control-label" for="password0">Password Sekarang</label>
                      <div class="controls">
                        <input type="password" class="span4" id="password0" maxlength="60" name="pass0" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label" for="password1">Password Baru</label>
                      <div class="controls">
                        <input type="password" class="span4" id="password1" maxlength="60" name="pass1" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="password2">Password Baru (Ulangi)</label>
                      <div class="controls">
                        <input type="password" class="span4" id="password2" maxlength="60" name="pass2" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                  
                      
                     <br />
                    
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

                <form id="form-upload" class="form-horizontal" action="<?=_URLWEB;?>admin/prosesfoto.php" method="post" enctype="multipart/form-data" name="form-upload">
                      <fieldset>
                      
                      <div class="control-group">                     
                      <label class="control-label" for="fotokini">Foto Lama :</label>
                      <div class="controls">
                      <?php if($sqlaccount->foto <> '') { echo"<img src="._URLWEB."up/user/".$sqlaccount->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_user.jpg border=0 alt=nofoto>"; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="fotocrop">Foto Crop :</label>
                      <div class="controls">
                      <?php if($sqlaccount->cfoto <> '') { echo"<img src="._URLWEB."up/user/".$sqlaccount->cfoto." alt=foto>"; } else { echo""; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="upload">Upload Foto Baru :</label>
                      <div class="controls">
                        <input type="file" class="span4" id="fupload" name="fupload">
                        <p class="help-block"><b>Foto otomatis di upload setelah dipilih.</b> Hanya file foto *gif, *jpg, *png atau *jpeg, ukuran ideal (500 x 500)px, maksimal 2MB.</p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="message">Message Box :</label>
                      <div class="controls">
                        <p id="up-result"><font color="#ad0000">Foto Baru Belum di Upload...</font></p>
                        <p id="uploading"><img src="<?=_URLWEB;?>img/loadingAnimation.gif" alt="uploading" width="208" height="13" /></p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->
                      <input type="hidden" name="cid_ad" value="<?=$sqlaccount->id_ad;?>" />                    

                      </fieldset>
                
                </form>

                <?php } ?>

          </div>

          </div>
          
          
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
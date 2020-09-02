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

          <?php
          if($typeuser == "admin") {

          if($act == 'tambah') {

            ?>
            <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Entry Data Operator Baru</h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=users&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="username">Username</label>
                      <div class="controls">
                        <input type="text" class="span6" id="username" name="uname" maxlength="50" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Lengkap</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" maxlength="180" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="bidang">Bidang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="bidang" name="bidang" maxlength="90" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="address">Alamat Lengkap</label>
                      <div class="controls">
                        <textarea name="alamat" id="alamat" rows="2" cols="50" class="span6" required="required"></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="email">Alamat Email</label>
                      <div class="controls">
                        <input type="text" class="span4" id="imel" name="imel" maxlength="60" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="telp">No. Telp/HP</label>
                      <div class="controls">
                        <input type="text" class="span4" id="telp" name="telp" maxlength="16" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="info">Info Tentang Operator</label>
                      <div class="controls">
                        <textarea name="info" id="info" rows="3" cols="50" class="span8" required="required"></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    
                    <br /><br />
                    
                    <div class="control-group">                     
                      <label class="control-label" for="password1">Password</label>
                      <div class="controls">
                        <input type="password" class="span4" id="password1" maxlength="60" name="pass1" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="password2">Password (Ulangi)</label>
                      <div class="controls">
                        <input type="password" class="span4" id="password2" maxlength="60" name="pass2" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                  
                      
                    <br />
                    <?php if($typeuser == "admin")
                    {
                    ?>
                    <div class="control-group">                     
                      <label class="control-label">Tipe Akun</label>
                      <div class="controls">
                      <label class="radio inline">
                      <input type="radio" name="type" value="operator" checked="checked" > Operator
                      </label>
                                            
                      <label class="radio inline">
                      <input type="radio" name="type" value="admin" > Administrator
                      </label>
                      </div>  <!-- /controls -->      
                    </div> <!-- /control-group -->
                    <br />
                    <?php
                    } else {
                    echo "<input type=\"hidden\" name=\"type\" value=\"operator\" />";
                    }
                    ?>                    
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=users" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                </form>

                </div>

              </div>
            <?php

          }
          
          elseif($act == 'edit') { 

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBADMIN." WHERE id_ad = $id ORDER BY id_ad DESC LIMIT 0,1");

            switch (base64_decode($sqledit->type)) {
             case "operator" :
             $ejnama = "Operator";
             break;
             case "admin" :
             $ejnama = "Administrator";
             break;
            }

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Data Operator : <?=$sqledit->nama;?></h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=users&act=update" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="username">Username</label>
                      <div class="controls">
                        <input type="text" class="span6" id="username" name="uname" value="<?=$sqledit->uname;?>" maxlength="50" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Lengkap</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" value="<?=$sqledit->nama;?>" maxlength="180" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="bidang">Bidang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="bidang" name="bidang" value="<?=$sqledit->bidang;?>" maxlength="90" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="address">Alamat Lengkap</label>
                      <div class="controls">
                        <textarea name="alamat" id="alamat" rows="2" cols="50" class="span6" required="required"><?=$sqledit->alamat;?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="email">Alamat Email</label>
                      <div class="controls">
                        <input type="text" class="span4" id="imel" name="imel" value="<?=$sqledit->imel;?>" maxlength="60" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="telp">No. Telp/HP</label>
                      <div class="controls">
                        <input type="text" class="span4" id="telp" name="telp" value="<?=$sqledit->telp;?>" maxlength="16" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="info">Info Tentang Operator</label>
                      <div class="controls">
                        <textarea name="info" id="info" rows="3" cols="50" class="span8" required="required"><?=$sqledit->info;?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    
                    <br /><br />
                    
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
                    <?php if($typeuser == "admin")
                    {
                    ?>
                    <div class="control-group">                     
                      <label class="control-label">Tipe Akun</label>
                      <div class="controls">
                      <label class="radio inline">
                      <input type="radio" name="type" value="operator" <?php if(base64_decode($sqledit->type) == "operator") { echo"checked=checked"; } ?> > Operator
                      </label>
                                            
                      <label class="radio inline">
                      <input type="radio" name="type" value="admin" <?php if(base64_decode($sqledit->type) == "admin") { echo"checked=checked"; } ?> > Administrator
                      </label>
                      </div>  <!-- /controls -->      
                    </div> <!-- /control-group -->
                    <br />
                    <?php
                    } else {
                    echo $ejnama;
                    echo "<input type=\"hidden\" name=\"type\" value='".base64_decode($sqledit->type)."' />";
                    }
                    ?>                    
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=users" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ad" value="<?=$sqledit->id_ad;?>" />
                </form>

                </div>

              </div>

          <?php

          } else {

            if($act == 'simpan') {

              $uname=$_POST['uname'];  
              $pass1=$_POST['pass1']; 
              $pass2=$_POST['pass2']; 
              $nama=$_POST['nama'];
              $bidang=$_POST['bidang'];
              $alamat=$_POST['alamat'];
              $telp=$_POST['telp'];
              $imel=$_POST['imel']; 
              $info=$_POST['info']; 
              $type=$_POST['type'];
              $simel=strtolower($imel);
              
              $cekuname = $akdb->dbnumrows("SELECT * FROM "._TBADMIN." WHERE `uname`='".$_POST['uname']."'");
              
              
              if (trim($_POST['uname']) == '') {
                $error[] = '- Username Belum Diisi';
              }
              if ($cekuname != 0) {
                $error[] = '- Username Tersebut Sudah Digunakan Akun Lain';
              }
              if (trim($_POST['pass1']) == '') {
                $error[] = '- Password Belum Diisi';
              }
              if (trim($_POST['pass2']) == '') {
                $error[] = '- Password (Ulangi) Belum Diisi';
              }
              if ($pass1 <> $pass2) {
                $error[] = '- Password dan Ulangi Password Tidak Sama';
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
              $error[] = '- Info Tentang Operator Masih Kosong';
              }
              if (!preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i', $simel)) {
                $error[] = '- Penulisan Alamat Email belum benar.';
              }
              if (trim($_POST['type']) == '') {
                $error[] = '- Type Akun Tidak Ada';
              }
              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data Operator :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=users&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBADMIN." (uname,pword,nama,bidang,alamat,telp,imel,info,type,status,log) VALUES ('$uname','".md5($pass1)."','$nama','$bidang','$alamat','$telp','$simel','$info','".base64_encode($type)."','1','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Operator <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }

            } elseif($act == 'update') {

              $uname=$_POST['uname']; 
              $pass1=$_POST['pass1']; 
              $pass2=$_POST['pass2']; 
              $nama=$_POST['nama'];
              $bidang=$_POST['bidang'];
              $alamat=$_POST['alamat'];
              $telp=$_POST['telp'];
              $imel=$_POST['imel'];
              $info=$_POST['info'];
              $type=$_POST['type']; 
              $simel=strtolower($imel);
              $cid_ad=$_POST['cid_ad'];

              $cekuname = $akdb->dbnumrows("SELECT * FROM "._TBADMIN." WHERE `uname`='".$_POST['uname']."' and id_ad != '".$cid_ad."'");

              if (trim($_POST['uname']) == '') {
                $error[] = '- Username Belum Diisi';
              }
              if ($cekuname != 0) {
                $error[] = '- Username Tersebut Sudah Digunakan Operator Lain';
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
              $error[] = '- Info Tentang Operator Masih Kosong';
              }
              if (!preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i', $simel)) {
                $error[] = '- Penulisan Alamat Email belum benar.';
              }

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data Operator :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=users&act=edit&id=".base64_encode($cid_ad)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBADMIN." SET `uname`='".$uname."',`pword`='".md5($pass1)."',`nama`='$nama',`bidang`='$bidang',`alamat`='$alamat',`telp`='$telp',`info`='$info',`imel`='$simel',`type`='".base64_encode($type)."',`log`='"._DLOG."' WHERE id_ad=$cid_ad");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Operator <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Data Operator</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBADMIN."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=users";  
            $limit = 5; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBADMIN." ORDER BY nama ASC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> USERNAME </th>
                    <th> NAMA </th>
                    <th> FOTO </th>
                    <th> BIDANG </th>
                    <th> TIPE AKUN </th>
                    <th> STATUS </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                
                <tbody>

                <?php
                $no=$start+1;

                while($rowd = mysql_fetch_object($sqltabel))
                { 
                
                if($rowd->type <> '') {
                switch (base64_decode($rowd->type)) {
                 case "operator" :
                 $jrowdnama = "Operator";
                 break;
                 case "admin" :
                 $jrowdnama = "Administrator";
                 break;
                }
                } else { $jrowdnama = "Not Defined"; }
                ?>

                  <tr>
                    <td> <?=$no;?> </td>
                    <td> <?=$rowd->uname;?> </td>
                    <td> <?=$rowd->nama;?> </td>
                    <td> <?php if($rowd->foto <> '') { echo"<img src="._URLWEB."up/user/".$rowd->cfoto." alt=foto width=100 height=100 border=0>"; } else { echo"<img src="._URLWEB."img/no_user.jpg border=0 width=100 height=100 alt=nofoto>"; } ?> </td>
                    <td> <?=$rowd->bidang;?> </td>
                    <td> <?=$jrowdnama;?> </td>
                    <td> 
                    <?php
                    if(base64_decode($rowd->type) <> 'admin' or $rowd->id_ad == $ida) {
                    if($rowd->status == "0") {
                    echo "<a onclick=\"return confirm('Aktifkan Operator : $rowd->nama');\" href=\""._URLWEB."admin.php?admin=aksi&mod=users&act=aktif&id=".base64_encode($rowd->id_ad)."\"><i class=\"icon-remove-sign\"></i> non aktif</a>";
                    } else {
                    echo "<a onclick=\"return confirm('Non-aktifkan Operator : $rowd->nama');\" href=\""._URLWEB."admin.php?admin=aksi&mod=users&act=nonaktif&id=".base64_encode($rowd->id_ad)."\"><i class=\"icon-ok-sign\"></i> aktif</a>";
                    }
                    }
                    else {
                    if($rowd->status == "0") {
                      echo "<i class=\"icon-remove-sign\"></i> non aktif";
                      } else {
                      echo "<i class=\"icon-ok-sign\"></i> aktif";
                      }
                    }
                    ?>
                    </td>
                    <td class="td-actions">
                    <?php
                    if(base64_decode($rowd->type) <> 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Data Operator : $rowd->nama');\" href=\""._URLWEB."admin.php?admin=apps&mod=users&act=edit&id=".base64_encode($rowd->id_ad)."\" title=\"Edit Data Operator\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Operator : $rowd->nama');\" href=\""._URLWEB."admin.php?admin=aksi&mod=users&act=hapus&id=".base64_encode($rowd->id_ad)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>";
                    }
                    else {
                    echo "";
                    }
                    ?>
                    </td>
                  </tr>
                  <?php $no++;
                    } 
                  ?>
                  <tr>
                    <td colspan="8">Total : <b><?=$total_pages;?></b> data.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
            <br />
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=users&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Operator Baru</button></a></div>
            <br />
            <div align="center"><?=$pagination;?></div>

          </div>
          <!-- /widget -->
          
          <?php
          }
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
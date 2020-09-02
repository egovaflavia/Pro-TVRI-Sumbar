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

          if($act == 'tambah') {

            ?>
            <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Entry Banner Utama</h3>
              </div> <!-- /widget-header -->
          
                <div class="widget-content"> 

                <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=main&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="judul">Judul</label>
                      <div class="controls">
                        <input type="text" class="span4" id="judul" name="judul" maxlength="80" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="subjudul">Sub Judul</label>
                      <div class="controls">
                        <input type="text" class="span6" id="subjudul" name="subjudul" maxlength="120" required="required">    
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="urlweb">URL Web</label>
                      <div class="controls">
                        <input type="text" class="span8" id="urlweb" name="urlweb" value="http://" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                   

                    <br>
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=main" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

                </div>

            </div>
            <?php

          }
          
          elseif($act == 'edit') { 

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBUTAMA." WHERE id_ut = $id ORDER BY id_ut DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Banner Utama : <?=$sqledit->judul;?></h3>
              </div> <!-- /widget-header -->
          
              <div class="widget-content"> 

              <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=main&act=update" method="post">
                  <fieldset>

                    <div class="control-group">                     
                      <label class="control-label" for="judul">Judul</label>
                      <div class="controls">
                        <input type="text" class="span4" id="judul" name="judul" value="<?=$sqledit->judul;?>" maxlength="80" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  

                    <div class="control-group">                     
                      <label class="control-label" for="subjudul">Sub Judul</label>
                      <div class="controls">
                        <input type="text" class="span6" id="subjudul" name="subjudul" value="<?=$sqledit->subjudul;?>" maxlength="120" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  

                    <div class="control-group">                     
                      <label class="control-label" for="urlweb">URL Web</label>
                      <div class="controls">
                        <input type="text" class="span8" id="urlweb" name="urlweb" value="<?=$sqledit->urlweb;?>" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                 

                    <br>                                        
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=main" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ut" value="<?=$sqledit->id_ut;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

              </div>

          </div>

          <?php

          } elseif($act == 'foto') {

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBUTAMA." WHERE id_ut = $id ORDER BY id_ut DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Update Foto Banner Utama : <?=$sqledit->judul;?></h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="form-upload" class="form-horizontal" action="<?=_URLWEB;?>admin/prosesfotomain.php" method="post" enctype="multipart/form-data" name="form-upload">
                      <fieldset>
                      
                      <div class="control-group">                     
                      <label class="control-label" for="fotokini">Foto Lama :</label>
                      <div class="controls">
                      <?php if($sqledit->foto <> '') { echo"<img src="._URLWEB."up/slider/".$sqledit->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg border=0 alt=nofoto>"; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="upload">Upload Foto Baru :</label>
                      <div class="controls">
                        <input type="file" class="span4" id="fupload" name="fupload">
                        <p class="help-block"><b>Foto otomatis di upload setelah dipilih.</b> Hanya file foto *gif, *jpg, *png atau *jpeg, ukuran ideal lebar 960px dan tinggi 400px, maksimal 2MB.</p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="message">Message Box :</label>
                      <div class="controls">
                        <p id="up-result"><font color="#ad0000">Foto Baru Belum di Upload...</font></p>
                        <p id="uploading"><img src="<?=_URLWEB;?>img/loadingAnimation.gif" alt="uploading" width="208" height="13" /></p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->
                      <input type="hidden" name="cid_ut" value="<?=$sqledit->id_ut;?>" />                    

                      </fieldset>
                
                </form>
                <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=main" class="btn btn-success">Kembali</a></div>

                </div>

              </div>

          <?php

          } else {

              if($act == 'simpan') {

              $judul=$_POST['judul'];
              $subjudul=$_POST['subjudul'];
              $urlweb=$_POST['urlweb'];
              $cid_ad=$_POST['cid_ad'];
              
              if (trim($_POST['judul']) == '') {
                $error[] = '- Judul Masih Kosong';
              }
              if (trim($_POST['subjudul']) == '') {
                $error[] = '- Sub Judul Masih Kosong';
              }
              if (trim($_POST['urlweb']) == '') {
                $error[] = '- URL Web Masih Kosong';
              }
              
              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=main&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBUTAMA." (id_ad,judul,subjudul,urlweb,tgl_jam,log) VALUES ('$cid_ad','$judul','$subjudul','$urlweb','".date("Y-m-d H:i:s")."','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Banner Utama <b>".$_POST['judul']."</b> Berhasil Dilakukan.</div>";
                }
              }              

              }
              elseif($act == 'update') {

              $judul=$_POST['judul'];
              $subjudul=$_POST['subjudul'];
              $urlweb=$_POST['urlweb'];
              $cid_ad=$_POST['cid_ad'];
              $cid_ut=$_POST['cid_ut'];

              if (trim($_POST['judul']) == '') {
                $error[] = '- Judul Masih Kosong';
              }
              if (trim($_POST['subjudul']) == '') {
                $error[] = '- Sub Judul Masih Kosong';
              }
              if (trim($_POST['urlweb']) == '') {
                $error[] = '- URL Web Masih Kosong';
              }              

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=main&act=edit&id=".base64_encode($cid_ut)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBUTAMA." SET `id_ad`='".$cid_ad."',`judul`='$judul',`subjudul`='$subjudul',`urlweb`='$urlweb',`tgl_jam`='".date("Y-m-d H:i:s")."',`log`='"._DLOG."' WHERE id_ut=$cid_ut");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Banner Utama <b>".$_POST['judul']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

            <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Banner Utama</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBUTAMA."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=main";  
            $limit = 5; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBUTAMA." ORDER BY id_ut DESC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> JUDUL </th>
                    <th> SUB JUDUL </th>
                    <th> FOTO </th>
                    <th> STATUS </th>
                    <th> OPERATOR </th>
                    <th class="td-actions2"> </th>
                  </tr>
                </thead>
                
                <tbody>

                <?php
                $no=$start+1;

                while($rowd = mysql_fetch_object($sqltabel))
                { 

                $sqladmin = $akdb->dbobject("SELECT nama FROM "._TBADMIN." WHERE id_ad=$rowd->id_ad ORDER BY id_ad DESC LIMIT 0,1");

                ?>

                  <tr>
                    <td> <?=$no;?> </td>
                    <td> <?=$rowd->judul;?> </td>
                    <td> <?=$rowd->subjudul;?> </td>
                    <td> <?php if($rowd->foto <> '') { echo"<img src="._URLWEB."up/slider/thumb_".$rowd->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg border=0 alt=nofoto>"; } ?> </td>
                    <td> 
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    if($rowd->status == "0") {
                    echo "<a onclick=\"return confirm('Aktifkan Banner Utama : $rowd->judul');\" href=\""._URLWEB."admin.php?admin=aksi&mod=main&act=aktif&id=".base64_encode($rowd->id_ut)."\"><i class=\"icon-remove-sign\"></i> non aktif</a>";
                    } else {
                    echo "<a onclick=\"return confirm('Non-aktifkan Banner Utama : $rowd->judul');\" href=\""._URLWEB."admin.php?admin=aksi&mod=main&act=nonaktif&id=".base64_encode($rowd->id_ut)."\"><i class=\"icon-ok-sign\"></i> aktif</a>";
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
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Banner Utama : $rowd->judul');\" href=\""._URLWEB."admin.php?admin=apps&mod=main&act=edit&id=".base64_encode($rowd->id_ut)."\" title=\"Edit Banner Utama : $rowd->judul\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Banner Utama $rowd->judul');\" href=\""._URLWEB."admin.php?admin=aksi&mod=main&act=hapus&id=".base64_encode($rowd->id_ut)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>&nbsp;&nbsp;<a href=\""._URLWEB."admin.php?admin=apps&mod=main&act=foto&id=".base64_encode($rowd->id_ut)."\" title=\"Update Foto Banner Utama $rowd->judul\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-camera\"> </i></a>";
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
                    <td colspan="5">*Dihalaman front end hanya ditampilkan <b>5 Banner Utama Terbaru</b> dan fotonya telah di upload dan berstatus aktif.</td>
                    <td colspan="2">Total : <b><?=$total_pages;?></b> data.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
            <br />
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=main&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Banner Utama</button></a></div>
            <br />
            <div align="center"><?=$pagination;?></div>

          </div>
          <!-- /widget -->
          
          <?php
          }
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
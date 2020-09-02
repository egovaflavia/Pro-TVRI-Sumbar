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
                <h3>Entry Program Acara</h3>
              </div> <!-- /widget-header -->
          
                <div class="widget-content"> 

                <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=program&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="kat">Kategori Program</label>
                      <div class="controls">
                        <select class="form-control" id="kat" name="kat" required="required">
                            <option value="">= Pilih Kategori Program =</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="News">News</option>
                            <option value="Culture">Culture</option>
                            <option value="life">Life</option>
                            <option value="Kid">Kid</option>
                            <option value="Sport">Sport</option>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Program</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" maxlength="160" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="jadwal">Jadwal Acara</label>
                      <div class="controls">
                        <input type="text" class="span6" id="jadwal" name="jadwal" maxlength="160" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="video">Kode Embed Youtube</label>
                      <div class="controls">
                        <input type="text" class="span2" id="video" name="video" maxlength="200">
                        <p class="help-block">Contoh : https://www.youtube.com/watch?v=<b>eMhGpzyFdhE</b> Ambil kode yang dicetak tebal saja. Kosong = tanpa video</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="isi">Isi</label>
                      <div class="controls">
                        <textarea name="isi" id="isi" rows="16" cols="50" class="span8" required="required"></textarea>
                        <script>CKEDITOR.replace('isi');</script>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=program" class="btn btn-success">Kembali</a>
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

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBPROGRAM." WHERE id_pg = $id ORDER BY id_pg DESC LIMIT 0,1");
            
          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Program Acara : <?=$sqledit->nama;?></h3>
              </div> <!-- /widget-header -->
          
              <div class="widget-content"> 

              <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=program&act=update" method="post">
                  <fieldset>

                    <div class="control-group">                     
                      <label class="control-label" for="kat">Kategori Program</label>
                      <div class="controls">
                        <select class="form-control" id="kat" name="kat" required="required">
                            <option value="entertainment" <?php if ($sqledit->kat=='Entertainment') { echo"selected=selected"; } ?>>Program Entertainment</option>
                            <option value="news" <?php if ($sqledit->kat=='News') { echo"selected=selected"; } ?>>Program News</option>
                            <option value="culture" <?php if ($sqledit->kat=='Culture') { echo"selected=selected"; } ?>>Program Culture</option>
                            <option value="life" <?php if ($sqledit->kat=='Life') { echo"selected=selected"; } ?>>Program Life</option>
                            <option value="kid" <?php if ($sqledit->kat=='Kid') { echo"selected=selected"; } ?>>Program Kid</option>
                            <option value="sport" <?php if ($sqledit->kat=='Sport') { echo"selected=selected"; } ?>>Program Sport</option>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Program</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" value="<?=$sqledit->nama;?>" maxlength="160" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  

                    <div class="control-group">                     
                      <label class="control-label" for="jadwal">Jadwal Acara</label>
                      <div class="controls">
                        <input type="text" class="span6" id="jadwal" name="jadwal" value="<?=$sqledit->jadwal;?>" maxlength="160" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="video">Kode Embed Youtube</label>
                      <div class="controls">
                        <input type="text" class="span2" id="video" name="video" value="<?=$sqledit->video;?>" maxlength="200">
                        <p class="help-block">Contoh : https://www.youtube.com/watch?v=<b>eMhGpzyFdhE</b> Ambil kode yang dicetak tebal saja. Kosong = tanpa video</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                  

                    <div class="control-group">                     
                      <label class="control-label" for="isi">Isi</label>
                      <div class="controls">
                        <textarea name="isi" id="isi" rows="16" cols="50" class="span8" required="required"><?=$sqledit->isi;?></textarea>
                        <script>CKEDITOR.replace('isi');</script>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>                                        
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=program" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_pg" value="<?=$sqledit->id_pg;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

              </div>

          </div>

          <?php

          } elseif($act == 'foto') {

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBPROGRAM." WHERE id_pg = $id ORDER BY id_pg DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Update Foto Program Acara : <?=$sqledit->nama;?></h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="form-upload" class="form-horizontal" action="<?=_URLWEB;?>admin/prosesfotoprogram.php" method="post" enctype="multipart/form-data" name="form-upload">
                      <fieldset>
                      
                      <div class="control-group">                     
                      <label class="control-label" for="fotokini">Foto Lama :</label>
                      <div class="controls">
                      <?php if($sqledit->foto <> '') { echo"<img src="._URLWEB."up/program/".$sqledit->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg border=0 alt=nofoto>"; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="fotocrop">Foto Crop :</label>
                      <div class="controls">
                      <?php if($sqledit->cfoto <> '') { echo"<img src="._URLWEB."up/program/".$sqledit->cfoto." alt=foto>"; } else { echo""; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="upload">Upload Foto Baru :</label>
                      <div class="controls">
                        <input type="file" class="span4" id="fupload" name="fupload">
                        <p class="help-block"><b>Foto otomatis di upload setelah dipilih.</b> Hanya file foto *gif, *jpg, *png atau *jpeg, ukuran ideal lebar 600px dan tinggi 480px, maksimal 2MB.</p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="message">Message Box :</label>
                      <div class="controls">
                        <p id="up-result"><font color="#ad0000">Foto Baru Belum di Upload...</font></p>
                        <p id="uploading"><img src="<?=_URLWEB;?>img/loadingAnimation.gif" alt="uploading" width="208" height="13" /></p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->
                      <input type="hidden" name="cid_pg" value="<?=$sqledit->id_pg;?>" />                    

                      </fieldset>
                
                </form>
                <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=program" class="btn btn-success">Kembali</a></div>

                </div>

              </div>

          <?php

          } else {

              if($act == 'simpan') {

              $kat=$_POST['kat'];
              $nama=$_POST['nama'];
              $jadwal=$_POST['jadwal'];
              $video=$_POST['video'];
              $isi=$_POST['isi'];
              $cid_ad=$_POST['cid_ad'];
              
              if (trim($_POST['kat']) == '') {
                $error[] = '- Kategori Program Belum Dipilih';
              }
              if (trim($_POST['nama']) == '') {
                $error[] = '- Nama Program Masih Kosong';
              }
              if (trim($_POST['jadwal']) == '') {
                $error[] = '- Jadwal Acara Masih Kosong';
              }
              
              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=program&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBPROGRAM." (id_ad,kat,nama,jadwal,video,isi,tgl_jam,log) VALUES ('$cid_ad','$kat','$nama','$jadwal','$video','$isi','".date("Y-m-d H:i:s")."','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Program Acara <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }              

              }
              elseif($act == 'update') {

              $kat=$_POST['kat'];
              $nama=$_POST['nama'];
              $jadwal=$_POST['jadwal'];
              $video=$_POST['video'];
              $isi=$_POST['isi'];
              $cid_ad=$_POST['cid_ad'];
              $cid_pg=$_POST['cid_pg'];
 
              if (trim($_POST['kat']) == '') {
                $error[] = '- Kategori Program Belum Dipilih';
              }
              if (trim($_POST['nama']) == '') {
                $error[] = '- Nama Program Masih Kosong';
              }
              if (trim($_POST['jadwal']) == '') {
                $error[] = '- Jadwal Acara Masih Kosong';
              }            

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=program&act=edit&id=".base64_encode($cid_pg)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBPROGRAM." SET `id_ad`='".$cid_ad."',`kat`='$kat',`nama`='$nama',`jadwal`='$jadwal',`video`='$video',`isi`='$isi',`tgl_jam`='".date("Y-m-d H:i:s")."',`log`='"._DLOG."' WHERE id_pg=$cid_pg");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Program Acara <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

            <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Program Acara</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBPROGRAM."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=program";  
            $limit = 5; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBPROGRAM." ORDER BY id_pg DESC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> KATEGORI </th>
                    <th> NAMA PROGRAM </th>
                    <th> JADWAL </th>
                    <th> HIT </th>
                    <th> FOTO </th>
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
                    <td> Program <?=$rowd->kat;?> </td>
                    <td> <?php if($rowd->video <> '') { ?> <a class="youtube" href="http://www.youtube.com/watch?v=<?=$rowd->video;?>"><?=$rowd->nama;?></a> <?php } else { echo $rowd->nama; } ?></td>
                    <td> <?=$rowd->jadwal;?> </td>
                    <td> <?=$rowd->hit;?> </td>
                    <td> <?php if($rowd->foto <> '') { echo"<img src="._URLWEB."up/program/".$rowd->cfoto." width=80px alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg width=80px border=0 alt=nofoto>"; } ?> </td>
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Program Acara : $rowd->nama');\" href=\""._URLWEB."admin.php?admin=apps&mod=program&act=edit&id=".base64_encode($rowd->id_pg)."\" title=\"Edit Program Acara : $rowd->nama\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Program Acara $rowd->nama');\" href=\""._URLWEB."admin.php?admin=aksi&mod=program&act=hapus&id=".base64_encode($rowd->id_pg)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>&nbsp;&nbsp;<a href=\""._URLWEB."admin.php?admin=apps&mod=program&act=foto&id=".base64_encode($rowd->id_pg)."\" title=\"Update Foto $rowd->nama\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-camera\"> </i></a>";
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
                    <td colspan="8">Total : <b><?=$total_pages;?></b> data. <b>Klik nama program untuk lihat video</b>.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
            <br />
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=program&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Program Acara</button></a></div>
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

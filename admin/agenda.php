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
                <h3>Entry Agenda Kegiatan</h3>
              </div> <!-- /widget-header -->
          
                <div class="widget-content"> 

                <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=agenda&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="tgl">Tanggal Kegiatan</label>
                      <div class="controls">
                        <input type="text" class="span2" id="tgl" name="tgl" value="<?=date("d/m/Y");?>" maxlength="12" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Kegiatan</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="tempat">Tempat</label>
                      <div class="controls">
                        <input type="text" class="span6" id="tempat" name="tempat" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ket">Keterangan</label>
                      <div class="controls">
                        <input type="text" class="span6" id="ket" name="ket" maxlength="200">
                        <p class="help-block">*isi keterangan agenda <b>jika diperlukan</b> saja.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=agenda" class="btn btn-success">Kembali</a>
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

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBAGENDA." WHERE id_ag = $id ORDER BY id_ag DESC LIMIT 0,1");

            if(substr($sqledit->tgl,0,10) <> "0000-00-00") {

            $ttgl = substr($sqledit->tgl,8,2)."/".substr($sqledit->tgl,5,2)."/".substr($sqledit->tgl,0,4);

            } else { $ttgl = ""; }

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Agenda Kegiatan : <?=$sqledit->nama;?></h3>
              </div> <!-- /widget-header -->
          
              <div class="widget-content"> 

              <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=agenda&act=update" method="post">
                  <fieldset>

                    <div class="control-group">                     
                      <label class="control-label" for="tgl">Tanggal Kegiatan</label>
                      <div class="controls">
                        <input type="text" class="span2" id="tgl" name="tgl" value="<?=$ttgl;?>" maxlength="12" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Kegiatan</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" value="<?=$sqledit->nama;?>" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="tempat">Tempat</label>
                      <div class="controls">
                        <input type="text" class="span6" id="tempat" name="tempat" value="<?=$sqledit->tempat;?>" maxlength="200" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ket">Keterangan</label>
                      <div class="controls">
                        <input type="text" class="span6" id="ket" name="ket" value="<?=$sqledit->ket;?>" maxlength="200">
                        <p class="help-block">*isi keterangan agenda <b>jika diperlukan</b> saja.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>                                        
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=agenda" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ag" value="<?=$sqledit->id_ag;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

              </div>

          </div>

          <?php

          } elseif($act == 'foto') {

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBAGENDA." WHERE id_ag = $id ORDER BY id_ag DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Update Foto Agenda Kegiatan : <?=$sqledit->nama;?></h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="form-upload" class="form-horizontal" action="<?=_URLWEB;?>admin/prosesfotoagenda.php" method="post" enctype="multipart/form-data" name="form-upload">
                      <fieldset>
                      
                      <div class="control-group">                     
                      <label class="control-label" for="fotokini">Foto Lama :</label>
                      <div class="controls">
                      <?php if($sqledit->foto <> '') { echo"<img src="._URLWEB."up/agenda/".$sqledit->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg border=0 alt=nofoto>"; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="fotocrop">Foto Crop :</label>
                      <div class="controls">
                      <?php if($sqledit->cfoto <> '') { echo"<img src="._URLWEB."up/agenda/".$sqledit->cfoto." alt=foto>"; } else { echo""; } ?>
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
                      <input type="hidden" name="cid_ag" value="<?=$sqledit->id_ag;?>" />                    

                      </fieldset>
                
                </form>
                <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=agenda" class="btn btn-success">Kembali</a></div>

                </div>

              </div>

          <?php

          } else {

              if($act == 'simpan') {

              $tgl=$_POST['tgl'];
              $nama=$_POST['nama'];
              $tempat=$_POST['tempat'];
              $ket=$_POST['ket'];

              if($tgl <> '') {
              $tgl = substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
              } else { $tgl = "0000-00-00"; }

              $cid_ad=$_POST['cid_ad'];
              
              if (trim($_POST['tgl']) == '') {
                $error[] = '- Tanggal Belum Di Pilih';
              }
              if (trim($_POST['nama']) == '') {
                $error[] = '- Nama Kegiatan Masih Kosong';
              }
              if (trim($_POST['tempat']) == '') {
                $error[] = '- Tempat Masih Kosong';
              }             

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=agenda&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBAGENDA." (id_ad,tgl,nama,tempat,ket,log) VALUES ('$cid_ad','$tgl','$nama','$tempat','$ket','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Agenda Kegiatan <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }              

              }
              elseif($act == 'update') {

              $tgl=$_POST['tgl'];
              $nama=$_POST['nama'];
              $tempat=$_POST['tempat'];
              $ket=$_POST['ket'];

              if($tgl <> '') {
              $tgl = substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
              } else { $tgl = "0000-00-00"; }

              $cid_ad=$_POST['cid_ad'];
              $cid_ag=$_POST['cid_ag'];

              if (trim($_POST['tgl']) == '') {
                $error[] = '- Tanggal Belum Di Pilih';
              }
              if (trim($_POST['nama']) == '') {
                $error[] = '- Nama Kegiatan Masih Kosong';
              }
              if (trim($_POST['tempat']) == '') {
                $error[] = '- Tempat Masih Kosong';
              }  

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=agenda&act=edit&id=".base64_encode($cid_ag)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBAGENDA." SET `id_ad`='".$cid_ad."',`tgl`='$tgl',`nama`='$nama',`tempat`='$tempat',`ket`='$ket',`log`='"._DLOG."' WHERE id_ag=$cid_ag");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Agenda Kegiatan <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Agenda Kegiatan</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBAGENDA."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=agenda";  
            $limit = 10; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBAGENDA." ORDER BY tgl DESC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> HARI/TANGGAL </th>
                    <th> NAMA KEGIATAN </th>
                    <th> TEMPAT </th>
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
                    <td> <?php $tanggal->contanggal(substr($rowd->tgl,8,2),substr($rowd->tgl,5,2),substr($rowd->tgl,0,4)); ?> </td>
                    <td> <?=$rowd->nama;?> </td>
                    <td> <?=$rowd->tempat;?> </td>
                    <td> <?php if($rowd->foto <> '') { echo"<img src="._URLWEB."up/agenda/".$rowd->cfoto." width=80px alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg width=80px border=0 alt=nofoto>"; } ?> </td>
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Agenda Kegiatan : $rowd->nama');\" href=\""._URLWEB."admin.php?admin=apps&mod=agenda&act=edit&id=".base64_encode($rowd->id_ag)."\" title=\"Edit Agenda Kegiatan $rowd->nama\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Agenda Kegiatan $rowd->nama');\" href=\""._URLWEB."admin.php?admin=aksi&mod=agenda&act=hapus&id=".base64_encode($rowd->id_ag)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>&nbsp;&nbsp;<a href=\""._URLWEB."admin.php?admin=apps&mod=agenda&act=foto&id=".base64_encode($rowd->id_ag)."\" title=\"Update Foto Agenda Kegiatan $rowd->nama\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-camera\"> </i></a>";
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
                    <td colspan="7">Total : <b><?=$total_pages;?></b> data.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
            <br />
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=agenda&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Agenda Kegiatan</button></a></div>
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
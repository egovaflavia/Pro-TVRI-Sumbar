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
                <h3>Entry info</h3>
              </div> <!-- /widget-header -->
          
                <div class="widget-content"> 

                <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=info&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="tahun">Tahun</label>
                      <div class="controls">
                        <select class="form-control" id="tahun" name="tahun" required="required">
                            <option value="">= Pilih Tahun =</option>
                            <?php $tahunkini=date("Y"); $tahunkini1=$tahunkini-10; $tahunkini2=$tahunkini+10; for($tahunx=$tahunkini1; $tahunx<=$tahunkini2; $tahunx++) { ?>
                            <option value="<?=$tahunx;?>" <?php if ($tahunkini==$tahunx) { echo"selected=selected"; } ?>><?=$tahunx;?></option>
                            <? } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    

                    <br>
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=info" class="btn btn-success">Kembali</a>
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

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBMATACARA." WHERE id_ma = $id ORDER BY id_ma DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Informasi : <?=$sqledit->tahun;?></h3>
              </div> <!-- /widget-header -->
          
              <div class="widget-content"> 

              <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=info&act=update" method="post">
                  <fieldset>

                    <div class="control-group">                     
                      <label class="control-label" for="tahun">Tahun</label>
                      <div class="controls">
                        <select class="form-control" id="tahun" name="tahun" required="required">
                            <option value="">= Pilih Tahun =</option>
                            <?php $tahunkini=date("Y"); $tahunkini1=$tahunkini-10; $tahunkini2=$tahunkini+10; for($tahunx=$tahunkini1; $tahunx<=$tahunkini2; $tahunx++) { ?>
                            <option value="<?=$tahunx;?>" <?php if ($sqledit->tahun==$tahunx) { echo"selected=selected"; } ?>><?=$tahunx;?></option>
                            <? } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                   

                    <br>                                        
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=info" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ma" value="<?=$sqledit->id_ma;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

              </div>

          </div>

          <?php

          } elseif($act == 'foto') {

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBMATACARA." WHERE id_ma = $id ORDER BY id_ma DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Update Foto Informasi : <?=$sqledit->tahun;?></h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="form-upload" class="form-horizontal" action="<?=_URLWEB;?>admin/prosesfotoinfo.php" method="post" enctype="multipart/form-data" name="form-upload">
                      <fieldset>
                      
                      <div class="control-group">                     
                      <label class="control-label" for="fotokini">Foto Lama :</label>
                      <div class="controls">
                      <?php if($sqledit->foto <> '') { echo"<img src="._URLWEB."up/info/".$sqledit->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg border=0 alt=nofoto>"; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="upload">Upload Foto Baru :</label>
                      <div class="controls">
                        <input type="file" class="span4" id="fupload" name="fupload">
                        <p class="help-block"><b>Foto otomatis di upload setelah dipilih.</b> Hanya file foto *gif, *jpg, *png atau *jpeg, ukuran ideal lebar 800px, maksimal 2MB.</p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="message">Message Box :</label>
                      <div class="controls">
                        <p id="up-result"><font color="#ad0000">Foto Baru Belum di Upload...</font></p>
                        <p id="uploading"><img src="<?=_URLWEB;?>img/loadingAnimation.gif" alt="uploading" width="208" height="13" /></p>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->
                      <input type="hidden" name="cid_ma" value="<?=$sqledit->id_ma;?>" />                    

                      </fieldset>
                
                </form>
                <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=info" class="btn btn-success">Kembali</a></div>

                </div>

              </div>

          <?php

          } else {

              if($act == 'simpan') {

              $tahun=$_POST['tahun'];
              $cid_ad=$_POST['cid_ad'];
              
              if (trim($_POST['tahun']) == '') {
                $error[] = '- Tahun Belum Dipilih';
              }
              

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=event&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBMATACARA." (id_ad,tahun,tgl_jam,log) VALUES ('$cid_ad','$tahun','".date("Y-m-d H:i:s")."','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Mata Acara <b>".$_POST['tahun']."</b> Berhasil Dilakukan.</div>";
                }
              }              

              }
              elseif($act == 'update') {

              $tahun=$_POST['tahun'];
              $cid_ad=$_POST['cid_ad'];
              $cid_ma=$_POST['cid_ma'];

              if (trim($_POST['tahun']) == '') {
                $error[] = '- Tahun Belum Dipilih';
              }
              

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=event&act=edit&id=".base64_encode($cid_ma)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBMATACARA." SET `id_ad`='".$cid_ad."',`tahun`='$tahun',`tgl_jam`='".date("Y-m-d H:i:s")."',`log`='"._DLOG."' WHERE id_ma=$cid_ma");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Mata Acara <b>".$_POST['tahun']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

            <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Mata Acara</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBMATACARA."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=info";  
            $limit = 5; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBMATACARA." ORDER BY id_ma DESC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> TAHUN </th>
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
                    <td> <?=$rowd->tahun;?> </td>
                    <td> <?=$rowd->hit;?> </td>
                    <td> <?php if($rowd->foto <> '') { echo"<img src="._URLWEB."up/info/thumb_".$rowd->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg border=0 alt=nofoto>"; } ?> </td>
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Mata Acara : $rowd->tahun');\" href=\""._URLWEB."admin.php?admin=apps&mod=info&act=edit&id=".base64_encode($rowd->id_ma)."\" title=\"Edit Mata Acara : $rowd->tahun\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Mata Acara $rowd->tahun');\" href=\""._URLWEB."admin.php?admin=aksi&mod=event&act=hapus&id=".base64_encode($rowd->id_ma)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>&nbsp;&nbsp;<a href=\""._URLWEB."admin.php?admin=apps&mod=event&act=foto&id=".base64_encode($rowd->id_ma)."\" title=\"Update Foto Mata Acara $rowd->tahun\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-camera\"> </i></a>";
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
                    <td colspan="4">*Dihalaman front end hanya ditampilkan data informasi <b>TAHUN TERBARU</b> dan fotonya telah di upload.</td>
                    <td colspan="2">Total : <b><?=$total_pages;?></b> data.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
            <br />
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=info&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Informasi</button></a></div>
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
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

          if($act == 'view') { 

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBPESAN." WHERE id_ps = $id ORDER BY id_ps DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Lihat Pesan Dari : <?=$sqledit->email;?></h3>
              </div> <!-- /widget-header -->
          
              <div class="widget-content"> 

          		<form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=message&act=update" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="lang">Ubah Status</label>
                      <div class="controls">
                         <select class="form-control" id="status" name="status" required="required">
                            <option value="0" <?php if ($sqledit->status=="0") { echo"selected=selected"; } ?>>Belum Di Proses</option>
                            <option value="1" <?php if ($sqledit->status=="1") { echo"selected=selected"; } ?>>Sudah Di Proses</option>
                          </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                      <div class="control-group">                     
                      <label class="control-label" for="tgl">Tanggal Kirim</label>
                      <div class="controls">
                      <?php $tanggal->contanggal(substr($sqledit->tgl_jam,8,2),substr($sqledit->tgl_jam,5,2),substr($sqledit->tgl_jam,0,4)); echo " - ".substr($sqledit->tgl_jam,11,5)." WIB";?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Pengirim</label>
                      <div class="controls">
                      <?php echo $sqledit->nama; ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="email">Email Pengirim</label>
                      <div class="controls">
                      <?php echo $sqledit->email; ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group --> 

                      <div class="control-group">                     
                      <label class="control-label" for="alasan">Tujuan Pesan</label>
                      <div class="controls">
                      <?php echo $sqledit->alasan; ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="pesan">Isi Pesan</label>
                      <div class="controls">
                      <?php echo nl2br($sqledit->pesan); ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="ip">Alamat IP Pengirim</label>
                      <div class="controls">
                      <?php echo $sqledit->ip; ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->                  

                    <br>                                        
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=message" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ps" value="<?=$sqledit->id_ps;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

              </div>

          </div>

          <?php

          } else {

            if($act == 'update') {

              $cid_ad=$_POST['cid_ad'];
              $status=$_POST['status'];
              $cid_ps=$_POST['cid_ps'];

              if (trim($_POST['status']) == '') {
                $error[] = '- Ubah Status Belum Dipilih';
              }

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=message&act=view&id=".base64_encode($cid_ps)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBPESAN." SET `id_ad`='".$cid_ad."',`status`='$status' WHERE id_ps=$cid_ps");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Status Pesan Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Pesan Kritik &amp; Saran</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBPESAN."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=message";  
            $limit = 10; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBPESAN." ORDER BY id_ps DESC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> TANGGAL KIRIM </th>
                    <th> NAMA PENGUNJUNG </th>
                    <th> EMAIL PENGUNJUNG </th>
                    <th> TUJUAN PESAN </th>
                    <th> STATUS </th>                   
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                
                <tbody>

                <?php
                $no=$start+1;

                while($rowd = mysql_fetch_object($sqltabel))
                { 
                
                if($rowd->status == "0") {
                    $status = "Belum Di Proses";
                    $op = "Pengunjung";
                    } else {
                    $status = "Sudah Di Proses";
                    $sqladmin = $akdb->dbobject("SELECT nama FROM "._TBADMIN." WHERE id_ad=$rowd->id_ad ORDER BY id_ad DESC LIMIT 0,1");
                    $op = "<b>".$sqladmin->nama."</b>";
                    }

                ?>

                  <tr>
                    <td> <?=$no;?> </td>
                    <td> <?php $tanggal->contanggalx(substr($rowd->tgl_jam,8,2),substr($rowd->tgl_jam,5,2),substr($rowd->tgl_jam,0,4)); echo " ".substr($rowd->tgl_jam,11,5)." WIB"; ?> </td>
                    <td> <?=$rowd->nama;?> </td>
                    <td> <?=$rowd->email;?> </td>
                    <td> <?=$rowd->alasan;?> </td>
                    <td> <?=$status;?> </td>
                    <td class="td-actions">
                    <?php
                    echo "<a href=\""._URLWEB."admin.php?admin=apps&mod=message&act=view&id=".base64_encode($rowd->id_ps)."\" title=\"Lihat Pesan Dari $rowd->nama\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-zoom-in\"> </i></a>";
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
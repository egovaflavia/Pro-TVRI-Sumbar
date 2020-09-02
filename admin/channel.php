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
                <h3>Entry Data Kanal Baru</h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=channel&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Kanal</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" maxlength="100" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    

                    <div class="control-group">                     
                      <label class="control-label" for="urut">Urutan Kanal</label>
                      <div class="controls">
                        <select name="urut" class="form-control" required="required">
                        <?php 
                        for($i=1;$i<=30;$i++){ 
                          echo "<option value=\"".$i."\">".$i."</option>";
                        } 
                        ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br />
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=channel" class="btn btn-success">Kembali</a>
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

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBKANAL." WHERE id_kn = $id ORDER BY id_kn DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Data Kanal : <?=$sqledit->nama;?></h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=channel&act=update" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="nama">Nama Kanal</label>
                      <div class="controls">
                        <input type="text" class="span6" id="nama" name="nama" value="<?=$sqledit->nama;?>" maxlength="100" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    

                    <div class="control-group">                     
                      <label class="control-label" for="urut">Urutan Kanal</label>
                      <div class="controls">
                        <select name="urut" class="form-control" required="required">
                        <?php 
                        for($i=1;$i<=30;$i++){ 
                          echo "<option value=\"".$i."\"";
                          if($sqledit->urut == $i) { echo "selected=selected";}
                          echo ">".$i."</option>";
                        } 
                        ?>
                        </select>
                        </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                      
                    <br />                    
                   
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=channel" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_kn" value="<?=$sqledit->id_kn;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

                </div>

              </div>

          <?php

          } else {

            if($act == 'simpan') {

              $nama=$_POST['nama'];
              $urut=$_POST['urut']; 
              $cid_ad=$_POST['cid_ad'];            
              
              if (trim($_POST['nama']) == '') {
                $error[] = '- Nama Kanal Masih Kosong';
              }
              if (trim($_POST['urut']) == '') {
                $error[] = '- Urutan Kanal Belum Dipilih';
              }
              
              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data Kanal :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=channel&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBKANAL." (id_ad,nama,urut,log) VALUES ('$cid_ad','$nama','$urut','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Kanal <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }

            } elseif($act == 'update') {

              $nama=$_POST['nama'];
              $urut=$_POST['urut'];
              $cid_ad=$_POST['cid_ad'];
              $cid_kn=$_POST['cid_kn'];

              if (trim($_POST['nama']) == '') {
                $error[] = '- Nama Kanal Masih Kosong';
              }
              if (trim($_POST['urut']) == '') {
                $error[] = '- Urutan Kanal Belum Dipilih';
              }

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data Kanal :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=channel&act=edit&id=".base64_encode($cid_kn)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBKANAL." SET `id_ad`='".$cid_ad."',`nama`='$nama',`urut`='$urut',`log`='"._DLOG."' WHERE id_kn=$cid_kn");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Kanal <b>".$_POST['nama']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Data Kanal</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBKANAL."");
            $total_pages = $total_pages->num;

            $targetpage = _URLWEB."admin.php?admin=apps&mod=channel";  
            $limit = 10; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBKANAL." ORDER BY nama ASC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> NAMA </th>
                    <th> URUTAN KANAL </th>
                    <th> OPERATOR </th>
                    <th class="td-actions"> </th>
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
                    <td> <?=$rowd->nama;?> </td>
                    <td> <?=$rowd->urut;?> </td>
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Data Kanal : $rowd->nama');\" href=\""._URLWEB."admin.php?admin=apps&mod=channel&act=edit&id=".base64_encode($rowd->id_kn)."\" title=\"Edit Data Kanal\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>";
                    }
                    else {
                    echo "";
                    }
                    ?>
                    </td>
                  </tr>
                  <?php 
                  $no++;
                    } 
                  ?>
                  <tr>
                    <td colspan="5">Total : <b><?=$total_pages;?></b> Kanal.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
            <br />
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=channel&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Data Kanal</button></a></div>
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
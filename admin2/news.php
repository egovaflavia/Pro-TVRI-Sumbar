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
                <h3>Entry Berita</h3>
              </div> <!-- /widget-header -->
          
                <div class="widget-content"> 

                <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=news&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="media">Sumber Media</label>
                      <div class="controls">
                        <select class="form-control" id="id_md" name="id_md" required="required">
                            <option value="">= Pilih Sumber Media =</option>
                            <?php
                            $sqlmd = $akdb->dbquery("SELECT id_md, nama FROM "._TBMEDIA." ORDER BY nama ASC");
                            while($rowmd = mysql_fetch_object($sqlmd)) { 
                            echo "<option value='".$rowmd->id_md."'>".$rowmd->nama."</option>";
                            }
                            ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="wilayah">Wilayah</label>
                      <div class="controls">
                        <select class="form-control" id="id_wl" name="id_wl" required="required">
                            <option value="">= Pilih Wilayah =</option>
                            <?php
                            $sqlwl = $akdb->dbquery("SELECT id_wl, nama FROM "._TBWILAYAH." ORDER BY nama ASC");
                            while($rowwl = mysql_fetch_object($sqlwl)) { 
                            echo "<option value='".$rowwl->id_wl."'>".$rowwl->nama."</option>";
                            }
                            ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="kanal">Kanal</label>
                      <div class="controls">
                        <select class="form-control" id="id_kn" name="id_kn" required="required">
                            <option value="">= Pilih Kanal =</option>
                            <?php
                            $sqlkn = $akdb->dbquery("SELECT id_kn, nama FROM "._TBKANAL." ORDER BY nama ASC");
                            while($rowkn = mysql_fetch_object($sqlkn)) { 
                            echo "<option value='".$rowkn->id_kn."'>".$rowkn->nama."</option>";
                            }
                            ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="judul">Judul</label>
                      <div class="controls">
                        <input type="text" class="span8" id="judul" name="judul" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="subjudul">Sub Judul</label>
                      <div class="controls">
                        <input type="text" class="span8" id="subjudul" name="subjudul" maxlength="255">
                        <p class="help-block">*Jika tidak ada sub judul, kosongkan saja.</p>     
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="wartawan">Wartawan</label>
                      <div class="controls">
                        <input type="text" class="span4" id="wartawan" name="wartawan" maxlength="100" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                    
                    
                    <div class="control-group">                     
                      <label class="control-label" for="ringkasan">Ringkasan</label>
                      <div class="controls">
                        <textarea name="ringkasan" id="ringkasan" rows="6" cols="50" class="span6" required="required"></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="isi">Isi</label>
                      <div class="controls">
                        <textarea name="isi" id="isi" rows="16" cols="50" class="span8" required="required"></textarea>
                        <script>CKEDITOR.replace('isi');</script>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="tgl">Tanggal</label>
                      <div class="controls">
                        <input type="text" class="span2" id="tgl" name="tgl" value="<?=date("d/m/Y");?>" maxlength="12" required="required">&nbsp;Jam&nbsp;<input type="text" class="span2" id="jam" name="jam" value="<?=date("H:i:s");?>" maxlength="8" required="required">&nbsp;WIB
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="headline">Headline</label>
                      <div class="controls">
                        <select class="form-control" id="headline" name="headline" required="required">
                            <option value="0">Tidak</option>
                            <option value="1">Headline</option>
                        </select>  
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="komentar">Komentar</label>
                      <div class="controls">
                        <select class="form-control" id="komentar" name="komentar" required="required">
                            <option value="1">Boleh Dikomentari</option>
                            <option value="0">Tidak Boleh Dikomentari</option>
                        </select>  
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="tag">Tags</label>
                      <div class="controls">
                        <input type="text" class="tags" id="tag" name="tag" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=news" class="btn btn-success">Kembali</a>
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

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBBERITA." WHERE id_br = $id ORDER BY id_br DESC LIMIT 0,1");

            if(substr($sqledit->tgl_jam,0,10) <> "0000-00-00") {

            $ttgl = substr($sqledit->tgl_jam,8,2)."/".substr($sqledit->tgl_jam,5,2)."/".substr($sqledit->tgl_jam,0,4);

            } else { $ttgl = ""; }

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Berita : <?=$sqledit->judul;?></h3>
              </div> <!-- /widget-header -->
          
              <div class="widget-content"> 

              <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=news&act=update" method="post">
                  <fieldset>

                    <div class="control-group">                     
                      <label class="control-label" for="media">Sumber Media</label>
                      <div class="controls">
                        <select class="form-control" id="id_md" name="id_md" required="required">
                            <?php
                            $sqlmd = $akdb->dbquery("SELECT id_md, nama FROM "._TBMEDIA." ORDER BY nama ASC");
                            while($rowmd = mysql_fetch_object($sqlmd)) { 
                            echo "<option value='".$rowmd->id_md."'"; if ($sqledit->id_md==$rowmd->id_md) { echo"selected=selected"; } echo">".$rowmd->nama."</option>";
                            }
                            ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="wilayah">Wilayah</label>
                      <div class="controls">
                        <select class="form-control" id="id_wl" name="id_wl" required="required">
                            <?php
                            $sqlwl = $akdb->dbquery("SELECT id_wl, nama FROM "._TBWILAYAH." ORDER BY nama ASC");
                            while($rowwl = mysql_fetch_object($sqlwl)) { 
                            echo "<option value='".$rowwl->id_wl."'"; if ($sqledit->id_wl==$rowwl->id_wl) { echo"selected=selected"; } echo">".$rowwl->nama."</option>";
                            }
                            ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="kanal">Kanal</label>
                      <div class="controls">
                        <select class="form-control" id="id_kn" name="id_kn" required="required">
                            <?php
                            $sqlkn = $akdb->dbquery("SELECT id_kn, nama FROM "._TBKANAL." ORDER BY nama ASC");
                            while($rowkn = mysql_fetch_object($sqlkn)) { 
                            echo "<option value='".$rowkn->id_kn."'"; if ($sqledit->id_kn==$rowkn->id_kn) { echo"selected=selected"; } echo">".$rowkn->nama."</option>";
                            }
                            ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="judul">Judul</label>
                      <div class="controls">
                        <input type="text" class="span8" id="judul" name="judul" value="<?=$sqledit->judul;?>" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  

                    <div class="control-group">                     
                      <label class="control-label" for="subjudul">Sub Judul</label>
                      <div class="controls">
                        <input type="text" class="span8" id="subjudul" name="subjudul" value="<?=$sqledit->subjudul;?>" maxlength="255">
                        <p class="help-block">*Jika tidak ada sub judul, kosongkan saja.</p>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="wartawan">Wartawan</label>
                      <div class="controls">
                        <input type="text" class="span4" id="wartawan" name="wartawan" value="<?=$sqledit->wartawan;?>" maxlength="100" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->                  
                    
                    <div class="control-group">                     
                      <label class="control-label" for="ringkasan">Ringkasan</label>
                      <div class="controls">
                        <textarea name="ringkasan" id="ringkasan" rows="6" cols="50" class="span6" required="required"><?=$sqledit->ringkasan;?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 

                    <div class="control-group">                     
                      <label class="control-label" for="isi">Isi</label>
                      <div class="controls">
                        <textarea name="isi" id="isi" rows="16" cols="50" class="span8" required="required"><?=$sqledit->isi;?></textarea>
                        <script>CKEDITOR.replace('isi');</script>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="tgl">Tanggal</label>
                      <div class="controls">
                        <input type="text" class="span2" id="tgl" name="tgl" value="<?=$ttgl;?>" maxlength="12" required="required">&nbsp;Jam&nbsp;<input type="text" class="span2" id="jam" name="jam" value="<?=substr($sqledit->tgl_jam,11,8);?>" maxlength="8" required="required">&nbsp;WIB
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="headline">Headline</label>
                      <div class="controls">
                        <select class="form-control" id="headline" name="headline" required="required">
                            <option value="0" <?php if ($sqledit->headline==0) { echo"selected=selected"; } ?>>Tidak</option>
                            <option value="1" <?php if ($sqledit->headline==1) { echo"selected=selected"; } ?>>Headline</option>
                        </select>  
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="komentar">Komentar</label>
                      <div class="controls">
                        <select class="form-control" id="komentar" name="komentar" required="required">
                            <option value="1" <?php if ($sqledit->komentar==1) { echo"selected=selected"; } ?>>Boleh Dikomentari</option>
                            <option value="0" <?php if ($sqledit->komentar==0) { echo"selected=selected"; } ?>>Tidak Boleh Dikomentari</option>
                        </select>  
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="tag">Tags</label>
                      <div class="controls">
                        <input type="text" class="tags" id="tag" name="tag" value="<?=$sqledit->tag;?>" maxlength="255" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>                                        
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=news" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_br" value="<?=$sqledit->id_br;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

              </div>

          </div>

          <?php

          } elseif($act == 'foto') {

            $id = base64_decode($_GET['id']);

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBBERITA." WHERE id_br = $id ORDER BY id_br DESC LIMIT 0,1");

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Update Foto Berita : <?=$sqledit->judul;?></h3>
            </div> <!-- /widget-header -->
          
          <div class="widget-content"> 

          <form id="form-upload" class="form-horizontal" action="<?=_URLWEB;?>admin/prosesfotonews.php" method="post" enctype="multipart/form-data" name="form-upload">
                      <fieldset>
                      
                      <div class="control-group">                     
                      <label class="control-label" for="fotokini">Foto Lama :</label>
                      <div class="controls">
                      <?php if($sqledit->foto <> '') { echo"<img src="._URLWEB."up/berita/".$sqledit->foto." alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg border=0 alt=nofoto>"; } ?>
                      </div> <!-- /controls -->       
                      </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" for="fotocrop">Foto Crop :</label>
                      <div class="controls">
                      <?php if($sqledit->cfoto <> '') { echo"<img src="._URLWEB."up/berita/".$sqledit->cfoto." alt=foto>"; } else { echo""; } ?>
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
                      <input type="hidden" name="cid_br" value="<?=$sqledit->id_br;?>" />                    

                      </fieldset>
                
                </form>
                <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=news" class="btn btn-success">Kembali</a></div>

                </div>

              </div>

          <?php

          } else {

              if($act == 'simpan') {

              $id_md=$_POST['id_md'];
              $id_wl=$_POST['id_wl'];
              $id_kn=$_POST['id_kn'];
              $judul=$_POST['judul'];
              $subjudul=$_POST['subjudul'];
              $wartawan=$_POST['wartawan'];
              $ringkasan=$_POST['ringkasan'];
              $isi=$_POST['isi'];
              $headline=$_POST['headline'];
              $tag=$_POST['tag'];
              $komentar=$_POST['komentar'];
              $cid_ad=$_POST['cid_ad'];
              $tgl=$_POST['tgl'];
              $jam=$_POST['jam'];
              if($tgl <> '') {
              $tgl = substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
              } else { $tgl = "0000-00-00"; }
              $tgl_jam = $tgl." ".$jam;
              
              if (trim($_POST['id_md']) == '') {
                $error[] = '- Sumber Media Belum Dipilih';
              }
              if (trim($_POST['id_wl']) == '') {
                $error[] = '- Wilayah Belum Dipilih';
              }
              if (trim($_POST['id_kn']) == '') {
                $error[] = '- Kanal Belum Dipilih';
              }
              if (trim($_POST['judul']) == '') {
                $error[] = '- Judul Masih Kosong';
              }
              if (trim($_POST['wartawan']) == '') {
                $error[] = '- Wartawan Masih Kosong';
              }
              if (trim($_POST['ringkasan']) == '') {
                $error[] = '- Ringkasan Masih Kosong';
              }
              if (trim($_POST['tag']) == '') {
                $error[] = '- Tags Berita Belum Diisi';
              }
              if (trim($_POST['tgl']) == '') {
                $error[] = '- Tanggal Belum Diisi';
              }
              if (trim($_POST['jam']) == '') {
                $error[] = '- Jam Belum Diisi';
              }
              

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=news&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBBERITA." (id_ad,id_md,id_wl,id_kn,judul,subjudul,wartawan,headline,ringkasan,isi,tgl_jam,komentar,tag,log) VALUES ('$cid_ad','$id_md','$id_wl','$id_kn','$judul','$subjudul','$wartawan','$headline','$ringkasan','$isi','$tgl_jam','$komentar','$tag','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Berita <b>".$_POST['judul']."</b> Berhasil Dilakukan.</div>";
                }
              }              

              }
              elseif($act == 'update') {

              $id_md=$_POST['id_md'];
              $id_wl=$_POST['id_wl'];
              $id_kn=$_POST['id_kn'];
              $judul=$_POST['judul'];
              $subjudul=$_POST['subjudul'];
              $wartawan=$_POST['wartawan'];
              $ringkasan=$_POST['ringkasan'];
              $isi=$_POST['isi'];
              $headline=$_POST['headline'];
              $tag=$_POST['tag'];
              $komentar=$_POST['komentar'];
              $cid_ad=$_POST['cid_ad'];
              $cid_br=$_POST['cid_br'];
              $tgl=$_POST['tgl'];
              $jam=$_POST['jam'];
              if($tgl <> '') {
              $tgl = substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
              } else { $tgl = "0000-00-00"; }
              $tgl_jam = $tgl." ".$jam;

              if (trim($_POST['id_md']) == '') {
                $error[] = '- Sumber Media Belum Dipilih';
              }
              if (trim($_POST['id_wl']) == '') {
                $error[] = '- Wilayah Belum Dipilih';
              }
              if (trim($_POST['id_kn']) == '') {
                $error[] = '- Kanal Belum Dipilih';
              }
              if (trim($_POST['judul']) == '') {
                $error[] = '- Judul Masih Kosong';
              }
              if (trim($_POST['wartawan']) == '') {
                $error[] = '- Wartawan Masih Kosong';
              }
              if (trim($_POST['ringkasan']) == '') {
                $error[] = '- Ringkasan Masih Kosong';
              }
              if (trim($_POST['tag']) == '') {
                $error[] = '- Tags Berita Belum Diisi';
              }
              if (trim($_POST['tgl']) == '') {
                $error[] = '- Tanggal Belum Diisi';
              }
              if (trim($_POST['jam']) == '') {
                $error[] = '- Jam Belum Diisi';
              }
              

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=news&act=edit&id=".base64_encode($cid_br)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBBERITA." SET `id_ad`='".$cid_ad."',`id_md`='$id_md',`id_wl`='$id_wl',`id_kn`='$id_kn',`judul`='$judul',`subjudul`='$subjudul',`wartawan`='$wartawan',`headline`='$headline',`ringkasan`='$ringkasan',`isi`='$isi',`tgl_jam`='$tgl_jam',`komentar`='$komentar',`tag`='$tag',`log`='"._DLOG."' WHERE id_br=$cid_br");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Berita <b>".$_POST['judul']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

            <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Headline Berita</h3>
            </div>

            <?php

            $sqlhdl = $akdb->dbquery("SELECT * FROM "._TBBERITA." WHERE headline='1' ORDER BY id_br DESC LIMIT 0, 5");
            
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> KANAL </th>
                    <th> WARTAWAN </th>
                    <th> JUDUL </th>
                    <th> HIT </th>
                    <th> FOTO </th>
                    <th> OPERATOR </th>
                    <th class="td-actions2"> </th>
                  </tr>
                </thead>
                
                <tbody>

                <?php
                $no=1;

                while($rowhdl = mysql_fetch_object($sqlhdl))
                { 
                
                $sqlkanal = $akdb->dbobject("SELECT nama FROM "._TBKANAL." WHERE id_kn=$rowhdl->id_kn ORDER BY id_kn DESC LIMIT 0,1");

                $sqladmin = $akdb->dbobject("SELECT nama FROM "._TBADMIN." WHERE id_ad=$rowhdl->id_ad ORDER BY id_ad DESC LIMIT 0,1");

                ?>

                  <tr>
                    <td> <?=$no;?> </td>
                    <td> <?=$sqlkanal->nama;?> </td>
                    <td> <?=$rowhdl->wartawan;?> </td>
                    <td> <?=$rowhdl->judul;?> </td>
                    <td> <?=$rowhdl->hit;?> </td>
                    <td> <?php if($rowhdl->foto <> '') { echo"<img src="._URLWEB."up/berita/".$rowhdl->cfoto." width=80px alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg width=80px border=0 alt=nofoto>"; } ?> </td>
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowhdl->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Berita : $rowhdl->judul');\" href=\""._URLWEB."admin.php?admin=apps&mod=news&act=edit&id=".base64_encode($rowhdl->id_br)."\" title=\"Edit Berita : $rowhdl->judul\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Berita $rowhdl->judul');\" href=\""._URLWEB."admin.php?admin=aksi&mod=news&act=hapus&id=".base64_encode($rowhdl->id_br)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>&nbsp;&nbsp;<a href=\""._URLWEB."admin.php?admin=apps&mod=news&act=foto&id=".base64_encode($rowhdl->id_br)."\" title=\"Update Foto $rowhdl->judul\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-camera\"> </i></a>";
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
                    <td colspan="8">Hanya tampil maksimal 5 berita di <b>Headline Berita</b>.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
             </div>
         	 <!-- /widget -->

            <br>

            <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Berita</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBBERITA."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=news";  
            $limit = 5; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBBERITA." ORDER BY id_br DESC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> KANAL </th>
                    <th> WARTAWAN </th>
                    <th> JUDUL </th>
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
                
                $sqlkanal = $akdb->dbobject("SELECT nama FROM "._TBKANAL." WHERE id_kn=$rowd->id_kn ORDER BY id_kn DESC LIMIT 0,1");

                $sqladmin = $akdb->dbobject("SELECT nama FROM "._TBADMIN." WHERE id_ad=$rowd->id_ad ORDER BY id_ad DESC LIMIT 0,1");

                ?>

                  <tr>
                    <td> <?=$no;?> </td>
                    <td> <?=$sqlkanal->nama;?> </td>
                    <td> <?=$rowd->wartawan;?> </td>
                    <td> <?=$rowd->judul;?> </td>
                    <td> <?=$rowd->hit;?> </td>
                    <td> <?php if($rowd->foto <> '') { echo"<img src="._URLWEB."up/berita/".$rowd->cfoto." width=80px alt=foto>"; } else { echo"<img src="._URLWEB."img/no_foto_small.jpg width=80px border=0 alt=nofoto>"; } ?> </td>
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Berita : $rowd->judul');\" href=\""._URLWEB."admin.php?admin=apps&mod=news&act=edit&id=".base64_encode($rowd->id_br)."\" title=\"Edit Berita : $rowd->judul\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Berita $rowd->judul');\" href=\""._URLWEB."admin.php?admin=aksi&mod=news&act=hapus&id=".base64_encode($rowd->id_br)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>&nbsp;&nbsp;<a href=\""._URLWEB."admin.php?admin=apps&mod=news&act=foto&id=".base64_encode($rowd->id_br)."\" title=\"Update Foto $rowd->judul\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-camera\"> </i></a>";
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
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=news&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Berita</button></a></div>
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
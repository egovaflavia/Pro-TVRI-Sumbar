<?php if (!defined('_VALID_ACCESS')) {
  header("location: index.php");
  die;
}
error_reporting(0);
if ((isset($_SESSION['uname'])) and ($_SESSION['typea']) and ($_SESSION['pword']) and ($_SESSION['id_ada'])) {

  $akdb = new aksesdb;
  $akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

  if (isset($_GET["act"]))
    $act = $_GET["act"];
  else
    $act = "";

  $tanggal = new tanggal;

?>

  <script type="text/javascript">
    $().ready(function() {
      $("#kat").autocomplete("admin/getkatphoto.php", {
        width: 550,
        matchContains: true,
        selectFirst: false
      });
    });
  </script>

  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="span12">

            <?php

            if ($act == 'tambah') {

            ?>
              <div class="widget ">

                <div class="widget-header">
                  <i class="icon-pencil"></i>
                  <h3>Entry Data Foto</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                  <form id="entry" class="form-horizontal" action="<?= _URLWEB; ?>admin.php?admin=apps&mod=custom&act=simpan" method="post">
                    <fieldset>

                      <div class="control-group">
                        <label class="control-label" for="judul">Judul</label>
                        <div class="controls">
                          <input type="text" class="span8" id="judul" name="judul" maxlength="255" required="required">
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <div class="control-group">
                        <label class="control-label" for="oleh">Oleh</label>
                        <div class="controls">
                          <input type="text" class="span4" id="oleh" name="oleh" maxlength="100" required="required">
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <div class="control-group">
                        <label class="control-label" for="kat">Kategori</label>
                        <div class="controls">
                          <input type="text" class="span6" id="kat" name="kat" maxlength="kat" required="required">
                          <!--input type="button" value="Get Value" /-->
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <div class="control-group">
                        <label class="control-label" for="info">Info Foto</label>
                        <div class="controls">
                          <textarea name="info" id="info" rows="6" cols="50" class="span6" required="required"></textarea>
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <br>

                      <div class="form-actions">
                        <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= _URLWEB; ?>admin.php?admin=apps&mod=custom" class="btn btn-success">Kembali</a>
                      </div> <!-- /form-actions -->
                    </fieldset>
                    <input type="hidden" name="cid_ad" value="<?= $ida; ?>" />
                  </form>

                </div>

              </div>
            <?php

            } elseif ($act == 'edit') {

              $id = base64_decode($_GET['id']);
              $sqledit = $akdb->dbobject("SELECT * FROM " . _TBCUSTOM . " WHERE `custom_id` = $id ORDER BY `custom_id` DESC LIMIT 0,1");
              // var_dump($sqledit);

            ?>

              <div class="widget ">

                <div class="widget-header">
                  <i class="icon-pencil"></i>
                  <h3>Edit Data Custom : <?= $sqledit->judul; ?></h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                  <form id="edit" class="form-horizontal" action="<?= _URLWEB; ?>admin.php?admin=apps&mod=custom&act=update" method="post">
                    <fieldset>

                      <div class="control-group">
                        <label class="control-label" for="warna">Warna</label>
                        <div class="controls">
                          <input type="color" class="span4" id="warna" name="warna" value="<?= $sqledit->custom_kode; ?>" maxlength="100" required="required">
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <br>

                      <div class="form-actions">
                        <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= _URLWEB; ?>admin.php?admin=apps&mod=custom" class="btn btn-success">Kembali</a>
                      </div> <!-- /form-actions -->
                    </fieldset>
                    <input type="hidden" name="id" value="<?= $sqledit->custom_id; ?>" />
                  </form>

                </div>

              </div>

            <?php

            } elseif ($act == 'foto') {

              $id = base64_decode($_GET['id']);

              $sqledit = $akdb->dbobject("SELECT * FROM " . _TBCUSTOM . " WHERE id_ft = $id ORDER BY id_ft DESC LIMIT 0,1");

            ?>

              <div class="widget ">

                <div class="widget-header">
                  <i class="icon-pencil"></i>
                  <h3>Update Foto : <?= $sqledit->judul; ?></h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                  <form id="form-upload" class="form-horizontal" action="<?= _URLWEB; ?>admin/prosesfotophoto.php" method="post" enctype="multipart/form-data" name="form-upload">
                    <fieldset>

                      <div class="control-group">
                        <label class="control-label" for="fotokini">Foto Lama :</label>
                        <div class="controls">
                          <?php if ($sqledit->foto <> '') {
                            echo "<img src=" . _URLWEB . "up/foto/" . $sqledit->foto . " alt=foto>";
                          } else {
                            echo "<img src=" . _URLWEB . "img/no_foto_small.jpg border=0 alt=nofoto>";
                          } ?>
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <div class="control-group">
                        <label class="control-label" for="fotocrop">Foto Crop :</label>
                        <div class="controls">
                          <?php if ($sqledit->cfoto <> '') {
                            echo "<img src=" . _URLWEB . "up/foto/" . $sqledit->cfoto . " alt=foto>";
                          } else {
                            echo "";
                          } ?>
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <div class="control-group">
                        <label class="control-label" for="upload">Upload Foto Baru :</label>
                        <div class="controls">
                          <input type="file" class="span4" id="fupload" name="fupload">
                          <p class="help-block"><b>Foto otomatis di upload setelah dipilih.</b> Hanya file foto *gif, *jpg, *png atau *jpeg, ukuran ideal (800 x 500)px, maksimal 2MB.</p>
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->

                      <div class="control-group">
                        <label class="control-label" for="message">Message Box :</label>
                        <div class="controls">
                          <p id="up-result">
                            <font color="#ad0000">Foto Baru Belum di Upload...</font>
                          </p>
                          <p id="uploading"><img src="<?= _URLWEB; ?>img/loadingAnimation.gif" alt="uploading" width="208" height="13" /></p>
                        </div> <!-- /controls -->
                      </div> <!-- /control-group -->
                      <input type="hidden" name="cid_ft" value="<?= $sqledit->id_ft; ?>" />

                    </fieldset>

                  </form>
                  <div><a href="<?= _URLWEB; ?>admin.php?admin=apps&mod=custom" class="btn btn-success">Kembali</a></div>

                </div>

              </div>

            <?php

            } else {

              if ($act == 'simpan') {

                $judul = $_POST['judul'];
                $oleh = $_POST['oleh'];
                $info = $_POST['info'];
                $kat = $_POST['kat'];
                $cid_ad = $_POST['cid_ad'];

                if (trim($_POST['judul']) == '') {
                  $error[] = '- Judul Masih Kosong';
                }
                if (trim($_POST['oleh']) == '') {
                  $error[] = '- Oleh Masih Kosong';
                }
                if (trim($_POST['info']) == '') {
                  $error[] = '- Info Foto Masih Kosong';
                }
                if (trim($_POST['kat']) == '') {
                  $error[] = '- Kategori Foto Belum Ada';
                }


                if (isset($error)) {
                  $error = $error;
                } else {
                  $error = "";
                }
                if ($error <> '') {
                  echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data :</strong><br>" . implode('<br />', $error) . "</div><br><a href=\"" . _URLWEB . "admin.php?admin=apps&mod=custom&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
                } else {

                  $sqlsimpan = $akdb->dbquery("INSERT INTO " . _TBCUSTOM . " (id_ad,judul,oleh,info,tgl_jam,kat,log) VALUES ('$cid_ad','$judul','$oleh','$info','" . date("Y-m-d H:i:s") . "','$kat','" . _DLOG . "')");

                  if ($sqlsimpan) {
                    echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Foto <b>" . $_POST['judul'] . "</b> Berhasil Dilakukan.</div>";
                  }
                }
              } elseif ($act == 'update') {

                $warna = $_POST['warna'];
                $id = $_POST['id'];
                // var_dump($warna);
                // var_dump($id);
                // exit;

                if (trim($_POST['warna']) == '') {
                  $error[] = '- Warna Masih Kosong';
                }

                if (isset($error)) {
                  $error = $error;
                } else {
                  $error = "";
                }
                if ($error <> '') {
                  echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>" . implode('<br />', $error) . "</div><br><a href=\"" . _URLWEB . "admin.php?admin=apps&mod=custom&act=edit&id=" . base64_encode($id) . "\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
                } else {

                  // echo "UPDATE " . _TBCUSTOM . " SET `custom_kode`='$warna' WHERE `custom_id`=$id";
                  // exit;

                  $sqlupdate = $akdb->dbquery("UPDATE " . _TBCUSTOM . " SET `custom_kode`='$warna' WHERE `custom_id`=$id");

                  if ($sqlupdate) {
                    // echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Foto <b>" . $_POST['judul'] . "</b> Berhasil Dilakukan.</div>";
                  }
                }
              }

            ?>

              <div class="widget widget-table action-table">
                <div class="widget-header"> <i class="icon-th-list"></i>
                  <h3>Custom</h3>
                </div>

                <?php
                $adjacents = 2;
                $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBCUSTOM . "");
                $total_pages = $total_pages->num;
                $targetpage = _URLWEB . "admin.php?admin=apps&mod=custom";
                $limit = 5;

                if (isset($_GET["page"]))
                  $page = $_GET["page"];
                else
                  $page = "";

                if ($page)
                  $start = ($page - 1) * $limit;
                else
                  $start = 0;
                $sqltabel = $akdb->dbquery("SELECT * FROM " . _TBCUSTOM . " ORDER BY custom_id ASC LIMIT $start, $limit");

                include_once "inc/admin.pagination.php";
                ?>

                <!-- /widget-header -->
                <div class="widget-content">
                  <?php // $nama = 'Egova' 
                  ?>
                  <?php // $belum = base64_encode($nama) 
                  ?>
                  <?php // base64_decode($belum)  
                  ?>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> NO </th>
                        <th> Nama Section </th>
                        <th> Kode Warna </th>
                        <th> Warna </th>
                        <th> Lihat </th>
                        <th class="td-actions2"> </th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                      $no = $start + 1;

                      while ($rowd = mysql_fetch_object($sqltabel)) {

                        $sqladmin = $akdb->dbobject("SELECT nama FROM " . _TBADMIN . " WHERE id_ad=$rowd->id_ad ORDER BY id_ad DESC LIMIT 0,1");
                      ?>

                        <tr>
                          <td> <?= $no; ?> </td>
                          <td> <?= $rowd->custom_nama; ?> </td>
                          <td style="background-color: <?= $rowd->custom_kode ?>;"></td>
                          <td> <?= $rowd->custom_kode; ?> </td>
                          <td> <a href="<?= _URLWEB . $rowd->custom_lihat; ?>" target="_blank">Klik Disini</a> </td>
                          <td class="td-actions">
                            <?php
                            if ($typeuser == 'admin' or $rowd->id_ad == $ida) {
                              echo "<a  href=\"" . _URLWEB . "admin.php?admin=apps&mod=custom&act=edit&id=" . base64_encode($rowd->custom_id) . "\" title=\"Edit Data Foto : $rowd->judul\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>";
                            } else {
                              echo "";
                            }
                            ?>
                          </td>
                        </tr>
                      <?php $no++;
                      }
                      ?>
                      <tr>
                        <td colspan="2">Total : <b><?= $total_pages; ?></b> data.</td>
                      </tr>

                    </tbody>
                  </table>

                </div>
                <!-- /widget-content -->
                <br />
                <div><a href="<?= _URLWEB; ?>admin.php?admin=apps&mod=custom&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Data Foto</button></a></div>
                <br />
                <div align="center"><?= $pagination; ?></div>

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
} else {
  header("location:admin.php?admin=login&x=");
  die;
}
?>
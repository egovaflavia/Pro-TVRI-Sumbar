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
                <h3>Entry Rangkaian Acara</h3>
              </div> <!-- /widget-header -->
          
                <div class="widget-content"> 

                <form id="entry" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=series&act=simpan" method="post">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" for="tgl">Tanggal Acara</label>
                      <div class="controls">
                        <input type="text" class="span2" id="tgl" name="tgl" value="<?=date("d/m/Y");?>" maxlength="12" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="ctt">Catatan :</label>
                      <div class="controls">
                        <b>Isi rangkaian acara secara berurutan dan secukupnya. Form dibawah tidak harus penuh.</b>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="jam1">Jam 1</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam1" name="jam1" maxlength="8" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac1">Acara 1</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac1" name="ac1" maxlength="50" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam2">Jam 2</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam2" name="jam2" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac2">Acara 2</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac2" name="ac2" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam3">Jam 3</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam3" name="jam3" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac3">Acara 3</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac3" name="ac3" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam4">Jam 4</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam4" name="jam4" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac4">Acara 4</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac4" name="ac4" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam5">Jam 5</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam5" name="jam5" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac5">Acara 5</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac5" name="ac5" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam6">Jam 6</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam6" name="jam6" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac6">Acara 6</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac6" name="ac6" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam7">Jam 7</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam7" name="jam7" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac7">Acara 7</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac7" name="ac7" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam8">Jam 8</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam8" name="jam8" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac8">Acara 8</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac8" name="ac8" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam9">Jam 9</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam9" name="jam9" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac9">Acara 9</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac9" name="ac9" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam10">Jam 10</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam10" name="jam10" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac10">Acara 10</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac10" name="ac10" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam11">Jam 11</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam11" name="jam11" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac11">Acara 11</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac11" name="ac11" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam12">Jam 12</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam12" name="jam12" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac12">Acara 12</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac12" name="ac12" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam13">Jam 13</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam13" name="jam13" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac13">Acara 13</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac13" name="ac13" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam14">Jam 14</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam14" name="jam14" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac14">Acara 14</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac14" name="ac14" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam15">Jam 15</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam15" name="jam15" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac15">Acara 15</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac15" name="ac15" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=series" class="btn btn-success">Kembali</a>
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

            $sqledit = $akdb->dbobject("SELECT * FROM "._TBACARA." WHERE id_ac = $id ORDER BY id_ac DESC LIMIT 0,1");

            if(substr($sqledit->tgl,0,10) <> "0000-00-00") {

            $ttgl = substr($sqledit->tgl,8,2)."/".substr($sqledit->tgl,5,2)."/".substr($sqledit->tgl,0,4);

            } else { $ttgl = ""; }

          ?>

          <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-pencil"></i>
                <h3>Edit Rangkaian Acara</h3>
              </div> <!-- /widget-header -->
          
              <div class="widget-content"> 

              <form id="edit" class="form-horizontal" action="<?=_URLWEB;?>admin.php?admin=apps&mod=series&act=update" method="post">
                  <fieldset>

                    <div class="control-group">                     
                      <label class="control-label" for="tgl">Tanggal Acara</label>
                      <div class="controls">
                        <input type="text" class="span2" id="tgl" name="tgl" value="<?=$ttgl;?>" maxlength="12" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="ctt">Catatan :</label>
                      <div class="controls">
                        <b>Isi rangkaian acara secara berurutan dan secukupnya. Form dibawah tidak harus penuh.</b>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="jam1">Jam 1</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam1" name="jam1" value="<?=$sqledit->jam1;?>" maxlength="8" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac1">Acara 1</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac1" name="ac1" value="<?=$sqledit->ac1;?>" maxlength="50" required="required">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam2">Jam 2</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam2" name="jam2" value="<?=$sqledit->jam2;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac2">Acara 2</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac2" name="ac2" value="<?=$sqledit->ac2;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam3">Jam 3</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam3" name="jam3" value="<?=$sqledit->jam3;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac3">Acara 3</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac3" name="ac3" value="<?=$sqledit->ac3;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam4">Jam 4</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam4" name="jam4" value="<?=$sqledit->jam4;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac4">Acara 4</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac4" name="ac4" value="<?=$sqledit->ac4;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam5">Jam 5</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam5" name="jam5" value="<?=$sqledit->jam5;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac5">Acara 5</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac5" name="ac5" value="<?=$sqledit->ac5;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam6">Jam 6</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam6" name="jam6" value="<?=$sqledit->jam6;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac6">Acara 6</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac6" name="ac6" value="<?=$sqledit->ac6;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam7">Jam 7</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam7" name="jam7" value="<?=$sqledit->jam7;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac7">Acara 7</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac7" name="ac7" value="<?=$sqledit->ac7;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam8">Jam 8</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam8" name="jam8" value="<?=$sqledit->jam8;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac8">Acara 8</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac8" name="ac8" value="<?=$sqledit->ac8;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam9">Jam 9</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam9" name="jam9" value="<?=$sqledit->jam9;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac9">Acara 9</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac9" name="ac9" value="<?=$sqledit->ac9;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam10">Jam 10</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam10" name="jam10" value="<?=$sqledit->jam10;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac10">Acara 10</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac10" name="ac10" value="<?=$sqledit->ac10;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam11">Jam 11</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam11" name="jam11" value="<?=$sqledit->jam11;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac11">Acara 11</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac11" name="ac11" value="<?=$sqledit->ac11;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam12">Jam 12</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam12" name="jam12" value="<?=$sqledit->jam12;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac12">Acara 12</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac12" name="ac12" value="<?=$sqledit->ac12;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam13">Jam 13</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam13" name="jam13" value="<?=$sqledit->jam13;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac13">Acara 13</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac13" name="ac13" value="<?=$sqledit->ac13;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam14">Jam 14</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam14" name="jam14" value="<?=$sqledit->jam14;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac14">Acara 14</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac14" name="ac14" value="<?=$sqledit->ac14;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>

                    <div class="control-group">                     
                      <label class="control-label" for="jam15">Jam 15</label>
                      <div class="controls">
                        <input type="text" class="span2" id="jam15" name="jam15" value="<?=$sqledit->jam15;?>" maxlength="8">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" for="ac15">Acara 15</label>
                      <div class="controls">
                        <input type="text" class="span4" id="ac15" name="ac15" value="<?=$sqledit->ac15;?>" maxlength="50">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <br>                                        
                      
                    <div class="form-actions">
                      <input name="Submit" type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="Reset" type="reset" class="btn" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=_URLWEB;?>admin.php?admin=apps&mod=series" class="btn btn-success">Kembali</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                  <input type="hidden" name="cid_ac" value="<?=$sqledit->id_ac;?>" />
                  <input type="hidden" name="cid_ad" value="<?=$ida;?>" />
                </form>

              </div>

          </div>

          <?php

          } else {

              if($act == 'simpan') {

              $tgl=$_POST['tgl'];
              $jam1=$_POST['jam1'];
              $ac1=$_POST['ac1'];
              $jam2=$_POST['jam2'];
              $ac2=$_POST['ac2'];
              $jam3=$_POST['jam3'];
              $ac3=$_POST['ac3'];
              $jam4=$_POST['jam4'];
              $ac4=$_POST['ac4'];
              $jam5=$_POST['jam5'];
              $ac5=$_POST['ac5'];
              $jam6=$_POST['jam6'];
              $ac6=$_POST['ac6'];
              $jam7=$_POST['jam7'];
              $ac7=$_POST['ac7'];
              $jam8=$_POST['jam8'];
              $ac8=$_POST['ac8'];
              $jam9=$_POST['jam9'];
              $ac9=$_POST['ac9'];
              $jam10=$_POST['jam10'];
              $ac10=$_POST['ac10'];
              $jam11=$_POST['jam11'];
              $ac11=$_POST['ac11'];
              $jam12=$_POST['jam12'];
              $ac12=$_POST['ac12'];
              $jam13=$_POST['jam13'];
              $ac13=$_POST['ac13'];
              $jam14=$_POST['jam14'];
              $ac14=$_POST['ac14'];
              $jam15=$_POST['jam15'];
              $ac15=$_POST['ac15'];

              if($tgl <> '') {
              $tgl = substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
              } else { $tgl = "0000-00-00"; }

              $cid_ad=$_POST['cid_ad'];
              
              if (trim($_POST['tgl']) == '') {
                $error[] = '- Tanggal Belum Di Pilih';
              }
              if (trim($_POST['jam1']) == '') {
                $error[] = '- Jam 1 Masih Kosong';
              }
              if (trim($_POST['ac1']) == '') {
                $error[] = '- Acara 1 Masih Kosong';
              }             

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
                echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Entry Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=series&act=tambah\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlsimpan = $akdb->dbquery("INSERT INTO "._TBACARA." (id_ad,tgl,jam1,ac1,jam2,ac2,jam3,ac3,jam4,ac4,jam5,ac5,jam6,ac6,jam7,ac7,jam8,ac8,jam9,ac9,jam10,ac10,jam11,ac11,jam12,ac12,jam13,ac13,jam14,ac14,jam15,ac15,log) VALUES ('$cid_ad','$tgl','$jam1','$ac1','$jam2','$ac2','$jam3','$ac3','$jam4','$ac4','$jam5','$ac5','$jam6','$ac6','$jam7','$ac7','$jam8','$ac8','$jam9','$ac9','$jam10','$ac10','$jam11','$ac11','$jam12','$ac12','$jam13','$ac13','$jam14','$ac14','$jam15','$ac15','"._DLOG."')");
                
                if($sqlsimpan){
                  echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Simpan Data Rangkaian Acara <b>".$_POST['tgl']."</b> Berhasil Dilakukan.</div>";
                }
              }              

              }
              elseif($act == 'update') {

              $tgl=$_POST['tgl'];
              $jam1=$_POST['jam1'];
              $ac1=$_POST['ac1'];
              $jam2=$_POST['jam2'];
              $ac2=$_POST['ac2'];
              $jam3=$_POST['jam3'];
              $ac3=$_POST['ac3'];
              $jam4=$_POST['jam4'];
              $ac4=$_POST['ac4'];
              $jam5=$_POST['jam5'];
              $ac5=$_POST['ac5'];
              $jam6=$_POST['jam6'];
              $ac6=$_POST['ac6'];
              $jam7=$_POST['jam7'];
              $ac7=$_POST['ac7'];
              $jam8=$_POST['jam8'];
              $ac8=$_POST['ac8'];
              $jam9=$_POST['jam9'];
              $ac9=$_POST['ac9'];
              $jam10=$_POST['jam10'];
              $ac10=$_POST['ac10'];
              $jam11=$_POST['jam11'];
              $ac11=$_POST['ac11'];
              $jam12=$_POST['jam12'];
              $ac12=$_POST['ac12'];
              $jam13=$_POST['jam13'];
              $ac13=$_POST['ac13'];
              $jam14=$_POST['jam14'];
              $ac14=$_POST['ac14'];
              $jam15=$_POST['jam15'];
              $ac15=$_POST['ac15'];

              if($tgl <> '') {
              $tgl = substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
              } else { $tgl = "0000-00-00"; }

              $cid_ad=$_POST['cid_ad'];
              $cid_ac=$_POST['cid_ac'];

              if (trim($_POST['tgl']) == '') {
                $error[] = '- Tanggal Belum Di Pilih';
              }
              if (trim($_POST['jam1']) == '') {
                $error[] = '- Jam 1 Masih Kosong';
              }
              if (trim($_POST['ac1']) == '') {
                $error[] = '- Acara 1 Masih Kosong';
              }  

              if (isset($error)) { $error = $error; } else { $error = ""; }
              if ($error <> '') {
              echo "<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Pesan Kesalahan Update Data :</strong><br>".implode('<br />', $error)."</div><br><a href=\""._URLWEB."admin.php?admin=apps&mod=series&act=edit&id=".base64_encode($cid_ac)."\" class=\"btn btn-warning\">Ulangi Lagi</a><br><br>";
              } else {
              
                $sqlupdate = $akdb->dbquery("UPDATE "._TBACARA." SET `id_ad`='".$cid_ad."',`tgl`='$tgl',`jam1`='$jam1',`ac1`='$ac1',`jam2`='$jam2',`ac2`='$ac2',`jam3`='$jam3',`ac3`='$ac3',`jam4`='$jam4',`ac4`='$ac4',`jam5`='$jam5',`ac5`='$ac5',`jam6`='$jam6',`ac6`='$ac6',`jam7`='$jam7',`ac7`='$ac7',`jam8`='$jam8',`ac8`='$ac8',`jam9`='$jam9',`ac9`='$ac9',`jam10`='$jam10',`ac10`='$ac10',`jam11`='$jam11',`ac11`='$ac11',`jam12`='$jam12',`ac12`='$ac12',`jam13`='$jam13',`ac13`='$ac13',`jam14`='$jam14',`ac14`='$ac14',`jam15`='$jam15',`ac15`='$ac15',`log`='"._DLOG."' WHERE id_ac=$cid_ac");
                if($sqlupdate){
                echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Update Data Rangkaian Acara <b>".$_POST['tgl']."</b> Berhasil Dilakukan.</div>";
                }
              }

            }

          ?>

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Rangkaian Acara</h3>
            </div>
            
            <?php
            $adjacents = 2;
            $total_pages = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBACARA."");
            $total_pages = $total_pages->num;
            $targetpage = _URLWEB."admin.php?admin=apps&mod=series";  
            $limit = 10; 
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else    
                $page = "";
            
            if($page) 
              $start = ($page - 1) * $limit; 
            else
              $start = 0;
            
            $sqltabel = $akdb->dbquery("SELECT * FROM "._TBACARA." ORDER BY tgl DESC LIMIT $start, $limit");
            
            include_once "inc/admin.pagination.php";
            ?>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> NO </th>
                    <th> HARI/TANGGAL </th>
                    <th> JAM 1 </th>
                    <th> ACARA 1 </th>
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
                    <td> <?php $tanggal->contanggal(substr($rowd->tgl,8,2),substr($rowd->tgl,5,2),substr($rowd->tgl,0,4)); ?> </td>
                    <td> <?=$rowd->jam1;?> </td>
                    <td> <?=$rowd->ac1;?> </td>
                    <td> <?=$sqladmin->nama;?> </td>
                    <td class="td-actions">
                    <?php
                    if($typeuser == 'admin' or $rowd->id_ad == $ida) {
                    echo "<a onclick=\"return confirm('Edit Rangkaian Acara ini');\" href=\""._URLWEB."admin.php?admin=apps&mod=series&act=edit&id=".base64_encode($rowd->id_ac)."\" title=\"Edit Rangkaian Acara ini\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-pencil\"> </i></a>&nbsp;&nbsp;<a onclick=\"return confirm('Hapus Rangkaian Acara ini');\" href=\""._URLWEB."admin.php?admin=aksi&mod=series&act=hapus&id=".base64_encode($rowd->id_ac)."\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>";
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
                    <td colspan="6">Total : <b><?=$total_pages;?></b> data.</td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <!-- /widget-content -->
            <br />
            <div><a href="<?=_URLWEB;?>admin.php?admin=apps&mod=series&act=tambah"><button class="btn btn-github-alt"><i class="icon-plus-sign"></i> Entry Rangkaian Acara</button></a></div>
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
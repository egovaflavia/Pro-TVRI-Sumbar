<div id="mainarea" align="center">

  <?php
  $cekslider = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBUTAMA . " WHERE foto!='' AND status='1'");

  if ($cekslider->num <= 0) {

    echo "<div class=\"jarak\">&nbsp;</div>";
  } else {

    $sqlslider = $akdb->dbquery("SELECT * FROM " . _TBUTAMA . " WHERE foto!='' AND status='1' ORDER BY id_ut DESC LIMIT 0,5");

  ?>

    <div id="mainareaslider">

      <div class="slider_container">
        <div class="flexslider">
          <ul class="slides">

            <?php
            while ($rowslider = mysql_fetch_object($sqlslider)) {
            ?>

              <li>
                <a href="<?php echo $rowslider->urlweb; ?>"><img src="<?php echo _URLWEB; ?>up/slider/<?php echo $rowslider->foto; ?>" alt="" title="" /></a>
                <div class="flex-caption">
                  <div class="caption_title_line">
                    <h2><?php echo $rowslider->judul; ?></h2>
                    <p><?php echo $rowslider->subjudul; ?></p>
                  </div>
                </div>
              </li>

            <?php
            }
            ?>

          </ul>
        </div>
      </div>

    </div>

  <?php
  }
  ?>

  <div id="mainareacontent">

    <div id="main-a">

      <?php
      $moki = 'mod/moki.php';
      if (file_exists($moki)) {
        include_once "$moki";
      } else {
        echo "";
      }
      ?>

    </div>
    <div id="main-b">

      <?php
      $cekpa = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBPROGRAM . "");

      if ($cekpa->num <= 0) {

        echo "";
      } else {

        $sqlpa = $akdb->dbquery("SELECT * FROM " . _TBPROGRAM . " ORDER BY hit DESC LIMIT 0,10");

      ?>

        <!-- box home program -->
        <div id="box-home-b">
          <div class="judul-mod-content"><span class="judul-mod bg-blue">PROGRAM ACARA</span></div>

          <div class="list_carousel">
            <ul id="programtvricr">

              <?php
              while ($rowpa = mysql_fetch_object($sqlpa)) {

                $nama4 = str_replace(" ", "-", $rowpa->nama);
                $nama41 = str_replace("/", "-", $nama4);
                $nama41 = str_replace("?", "-", $nama41);

                if ($rowpa->foto <> '') {
                  $imgpa = _URLWEB . "up/program/" . $rowpa->cfoto;
                } else {
                  $imgpa = _URLWEB . "img/thumb_no-img-program.jpg";
                }

                echo "<li><a href=\"" . _URLWEB . "program/detil/" . $rowpa->id_pg . "/" . strtolower(str_replace(" ", "-", $nama41)) . ".html\"><div class=\"img-program-home\"><img src=\"" . $imgpa . "\" width=\"180\" height=\"180\" alt=\"\" border=\"0\" /></div><p class=\"judul-program-home\">" . substr($rowpa->nama, 0, 20) . "</p></a><p class=\"jadwal-program-home\">" . substr($rowpa->jadwal, 0, 60) . "</p></li>";
              }
              ?>
            </ul>
            <div class="clr"></div>
            <div id="timer1" class="timer"></div>
          </div>

        </div>
        <!-- box home program -->

        <div class="jarak">&nbsp;</div>

      <?php
      }
      ?>

      <!-- box home berita -->
      <div id="box-home-b">
        <div class="judul-mod-content"><span class="judul-mod bg-blue">BERITA TERKINI</span></div>

        <?php
        $mohe = 'mod/mohe.php';
        if (file_exists($mohe)) {
          include_once "$mohe";
        } else {
          echo "";
        }
        ?>

        <?php
        $cekterkini = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBBERITA . "");

        if ($cekterkini->num <= 0) {

          echo "";
        } else {

          $sqlterkini = $akdb->dbquery("SELECT * FROM " . _TBBERITA . " ORDER BY tgl_jam DESC LIMIT 10");

          while ($rowterkini = mysql_fetch_object($sqlterkini)) {

            $judul4 = str_replace(" ", "-", $rowterkini->judul);
            $judul41 = str_replace("/", "-", $judul4);
            $judul41 = str_replace("?", "-", $judul41);

            $kanaltkn = $akdb->dbobject("SELECT nama FROM " . _TBKANAL . " WHERE id_kn = '$rowterkini->id_kn' ORDER BY id_kn DESC LIMIT 1");

            if ($rowterkini->foto <> '') {
              $imgtkn = _URLWEB . "up/berita/" . $rowterkini->cfoto;
            } else {
              $imgtkn = _URLWEB . "img/thumb_no-img-berita-bs.jpg";
            }

        ?>

            <div class="berita-home">
              <div class="berita-home-a">
                <a href="<?php echo _URLWEB . "berita/detil/$rowterkini->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>"><img src="<?= $imgtkn; ?>" width="140" height="140" alt="" border="0" /></a>
              </div>
              <div class="berita-home-b">
                <p class="tgl-berita-home"><a href="<?php echo _URLWEB; ?>berita"><b><?= $kanaltkn->nama; ?></b></a><img src="<?php echo _URLWEB; ?>img/jam10.png" width="10" height="10" alt="" border="0" style="padding:0px 4px 0px 10px;" /><?php $tanggal->contanggalx(substr($rowterkini->tgl_jam, 8, 2), substr($rowterkini->tgl_jam, 5, 2), substr($rowterkini->tgl_jam, 0, 4));
                                                                                                                                                                                                                                            echo " " . substr($rowterkini->tgl_jam, 11, 5) . " WIB"; ?></p>
                <p class="judul-berita-home"><a href="<?php echo _URLWEB . "berita/detil/$rowterkini->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html"; ?>"><?= $rowterkini->judul; ?></a></p>
                <p class="konten-berita-home"><?= $rowterkini->ringkasan; ?></p>
              </div>
              <div class="clear"></div>
            </div>

          <?php
          }
          ?>

          <div align="right"><a class="btn" href="<?php echo _URLWEB; ?>berita" />Berita Lainnya</a></div>

        <?php
        }
        ?>

      </div>
      <!-- box home berita -->


    </div>
    <div class="clear"></div>

  </div>
</div>
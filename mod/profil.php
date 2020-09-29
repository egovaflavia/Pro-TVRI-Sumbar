<?php if (!defined('_VALID_ACCESS')) {
    header("location: index.php");
    die;
}

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM " . _TBPROFIL . " ORDER BY id_pf DESC LIMIT 0,1");

$tanggal = new tanggal;

$atas = 'mod/header.php';
if (file_exists($atas)) {
    include_once "$atas";
} else {
    echo "<center><div style=\"background-color: #eaeaea; margin-top: 80px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 14px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal mengakses modul <b>HEADER</b></div></center>";
    die;
}

?>

<!-- begin main area -->
<div id="mainarea" align="center">

    <div id="mainareacontent">

        <div class="jarak">&nbsp;</div>

        
        <div id="main-b">

            <?php
            if (isset($_GET["se"])) $se = $_GET['se'];
            else $se = "";
            if ($se == 'visimisi') {

            ?>
                <!-- box detil -->
                <div id="box-home-b">
                    <div class="judul-big-content"><span class="judul-mod bg-blue">PROFIL</span></div>

                    <?php
                    $sqlkonten = $akdb->dbobject("SELECT * FROM " . _TBKONTEN . " WHERE id_kt='2' AND konten='profil'");
                    ?>

                    <div class="judul-konten"><?= $sqlkonten->judul; ?></div>

                    <?php
                    if ($sqlkonten->foto <> '') {
                        echo "<div class=\"foto-konten\" align=\"center\">";
                        echo "<img src=\"" . _URLWEB . "up/konten/" . $sqlkonten->foto . "\" class=\"img-konten\" alt=\"\"/>";
                        echo "</div>";
                    }
                    ?>

                    <div id="isi-konten"><?= $sqlkonten->isi; ?></div>

                    <div class="jarak3"></div>
                    <div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>

                </div>
                <!-- box detil -->
            <?php
            } elseif ($se == 'organisasi') {

            ?>
                <!-- box detil -->
                <div id="box-home-b">
                    <div class="judul-big-content"><span class="judul-mod bg-blue">PROFIL</span></div>

                    <?php
                    $sqlkonten = $akdb->dbobject("SELECT * FROM " . _TBKONTEN . " WHERE id_kt='3' AND konten='profil'");
                    ?>

                    <div class="judul-konten"><?= $sqlkonten->judul; ?></div>

                    <?php
                    if ($sqlkonten->foto <> '') {
                        echo "<div class=\"foto-konten\" align=\"center\">";
                        echo "<img src=\"" . _URLWEB . "up/konten/" . $sqlkonten->foto . "\" class=\"img-konten\" alt=\"\"/>";
                        echo "</div>";
                    }
                    ?>

                    <div id="isi-konten"><?= $sqlkonten->isi; ?></div>

                    <div class="jarak3"></div>
                    <div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>

                </div>
            <?php
            } elseif ($se == 'sdm') {

            ?>
                <!-- box detil -->
                <div id="box-home-b">
                    <div class="judul-big-content"><span class="judul-mod bg-blue">PROFIL</span></div>

                    <?php
                    $sqlkonten = $akdb->dbobject("SELECT * FROM " . _TBKONTEN . " WHERE id_kt='4' AND konten='profil'");
                    ?>

                    <div class="judul-konten"><?= $sqlkonten->judul; ?></div>

                    <?php
                    if ($sqlkonten->foto <> '') {
                        echo "<div class=\"foto-konten\" align=\"center\">";
                        echo "<img src=\"" . _URLWEB . "up/konten/" . $sqlkonten->foto . "\" class=\"img-konten\" alt=\"\"/>";
                        echo "</div>";
                    }
                    ?>

                    <div id="isi-konten"><?= $sqlkonten->isi; ?></div>

                    <div class="jarak3"></div>
                    <div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>

                </div>
                <!-- box detil -->
            <?php
            } else {

            ?>
                <!-- box detil -->
                <div id="box-home-b">
                    <div class="judul-big-content"><span class="judul-mod bg-blue">PROFIL</span></div>

                    <?php
                    $sqlkonten = $akdb->dbobject("SELECT * FROM " . _TBKONTEN . " WHERE id_kt='1' AND konten='profil'");
                    ?>

                    <div class="judul-konten"><?= $sqlkonten->judul; ?></div>

                    <?php
                    if ($sqlkonten->foto <> '') {
                        echo "<div class=\"foto-konten\" align=\"center\">";
                        echo "<img src=\"" . _URLWEB . "up/konten/" . $sqlkonten->foto . "\" class=\"img-konten\" alt=\"\"/>";
                        echo "</div>";
                    }
                    ?>

                    <div id="isi-konten"><?= $sqlkonten->isi; ?></div>

                    <div class="jarak3"></div>
                    <div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>

                </div>
                <!-- box detil -->
            <?php
            }
            ?>

        </div>
        <div class="clear"></div>

    </div>
</div>
<!-- end main area -->

<?php
$bawah = 'mod/footer.php';
if (file_exists($bawah)) {
    include_once "$bawah";
} else {
    echo "<center><div style=\"background-color: #eaeaea; margin-top: 80px; color:#313131; 
		border: #dadada 10px solid; width: 280px; font-family: Verdana, Arial, Helvetica, sans-serif; 
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		font-size: 14px; font-weight:bold; text-shadow: 1px 1px #fff; padding: 10px;\">
		Sistem Gagal mengakses modul <b>FOOTER</b></div></center>";
    die;
}
?>
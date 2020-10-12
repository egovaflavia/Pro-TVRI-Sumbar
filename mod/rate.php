<?php
if (!defined('_VALID_ACCESS')) {
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
<?php
$program = $akdb->dbquery("SELECT * FROM programtb");
$slider = $akdb->dbquery("SELECT * FROM utamatb WHERE status = '1'");

?>

<?php include 'mod/header.php' ?>

<body>

    <?php include 'mod/menudkk.php' ?>

    <!-- Isinya -->
    <section class="site-section bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= _URLWEB ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rate Card</li>
                </ol>
            </nav>

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-6 text-center heading-section mb-5">
                    <h2 class="text-black mb-2">Rate Card</h2>
                    <p style="font-size: 15px; color: #1b3699; font-weight: bold;">TVRI Sumatera Barat</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <?php
                    if (isset($_GET["se"])) $se = $_GET['se'];
                    else $se = "";
                    if ($se == 'iklan') {

                        $sqlrt = $akdb->dbobject("SELECT * FROM " . _TBRATE . " WHERE kat='iklan' ORDER BY id_rt DESC LIMIT 0,1");
                        $lasthit = $sqlrt->hit;
                        $newhit = $lasthit + 1;
                        $hitdbx = $akdb->dbquery("UPDATE " . _TBRATE . " SET hit='$newhit' WHERE id_rt='$sqlrt->id_rt' LIMIT 1");
                    ?>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Rate Card Produksi</h2>
                                    <?php
                                    if ($sqlrt->foto <> '') {
                                        echo "<div class=\"foto-konten\" align=\"center\">";
                                        echo "<img src=\"" . _URLWEB . "up/rate/" . $sqlrt->foto . "\" class=\"img-fluid\" alt=\"\"/>";
                                        echo "</div>";
                                    }
                                    ?>

                                    <?php if ($sqlrt->hp <> '' || $sqlrt->wa <> '' || $sqlrt->bbm <> '' || $sqlrt->email <> '') { ?>
                                        <div class="jarak">&nbsp;</div>
                                        <div class="judul-mod-content"><span class="judul-mod bg-blue">Kontak Marketing Produksi</span></div>
                                        <div id="kontak-rate" align="center">
                                            <p>Untuk informasi lebih lengkap, hubungi kontak marketing Produksi berikut ini :</p>
                                            <?php if ($sqlrt->hp <> '') {
                                                echo "<p>No. HP : <b>" . $sqlrt->hp . "</b>";
                                                if ($sqlrt->wa <> '') {
                                                    echo "&nbsp;&bull;&nbsp;WhatsApp : <b>" . $sqlrt->wa . "</b>";
                                                }
                                                if ($sqlrt->email <> '') {
                                                    echo "&nbsp;&bull;&nbsp;Email : <b>" . $sqlrt->email . "</b>";
                                                }
                                                echo "</p>";
                                            } ?>
                                            <?php if ($sqlrt->email <> '') {
                                                echo "<p><a href=\"ymsgr:sendim?" . $sqlrt->emai . "\"><img src=\"" . $sqlrt->email . "&amp;t=14\" alt=\"\" align=\"absmiddle\" /></a></p>";
                                            } ?>
                                        </div>
                                        <div class="jarak">&nbsp;</div>
                                    <?php } ?>
                                    <div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>





                                </div>
                            </div>
                        </div>

                    <?php
                    } else {

                        $sqlrt = $akdb->dbobject("SELECT * FROM " . _TBRATE . " WHERE kat='program' ORDER BY id_rt DESC LIMIT 0,1");
                        $lasthit = $sqlrt->hit;
                        $newhit = $lasthit + 1;
                        $hitdbx = $akdb->dbquery("UPDATE " . _TBRATE . " SET hit='$newhit' WHERE id_rt='$sqlrt->id_rt' LIMIT 1");
                    ?>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Rate Card Penyiaran</h2>

                                    <?php
                                    if ($sqlrt->foto <> '') {
                                        echo "<div class=\"foto-konten\" align=\"center\">";
                                        echo "<img src=\"" . _URLWEB . "up/rate/" . $sqlrt->foto . "\" class=\"img-fluid\" alt=\"\"/>";
                                        echo "</div>";
                                    }
                                    ?>

                                    <?php if ($sqlrt->hp <> '' || $sqlrt->wa <> '' || $sqlrt->bbm <> '' || $sqlrt->email <> '') { ?>
                                        <div class="jarak">&nbsp;</div>
                                        <div class="judul-mod-content"><span class="judul-mod bg-blue">Kontak Marketing Penyiaran</span></div>
                                        <div id="kontak-rate" align="center">
                                            <p>Untuk informasi lebih lengkap, hubungi kontak marketing penyiaran berikut ini :</p>
                                            <?php if ($sqlrt->hp <> '') {
                                                echo "<p>No. HP : <b>" . $sqlrt->hp . "</b>";
                                                if ($sqlrt->wa <> '') {
                                                    echo "&nbsp;&bull;&nbsp;WhatsApp : <b>" . $sqlrt->wa . "</b>";
                                                }
                                                if ($sqlrt->email <> '') {
                                                    echo "&nbsp;&bull;&nbsp;Email : <b>" . $sqlrt->email . "</b>";
                                                }
                                                echo "</p>";
                                            } ?>
                                            <?php if ($sqlrt->ym <> '') {
                                                echo "<p> Yahoo <a href=\"ymsgr:sendim?" . $sqlrt->ym . "\"><img src=\"http://opi.yahoo.com/online?u=" . $sqlrt->ym . "&amp;t=14\" alt=\"\" align=\"absmiddle\" /></a></p>";
                                            } ?>
                                        </div>
                                        <div class="jarak">&nbsp;</div>
                                    <?php } ?>

                                    <div align="right"><a href="<?= _URLWEB; ?>" class="button"><span>Ke Beranda</span></a></div>

                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $moki = 'mod/moki.php';
                                if (file_exists($moki)) {
                                    include_once "$moki";
                                } else {
                                    echo "Belum di Publikasikan";
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- Isinya -->

    <?php
    include 'footer.php'
    ?>
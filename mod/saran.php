


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
		border: #dadada 10px solid; width: 280px; 
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


<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">

    <?php include 'mod/menudkk.php' ?>



    <!-- Kritik & Saran -->
    <section class="site-section block-13 bg-light" data-aos="fade">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= _URLWEB ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kritik & Saran</li>
                </ol>
            </nav>

            <div id="sejarah" class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-6 text-center heading-section mb-5">
                    <h2 class="text-black mb-2">Kritik & Saran</h2>
                    <p>TVRI Sumatera Barat</p>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200">
                <!-- box detil -->
                <div class="row">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">

                                    <?php
                                    if (isset($_POST["proses"]) && $_POST["proses"] == "kirim") {

                                        //Simpan Hasil
                                        $nama = $_POST['nama'];
                                        $email = $_POST['email'];
                                        $alasan = $_POST['alasan'];
                                        $pesan = $_POST['pesan'];
                                        $ip = _SETIP;
                                        $semail = strtolower($email);

                                        if (trim($_POST['nama']) == '') {
                                            $error[] = '&bull; Nama Anda Masih Kosong.';
                                        }
                                        if (trim($_POST['email']) == '') {
                                            $error[] = '&bull; Alamat Email Masih Kosong.';
                                        }
                                        if (trim($_POST['alasan']) == '') {
                                            $error[] = '&bull; Tujuan Pesan Belum Dipilih';
                                        }
                                        if (trim($_POST['pesan']) == '') {
                                            $error[] = '&bull; Isi Pesan Masih Kosong.';
                                        }
                                        if (trim($_SESSION['security_code'] != $_POST['security_code'])) {
                                            $error[] = '&bull; Security Code Salah.';
                                        }
                                        if (isset($error)) {
                                            $error = $error;
                                        } else {
                                            $error = "";
                                        }
                                        if ($error <> '') {
                                            echo '<div id=luarresult><div id=gagal>';
                                            echo '<b>Pesan Gagal Kirim</b> : <br />' . implode('<br />', $error);
                                            echo '<br><br><a class=btn href=' . _URLWEB . 'saran>Coba Lagi</a><br>';
                                            echo '</div></div>';
                                        } else {

                                            $sql = $akdb->dbquery("INSERT INTO " . _TBPESAN . " (ip,nama,email,alasan,pesan,tgl_jam,status,log) VALUES ('$ip','$nama','$semail','$alasan','$pesan','" . date("Y-m-d H:i:s") . "','0','" . _DLOG . "')");

                                            if ($sql) {
                                                echo '<div id=luarresult><div id=sukses><font color=#004B8F>Pesan Berhasil Dikirim</font><br><br><a class=btn href=' . _URLWEB . 'saran>Kembali</a></div></div>';
                                            }
                                        }
                                    } else {
                                    ?>
                                        <div id="box-saran">
                                            <form id="pesan" name="pesan" action="<?= _URLWEB; ?>saran" method="post" novalidate="novalidate" class="bootstrap-frm">
                                                <h2 class="text-black">Formulir Kritik &amp; Saran
                                                    <span>Mohon lengkapi formulir ini untuk mengirimkan kritik dan/atau saran.</span>
                                                </h2>

                                                <div class="form-group">
                                                    <label for="nama" id="nama">Nama Anda :</label>
                                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda" />
                                                </div>


                                                <div class="form-group">
                                                    <label for="nama" id="nama">Alamat Email :</label>
                                                    <input class="form-control" id="email" type="email" name="email" placeholder="Alamat Email Yang Bisa Dihubungi" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" id="nama">Tujuan Pesan :</label>
                                                    <select class="form-control" name="alasan">
                                                        <option value="">= Tujuan Kritik &amp; Saran =</option>
                                                        <option value="Umum">Umum</option>
                                                        <option value="Teknik dan Transmisi">Teknik Dan Transmisi</option>
                                                        <option value="Program Dan Pengembangan Usaha">Program Dan Pengembangan Usaha</option>
                                                        <option value="Redaksi Pemberitaan">Redaksi Pemberitaan</option>
                                                        <option value="Admin Website TVRI Sumbar">Admin Website TVRI Sumbar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" id="nama">Isi Pesan :</label>
                                                    <textarea id="pesan" name="pesan" class="form-control" placeholder="Pesan Kritik &amp; Saran Anda untuk Kami"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <img src="<?= _URLWEB; ?>mod/captchasecurityimages.php?width=100&height=25&character=6" align="absmiddle" class="mb-3" />
                                                    <input class="form-control" id="security_code" type="text" name="security_code" placeholder="Isi Security Code" maxlength="12" />
                                                </div>

                                                <div class="form-group">
                                                    <input id="submit" class="btn btn-primary" type="submit" name="submit" class="button" value="Kirim" />
                                                    <input type="hidden" class="btn btn-primary" name="proses" value="kirim" />
                                                </div>

                                            </form>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    $moki = 'mod/moki.php';
                                    if (file_exists($moki)) {
                                        include_once "$moki";
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- box detil -->
                </div>
            </div>
    </section>
    <!-- Kritik & Saran -->


    <?php
    include 'footer.php'
    ?>
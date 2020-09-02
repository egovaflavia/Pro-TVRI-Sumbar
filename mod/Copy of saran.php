<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; } 

session_start();

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");

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

<!-- box detil -->
<div id="box-home-b">
<div class="judul-big-content"><span class="judul-mod bg-blue">Kritik &amp; Saran</span></div>

<?php
if (isset($_POST["proses"]) && $_POST["proses"] == "kirim") {

    //Simpan Hasil
    $nama=$_POST['nama'];
    $email=$_POST['email'];
    $alasan=$_POST['alasan'];
    $pesan=$_POST['pesan'];
    $ip=_SETIP;
    $semail=strtolower($email);
    
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
    if (isset($error)) { $error = $error; } else { $error = ""; }
    if ($error <> '') {
    echo '<div id=luarresult><div id=gagal>';
    echo '<b>Pesan Gagal Kirim</b> : <br />'.implode('<br />', $error);
    echo '<br><br><a class=btn href='._URLWEB.'saran>Coba Lagi</a><br>';
    echo '</div></div>';
    } else {
    
      $sql = $akdb->dbquery("INSERT INTO "._TBPESAN." (ip,nama,email,alasan,pesan,tgl_jam,status,log) VALUES ('$ip','$nama','$semail','$alasan','$pesan','".date("Y-m-d H:i:s")."','0','"._DLOG."')");
      
      if($sql){
      echo '<div id=luarresult><div id=sukses><font color=#004B8F>Pesan Berhasil Dikirim</font><br><br><a class=btn href='._URLWEB.'saran>Kembali</a></div></div>';
      }
    }

} else {
?>
<div id="box-saran">
<form id="pesan" name="pesan" action="<?=_URLWEB;?>saran" method="post" novalidate="novalidate" class="bootstrap-frm">
    <h1>Formulir Kritik &amp; Saran 
        <span>Mohon lengkapi formulir ini untuk mengirimkan kritik dan/atau saran.</span>
    </h1>
    <label for="nama" id="nama">
        <span>Nama Anda :</span>
        <input id="nama" type="text" name="nama" placeholder="Nama Lengkap Anda" />
    </label>
    <label for="email" id="email">
        <span>Alamat Email :</span>
        <input id="email" type="email" name="email" placeholder="Alamat Email Yang Bisa Dihubungi" />
    </label>
    <label for="alasan" id="alasan">
        <span>Tujuan Pesan :</span>
        <select name="alasan">
        <option value="">= Tujuan Kritik &amp; Saran =</option>
        <option value="Umum">Umum</option>
        <option value="Teknik dan Transmisi">Teknik Dan Transmisi</option>
        <option value="Program Dan Pengembangan Usaha">Program Dan Pengembangan Usaha</option>
        <option value="Redaksi Pemberitaan">Redaksi Pemberitaan</option>
        <option value="Admin Website TVRI Sumbar">Admin Website TVRI Sumbar</option>
        </select>
    </label>
    <label for="pesan" id="pesan">
        <span>Isi Pesan :</span>
        <textarea id="pesan" name="pesan" placeholder="Pesan Kritik &amp; Saran Anda untuk Kami"></textarea>
    </label>

    <label for="security_code" id="security_code">
        <span><img src="<?=_URLWEB;?>mod/captchasecurityimages.php?width=100&height=25&character=6" align="absmiddle" /></span>
        <input id="security_code" type="text" name="security_code" placeholder="Isi Security Code" maxlength="12" />
    </label>
         
    <label>
        <span>&nbsp;</span> 
        <input id="submit" type="submit" name="submit" class="button" value="Kirim" />
        <input type="hidden" name="proses" value="kirim" />
    </label>    
</form>
</div>
<?php
}
?>

<div class="jarak">&nbsp;</div>
<div align="right"><a href="<?=_URLWEB;?>" class="button"><span>Ke Beranda</span></a></div>
</div>
<!-- box detil -->

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
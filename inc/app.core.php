<?php
if (!defined('_VALID_ACCESS')) {
	header("location: index.php");
	die;
}

//kompatibilitas php
$phpver = phpversion();
if ($phpver < '4.1.0') {
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
	$_COOKIE = $HTTP_COOKIE_VARS;
	$_REQUEST = array_merge($_GET, $_POST, $_COOKIE);
	$_FILES = $HTTP_POST_FILES;
	$_SERVER = $HTTP_SERVER_VARS;
}
$phpver = explode(".", $phpver);
$phpver = "$phpver[0]$phpver[1]";
if ($phpver >= 41) {
	$PHP_SELF = $_SERVER['PHP_SELF'];
}

//fungsi current url
class urlku
{
	function curPageURL()
	{
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	function isDomainAvailible($domain)
	{
		//check, if a valid url is provided
		if (!filter_var($domain, FILTER_VALIDATE_URL)) {
			return false;
		}

		//initialize curl
		$curlInit = curl_init($domain);
		curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curlInit, CURLOPT_HEADER, true);
		curl_setopt($curlInit, CURLOPT_NOBODY, true);
		curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

		//get answer
		$response = curl_exec($curlInit);

		curl_close($curlInit);

		if ($response) return true;

		return false;
	}
}

//class tanggal
class tanggal
{
	function tanggalkini()
	{
		$y = date("Y");
		$d = date("d");
		$D = date("D");
		$m = date("m");

		switch ($m) {
			case "01":
				$b = "Januari";
				break;
			case "02":
				$b = "Februari";
				break;
			case "03":
				$b = "Maret";
				break;
			case "04":
				$b = "April";
				break;
			case "05":
				$b = "Mei";
				break;
			case "06":
				$b = "Juni";
				break;
			case "07":
				$b = "Juli";
				break;
			case "08":
				$b = "Agustus";
				break;
			case "09":
				$b = "September";
				break;
			case "10":
				$b = "Oktober";
				break;
			case "11":
				$b = "November";
				break;
			default:
				$b = "Desember";
		}

		switch ($D) {
			case "Mon":
				$h = "Senin";
				break;
			case "Tue":
				$h = "Selasa";
				break;
			case "Wed":
				$h = "Rabu";
				break;
			case "Thu":
				$h = "Kamis";
				break;
			case "Fri":
				$h = "Jum'at";
				break;
			case "Sat":
				$h = "Sabtu";
				break;
			default:
				$h = "Minggu";
		}

		echo $h . ", " . $d . " " . $b . " " . $y;
	}

	function tanggalkinis()
	{
		$y = date("Y");
		$d = date("d");
		$m = date("m");

		switch ($m) {
			case "01":
				$b = "Januari";
				break;
			case "02":
				$b = "Februari";
				break;
			case "03":
				$b = "Maret";
				break;
			case "04":
				$b = "April";
				break;
			case "05":
				$b = "Mei";
				break;
			case "06":
				$b = "Juni";
				break;
			case "07":
				$b = "Juli";
				break;
			case "08":
				$b = "Agustus";
				break;
			case "09":
				$b = "September";
				break;
			case "10":
				$b = "Oktober";
				break;
			case "11":
				$b = "November";
				break;
			default:
				$b = "Desember";
		}

		echo $d . " " . $b . " " . $y;
	}

	function pilbulan($bulan)
	{
		switch ($bulan) {
			case "01":
				$b = "Januari";
				break;
			case "02":
				$b = "Februari";
				break;
			case "03":
				$b = "Maret";
				break;
			case "04":
				$b = "April";
				break;
			case "05":
				$b = "Mei";
				break;
			case "06":
				$b = "Juni";
				break;
			case "07":
				$b = "Juli";
				break;
			case "08":
				$b = "Agustus";
				break;
			case "09":
				$b = "September";
				break;
			case "10":
				$b = "Oktober";
				break;
			case "11":
				$b = "November";
				break;
			default:
				$b = "Desember";
		}

		echo $b;
	}

	function contanggal($dc, $mc, $yc)
	{
		$datec = strtotime($mc . "/" . $dc . "/" . $yc);
		$hd = date("D", $datec);
		switch ($hd) {
			case "Mon":
				$hc = "Senin";
				break;
			case "Tue":
				$hc = "Selasa";
				break;
			case "Wed":
				$hc = "Rabu";
				break;
			case "Thu":
				$hc = "Kamis";
				break;
			case "Fri":
				$hc = "Jum'at";
				break;
			case "Sat":
				$hc = "Sabtu";
				break;
			default:
				$hc = "Minggu";
		}
		switch ($mc) {
			case "01":
				$bc = "Januari";
				break;
			case "02":
				$bc = "Februari";
				break;
			case "03":
				$bc = "Maret";
				break;
			case "04":
				$bc = "April";
				break;
			case "05":
				$bc = "Mei";
				break;
			case "06":
				$bc = "Juni";
				break;
			case "07":
				$bc = "Juli";
				break;
			case "08":
				$bc = "Agustus";
				break;
			case "09":
				$bc = "September";
				break;
			case "10":
				$bc = "Oktober";
				break;
			case "11":
				$bc = "November";
				break;
			default:
				$bc = "Desember";
		}

		echo $hc . ", " . $dc . " " . $bc . " " . $yc;
	}

	function contanggalx($dc, $mc, $yc)
	{
		switch ($mc) {
			case "01":
				$bc = "Januari";
				break;
			case "02":
				$bc = "Februari";
				break;
			case "03":
				$bc = "Maret";
				break;
			case "04":
				$bc = "April";
				break;
			case "05":
				$bc = "Mei";
				break;
			case "06":
				$bc = "Juni";
				break;
			case "07":
				$bc = "Juli";
				break;
			case "08":
				$bc = "Agustus";
				break;
			case "09":
				$bc = "September";
				break;
			case "10":
				$bc = "Oktober";
				break;
			case "11":
				$bc = "November";
				break;
			default:
				$bc = "Desember";
		}

		echo $dc . " " . $bc . " " . $yc;
	}
}

//class akses database
class aksesdb
{
	function dbconnect($dbhost, $dbuser, $dbpass, $dbname)
	{
		@$dbconn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Koneksi Database Error : ' . mysql_error());
		if ($dbconn) {
			@mysql_select_db($dbname) or die('Penggunaan Database Error : ' . mysql_error());
		}
		return $dbconn;
	}

	function dbquery($sql)
	{
		$dbquery = mysql_query($sql);
		return $dbquery;
	}

	function dbnumrows($sql)
	{
		$dbnumrows = mysql_num_rows(mysql_query($sql));
		return $dbnumrows;
	}

	function dbobject($sql)
	{
		$dbobject = mysql_fetch_object(mysql_query($sql));
		return $dbobject;
	}
}

//class login
class login
{
	function loginapp($uname, $pword)
	{
		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$uname = trim($uname);
		$pword = trim($pword);

		$num = $akdb->dbnumrows("SELECT * FROM " . _TBADMIN . " WHERE uname = '" . mysql_real_escape_string($uname) . "' AND pword = '" . mysql_real_escape_string(md5($pword)) . "' AND status='1'");

		if ($num == 1) {
			return true;
		} else {
			return false;
		}
	}

	function sesapp($uname, $pword)
	{
		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$uname = trim($uname);
		$pword = trim($pword);

		$obj = $akdb->dbobject("SELECT id_ad, uname, type, pword FROM " . _TBADMIN . " WHERE uname = '" . mysql_real_escape_string($uname) . "' AND pword = '" . mysql_real_escape_string(md5($pword)) . "' AND status='1' ORDER BY id_ad DESC LIMIT 0,1");

		$_SESSION['uname'] = $obj->uname;
		$_SESSION['pword'] = $obj->pword;
		$_SESSION['typea'] = $obj->type;
		$_SESSION['id_ada'] = $obj->id_ad;

		if ($obj == 1) {
			return true;
		} else {
			return false;
		}
	}

	function logapp($no)
	{
		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$logsql = $akdb->dbquery("INSERT INTO " . _TBLOG . " (ip, tgl_jam, no) VALUES ('" . _SETIP . "', '" . date("Y-m-d H:i:s") . "', '" . $no . "')");

		if ($logsql == 1) {
			return true;
		} else {
			return false;
		}
	}

	function user($ida)
	{
		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$user = $akdb->dbobject("SELECT nama from " . _TBADMIN . " WHERE id_ad = '$ida' ORDER BY id_ad DESC LIMIT 0,1");

		echo $user->nama;
	}
}

//class aksi
class aksi
{
	function hapusdata($id, $idt, $tbl)
	{
		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$hapus = $akdb->dbquery("DELETE FROM " . $tbl . " WHERE " . $idt . " = '" . $id . "'");

		if ($hapus == 1) {
			return true;
		} else {
			return false;
		}
	}

	function ondata($set, $id, $idt, $tbl)
	{
		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$ond = $akdb->dbquery("UPDATE " . $tbl . " SET " . $set . "='1'  WHERE " . $idt . " = '" . $id . "'");

		if ($ond == 1) {
			return true;
		} else {
			return false;
		}
	}

	function offdata($set, $id, $idt, $tbl)
	{
		$akdb = new aksesdb;
		$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

		$offd = $akdb->dbquery("UPDATE " . $tbl . " SET " . $set . "='0'  WHERE " . $idt . " = '" . $id . "'");

		if ($offd == 1) {
			return true;
		} else {
			return false;
		}
	}
}

//class manipulasi gambar
class mangambar
{
	function cropImage($nw, $nh, $source, $stype, $dest)
	{

		$size = getimagesize($source); // ukuran gambar
		$w = $size[0];
		$h = $size[1];
		switch ($stype) { // format gambar

			case 'gif':
				$simg = imagecreatefromgif($source);
				break;

			case 'jpg':
				$simg = imagecreatefromjpeg($source);
				break;

			case 'png':
				$simg = imagecreatefrompng($source);
				break;
		}

		$dimg = imagecreatetruecolor($nw, $nh); // menciptakan image baru
		$wm = $w / $nw;
		$hm = $h / $nh;

		$h_height = $nh / 2;
		$w_height = $nw / 2;

		if ($w > $h) {

			$adjusted_width = $w / $hm;
			$half_width = $adjusted_width / 2;
			$int_width = $half_width - $w_height;
			imagecopyresampled($dimg, $simg, -$int_width, 0, 0, 0, $adjusted_width, $nh, $w, $h);
		} elseif (($w < $h) || ($w == $h)) {
			$adjusted_height = $h / $wm;
			$half_height = $adjusted_height / 2;
			$int_height = $half_height - $h_height;
			imagecopyresampled($dimg, $simg, 0, -$int_height, 0, 0, $nw, $adjusted_height, $w, $h);
		} else {
			imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $nw, $nh, $w, $h);
		}

		imagejpeg($dimg, $dest, 100);
	}
}

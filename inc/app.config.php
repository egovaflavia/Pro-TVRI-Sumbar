<?php

if (!defined('_VALID_ACCESS')) {
    header("location: index.php");
    die;
}

//konfigurasi database
// Hosting
// define('_DBSERVER', 'localhost');
// define('_DBUSER', 'k9139869_tvr1u');
// define('_DBPASS', 'k4r4mb14mud0');
// define('_DBNAME', 'k9139869_tvr1db');

// Local
define('_DBSERVER', 'localhost');
define('_DBUSER', 'root');
define('_DBPASS', 'mysql');
define('_DBNAME', 'db_tvri');

//konfigurasi global
define('_APPNAME', 'stv-1.0.0');
define('_ADMINNAME', 'Studio Online');
define('_APPVENDOR', 'Syalim.Com');
date_default_timezone_set('Asia/Jakarta');
// var_dump(date('Y'));
// exit;
define('_APPCPR', '&copy; 2015 - ' . date('Y'));
// define('_URLWEB', 'http://tvrisumbar.co.id/'); //Gunakan garis miring diakhir nama domain
define('_URLWEB', 'http://localhost/Pro-TVRI-Sumbar/'); //Gunakan garis miring diakhir nama domain

//konfigurasi tabel
define('_TBACARA', 'acaratb');
define('_TBADMIN', 'admintb');
define('_TBAGENDA', 'agendatb');
define('_TBBANNER', 'bannertb');
define('_TBBERITA', 'beritatb');
define('_TBCIP', 'ciptb');
define('_TBCOV', 'covtb');
define('_TBFOTO', 'fototb');
define('_TBKANAL', 'kanaltb');
define('_TBKONTEN', 'kontentb');
define('_TBLINK', 'linktb');
define('_TBLOG', 'logtb');
define('_TBMATACARA', 'matacaratb');
define('_TBMEDIA', 'mediatb');
define('_TBPESAN', 'pesantb');
define('_TBPROFIL', 'profiltb');
define('_TBPROGRAM', 'programtb');
define('_TBRATE', 'ratetb');
define('_TBUTAMA', 'utamatb');
define('_TBWILAYAH', 'wilayahtb');
define('_TBCUSTOM', 'customtb');

//konfigurasi lain
define('_SETIP', $_SERVER['REMOTE_ADDR']);
define('_DLOG', 'TANGGAL: ' . date('d/m/Y') . ', JAM: ' . date('H:i:s') . ' - IP: ' . $_SERVER['REMOTE_ADDR']);

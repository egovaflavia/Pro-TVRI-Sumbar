<?php if (!defined('_VALID_ACCESS')) {
   header("location: index.php");
   die;
}
$counter_expire = 900;

$ignore = false;

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

// get counter information
$sqlcounter = $akdb->dbquery("select * from " . _TBCOV . "");

// fill when empty
if (mysql_num_rows($sqlcounter) == 0) {
   $sqlcounter = $akdb->dbquery("INSERT INTO `" . _TBCOV . "` (`id_cv`, `alls`, `record_date`, `record_value`) VALUES ('1', '1',  NOW(),  '1')");

   $sqlcounter = $akdb->dbquery("select * from " . _TBCOV . "");

   $ignore = true;
}
$rowc = mysql_fetch_object($sqlcounter);

$alls = $rowc->alls;
$record_date = $rowc->record_date;
$record_value = $rowc->record_value;

$counter_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? addslashes(trim($_SERVER['HTTP_USER_AGENT'])) : "";
$counter_time = time();
$counter_ip = trim(addslashes($_SERVER['REMOTE_ADDR']));

// ignorore some bots
if (substr_count($counter_agent, "bot") > 0)
   $ignore = true;

// delete free ips
if ($ignore == false) {
   $sqlcounter = $akdb->dbquery("delete from " . _TBCIP . " where unix_timestamp(NOW())-unix_timestamp(visit) > $counter_expire");
}

// check for entry
if ($ignore == false) {
   $sqlcounter = $akdb->dbquery("select * from " . _TBCIP . " where ip = '$counter_ip'");
   if (mysql_num_rows($sqlcounter) == 0) {
      // insert
      $sqlcounter = $akdb->dbquery("INSERT INTO " . _TBCIP . " (ip, visit) VALUES ('$counter_ip', NOW())");
   } else {
      $ignore = true;
      $sqlcounter = $akdb->dbquery("update " . _TBCIP . " set visit = NOW() where ip = '$counter_ip'");
   }
}

// online?
$sqlcounter = $akdb->dbquery("select * from " . _TBCIP . "");
$online = mysql_num_rows($sqlcounter);

// add counter
if ($ignore == false) {
   // all
   $alls++;

   $record_date = date("Y-m-d H:i:s");

   $sqlcounter = $akdb->dbquery("update " . _TBCOV . " set alls = '$alls', record_date = '$record_date', record_value = '$record_value' where id_cv = 1");
}

//update hitts
$sqlcounter = $akdb->dbobject("select hits from " . _TBCOV . " where id_cv = 1");
$hitnow = $sqlcounter->hits + 1;
$updatehits = $akdb->dbquery("update " . _TBCOV . " set hits = '$hitnow' where id_cv = 1");

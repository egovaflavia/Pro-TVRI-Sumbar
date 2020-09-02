<?php
if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; }
session_start();

if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {

	header("Location: admin.php?admin=login");
	die;

} else {
	
	header("Location: admin.php?admin=login&x=".base64_encode(80)."");
	die;

}
?>
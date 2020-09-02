<?php
if(!defined('_VALID_ACCESS')) { header ("location: admin.php"); die; }
session_start();

$unamea = $_POST['unamea']; 
$pworda = $_POST['pworda']; 

$log = new login;
if($log->loginapp($unamea, $pworda) == true) 
{
	if($log->sesapp($unamea, $pworda) == true)
	{
								
		$no = '1';
		if($log->logapp($no) == true)
		{
			header("Location: admin.php?admin=apps");
			die;
		}		
	}
	else
	{
				
		header("Location: admin.php?admin=login&x=".base64_encode(87)."");
		die;
				
	}
}
else
{
	$no = '0';
	if($log->logapp($no) == true)
	{
		header("Location: admin.php?admin=login&x=".base64_encode(87)."");
		die;
	}
}
?>
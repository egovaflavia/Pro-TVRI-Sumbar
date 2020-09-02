<?php
session_start();
if(ISSET($_SESSION['uname'])) 
{
	
	UNSET($_SESSION['uname']);
	UNSET($_SESSION['pword']);	
	UNSET($_SESSION['typea']);
	UNSET($_SESSION['id_ada']);
	
} 

header("location: ../admin.php?admin=login&x=".base64_encode(84).""); 
session_destroy();
?>
<?php
$id = base64_decode($_GET['id']);

//users
if($_GET['mod'] == 'users') 
{
	if($_GET['act'] == 'aktif') {
	
		$set = "status";
		$idt = "id_ad";
		$tbl = _TBADMIN;
	
		$aksi = new aksi;
		if($aksi->ondata($set, $id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=users");
			die;
		}
	}
	elseif($_GET['act'] == 'nonaktif') {
	
		$set = "status";
		$idt = "id_ad";
		$tbl = _TBADMIN;
	
		$aksi = new aksi;
		if($aksi->offdata($set, $id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=users");
			die;
		}
	}
	elseif($_GET['act'] == 'hapus') {
	
		$idt = "id_ad";
		$tbl = _TBADMIN;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=users");
			die;
		}
	}
}
//news
elseif($_GET['mod'] == 'news') 
{
	if($_GET['act'] == 'hapus') {
	
		$idt = "id_br";
		$tbl = _TBBERITA;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=news");
			die;
		}
	}
}
//event
elseif($_GET['mod'] == 'event') 
{
	if($_GET['act'] == 'hapus') {
	
		$idt = "id_ma";
		$tbl = _TBMATACARA;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=event");
			die;
		}
	}
}
//program
elseif($_GET['mod'] == 'program') 
{
	if($_GET['act'] == 'hapus') {
	
		$idt = "id_pg";
		$tbl = _TBPROGRAM;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=program");
			die;
		}
	}
}
//link
elseif($_GET['mod'] == 'link') 
{
	if($_GET['act'] == 'hapus') {
	
		$idt = "id_lk";
		$tbl = _TBLINK;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=link");
			die;
		}
	}
}
//photo
elseif($_GET['mod'] == 'photo') 
{
	if($_GET['act'] == 'hapus') {
	
		$idt = "id_ft";
		$tbl = _TBFOTO;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=photo");
			die;
		}
	}
}
//series
elseif($_GET['mod'] == 'series') 
{
	if($_GET['act'] == 'hapus') {
	
		$idt = "id_ac";
		$tbl = _TBACARA;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=series");
			die;
		}
	}
}
//main
elseif($_GET['mod'] == 'main') 
{
	if($_GET['act'] == 'aktif') {
	
		$set = "status";
		$idt = "id_ut";
		$tbl = _TBUTAMA;
	
		$aksi = new aksi;
		if($aksi->ondata($set, $id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=main");
			die;
		}
	}
	elseif($_GET['act'] == 'nonaktif') {
	
		$set = "status";
		$idt = "id_ut";
		$tbl = _TBUTAMA;
	
		$aksi = new aksi;
		if($aksi->offdata($set, $id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=main");
			die;
		}
	}
	elseif($_GET['act'] == 'hapus') {
	
		$idt = "id_ut";
		$tbl = _TBUTAMA;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=main");
			die;
		}
	}
}
//agenda
elseif($_GET['mod'] == 'agenda') 
{
	if($_GET['act'] == 'hapus') {
	
		$idt = "id_ag";
		$tbl = _TBAGENDA;
	
		$aksi = new aksi;
		if($aksi->hapusdata($id, $idt, $tbl) == true) 
		{
			header("location: admin.php?admin=apps&mod=agenda");
			die;
		}
	}
}

else {
header("location: admin.php?admin=apps&mod=home");
die;
}
?>
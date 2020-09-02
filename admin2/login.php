<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; } 

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");
?>
<!DOCTYPE html>
<html lang="id">
  
<head>
<meta charset="utf-8">
<title><?=_ADMINNAME;?> <?=$profil->singkatan;?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes"> 

<link rel="icon" type="image/x-icon" href="<?=_URLWEB;?>img/favicon.ico" />    
<link href="<?=_URLWEB;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=_URLWEB;?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?=_URLWEB;?>css/font-awesome.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="<?=_URLWEB;?>css/style.css" rel="stylesheet" type="text/css">
<link href="<?=_URLWEB;?>css/pages/signin.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
//Disable Right Click
$(document).ready(function(){  
  	$(document).bind("contextmenu",function(e){  
    	return false;  
  	});  
});
</script>

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="<?=_URLWEB;?>"><img src="<?=_URLWEB;?>img/tvri_logo_22.png" style="margin-top:-10px;" alt="" border="0">  Sumatera Barat</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="<?=_URLWEB;?>" class="">
							<i class="icon-chevron-left"></i>
							Ke Halaman Website
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div class="account-container">
	
<?php
if (ISSET($_GET['x'])) {
//pesan kesalahan
$x = base64_decode($_GET['x']);
if ($x==87){
$pesan="<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Peringatan!</strong><br>Kombinasi Username dan Password tidak valid.</div>";
} elseif ($x==84) {
$pesan="<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Terima Kasih.</strong><br>Anda telah berhasil logout.</div>";
} elseif ($x==80) {
$pesan="<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Peringatan!</strong><br>Kode Keamanan Salah. Silahkan coba lagi.</div>";
} else
$pesan="<div class=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Peringatan!</strong><br>Session expired. Silahkan login kembali.</div>";
//
echo $pesan;
}
?>

	<div class="content clearfix">
		<?php if (ISSET($_GET['x']) AND (base64_decode($_GET['x']) == 80 OR base64_decode($_GET['x']) == 87)) { ?>
		<form name="verifikasi" action="<?=_URLWEB;?>admin.php?admin=verifikasi" method="post">
			
			<h1>Verifikasi Login</h1>		
			
			<div class="login-fields">
				
				<div class="field">
					Kode Keamanan : <img src="<?=_URLWEB;?>mod/captchasecurityimages.php?width=100&height=25&character=5" />
				</div> <!-- /field -->
				
				<div class="field">
					<input id="security_code" name="security_code" type="text" size="8" maxlength="6" class="login code-field" required="required" />
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<button class="button btn btn-success btn-large">RE LOGIN</button>
				
			</div> <!-- .actions -->
		
		</form>
		<?php } else { ?>
		<form name="login" action="<?=_URLWEB;?>admin.php?admin=periksa" method="post">
		
			<h1>Login <?=$profil->singkatan;?></h1>		
			
			<div class="login-fields">
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="unamea" value="" placeholder="Username" class="login username-field" maxlength="30" required="required" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="pworda" value="" placeholder="Password" class="login password-field" maxlength="30" required="required" />
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<button class="button btn btn-success btn-large">LOGIN</button>
				
			</div> <!-- .actions -->
				
		</form>
		<?php } ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

<script src="<?=_URLWEB;?>js/jquery-1.7.2.min.js"></script>
<script src="<?=_URLWEB;?>js/bootstrap.js"></script>

<script src="<?=_URLWEB;?>js/signin.js"></script>

</body>

</html>
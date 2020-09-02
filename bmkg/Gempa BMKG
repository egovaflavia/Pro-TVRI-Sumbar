<?php
/**
*
*	Simple Auto Gempa v1.0, is an automatic earthquake web applications for 
*	Indonesia derived from meteorological and geophysical climatology of Indonesia.
*	
*	Copyright (c) 2011, Hendri Syalim, www.syalim.com
*
*	XML source by BMKG Indonesia (http://bmkg.go.id/)
*	
*	This program is free software: you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation, either version 3 of the License, or
*   (at your option) any later version.
*
*   This program is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*   GNU General Public License for more details.
*
*	To run this script, it takes class SimpleXMLElement
* 	On your server, for further information please visit
*	http://www.php.net/manual/en/intro.simplexml.php	
*
*/

$urlimgskala = 'http://www.bmkg.go.id/ImagesStatus/';
$fileautogempaxml = 'http://data.bmkg.go.id/en_autogempa.xml';

function url_exists($url) {
	if(@file_get_contents($url,0,NULL,0,1))
	{
		return 1;
	}
	else
	{ 
		return 0;
	}
}

if(url_exists($fileautogempaxml)) {

	if(class_exists('SimpleXMLElement')) {

		$autogempaxml = file_get_contents($fileautogempaxml);
		$autogempaxml = new SimpleXMLElement($autogempaxml);
		
		define('_AUTOTGLGEMPA',$autogempaxml->gempa[0]->Tanggal);
		define('_AUTOJAMGEMPA',$autogempaxml->gempa[0]->Jam);
		define('_AUTOSKALAGEMPA',$autogempaxml->gempa[0]->Magnitude);
		define('_AUTODLMGEMPA','Kedalaman '.$autogempaxml->gempa[0]->Kedalaman);
		define('_AUTOWILGEMPA',$autogempaxml->gempa[0]->Wilayah1);
		define('_AUTOPTSGEMPA',$autogempaxml->gempa[0]->Potensi);
		define('_AUTOIMGGEMPA',substr($autogempaxml->gempa[0]->Magnitude,0,1).','.substr($autogempaxml->gempa[0]->Magnitude,2,1));
		define('_AUTOGEMPAXML',true);
	
	} else { define('_PESANSAG','<br><br><center>Server anda tidak support layanan ini.</center><br>'); }

} else { define('_PESANSAG','<br><br><center>Saat ini sumber data gempa dari BMKG tidak tersedia.</center><br>'); }

?>
<style type="text/css">
#boxautogempa{
 padding:6px 6px 8px 6px;
 font-size: 12px;
 color: #bababa;
}
#imgautogempa {
 padding: 0px 0px 5px 0px;
 font-size: 38px;
 font-weight: bold;
 color: #950000;
}
#sr {
	font-size: 13px;
	color: #515151;
	padding: 0px 0px 0px 5px;
}
#tglautogempa {
font-size: 11px;
 color: #212121;
 margin-bottom: 5px;
}
#dlmautogempa {
 font-size: 11px;
 color: #414141;
 margin-bottom: 5px;
}
#wilautogempa {
 font-size: 11px;
 color: #616161;
 margin-bottom: 5px;
}
#ptsautogempa {
 font-weight: bold;
 color: #950000;
 text-shadow: 1px 1px #fff;
 font-size: 11px;
}
#sumberautogempa {
 color: #bababa;
 font-size: 9px;
 margin-top: 5px;
}
</style>
<center>
<div id="boxautogempa">
<?php if(defined('_AUTOGEMPAXML')) { ?>
<div id="imgautogempa" align="center"><?php echo _AUTOIMGGEMPA;?><span id="sr">SR</span></div>
<div id="tglautogempa" align="center"><?php echo _AUTOTGLGEMPA;?>&nbsp;<?php echo _AUTOJAMGEMPA;?></div>
<div id="dlmautogempa" align="center"><?php echo ucwords(strtolower(_AUTODLMGEMPA));?></div>
<div id="wilautogempa" align="center"><?php echo ucwords(strtolower(_AUTOWILGEMPA));?></div>
<div id="ptsautogempa" align="center"><i><?php echo ucwords(strtolower(_AUTOPTSGEMPA));?></i></div>
<?php } else { echo _PESANSAG; } ?>
<div align="right" id="sumberautogempa">Sumber : Data BMKG</div>
</div>
</center>
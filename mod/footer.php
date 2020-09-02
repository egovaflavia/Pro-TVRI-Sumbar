<?php if(!defined('_VALID_ACCESS')) { header ("location: index.php"); die; }

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM "._TBPROFIL." ORDER BY id_pf DESC LIMIT 0,1");

?>

<!-- vector footer -->
<div id="vectorfooter"></div>

<!-- begin pra footer -->
<div id="prafooter" align="center">
<div class="prafootercontent">

<div class="pf-a">
<h3></h3>
  <ul>
    <li><a href="<?=$profil->linkfb;?>" target="_blank" class="Facebook-ico"><span></span>Facebook</a></li>
    <li><a href="<?=$profil->linktw;?>" target="_blank" class="twitter-ico"><span></span>Instagram</a></li>
    <li><a href="<?=$profil->linkyt;?>" target="_blank" class="myspace-ico"><span></span>Youtube</a></li>
    <li><a href="<?=$profil->linkgp;?>" target="_blank" class="john-doe-123-ico"><span></span>Twitter</a></li>
</ul>
</div>
<div class="pf-b">
<h3>#mediapemersatubangsa</h3>
</div>
<div class="clear">&nbsp;</div>

</div>
</div>

<!-- begin footer -->
<div id="footer" align="center">
<div id="footercontent">

<div id="footer-a" align="center">

<div class="peta">
<p class="peta-nama"><b><?=$profil->nama;?></b></p>
<p class="peta-teks"><?=$profil->alamat;?></p>
<p class="peta-teks">Telp: <?=$profil->telp;?> - Fax: <?=$profil->fax;?></p>
<p class="peta-teks">Email: <?=$profil->email;?></p>
</div>

</div>
<div id="footer-b">

<div id="footer-ba">

<h1 class="topicof">TVRI SUMBAR</h1>
  <ul class="menu-footer">
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>profil/sejarah">Sejarah TVRI Sumbar</a></div><div class="clear"></div></li>
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>profil/visimisi">Visi, Misi &amp; Slogan</a></div><div class="clear"></div></li>
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>profil/organisasi">Struktur Organisasi</a></div><div class="clear"></div></li>
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>profil/sdm">Sumber Daya Manusia</a></div><div class="clear"></div></li>
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>agenda">Agenda Kegiatan</a></div><div class="clear"></div></li>
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>saran">Kritik &amp; Saran</a></div><div class="clear"></div></li>
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>hubungi">Hubungi Kami</a></div><div class="clear"></div></li>
    <li><div style="float:left; width:5%;">&bull;&nbsp;</div><div style="float: right; width: 95%;"><a href="<?php echo _URLWEB;?>streaming">Live Streaming</a></div><div class="clear"></div></li>
  </ul>

</div>
<div id="footer-bb">

<div>
<h1 class="topicof">LINK</h1>
<?php
$ceklk = $akdb->dbobject("SELECT COUNT(*) as num FROM "._TBLINK."");

if($ceklk->num <= 0) { 

  echo "";

} else {

$sqllk = $akdb->dbquery("SELECT urlweb,nama FROM "._TBLINK." ORDER BY id_lk ASC LIMIT 0,6");

?>
  <ul class="menu-footer">
  <?php
      while($rowlk = mysql_fetch_object($sqllk))
      {
      
    	echo "<li><div style=\"float:left; width:5%;\">&bull;&nbsp;</div><div style=\"float: right; width: 95%;\"><a href=\"".$rowlk->urlweb."\" target=\"_blank\">".$rowlk->nama."</a></div><div class=\"clear\"></div></li>";
  	  
  	  }
      ?>
  </ul>
  <p align="right"><a class="lainf" style="margin-top: 5px;" href="<?php echo _URLWEB;?>link"/>&raquo; Link Lainnya</a></p>
<?php
}
?>
</div>

</div>
<div class="clear"></div>

</div>
<div class="clear"></div>

<div class="hakcipta"><?php echo _APPCPR;?> <?=$profil->nama;?></div>

</div>
</div>

<!-- end footer area -->

<script language="javascript" type="text/javascript" src="<?php echo _URLWEB;?>js/jquery-1.7.2.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo _URLWEB;?>js/jquery.scrollUp.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo _URLWEB;?>js/jquery.preloader.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo _URLWEB;?>js/jquery.carouFredSel-6.2.1.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo _URLWEB;?>js/fontresizer.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo _URLWEB;?>js/jquery.simpleWeather.min.js"></script>
<script type="text/javascript">
// modify these
var enl_gifpath='<?php echo _URLWEB;?>img/';    // path to graphics (png)
var enl_brdsize=16;            // border thickness
var enl_brdcolor='#1b365d';    // border color
var enl_brdround=1             // use rounded borders (Mozilla/Safari only)
var enl_maxstep=12;            // ani steps (10-30)
var enl_speed=14;              // time between steps
var enl_ani=1;                 // 0=no,1=fade,2=glide,3=bumpglide,4=smoothglide,5=expglide
var enl_shadow=1;              // shadow under border (0/1)
var enl_shadowsize=1;          // size of shadow right/bottom (0-20)
var enl_shadowintens=16;       // shadow intensity (10-30)
var enl_dark=0;                // darken screen (0=off/1=on/2=keep dark when nav)
var enl_darkprct=40;           // how dark the screen should be (0-100)
var enl_center=1;              // center enlarged pic on screen
var enl_titlebar=1;            // show pic title bar (0/1)
var enl_drgdrop=0;             // enable drag&drop for pics
var enl_preload=1;             // preload next/prev pic in grouped sets
var enl_titletxtcol='#fff'  // color of title bar text
var enl_ajaxcolor='#fefde3';   // background color for AJAX

// don't modify next line
var enl_buttonurl = new Array(),enl_buttontxt = new Array(),enl_buttonoff = new Array();

// define your buttons here
enl_buttonurl[0] = 'close';
enl_buttontxt[0] = 'Tutup Perbesaran Gambar';
enl_buttonoff[0] = -105;


eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('k 1b=1o 3I(),K=1o 3I();k 2X,x,11=0,2n=0;k 57=f.3J;k 1g=f.3K&&!f.3J;k 2o=58.59.2Y("5a")+1;k 2p=Q,1V=Q;k n,1C=0,2Z=0;k 12,I,1p,1q;k 1D=0,2q=0,L=5b;k 3L=1,13=Q,1W=0;b 31(){9(!1D){1D=1;9(2o)1h=0;9(1c.1r)M=1;k e=0;2r(e<1c.1r){9(1c[e]==\'3M\')2Z=1;e++}13=Q;9(q.3N){13=1o 3N()}h 9(q.32){1X{13=1o 32("5c.3O")}1Y(1Z){1X{13=1o 32("5d.3O")}1Y(1Z){}}}9(M){1E(1i+\'3P.1s\');2X=1b[11];1E(1i+\'33.1s\')}F=1F(\'F\');F.c.U=5e;1G=1o 3Q();1G.1H=1i+\'5f.5g\';1G.c.3R=\'3S\';1G.c.5h=\'3T\';1G.c.5i=\'34\';F.1j(1G);V=1F(\'3U\');V.2s=\'5j\';V.c.35=5k;9(3V){V.c.3W=g+\'t\';V.c.3X=g+\'t\'}9(1t){1I=1F(\'3Y\');9(2o)1I.c.21=\'22(\'+1i+\'3Z.1s)\';h{1I.c.35=\'34\';1u(1I,5l);9(3V){1I.c.3W=2t(g+1)+\'t\';1I.c.3X=2t(g+1)+\'t\'}}}9(1J){y=1F(\'y\');9(2o)y.c.21=\'22(\'+1i+\'3Z.1s)\';h{1u(y,5m);y.c.35=\'34\'}y.c.U=5n;41(36)}1D=2}}b l(i,42,43,37,44){i.c.J=42+\'t\';i.c.W=43+\'t\';9(37){i.c.R=37+\'t\';i.c.X=44+\'t\'}}b 1u(i,2u){i.c.45=2u/N;i.c.5o=2u/N;i.c.5p="5q(45="+2u+")"}b d(8){A f.3K(8)}b 1E(46){11+=1;1b[11]=1o 3Q();1b[11].1H=46}b O(i){i.c.2v=\'47\'}b P(i){i.c.2v=\'48\'}b 1F(49){1v=f.38("2w");P(1v);1v.w=49;1v.c.1K=\'23\';l(1v,-1k,0,0,0);f.r.1j(1v);A 1v}b 39(){9(14 q.4a!=\'1L\'){12=q.4a-10;I=q.2x}h 9(14 f.1w!=\'1L\'&&14 f.1w.2y!=\'1L\'&&f.1w.2y!=0){12=f.1w.2y;I=f.1w.4b}h{12=f.2z(\'r\')[0].2y;I=f.2z(\'r\')[0].4b}1q=q.5r||f.1w.4c||f.r.4c||0;1p=q.5s||f.1w.4d||f.r.4d||0}b 36(){9(2n){y=d(\'y\');l(y,0,0,0,0);39();9(q.2x&&q.3a)1M=(q.2x+q.3a>I)?q.2x+q.3a:I;h 1M=(f.r.4e>f.r.3b)?f.r.4e:f.r.3b;1M=(I>1M)?I:1M;l(y,0,0,f.r.5t,1M)}}b 3c(m){k 1d={W:0,J:0,R:0,X:0};9(!m)A 1d;h 9(14 m==\'5u\')m=d(m);9(14 m!=\'5v\')A 1d;9(14 m.4f!=\'1L\'){1d.X=m.3b;1d.R=m.4g;1d.J=m.W=0;2r(m&&m.4h!=\'4i\'){1d.W+=B(m.4f);1d.J+=B(m.5w);m=m.5x}}A 1d}b 2A(){9(1J){y=d(\'y\');2n=1;O(y);36()}}b 4j(){9(1J&&!1W){y=d(\'y\');P(y);l(y,-1k,0,0,0);2n=0}}b 3d(24){k C;9(1h==3)C=((-1*o.5y(24-0.2))+0.5z)*3.5;h 9(1h==4)C=(o.5A(1.5*o.4k+24*o.4k)+1)/2;h 9(1h==5)C=o.4l(24,o.4l(2,2));h C=24;A C}b 26(8){7=d(8);7.4m=4n;7.4o=4p;2q=0;9(5B){3e=2B(8);9(3e){2C=3e.1x(\'2D\');j(\'1E("\'+2C+\'")\',30)}3f=2E(8);9(3f){2C=3f.1x(\'2D\');j(\'1E("\'+2C+\'")\',30)}}}b 2F(i){i.4m=1e;i.4o=1e;i.1y=1e}b 4q(3g){k 3h=q.2G;9(14 q.2G!=\'b\'){q.2G=3g}h{q.2G=b(){9(3h){3h()}3g()}}}b 41(3i){k 3j=q.2H;9(14 q.2H!=\'b\')q.2H=3i;h{q.2H=b(){3i();9(3j){j(\'"+3j+"\',25)}}}}b 3k(i){F=d(\'F\');15=3c(i);l(F,15.J+15.R/2-17,15.W+15.X/2-17);O(F)}b 2I(){F=d(\'F\');P(F);l(F,-1k,0)}b 2E(8){1l=d(d(8).16);9(1l.1N){k S=f.r.2z(\'4r\');k 18=0;4s(k e=S.1r;e>=0;e--){9((18==1)&&(S[e].1N==1l.1N)&&!S[e].16){18=2;1O=S[e]}9(1l==S[e])18=1}9(18==2&&!1O.2J)A 1O;h A 1e}}b 2B(8){1l=d(d(8).16);9(1l.1N){k S=f.r.2z(\'4r\');k 18=0;4s(k e=0;e<S.1r;e++){9((18==1)&&(S[e].1N==1l.1N)&&!S[e].16){18=2;1O=S[e]}9(1l==S[e])18=1}9(18==2&&!1O.2J)A 1O;h A 1e}}b 4t(4u,4v){27=f.38("a");27.w=4u;1X{27.c.3l=\'5C\'}1Y(1Z){}2K(27.c){X=x+\'t\';R=x+\'t\';5D=\'5E\';21=\'22(\'+1i+\'33.1s)\';5F=4v+\'t 28\';5G=\'5H\';4w=\'J\';4x=\'J\'}A 27}b 4y(8){9(M){7=d(8);T=1F(8+\'29\');T.c.4z=\'4A\';2a=B(7.u)-1c.1r*(x+3);9(2a>N&&7.4B!=\'\'){2b=f.38(\'2w\');2K(2b.c){1K=\'5I\';4w=\'J\';4x=\'J\';5J=\'4C\';5K=\'4A\';5L=\'5M,5N,5O-5P\';5Q=\'5R\';3m=5S;5T=\'5U\'}2c=7.4B;9(2c.1r>o.D(2a*0.4D))2c=2c.5V(0,o.D(2a*0.4D)-2)+\'...\';2b.2d=2c;2b.c.R=2a+\'t\';T.1j(2b)}k e=0;2r(e<1c.1r){9(1c[e]==\'4E\'&&2B(8)==1e){e++;4F}h 9(1c[e]==\'4G\'&&2E(8)==1e){e++;4F}K[e]=4t(8+e,5W[e]);K[e].5X=5Y[e];K[e].4H=8;K[e].4I=1c[e];5Z(1c[e]){2L\'3M\':K[e].1y=b(){2e(8)};2f;2L\'60\':K[e].1y=b(){4J(8)};2f;2L\'4G\':K[e].1y=b(){4K(8)};2f;2L\'4E\':K[e].1y=b(){4L(8)};2f;4M:K[e].1y=b(){4N(2M)};2f}K[e].61=b(){4O(2M)};K[e].62=b(){4P(2M)};T.1j(K[e]);e++}7.4Q=T.4g}}b 4L(8){1P=2B(8);9(1P){9(1J==2)1W=1;2e(8);2N(1P)}}b 4K(8){1P=2E(8);9(1P){9(1J==2)1W=1;2e(8);2N(1P)}}b 4J(8){7=d(8);d(8+\'Y\').2d=\'\';O(7)}b 3n(7,4R){V=d(7.w+\'Y\');V.2d=\'\';3k(V);P(7);1X{13.63(\'64\',4R,1m);13.65=b(){9(13.66==4){2I();4S=13.67;4T=7.s-2;4U=7.u-2;2O=\'<2w c="R:\'+4U+\'t;X:\'+4T+\'t;68:69;3o-3m:#6a;3o-R:3S;3o-c:3T;6b-3m:\'+6c+\';2g-J:\'+g+\'t;2g-6d:\'+g+\'t;2g-6e:\'+g+\'t;2g-W:\';2O+=(g<x+4)?2t(x+4):g;2O+=\'t;">\'+4S+\'</2w>\';d(8+\'Y\').2d=2O}};13.6f(1e)}1Y(1Z){2I();d(8+\'Y\').2d="<4C><4V/><4V/><p c=\'6g-6h:6i;\'>6j 6k 6l 6m"}}b 4N(i){7=d(i.4H);8=7.w;2h=i.4I;9(7.1x(\'2s\'))2h+=7.1x(\'2s\');2h+=(2h.2Y("?")<0)?"?7="+8:"&7="+8;3n(7,2h)}b 6n(i){3p=i.2s;8=3p.4W("7=")[1];9(8.2Y("&"))8=8.4W("&")[0];7=d(8);3n(7,3p)}b 4O(i){i.c.21=\'22(\'+1i+\'3P.1s)\'}b 4P(i){i.c.21=\'22(\'+1i+\'33.1s)\'}b 1Q(8){9(M){T=d(8+\'29\');7=d(8);19=B(7.c.J)+7.u-7.4Q+5;z=(M&&g<x+4)?B(7.c.W)-(x+4):B(7.c.W)-g;l(T,19,z);T.c.U=L+1;O(T)}}b 4X(8){9(M){T=d(8+\'29\');P(T);l(T,-1k,0)}}b 3q(8){7=d(8);2P=d(8+"2Q");1z=d(8+"2R");Z=7.u+3r+g*2+2;9(M&&g<x+4){G=7.s+3r+g*2+6+x-g;z=7.E-g-1-(x+4)+g}h{G=7.s+3r+g*2+2;z=7.E-g-1}l(2P,7.H-g-1,z,Z,G);2P.c.U=L-2;O(2P);l(1z,7.H-g-2,z-1,Z+2,G+2);1z.c.U=L-2;O(1z)}b 3s(8){3t=d(8+"2Q");3u=d(8+"2R");P(3t);l(3t,-1k,0);P(3u);l(3u,-1k,0)}b 2i(8){7=d(8);1A=d(8+"Y");9(M&&g<x+4){G=7.s+g+x+4;z=7.E-g-(x+4)+g}h{G=7.s+g*2;z=7.E-g}l(1A,7.H-g,z);2K(1A.c){R=2t(7.u+g*2)+\'t\';X=G+\'t\';2v=\'47\';U=L-1}9(1t)j(\'3q("\'+8+\'")\',10)}b 4Y(8){V=d(8+"Y");P(V);l(V,-1k,0);9(1t)3s(8)}b 4Z(m){9(2p&&51){19=1g?3v+m.2S-3w:3v+2j.2S-3w;z=1g?3x+m.2T-3y:3x+2j.2T-3y;l(n,19,z);9(M&&g<x+4)l(d(n.w+"Y"),19-g,z-(x+4));h l(d(n.w+"Y"),19-g,z-g);1Q(n.w);1C++;9(1C>3)1V=1m;A Q}}b 4n(m){n=1g?m.6o:2j.6p;k 52=1g?"6q":"4i";1V=Q;2r(n.4h!=52&&!n.s){n=1g?n.6r:n.6s}2p=1m;L+=3;1a=n.w;9(M)d(1a+\'29\').c.U=L+1;n.c.U=L;9(1t)3s(1a);d(1a+"Y").c.U=L-1;3v=B(n.c.J+0);3x=B(n.c.W+0);3w=1g?m.2S:2j.2S;3y=1g?m.2T:2j.2T;1C=0;n.6t=4Z;A Q}b 4p(){n.E=B(n.c.W);n.H=B(n.c.J);1a=n.w;9(1t)3q(1a);2F(n);2p=Q;9(1V==1m||(2Z&&M)){2i(1a);1Q(1a);1V=Q;j(\'26("\'+1a+\'")\',N)}h 2e(1a)}b 2N(7){1X{7.6u()}1Y(1Z){}9(!1D)31();9(1D==1)A Q;9(2q)A Q;2q=1;7.2J=1;9(14 3z!=\'1L\')53=0;1E(7.1x(\'2D\'));8=7.1x(\'w\');j(\'3A("\'+8+\'")\',5)}b 3A(8){7=d(8);F=d("F");9(!1b[11].6v){3k(7);O(F);j(\'3A("\'+8+\'")\',N)}h{L+=3;2I();1n=7.2U(1m);l(1n,-1k,0);2K(1n){w=7.w+"6w";c.2v=\'48\';c.1K=\'23\';c.3R=\'28\';c.6x=\'28\';c.2g=\'28\';c.4z=\'28\'}1n.16=7.w;6y=B(1b[11].R);6z=B(1b[11].X);f.r.1j(1n);3B=d("3U");1A=3B.2U(1m);1A.w=8+"6A";1A.c.U=L-1;9(1t){3C=d("3Y");3D=3C.2U(1m);3D.w=1n.w+"2Q";1z=3C.2U(1m);1z.w=1n.w+"2R";f.r.1j(3D);f.r.1j(1z)}f.r.1j(1A);9(14 3z!=\'1L\')53=3z;j(\'54("\'+1n.w+\'")\',25)}}b 54(8){L+=3;39();x=B(2X.X);f.6B=b(){A Q};7=d(8);2k=d(7.16);2F(7);2F(2k);2V=7.1x(\'2D\');15=3c(2k);7.c.U=L;7.1R=15.W;7.1S=15.J;7.1T=B(15.X/3L);7.1U=15.R;7.u=B(1b[11].R);7.s=B(1b[11].X);9(7.u>12-N){7.s=o.D(7.s*(12-N)/7.u);7.u=12-N}9(7.s>I-2l){7.u=o.D(7.u*(I-2l)/7.s);7.s=I-2l}7.H=o.D(7.1S-(7.u-7.1U)/2);7.E=o.D(7.1R-(7.s-7.1T)/2);9(!6C){9(7.H<(50+1p))7.H=50+1p;9(7.E<(40+1q))7.E=40+1q;9(7.H+7.u>12+1p-50)7.H=12+1p-50-7.u;9(7.E+7.s>I+1q-40)7.E=I+1q-40-7.s}h{7.H=o.D(12/2+1p-7.u/2);7.E=o.D(I/2+1q-7.s/2)}7.v=0;7.6D=7.1H;4y(8);9(51)7.c.3l=\'6E\';9(1h==1){j(\'3E("\'+8+\'")\',20)}h 9(!1h){j(\'55("\'+8+\'")\',20)}h{j(\'3F("\'+8+\'")\',20)}}b 3F(8){7=d(8);7.v++;9(7.v==1f){l(7,7.H,7.E,7.u,7.s);7.v=0;j(\'2i("\'+8+\'")\',1B);j(\'2A()\',1B*3);j(\'26("\'+8+\'")\',1B*4);1Q(8)}h{9(7.v==1){7.1H=2V;7.c.1K=\'23\';O(7);P(d(7.16))}k C=3d(7.v/1f);Z=o.D(C*(7.u-7.1U)+7.1U);G=o.D(C*(7.s-7.1T)+7.1T);z=o.D(7.1R+(7.E-7.1R)*C);19=o.D(7.1S+(7.H-7.1S)*C);9(Z<0)Z=0;9(G<0)G=0;l(7,19,z,Z,G);j(\'3F("\'+8+\'")\',1B)}}b 55(8){7=d(8);l(7,7.H,7.E,7.u,7.s);7.1H=2V;7.c.1K=\'23\';O(7);7.v=0;2i(8);1Q(8);2A();j(\'26("\'+8+\'")\',2l)}b 3E(8){3B=d(8+"Y");7=d(8);7.v++;9(7.v==1){l(7,7.H,7.E,7.u,7.s);1u(7,0);7.1H=2V;7.c.1K=\'23\';O(7)}9(7.v==1f){1u(7,N);7.v=0;2i(8);1Q(8);2A();j(\'26("\'+8+\'")\',2l)}h{1u(7,7.v/1f*N);j(\'3E("\'+8+\'")\',1B)}}b 2W(8){7=d(8);2k=d(7.16);9(M)f.r.2m(d(8+"29"));f.r.2m(d(8+"Y"));9(1t){f.r.2m(d(8+"2Q"));f.r.2m(d(8+"2R"))}2k.1y=b(){2N(2M)};f.r.2m(7)}b 56(8){P(d(8));j(\'2W("\'+8+\'")\',10)}b 2e(8){7=d(8);O(7);d(7.16).2J=1e;7.c.3l=\'4M\';4Y(8);9(M)4X(8);9(1J)4j();1W=0;9(!1h)j(\'56("\'+8+\'")\',1);h 9(1h==1)j(\'3G("\'+8+\'")\',1);h j(\'3H("\'+8+\'")\',1)}b 3G(8){7=d(8);1C=0;7.v++;9(7.v==1f){7.v=0;P(7);j(\'2W("\'+8+\'")\',N)}h{1u(7,(1-7.v/1f)*N);j(\'3G("\'+8+\'")\',1B)}}b 3H(8){7=d(8);1C=0;7.v++;9(7.v==1f){P(7);7.v=0;O(d(7.16));j(\'2W("\'+8+\'")\',N)}h{k C=3d((1f-7.v)/1f);Z=o.D(C*(7.u-7.1U)+7.1U);G=o.D(C*(7.s-7.1T)+7.1T);z=o.D(7.1R+(7.E-7.1R)*C);19=o.D(7.1S+(7.H-7.1S)*C);9(Z<0)Z=0;9(G<0)G=0;l(7,19,z,Z,G);j(\'3H("\'+8+\'")\',1B)}}4q(31);',62,413,'|||||||enl_img|enl_imgid|if||function|style|enl_geto|enl_i|document|enl_brdsize|else|enl_obj|setTimeout|var|enl_setpos|enl_el|enl_drgelem|Math||window|body|newh|px|neww|steps|id|enl_btnheight|enl_drk|enl_tmpt|return|parseInt|enl_factor|round|newt|enl_ldr|enl_tmph|newl|enl_brwsy|left|enl_button|enl_zcnt|enl_titlebar|100|enl_visible|enl_hide|false|width|enl_allElm|enl_btns|zIndex|enl_brdm|top|height|brd|enl_tmpw||enl_prldcnt|enl_brwsx|enl_request|typeof|enl_r|orig||enl_flag|enl_tmpl|enl_drgid|enl_prldimg|enl_buttonurl|enl_values|null|enl_maxstep|enl_nn6|enl_ani|enl_gifpath|appendChild|5000|enl_oripic|true|enl_clone|new|enl_scrollx|enl_scrolly|length|png|enl_shadow|enl_setopa|enl_div|documentElement|getAttribute|onclick|enl_shdclone2|enl_brdclone|enl_speed|enl_mvcnt|enl_firstcall|enl_preloadit|enl_mkdiv|enl_ldrgif|src|enl_shdm|enl_dark|position|undefined|enl_darkh|className|enl_nextObj|enl_nextPic|enl_showbtn|oldt|oldl|oldh|oldw|enl_hasmvd|enl_keepblack|try|catch|enl_err||backgroundImage|url|absolute|enl_facthelp||enl_makedraggable|enl_tempbtn|0px|btns|enl_maxwidth|enl_title|enl_gettitle|innerHTML|enl_shrink|break|margin|enl_geturl|enl_mkborder|event|enl_orig|80|removeChild|enl_darkened|enl_konq|enl_drgmode|enl_inprogress|while|name|eval|enl_opval|visibility|div|innerHeight|clientWidth|getElementsByTagName|enl_darken|enl_getnext|enl_pictoget|longdesc|enl_getprev|enl_noevents|onload|onresize|enl_ajaxldrhide|isenlarged|with|case|this|enlarge|enl_tmphtml|enl_shdclone1|shd1|shd2|clientX|clientY|cloneNode|enl_fullimg|enl_enable|enl_butact|indexOf|enl_closebtn||enl_init|ActiveXObject|buttons_inact|black|backgroundColor|enl_resize|enl_w|createElement|enl_getbrwsxy|scrollMaxY|offsetHeight|enl_coord|enl_calcfact|enl_nextpic|enl_prevpic|enl_func|enl_oldonload|enl_resfunc|enl_oldonresize|enl_ajaxload|cursor|color|enl_ajax|border|enl_link|enl_dropshadow|enl_shadowsize|enl_delshadow|enl_shd1|enl_shd2|enl_tx|enl_x|enl_ty|enl_y|realcopyspeed|enl_chckready|enl_brddiv|enl_shddiv|enl_shdclone|enl_dofadein|enl_doglidein|enl_dofadeout|enl_doglideout|Array|all|getElementById|enl_iflowcorr|close|XMLHttpRequest|XMLHTTP|buttons_act|Image|borderWidth|1px|solid|enl_brd|enl_brdround|MozBorderRadius|khtmlBorderRadius|enl_shd|1pix||enl_addResize|enl_posx|enl_posy|enl_h|opacity|enl_picpath|visible|hidden|enl_divname|innerWidth|clientHeight|scrollTop|scrollLeft|scrollHeight|offsetTop|offsetWidth|tagName|BODY|enl_nodark|PI|pow|onmousedown|enl_buttonpress|onmouseup|enl_enddrag|enl_addLoad|img|for|enl_makebtn|enl_id|enl_offset|styleFloat|cssFloat|enl_mktitlebar|padding|2px|alt|center|09|next|continue|prev|whichpic|ajaxurl|enl_btnpicture|enl_prev|enl_next|default|enl_btnajax|enl_btnmover|enl_btnmout|btnw|enl_url|enl_answer|enl_divh|enl_divw|br|split|enl_hidebtn|enl_delborder|enl_mousemv||enl_drgdrop|topenl_el|copyspeed|enl_doenlarge|enl_donoani|enl_noaniremove|enl_ie|navigator|appName|onqueror|9700|Msxml2|Microsoft|9999|loaderimg|gif|borderStyle|borderColor|ajax|enl_brdcolor|enl_shadowintens|enl_darkprct|9670|MozOpacity|filter|alpha|pageYOffset|pageXOffset|scrollWidth|string|object|offsetLeft|offsetParent|cos|98|sin|enl_preload|pointer|marginRight|3px|backgroundPosition|display|block|relative|textAlign|paddingTop|fontFamily|Arial|Helvetica|sans|serif|fontSize|10pt|enl_titletxtcol|whiteSpace|nowrap|substring|enl_buttonoff|title|enl_buttontxt|switch|pic|onmouseover|onmouseout|open|GET|onreadystatechange|readyState|responseText|overflow|auto|aaaaaa|background|enl_ajaxcolor|bottom|right|send|font|size|12px|AJAX|did|not|work|enl_ajaxfollow|target|srcElement|HTML|parentNode|parentElement|onmousemove|blur|complete|clone|outlineWidth|enl_fullwidth|enl_fullheight|clonebrd|onselectstart|enl_center|thumbpic|move'.split('|'),0,{}))
</script>
<script type="text/javascript" language="javascript">
      $(function() {

        //  Basic carousel + timer, using CSS-transitions
        $('#programtvricr').carouFredSel({
          auto: {
            pauseOnHover: 'resume',
            progress: '#timer1'
          }
        }, {
          transition: true
        });

      });
    </script>

<script type="text/javascript">
  $(document).ready(function(){
        var HeaderTop = $('#header').offset().top;
    
        $(window).scroll(function(){
                if( $(window).scrollTop() > HeaderTop ) {
                        $('#header').css({position: 'fixed', top: '0px'});
                } else {
                        $('#header').css({position: 'static'});
                        
                }
        });
  });
</script>

<script type="text/javascript">
	// v3.1.0
	//Docs at http://simpleweatherjs.com
	$(document).ready(function() {
	  $.simpleWeather({
		location: 'Padang, ID',
		woeid: '',
		unit: 'c',
		success: function(weather) {
		  html = '<h2><i class="myw icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
		  html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
		  html += '<li class="currently">'+weather.currently+'</li>';
		  html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';
	  
		  $("#weather").html(html);
		},
		error: function(error) {
		  $("#weather").html('<p>'+error+'</p>');
		}
	  });
	});

</script>

<script type="text/javascript">
$(function(){
  $('a[href="#"]').on('click', function(e){
    e.preventDefault();
  });
  
  $('#menu > li').on('mouseover', function(e){
    $(this).find("ul:first").show();
    $(this).find('> a').addClass('active');
  }).on('mouseout', function(e){
    $(this).find("ul:first").hide();
    $(this).find('> a').removeClass('active');
  });
  
  $('#menu li li').on('mouseover',function(e){
    if($(this).has('ul').length) {
      $(this).parent().addClass('expanded');
    }
    $('ul:first',this).parent().find('> a').addClass('active');
    $('ul:first',this).show();
  }).on('mouseout',function(e){
    $(this).parent().removeClass('expanded');
    $('ul:first',this).parent().find('> a').removeClass('active');
    $('ul:first', this).hide();
  });
});
</script>

<!-- FlexSlider -->
<script language="javascript" type="text/javascript" src="<?php echo _URLWEB;?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript" charset="utf-8">
    var $ = jQuery.noConflict();
    $(window).load(function() {
    $('.flexslider').flexslider({
          animation: "fade"
    });
  
  $(function() {
    $('.show_menu').click(function(){
        $('.menu').fadeIn();
        $('.show_menu').fadeOut();
        $('.hide_menu').fadeIn();
    });
    $('.hide_menu').click(function(){
        $('.menu').fadeOut();
        $('.show_menu').fadeIn();
        $('.hide_menu').fadeOut();
    });
  });
  });
</script>

<script type="text/javascript">
    $(function () {
        $.scrollUp();
    });
</script>

<?php if($moh=="saran") { ?>
<script language="javascript" type="text/javascript" src="<?=_URLWEB;?>js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="<?=_URLWEB;?>js/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value);
    }, "type the correct answer -_-");

// validate contact form
$(function() {
    $('#pesan').validate({
        rules: {
            nama: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            alasan: {
                required: true
            },
            pesan: {
                required: true
            },
            security_code: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            nama: {
                required: "wajib di isi.",
                minlength: "nama anda minimal 2 karakter"
            },
            email: {
                required: "tidak ada email, tidak bisa di balas donk"
            },
            pesan: {
                required: "wajib di isi.",
                minlength: "sungguh, itu saja?"
            },
            alasan: {
                required: "harus dipilih!"
            },
            security_code: {
                required: "wajib di isi.",
                minlength: "security code minimal 6 karakter"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
<?php } ?>

<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

<?php if($profil->ga <> '') { 
?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?=$profil->ga;?>', 'auto');
    ga('send', 'pageview');

</script>
<?php } ?>

</body>
</html>